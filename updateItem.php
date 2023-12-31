<?php
include('dbinfo.php');
include('adminNavbar.php');
?>

<?php
if(isset($_POST['btnUpdate'])){
    $itemId = $_POST['itemId'];
    $productName = $_POST['productName'];
    $category =$_POST['category'];
    $unitPrice =$_POST['unitPrice'];
    $description = $_POST['description'];
    $itemStatus = $_POST['itemStatus'];

    $sqlUpdate = "UPDATE itemtbl SET name ='$productName',category ='$category',unit_price = $unitPrice,description='$description',item_status='$itemStatus' WHERE i_id=$itemId ;";
    $updateResult = mysqli_query($conn,$sqlUpdate);
    
}
 ?>

 <?php 
 if (isset($_POST['btnDelete'])){
    $itemId = $_POST['itemId'];
    $sqlDelete = "DELETE FROM itemtbl WHERE i_id=$itemId; ";
    $deleteResult = mysqli_query($conn,$sqlDelete);

 }
 ?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" rel="stylesheet">
    <title>update-products</title>
  
</head>

<body>

    <button class="btn btn primary">View Database</button>
    <div class="container-fluid mt-3">

        <table class="table table-light table-hover">
            <thead>
                <tr>
                    <th>Item id</th>
                    <th>Name</th>
                    <th>Category</th>
                    <th>Unit Price</th>
                    <th>Description</th>
                    <th>Item Status</th>
                    <!-- <th>Image</th> -->
                    <th>Delete Items</th>
                </tr>
            </thead>
            <tbody>
                <?php

                $sql = "SELECT * FROM itemtbl";
                $result = mysqli_query($conn, $sql);
                while ($items = mysqli_fetch_assoc($result)) : ?>
                    <tr>
                        <td><?php echo $items['i_id'] ?></td>
                        <td><?php echo $items['name'] ?></td>
                        <td><?php echo $items['category'] ?></td>
                        <td><?php echo $items['unit_price'] ?></td>
                        <td><?php echo $items['description'] ?></td>
                        <td><?php echo $items['item_status'] ?></td>
                        <!-- <td><img src="./images/<?php echo $items['image']; ?>"></td> -->
                        <form action="#" method="post">
                        <td><button type="submit" name="btnDelete" class="btnTrash"><i class="fas fa-trash fa-lg"></i></button></td>
                        <input type="hidden" name ="itemId" value="<?php echo $items['i_id'] ?>">
                        </form>
                    </tr>
                <?php endwhile; ?>
            </tbody>
        </table>
    </div>

    <div class="container-fluid mt-3">
        <h1 class="mb-4">Update Product</h1>

        <form action="#" method="post" enctype="multipart/form-data">
        <div class="mb-3">
                <label for="itemId" class="form-label">Item id:</label>
                <input type="number" class="form-control" id="itemId" name="itemId"  required>
            </div>        

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

            <!-- <div class="mb-3">
                <label for="productImage" class="form-label">Product Image:</label>
                <input type="file" class="form-control" id="productImage" name="productImage" accept="image/*" required>
            </div> -->

            <button type="submit" name="btnUpdate" class="btn btn-primary">Update Product</button>
        </form>
    </div>


</body>

</html>