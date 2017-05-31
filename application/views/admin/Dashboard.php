<html>
	<head>
		<title>Admin Dashboard</title>
	<style>
		.center-div {border: 1px solid gray;}
	</style>
		<script>
			function isDelete(){
				var ans = confirm('Delete Record ?');
				if (ans == 1)
					return true;
				else
					return false;
			}
		</script>
	</head>
	<body>		
		<div>
			
			<?php
				echo $this->session->flashdata('msg');
			?>
			<div align='right'><?php echo anchor('Login/logout', 'logout', 'title="Logout User"'); ?></div>
			
			<h2>User List</h2>
			
			<?php echo anchor('admin/Dashboard/add_user', 'Add User', 'title="Add User"'); ?>
			<p></p>
			<table border='1'>
				<tr><th>ID</th><th>Fullname</th><th>Address</th><th>City</th><th>Username</th><th>UserType</th><th>Created On</th><th>Modified On</th><th>Edit</th><th>Delete</th></tr>
			<?php
				foreach($list as $v){ 
		   			echo "<tr>";
					echo "<td> {$v['id']} </td>";
					echo "<td> {$v['firstname']} {$v['lastname']}</td>";					
					echo "<td> {$v['address']}</td>";
					echo "<td> {$v['city']}</td>";
					echo "<td> {$v['username']}</td>";
					echo "<td>" . ($v['user_type'] == '1'?'Admin':'User'). "</td>";
					echo "<td> {$v['created_on']}</td>";
					echo "<td> {$v['modified_on']}</td>";					
					echo "<td>" . anchor("admin/Dashboard/edit_user/{$v['id']}", 'Edit', 'title="Edit User"') . "</td>";
					if($v['user_type'] == '2')
					echo "<td>" . anchor("admin/Dashboard/delete_user/{$v['id']}", 'Delete', "title='Delete User', onClick='return isDelete();'") . "</td>";
					else
						echo "<td align='center'>---</td>";
					echo "</tr>";
				}
			?>
			</table>
		</div>
	</body>
</html>	