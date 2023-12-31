<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Click Cart Returns Policy</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/css/bootstrap.min.css" rel="stylesheet">
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
    </style>
</head>

<body>
    <?php
    include("dbinfo.php");
    include("header.php") ?>

    <!-- Main Content -->
    <div class="container mt-5">
        <section id="return-eligibility">
            <h2>1. Return Eligibility</h2>
            <h3>a. Defective or Damaged Products:</h3>
            <p>If you receive a defective or damaged product, please contact us within [number of days] days of receiving
                the order for a replacement or refund.</p>
            <h3>b. Incorrect Items:</h3>
            <p>If you receive the wrong item, please notify us within [number of days] days of receiving the order. We
                will arrange for the correct item to be sent or provide a refund.</p>
            <h3>c. Change of Mind:</h3>
            <p>We accept returns for change of mind within [number of days] days of receiving the order. The product must
                be unused, in its original packaging, and in resalable condition. Return shipping costs are the
                responsibility of the customer.</p>
        </section>

        <section id="return-process" class="mt-5">
            <h2>2. Return Process</h2>
            <h3>a. Contact Us:</h3>
            <p>To initiate a return, contact our customer support at contactclickcart@gmail.com or call us at
                0713357770. Provide your order number and details of the issue.</p>
            <h3>b. Authorization:</h3>
            <p>Wait for authorization from our customer support before returning the product. Unauthorized returns may
                not be accepted.</p>
            <h3>c. Packaging:</h3>
            <p>Pack the product securely in its original packaging, including all accessories and documentation.</p>
            <h3>d. Return Shipping:</h3>
            <p>Ship the product to the address provided during the return authorization process. The customer is
                responsible for return shipping costs.</p>
        </section>

        <section id="refund-replacement" class="mt-5">
            <h2>3. Refund or Replacement</h2>
            <h3>a. Refund:</h3>
            <p>Refunds will be processed within 07 days of receiving the returned product. The refund will be issued to
                the original payment method.</p>
            <h3>b. Replacement:</h3>
            <p>If the product is eligible for replacement, a new item will be shipped once the returned product is
                received and inspected.</p>
        </section>

        <section id="exceptions" class="mt-5">
            <h2>4. Exceptions</h2>
            <h3>a. Non-Returnable Items:</h3>
            <p>Certain products may not be eligible for return due to hygiene or safety reasons. Please check the product
                description for details.</p>
            <h3>b. Clearance or Final Sale Items:</h3>
            <p>Clearance or final sale items are non-returnable.</p>
        </section>

        <section id="contact-information" class="mt-5">
            <h2>5. Contact Information</h2>
            <p>For any questions or concerns regarding our Returns Policy, please contact us at:</p>
            <p><strong>Click Cart Support</strong></p>
            <p><strong>Email:</strong> contactclickcart@gmail.com</p>
            <p><strong>Telephone:</strong> 0713357770</p>
        </section>

        <section id="changes" class="mt-5">
            <h2>6. Changes to Returns Policy</h2>
            <p>We reserve the right to update this Returns Policy. Changes will be effective upon posting on our website.
                Please check this policy periodically for updates.</p>
        </section>
    </div>

    <!-- Bootstrap JS and dependencies -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
    <!-- Your custom scripts go here -->
</body>

</html>