<!DOCTYPE html>
<html>
<head>
	<title>GivePulse Users</title>
	
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
	<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.9.0/css/all.css">
</head>
<body>

<?php require_once 'process.php'; ?>

<?php if(isset($_SESSION['message'])): ?>


<div class="alert alert-<?= $_SESSION['msg-type']; ?>">
<?php 
	echo $_SESSION['message'];
	unset($_SESSION['message']);
?>
</div>
<?php endif ?>

<div class="container">
	<br>
	<button class="btn btn-default" id="up"><a href="#newUser" style="u">Create New User</a></button>
	<br><br>
<?php

$mysqli = new mysqli('localhost', 'root', '', 'givepulse_test');
$result = $mysqli->query("SELECT id, first_name, last_name, city FROM users");

?>

<div class="row justify-content-center">
	<table class="table">
		<thead>
			<tr>
				<th>First Name</th>
				<th>Last Name</th>
				<th>City</th>
				<th colspan="2">Action</th>
			</tr>
		</thead>

		<?php while($row = $result->fetch_assoc()): ?>
		<tr>
			<td><?php echo $row['first_name']; ?></td>
			<td><?php echo $row['last_name']; ?></td>
			<td><?php echo $row['city']; ?></td>
			<td>
				<a href="index.php?edit=<?php echo $row['id']; ?>" class = "btn btn-warning" >Edit</a>
				<a href="index.php?delete=<?php echo $row['id']; ?>" class = "btn btn-danger" >Delete</a>
			</td>
		</tr>
	<?php endwhile; ?>
	</table>
</div>



<div class="row justify-content-center">
	<form action="process.php" method="POST">
		<input type="hidden" name="id" value="<?php echo $id; ?>">
		<div class="form-group">
			<?php if($update == true): ?>
				<h3>Update User</h3>				
			<?php else: ?>
				<h3 id="newUser">New User</h3>	
		<?php endif; ?>
			
		</div>
		<div class="form-group">
			<label>First Name</label>
			<input type="text" name="first_name" class="form-control" placeholder="Enter your first name" value="<?php echo $first_name; ?>">	
		</div>

		<div class="form-group">
			<label>Last Name</label>
			<input type="text" name="last_name" class="form-control" placeholder="Enter your last name" value="<?php echo $last_name; ?>">	
		</div>
		
		<div class="form-group">
			<label>City</label>
			<input type="text" name="city" class="form-control" placeholder="Enter your City" value="<?php echo $city; ?>">	
		</div>
		
		<div class="form-group">
			<?php if($update == true): ?>
				<button type="submit" class="btn btn-info" name="update">Update</button>

			<?php else: ?>
			<button type="submit" class="btn btn-primary" name="save">Save</button>	
		<?php endif; ?>
		</div>
		
	</form>
	
</div>
<a href="#up"><i class="fas fa-angle-double-up"> Go Up</i></a>	
</div>


<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</body>
</html>