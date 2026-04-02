<?php
include_once("conn.php");

// ADD TO CART LOGIC
if (isset($_POST['btnCart'])) {
    if (!isset($_SESSION['uid'])) {
        header("location:clogin.php");
        exit;
    }
    $uid = $_SESSION['uid'];
    $pid = $_POST['pid'];

    // check if already in cart
    $chk = mysqli_query($con, "SELECT * FROM tblcart WHERE userid=$uid AND productid=$pid");
    if (mysqli_num_rows($chk) == 0) {
        mysqli_query($con, "INSERT INTO tblcart(userid, productid, qty) VALUES($uid, $pid, 1)");
        $cart_msg = "Product added to cart!";
    } else {
        mysqli_query($con, "UPDATE tblcart SET qty = qty + 1 WHERE userid=$uid AND productid=$pid");
        $cart_msg = "Quantity updated in cart!";
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Nova Grocery - Fresh Daily Essentials</title>
<?php include 'topscript.php'; ?>
<style>
    /* Custom Homepage Styles */
    .hero-new {
        background: #f0f7f1;
        padding: 100px 0;
        position: relative;
        overflow: hidden;
    }
    .hero-new::after {
        content: '';
        position: absolute;
        width: 400px;
        height: 400px;
        background: rgba(76, 175, 80, 0.05);
        border-radius: 50%;
        top: -100px;
        right: -100px;
    }
    .hero-title {
        font-family: 'Forum', serif;
        font-size: 64px;
        line-height: 1.1;
        color: #1b5e20;
        margin-bottom: 25px;
    }
    .feature-card {
        border: 1px solid #e2e8f0;
        border-radius: 24px;
        padding: 40px 30px;
        transition: 0.3s;
        background: #fff;
        height: 100%;
        text-align: center;
    }
    .feature-card:hover {
        border-color: #4caf50;
        box-shadow: 0 10px 30px rgba(0,0,0,0.05);
    }
    .feature-icon {
        width: 70px;
        height: 70px;
        background: #e8f5e9;
        color: #2e7d32;
        border-radius: 20px;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 30px;
        margin: 0 auto 25px auto;
    }
    .category-pill {
        display: inline-block;
        padding: 12px 25px;
        background: #fff;
        border: 1px solid #e2e8f0;
        border-radius: 50px;
        color: #4a5568;
        font-weight: 600;
        margin: 5px;
        transition: 0.3s;
    }
    .category-pill:hover {
        background: #4caf50;
        color: #fff;
        border-color: #4caf50;
    }
    .essentials-section {
        background: #fff;
        padding: 100px 0;
    }
    .product-grid-card {
        border: none;
        border-radius: 16px;
        background: #f8fafc;
        padding: 20px;
        transition: 0.3s;
    }
    .product-grid-card:hover {
        background: #fff;
        box-shadow: 0 15px 35px rgba(0,0,0,0.1);
    }
    .promo-banner {
        background: linear-gradient(135deg, #2e7d32 0%, #4caf50 100%);
        border-radius: 30px;
        padding: 60px;
        color: #fff;
        position: relative;
    }
</style>
</head>
<body class="bg-white">

<?php include 'nav.php'; ?>

<!-- Hero Section -->
<section class="hero-new">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-6">
                <span class="badge bg-success bg-opacity-10 text-success px-3 py-2 rounded-pill mb-3 fw-bold">100% Organic & Fresh</span>
                <h1 class="hero-title">Fresh Groceries <br>Delivered To Your <span class="text-success">Doorstep</span></h1>
                <p class="lead text-secondary mb-5">Skip the lines and shop the freshest produce, dairy, and daily essentials from the comfort of your home. Quality you can trust, delivered in minutes.</p>
                <div class="d-flex gap-3">
                    <a href="cviewproduct.php" class="btn btn-success btn-lg px-5 py-3 rounded-pill fw-bold">Shop Now</a>
                    <a href="ccontact.php" class="btn btn-outline-success btn-lg px-5 py-3 rounded-pill fw-bold">Contact Us</a>
                </div>
            </div>
            <div class="col-lg-6 mt-5 mt-lg-0">
                <div class="position-relative">
                    <img src="https://img.freepik.com/free-photo/delivery-concept-handsome-african-american-delivery-man-carrying-package-box-grocery-food-stuff-isolated-grey-studio-background-copy-space_1258-1234.jpg" class="img-fluid rounded-4 shadow-lg" alt="Grocery Delivery">
                    <div class="position-absolute bottom-0 start-0 bg-white p-4 rounded-4 shadow-lg m-4 d-none d-md-block" style="width: 200px;">
                        <div class="d-flex align-items-center gap-3">
                            <div class="bg-success bg-opacity-10 p-2 rounded-circle">
                                <i class="fa-solid fa-truck-fast text-success"></i>
                            </div>
                            <div>
                                <h6 class="mb-0 fw-bold">Fast Delivery</h6>
                                <small class="text-muted">In 30 Minutes</small>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Stats/Scrolling Ticker -->
<section class="py-5 border-bottom bg-white">
    <div class="container overflow-hidden">
        <div class="d-flex justify-content-between align-items-center flex-wrap gap-4">
            <div class="text-center p-3">
                <h3 class="fw-bold mb-0 text-dark">12k+</h3>
                <small class="text-muted">Happy Customers</small>
            </div>
            <div class="text-center p-3">
                <h3 class="fw-bold mb-0 text-dark">500+</h3>
                <small class="text-muted">Fresh Products</small>
            </div>
            <div class="text-center p-3">
                <h3 class="fw-bold mb-0 text-dark">24/7</h3>
                <small class="text-muted">Express Support</small>
            </div>
            <div class="text-center p-3">
                <h3 class="fw-bold mb-0 text-dark">100%</h3>
                <small class="text-muted">Organic Sourced</small>
            </div>
        </div>
    </div>
</section>

<!-- Features Section -->
<section class="py-5 mt-5 bg-white">
    <div class="container text-center mb-5">
        <h5 class="text-success fw-bold text-uppercase small ls-2">Why Nova Grocery</h5>
        <h2 class="display-5 fw-bold text-dark" style="font-family: 'Forum', serif;">Experience Freshness Like Never Before</h2>
    </div>
    <div class="container">
        <div class="row g-4">
            <div class="col-md-4">
                <div class="feature-card">
                    <div class="feature-icon"><i class="fa-solid fa-basket-shopping"></i></div>
                    <h4>Fresh Harvest</h4>
                    <p class="text-secondary">Directly sourced from local farms to ensure you get the peak flavor and nutrition every single day.</p>
                </div>
            </div>
            <div class="col-md-4">
                <div class="feature-card">
                    <div class="feature-icon"><i class="fa-solid fa-shield-heart"></i></div>
                    <h4>Quality Assured</h4>
                    <p class="text-secondary">Every single item passes a rigorous quality check before it leaves our store to reach your kitchen.</p>
                </div>
            </div>
            <div class="col-md-4">
                <div class="feature-card">
                    <div class="feature-icon"><i class="fa-solid fa-bolt"></i></div>
                    <h4>Express Delivery</h4>
                    <p class="text-secondary">Our dedicated delivery fleet ensures your groceries reach you within 30 minutes of placing the order.</p>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Daily Essentials / Categories -->
<section class="essentials-section">
    <div class="container">
        <div class="row align-items-end mb-5">
            <div class="col-md-8">
                <h5 class="text-success fw-bold text-uppercase small ls-2">Shop Categories</h5>
                <h2 class="display-6 fw-bold" style="font-family: 'Forum', serif;">Daily Essentials For You</h2>
            </div>
            <div class="col-md-4 text-md-end mt-3 mt-md-0">
                <a href="cviewproduct.php" class="btn btn-link text-success fw-bold p-0 text-decoration-none">View All Products <i class="fa-solid fa-arrow-right ms-2"></i></a>
            </div>
        </div>
        
        <div class="mb-5 pb-3">
            <a href="#" class="category-pill active bg-success text-white border-success">All Items</a>
            <a href="#" class="category-pill">Fresh Fruits</a>
            <a href="#" class="category-pill">Vegetables</a>
            <a href="#" class="category-pill">Dairy & Eggs</a>
            <a href="#" class="category-pill">Bakery Products</a>
            <a href="#" class="category-pill">Grains & Rice</a>
            <a href="#" class="category-pill">Snacks & Beverages</a>
        </div>

        <div class="row g-4">
            <?php
            $res = mysqli_query($con, "SELECT * FROM tblpro ORDER BY productid DESC LIMIT 4");
            while ($row = mysqli_fetch_array($res)) {
            ?>
            <div class="col-md-3">
                <div class="product-grid-card">
                    <img src="images/<?php echo $row['img']; ?>" class="img-fluid rounded-3 mb-3" alt="<?php echo $row['title']; ?>" style="height: 200px; object-fit: contain; width: 100%; background: #f8fafc; padding: 15px;">
                    <h5 class="fw-bold mb-1"><?php echo $row['title']; ?></h5>
                    <p class="text-muted small mb-2 text-truncate"><?php echo $row['des']; ?></p>
                    <div class="d-flex justify-content-between align-items-center">
                        <div>
                            <span class="h5 fw-bold text-success mb-0">$<?php echo $row['price']; ?></span>
                            <?php if($row['mrp'] > $row['price']) { ?>
                                <small class="text-muted text-decoration-line-through ms-2">$<?php echo $row['mrp']; ?></small>
                            <?php } ?>
                        </div>
                        <form method="post" class="m-0">
                            <input type="hidden" name="pid" value="<?php echo $row['productid']; ?>">
                            <button type="submit" name="btnCart" class="btn btn-success btn-sm rounded-circle p-2" title="Add to Cart">
                                <i class="fa-solid fa-plus px-1"></i>
                            </button>
                        </form>
                    </div>
                </div>
            </div>
            <?php } ?>
        </div>

        <?php if(isset($cart_msg)) { ?>
            <div class="alert alert-success mt-4 toast-custom shadow-sm border-0" style="position: fixed; bottom: 20px; right: 20px; z-index: 1050; background: #2e7d32; color: #fff;">
                <i class="fa-solid fa-check-circle me-2"></i> <?php echo $cart_msg; ?>
            </div>
            <script>setTimeout(() => { document.querySelector('.toast-custom').style.display = 'none'; }, 3000);</script>
        <?php } ?>
    </div>
</section>

<!-- Promo Banner Section -->
<section class="py-5 bg-white">
    <div class="container">
        <div class="promo-banner">
            <div class="row align-items-center">
                <div class="col-lg-7">
                    <h2 class="display-4 fw-bold mb-3">Get 20% OFF on your first order</h2>
                    <p class="lead mb-4">Join Nova Grocery today and enjoy exclusive discounts on your favorite daily essentials. Freshness is now just a click away.</p>
                    <a href="cregister.php" class="btn btn-light btn-lg px-5 py-3 rounded-pill fw-bold text-success">Sign Up Today</a>
                </div>
                <div class="col-lg-5 text-center d-none d-lg-block">
                    <img src="https://img.freepik.com/free-photo/food-shopping-basket-full-groceries-isolated-white-background_1232-4731.jpg" class="img-fluid rounded-circle shadow-lg" style="max-height: 300px;" alt="Promo">
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Store Location / Hours -->
<section class="py-100 bg-light">
    <div class="container">
        <div class="row g-5 align-items-center">
            <div class="col-lg-6">
                <div class="pe-lg-5">
                    <h5 class="text-success fw-bold text-uppercase small ls-2">Visit Our Store</h5>
                    <h2 class="display-6 fw-bold mb-4" style="font-family: 'Forum', serif;">We're Open 24/7 For Your Daily Cravings</h2>
                    <p class="text-secondary mb-5">Our flagship store is located in the heart of the city, providing you with a premium shopping experience. Visit us to explore our range of exotic produce and specialty items.</p>
                    <div class="d-flex align-items-start gap-3 mb-4">
                        <div class="bg-success bg-opacity-10 p-3 rounded-circle text-success">
                            <i class="fa-solid fa-clock shadow-0"></i>
                        </div>
                        <div>
                            <h5 class="fw-bold mb-1">Working Hours</h5>
                            <p class="text-secondary mb-0">Monday - Sunday: Open 24 Hours <br> Holidays: Open 24 Hours</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-6">
                <img src="https://img.freepik.com/free-photo/blur-supermarket-aisles_1203-3453.jpg" class="img-fluid rounded-4 shadow-lg" alt="Store Inside">
            </div>
        </div>
    </div>
</section>

<?php include "footer.php" ?>

</body>
</html>
