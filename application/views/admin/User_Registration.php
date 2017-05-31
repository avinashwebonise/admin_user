<html>
	<head>
		<title>Add User</title>
	<style>
		.center-div {border: 1px solid gray;}
	</style>
	</head>
	<body>		
		<div>
			<div style='color:red'>
				<?php echo validation_errors(); ?>
			</div>
			<?php
				$formaction = site_url() . "/admin/dashboard/add_user";
			?>
			<div align='right'><?php echo anchor('Login/logout', 'logout', 'title="Logout User"'); ?></div>
			
			<h2>Add User</h2><hr/ >
			<form action="<?php echo $formaction; ?>" method="post" enctype="multipart/form-data">
				<h3>General Info:</h3>
				Enter Firstname: <input type='text' name='Firstname' id='Firstname' /> <p></p>
			    Enter Lastname: <input type='text' name='Lastname' id='Lastname' /> <p></p>
			    Enter Address: <textarea rows='3' cols='20' name='Address' id='Address'></textarea> <p></p>
			    Enter City: <input type='text' name='City' id='City' /> <p></p>
			    Upload Image: <input type='file' name='Uimage' id='Uimage' /> <p></p>
			   <h3>Login Credentials:</h3>
			    Enter Username: <input type='text' name='Username' id='Username' /> <p></p>
				Enter Password: <input type='password' name='Password' id='Password' /> <p></p>
				<input type='submit' name='btnAdd' id='btnAdd' value='Add' />
				<input type='reset' name='btnReset' id='btnReset' />
			</form>
		</div>
		<?php
				$formaction = site_url() . "/admin/dashboard";
		        echo anchor($formaction, 'Back'); 
			?>
	</body>
</html>	
