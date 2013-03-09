<?php
//don was here
session_start();
session_unset();
session_destroy(); 
?>
<!DOCTYPE html>
<html>
    <head>
        <script src="jquery-1.9.1.js"></script>
        <script src="scripts/jquery_functions.js"></script>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <title></title>
        <link href="css/mySheet.css" rel="stylesheet" type="text/css">
        
    </head>
    <body class="login-bg">
        <section id="login-block">
            <div class="block-border"><div class="block-content">
		<div class="block-header">Codename: NP</div>
				
                    <form class="form with-margin" name="login-form" id="login-form" method="post" action="scripts/login.php">
                        <input type="hidden" name="a" id="a" value="send">
                            <p class="inline-small-label">
				<label for="login"><span class="big">User name</span></label>
				<input type="text" name="login" id="login" class="full-width" value="">
                            </p>
                            <p class="inline-small-label">
				<label for="pass"><span class="big">Password</span></label>
				<input type="password" name="pass" id="pass" class="full-width" value="">
                            </p>
				
                            <button type="submit" class="login-button" id="loginButton">Login</button>
                    </form>
                    <div id="error-message"></div>
		</div>
            </div>
        </section>
    </body>
</html>
