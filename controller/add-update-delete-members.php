<?php 

require 'Database.class.php';

/*==========================================
=            Section Add Member            =
==========================================*/

if (isset($_GET['do']) && $_GET['do'] == 'insert') {

	$user		= $_POST['username'];
	$pass		= $_POST['Password'];
	$email 		= $_POST['Email'];
	$Full 		= $_POST['Full-Name'];
	$image 		= $_POST['image'];

	/*
	|||	   ckeck if users info currect or not
	*/

	$FormError = array();

	if (strlen($user) < 4) {

		$FormError[] = "username can't be less than <strong>4 charcter</strong>";
	}

	if (empty($user)) {

		$FormError[] = "username can't be <strong>empty</strong>";
	}

	if (empty($pass)) {

		$FormError[] = "Password can't be <strong>empty</strong>";
	}

	if (empty($email)) {

		$FormError[] = "Email can't be <strong>empty</strong>";
	}

	if (empty($Full)) {

		$FormError[] = "Full Name can't be <strong>empty</strong>";
	}

	/*
	|||	   save all wrongs in foreach
	*/

	foreach ($FormError as $Error) {
		
		echo "<div class='alert alert-danger'>" . $Error . "</div>";
	}


	/*
	|||	   function check items
	*/

	$db = new Database();
	$check = $db->getRow("SELECT Username FROM users WHERE Username = ?", [$user]);

	if (! empty($check)) {

	echo "<div class='alert alert-danger'>Sorry this <strong>username is already exist</strong></div>";

	/*
	|||	   else .... if the user info not exact in database
	*/

	} else {

		if (empty($FormError)) {

			/*
			|||		insert that info in database
			*/

			$db = new Database();
			$insertRow = $db->insertRow("INSERT INTO 
								users(Username, Password, Email, FullName, Image, RegStatus, Date) 
								VALUE(?, ?, ?, ?, ?, ?, Now())", 
								[$user, $pass, $email, $Full, $image, 1]);

			echo "<div class='alert alert-success'>";
			echo 'Record update</div>';
		}
	}

}

/*=====  End of Section Add Member  ======*/

/*===========================================
=            Section Edit Member            =
===========================================*/

if (isset($_GET['do']) && $_GET['do'] == 'edit') {
	
	$id 		= $_GET['ID'];

	$user		= $_POST['username'];
	$pass		= $_POST['Password'];
	$email 		= $_POST['Email'];
	$Full 		= $_POST['Full-Name'];
	$image 		= $_POST['image'];

	/*
	|||	   ckeck if users info currect or not
	*/

	$FormError = array();

	if (strlen($user) < 4) {

		$FormError[] = "username can't be less than <strong>4 charcter</strong>";
	}

	if (empty($user)) {

		$FormError[] = "username can't be <strong>empty</strong>";
	}

	if (empty($pass)) {

		$FormError[] = "Password can't be <strong>empty</strong>";
	}

	if (empty($email)) {

		$FormError[] = "Email can't be <strong>empty</strong>";
	}

	if (empty($Full)) {

		$FormError[] = "Full Name can't be <strong>empty</strong>";
	}

	/*
	|||	   function check items
	*/

	$db = new Database();
	$check = $db->getRow("SELECT Username FROM users WHERE Username = ?", [$user]);

	if (! empty($check) && $check['Username'] !== $user && $check['UserID'] !== $id) {

		$FormError[] = ">Sorry this <strong>username is already exist</strong>";

	}

	/*
	|||	   else .... if the user info not exact in database
	*/

	/*
	|||	   save all wrongs in foreach
	*/

	foreach ($FormError as $Error) {
		
		echo "<div class='alert alert-danger'>" . $Error . "</div>";
	}


	if (empty($FormError)) {

		/*
		|||		insert that info in database
		*/

	$db = new Database();
	$updateRow = $db->updateRow("UPDATE users SET 
				Username = ?, Password = ?, Email = ?, FullName = ?, Image = ?
				WHERE UserID = ?", 
				[$user, $pass, $email, $Full, $image, $id]);

		echo "<div class='alert alert-success'>";
		echo 'Record update</div>';

	}
	
}

/*=====  End of Section Edit Member  ======*/

/*=============================================
=            Section Delete Member            =
=============================================*/

if (isset($_GET['do']) && $_GET['do'] == 'delete') {

	$id = $_GET['ID'];

	/*
	||
	||||	if this user exact in database
	||||	delete him by ID
	||
	*/
	$db = new Database();
	$check = $db->getRow("SELECT * FROM users WHERE UserID = ?", [$id]);

	if (! empty($check)) { 

		$db = new Database();
		$deleteRow = $db->deleteRow("DELETE FROM users WHERE UserID = ?", [$id]);

		/*
		|||		and after that print this msg
		*/

		echo "<div class='alert alert-success'>Delete Is Done " . $id . "</div>";

	} else {

		echo "<div class='alert alert-success'>Valid ID</div>";		
	}

}

/*=====  End of Section Delete Member  ======*/

/*===============================================
=            Section Activate Member            =
===============================================*/

if (isset($_GET['do']) && $_GET['do'] == 'approve') {

	$id = $_GET['ID'];

	$db = new Database();
	$updateRow = $db->updateRow("UPDATE users SET RegStatus = ? WHERE UserID = ?", [1, $id]);

	echo "<div class='alert alert-danger'>User Approved</div>";
}

/*=====  End of Section Activate Member  ======*/


 ?>