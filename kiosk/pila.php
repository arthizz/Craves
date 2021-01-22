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
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

    <title>Queuing</title>
  </head>
  <style type="text/css">
      .scroll{
        height: 300px;
        overflow-y: auto;
      }

  </style>

  <body style="background-color: #79C1E6;">


    <div class="container">
      <div class="row">
        <?php
        $status = 1;
        $stmt = $conn->prepare("SELECT DISTINCT cDate FROM cashier_tbl WHere cStatus = :status");
        $stmt->bindparam(":status", $status);
        $stmt->execute();

        while($row = $stmt->fetch(PDO::FETCH_ASSOC)){
        ?>
        <div class="col-md-4 mt-5">
          <div class="card bg-dark">
            <div class="card-body scroll">
              <table class="table table-dark">
                <thead>
                  <tr>
                    <th scope="col">Product Name</th>
                    <th scope="col">Quantity</th>
                  </tr>
                </thead>
                <tbody>
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

                    <tr>
                      <th><?=$row2['cProduct']?></th>
                      <td><?php echo $count;?></td>
                    </tr>
                    <?php
                  }
                    ?>

                </tbody>
              </table>
            </div>
            <a href="../api/tanggal-pila-process.php?date=<?=$row['cDate']?>"><button class="btn btn-primary btn-block">DONE</button></a>
          </div>
        </div>
        <?php
      }
        ?>
      </div>
    </div>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  </body>
</html>