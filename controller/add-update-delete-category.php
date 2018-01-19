<?php 

require 'Database.class.php';

/*============================================
=            Section Add Category            =
============================================*/

if (isset($_GET['do']) && $_GET['do'] == 'insert') {

	/*
	|||	   get info for this Category from page REQUEST POST
	*/

	$name		= $_POST['name'];
	$dis		= $_POST['Discription'];
	$parent		= $_POST['parent'];
	$ord 		= $_POST['Ordering'];
	$vis 		= $_POST['Visible'];
	$com 		= $_POST['Comment'];
	$ads 		= $_POST['Ads'];

	$errors = array();

	if (empty($name)) {

		$errors[] = '<div class="alert alert-danger">Name Category <strong>Cant Be Empty</strong></div>';
	}

	if (empty($dis)) {

		$errors[] = '<div class="alert alert-danger">Descrption Category <strong>Cant Be Empty</strong></div>';
	}

	if (empty($ord)) {

		$errors[] = '<div class="alert alert-danger">Order Category <strong>Cant Be Empty</strong></div>';
	}

	if (! empty($errors)) {

		foreach ($errors as $error) {

			echo $error;
		}

	} else {

		$db = new Database();
		$checkName = $db->getRow("SELECT * FROM categories WHERE Name = ?", [$name]);

		if (! empty($checkName)) { // if is this category already exist

			echo "<div class='alert alert-danger'>Sorry this Name is already <strong>exist</strong></div>";

		} else {

			/*
			|||		insert that Catecory info in database
			*/

			$insertRow = $db->insertRow("INSERT INTO 
								categories(Name, Description, parent, Ordering, Visibility, Allow_Comment, Allow_Ads) 
								VALUE(?, ?, ?, ?, ?, ?, ?)", 
								[$name, $dis, $parent, $ord, $vis, $com, $ads]);

			echo "<div class='alert alert-success'>";
			echo 'Record update</div>';

		}
	}
}

/*=====  End of Section Add Category  ======*/

/*=============================================
=            Section Edit Category            =
=============================================*/

if (isset($_GET['do']) && $_GET['do'] == 'edit') {

	/*
	||| 	get me all category info from REQUST POST page
	*/

	$id 		= $_GET['ID'];

	$cat		= $_POST['name'];
	$dis		= $_POST['Discription'];
	$parent		= $_POST['parent'];
	$ord 		= $_POST['Ordering'];
	$vis 		= $_POST['Visible'];
	$com 		= $_POST['Comment'];
	$ads 		= $_POST['Ads'];

	$errors = array();

	if (empty($cat)) {

		$errors[] 	= '<div class="alert alert-danger">Name Category <strong>Cant Be Empty</strong></div>';
	}

	if (empty($dis)) {

		$errors[] 	= '<div class="alert alert-danger">Descrption Category <strong>Cant Be Empty</strong></div>';
	}

	if (empty($ord)) {

		$errors[] 	= '<div class="alert alert-danger">Order Category <strong>Cant Be Empty</strong></div>';
	}

	/*
	||
	||||	if there is no error
	||||	start insert category new info in database
	||
	*/

	if (! empty($errors)) {

		foreach ($errors as $error) {

			echo $error;
		}

	} else {

		$db = new Database();
		$updateRow = $db->updateRow("UPDATE categories SET 
					Name = ?, Description = ?, parent = ?, Ordering = ?, Visibility = ?, Allow_Comment = ?, Allow_Ads = ?
					WHERE ID = ?", 
					[$cat, $dis, $parent, $ord, $vis, $com, $ads, $id]);

		echo "<div class='alert alert-success'>";
		echo 'Record update';
		echo "</div>";
	}
}

/*=====  End of Section Edit Category  ======*/

/*===============================================
=            Section Delete Category            =
===============================================*/

if (isset($_GET['do']) && $_GET['do'] == 'delete') {
	
	$id = $_GET['ID'];


	/*
	||
	||||	if this Category exact in database
	||||	delete him by ID
	||
	*/

	$db = new Database();
	$stmt = $db->getRow("SELECT * FROM categories WHERE ID = ?", [$id]); 

	if (! empty($stmt)) { 

		$db = new Database();
		$deleteRow = $db->deleteRow("DELETE FROM categories WHERE ID = ?", [$id]);

		/*
		|||		and after that print this msg
		*/

		echo "<div class='alert alert-success'>Delete Is Done</div>";

	} else {

		echo "<div class='alert alert-danger'>Wrong ID</div>";
	}
	
}

/*=====  End of Section Delete Category  ======*/


 ?>