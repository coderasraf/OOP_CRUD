<?php include 'inc/header.php'; ?>
<?php 

	include 'config.php';
	include 'Database.php'; 

	$id = $_GET['id'];
	$db = new Database();	
	$query = "SELECT * FROM users WHERE user_id='$id'";
	$getData = $db->select($query);
	$result = $getData->fetch_assoc();


	if (isset($_POST['submit'])) {
		$name = mysqli_real_escape_string($db->link, $_POST['name']);
		$email = mysqli_real_escape_string($db->link, $_POST['email']);
		$status = mysqli_real_escape_string($db->link, $_POST['status']);

		if ($name == '' || $email == '' || $status == '') {
			$error = 'Field must not be empty!';
		}else{
			$query = "UPDATE users
					SET 
					fname = '$name',
					email = '$email',
					status = '$status'
					WHERE user_id = '$id'
					";
			$update = $db->update($query);
		}
	}


	// Delete item
	if (isset($_POST['delete'])) {
		$query = "DELETE FROM users WHERE user_id='$id'";
		$delete = $db->delete($query);
	}

?>




<form action="update.php?id=<?= $id; ?>" method="POST">
	<input value="<?= $result['fname']; ?>" type="text" name="name" placeholder="Eneter name" style="width: 100%;padding: 10px;border: 1px solid #ddd;box-shadow: 0 0 5px #ddd;margin-bottom: 10px;border-radius: 5px">

	<input value="<?= $result['email']; ?>" type="email" name="email" placeholder="Eneter Email" style="width: 100%;padding: 10px;border: 1px solid #ddd;box-shadow: 0 0 5px #ddd;margin-bottom: 10px;border-radius: 5px">

	<input value="<?= $result['status']; ?>" type="text" name="status" placeholder="Your status" style="width: 100%;padding: 10px;border: 1px solid #ddd;box-shadow: 0 0 5px #ddd;margin-bottom: 10px;border-radius: 5px">

	<input type="submit" style="border: none;padding: 10px 30px;font-size: 15px; border-radius: 5px;background: blue;color: #fff" value="Submit" name="submit">

	<input type="submit" style="border: none;padding: 10px 30px;font-size: 15px; border-radius: 5px;background: blue;color: #fff" value="Delete" name="delete">

</form>


<?php include 'inc/footer.php'; ?>