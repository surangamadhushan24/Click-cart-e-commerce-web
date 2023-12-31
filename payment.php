<?php
include('dbinfo.php');
$amount = 0;
$cid = $_SESSION['cid'];
date_default_timezone_set('Asia/Kolkata');
$today =date("Y/m/d");
$time =date("H:i:s");
?>

<?php
if (isset($_POST['btnProcceed'])) {
  $amount = $_POST['amount'];
 
}
?>
<?php
if (isset($_POST['buyNow'])) {
  $amount = $_POST['item_price'];
  echo"<style>.text-muted{display:none;}</style>";
  echo"<script>document.querySelector('.text-muted').innerHTML='Item Total'</script>";
}
?>

<?php
if (isset($_POST['btnPayment'])) {
  $pAmount = $_POST['pAmount'];
  $methods = $_POST['paymentMethod'];
  $address = $_POST["address"];
  $zip = $_POST["zip"];
  $insertOrder = "INSERT INTO ordertbl(o_date,o_time,amount,c_id)VALUES('$today','$time',$pAmount,$cid);";
  $resultOrder = mysqli_query($conn,$insertOrder);
  
  $searchOid = "SELECT * FROM ordertbl WHERE c_id= $cid ;";
  $resultOid = mysqli_query($conn,$searchOid);

  if(mysqli_num_rows($resultOid)== 0){
    $oid = $resultOid['o_id'];
    $insertPayment = "INSERT INTO paymenttbl(amount,method,o_id,shi_address,zip)VALUES($pAmount,'$methods',$oid,'$address',$zip);";
    $resultPayment = mysqli_query($conn,$insertPayment);
    echo "<script>swal('Good job!', 'You clicked the button!', 'success');</script>";

  }
  elseif(mysqli_num_rows($resultOid)>0){
  $searchMaxOid = "SELECT MAX(o_id) AS max_oid FROM ordertbl WHERE c_id = $cid;";
  $resultMaxOid = mysqli_query($conn, $searchMaxOid);
  $row = mysqli_fetch_assoc($resultMaxOid);
  $oid = $row['max_oid'];
  

  // Inserting payment information into paymenttbl using the highest order ID
  $insertPayment = "INSERT INTO paymenttbl(amount, method, o_id, shi_address, zip) VALUES ($pAmount, '$methods', $oid, '$address', $zip);";
  $resultPayment = mysqli_query($conn, $insertPayment);

  }
  $delteCart = "DELETE FROM cartitemtbl WHERE c_id=$cid;";
  $resultDelete = mysqli_query($conn,$delteCart);
  echo "<script>alert('Payment Successfull');</script>";
  }

?>


<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Payment</title>
  <!-- Bootstrap 5 CSS -->
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@100;300;500&display=swap" rel="stylesheet">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" rel="stylesheet">
  <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
  <script>
    swal("Good job!", "You clicked the button!", "success");
  </script>
  <style>
    body {
      padding: 45px;
    }

    .dropdown {
      display: none;
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

    .total{
      background-color: black;
      color: white;
    }
  </style>
</head>

<body>
  <?php
  include('header.php');
  ?>

  <div class="container">
    <div class="py-5 text-center">
      <h2>Checkout form</h2>
    </div>

    <div class="row">
      <div class="col-md-4 order-md-2 mb-4">
        <h4 class="d-flex justify-content-between align-items-center mb-3">
          <span class="text-muted">Your cart</span>
          <span class="badge badge-secondary badge-pill">3</span>
        </h4>
        <form class="needs-validation" method="post" action="#">
        <ul class="list-group mb-3">
          <?php
          if (isset($_POST['btnProcceed'])) {
            $sql = "SELECT * FROM cartitemtbl WHERE c_id = $cid;";
            $result = mysqli_query($conn, $sql);
            while ($cartItem = mysqli_fetch_assoc($result)) : ?>
              <li class="list-group-item d-flex justify-content-between lh-condensed">
                <div>
                  <h6 class="my-0"><?php echo $cartItem['name'] ?></h6>
                </div>
                <span class="text-muted"><?php echo $cartItem['total_price'] ?></span>
              </li>
          <?php endwhile;
          }
          ?>


          <li class="list-group-item d-flex justify-content-between total">

            <span>Total (USD)</span>
            <strong><?php echo isset($amount) ? $amount : '0'; ?></strong>
          </li>
        </ul>
      </div>
      <div class="col-md-8 order-md-1">
        <h4 class="mb-3">Billing address</h4>
       

          <div class="mb-3">
            <label for="fullName">Full name</label>
            <input type="text" class="form-control" name="name" id="fullName" placeholder="" value="" required>
            <div class="invalid-feedback">
              Valid first name is required.
            </div>
          </div>

          <div class="mb-3">
            <label for="email">Email <span class="text-muted">(Optional)</span></label>
            <input type="email" class="form-control" name="email" id="email" placeholder="madhushan@email.com">
            <div class="invalid-feedback">
              Please enter a valid email address for shipping updates.
            </div>
          </div>

          <div class="mb-3">
            <label for="address">Address</label>
            <input type="text" class="form-control" name="address" id="address" placeholder="1234 Main St" required>
            <div class="invalid-feedback">
              Please enter your shipping address.
            </div>
          </div>


          <div class="row">
            <div class="col-md-6 mb-3">
              <label for="country">Country</label>
              <select class="custom-select d-block w-100" name="country" id="country" required>
                <option value="">Choose...</option>
                <option>Sri Lanka</option>
                <option>India</option>
                <option>Bangaladesh</option>
              </select>
              <div class="invalid-feedback">
                Please select a valid country.
              </div>
            </div>

            <div class="col-md-6 mb-3">
              <label for="zip">Zip</label>
              <input type="text" class="form-control" name="zip" id="zip" placeholder="" required>
              <div class="invalid-feedback">
                Zip code required.
              </div>
            </div>
          </div>
          <hr class="mb-4">

          <hr class="mb-4">

          <h4 class="mb-3">Payment</h4>

          <div class="d-block my-3">
            <div class="custom-control custom-radio">
              <input id="credit" name="paymentMethod" type="radio" class="custom-control-input" checked required>
              <label class="custom-control-label" for="credit">Credit card</label>
            </div>
            <div class="custom-control custom-radio">
              <input id="debit" name="paymentMethod" type="radio" class="custom-control-input" required>
              <label class="custom-control-label" for="debit">Debit card</label>
            </div>
            <div class="custom-control custom-radio">
              <input id="paypal" name="paymentMethod" type="radio" class="custom-control-input" required>
              <label class="custom-control-label" for="paypal">PayPal</label>
            </div>
          </div>
          <div class="row">
            <div class="col-md-6 mb-3">
              <label for="cc-name">Name on card</label>
              <input type="text" class="form-control" id="cc-name" placeholder="" required >
              <small class="text-muted">Full name as displayed on card</small>
              <div class="invalid-feedback">
                Name on card is required
              </div>
            </div>
            <div class="col-md-6 mb-3">
              <label for="cc-number">Credit card number</label>
              <input type="text" class="form-control" id="cc-number" placeholder="" required>
              <div class="invalid-feedback">
                Credit card number is required
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-md-3 mb-3">
              <label for="cc-expiration">Expiration</label>
              <input type="text" class="form-control" id="cc-expiration" placeholder="" required>
              <div class="invalid-feedback">
                Expiration date required
              </div>
            </div>
            <div class="col-md-3 mb-3">
              <label for="cc-cvv">CVV</label>
              <input type="text" class="form-control" id="cc-cvv" placeholder="" required>
              <div class="invalid-feedback">
                Security code required
              </div>
            </div>
          </div>
          <hr class="mb-4">
          <input type="hidden" name="pAmount" value="<?php echo $amount;?>">
          <button class="btn btn-warning" name="btnPayment" type="submit">Continue to checkout</button>
        </form>
      </div>
    </div>

    <footer class="my-5 pt-5 text-muted text-center text-small">
      <p class="mb-1">© 2021 - 2045 Company Name</p>
      <ul class="list-inline">
        <li class="list-inline-item"><a href="#">Privacy</a></li>
        <li class="list-inline-item"><a href="#">Terms</a></li>
        <li class="list-inline-item"><a href="#">Support</a></li>
      </ul>
    </footer>
  </div>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-U1DAWAznBHeqEIlVSCgzq+c9gqGAJn5c/t99JyeKa9xxaYpSvHU5awsuZVVFIhvj" crossorigin="anonymous"></script>

</body>

</html>