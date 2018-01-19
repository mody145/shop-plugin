<?php 

function custom_comments_all_submenu_page_callback() {

	/*
	|||		Pagination
	*/

	// User input
 	$pagen 		= isset($_GET['pagen']) ? (int)$_GET['pagen'] : 1;
 	$perPagen	= isset($_GET['per-pagen']) && $_GET['per-pagen'] <= 50 ? (int)$_GET['per-pagen'] : 10;

 	// Positioning
 	$start 		=  ($pagen > 1) ? ($pagen * $perPagen) - $perPagen : 0;

	/*
	|||		get comments from database
	*/

	$db = new Database();
	$rows = $db->getRows("SELECT SQL_CALC_FOUND_ROWS
								comments.*, items.Name AS I_C, users.Username AS U_C 
							FROM 
								comments
							INNER JOIN
								items
							ON
								items.Item_ID = comments.item_id
							INNER JOIN
								users
							ON
								users.UserID = comments.user_id
							ORDER BY c_id DESC LIMIT {$start}, {$perPagen}"); 


	/* ---||  For Pagination  ||--- */
	$total 		= $db->getRow('SELECT FOUND_ROWS() AS total'); 

	$pages 		= ceil($total['total'] / $perPagen);
	/* ---||  For Pagination  ||--- */

	?>

	<br /><br />
	<div class="container">

		<table class="main-table text-center table table-bordered">

		<tr class="head_table">
			<td class="hidden-xs">Com-ID</td>
			<td data-class='.CommentT'>Comment <i class='fa fa-close pull-right'> </i></td>
			<td data-class='.com_dateT' class="hidden-xs">com-date <i class='fa fa-close pull-right'> </i></td>
			<td data-class='.itemT'>item <i class='fa fa-close pull-right'> </i></td>
			<td>user</td>
			<td>Control</td>
		</tr>

		<?php 

	/*
	||
	||||	get comments info from database
	||||	and show it in table
	||
	*/

		foreach ($rows as $row) {

		echo "<tr>";
			echo "<td class='hidden-xs'>" . $row["c_id"] . "</td>";
			echo "<td class='comment_text CommentT'>";

			$str = $row["comment"];
			$filter = filter_var($str, FILTER_SANITIZE_STRING);
			$comment_lenth = strlen($filter);
			if ($comment_lenth > 70) {
				echo substr($filter, 0, 70) . " ...";
			} else {
				echo $filter;
			}


			echo "</td>";
			echo "<td class='hidden-xs com_dateT'>" . $row["comment_date"] . "</td>";
			echo "<td class='itemT'>" . $row["I_C"] . "</td>";
			echo "<td>" . $row["U_C"] . "</td>";
			echo "<td>

					<a data-toggle='modal' data-target='.bs-example-modal-sm' id='' href='" . plugin_dir_url(__FILE__) . "../controller/delete-comment.php?do=delete&ID=" . $row["c_id"] . " ' class='delete_comment button btn-sm'><i class='fa fa-close'> </i> Delete</a>";

			echo "</td>";
		echo "</tr>";
		} ?>
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

			<a href="edit.php?post_type=comments&page=all_comments&pagen=<?php echo $i; ?>&per-pagen=<?php echo $perPagen; ?>" <?php if ($pagen == $i) { echo 'class="selected"'; } ?>><?php echo $i; ?></a>
		
		<?php } ?>
		</div>

<?php } ?>