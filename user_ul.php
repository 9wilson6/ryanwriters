	 <?php require("count_functions.php") ?>
	 <hr>
	<div class=" col-md-12 col-lg-2 side_div">

		<button class="btn btn-outline-success btn-sm" id="show_menu">toggle menu</button>
		<div class="show_menu_contents" id="left-bar">
			<ul class="list-group" id="left-bar_ul">
						<hr>
						<a href="view_projects"><li> Available &nbsp;<span class="badge-pill bg-danger text-light clearfix float-right"><?php echo available(); ?></span></li></a>
						
						<a href="on_u_progress"><li>On Progress &nbsp;<span class="badge-pill bg-danger text-light clearfix float-right"><?php echo onProgress(); ?></span></li></a>
						
						<a href="user_pedding_approval"><li class="">Pedding Approval &nbsp;<span class="badge-pill bg-danger text-light clearfix float-right"><?php echo pedingApproval(); ?></span></li></a>
						<a href="on_u_revision"><li class="">On Revision &nbsp;<span class="badge-pill bg-danger text-light clearfix float-right"><?php echo onRevision(); ?></span></li></a>
						<a href="u_complited_projects"><li class="">Aproved &nbsp;<span class="badge-pill bg-danger text-light clearfix float-right"><?php echo Approved(); ?></span></li></a>
						<!-- <span class="fa fa-spinner fa-spin text-danger clearfix float-right"></span> -->
						<a href="home"><li>Writing Guide <i class="fa fa-tasks  clearfix text-danger float-right"></i></li></a>

						<hr>
					</ul>

		</div>
</div>