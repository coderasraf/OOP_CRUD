<?php include 'inc/header.php'; ?>
<?php 

	include 'config.php';
	include 'Database.php'; 
	$db = new Database();	

	if (isset($_POST['submit'])) {
		
		$name = mysqli_real_escape_string($db->link, $_POST['name']);
		$email = mysqli_real_escape_string($db->link, $_POST['email']);
		$status = mysqli_real_escape_string($db->link, $_POST['status']);

		if ($name == '' || $email == '' || $status == '') {
			$error = 'Field must not be empty!';
		}else{

			$query = "INSERT INTO users(fname,email,status) VALUES('$name','$email','$status')";
			$create = $db->insert($query);
		}
	}

?>




<form action="" method="POST">
	<input type="text" name="name" placeholder="Eneter name" style="width: 100%;padding: 10px;border: 1px solid #ddd;box-shadow: 0 0 5px #ddd;margin-bottom: 10px;border-radius: 5px">

	<input type="email" name="email" placeholder="Eneter Email" style="width: 100%;padding: 10px;border: 1px solid #ddd;box-shadow: 0 0 5px #ddd;margin-bottom: 10px;border-radius: 5px">

	<input type="text" name="status" placeholder="Your status" style="width: 100%;padding: 10px;border: 1px solid #ddd;box-shadow: 0 0 5px #ddd;margin-bottom: 10px;border-radius: 5px">

	<input type="submit" style="border: none;padding: 10px 30px;font-size: 15px; border-radius: 5px;background: blue;color: #fff" value="Submit" name="submit">
</form>


<?php include 'inc/footer.php'; ?>