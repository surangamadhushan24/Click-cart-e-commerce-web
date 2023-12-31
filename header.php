<nav class="navbar navbar-expand-lg  bg-light fixed-top">
  <div class="container-fluid">
    <a class="navbar-brand" href="#">Click Cart</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarScroll" aria-controls="navbarScroll" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarScroll">
      <ul class="navbar-nav me-auto my-2 my-lg-0 navbar-nav-scroll" style="--bs-scroll-height: 100px;">
        <li class="nav-item">
          <a class="nav-link " aria-current="page" href="home.php">Home</a>
        </li>

        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" id="navbarScrollingDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            Category
          </a>
          <ul class="dropdown-menu" aria-labelledby="navbarScrollingDropdown">
            <li><a class="dropdown-item" href="#Laptop">Laptop</a></li>
            <li><a class="dropdown-item" href="#Fashion">Fashion</a></li>
            <li><a class="dropdown-item" href="#Cosmetics">Cosmetic</a></li>
            <li><a class="dropdown-item" href="#Mobile">Mobile</a></li>
          </ul>
        </li>
        
        <li class="nav-item">
          <a class="nav-link " href="aboutus.php">About us</a>
        </li>
      </ul>

      <form class="d-flex" method="post" action="cart.php" name="frmCart">
        <?php
        if (!empty($_SESSION['cid'])) {
          $customerId = $_SESSION['cid'];
        } else {
          $customerId = 0;
        }


        $displayCountCartQuery = "SELECT*FROM cartitemtbl WHERE c_id =$customerId ;";
        $executeDisplayCountCartQuery =  mysqli_query($conn, $displayCountCartQuery);
        $countCart = mysqli_num_rows($executeDisplayCountCartQuery);
        ?>
        <!-- <button><i class="fa fa-shopping-cart" aria-hidden="true"></i> </button>
        <input type="submit" value="<?php echo isset($countCart) ? $countCart : '0'; ?> " name="btnCart" class="btnCart">  -->
        <button class="btn-all">
          <i class="fa fa-shopping-cart" aria-hidden="true" style="font-size:25px;border-style:none"></i>
          <input type="submit" value="<?php echo isset($countCart) ? $countCart : '0'; ?>" name="btnCart" class="btnCart">
        </button>


      </form>
    </div>
  </div>
</nav>