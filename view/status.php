<?php 

function view_status_my_custom_submenu_page_callback() {

		/*start Dashboard page*/

		$numUsers = 4;

		// get letest User
		$db = new Database();
		$LatestUsers = $db->getRows('SELECT * FROM users ORDER BY UserID DESC LIMIT ' . $numUsers . '');
		//$LatestUsers = getLatest("*", "users", "UserID", $numUsers);

		$numItems = 4;

		// get latest items
		$db = new Database();
		$LatestItems = $db->getRows('SELECT * FROM items ORDER BY Item_ID DESC LIMIT ' . $numItems . '');
		//$LatestItems = getLatest("*", "items", "Item_ID", $numItems);

		// var for latest comment
		$numComments = 4;


		?>

		<div class="home-stats text-center">
			<div class="container">
				
				<div class="row">

					<!-- start count mmeber field -->
					<div class="col-md-3">
						<div class="stats mem">
							<i class="fa fa-users"></i>
							<div class="count5">
								<span>Totat Members</span>
								<h1><a href="edit.php?post_type=members&page=all_members"><?php echo CountItems('UserID', 'users');  ?></a></h1>
							</div>
						</div>
					</div>
					<!-- end count mmeber field -->
					<!-- start count pending mmeber field -->
					<div class="col-md-3">
						<div class="stats p-mem">
							<i class="fa fa-user-times"></i>
							<div class="count5">
								<span>Pendding Members</span>
								<h1><a href="edit.php?post_type=members&page=all_members&active=Pendding"><?php echo chickItem("RegStatus", "users", 0); ?></a></h1>
							</div>
						</div>
					</div>
					<!-- end count pending mmeber field -->
					<!-- start count items field -->
					<div class="col-md-3">
						<div class="stats tot-i">
							<i class="fa fa-cart-plus"></i>
							<div class="count5">
								<span>Totat Items</span>
								<h1><a href="edit.php?post_type=product&page=view_Product"><?php echo CountItems('Item_ID', 'items')  ?></a></h1>
							</div>
						</div>
					</div>
					<!-- end count items field -->
					<!-- start count comments field -->

					<div class="col-md-3">
						<div class="stats tot-com">
							<i class="fa fa-comments"></i>
							<div class="count5">
								<span>Totat Comments</span>
								<h1><a href="edit.php?post_type=comments&page=all_comments"><?php echo CountItems('c_id', 'comments')  ?></a></h1>
							</div>
						</div>
					</div>
					<!-- end count comments field -->
					
				</div>
			</div>
		</div>

		<div class="container">
			<div class="latest">
				<div class="row">

					<div class="col-sm-6">
						<div class="panel panel-primary">
							<div class="panel-heading">
								<span><i class="fa fa-users"></i>
								latest <?php echo $numUsers; ?> registerd users</span>
								<i class="fa fa-minus pull-right"></i>
							</div>

							<div class="panel-body">
								<ul class="list-unstyled latest-users">
									<?php

									foreach ($LatestUsers as $users) {
										

										echo "<li>" . $users['Username'];
										echo "<a href='edit.php?post_type=members&page=edit_members&userID=". $users['UserID'] ."'>";
										echo "<span class='button btn-sm pull-right'><i class='fa fa-edit'> </i> Edit</span>";
										echo "</a>";
										if ($users['RegStatus'] == 0) {

											echo "<a href='" . plugin_dir_url(__FILE__) . "../controller/add-update-delete-members.php?do=approve&ID=" . $users["UserID"] . " ' class='approve_member button btn-sm pull-right active1'><i class='fa fa-check'> </i> Activate</a>";
										}
										echo "</li>";
									}

									?>
								</ul>
							</div>
						</div>
					</div>

					<div class="col-sm-6">
						<div class="panel panel-primary">
							<div class="panel-heading">
								<i class="fa fa-minus pull-right"></i>
								<span><i class="fa fa-tag"> </i> latest <?php echo $numItems; ?> Items</span>
							</div>
							<div class="panel-body">
								<ul class="list-unstyled latest-users">
									<?php

									foreach ($LatestItems as $item) {
										

										echo "<li>" . $item['Name'];
										echo "<a href='edit.php?post_type=product&page=edit_Product&itemID=". $item['Item_ID'] ."'>";
										echo "<span class='button btn-sm pull-right'><i class='fa fa-edit'> </i> Edit</span>";
										echo "</a>";
										if ($item['Approve'] == 0) {

											echo "<a href=" . plugin_dir_url(__FILE__) . "../controller/add-update-delete-product.php?do=active&itemID=" . $item['Item_ID'] ." ' class='approve_product button btn-sm pull-right active1'><i class='fa fa-check'> </i> Approve</a>";
										}
										echo "</li>";
									}

									?>
								</ul>
							</div>
						</div>
					</div>

						<div class="clearfix"></div>

						<div class="col-sm-6">
						<div class="panel panel-primary">
							<div class="panel-heading">
								<i class="fa fa-minus pull-right"></i>
								<span><i class="fa fa-comment"> </i> latest <?php echo "$numComments"; ?> Comments</span>
							</div>
							<div class="panel-body">
								
									<?php
									$db = new Database();
									$Comments = $db->getRows("SELECT 
																comments.*, users.Username AS U_C 
															FROM 
																comments
															INNER JOIN
																users
															ON
																users.UserID = comments.user_id
															ORDER BY
																c_id DESC
															LIMIT $numComments");

									foreach ($Comments as $Comment) {
										echo "<div class='comment-box'>";
										echo "<span class='comment-u'>";
										echo $Comment['U_C'] . " ";
										echo "</span>";

										echo "<span class='comment-c'>";
										echo "<i class='fa fa-chevron-right fa-xs'></i> " . $Comment['comment'];
										echo "</span>";
										echo "</div><br />";
									}


									?>
								
							</div>
						</div>
					</div>

						<div class="col-sm-6">
						<div class="panel panel-primary">
							<div class="panel-heading">
								<i class="fa fa-minus pull-right"></i>
								<span><i class="fa fa-thumbs-o-up"> </i> Top Likes Items</span>
							</div>
							<div class="panel-body">
								
									<?php
									$db = new Database();
									$likes = $db->getRows('SELECT * FROM items ORDER BY Likes DESC LIMIT 4');

									echo '<ul class="latest-users">';
									foreach ($likes as $like) {
										echo '<li>' . $like['Name'] . '<span class="likes_span pull-right"><i class="fa fa-thumbs-o-up"> </i> ' . $like['Likes'] . ' Likes</span></li>';
									}
									echo '</ul>';


									?>
							</div>
						</div>
					</div>


				</div>
			</div>
		</div>

<?php } ?>