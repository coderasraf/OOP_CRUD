<?php include 'inc/header.php'; ?>
<?php 

	include 'config.php';
	include 'Database.php'; 
	$db = new Database();

	$query = "SELECT * FROM users";
	$read = $db->select($query);

	if (isset($_GET['msg'])) {
		$success = urldecode($_GET['msg']);
		echo $success;
	}

?>

	
	<table style="text-align: center;" border-collapse="none" width="100%" class="tblone" border="1px solid #ddd">
		<thead>
			<tr>
				<th>Name</th>
				<th>Email</th>
				<th>URL</th>
				<th>Action</th>
			</tr>
		</thead>
		<tbody>
			<?php if ($read) { ?>

				<?php while ($row = $read->fetch_array()) { ?>
					<tr>
						<td><?= $row['fname'].' '.$row['lname'];  ?></td>
						<td><?= $row['email']; ?></td>
						<td><?= $row['status']; ?></td>
						<td>
							<a href="update.php?id=<?= $row['user_id']; ?>">Update</a>
						</td>
					</tr>
				<?php } ?>
			<?php }else{ ?>
					<?php
						$error = 'Data is not available';
					 ?>
				<?php } ?>
		</tbody>
		<a href="create.php">Create</a>
	</table>


<?php include 'inc/footer.php'; ?>