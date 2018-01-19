<?php 

function custom_members_all_submenu_page_callback() {

	/*
	|||		Pagination
	*/

	// User input
 	$pagen 		= isset($_GET['pagen']) ? (int)$_GET['pagen'] : 1;
 	$perPagen	= isset($_GET['per-pagen']) && $_GET['per-pagen'] <= 50 ? (int)$_GET['per-pagen'] : 10;

 	// Positioning
 	$start 		=  ($pagen > 1) ? ($pagen * $perPagen) - $perPagen : 0;

	/*
	|||	get members not active from database
	*/

	$Pendding 	= NULL;

	if(isset($_GET['active']) && $_GET['active'] == 'Pendding') {

		$Pendding = 'AND RegStatus = 0';
	}

	$db 		= new Database();
	$rows 		= $db->getRows("SELECT SQL_CALC_FOUND_ROWS * FROM users WHERE GroupID != 1 $Pendding ORDER BY Date DESC LIMIT {$start}, {$perPagen}"); 

	/* ---||  For Pagination  ||--- */
	$total 		= $db->getRow('SELECT FOUND_ROWS() AS total'); 

	$pages 		= ceil($total['total'] / $perPagen);
	/* ---||  For Pagination  ||--- */

	?>

<br /><br />
<div class="container">

	<table class="main-table text-center table table-bordered">

	<tr class="head_table">
		<td>userID</td>
		<td data-class='.UsernameT'>Username <i class='fa fa-close pull-right'> </i></td>
		<td class="hidden-xs" data-class='.EmailT'>Email <i class='fa fa-close pull-right'> </i></td>
		<td class="hidden-xs" data-class='.Full_NameT'>Full Name <i class='fa fa-close pull-right'> </i></td>
		<td class="hidden-xs" data-class='.Registerd_dateT'>Registerd Date <i class='fa fa-close pull-right'> </i></td>
		<td>Control</td>
	</tr>

	<?php 

/*
||
||||	get users info from database
||||	and show it in table
||
*/

foreach ($rows as $row) {

echo "<tr>";
	echo "<td>" . $row["UserID"] . "</td>";
	echo "<td class='UsernameT'>" . $row["Username"] . "</td>";
	echo "<td class='hidden-xs EmailT'>" . $row["Email"] . "</td>";
	echo "<td class='hidden-xs Full_NameT'>" . $row["FullName"] . "</td>";
	echo "<td class='hidden-xs Registerd_dateT'>" . $row["Date"] . "</td>";
	echo 	"<td>

				<a href='edit.php?post_type=members&page=edit_members&userID=". $row['UserID'] ."' class='button btn-sm'><i class='fa fa-edit'> </i> Edit</a>
				<a data-toggle='modal' data-target='.bs-example-modal-sm' id='' href='" . plugin_dir_url(__FILE__) . "../controller/add-update-delete-members.php?do=delete&ID=" . $row["UserID"] . " ' class='delete_member button btn-sm'><i class='fa fa-close'> </i>  Delete</a>";

					/*
					|||    if regStatus = 0 show this button
					*/

				if ($row['RegStatus'] == 0) {

					echo "<a href='" . plugin_dir_url(__FILE__) . "../controller/add-update-delete-members.php?do=approve&ID=" . $row["UserID"] . " ' class='approve_member button btn-sm active1'><i class='fa fa-check'> </i> Activate</a>";
				}

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

		<a href="edit.php?post_type=members&page=all_members&pagen=<?php echo $i; ?>&per-pagen=<?php echo $perPagen; ?>" <?php if ($pagen == $i) { echo 'class="selected"'; } ?>><?php echo $i; ?></a>
	
	<?php } ?>
	</div>

<?php } ?>