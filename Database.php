<?php 
	class Database{
		
		public $host = DB_HOST;
		public $user = DB_USER;
		public $pass = DB_PASS;
		public $db   = DB_NAME;
		public $link;
		public $error;


		public function __construct(){
			return $this->connectDB();
		}

		// Database connection
		private function connectDB(){
			$this->link = new mysqli($this->host,$this->user,$this->pass,$this->db);
			if (!$this->link) {
				$this->error = 'Connection Failed'.$this->link->connect_error();
				return false;
			}
		}

		// Select or read Database
		public function select($query){
			$result = $this->link->query($query) or die($this->link->error.__LINE__);
			if ($result->num_rows > 0) {
				return $result;
			}else{
				return false;
			}
		}


		// Create or insert data into database table
		public function insert($query){
			$insert_row = $this->link->query($query) or die($this->link->error.__LINE__);
			if ($insert_row) {
				header('location:index.php?msg='.urlencode('Data inserted successfully!'));
				exit();
			}else{
				echo "<script>alert('Data not inserted!')</script>";
			}
		}


		// Update data
		public function update($query){
			$update_row = $this->link->query($query) or die($this->link->error.__LINE__);
			if ($update_row) {
				header('location:index.php?msg='.urlencode('Data Updated successfully!'));
				exit();
			}
		}

		// Delete data
		public function delete($query){
			$delete_row = $this->link->query($query) or die($this->link->error.__LINE__);
			if ($delete_row) {
				header('location:index.php?msg='.urlencode('Data Deleted successfully!'));
				exit();
			}
		}

	}



 ?>