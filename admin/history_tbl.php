<?php
    require_once '../connection/connection.php';
    session_start();

    if(isset($_SESSION['user'])){

    }
    else{
        echo "<script>window.open('../index.php','_self')</script>";
    }

?>

<!doctype html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7" lang=""> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8" lang=""> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9" lang=""> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js" lang=""> <!--<![endif]-->
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Admin Page</title>
    <meta name="description" content="Admin - HTML5 Admin Template">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

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

    <link rel="apple-touch-icon" href="apple-icon.png">
    <link rel="shortcut icon" href="favicon.ico">

    <link rel="stylesheet" href="assets/css/normalize.css">
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/css/font-awesome.min.css">
    <link rel="stylesheet" href="assets/css/themify-icons.css">
    <link rel="stylesheet" href="assets/css/flag-icon.min.css">
    <link rel="stylesheet" href="assets/css/cs-skin-elastic.css">
    <!-- <link rel="stylesheet" href="assets/css/bootstrap-select.less"> -->
    <link rel="stylesheet" href="assets/scss/style.css">
    <link href="assets/css/lib/vector-map/jqvmap.min.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.min.css">

    <link href='https://fonts.googleapis.com/css?family=Open+Sans:400,600,700,800' rel='stylesheet' type='text/css'>
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>


    <!-- <script type="text/javascript" src="https://cdn.jsdelivr.net/html5shiv/3.7.3/html5shiv.min.js"></script> -->
    <script src="https://kit.fontawesome.com/be8aa01834.js"></script>

    <style type="text/css">
        @media print{
            aside{
                display: none !important;
            }
            div>.breadcrumbs{
                display: none !important;
            }
            div>.user-area{
                display: none !important;
            }
            table>.table{
                display: none !important;
            }
            div>.wala{
                display:none !important;
            }
            td>button{
                display:none !important;
            }
            th>.walana{
                display: none !important;
            }
            div>.section{
                display:block !important;
            }

        }
    </style>


</head>
<body>


        <!-- Left Panel -->

    <aside id="left-panel" class="left-panel">
        <nav class="navbar navbar-expand-sm navbar-default">

            <div class="navbar-header">
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#main-menu" aria-controls="main-menu" aria-expanded="false" aria-label="Toggle navigation">
                    <i class="fa fa-bars"></i>
                </button>
                
            </div>

            <div id="main-menu" class="main-menu collapse navbar-collapse pt-5">
                <ul class="nav navbar-nav">
                    <li class="active">
                        <a href="index.php"> <i class="fas fa-tachometer-alt"></i> Dashboard </a>
                    </li>
                    <h3 class="menu-title">UI elements</h3><!-- /.menu-title -->
                    <li class="menu-item-has-children dropdown">
                        <a href="additem.php" class="dropdown-toggle" > <i class="fas fa-plus-circle"></i> Add Item </a>
                        
                    </li>
                    <li class="menu-item-has-children dropdown">
                        <a href="product-list.php" class="dropdown-toggle"> <i class="fas fa-table"></i> Product List </a>
                    </li>
                    <li class="menu-item-has-children dropdown">
                        <a href="transaction.php" class="dropdown-toggle"> <i class="fas fa-share-square"></i> Transaction</a>
                    </li>
                    <li class="menu-item-has-children dropdown">
                        <a href="add_gallery.php" class="dropdown-toggle"> <i class="fas fa-images"></i></i> Gallery</a>
                    </li>
                    <li class="menu-item-has-children dropdown">
                        <a href="history_tbl.php" class="dropdown-toggle"> <i class="fas fa-share-square"></i> Transaction History</a>
                    </li>

                    <li class="menu-item-has-children dropdown">
                        <a href="cash.php" class="dropdown-toggle"> <i class="fas fa-money-bill-wave"></i> Add Expenses / Revenue </a>
                    </li>

                    
                </ul>
            </div><!-- /.navbar-collapse -->
        </nav>
    </aside><!-- /#left-panel -->

    <!-- Left Panel -->

    <!-- Right Panel -->

    <div id="right-panel" class="right-panel">

        <!-- Header-->
        <header id="header" class="header">

            <div class="header-menu">

                <div class="col-sm-7">
                    <a id="menuToggle" class="menutoggle pull-left"><i class="fa fa fa-tasks"></i></a>
                    <div class="header-left">
                        <button class="search-trigger"><i class="fa fa-search"></i></button>
                        <div class="form-inline">
                            <form class="search-form">
                                <input class="form-control mr-sm-2" type="text" placeholder="Search ..." aria-label="Search">
                                <button class="search-close" type="submit"><i class="fa fa-close"></i></button>
                            </form>
                        </div>

                        

                        
                    </div>
                </div>

                <div class="col-sm-5">
                    <div class="user-area float-right">
                        <button class="btn btn-danger btn-xs" style="border-radius: 5px;" onClick="window.open('../api/logout-process.php', '_self',); window.close();">Sign Out</button>
                    </div>
                </div>
            </div>

        </header><!-- /header -->
        <!-- Header-->

        <div class="breadcrumbs">
            <div class="col-sm-4">
                <div class="page-header float-left">
                    <div class="page-title">
                        <h1>Transaction Tables</h1>
                    </div>
                </div>
            </div>
            <div class="col-sm-8">
                <div class="page-header float-right">
                    <div class="page-title">
                        <ol class="breadcrumb text-right">
                            <li class="active">Dashboard</li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>

        <div class="content mt-3">
            <div class="wala col-md-12">
                <table class="table" id="myTable1">
                  <thead class="thead-dark">
                    <tr>
                      <th scope="col">Product Name</th>
                      <th scope="col">product Price</th>
                      <th scope="col">Date Ordered</th>
                      <th scope="col">Item Status</th>
                    </tr>
                  </thead>
                  <tbody> 
                    <?php
                    $status = 2;
                    $stmt = $conn->prepare("SELECT * FROM history_tbl WHERE cStatus = :status");
                    $stmt->bindparam(":status", $status);
                    $stmt->execute();
                    

                        while($row = $stmt->fetch(PDO::FETCH_ASSOC)){


                    ?>

                    <tr>
                      <td><?=$row['cProduct']?></td>
                      <td><?=$row['cPrice']?></td>
                      <td><?=$row['cDate']?></td>

                      <td>

                     <h3 class="lead">DELIVERED</h3>


                        <!-- <h4 class="lead">Done</h4> -->
                      </td>

                    </tr>

                    <?php
                }
                    ?>
                    
                  </tbody>
                </table>
                <br>
                <br>
                <br>
                <hr>
                <table class="table display" id="myTable">
                  <thead class="thead-dark">
                    <tr>
                      <th scope="col">Product Name</th>
                      <th scope="col">product Price</th>
                      <th scope="col">Date Ordered</th>
                      <th scope="col">Item Status</th>
                    </tr>
                  </thead>
                  <tbody> 
                    <?php
                    $status = 2;
                    $stmt = $conn->prepare("SELECT * FROM cashier_tbl WHERE cStatus =:status");
                    $stmt->bindparam(":status", $status);
                    $stmt->execute();
                    

                        while($row = $stmt->fetch(PDO::FETCH_ASSOC)){


                    ?>

                    <tr>
                      <td><?=$row['cProduct']?></td>
                      <td><?=$row['cPrice']?></td>
                      <td><?=$row['cDate']?></td>

                      <td>

                    <?php
                    if($row['cStatus'] == 0){
                    ?>
                        <button class="btn btn-success btn-xs" onClick="window.open('../api/updatetrans.php?id=<?=$row['user_id']?>', '_self',); window.close();" style="border-radius: 5px;"><i class="fas fa-check"></i></button>
                        <button class="btn btn-primary btn-xs" style="border-radius: 5px;" onclick="window.print();"><i class="fas fa-print"></i></button>
                    <?php
                }else if($row['cStatus'] == 1){

                    ?>

                     <button class="btn btn-success btn-xs" onClick="window.open('../api/updatetrans.php?id=<?=$row['user_id']?>', '_self',); window.close();" style="border-radius: 5px;">On Going</button>
                     <?php
                 }else{
                     ?>
                     <h3 class="lead">SERVED</h3>
                     <?php
                 }
                     ?>

                        <!-- <h4 class="lead">Done</h4> -->
                      </td>

                    </tr>

                    <?php
                }
                    ?>
                    
                  </tbody>
                </table>
            </div>

            <div class="section" style="display:none;">
                <!-- container -->
                <div class="container">
                    <!-- row -->

                        <form id="checkout-form" class="clearfix">
                            <div class="col-md-12">
                                <div class="billing-details">
                                    <div class="section-title">
                                        <h3 class="title">Billing Details</h3>
                                    </div>
                                    <?php

                                    $row = $stmt->fetch(PDO::FETCH_ASSOC);
                                    $fname = ucfirst($row2['cFname']);
                                    $lname = ucfirst($row2['cLname']);

                                    ?>

                                    <h4>Your Name:</h4>
                                    <p><?php echo $fname.' '.$lname; ?></p>
                                    <br>
                                    <h4>Your Address:</h4>
                                    <p><?=$row2['cAddress']?></p>
                                    <br>
                                    <h4>Your Contact Details:</h4>
                                    <p><?=$row2['cContact']?></p>
                                </div>
                            </div>


                            <div class="col-md-12">
                                <div class="order-summary clearfix">
                                    <div class="section-title">
                                        <h3 class="title">Order Review:</h3>
                                        <br>
                                    </div>
                                    <table class="shopping-cart-table table">
                                        <thead>
                                            <tr>
                                                
                                                <th></th>
                                                <th>Product</th>
                                                <th class="text-center">Price</th>
                                                <th class="text-center">Quantity</th>
                                                <th class="text-center">Total</th>
                                                <th class="text-center"></th>

                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            $stmt2 = $conn->prepare("SELECT DISTINCT cPrice FROM checkout_tbl Where user_id = :id");
                                            $stmt2->bindparam(":id", $row1['user_id']);
                                            $stmt2->execute();
                                            $total_all = 0;

                                            while($row1 = $stmt2->fetch(PDO::FETCH_ASSOC)){
                                                    $stmt3 = $conn->prepare("SELECT * FROM checkout_tbl Where cPrice = :product");
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

                                                <td class="total text-center"><button type="button" data-toggle="modal" data-target="#<?=$row2['cID']?>" class="btn-danger btn"><i class="fa fa-trash"></i></button></td>


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
                </div>
            </div>
           


           


        </div> <!-- .content -->
    </div><!-- /#right-panel -->

    <script type="text/javascript">
        $(document).ready( function () {
            $('#myTable').DataTable();
        } );
        $(document).ready( function () {
            $('#myTable1').DataTable();
        } );
    </script>

    <!-- Right Panel -->
    <script type="text/javascript" src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    <script src="assets/js/vendor/jquery-2.1.4.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.3/umd/popper.min.js"></script>
    <script src="assets/js/plugins.js"></script>
    <script src="assets/js/main.js"></script>


    <script src="assets/js/lib/chart-js/Chart.bundle.js"></script>
    <script src="assets/js/dashboard.js"></script>
    <script src="assets/js/widgets.js"></script>
    <script src="assets/js/lib/vector-map/jquery.vmap.js"></script>
    <script src="assets/js/lib/vector-map/jquery.vmap.min.js"></script>
    <script src="assets/js/lib/vector-map/jquery.vmap.sampledata.js"></script>
    <script src="assets/js/lib/vector-map/country/jquery.vmap.world.js"></script>
    

</body>
</html>
