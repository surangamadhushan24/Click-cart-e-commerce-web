<?php
include('dbinfo.php');
$id = $_SESSION['cid'];

?>

<?php

if (isset($_POST['addToCart'])) {
  $customerId = $_SESSION['cid'];
  $itemId = $_POST['item_id'];
  $itemImage = $_POST['item_image'];
  $itemName = $_POST['item_name'];
  // $_SESSION['itemId'] =$itemId;
  $quantity = 1;


  // select query to get price
  $getPrice = "SELECT*FROM itemtbl WHERE i_id = $itemId ;";
  $returnItems = mysqli_query($conn, $getPrice);
  if (!$returnItems) {
    // Query execution failed, handle the error
    echo "Error: " . mysqli_error($conn);
  }
  $itemPrice = mysqli_fetch_assoc($returnItems);
  if (mysqli_num_rows($returnItems) > 0) {
    $unitPrice = $itemPrice['unit_price'];
  } else {
    echo "<script>alert('error');</script>";
  }
  $totalprice = $unitPrice * $quantity;



  $countCartQuery = "SELECT*FROM cartitemtbl WHERE c_id =$customerId AND i_id=$itemId;";
  $executeCountCart = mysqli_query($conn, $countCartQuery);
  if (mysqli_num_rows($executeCountCart) > 0) {
    echo "<script>alert('already item in cart');</script>";
  } else {
    echo "<script>alert('successfully addded');</script>";
    $insertToCart = "INSERT INTO cartitemtbl(qty,total_price,i_id,c_id,image,name)VALUES($quantity,$totalprice,$itemId,$customerId,'$itemImage','$itemName')";
    $insertCart = mysqli_query($conn, $insertToCart);
  }

  // $cartCount = mysqli_num_rows($executeCountCart);
  // $displayCountCartQuery = "SELECT*FROM cartitemtbl WHERE c_id =$customerId ;";
  // $executeDisplayCountCartQuery =  mysqli_query($conn, $displayCountCartQuery);
  // $countCart = mysqli_num_rows($executeDisplayCountCartQuery);
}



?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>click-cart-home</title>
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@100;300;500&display=swap" rel="stylesheet">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" rel="stylesheet">

  <style>
    * {
      margin: 0;
      padding: 0;
      box-sizing: border-box;
    }


    .img-items {
      height: 280px;
    }

    body,
    html {
      margin: 0;
      padding: 0;
    }

    body {
      margin-top: 20px;
      position: relative;
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

    .carousel1 {
      margin-top: 50px;
    }

    .card1 {
      text-align: center;

    }

    .btn-warning {
      color: white;
    }

    .row {
      margin: 0;
      padding: 0;
    }

    .navbar-brand {
            font-weight: 500;
            font-size: 30px;
        }

    @media (max-width: 500px) {
      .card1 {
        width: 100%;
     }
    }
  </style>

</head>

<body data-bs-spy="scroll" data-bs-target=".navbar" data-bs-offset="45">
  <!-- navbar -->
  <?php
  include('header.php');
  ?>

  <!-- Carousel -->

  <section id="s1">
    <div id="demo" class="carousel slide carousel1" data-bs-ride="carousel">

      <!-- Indicators/dots -->
      <div class="carousel-indicators ">
        <button type="button" data-bs-target="#demo" data-bs-slide-to="0" class="active"></button>
        <button type="button" data-bs-target="#demo" data-bs-slide-to="1"></button>
        <button type="button" data-bs-target="#demo" data-bs-slide-to="2"></button>
      </div>

      <!-- The slideshow/carousel -->
      <div class="carousel-inner">
        <div class="carousel-item active">
          <img src="./images/0.jpg" alt="Los Angeles" class="d-block" style="width:100%; height:80vh" class="slide-show">
          <div class="carousel-caption">
            
          </div>
        </div>
        <div class="carousel-item">
          <img src="./images/1.jpg" alt="Chicago" class="d-block" style="width:100%; height:80vh" class="slide-show">

          <div class="carousel-caption">
            
          </div>
        </div>
        <div class="carousel-item">
          <img src="./images/tt.jpg" alt="New York" class="d-block" style="width:100%; height:80vh" class="slide-show">
          <div class="carousel-caption">
          
          </div>
        </div>
      </div>

      <!-- Left and right controls/icons -->
      <button class="carousel-control-prev" type="button" data-bs-target="#demo" data-bs-slide="prev">
        <span class="carousel-control-prev-icon"></span>
      </button>
      <button class="carousel-control-next" type="button" data-bs-target="#demo" data-bs-slide="next">
        <span class="carousel-control-next-icon"></span>
      </button>
    </div>
  </section>

  <?php
  $selectDistinctCategories = "SELECT DISTINCT category FROM itemtbl;";
  $resultDistinctCategories = mysqli_query($conn, $selectDistinctCategories);
  
  while ($rowDistinctCategory = mysqli_fetch_assoc($resultDistinctCategories)) :
  $category = $rowDistinctCategory['category'];
  ?>
    <section id="<?php echo $category ?>">
      <div class="row">
        <h2 class="mt-5"><?php echo $category ?></h2>
        <?php
        $selectItemsByCategory = "SELECT * FROM itemtbl WHERE category='$category';";
        $resultItemsByCategory = mysqli_query($conn, $selectItemsByCategory);
        while ($item = mysqli_fetch_assoc($resultItemsByCategory)) : ?>
          <div class="col-12 col-sm-6 col-md-4 col-lg-3">
            <div class="container-fluid mt-5 cardBase">
              <div class="card card1">
                <img class="card-img-top img-items" src="./images/<?php echo $item['image']; ?>" alt="<?php echo $item['name']; ?>" style="width: 100%;">
                <div class="card-body">
                  <h5><?php echo $item['name']; ?></h5>
                  <p><?php echo $item['item_status']; ?></p>
                  <p>$<?php echo $item['unit_price']; ?></p>
                  <h6><?php echo $item['description']; ?></h6>
                  <form action="payment.php" method="post">
                    <button class="btn btn-warning " style="width: 90%;" name="buyNow">Buy Now</button>
                    <input type="hidden" value="<?php echo $item['unit_price']; ?>" name="item_price">
                  </form>
                  <form action="#" method="post" name="frmcard">
                    <input type="hidden" value="<?php echo $item['i_id']; ?>" name="item_id">
                    <input type="hidden" value="<?php echo $item['image']; ?>" name="item_image">
                    <input type="hidden" value="<?php echo $item['name']; ?>" name="item_name">
                    <button class="btn btn-dark mt-2" name="addToCart" style="width: 90%;">add to cart</button>
                  </form>
                </div>
              </div>
            </div>
          </div>
        <?php endwhile; ?>
      </div>
    </section>
  <?php endwhile; ?>




  <?php
  include('footer.php');
  ?>









</body>

</html>