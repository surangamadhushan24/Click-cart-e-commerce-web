<?php
include('dbinfo.php');

?>

<?php



if (isset($_POST['btnUpdate'])) {
    $txtValue = $_POST['quantity'];
    $cartId = $_POST['cartId'];
    // $cartItemTotal = $_POST['cartItemTotal'];
    // $UpdatedTotal = $txtValue * $cartItemTotal;
    $itemId = $_POST['itemId'];

    $sqlUnitPrice = "SELECT * FROM itemtbl WHERE i_id=$itemId ";
    $priceResult = mysqli_query($conn, $sqlUnitPrice);
    $itemRow = mysqli_fetch_assoc($priceResult);
    $unitPrice = $itemRow['unit_price'];
    $UpdatedTotal = $txtValue * $unitPrice;

    $updateCartItemTable = "UPDATE cartitemtbl SET qty= $txtValue , total_price=$UpdatedTotal WHERE ci_id = $cartId; ";
    $resultUpdate = mysqli_query($conn, $updateCartItemTable);
    // if($resultUpdate){ this made to check query
    //     echo"<script>alert('ok');</script>";
    // }
    // else{
    //     echo"<script>alert('error');</script>";

    // }
}

if (isset($_GET['btnDelete'])) {
    $cartItemId = $_GET['cartItemId'];
    $sqlDelete = "DELETE FROM cartitemtbl WHERE ci_id=$cartItemId; ";
    $deleteResult = mysqli_query($conn, $sqlDelete);
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>cart</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@100;300;500&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" rel="stylesheet">

    <style>
        body {
            padding-top: 30px;
        }

        .frmUpdate {
            display: flex;
        }

        .form-control {
            margin-right: 10px;
        }

        .btnTrash {
            border-style: none;
            background-color: white;
            color: red;
        }

        .card-amount {
            display: flex;
        }

        .btn-all {
            display: flex;
            position: relative;
            margin-top: 3px;
            border-style: none;
            margin-right: 8px;
        }

        .btnCart {
            border-style: none;
            width: 20px;
            border-radius: 40px;
            position: absolute;
            background-color: black;
            top: -12px;
            right: -10px;
            color: white;
        }

        .navbar-brand {
            font-weight: 500;
            font-size: 30px;
        }

        .dropdown{
            display: none;
        }

        .btnUpdate{
            background-color: white;
            color: black;
            font-weight: 500;
            width: 150px;
            border-color: lightgray;
            border-style: solid;

        }

        .proceedSection{
            display: flex;
            justify-content: space-between;
        }
        .amount{
          
            font-size: 20px;
            font-weight: 500;
            border-style: none;
        }


    </style>

</head>

<body>
    <?php
    include('header.php');
    ?>


    <!-- set nav bar -->

    <section class="h-100" style="background-color: #eee;">


        <div class="container h-100 py-5">
            <div class="row d-flex justify-content-center align-items-center h-100">
                <div class="col-10">

                    <div class="d-flex justify-content-between align-items-center mb-4">
                        <h3 class="fw-normal mb-0 text-black">Shopping Cart</h3>
                        <div>
                            <p class="mb-0"><span class="text-muted">Sort by:</span> <a href="home.php" class="text-body">price <i class="fas fa-angle-down mt-1"></i></a></p>
                        </div>
                    </div>
                    <?php
                    $customerId = $_SESSION['cid'];
                    $txtValue = 1;

                    $sql = "SELECT*FROM cartitemtbl WHERE c_id =$customerId ;";
                    $result = mysqli_query($conn, $sql);
                    while ($cartItem = mysqli_fetch_assoc($result)) :
                    ?>

                        <div class="card rounded-3 mb-4">
                            <div class="card-body p-4">
                                <div class="row d-flex justify-content-between align-items-center">
                                    <div class="col-md-2 col-lg-2 col-xl-2">
                                        <img src="./images/<?php echo $cartItem['image'] ?>" class="img-fluid rounded-3" alt="Cotton T-shirt">
                                    </div>
                                    <div class="col-md-3 col-lg-3 col-xl-3">
                                        <p class="lead fw-normal mb-2"><?php echo $cartItem['name'] ?></p>
                                        <p><span class="text-muted"></span> <span class="text-muted">2022: </span></p>
                                    </div>
                                    <div class="col-md-4 col-lg-4 col-xl-3 d-flex">

                                        <button class="btn btn-link px-2" name="btnMinus" onclick="this.parentNode.querySelector('input[type=number]').stepDown()">
                                            <i class="fas fa-minus"></i>
                                        </button>

                                        <form action="#" class="frmUpdate" method="post">
                                            <input id="form_<?php echo $cartItem['ci_id']; ?>" min="1" name="quantity" value="<?php echo $cartItem['qty']; ?>" type="number" class="form-control form-control-sm" />
                                            <input type="hidden" name="cartId" value="<?php echo $cartItem['ci_id']; ?>">
                                            <input type="hidden" name="cartItemTotal" value="<?php echo $cartItem['total_price']; ?>">
                                            <input type="hidden" name="itemId" value="<?php echo $cartItem['i_id']; ?>">
                                            <button type="submit" name="btnUpdate" class="btnUpdate">update</button>
                                        </form>
                                        <button class="btn btn-link px-2" name="btnPlus" onclick="this.parentNode.querySelector('input[type=number]').stepUp()">
                                            <i class="fas fa-plus"></i>
                                        </button>
                                    </div>
                                    <div class="col-md-3 col-lg-2 col-xl-2 offset-lg-1">
                                        <h5 class="mb-0">$<?php echo $cartItem['total_price'] ?></h5>
                                    </div>
                                    <div class="col-md-1 col-lg-1 col-xl-1 text-end">
                                        <form action="#" method="get">
                                            <input type="hidden" name="cartItemId" value="<?php echo $cartItem['ci_id']; ?>">
                                            <button type="submit" name="btnDelete" class="btnTrash"><i class="fas fa-trash fa-lg"></i></button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>

                    <?php endwhile; ?>


                    <div class="card card-amount">
                        <?php
                        $numOfCartItemsRows = "SELECT*FROM cartitemtbl WHERE c_id =$customerId;";
                        $executeNumOfCartItemsRows = mysqli_query($conn, $numOfCartItemsRows);
                        $totalPrice = 0;

                        $resultNumOfCartItemsRows = mysqli_num_rows($executeNumOfCartItemsRows);
                        while ($rowCartItem = mysqli_fetch_assoc($executeNumOfCartItemsRows)) {
                            $totalPrice = $totalPrice + $rowCartItem['total_price'];
                        }
                        ?>
                        <div class="card-body ">
                            <form action="payment.php" method="post" class="proceedSection">
                                <button type="submit" name="btnProcceed"  class="btn btn-warning btn-block btn-lg payment">Proceed to Pay</button>
                                <input type="text" class="amount" name="amount" value="$<?php echo $totalPrice; ?>" readonly>
                            </form>
                        </div>
                    </div>

                </div>
            </div>
        </div>

    </section>

    <footer class="my-5 pt-5 text-muted text-center text-small">
      <p class="mb-1">© 2021 - 2045 Company Name</p>
      <ul class="list-inline">
        <li class="list-inline-item"><a href="#">Privacy</a></li>
        <li class="list-inline-item"><a href="#">Terms</a></li>
        <li class="list-inline-item"><a href="#">Support</a></li>
      </ul>
    </footer>


</body>

</html>