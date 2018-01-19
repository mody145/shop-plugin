<?php 

function custom_edit_category_dash_submenu_page_callback() {
	$id = $_GET['ID']; 

		$db = new Database();
		$info_edit = $db->getRow("SELECT * FROM categories WHERE ID = ?", [$id]);

		?>

		<div class="container send">

			<label class=" control-lable">Name</label>
			<form id="" class="add_category form-horizontal" action="<?php echo plugin_dir_url(__FILE__); ?>../controller/add-update-delete-category.php?do=edit&ID=<?php echo $id ?>" method="POST">

				<!-- start name of category field -->

				<div class=" ">
					<div class="">
						<input 
						type="text" 
						name="name" 
						value="<?php echo $info_edit['Name']; ?>" 
						class="" 
						autocomplete="off">
					</div>
				</div>

				<!-- end name of category field -->
				<!-- start Discription of category field -->

				<label class=" control-lable">Discription</label>
				<div class=" ">
					<div class="">
						<input 
						type="text" 
						name="Discription" 
						value="<?php echo $info_edit['Description']; ?>" 
						class="" 
						autocomplete="new-password">
					</div>
				</div>

				<!-- end Discription of category field -->
				<!-- start Ordering of category field -->

				<label class=" control-lable">Ordering</label>
				<div class=" ">
					<div class="">
						<input 
						type="text" 
						name="Ordering" 
						value="<?php echo $info_edit['Ordering']; ?>" 
						class="" 
						autocomplete="off">
					</div>
				</div>

				<!-- end Ordering of category field -->
				<!-- start parent type -->

				<label class=" control-lable">Parent ?</label>
				<div class=" ">
					<div class="">
						<select class="" name="parent">
							<option value="0">None</option>
							<?php 
							$db = new Database();
							$catParents = $db->getRows("SELECT * FROM categories WHERE parent = 0");
							//$catParents = selectllItems("*", "categories", "WHERE parent = 0", "", "ID", "ASC");

							foreach ($catParents as $catParent) {

								echo "<option ";
								if ($info_edit['parent'] == $catParent['ID']) { echo "selected"; }
								echo " value='" . $catParent['ID'] . "'>" . $catParent['Name'] . "</option>";
							}

							?>
						</select>
					</div>
				</div>

				<!-- end parent type -->
				<!-- start visiblity of category field -->

				<div class=" ">
					<label class=" control-lable">visible</label>
					<div class="">
						<div>
							<input 
							id="vis-yes" 
							type="radio" 
							name="Visible" 
							value="0" <?php if($info_edit["Visibility"] == 0) { echo "checked"; } ?> />

							<label for="vis-yes">Yes</label>
						</div>
						<div>
							<input 
							id="vis-no" 
							type="radio" 
							name="Visible" 
							value="1" <?php if($info_edit["Visibility"] == 1) { echo "checked"; } ?> />

							<label for="vis-no">No</label>
						</div>
					</div>
				</div>

				<!-- end visiblity of category field -->
				<!-- start Allow Comment of category field -->

				<div class=" ">
					<label class=" control-lable">Allow Comment</label>
					<div class="">
						<div>
							<input 
							id="com-yes" 
							type="radio" 
							name="Comment" 
							value="0"<?php if($info_edit["Allow_Comment"] == 0) { echo "checked"; } ?> />

							<label for="com-yes">Yes</label>
						</div>
						<div>
							<input 
							id="com-no" 
							type="radio" 
							name="Comment" 
							value="1" <?php if($info_edit["Allow_Comment"] == 1) { echo "checked"; } ?> />

							<label for="com-no">No</label>
						</div>
					</div>
				</div>

				<!-- end Allow Comment of category field -->
				<!-- start Allow Ads of category field -->

				<div class=" ">
					<label class=" control-lable">Allow Ads</label>
					<div class="">
						<div>
							<input 
							id="ads-yes" 
							type="radio" 
							name="Ads" 
							value="0" <?php if($info_edit["Allow_Ads"] == 0) { echo "checked"; } ?> />

							<label for="ads-yes">Yes</label>
						</div>
						<div>
							<input 
							id="ads-no" 
							type="radio" 
							name="Ads" 
							value="1" <?php if($info_edit["Allow_Ads"] == 1) { echo "checked"; } ?> />
							<label for="ads-no">No</label>
						</div>
					</div>
				</div>

				<!-- end Allow Ads of category field -->
				<!-- start submit button -->

				<div><span class="msg_success_add">
					<div>
						<input data-toggle="modal" data-target=".bs-example-modal-sm"
						type="submit" 
						value="New Category" 
						class="button button-primary" />
					</div>
				</div>

				<!-- start submit button -->

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