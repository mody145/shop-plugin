<?php

function view_product_my_custom_submenu_page_callback() { 

	/*
	|||		Pagination
	*/

	// User input
 	$pagen 		= isset($_GET['pagen']) ? (int)$_GET['pagen'] : 1;
 	$perPagen	= isset($_GET['per-pagen']) && $_GET['per-pagen'] <= 50 ? (int)$_GET['per-pagen'] : 10;

 	// Positioning
 	$start 		=  ($pagen > 1) ? ($pagen * $perPagen) - $perPagen : 0;

	/*
	||| select all items (by new name) from table items and join categories 
	|||	on (categories.ID = items.Cat_ID) matching and
	|||	on (users.UserID = items.Member_ID)
	*/

	$db = new Database();
	$items = $db->getRows("SELECT SQL_CALC_FOUND_ROWS
								items.*, 
								categories.Name AS category_name, 
								users.Username AS UserN
							FROM 
								items
							INNER JOIN 
								categories 
							ON 
								categories.ID = items.Cat_ID 
							INNER JOIN 
								users 
							ON 
								users.UserID = items.Member_ID
							ORDER BY 
								Item_ID DESC LIMIT {$start}, {$perPagen}");

	/* ---||  For Pagination  ||--- */
	$total 		= $db->getRow('SELECT FOUND_ROWS() AS total'); 

	$pages 		= ceil($total['total'] / $perPagen);
	/* ---||  For Pagination  ||--- */

	?>

	<!-- start layout page -->
	
	<div class="container">

		<table class="main-table text-center table table-bordered">

		<tr class='head_table'>
			<td>ID</td>
			<td data-class='.nameT'>Name <i class='fa fa-close pull-right'> </i></td>
			<td class="hidden-xs" data-class='.DescriptionT'>Description <i class='fa fa-close pull-right'> </i></td>
			<td class="hidden-xs" data-class='.PriceT'>Price <i class='fa fa-close pull-right'> </i></td>
			<td class="hidden-xs" data-class='.Country_MadeT'>Country Made <i class='fa fa-close pull-right'> </i></td>
			<td class="hidden-xs" data-class='.StatusT'>Status <i class='fa fa-close pull-right'> </i></td>
			<td class="hidden-xs" data-class='.RatingT'>Rating <i class='fa fa-close pull-right'> </i></td>
			<td class="hidden-xs" data-class='.category_nameT'>Category <i class='fa fa-close pull-right'> </i></td>
			<td data-class='.UserNameT'>Member <i class='fa fa-close pull-right'> </i></td>
			<td>Setting</td>
		</tr>

		<?php 

	/*
	||
	||||	get users info from database
	||||	and show it in table
	||
	*/

	foreach ($items as $item) {

	echo "<tr>";
		echo "<td>" . $item["Item_ID"] . "</td>";
		echo "<td class='nameT'>" . $item["Name"] . "</td>";
		echo "<td class='hidden-xs DescriptionT'>" . $item["Description"] . "</td>";
		echo "<td class='hidden-xs PriceT'>" . $item["Price"] . "</td>";
		echo "<td class='hidden-xs Country_MadeT'>" . $item["Country_Made"] . "</td>";
		echo "<td class='hidden-xs StatusT'>";
		if ($item["Status"] == 1) {echo "New";} elseif ($item["Status"] == 2) {echo "Like New";} elseif($item["Status"] == 3) {echo "Used";} elseif($item["Status"] == 4) {echo "Very old";} else {echo "";}
		echo "</td>";
		echo "<td class='hidden-xs RatingT'>";
		echo $item["Rating"];
		echo "</td>";
		echo "<td class='hidden-xs category_nameT'>" . $item["category_name"] . "</td>";
		echo "<td class='UserNameT'>" . $item["UserN"] . "</td>";

		/* settings buttons */

		echo "<td>

			<a href='edit.php?post_type=product&page=edit_Product&itemID=". $item['Item_ID'] ."' class='button btn-sm'><i class='fa fa-edit'> </i> Edit</a>
			<a data-toggle='modal' data-target='.bs-example-modal-sm' id='' href='" . plugin_dir_url(__FILE__) . "../controller/add-update-delete-product.php?do=delete&itemID=" . $item['Item_ID'] ." ' class='delete_product button btn-sm'><i class='fa fa-close'> </i> Delete</a>";
			if ($item['Approve'] == 0) {

				echo "<a href='" . plugin_dir_url(__FILE__) . "../controller/add-update-delete-product.php?do=active&itemID=" . $item['Item_ID'] ." ' class='approve_product button btn-sm active1'><i class='fa fa-check'> </i> Approve</a>";
			}
		echo "</td>";

	echo "</tr>";
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

		</table>
	</div>

	<div class="pagination1">
	<?php 
	for ($i=1; $i <= $pages ; $i++) { ?>

		<a href="edit.php?post_type=product&page=view_Product&pagen=<?php echo $i; ?>&per-pagen=<?php echo $perPagen; ?>" <?php if ($pagen == $i) { echo 'class="selected"'; } ?>><?php echo $i; ?></a>
	
	<?php } ?>
	</div>

<?php } ?> 