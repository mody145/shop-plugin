<?php 

function custom_edit_member_submenu_page_callback() {
	$id = $_GET['userID'];

	$db = new Database();
	$info_edit = $db->getRow("SELECT * FROM users WHERE UserID = ?", [$id]);

	?>
		<div class="container send">

			<!-- main Form -->
			<form id="" class="add_member form-horizontal" action="<?php echo plugin_dir_url(__FILE__); ?>../controller/add-update-delete-members.php?do=edit&ID=<?php echo $id ?>" method="POST">
			<!-- start image upload -->
			<div class="show_image">
				<img src="<?php echo $info_edit['Image']; ?>">
			</div>
			<input class="image_er_link" type="hidden" name="image" value="<?php echo $info_edit['Image']; ?>">
			<label class="control-lable"></label>
			<div id="user_custom_Image" class="custom_file">
				<i class="fa fa-picture-o fa-2x"></i>
				<span class="text-uppercase">Upload Image</span>
			</div>
			<!-- end image upload -->
			<!-- insert username field -->
				<div class="">
					<div class="">
						<label class="control-lable">Username</label>
						<input 
						type="text" 
						name="username" 
						value="<?php echo $info_edit['Username']; ?>" 
						class="" 
						autocomplete="off">
					</div>
				</div>

				<!-- end username field -->
				<!-- start password field -->

				<div class="">
					<div class="">
						<label class="control-lable">Password</label>
						<input 
						type="Password" 
						name="Password" 
						placeholder="Insert Password Here" 
						class="" 
						required="required" 
						autocomplete="new-password">
					</div>
				</div>

				<!-- end password field -->
				<!-- start Email field -->

				<div class="">
					<div class="">
						<label class="control-lable">Email</label>
						<input 
						type="Email" 
						name="Email" 
						value="<?php echo $info_edit['Email']; ?>" 
						class="" 
						autocomplete="off">
					</div>
				</div>

				<!-- end Email faild -->
				<!-- start full name field -->

				<div class="">
					<div class="">
						<label class="control-lable">Full Name</label>
						<input 
						type="text" 
						name="Full-Name" 
						value="<?php echo $info_edit['FullName']; ?>"  
						class="" 
						autocomplete="off">
					</div>
				</div><br />

				<!-- end full name field -->
				<!-- start submit button -->

				<div class="P ">
					<div>
						<input data-toggle="modal" data-target=".bs-example-modal-sm"
						type="submit" 
						value="Save" 
						class="button button-primary">
					</div>
				</div>
				<!-- end submit button -->

				<span class="modal fade bs-example-modal-sm" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel">
					<div class="modal-dialog modal-sm" role="document">
						<div class="modal-content">
							<div class="result-item">
								
							</div>
						</div>
					</div>
				</span>

			</form>
		</div>

<?php } ?>