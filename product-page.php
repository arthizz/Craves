<?php
	require_once 'connection/connection.php';

	$id = $_GET['id'];
	
?>
<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->

	<title>Product View</title>

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
					<span>Welcome to Craves Avenue!</span>
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
	<?php
				$stmt = $conn->prepare("SELECT * FROM product_tbl where cID = :id");
				$stmt->bindparam(":id", $id);
				$stmt->execute();

				$row = $stmt->fetch(PDO::FETCH_ASSOC);
				?>

	<!-- BREADCRUMB -->
	<div id="breadcrumb">
		<div class="container">
			<ul class="breadcrumb">
				<li><a href="index.php">Home</a></li>
				<li><a href="products.php">Products</a></li>
				<li><a href="#"><?=$row['cProduct_category']?></a></li>
				<li class="active"><?=$row['cProduct_name']?></li>
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
				<!--  Product Details -->
				

				<div class="product product-details clearfix">
					<div class="col-md-6">
						<div id="product-main-view">
							<div class="product-view">
								<img src="./img/<?=$row['cProduct_img']?>" alt="">
							</div>
							
						</div>
						
					</div>
					<div class="col-md-6">
						<div class="product-body">
							<div class="product-label">
								<span>New</span>

							</div>
							<h2 class="product-name"><?=$row['cProduct_name']?></h2>
							<h3 class="product-price">₱<span id="price"><?=$row['cProduct_price']?></span>.00</h3>
							<div>
								<div class="product-rating">
									<i class="fa fa-star"></i>
									<i class="fa fa-star"></i>
									<i class="fa fa-star"></i>
									<i class="fa fa-star"></i>
									<i class="fa fa-star-o empty"></i>
								</div>
								<a href="#">3 Review(s) / Add Review</a>
							</div>
							<p><strong>Availability:</strong> In Stock</p>
							<p><strong>Brand:</strong> Craves</p>
							<p><?=$row['cProduct_details']?></p>

							<?php
							$categ = $row['cProduct_category'];
							$price = $row['cProduct_price'];
							$id = $row['cID'];

							if($categ == "Beverages"){

							?>
							<div class="product-btns">

									<div class="qty-input">
										<span class="text-uppercase">QTY: </span>
										<input class="input" type="number" id="qty" min="1" value="1">
									</div>
									<button class="primary-btn add-to-cart" onclick="addtocart()"><i class="fa fa-shopping-cart"></i> Add to Cart</button>


							</div>
							<div class="product-options">
								<ul class="size-option">
									<li><span class="text-uppercase">Size:</span></li>
									<li><a href="#" onclick="myFunction()" id="small">Small</a></li>
									<li><a href="#" onclick="myFunction1()" id="regular">Regular</a></li>
									<li><a href="#" onclick="myFunction2()" id="large">Large</a></li>
								</ul>
								

							</div>
							<?php
						}else{
							?>

							<div class="product-btns">

									<div class="qty-input">
										<span class="text-uppercase">QTY: </span>
										<input class="input" type="number" id="qty" min="1" value="1">
									</div>
									<button class="primary-btn add-to-cart" onclick="addtocart()"><i class="fa fa-shopping-cart"></i> Add to Cart</button>


							</div>
							<?php
						}
							?>
						</div>
					</div>
					

				</div>
				<!-- /Product Details -->
			</div>
			<!-- /row -->
		</div>
		<!-- /container -->
	</div>
	<!-- /section -->

	<!-- section -->
	<div class="section">
		<!-- container -->
		<div class="container">
			<!-- row -->
			<div class="row">
				<!-- section title -->
				<div class="col-md-12">
					<div class="section-title">
						<h2 class="title">Picked For You</h2>
					</div>
				</div>
				<!-- section title -->
				<?php
				$stmt = "Rice Meal";
				$stmt = $conn->prepare("SELECT * FROM product_tbl where cProduct_category = :categ");
				$stmt->bindparam(":categ", $categ);
				$stmt->execute();
				$num = 1;

				while($row = $stmt->fetch(PDO::FETCH_ASSOC)){
					if($num <= 3){

				?>


				<!-- Product Single -->
				<div class="col-md-4 col-sm-6 col-xs-6">
					<div class="product product-single">
						<div class="product-thumb">
							<button class="main-btn quick-view"><i class="fa fa-search-plus"></i> Quick view</button>
							<img src="./img/<?=$row['cProduct_img']?>" alt="" height="220">
						</div>
						<div class="product-body">
							<h3 class="product-price">₱<?=$row['cProduct_price']?></h3>
							<div class="product-rating">
								<i class="fa fa-star"></i>
								<i class="fa fa-star"></i>
								<i class="fa fa-star"></i>
								<i class="fa fa-star"></i>
								<i class="fa fa-star-o empty"></i>
							</div>
							<h2 class="product-name"><a href="#"><?=$row['cProduct_name']?></a></h2>
							<div class="product-btns">
								<button class="primary-btn add-to-cart"><i class="fa fa-shopping-cart"></i> Add to Cart</button>
							</div>
						</div>
					</div>
				</div>
				<!-- /Product Single -->
				<?php
			}
			$num++;
			}
				?>

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
							<li><a href="#">My Wishlist</a></li>
							<li><a href="#">Compare</a></li>
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
	<!-- Modal -->
		<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
		  <div class="modal-dialog" role="document">
		    <div class="modal-content">
		      <div class="modal-header">
		        <h3 class="modal-title" id="exampleModalLabel">Caves Avenue</h3>
		        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
		          <span aria-hidden="true">&times;</span>
		        </button>
		      </div>
		      <div class="modal-body">
		        <form>
				  <div class="form-group">
				    <label for="exampleInputEmail1">Username</label>
				    <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter Username">
				  </div>
				  <div class="form-group">
				    <label for="exampleInputPassword1">Password</label>
				    <input type="password" class="form-control" id="exampleInputPassword1" placeholder="Password">
				  </div>
				  <div class="form-check">
				    <input type="checkbox" class="form-check-input" id="exampleCheck1">
				    <label class="form-check-label" for="exampleCheck1">Check me out</label>
				  </div>
				  <button type="submit" class="btn btn-primary">Submit</button>
				</form>
		      </div>
		      <div class="modal-footer">
		        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
		      </div>
		    </div>
		  </div>
		</div>

		<!-- Modal -->
			<div class="modal fade" id="exampleModal1" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
			  <div class="modal-dialog" role="document">
			    <div class="modal-content">
			      <div class="modal-header">
			        <h3 class="modal-title" id="exampleModalLabel">Join Us</h3>
			        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
			          <span aria-hidden="true">&times;</span>
			        </button>
			      </div>
			      <div class="modal-body">
			        <div class="container-fluid">
			        	<form>
						  <div class="row">
						  	<div class="col-md-6">
							  	<div class="form-group">
								    <label for="exampleInputEmail1">Username</label>
								    <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter Username">
							    </div>
								  <div class="form-group">
								    <label for="exampleInputPassword1">Password</label>
								    <input type="password" class="form-control" id="exampleInputPassword1" placeholder="Password">
								  </div>
								  <div class="form-group">
								    <label for="exampleInputPassword1">First Name</label>
								    <input type="text" class="form-control" id="exampleInputPassword1" placeholder="First Name">
								  </div>
								  <div class="form-group">
								    <label for="exampleInputPassword1">Last Name</label>
								    <input type="text" class="form-control" id="exampleInputPassword1" placeholder="Last Name">
								  </div>
								  
							  </div>
							  <div class="col-md-6">
							  	<div class="form-group">
								    <label for="exampleInputPassword1">Address</label>
								    <input type="text" class="form-control" id="exampleInputPassword1" placeholder="Address">
								 </div>
								 <div class="form-group">
								    <label for="exampleInputPassword1">Contact Number</label>
								    <input type="text" class="form-control" id="exampleInputPassword1" placeholder="Contact">
								 </div>
							  </div>
						  </div>
						  <button type="submit" class="btn btn-primary btn-block" style="float: right;">Submit</button>
						</form>
			        </div>
			      </div>
			      <div class="modal-footer">
			        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
			      </div>
			    </div>
			  </div>
			</div>

			<script type="text/javascript">
				var defpricesmall = "<?php echo $price;?>";
				var large = 10;
				var reg = 5;
				var x;
				var id = "<?php echo $id;?>";
				var y;
				var qty = document.getElementById("qty");

				function myFunction(){
					var qty = document.getElementById("qty").value;
					x = defpricesmall * qty;
					document.getElementById("price").innerHTML = x;
					y = defpricesmall;

				}


				function myFunction1(){
					var qty = document.getElementById("qty").value;
					var regular = parseFloat(defpricesmall) + parseFloat(reg);
					x = regular * qty;
					document.getElementById("price").innerHTML = x;
					y = regular;

				}
				function myFunction2(){
					var qty = document.getElementById("qty").value;
					var largeprice = parseFloat(defpricesmall) + parseFloat(large);
					x = largeprice * qty;
					document.getElementById("price").innerHTML = x;
					y = largeprice;

				}
				myFunction2();
				console.log(y);
				console.log(x);
				myFunction1();
				console.log(y);
				console.log(x);
				myFunction();
				console.log(y);
				console.log(x);

				
				function addtocart(){
					window.location.href = "api/addtocart.php?price=" + y +"&&id=" +id +"&&qty="+qty.value;

				}



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
