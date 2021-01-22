<?php
    require_once '../connection/connection.php';
    session_start();

    if(isset($_SESSION['user'])){

    }
    else{
        echo "<script>window.open('../kiosk/index.php','_self')</script>";
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

    <link rel="apple-touch-icon" href="apple-icon.png">
    <link rel="shortcut icon" href="favicon.ico">

    <link rel="stylesheet" href="../admin/assets/css/normalize.css">
    <link rel="stylesheet" href="../adminassets/css/bootstrap.min.css">
    <link rel="stylesheet" href="../admin/assets/css/font-awesome.min.css">
    <link rel="stylesheet" href="../admin/assets/css/themify-icons.css">
    <link rel="stylesheet" href="../adminassets/css/flag-icon.min.css">
    <link rel="stylesheet" href="../adminassets/css/cs-skin-elastic.css">
    <!-- <link rel="stylesheet" href="assets/css/bootstrap-select.less"> -->
    <link rel="stylesheet" href="../admin/assets/scss/style.css">
    <link href="../admin/assets/css/lib/vector-map/jqvmap.min.css" rel="stylesheet">

    <link href='https://fonts.googleapis.com/css?family=Open+Sans:400,600,700,800' rel='stylesheet' type='text/css'>
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>


    <!-- <script type="text/javascript" src="https://cdn.jsdelivr.net/html5shiv/3.7.3/html5shiv.min.js"></script> -->
    <script defer src="https://use.fontawesome.com/releases/v5.0.8/js/solid.js" integrity="sha384-+Ga2s7YBbhOD6nie0DzrZpJes+b2K1xkpKxTFFcx59QmVPaSA8c7pycsNaFwUK6l" crossorigin="anonymous"></script>
    <script defer src="https://use.fontawesome.com/releases/v5.0.8/js/fontawesome.js" integrity="sha384-7ox8Q2yzO/uWircfojVuCQOZl+ZZBg2D2J5nkpLqzH1HY0C1dHlTKIbpRz/LG23c" crossorigin="anonymous"></script>

</head>
    <style type="text/css">
        .lead{
            color: black !important;

        }
        .style5{
            background-color: #fff;
             border-top: 2px dashed #8c8b8b;
        }
        .printable{
            display: none;
        }
        @media print{
            .printable{
                display: block;
            }
            aside{
                display: none;
            }
            table{
                display: none;
            }
            button.pampawala{
                display: none;
            }
            div.page-title{
                display: none;
            }
            ul.nav{
                display: none;
            }
        }
    </style>

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
                        <?php
                        $sth = $conn->prepare("SELECT * FROM user_tbl WHERE cID = :id");
                        $sth->bindparam(":id", $_SESSION['user']);
                        $sth->execute();

                        $mysession = $sth->fetch(PDO::FETCH_ASSOC);
                        ?>

                        <a href="#" class="non-print"><i class="fa fa-user"></i> <?php echo $mysession['cFname'].' '.$mysession['cLname']?> </a>
                    </li>
                    <li>

                        <a href="cashier_history.php"><i class="fas fa-history"></i> History </a>
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

                </div>

                <div class="col-sm-5">
                    <div class="user-area float-right">
                        <button class="btn btn-danger btn-xs pampawala" style="border-radius: 5px;" onClick="window.open('../api/kiosk-logout-process.php', '_self',); window.close();">Sign Out</button>
                    </div>


                </div>
            </div>

        </header><!-- /header -->
        <!-- Header-->

        <div class="breadcrumbs">
            <div class="col-sm-4">
                <div class="page-header float-left">
                    <div class="page-title">
                        <h1>Order take</h1>
                    </div>
                </div>
            </div>
            <div class="col-sm-8">
                <div class="page-header float-right">
                    <div class="page-title">
                        <ol class="breadcrumb text-right">
                            <li class="active">Order take</li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>

        <div class="content mt-3">
            <div class="col-md-12">

                <table class="table">
                  <thead>
                    <tr>
                      <th scope="col">Waiter Name</th>
                      <th scope="col">Product Quantity</th>
                      <th scope="col">Price</th>
                      <th scope="col">Action</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php
                    $status = 0;
                    


                    $stmt = $conn->prepare("SELECT DISTINCT cDate FROM cashier_tbl Where cStatus = :stat");
                    $stmt->bindparam(":stat", $status);
                    $stmt->execute();
                    $total = 0;
                    

                        while($row = $stmt->fetch(PDO::FETCH_ASSOC)){

                            $stmt2 = $conn->prepare("SELECT * FROM cashier_tbl WHERE cDate = :dat");
                            $stmt2->bindparam(":dat", $row['cDate']);
                            $stmt2->execute();
                            $count = $stmt2->rowCount();
                            $total=0;
                            while($row2 = $stmt2->fetch(PDO::FETCH_ASSOC)){
                                $total = $total+$row2['cPrice'];

                            }

                            $stmt3 = $conn->prepare("SELECT * FROM cashier_tbl WHERE cDate = :dat");
                            $stmt3->bindparam(":dat", $row['cDate']);
                            $stmt3->execute();

                            $row3 = $stmt3->fetch(PDO::FETCH_ASSOC);

                            
                    ?>

                    <tr>
                      <td><?=$row3['cWaiter_name']?></td>
                      <td><?php echo $count;?></td>
                      <td><?php echo $total; ?></td>
                      <td>

                        <a href="../api/pila-process.php?date=<?php echo $row['cDate'];?>&&id=<?php echo $_SESSION['user'];?>"><button class="btn btn-xs btn-success"><i class="fas fa-thumbs-up"></i></button></a>
                        <button class="btn btn-xs btn-danger"><i class="fas fa-trash"></i></button>
                        <button class="btn btn-xs btn-primary" onclick="window.print();"><i class="fas fa-print"></i></button></a>

                      </td>
                    </tr>

                    <div class="col-md-5 printable">
                        <div class="card">
                          <div class="card-body mx-auto">
                            <p class="lead text-center">Craves Avenue</p>
                            <p class="lead text-center">Rizal Ave. 1623 2200 Olongapo City</p>
                            <br>
                            <p class="lead text-right"><?=$row['cDate']?></p>
                            <p class="lead text-right">CASHIER: <?php echo $mysession['cFname'].' '.$mysession['cLname']?></p>
                            <hr class="style5">
                            <br>
                            <div class="row">
                                <div class="col-md-4 lead">ORDERS:</div>
                                <div class="col-md-4 lead">PRICE:</div>
                                <div class="col-md-4 lead">TOTAL:</div>
                            </div>
                            <br>
                             <?php
                              $stmt1 = $conn->prepare("SELECT DISTINCT cProduct FROM cashier_tbl Where cDate = :dat");
                              $stmt1->bindparam(":dat", $row['cDate']);
                              $stmt1->execute();
                              $total1 = 0;

                              while($row1 = $stmt1->fetch(PDO::FETCH_ASSOC)){
                                $total1 = 0;
                                $sth = $conn->prepare("SELECT * FROM cashier_tbl WHERE cProduct = :product AND cDate = :dat");
                                $sth->bindparam(":dat", $row['cDate']);
                                $sth->bindparam(":product", $row1['cProduct']);
                                $sth->execute();
                                $count = $sth->rowCount();
                                $row2 = $sth->fetch(PDO::FETCH_ASSOC);
                                $total1 = $total1+$row2['cPrice']*$count;

                              ?>
                                  
                                  <div class="row">
                                      <div class="col-md-4 lead" style="font-size: 13px;"><?=$row1['cProduct']?> x<?php echo $count;?>  </div>
                                      <div class="col-md-4 lead" style="font-size: 13px;"><?=$row2['cPrice']?>.00</div>
                                      <div class="col-md-4 lead" style="font-size: 13px;"><?php echo $total1; ?></div>
                                  </div>
                                  <br>
                                <?php
                              }
                                ?>
                                <br>
                                  <br>
                                  <p class="lead text-right"> TOTAL : <?php echo $total;?></p>
                                  <br>
                                  <br>
                                  <p class="lead text-center">THANKS YOU PLEASE COME AGAIN</p>
                          </div>
                        </div>
                    </div>


                    <?php
                }
                    ?>
                  </tbody>
                </table>
                
            </div>
        </div> <!-- .content -->
    </div><!-- /#right-panel -->

    <!-- Right Panel -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    <script src="assets/js/vendor/jquery-2.1.4.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.3/umd/popper.min.js"></script>
    <script src="assets/js/plugins.js"></script>
    <script src="assets/js/main.js"></script>


    <script src="../admin/assets/js/lib/chart-js/Chart.bundle.js"></script>
    <script src="../admin/assets/js/dashboard.js"></script>
    <script src="../admin/assets/js/widgets.js"></script>
    <script src="../admin/assets/js/lib/vector-map/jquery.vmap.js"></script>
    <script src="../admin/assets/js/lib/vector-map/jquery.vmap.min.js"></script>
    <script src="../admin/assets/js/lib/vector-map/jquery.vmap.sampledata.js"></script>
    <script src="../admin/assets/js/lib/vector-map/country/jquery.vmap.world.js"></script>
    

</body>
</html>

