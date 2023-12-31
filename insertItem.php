<?php 
include('dbinfo.php');
include('adminNavbar.php'); 
?>

<?php 
if(isset($_POST['btnUpload'])){
    $productName = $_POST['productName'];
    $category =$_POST['category'];
    $unitPrice =$_POST['unitPrice'];
    $description = $_POST['description'];
    $itemStatus = $_POST['itemStatus'];
    $aid = 1;

    $filename = $_FILES["productImage"]["name"];

    $tempname = $_FILES["productImage"]["tmp_name"];  

    $folder = "./images/". $filename;
  

    $sql = "INSERT INTO itemtbl(name,category,unit_price,description,item_status,image,a_id) VALUES ('$productName','$category',$unitPrice,'$description','$itemStatus','$filename',$aid)";
    $resultSql = mysqli_query($conn,$sql);

    // if($resultSql){
    //     echo"ok";
    //     echo"<br>";
    // }
    // else{
    //     echo"opps";
    //     echo"<br>";
    // }

    if (move_uploaded_file($tempname, $folder)) {

        $msg = "Image uploaded successfully";

    }else{

        $msg = "Failed to upload image";
    }
    echo $msg;

}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>insert-item</title>
    <!-- Add Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="container-fluid mt-5">

    <h1 class="mb-4">Add Product</h1>

    <form action="#" method="post" enctype="multipart/form-data">
        <div class="mb-3">
            <label for="productName" class="form-label">Product Name:</label>
            <input type="text" class="form-control" id="productName" name="productName" required>
        </div>

        <div class="mb-3">
            <label for="category" class="form-label">Category:</label>
            <input type="text" class="form-control" id="category" name="category" required>
        </div>

        <div class="mb-3">
            <label for="unitPrice" class="form-label">Unit Price:</label>
            <input type="number" class="form-control" id="unitPrice" name="unitPrice" step="0.01" required>
        </div>

        <div class="mb-3">
            <label for="description" class="form-label">Description:</label>
            <textarea class="form-control" id="description" name="description" required></textarea>
        </div>

        <div class="mb-3">
            <label class="form-label">Item Status:</label>
            <div class="form-check">
                <input class="form-check-input" type="radio" name="itemStatus" id="available" value="available" checked>
                <label class="form-check-label" for="available">Available</label>
            </div>
            <div class="form-check">
                <input class="form-check-input" type="radio" name="itemStatus" id="outOfStock" value="outOfStock">
                <label class="form-check-label" for="outOfStock">Out of Stock</label>
            </div>
        </div>

        <div class="mb-3">
            <label for="productImage" class="form-label">Product Image:</label>
            <input type="file" class="form-control" id="productImage" name="productImage"  required>
        </div>

        <button type="submit" name="btnUpload" class="btn btn-primary">Upload Product</button>
    </form>

    <!-- Add Bootstrap JS and Popper.js -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>