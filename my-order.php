<?php
	require_once 'connection/connection.php';
	
?>

<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->

	<title>E-SHOP HTML Template</title>

	<!-- Google font -->
	<link href="https://fonts.googleapis.com/css?family=Hind:400,700" rel="stylesheet">

	<!-- Bootstrap -->
	<link type="text/css" rel="stylesheet" href="css/bootstrap.min.css" />

	<!-- Slick -->
	<link type="text/css" rel="stylesheet" href="css/slick.css" />
	<link type="text/css" rel="stylesheet" href="css/slick-theme.css" />

	<!-- nouislider -->
	<link type="text/css" rel="stylesheet" href="css/nouislider.min.css" />

	<!-- Font Awesome Icon -->
	<link rel="stylesheet" href="css/font-awesome.min.css">

	<!-- Custom stlylesheet -->
	<link type="text/css" rel="stylesheet" href="css/style.css" />

	<!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
	<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
	<!--[if lt IE 9]>
		  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
		  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
		<![endif]-->

</head>

<body>
	<!-- HEADER -->
	<header>
		<!-- top Header -->
		<div id="top-header">
			<div class="container">
				<div class="pull-left">
					<span>Welcome to Craves Avenue</span>
				</div>
	
			</div>
		</div>
		<!-- /top Header -->

		<!-- header -->
		<div id="header">
			<div class="container">
				<div class="pull-left">
					<!-- Logo -->
					<div class="header-logo">
						<a class="logo" href="#">
							<img src="./img/logo.png" alt="">
						</a>
					</div>
					<!-- /Logo -->

					<!-- Search -->
					<div class="header-search">
						<form>
							<input class="input search-input" type="text" placeholder="Enter your keyword">
							<select class="input search-categories">
								<option value="0">All Categories</option>
								<option value="1">Rice Meal</option>
								<option value="1">Ala-carte Viands</option>
								<option value="1">Appetizer</option>
								<option value="1">Soup</option>
								<option value="1">Burgers</option>
								<option value="1">Sandwiches</option>
								<option value="1">Salad</option>
								<option value="1">Pasta</option>
								<option value="1">Noodles</option>
							</select>
							<button class="search-btn"><i class="fa fa-search"></i></button>
						</form>
					</div>
					<!-- /Search -->
				</div>
				<div class="pull-right">
					<ul class="header-btns">
						<!-- Account -->
						<li class="header-account dropdown default-dropdown">
							<div class="dropdown-toggle" role="button" data-toggle="dropdown" aria-expanded="true">
								<div class="header-btns-icon">
									<i class="fa fa-user-o"></i>
								</div>
								<strong class="text-uppercase">My Account <i class="fa fa-caret-down"></i></strong>
							</div>
							<?php
							session_start();
							if(isset($_SESSION['user'])){
							
							?>

							<?php
							$stmt = $conn->prepare("SELECT * FROM user_tbl Where cID = :id");
							$stmt->bindparam(":id", $_SESSION['user']);
							$stmt->execute();

							$row = $stmt->fetch(PDO::FETCH_ASSOC);

							?>

							<a href="#" class="text-uppercase"><?=$row['cFname']?></a>
							
							
							<?php
							}else{
							?>

							<a href="#" class="text-uppercase" data-toggle="modal" data-target="#exampleModal">Login</a> / <a href="#" class="text-uppercase" data-toggle="modal" data-target="#exampleModal1">Join</a>
							<!-- <a href="#" class="text-uppercase">Johnly Tv</a> -->
							<?php
							

							}

							?>

							<ul class="custom-menu">
								<li><a href="my-order.php"><i class="fa fa-heart-o"></i> My Ordered</a></li>
								<li><a href="api/logout-process.php"><i class="fa fa-check"></i> Signout</a></li>
								<!-- <li><a href="#"><i class="fa fa-unlock-alt"></i> Login</a></li> -->
								<!-- <li><a href="#"><i class="fa fa-user-plus"></i> Create An Account</a></li> -->
							</ul>
						</li>
						<!-- /Account -->

						<!-- Cart -->
						<li class="header-cart dropdown default-dropdown">
							<a class="dropdown-toggle" data-toggle="dropdown" aria-expanded="true">
								<div class="header-btns-icon">
									<i class="fa fa-shopping-cart"></i>
									<?php
									$statement = $conn->prepare("SELECT * FROM cart_tbl WHERE user_id = :id");
									$statement->bindparam(":id", $_SESSION['user']);
									$statement->execute();

									$ct = $statement->rowCount();
									?>

									<span class="qty"><?php echo $ct;?></span>


								</div>
								<strong class="text-uppercase">My Cart:</strong>
								<br>
								<span>VIEW</span>
							</a>
							<div class="custom-menu">
								<div id="shopping-cart">
									<div class="shopping-cart-list">
										<?php
										$stmt = $conn->prepare("SELECT DISTINCT cPrice FROM cart_tbl where user_id = :id");
										$stmt->bindparam(":id", $_SESSION['user']);
										$stmt->execute();

										$total = 0;

										while($row = $stmt->fetch(PDO::FETCH_ASSOC)){
												$sth = $conn->prepare("SELECT * FROM cart_tbl WHERE cPrice = :img AND user_id = :id");
												$sth->bindparam(":id", $_SESSION['user']);
												$sth->bindparam(":img", $row['cPrice']);
												$sth->execute();

												$count = $sth->rowCount();
												$row1 = $sth->fetch(PDO::FETCH_ASSOC);
												$total = $total+$row['cPrice']*$count;
											
										?>

										<div class="product product-widget">
											<div class="product-thumb">
												<img src="./img/<?=$row1['cProduct_img']?>" alt="">
											</div>
											<div class="product-body">
												<h3 class="product-price">₱<?=$row['cPrice']?>.00

												

												 <span class="qty"> x<?php echo $count;?> </span></h3>


												<h2 class="product-name"><a href="#"><?=$row1['cProduct']?></a></h2>
											</div>
										</div>
										<?php
									}
										?>

									</div>
									<div class="ml-auto"><h5>total:</h5>₱<?php echo $total?>.00</div>
									<div class="shopping-cart-btns">
										<?php
										if(isset($_SESSION['user'])){

										?>

										<a href="checkout.php?id=<?=$row1['user_id']?>"><button class="primary-btn">Checkout <i class="fa fa-arrow-circle-right"></i></button></a>
										<?php
									}else{
										?>
										<button class="primary-btn" data-toggle="modal" data-target="#exampleModal2">Checkout <i class="fa fa-arrow-circle-right"></i></button>

									
										<?php
									}

										?>



									</div>
								</div>
							</div>
						</li>
						<!-- /Cart -->

						<!-- Mobile nav toggle-->
						<li class="nav-toggle">
							<button class="nav-toggle-btn main-btn icon-btn"><i class="fa fa-bars"></i></button>
						</li>
						<!-- / Mobile nav toggle -->
					</ul>
				</div>
			</div>
			<!-- header -->
		</div>
		<!-- container -->
	</header>
	<!-- /HEADER -->

	<div id="navigation">
		<!-- container -->
		<div class="container">
			<div id="responsive-nav">


				<!-- menu nav -->
				<div class="menu-nav">
					<span class="menu-header">Menu <i class="fa fa-bars"></i></span>
					<ul class="menu-list">
						<li><a href="index.php">Home</a></li>
						<li><a href="order.php">Gallery</a></li>
						<li><a href="blank.php">About Us</a></li>
						<li><a href="products.php">Products</a></li>
						<li><a href="reservation.php">Reservation</a></li>
					</ul>
				</div>
				<!-- menu nav -->
			</div>
		</div>
		<!-- /container -->
	</div>
	<!-- /NAVIGATION -->

	<!-- BREADCRUMB -->
	<div id="breadcrumb">
		<div class="container">
			<ul class="breadcrumb">
				<li><a href="#">Home</a></li>
				<li class="active">My Ordered</li>
			</ul>
		</div>
	</div>
	<!-- /BREADCRUMB -->

	<!-- section -->
	<div class="section">
		<!-- container -->
		<div class="container">
			<!-- row -->
			<div class="row">
				<form id="checkout-form" class="clearfix">
					<div class="col-md-6">
						<div class="billing-details">
							<?php
							if(isset($_SESSION['user'])){
							?>

							<?php
						}else{
							?>

							<p>Already a customer ? <a href="#">Login</a></p>
							<?php
						}
							?>
							<div class="section-title">
								<h3 class="title">Billing Details</h3>
							</div>
							<?php

							$stmt = $conn->prepare("SELECT * FROM user_tbl Where cID = :id");
							$stmt->bindparam(":id", $_SESSION['user']);
							$stmt->execute();

							$row = $stmt->fetch(PDO::FETCH_ASSOC);
							$fname = ucfirst($row['cFname']);
							$lname = ucfirst($row['cLname']);

							?>

							<h4>Your Name:</h4>
							<p><?php echo $fname.' '.$lname; ?></p>
							<br>
							<h4>Your Address:</h4>
							<p><?=$row['cAddress']?></p>
							<br>
							<h4>Your Contact Details:</h4>
							<p><?=$row['cContact']?></p>
						</div>
					</div>

					<div class="col-md-6">


						<div class="payments-methods">

							</div>
						</div>
					</div>

					<div class="col-md-12">
						<div class="order-summary clearfix">
							<div class="section-title">
								<h3 class="title">Order Review</h3>
							</div>
							<table class="shopping-cart-table table">
								<thead>
									<tr>
										<th class="text-center">Product</th>
										<th></th>
										<th class="text-center">Price</th>
										<th class="text-center">Quantity</th>
										<th class="text-center">Total</th>
										<th class="text-center">Status</th>

									</tr>
								</thead>
								<tbody>
									<?php
									$stmt2 = $conn->prepare("SELECT DISTINCT cPrice FROM checkout_tbl Where user_id = :id");
									$stmt2->bindparam(":id", $_SESSION['user']);
									$stmt2->execute();
									$total_all = 0;

									while($row1 = $stmt2->fetch(PDO::FETCH_ASSOC)){
											$stmt3 = $conn->prepare("SELECT * FROM checkout_tbl Where cPrice = :product AND user_id = :id");
											$stmt3->bindparam(":id", $_SESSION['user']);
											$stmt3->bindparam(":product", $row1['cPrice']);
											$stmt3->execute();
											$count = $stmt3->rowCount();
											
											$row2 = $stmt3->fetch(PDO::FETCH_ASSOC);
											$price = $row2['cPrice'];

									?>
									<tr>
										<td class="thumb"><img src="./img/<?=$row2['cImg']?>" alt=""></td>
										<td class="details">
											<a href="#"><?=$row2['cProduct']?></a>



										</td>
										<td class="price text-center"><strong>₱<?=$row2['cPrice']?></strong></td>
	
										<td class="qty text-center"><?php echo $count?></td>

										<td class="total text-center" id="mynum1"><strong class="primary-color"><?php echo $count*$price;?></strong></td>

										<td class="total text-center">

											<?php
							                    if($row2['cStatus'] == 0){
							                    ?>
							                        <h3 class="lead">PENDING</h3>
							                    <?php
							                }else if($row2['cStatus'] == 1){

							                    ?>

							                     <button class="btn btn-success btn-xs" onClick="window.open('api/updatetrans.php?id=<?=$row['user_id']?>', '_self',); window.close();" style="border-radius: 5px;">On Going</button>
							                     <?php
							                 }else{
							                     ?>
							                     <h3 class="lead">DELIVERED</h3>
							                     <?php
							                 }
							                     ?>

										</td>


										<!-- <td class="text-right"><button class="main-btn icon-btn"><i class="fa fa-close"></i></button></td> -->
									</tr>


									<?php
									$total_all = $total_all+$count*$price;
								}
									?>

								</tbody>
								<tfoot>
									
									<tr>
										<th class="empty" colspan="3"></th>
										<th>SUBTOTAL</th>
										<th colspan="2" class="sub-total">₱<?php echo $total_all?>.00</th>
									</tr>
									<tr>
										<th class="empty" colspan="3"></th>
										<th>SHIPPING</th>
										<td colspan="2">Free Shipping</td>
									</tr>
									<tr>
										<th class="empty" colspan="3"></th>
										<th>TOTAL</th>
										<th colspan="2" class="total">₱<?php echo $total_all?>.00</th>
									</tr>
								</tfoot>
							</table>
						</div>

					</div>
				</form>
			</div>
			<!-- /row -->
		</div>
		<!-- /container -->
	</div>
	<!-- /section -->

	<!-- FOOTER -->
	<footer id="footer" class="section section-grey">
		<!-- container -->
		<div class="container">
			<!-- row -->
			<div class="row">
				<!-- footer widget -->
				<div class="col-md-3 col-sm-6 col-xs-6">
					<div class="footer">
						<!-- footer logo -->
						<div class="footer-logo">
							<a class="logo" href="#">
		            <img src="./img/logo.png" alt="">
		          </a>
						</div>
						<!-- /footer logo -->

						<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna</p>

						<!-- footer social -->
						<ul class="footer-social">
							<li><a href="#"><i class="fa fa-facebook"></i></a></li>
							<li><a href="#"><i class="fa fa-twitter"></i></a></li>
							<li><a href="#"><i class="fa fa-instagram"></i></a></li>
							<li><a href="#"><i class="fa fa-google-plus"></i></a></li>
							<li><a href="#"><i class="fa fa-pinterest"></i></a></li>
						</ul>
						<!-- /footer social -->
					</div>
				</div>
				<!-- /footer widget -->

				<!-- footer widget -->
				<div class="col-md-3 col-sm-6 col-xs-6">
					<div class="footer">
						<h3 class="footer-header">My Account</h3>
						<ul class="list-links">
							<li><a href="#">My Account</a></li>
							<li><a href="#">Checkout</a></li>
							<li><a href="#">Login</a></li>
						</ul>
					</div>
				</div>
				<!-- /footer widget -->

				<div class="clearfix visible-sm visible-xs"></div>

				<!-- footer widget -->
				<div class="col-md-3 col-sm-6 col-xs-6">
					<div class="footer">
						<h3 class="footer-header">Customer Service</h3>
						<ul class="list-links">
							<li><a href="#">About Us</a></li>
							<li><a href="#">Shiping & Return</a></li>
							<li><a href="#">Shiping Guide</a></li>
							<li><a href="#">FAQ</a></li>
						</ul>
					</div>
				</div>
				<!-- /footer widget -->

				<!-- footer subscribe -->
				<div class="col-md-3 col-sm-6 col-xs-6">
					<div class="footer">
						<h3 class="footer-header">Stay Connected</h3>
						<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor.</p>
						<form>
							<div class="form-group">
								<input class="input" placeholder="Enter Email Address">
							</div>
							<button class="primary-btn">Join Newslatter</button>
						</form>
					</div>
				</div>
				<!-- /footer subscribe -->
			</div>
			<!-- /row -->
			<hr>
			<!-- row -->
			<div class="row">
				<div class="col-md-8 col-md-offset-2 text-center">
					<!-- footer copyright -->
					<div class="footer-copyright">
						<!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->

						<!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
					</div>
					<!-- /footer copyright -->
				</div>
			</div>
			<!-- /row -->
		</div>
		<!-- /container -->
	</footer>
	<!-- /FOOTER -->

	<script>
		

	</script>

	<!-- jQuery Plugins -->
	<script src="js/jquery.min.js"></script>
	<script src="js/bootstrap.min.js"></script>
	<script src="js/slick.min.js"></script>
	<script src="js/nouislider.min.js"></script>
	<script src="js/jquery.zoom.min.js"></script>
	<script src="js/main.js"></script>

</body>

</html>
