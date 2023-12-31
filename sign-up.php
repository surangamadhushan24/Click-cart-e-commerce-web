<?php
include('dbinfo.php');
if (isset($_POST["btnSubmit"])) {
    $userName = $_POST["username"];
    $email = $_POST["email"];
    $password = $_POST["createPassword"];
    $confirmPassword = $_POST["confirmPassword"];
    $address = $_POST["address"];
    $telephone = $_POST["telephone"];

    if ($password == $confirmPassword) {
        $insertCustomer = "INSERT INTO customertbl(name,address,email,user_password,telephone)VALUES('$userName','$address','$email','$password',$telephone);";
        $resultCustomer = mysqli_query($conn, $insertCustomer);
        header("Location:sign-in.php");
    } else {
        echo "<script>alert('Password not match');</script>";
        header("Location:sign-up.php");
    }
    mysqli_close($conn);
}

?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>sign-in-clickcart</title>
    <link rel="stylesheet" href="sign-in.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" rel="stylesheet">


</head>

<body>
    <script src="https://use.fontawesome.com/f59bcd8580.js"></script>
    <div class="container">
        <div class="row m-5 no-gutters shadow-lg">
            <div class="col-md-6 d-none d-md-block">
                <img src="images/3.jpg" class="img-fluid" style="min-height:100%;" />
            </div>
            <div class="col-md-6 p-5 bg-white">
                <h3 class="pb-3">Sign Up</h3>
                <div class="form-style">
                    <form class="needs-validation" action="#" method="post">
                        <div class="form-group pb-3">
                            <input type="text" placeholder="Username" class="form-control" id="exampleInputUsername" name="username" required>
                        </div>
                        <div class="form-group pb-3">
                            <input type="email" placeholder="Email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="email" required>
                        </div>
                        <div class="form-group pb-3">
                            <input type="password" placeholder="Create Password" class="form-control" id="exampleInputCreateP" name="createPassword" required>
                        </div>
                        <div class="form-group pb-3">
                            <input type="password" placeholder="Confirm Password" class="form-control" id="exampleInputCreateP" name="confirmPassword" required>
                        </div>
                        <div class="form-group pb-3">
                            <input type="text" placeholder="Address" class="form-control" id="exampleInputAddress" name="address" required>
                        </div>
                        <div class="form-group pb-3">
                            <input type="number" placeholder="Telephone" class="form-control" id="exampleInputTelePhone" name="telephone" required>
                        </div>
                
                        <div class="pb-2">
                            <button type="submit" class="btn btn-dark w-100 font-weight-bold mt-2 btnSubmit" name="btnSubmit">Submit</button>
                        </div>
                        <div class="pt-4 text-center">
                            Already has in account<a href="sign-in.php">Sign In</a>
                        </div>
                    </form>

                </div>

            </div>
        </div>
    </div>

</body>

</html>