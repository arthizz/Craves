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
    <link rel="stylesheet" type="text/css" href="cdn.datatables.net/1.10.19/css/jquery.dataTables.min.css">

    <link href='https://fonts.googleapis.com/css?family=Open+Sans:400,600,700,800' rel='stylesheet' type='text/css'>
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>


    <!-- <script type="text/javascript" src="https://cdn.jsdelivr.net/html5shiv/3.7.3/html5shiv.min.js"></script> -->
    <script defer src="https://use.fontawesome.com/releases/v5.0.8/js/solid.js" integrity="sha384-+Ga2s7YBbhOD6nie0DzrZpJes+b2K1xkpKxTFFcx59QmVPaSA8c7pycsNaFwUK6l" crossorigin="anonymous"></script>
    <script defer src="https://use.fontawesome.com/releases/v5.0.8/js/fontawesome.js" integrity="sha384-7ox8Q2yzO/uWircfojVuCQOZl+ZZBg2D2J5nkpLqzH1HY0C1dHlTKIbpRz/LG23c" crossorigin="anonymous"></script>

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
                        <?php
                        $sth = $conn->prepare("SELECT * FROM user_tbl WHERE cID = :id");
                        $sth->bindparam(":id", $_SESSION['user']);
                        $sth->execute();

                        $mysession = $sth->fetch(PDO::FETCH_ASSOC);
                        ?>

                        <a href="cashier.php"><i class="fa fa-user"></i> <?php echo $mysession['cFname'].' '.$mysession['cLname']?> </a>
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
                        <button class="btn btn-danger btn-xs" style="border-radius: 5px;" onClick="window.open('../api/kiosk-logout-process.php', '_self',); window.close();">Sign Out</button>
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
                      <th scope="col">Date And Time</th>
                      <th scope="col">Action</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php
                    $status = 2;
                    $name = $mysession['cFname'].' '.$mysession['cLname'];

                    $stmt = $conn->prepare("SELECT DISTINCT cDate FROM cashier_tbl Where cStatus = :stat AND cCashier = :name");
                    $stmt->bindparam(":name", $name);
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
                      <td><?php echo $total;?></td>
                      <td><?=$row['cDate']?></td>
                      <td>

                        <button class="btn btn-xs btn-success" data-toggle="modal" data-target="#<?=$row3['cID']?>"><i class="fa fa-eye"></i></button>

                      </td>
                    </tr>


                    <!-- Modal -->
                        <div class="modal fade" id="<?=$row3['cID']?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                          <div class="modal-dialog" role="document">
                            <div class="modal-content">
                              <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Order List</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                  <span aria-hidden="true">&times;</span>
                                </button>
                              </div>
                              <div class="modal-body">
                                <div class="container-fluid">
                                    <?php
                                      $stmt1 = $conn->prepare("SELECT DISTINCT cProduct FROM cashier_tbl Where cDate = :dat");
                                      $stmt1->bindparam(":dat", $row['cDate']);
                                      $stmt1->execute();

                                      while($row1 = $stmt1->fetch(PDO::FETCH_ASSOC)){

                                        $sth = $conn->prepare("SELECT * FROM cashier_tbl WHERE cProduct = :product AND cDate = :dat");
                                        $sth->bindparam(":dat", $row['cDate']);
                                        $sth->bindparam(":product", $row1['cProduct']);
                                        $sth->execute();
                                        $count = $sth->rowCount();
                                        $row2 = $sth->fetch(PDO::FETCH_ASSOC);

                                      ?>
                                          <div class="col-md-6"><?=$row2['cProduct']?></div>
                                          <div class="col-md-6 ml-auto text-right">x<?php echo $count;?></div>
                                          <br>
                                          <br>
                                        <?php
                                      }
                                        ?>
                                </div>
                              </div>
                              <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                              </div>
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
    <script type="text/javascript" src="cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
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

