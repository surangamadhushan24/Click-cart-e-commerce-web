<?php
include('dbinfo.php');
if (isset($_POST["btnSubmit"])) {

  $user = $_POST["name"];
  $password = $_POST["password"];

  $sql = "SELECT*FROM admintbl WHERE password = '$password';";

  $result = mysqli_query($conn, $sql);

  $row = mysqli_fetch_assoc($result);

  if (mysqli_num_rows($result) > 0) {
    if ($password == $row['password']) {

      $_SESSION['aid'] = $row['a_id'];
      $_SESSION['Late'] = time();

      header("Location:adminHome.php");
    } else {

      echo "<script>alert('Enter Correct password');</script>";
    }
  } else {

    echo "User not Registered yet!";
  }


  mysqli_close($conn);
}

?>


<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>sign-in-admin</title>
  <link rel="stylesheet" href="sign-in.css">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" rel="stylesheet">

  <script src="https://code.jquery.com/jquery-3.7.1.js" integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4=" crossorigin="anonymous"></script>




</head>

<body>
  <script src="https://use.fontawesome.com/f59bcd8580.js"></script>
  <div class="container">
    <div class="row m-5 no-gutters shadow-lg">
      <div class="col-md-6 d-none d-md-block">
        <img src="images/3.jpg" class="img-fluid" style="min-height:100%;" />
      </div>
      <div class="col-md-6 p-5 bg-white">
        <h3 class="pb-3"> Admin Login Form</h3>
        <div class="form-style">
          <form action="#" method="post">
            <div class="form-group pb-3">
              <input type="text" placeholder="username" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="name" required>
            </div>
            <div class="form-group pb-3">
              <input type="password" placeholder="Password" class="form-control" id="exampleInputPassword1" name="password" required>
            </div>
            <div class="d-flex align-items-center justify-content-between">
              <div class="d-flex align-items-center"><input name="" type="checkbox" value="" /> <span class="pl-2 font-weight-bold">Remember Me</span></div>
              <div><a href="#">Forget Password?</a></div>
            </div>
            <div class="pb-2">
              <button type="submit" class="btn btn-dark w-100 font-weight-bold mt-2 btnSubmit" name="btnSubmit">Sign In</button>
            </div>
            <div class="pt-4 text-center">
              Not a member<a href="sign-up.php">Sign Up</a>
            </div>
        </div>
        </form>

      </div>

    </div>
  </div>
  </div>

</body>

</html>