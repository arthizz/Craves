<?php
    require_once '../connection/connection.php';
    session_start();

    if(isset($_SESSION['user'])){

    }
    else{
        echo "<script>window.open('../kiosk/index.php','_self')</script>";
    }
?>
<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->

	<title>Products</title>

	<!-- Google font -->
	<link href="https://fonts.googleapis.com/css?family=Hind:400,700" rel="stylesheet">

	<!-- Bootstrap -->
	<link type="text/css" rel="stylesheet" href="../css/bootstrap.min.css" />

	<!-- Slick -->
	<link type="text/css" rel="stylesheet" href="../css/slick.css" />
	<link type="text/css" rel="stylesheet" href="../css/slick-theme.css" />

	<!-- nouislider -->
	<link type="text/css" rel="stylesheet" href="../css/nouislider.min.css" />

	<!-- Font Awesome Icon -->
	<link rel="stylesheet" href="../css/font-awesome.min.css">

	<!-- Custom stlylesheet -->
	<link type="text/css" rel="stylesheet" href="../css/style.css" />

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
					<span>Welcome to Craves Avenue!</span>
				</div>
				<div class="pull-right">
					<a href="../api/kiosk-logout-process.php"><button class="btn btn-xs btn-danger">SIGN OUT</button></a>
				</div>
			</div>
		</div>
		<!-- /top Header -->

		<!-- header -->
		<div id="header">
			<div class="container">
				<div class="pull-left">
					<!-- Logo -->
					<!-- /Logo -->


				</div>
				<div class="pull-right">
					<ul class="header-btns">
						

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

	<!-- NAVIGATION -->
	<div id="navigation">
		<!-- container -->
		<div class="container">
			<div id="responsive-nav">

				<!-- menu nav -->
				<div class="menu-nav">
					<span class="menu-header">Menu <i class="fa fa-bars"></i></span>
					<ul class="menu-list">
						<li><a href="products-kiosk.php">All Categories</a></li>
						<?php
						$stmt = $conn->prepare("SELECT * FROM pcategory_tbl");
						$stmt->execute();

						while($row = $stmt->fetch(PDO::FETCH_ASSOC)){


						?>
						<li><a href="<?=$row['cCategory']?>-kiosk.php"><?=$row['cCategory']?></a></li>
						<?php
					}
						?>
					</ul>
				</div>
				<!-- menu nav -->
				<div class="pull-right myres" style="margin-top: -50px;">
					<div class="header-btns">
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
								<strong class="text-uppercase" style="color: white">My Cart:</strong>
								<br>
								<span style="color: white;">VIEW</span>
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
												$sth = $conn->prepare("SELECT * FROM cart_tbl WHERE cPrice = :img");
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
					</div>
				</div>

			</div>
		</div>
		<!-- /container -->
	</div>
	<!-- /NAVIGATION -->

	<!-- BREADCRUMB -->
	<!-- section -->
	<div class="section">
		<!-- container -->
		<div class="container">
			<!-- row -->
			<div class="row">
				

				<!-- MAIN -->
				<div id="main" class="col-md-12">
					

					<!-- STORE -->
					<div id="store">
						<!-- row -->
						<div class="row">

							<?php
							$categ = "Pasta";
							$stmt = $conn->prepare("SELECT * FROM product_tbl Where cProduct_category = :categ");
							$stmt->bindparam(":categ", $categ);
							$stmt->execute();

							while($row = $stmt->fetch(PDO::FETCH_ASSOC)){

							?>


							<!-- Product Single -->
							<div class="col-md-4 col-sm-6 col-xs-6">
								<div class="product product-single">
									<div class="product-thumb">
										<div class="product-label">
										</div>

										<img src="../img/<?=$row['cProduct_img']?>" alt="" height="230">
									</div>
									<div class="product-body">
										<h3 class="product-price">₱<?=$row['cProduct_price']?>.00</h3>
										<div class="product-rating">
											<i class="fa fa-star"></i>
											<i class="fa fa-star"></i>
											<i class="fa fa-star"></i>
											<i class="fa fa-star"></i>
											<i class="fa fa-star-o empty"></i>
										</div>
										<h2 class="product-name"><a href="#"><?=$row['cProduct_name']?></a></h2>
										<div class="product-btns">
												<div class="row">
													<div class="col-md-6">
														<a href="api/addcart.php?id=<?=$row['cID']?>"><button class="primary-btn add-to-cart btn-block"><i class="fa fa-shopping-cart"></i> Add to Cart</button></a>
														
													</div>
													<div class="col-md-6">
														<div class="qty-input">
															<input class="input" type="number" id="qty" min="1" value="1">
														</div>
													</div>
												</div>
										</div>
									</div>
								</div>
							</div>
							<!-- /Product Single -->
							<?php
						}
							?>
						</div>
						<!-- /row -->
					</div>
					<!-- /STORE -->

					
				</div>
				<!-- /MAIN -->
			</div>
			<!-- /row -->
		</div>
		<!-- /container -->
	</div>
	<!-- /section -->




			

	<!-- jQuery Plugins -->
	<script src="../js/jquery.min.js"></script>
	<script src="../js/bootstrap.min.js"></script>
	<script src="../js/slick.min.js"></script>
	<script src="../js/nouislider.min.js"></script>
	<script src="../js/jquery.zoom.min.js"></script>
	<script src="../js/main.js"></script>

</body>

</html>
