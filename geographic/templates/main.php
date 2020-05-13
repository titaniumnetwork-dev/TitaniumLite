<style>img[alt*="www.000webhost.com"] {
    display: none;}
code made by Titanumnetwork,
img[alt="www.000webhost.com"]{display:none;}
</style>
<html>
<!DOCTYPE html>
<html>
<head>
<body style="background-color:black;">
<title>TitaniumNetwork Proxy</title>

<meta name="generator" content="php-proxy.com">
<meta name="version" content="<?=$version;?>">

<style type="text/css">
html body {
	font-family: Arial,Helvetica,sans-serif;
	font-size: 12px;
}

#container {
	width:500px;
	margin:0 auto;
	margin-top:150px;
}

#error {
	color:red;
	font-weight:bold;
}

#frm {
	padding:10px 15px;
	background-color:#1f1f14;

	border:1px solid #6600ff;

	-webkit-border-radius: 8px;
	-moz-border-radius: 8px;
	border-radius: 8px;
}

#footer {
	text-align:center;
	font-size:10px;
	margin-top:35px;
	clear:both;
}
</style>

</head>

<body>


<div id="container">

	<div style="text-align:center;">
		<h1 style="color:purple;">Titanium Network Proxy</h1>
    <h1 style="color:purple;">Fallback Page</h1>
                <h1 style="color:green;">Local PHP-Proxy</h1>
		<h3 style="color:blue;">Using the titaniumnetwork proxy will allow you to anonymously visit any site you wish. Due to its anonymous nature, you can even unblock websites that are blocked by school and work firewalls!</h3>
	</div>

	<?php if(isset($error_msg)){ ?>

	<div id="error">
		<p><?php echo $error_msg; ?></p>
	</div>

	<?php } ?>

	<div id="frm">

	<!-- I wouldn't touch this part -->

		<form action="index.php" method="post" style="margin-bottom:0;">
			<input name="url" type="text" style="width:400px;" autocomplete="off" placeholder="http://" />
			<input type="submit" value="Go" />
		</form>

		<script type="text/javascript">
			document.getElementsByName("url")[0].focus();
		</script>

	<!-- [END] -->

	</div>

</div>
	<div style="text-align:center;">
		<h2 style="color:blue;">Websites that can be unblocked include the following : </h2>
		<h3 style="color:green;">Youtube</h3>
		<h3 style="color:green;">Reddit</h3>
		<h3 style="color:green;">Twitter</h3>
		<h3 style="color:green;">Dailymotion</h3>
		<h3 style="color:green;">Liveleaks</h3>
		<h3 style="color:green;">And many more!</h3>
	    </div
<div id="footer">
	Powered by <a href="#" target="_blank">TitaniumNetwork</a>
</div>


</body>
</html>
