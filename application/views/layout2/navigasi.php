<body>
	<header id="header"><!--header-->
	<div class="header_top"><!--header_top-->
	<div class="container">
		<div class="row">
			<div class="col-sm-6">
				<div class="contactinfo">
					<ul class="nav nav-pills">
						<li><a href="#"><i class="fa fa-phone"></i> +2 95 01 88 821</a></li>
						<li><a href="#"><i class="fa fa-envelope"></i> info@domain.com</a></li>
					</ul>
				</div>
			</div>
			<div class="col-sm-6">
				<div class="social-icons pull-right">
					<ul class="nav navbar-nav">
						<li><a href="#"><i class="fa fa-facebook"></i></a></li>
						<li><a href="#"><i class="fa fa-twitter"></i></a></li>
						<li><a href="#"><i class="fa fa-linkedin"></i></a></li>
						<li><a href="#"><i class="fa fa-dribbble"></i></a></li>
						<li><a href="#"><i class="fa fa-google-plus"></i></a></li>
					</ul>
				</div>
			</div>
		</div>
	</div>
	</div><!--/header_top-->
	
	<div class="header-middle"><!--header-middle-->
	<div class="container">
		<div class="row">
			<div class="col-sm-4">
				<div class="logo pull-left">
					<a href="index.html"><img src="<?php echo base_url('asset/frontend/images/home/logo.png');?>" alt="" /></a>
				</div>
				<!-- <div class="btn-group pull-right">
					<div class="btn-group">
						<button type="button" class="btn btn-default dropdown-toggle usa" data-toggle="dropdown">
						USA
						<span class="caret"></span>
						</button>
						<ul class="dropdown-menu">
							<li><a href="#">Canada</a></li>
							<li><a href="#">UK</a></li>
						</ul>
					</div>
					
					<div class="btn-group">
						<button type="button" class="btn btn-default dropdown-toggle usa" data-toggle="dropdown">
						DOLLAR
						<span class="caret"></span>
						</button>
						<ul class="dropdown-menu">
							<li><a href="#">Canadian Dollar</a></li>
							<li><a href="#">Pound</a></li>
						</ul>
					</div>
				</div> -->
			</div>
			<div class="col-sm-8">
				<div class="shop-menu pull-right">
				<?php if ($this->session->userdata('username')) : ?>
					<ul class="nav navbar-nav">
						<li>
						<?php 
						$text_url = '<span class="fa fa-user"></span>';
						$text_url .=' Hello ' . $this->session->userdata('username');
						?>
						<?=anchor('', $text_url); ?>	
						</li>
						<li>
						<?=anchor('Customer_Act/show_history', 'History'); ?>
						</li>
						<li>
						<?=anchor('Customer_Act/show_history_confirmed', 'History Confirmed'); ?>
						</li>
						<li>
						<?php 
						$text_url = '<span class="fa fa-shopping-cart"></span>';
						$text_url .=' Inside ' . $this->cart->total_items().' Items';
						?>
						<?=anchor('Customer_Act/show_cart', $text_url); ?>	
						</li>				
						<li>
						<?php 
						$text_url = '<span class="fa fa-lock"></span>';
						$text_url =' Logout ';
						?>
						<?=anchor('en/logout', $text_url); ?>	
						</li>
					</ul>
				<?php else : ?>
					<ul class="nav navbar-nav">
						<ul class="nav navbar-nav">
						<li>
						<?php 
						$text_url = '<span class="fa fa-shopping-cart"></span>';
						$text_url .=' Inside ' . $this->cart->total_items().' Items';
						?>
						<?=anchor('Customer_Act/show_cart', $text_url); ?>	
						</li>				
						<li>
						<?php 
						$text_url = '<span class="fa fa-lock"></span>';
						$text_url =' Login ';
						?>
						<?=anchor('en/i', $text_url); ?>							
						</li>
					</ul>
				</div>
					</ul>
				<?php endif; ?>
				</div>
			</div>
		</div>
	</div>
	</div><!--/header-middle-->
	
	<div class="header-bottom"><!--header-bottom-->
	<div class="container">
		<div class="row">
			<div class="col-sm-9">
				<div class="navbar-header">
					<button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
					<span class="sr-only">Toggle navigation</span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					</button>
				</div>
				<div class="mainmenu pull-left">
					<ul class="nav navbar-nav collapse navbar-collapse">
						<li><a href="index.html" class="active">Home</a></li>
						<li class="dropdown"><a href="#">Shop<i class="fa fa-angle-down"></i></a>
						<ul role="menu" class="sub-menu">
							<li><a href="shop.html">Products</a></li>
							<li><a href="product-details.html">Product Details</a></li>
							<li><a href="checkout.html">Checkout</a></li>
							<li><a href="cart.html">Cart</a></li>
							<li><a href="login.html">Login</a></li>
						</ul>
					</li>
					<li class="dropdown"><a href="#">Blog<i class="fa fa-angle-down"></i></a>
					<ul role="menu" class="sub-menu">
						<li><a href="blog.html">Blog List</a></li>
						<li><a href="blog-single.html">Blog Single</a></li>
					</ul>
				</li>
				<li><a href="404.html">404</a></li>
				<li><a href="contact-us.html">Contact</a></li>
			</ul>
		</div>
	</div>
	<div class="col-sm-3">
		<div class="search_box pull-right">
			<input type="text" placeholder="Search"/>
		</div>
	</div>
</div>
</div>
</div><!--/header-bottom-->
</header><!--/header-->