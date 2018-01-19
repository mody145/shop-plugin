<?php 

function custom_add_category_dash_submenu_page_callback() { ?>

		<div class="container send">

			<label class=" control-lable">Name</label>
			<form id="" class="add_category form-horizontal" action="<?php echo plugin_dir_url(__FILE__); ?>../controller/add-update-delete-category.php?do=insert" method="POST">

				<!-- start name of category field -->

				<div class=" ">
					<div class="">
						<input 
						type="text" 
						name="name" 
						placeholder="Insert Name Of Category Here" 
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
						placeholder="Insert Discription Of Category Here" 
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
						placeholder="Insert Ordering To Arrage The Category" 
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

								echo "<option value='" . $catParent['ID'] . "'>" . $catParent['Name'] . "</option>";
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
							value="0" checked />

							<label for="vis-yes">Yes</label>
						</div>
						<div>
							<input 
							id="vis-no" 
							type="radio" 
							name="Visible" 
							value="1" />

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
							value="0" checked />

							<label for="com-yes">Yes</label>
						</div>
						<div>
							<input 
							id="com-no" 
							type="radio" 
							name="Comment" 
							value="1" />

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
							value="0" checked />

							<label for="ads-yes">Yes</label>
						</div>
						<div>
							<input id="ads-no" type="radio" name="Ads" value="1" />
							<label for="ads-no">No</label>
						</div>
					</div>
				</div>

				<!-- end Allow Ads of category field -->
				<!-- start submit button -->

				<div data-toggle="modal" data-target=".bs-example-modal-sm">
					<div class="">
						<input 
						type="submit" 
						value="New Category" 
						class="button button-primary">
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