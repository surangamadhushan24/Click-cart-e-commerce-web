<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>About Us - Click Cart</title>
    <!-- Bootstrap CSS Link -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@100;300;500&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" rel="stylesheet">
    <style>
        body {
            padding-top: 60px;
        }

        h2 {
            font-size: 25px;
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

        .dropdown {
            display: none;
        }
        .navbar-brand {
            font-weight: 500;
            font-size: 30px;
        }

       
    </style>
</head>
<body>
    <?php 
    include('dbinfo.php');
    include('header.php')?>

    <div class="container mt-5">
        <h1 class="mb-4">About Us - Click Cart</h1>

        <p class="lead">Welcome to Click Cart, your premier online shopping destination. At Click Cart, we are dedicated to providing a diverse selection of high-quality products combined with a user-friendly shopping experience. Our mission is to make online shopping convenient, enjoyable, and secure for our customers.</p>

        <h2 class="mt-4">Our Story</h2>

        <p>Founded in 2021, Click Cart has quickly become a trusted name in the e-commerce industry. Our journey started with a vision to create an online marketplace that offers a wide range of products, from electronics to fashion, at competitive prices.</p>

        <p>Over the years, we have grown and adapted to the ever-changing needs of our customers. We take pride in our commitment to customer satisfaction, and our team works tirelessly to ensure that you have a seamless shopping experience from start to finish.</p>

        <h2 class="mt-4">Why Choose Click Cart?</h2>

        <ul>
            <li>Extensive Product Selection: Discover a vast array of products from leading brands across various categories.</li>
            <li>Secure Shopping: Shop with confidence knowing that your transactions are secure and your data is protected.</li>
            <li>Fast and Reliable Delivery: Enjoy prompt and reliable delivery services to your doorstep.</li>
            <li>Exceptional Customer Service: Our customer support team is here to assist you with any inquiries or concerns.</li>
        </ul>

        <h2 class="mt-4">Contact Us</h2>

        <form action="#" method="post">
            <div class="mb-3">
                <label for="businessName" class="form-label">Name:</label>
                <input type="text" class="form-control" id="businessName" name="businessName" required>
            </div>

            <div class="mb-3">
                <label for="description" class="form-label">Your Message:</label>
                <textarea class="form-control" id="description" name="description" rows="4" required></textarea>
            </div>

            <div class="mb-3">
                <label for="contactEmail" class="form-label">Contact Email:</label>
                <input type="email" class="form-control" id="contactEmail" name="contactEmail" required>
            </div>

            <div class="mb-3">
                <label for="contactPhone" class="form-label">Contact Phone:</label>
                <input type="tel" class="form-control" id="contactPhone" name="contactPhone" required>
            </div>

            <button type="submit" class="btn btn-warning">Submit</button>
        </form>
    </div>

    <!-- Bootstrap JS and Popper.js Links (for Bootstrap components that require JS) -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
