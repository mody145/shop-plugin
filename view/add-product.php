<?php
print_r(get_post_custom_values("ImageURL"));
function add_product_my_custom_submenu_page_callback() {  ?>

		<img id="blah" class="thumbnail Image_new_item" src="">
		<div class="container send">

			<form id="" action="<?php echo plugin_dir_url(__FILE__); ?>../controller/add-update-delete-product.php?do=insert" method="POST" class="add_product form-horizontal send-item1" enctype="multipart/form-data">
				
				<!-- start image upload -->
				<div class="show_image">
					<img src="">
				</div>
				<input class="image_er_link" type="hidden" name="image">
				<label class="control-lable"></label>
				<div id="user_custom_Image" class="custom_file">
					<i class="fa fa-picture-o fa-2x"></i>
					<span class="text-uppercase">Choose Images</span>
				</div>
				<!-- end image upload -->
				<!-- start multie images upload -->
				<div class="show_images">
					<img src="">
				</div>
				<input class="images_er_link" type="hidden" name="images">
				<label class="control-lable"></label>
				<div id="user_custom_Images" class="custom_file">
					<i class="fa fa-picture-o fa-2x"></i>
					<span class="text-uppercase">Upload Image</span>
				</div>
				<!-- end multi images upload -->
				<!-- start name of the item field -->
				<label class="control-lable">Name</label>
					<input 
					type="text" 
					name="name" 
					placeholder="Name Of The Item Here" 
					class="" 
					autocomplete="off">
				<!-- end name of the item field -->
				<!-- start Description of the item field -->
				<label class="control-lable">Description</label>
					<input 
					type="text" 
					name="Description"   
					placeholder="Description Of The Item Here" 
					class="" 
					autocomplete="off"><span class="msg-dis"> </span>
				<!-- end Description of the item field -->
				<!-- start Full Description of the item field -->

				<label class="control-lable">Full Description</label>
					<textarea id="editor" name="Full_dis" type='textarea' placeholder="Type you full Description here" class="" rows="5"></textarea><span class="msg-fulldis"></span>

				<!-- end Full Description of the item field -->
				<!-- start price of the item field -->
				<label class="control-lable">Price</label>
					<input 
					type="text" 
					name="Price" 
					placeholder="Price Of The Item Here" 
					class="" 
					autocomplete="off"><span class="msg-Price"></span>
				<!-- end price of the item field -->
				<!-- start price of the item field -->
				<label class="control-lable">Sale <sub>Optional</sub></label>
					<input 
					type="text" 
					name="price_instead" 
					placeholder="price After Descount" 
					class="" 
					autocomplete="off"><span class="msg-Price"></span>
				<!-- end price of the item field -->				
				<!-- start country of the item field -->
				<label class="control-lable">country</label>
					<input 
					type="text" 
					name="country" 
					placeholder="country Of The Item Here" 
					class="" 
					autocomplete="off"><span class="msg-country"></span>
				<!-- end country of the item field -->
				<!-- start status of the item field -->
				<label class="control-lable">status</label>
					<select class="" name="status">
						<option value="0">...</option>	
						<option value="1">New</option>	
						<option value="2">Like New</option>	
						<option value="3">Used</option>	
						<option value="4">Very Old</option>	
					</select><span class="msg-Satus"></span>
				<!-- end status of the item field -->
				<!-- start user linked field -->
				<label class="control-lable">User</label>
				<div class="">
					<div class="">
						<select class="" name="user">
							<option value="0">...</option>

								<?php 	$db = new Database();
										$users = $db->getRows("SELECT * FROM users");

										foreach ($users as $user) {

											echo "<option value=" . $user['UserID'] . ">" . $user['Username'] . "</option>";
										}
								 ?>
						</select>
					</div>
				</div>

				<!-- end user linked field -->
				<!-- start Category linked field -->
				<label class="control-lable">Category</label>
					<select class=" parent-cat" name="cat">
						<option value="0">...</option>
							<?php 	
									$db = new Database();
									$cats = $db->getRows("SELECT * FROM categories WHERE parent != 0");

									foreach ($cats as $cat) {
										echo "<option value='" . $cat['ID'] . "'" . ">" . $cat['Name'] . "</option>";
									}
							 ?>
					</select><span class="msg-cat"></span>
				<!-- end Category linked field -->
				<!-- start submit button -->

				<label class="control-lable"></label>
						<input 
						type="submit" 
						value="Add Item" 
						class="button button-primary" data-toggle="modal" data-target=".bs-example-modal-sm"><span class="msg_success_add"></span>

					<span class="modal fade bs-example-modal-sm" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel">
						<div class="modal-dialog modal-sm" role="document">
							<div class="modal-content">
								<div class="result-item">
									
								</div>
							</div>
						</div>
					</span>
				<!-- end submit button -->
		</div>

<?php } ?>