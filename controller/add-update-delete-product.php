<?php 

require 'Database.class.php';

/*===========================================
=            Section Add Product            =
===========================================*/

if (isset($_GET['do']) && $_GET['do'] == 'insert') {

	/*
	||
	||||	check if there REQUEST GET by name do
	||||	show all of this
	||
	*/	

	/*
	|||	   get info for this Items from page REQUEST POST
	*/

	$image			= $_POST['image'];
	$images			= $_POST['images'];
	$Name			= $_POST['name'];
	$Dis			= $_POST['Description'];
	$full_dis		= $_POST['Full_dis'];
	$Price 			= $_POST['Price'];
	$Price_i		= $_POST['price_instead'];
	$country 		= $_POST['country'];
	$status 		= $_POST['status'];
	$cat 			= $_POST['cat'];
	$user 			= $_POST['user'];




	/*
	|||	   ckeck if Items info currect or not
	*/

	$FormError = array();

	if (empty($image)) {

		$FormError[] = "You Must Upload <strong>Image</strong>";
	}

	if (empty($Name)) {

		$FormError[] = "Name can't be <strong>empty</strong>";
	}

	if (empty($Dis)) {

		$FormError[] = "Description can't be <strong>empty</strong>";
	}

	if (empty($Price)) {

		$FormError[] = "Price can't be <strong>empty</strong>";
	}

	if ($Price_i >= $Price) {

		$FormError[] = "<strong>Sale</strong> Cant Be Larger Than Main <strong>Price</strong>";
	}

	if (empty($country)) {

		$FormError[] = "country can't be <strong>empty</strong>";
	}

	if (empty($full_dis)) {

		$FormError[] = "Full description can't be <strong>empty</strong>";
	}

	if ($status == 0) {

		$FormError[] = "You must be shoose <strong>Satus</strong>";
	}

	if ($user == 0) {

		$FormError[] = "You must be shoose <strong>User</strong>";
	}

	if ($cat == 0) {

		$FormError[] = "You must be shoose <strong>cat</strong>";
	}				

	/*
	|||	   save all wrongs in foreach
	*/

	// print all error
	foreach ($FormError as $Error) { 
		
		echo "<div class='alert alert-danger'>" . $Error . "</div>";
	}

	if (empty($FormError)) {

		/*
		|||		insert that info in database
		*/

		$db = new Database();
		$insertRow = $db->insertRow("INSERT INTO 
			items(Image, Image_slider, Name, Description, Full_dis, Price, i_price, Country_Made, Status, Add_Date, Cat_ID, Member_ID) 
			VALUE(?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)", 
			[$image, $images, $Name, $Dis, $full_dis, $Price, $Price_i, $country, $status, 'now()', $cat, $user]);

		//print success msg

		echo "<div class='alert alert-success'>";
		echo 'Record update</div>';
	}		
}

/*=====  End of Section Add Product  ======*/

/*=============================================
=            Section Update Product           =
=============================================*/



if (isset($_GET['do']) && $_GET['do'] == 'edit') {

	/*
	||| 	get me all user info from REQUST POST page
	*/

	$image			= $_POST['image'];
	$images			= $_POST['images'];
	$ID1 			= $_GET['itemID'];
	$Name1			= $_POST['name'];
	$Dis1			= $_POST['Description'];
	$fullDis1		= $_POST['Full_dis'];
	$Price1 		= $_POST['Price'];
	$i_Price		= $_POST['price_instead'];
	$country1 		= $_POST['country'];
	$status1		= $_POST['status'];
	$cat1			= $_POST['cat'];
	$user1			= $_POST['user'];


	$FormError = array();

	if (empty($image)) {

		$FormError[] = "You Must Upload <strong>Image</strong>";
	}

	if (empty($Name1)) {
		$FormError[] 	= "Name can't be <strong>empty</strong>";
	}

	if (empty($Dis1)) {
		$FormError[] 	= "Description can't be <strong>empty</strong>";
	}

	if (empty($fullDis1)) {
		$FormError[] 	= "Description can't be <strong>empty</strong>";
	}				

	if (empty($Price1)) {
		$FormError[] 	= "Price can't be <strong>empty</strong>";
	}

	if ($i_Price >= $Price1) {

		$FormError[] = "<strong>Sale</strong> Cant Be Larger Than Main <strong>Price</strong>";
	}	

	if (empty($country1)) {
		$FormError[] 	= "country can't be <strong>empty</strong>";
	}

	if ($status1 == 0) {
		$FormError[] 	= "You must be shoose <strong>Satus</strong>";
	}

	if ($user1 == 0) {
		$FormError[] 	= "You must be shoose <strong>user</strong>";
	}

	if ($cat1 == 0) {
		$FormError[] 	= "You must be shoose <strong>cat</strong>";
	}								

	/*
	|||	   save all wrongs in foreach
	*/

	// print all error
	foreach ($FormError as $Error) { 
		
		echo "<div class='alert alert-danger'>" . $Error . "</div>";
	}


	/*
	||
	||||	if there is no error
	||||	start insert user new info in database
	||
	*/


	if (empty($FormError)) {

		$db = new Database();
		$updateRow = $db->updateRow("UPDATE items SET 
													Image = ?, Image_slider = ?, Name = ?, Description = ?, Full_dis =?, Price = ?, i_price = ?, Country_Made = ?, Status = ?, Cat_ID = ?, Member_ID = ? WHERE Item_ID = ?",
													 [$image, $images, $Name1, $Dis1, $fullDis1, $Price1, $i_Price, $country1, $status1, $cat1, $user1, $ID1]);

		echo "<div class='alert alert-success'>";
		echo 'Record update';
		echo "</div>";

	}	

}

/*=====  End of Section Update Product  ======*/

/*======================================
=            Delete Product            =
======================================*/

if (isset($_GET['do']) && $_GET['do'] == 'delete') {

	$ID1 = $_GET['itemID'];

	/*
	||
	||||	if this user exact in database
	||||	delete him by ID
	||
	*/

	$db = new Database();
	$stmt = $db->getRow("SELECT * FROM items WHERE Item_ID = ?", [$ID1]); 

	if (! empty($stmt)) { 

		$db = new Database();
		$deleteRow = $db->deleteRow("DELETE FROM items WHERE Item_ID = ?", [$ID1]);

		/*
		|||		and after that print this msg
		*/

		echo "<div class='alert alert-success'>Delete Is Done</div>";

	} else {

		echo "<div class='alert alert-danger'>Wrong ID</div>";
	}
	
}

/*=====  End of Delete Product  ======*/

/*========================================
=            Section Activate            =
========================================*/

if (isset($_GET['do']) && $_GET['do'] == 'active') {

	$id = $_GET['itemID'];

	$db = new Database();
	$updateRow = $db->updateRow("UPDATE items SET Approve = ? WHERE Item_ID = ?", [1, $id]);

	echo "<div class='alert alert-danger'>Product Approved</div>";
}

/*=====  End of Section Activate  ======*/
 ?>