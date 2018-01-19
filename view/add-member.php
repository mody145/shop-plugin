<?php 

function custom_members_add__callback() { ?>

		<div class="container send">

			<!-- main Form -->
			<form id="" class="add_member form-horizontal" action="<?php echo plugin_dir_url(__FILE__); ?>../controller/add-update-delete-members.php?do=insert" method="POST">
			<!-- start image upload -->
			<div class="show_image">
				<img src="">
			</div>
			<input class="image_er_link" type="hidden" name="image">
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
						placeholder="Insert username Here" 
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
						placeholder="Insert Email Here" 
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
						placeholder="Insert Full Name Here" 
						class="" 
						autocomplete="off">
					</div>
				</div><br />

				<!-- end full name field -->
				<!-- start submit button -->

				<div class="P ">
					<div data-toggle="modal" data-target=".bs-example-modal-sm">
						<input 
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