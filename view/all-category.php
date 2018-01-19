<?php 

function custom_category_dash_submenu_page_callback() {

			$sort = "ASC";

			$sort_array = array("ASC", "DESC");

			if (isset($_GET["sort"]) && in_array($_GET["sort"], $sort_array)) {

				$sort = $_GET["sort"];
			}

			$db = new Database();
			$cats = $db->getRows('SELECT * FROM categories WHERE parent = 0 ORDER BY Ordering ' . $sort . ''); ?>

			<br /><br />
			<div class="container cats">
				<div class="panel panel-primary">
	
					<div class="panel-heading">Manage Categories</div>
					<div class="panel-body">
						<?php
							foreach ($cats as $cat) {

								echo "<div class='cat wrap'>";
									echo "<div class='hidden-buttom'>";
										echo "<a href='edit.php?post_type=category&page=edit_category&ID=". $cat["ID"] . "' class=' button'><i class='fa fa-edit'></i>Edit</a>";
										echo "<a data-toggle='modal' data-target='.bs-example-modal-sm' id='' href='" . plugin_dir_url(__FILE__) . "../controller/add-update-delete-category.php?do=delete&ID=" . $cat['ID'] . " ' class='delete_category button'><i class='fa fa-close'></i>Delete</a>";
									echo "</div>";
									echo "<h3 class=''>" . $cat["Name"] . "</h3><br />";
									echo "<p>" . $cat["Description"] . "</p>";

									echo '<div class="cat-satus-show">';
										if ($cat["Visibility"] == 1){ echo "<span class='vis'><i class='fa fa-low-vision'> </i> Hidden</span>";}
										if ($cat["Allow_Comment"] == 1){ echo "<span class='com'><i class='fa fa-commenting'> </i> Comment Disable</span>";}
										if ($cat['Allow_Ads'] == 1){ echo "<span class='ads'><i class='fa fa-thumb-tack'> </i> Ads Disable</span>";}	
									echo '</div>';

									$subCats = $db->getRows('SELECT * FROM categories WHERE parent = ' . $cat["ID"] . ' ORDER BY Ordering ' . $sort . '');

									echo '<p>';
										foreach ($subCats as $subCat) {
											echo "<a class='page-title-action' href='edit.php?post_type=category&page=edit_category&ID=" . $subCat["ID"] . " '><span class='sub-cat'>" . $subCat['Name'] . "</span></a>";
										}
									echo '</p>';

								echo "</div>";
							}
						?>
						<div class="modal fade bs-example-modal-sm" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel">
							<div class="modal-dialog modal-sm" role="document">
								<div class="modal-content">
									<div class="result-item">
										
									</div>
								</div>
							</div>
						</div>
						
					</div>
				</div>
			</div>
<?php } ?>