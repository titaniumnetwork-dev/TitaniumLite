<?php

define('PROXY_START', microtime(true));

require("vendor/autoload.php");

use Proxy\Config;
use Proxy\Http\Request;
use Proxy\Proxy;

// start the session
session_start();

// load config...
Config::load('./config.php');

// custom config file to be written to by a bash script or something
Config::load('./custom_config.php');

if (!Config::get('app_key')) {
    die("app_key inside config.php cannot be empty!");
}

if (!function_exists('curl_version')) {
    die("cURL extension is not loaded!");
}

// how are our URLs be generated from this point? this must be set here so the proxify_url function below can make use of it
if (Config::get('url_mode') == 2) {
    Config::set('encryption_key', md5(Config::get('app_key') . $_SERVER['REMOTE_ADDR']));
} elseif (Config::get('url_mode') == 3) {
    Config::set('encryption_key', md5(Config::get('app_key') . session_id()));
}

// very important!!! otherwise requests are queued while waiting for session file to be unlocked
session_write_close();

// form submit in progress...
if (isset($_POST['url'])) {

    $url = $_POST['url'];
    $url = add_http($url);

    header("HTTP/1.1 302 Found");
    header('Location: ' . proxify_url($url));
    exit;

} elseif (isset($_GET['"'])) {

    $url = $_GET['"'];
    $url = add_http($url);

    header("HTTP/1.1 302 Found");
    header('Location: ' . proxify_url($url));
    exit;

} elseif (!isset($_GET['q'])) {

    // must be at homepage - should we redirect somewhere else?
    if (Config::get('index_redirect')) {

        // redirect to...
        header("HTTP/1.1 302 Found");
        header("Location: " . Config::get('index_redirect'));

    } else {
		include('show.php');
		//header("Location: ../", true, 301);
        //echo render_template("./templates/main.php", array('version' => Proxy::VERSION));
    }

    exit;
}

function includes($str, $inc){
	$a=false;
	if (strpos(strtolower($str), strtolower($inc)) !== false) {
		$a=true;
	}
	return $a;
}
// decode q parameter to get the real URL
$url = url_decrypt($_GET['q']);

$proxy = new Proxy();

// load plugins
foreach (Config::get('plugins', array()) as $plugin) {

    $plugin_class = $plugin . 'Plugin';

    if (file_exists('./plugins/' . $plugin_class . '.php')) {

        // use user plugin from /plugins/
        require_once('./plugins/' . $plugin_class . '.php');

    } elseif (class_exists('\\Proxy\\Plugin\\' . $plugin_class)) {

        // does the native plugin from php-proxy package with such name exist?
        $plugin_class = '\\Proxy\\Plugin\\' . $plugin_class;
    }

    // otherwise plugin_class better be loaded already through composer.json and match namespace exactly \\Vendor\\Plugin\\SuperPlugin
    // $proxy->getEventDispatcher()->addSubscriber(new $plugin_class());

    $proxy->addSubscriber(new $plugin_class());
}
$blacklistedURLs = array('googletagmanager.com','etahub.com','adsoftheworld.com','amazon-adsystem.com','juicyads.com','googleadservices.com','moatads.com','doubleclick.net','trafficjunky.net','localhost','192.168','whatsmyip.com','doubleclick.net','ads.js','googlesyndication.com','0.0','127.0','pornhub.com','xvideos.com','e621.net','redtube.com');

$externalContent = file_get_contents('http://checkip.dyndns.com/');
preg_match('/Current IP Address: \[?([:.0-9a-fA-F]+)\]?/', $externalContent, $m);
$externalIp = $m[1];

try {
	foreach ($blacklistedURLs as &$value) {
		if(includes($url,$value)==true){
			header('HTTP/1.0 403 Forbidden');
			echo '<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd"><html xmlns="http://www.w3.org/1999/xhtml"><head><meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1"/><title>403 - Forbidden: Access is denied.</title><style type="text/css"><!--body{margin:0;font-size:.7em;font-family:Verdana, Arial, Helvetica, sans-serif;background:#EEEEEE;}fieldset{padding:0 15px 10px 15px;}h1{font-size:2.4em;margin:0;color:#FFF;}h2{font-size:1.7em;margin:0;color:#CC0000;}h3{font-size:1.2em;margin:10px 0 0 0;color:#000000;}#header{width:96%;margin:0 0 0 0;padding:6px 2% 6px 2%;font-family:"trebuchet MS", Verdana, sans-serif;color:#FFF;background-color:#555555;}#content{margin:0 0 0 2%;position:relative;}.content-container{background:#FFF;width:96%;margin-top:8px;padding:10px;position:relative;}--></style></head><body><div id="header"><h1>Server Error</h1></div><div id="content"><div class="content-container"><fieldset><h2>403 - Forbidden: Access is denied.</h2><h3>You do not have permission to view this directory or page using the credentials that you supplied.</h3><h4>TitaniumNetwork has blocked this page for either legal compliance or due to issues arising from proxy use. We are sorry for the inconvenience.</h4></fieldset></div></div></body></html>';
			return;
		}
	}
	// request sent to index.php
	$request = Request::createFromGlobals();
	
	// remove all GET parameters such as ?q=
	$request->get->clear();
	// forward it to some other URL
	$response = $proxy->forward($request, $url);

	// if that was a streaming response, then everything was already sent and script will be killed before it even reaches this line
	$response->send();
} catch (Exception $ex) {

    // if the site is on server2.proxy.com then you may wish to redirect it back to proxy.com
    if (Config::get("error_redirect")) {

        $url = render_string(Config::get("error_redirect"), array(
            'error_msg' => rawurlencode($ex->getMessage())
        ));

        // Cannot modify header information - headers already sent
        header("HTTP/1.1 302 Found");
        header("Location: {$url}");

    } else {
		echo 'ERR: '.$ex->getMessage();
    }
}
