<?php include "topscript.php"; ?>
<nav class="navbar navbar-expand-lg navbar-light sticky-top shadow-sm bg-white border-bottom">
  <div class="container">
    <!-- Brand -->
    <a class="navbar-brand fw-bold fs-3 text-dark" href="chome.php">
      <i class="fa-solid fa-leaf text-success me-2"></i>Nova <span class="text-success">Grocery</span>
    </a>

    <!-- Toggler -->
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navMenu" aria-controls="navMenu" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>

    <!-- Menu -->
    <div class="collapse navbar-collapse" id="navMenu">
      <ul class="navbar-nav ms-auto align-items-lg-center gap-lg-4">
        <li class="nav-item"><a class="nav-link text-dark fw-medium" href="chome.php">Home</a></li>
        <li class="nav-item"><a class="nav-link text-dark fw-medium" href="cviewproduct.php">Browse Store</a></li>
        <li class="nav-item">
          <a class="nav-link text-dark fw-medium position-relative" href="cart.php">
            <i class="fa-solid fa-cart-shopping me-1 text-success"></i> My Cart
          </a>
        </li>
        <li class="nav-item"><a class="nav-link text-dark fw-medium" href="orders.php">My Orders</a></li>
        <li class="nav-item"><a class="nav-link text-dark fw-medium" href="ccontact.php">Contact Us</a></li>
        <li class="nav-item">
          <a class="btn btn-success text-white rounded-pill ms-lg-3 px-4 py-2 fw-semibold shadow-sm" href="logout.php">Sign Out</a>
        </li>
      </ul>
    </div>
  </div>
</nav>

  

<script>
  // Optional: shrink navbar on scroll
  window.addEventListener('scroll', function() {
    const navbar = document.querySelector('.sticky-top');
    if(window.scrollY > 50) {
      navbar.classList.add('scrolled');
    } else {
      navbar.classList.remove('scrolled');
    }
  });
</script>
