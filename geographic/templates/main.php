
<!DOCTYPE html>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width">
    <meta name="description" content="">
    <title>My Drive - Google Drive</title>
    <link rel="icon" href="https://ssl.gstatic.com/docs/doclist/images/infinite_arrow_favicon_4.ico">
    <link rel="stylesheet" href="./css/stylesheet.min.css">
    <style>#error {
    	color:red;
    	font-weight:bold;
    }</style>
  </head>
  <body>
    <header class="header container">
      <a href="" class="logo">TitaniumNetwork</a>
      <input class="menu-btn" type="checkbox" id="menu-btn" />
      <label class="menu-icon" for="menu-btn"><span class="navicon"></span></label>
      <ul class="menu">
        <li><a href="./index.html">Home</a></li>
        <li><a href="./s2.html">Games</a></li>
        <li><a href="./s3.html">Movies</a></li>
        <li><a href="./about.html">About Us</a></li>
      </ul>
    </header>
        <div class="container">
          <div class="c-box mainbody">
        <center>
          <h1>TitaniumNetwork | Surf Freely</h1>
          <h2>Browse with Freedom.</h2>
          <h2>News: Node Unblocker servers are now local to each site! No more waiting for new node servers!</h2>
          <h2>Type in the website you wish to unblock and press a button, to get going.</h2>
        </center>
        <center>
              <!--<form action="" method="get" id="web-search-box" style="transform:scale(1.1)">-->
              <form action="./geographic/index.php" id="web-search-box" method="post" style="transform:scale(1.1)">
							<p>
                <input type="text" placeholder="Enter URL" style="border:none;border-radius: 5px;padding:10px;" id="url" autocomplete="false" name="url" />&nbsp;<p></p>
								<input type="submit" style="border:none;border-radius: 5px;padding:10px;width:45px;background:orangered;color:#fff;font-weight:bold;" value="PHP" />
                <input type="button" id="via" style="border:none;border-radius: 5px;padding:10px;width:45px;background:orangered;color:#fff;font-weight:bold;" value="Via" />
                <input type="button" id="localnode" style="border:none;border-radius: 5px;padding:10px;width:55px;background:orangered;color:#fff;font-weight:bold;" value="Node" />
                <?php
                $server1= "https://node.trashmic.gq";
                $server2= "https://node.toothbrush.ml";
                $server3= "https://node.androids.gq";
                $server4= "https://node.ipodnanos.gq";
                $array1= array($server1,$server2,$server3,$server4,$server1,$server2,$server3,$server4);
                $rand_keys = array_rand($array1,2);
                $oldsmobile = $array1[$rand_keys[0]];
                ?>

                <script>


                  function $(id) {

                    return document.getElementById(id);
                  }
                  var url = window.location.hostname;
                    var domain = url.replace('www.','').split(/[/?#]/)[0];

                  document.getElementById('localnode').onclick = function localnode() {
                    var url = $('url').value;
                    //this is the URL for the server
                    window.location.href = "https://" + "node" + "." + domain + "/" + "textbooks" + "/" + url;
                    return false;
                  };
                  
                  document.getElementById('via').onclick = function viashit() {
                    var url = $('url').value;
                    //this is the URL for the server
                    window.location.href = "https://" + "c" + "." + domain + "/" + url;
                    return false;
                  };
                  
                    document.getElementById('nu1').onclick = function Noder() {
                      var mikelime = "<?php echo $oldsmobile ?>";
                    var url = $('url').value;
                    //this is the URL for the server
                    window.location.href = mikelime + "/textbooks/" + url;
                    return false;
                  };
                  
                  
                  
                  
                  
                  window.onload = function() {
                    $('url').focus();
                  }

                </script>
							</p>
						</form>

            	<?php if(isset($error_msg)){ ?>
            	<div id="error">
            		<p><?php echo $error_msg; ?></p>
            	</div>
            	<?php } ?>
          </center>
	  		<center>

          <h3>Info:</h3>
            <h4>-(PHP) PHP Proxy: Local proxy script that is capable of proxifying static websites.</h4>
            <h4>-(Node) Node Unblocker: Highly capable proxy that is capable of proxifying dynamic websites and games.</h4>
            <h4>-(Via) Via Proxy: Highly capable proxy that is capable of proxifying many dynamic websites and .io games, whilst usually keeping working sign-in functionality.</h4>
            <h4>TitaniumNetwork's servers are based in Canada and the U.S, therefore, if you are region-locked or blocked from accessing your content, in a different country, TitaniumNetwork can unblock blocked Canadian/US content.</h4>
            <h3>Server Status (automatic pinging is being worked on):</h3>
            <h4>Local PHP-Proxy: (<span style="color: green">Running...</span>)</h4>
            <?php
            echo "<h4>Node Server: (<span style='color: green'>Running...</span>)</h4>";
            echo "<h4>Via Server: (<span style='color: green'>Running...</span>)</h4>";
            ?>
                        <div class="d-box">
              <h1>Official Support List:</h1>
              <h3>Invidio.us (Video Streaming) | (Node), (Via)</h3>
              <h3>Google.com (Search Engine) | (Node), (Via), (PHP)</h3>
              <h3>Startpage.com (Search Engine) | (Node), (Via), (PHP)</h3>
              <h3>Andkon.com (Games Site) | (Node), (Via)</h3>
              <h3>YouTube.com (Video Streaming) | (PHP), (Via)</h3>
            </div>
        </center>
      </div>
    </div>
        </body>
</html>
