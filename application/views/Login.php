<html>
	<head>
		<title>Login</title>
	<style>
		.center-div {border: 1px solid gray; margin:15%; padding:10px;width:30%}
	</style>
	</head>
	<body>
		<div style='color:red'>
				<?php echo validation_errors(); ?>
		</div>
		<div class='center-div'>
			<h3>Login user</h3>
			<?php
				$formaction = site_url() . "/login";
			?>
			<form action="<?php echo $formaction; ?>" method="post">
				Enter Username: <input type='text' name='Username' id='Username' /> <p></p>
				Enter Password: <input type='password' name='Password' id='Password' /> <p></p>
				<input type='submit' name='btnLogin' id='btnLogin' value='Login' />
				<input type='reset' name='btnReset' id='btnReset' />
			</form>
		</div>
	</body>
</html>	