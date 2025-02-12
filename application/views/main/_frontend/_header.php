    <!-- Main Header -->
    <header class="main-header">
    	<!-- Logo -->
    	<a href="#" class="logo">
    		<!-- mini logo for sidebar mini 50x50 pixels -->
    		<!-- <span class="logo-mini"><b>A</b>LT</span> -->
    		<!-- logo for regular state and mobile devices -->
    		<!-- <span class="logo-lg"><b>Admin</b>LTE</span> -->
    	</a>

    	<!-- Header Navbar -->
    	<nav class="navbar navbar-static-top" role="navigation">
    		<!-- Sidebar toggle button-->
    		<a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
    			<span class="sr-only">Toggle navigation</span>
    		</a>
    		<!-- Navbar Right Menu -->
    		<div class="navbar-custom-menu">
    			<ul class="nav navbar-nav">
    				<!-- Notifications Menu -->
    				<li class="dropdown notifications-menu">
    					<!-- Menu toggle button -->
    					<a href="#" class="dropdown-toggle" data-toggle="dropdown">
    						<i class="fa fa-bell-o"></i>
    						<span class="label label-warning">10</span>
    					</a>
    					<ul class="dropdown-menu">
    						<li class="header">You have 10 notifications</li>
    						<li>
    							<!-- Inner Menu: contains the notifications -->
    							<ul class="menu">
    								<li><!-- start notification -->
    									<a href="#">
    										<i class="fa fa-users text-aqua"></i> 5 new members joined today
    									</a>
    									<a href="#">
    										<i class="fa fa-users text-aqua"></i> 5 new members joined today
    									</a>
    								</li>
    								<!-- end notification -->
    							</ul>
    						</li>
    					</ul>
    				</li>
    				<!-- User Account Menu -->
    				<li class="dropdown notifications-menu">
    					<!-- Menu toggle button -->

    					<a href="#" class="dropdown-toggle" data-toggle="dropdown">
    						<i class=""> Hi, <?= $user['name_users']; ?></i>

    					</a>
    					<ul class="dropdown-menu">
    						<li class="footer"><a href="#"><i class="fa fa-users text-green"></i>Group <?= 'id_role'; ?></a></li>
    						<li>
    							<!-- Inner Menu: contains the notifications -->
    							<ul class="menu">
    								<li><!-- start notification -->
    									<a href="<?= base_url('homepage/accountSetting') ?>">
    										<i class="fa fa-gear text-aqua"></i> Setting Akun
    									</a>
    									<a href="<?= base_url('security') ?>">
    										<i class="fa fa-shield text-yellow"></i> Keamanan
    									</a>
    								</li>
    								<!-- end notification -->
    							</ul>
    						</li>
    						<li class="footer"><a href="<?= base_url('Authorization/logout'); ?>"><i class="fa fa-sign-out text-red"></i> Sign out</a></li>
    					</ul>
    				</li>
    				<!-- Control Sidebar Toggle Button -->
    				<li>
    					<a href="#" data-toggle="control-sidebar"><i class="fa fa-gears"></i></a>
    				</li>
    			</ul>
    		</div>
    	</nav>

    </header>