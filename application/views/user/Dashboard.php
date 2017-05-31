<html>
	<head>
		<title>User Dashboard</title>
	<style>
		.center-div {border: 1px solid gray;}
	</style>
	</head>
	<body>		
		<div>
			
			<?php
				echo $this->session->flashdata('msg');
			?>
			<div align='right'><?php echo anchor('Login/logout', 'logout', 'title="Logout User"'); ?></div>
			
			<h2>User Detail</h2>
			
			
		</div>
	</body>
</html>	