	 <?php require("count_functions.php") ?>
	 <hr>
	<div class=" col-md-12 col-lg-2 side_div">

		<button class="btn btn-outline-success btn-sm" id="show_menu">toggle menu</button>
		<div class="show_menu_contents" id="left-bar">
			<ul class="list-group" id="left-bar_ul">
						<hr>
						<a href="postproject"><li class=""> Post Projects <i class="fa fa-angle-double-up fa-2x clearfix text-danger float-right"></i></li></a>
						<a href="current_orders"><li> View Projects  &nbsp;<span class="badge-pill bg-danger text-light clearfix float-right"><?php echo available(); ?></span> </li></a>
						
						<a href="on_a_progress"><li class="">On Progress &nbsp;<span class="badge-pill bg-danger text-light clearfix float-right"><?php echo onProgress(); ?></span></li></a>
						
						<a href="admin_peding_approval"><li class="">Pedding Approval &nbsp;<span class="badge-pill bg-danger text-light clearfix float-right"><?php echo pedingApproval(); ?></span></li></a>
						<a href="on_a_revesion"><li class="">On Revision &nbsp;<span class="badge-pill bg-danger text-light clearfix float-right"><?php echo onRevision(); ?></span></li></a>
						<a href="a_completed_projects"><li class="">Approved &nbsp;<span class="badge-pill bg-danger text-light clearfix float-right"><?php echo Approved(); ?></span></li></a>
						<a href="account_management"><li>ACTION CENTER <i class="fa fa-sliders  clearfix text-danger float-right"></i></li></a>
						
						<hr>
					</ul>
		</div>
	</div>