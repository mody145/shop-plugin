<?php 

require 'Database.class.php';

if (isset($_GET['do']) && $_GET['do'] == 'delete') {

	$id = $_GET['ID'];

	/*
	||
	||||	if this comment exist in database
	||||	delete it by ID
	||
	*/

	$db = new Database();
	$stmt = $db->getRow("SELECT * FROM comments WHERE c_id = ?", [$id]); 

	if (! empty($stmt)) { 

		$db = new Database();
		$deleteRow = $db->deleteRow("DELETE FROM comments WHERE c_id = ?", [$id]);

		/*
		|||		and after that print this msg
		*/

		echo "<div class='alert alert-success'>Delete Is Done</div>";

	} else {

		echo "<div class='alert alert-danger'>Valid ID</div>";
	}
}

 ?>