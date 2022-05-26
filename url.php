<?
require 'baglan.php';
?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Kayıt Ol</title>
	<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
       <div class="login">
       	<div class="login-screen">
       		<div class="app-title">
       			<h1>Url Shorter</h1>
       		</div>
       		<form  action="islem.php" method="post">
       		<div class="login-form">
       			<div class="control-group">
       				<input type="text" name="long_url" class="login-field" placeholder="long url" id="lonin-url">
       				<label class="login-field-icon fui-user" for="lonin-url"></label>
       			</div>
       			
                
                <button href="url.php" name="shorten_url"  class="btn btn-primary btn-large btn-block">Send </button>
       		</div>
       		</form>
       		
       	</div>
       </div>
</body>
</html>