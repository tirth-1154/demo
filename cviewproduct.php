<?php
include_once("conn.php");

// Dummy login check (replace with your own auth)
if (!isset($_SESSION['uid'])) {
    $_SESSION['uid'] = 1; // assume user 1 is logged in
}
$uid = $_SESSION['uid'];

// ADD TO CART
if (isset($_POST['btnCart'])) {
    $pid = $_POST['pid'];

    // check if already in cart
    $chk = mysqli_query($con, "SELECT * FROM tblcart WHERE userid=$uid AND productid=$pid");
    if (mysqli_num_rows($chk) == 0) {
        mysqli_query($con, "INSERT INTO tblcart(userid, productid, qty) VALUES($uid, $pid, 1)");
        $msg = "Product added to cart!";
    } else {
        mysqli_query($con, "UPDATE tblcart SET qty = qty + 1 WHERE userid=$uid AND productid=$pid");
        $msg = "Quantity updated in cart!";
    }
}

// FETCH PRODUCTS
// ✅ Search Logic
$search = isset($_GET['q']) ? trim($_GET['q']) : '';
if ($search != '') {
    $qry = "SELECT * FROM tblpro 
            WHERE title LIKE '%$search%' 
               OR price LIKE '%$search%' 
               OR mrp LIKE '%$search%'";
} else {
    $qry = "SELECT * FROM tblpro";
}
$res = mysqli_query($con, $qry);
?>
<html>
<head>
    <?php include "topscript.php"; ?>
    <style>
        body {
            background: #ffffff; /* pure white bg */
            color: #37474f;
            font-family: 'Jost', sans-serif;
        }
        h1 {
            font-weight: 800;
            color: #2e7d32; /* grocery green */
            text-align: center;
            margin-bottom: 40px;
            font-family: 'Forum', serif;
        }
        .card {
            border: 1px solid #edf2f7;
            border-radius: 20px;
            background: #ffffff;   
            color: #37474f;
            box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.1), 0 2px 4px -1px rgba(0, 0, 0, 0.06);
            transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
            overflow: hidden;
        }
        .card:hover {
            transform: translateY(-8px);
            box-shadow: 0 20px 25px -5px rgba(0, 0, 0, 0.1), 0 10px 10px -5px rgba(0, 0, 0, 0.04);
            border-color: #4caf50;
        }
        .card img {
            width: 100%;
            height: 200px;
            object-fit: contain;
            padding: 20px;
            background: #f8fafc;
        }
        .card-title {
            font-size: 20px;      
            font-weight: 700;
            margin-top: 5px;
            margin-bottom: 10px;
            color: #1a202c !important;  
        }
        .card-text {
            font-size: 15px;       
            line-height: 1.5;
            color: #4a5568;
        }
        .price {
            font-weight: 800;
            color: #2e7d32;
            font-size: 22px;      
            margin: 10px 0;
        }
        .btn-theme {
            background: #4caf50;
            border: none;
            color: #ffffff;
            font-weight: 600;
            padding: 12px 20px;
            border-radius: 12px;
            transition: all 0.3s ease;
            display: block;
            width: 100%;
        }
        .btn-theme:hover {
            background: #388e3c;
            box-shadow: 0 4px 12px rgba(76, 175, 80, 0.3);
        }
        .search-box { 
            max-width: 600px;
            margin: 0 auto 40px auto;
        }
        .search-box input { 
            width: 100%; 
            padding: 15px 25px; 
            border-radius: 15px; 
            border: 1px solid #e2e8f0; 
            outline: none; 
            box-shadow: 0 2px 4px rgba(0,0,0,0.02);
            transition: 0.3s;
        }
        .search-box input:focus {
            border-color: #4caf50;
            box-shadow: 0 0 0 3px rgba(76, 175, 80, 0.1);
        }
    </style>
</head>
<body>
<?php include "nav.php"; ?>

<div class="container mt-5">
    <h1><i class="fa-solid fa-star"></i> Products Showcase</h1>

    <?php if (isset($msg)): ?>
        <div class="alert alert-info text-center"><?= $msg ?></div>
    <?php endif; ?>

    <!--  Search Bar -->
    <div class="search-box">
        <form method="get" action="cviewproduct.php">
            <input type="text" name="q" id="searchBox" 
                   placeholder=" Search for products..." 
                   value="<?= htmlspecialchars($search) ?>"
                   onkeyup="this.form.submit()"> <!-- Auto search on typing -->
        </form>
    </div>

    <!-- Products -->
    <div class="row">
        <?php if (mysqli_num_rows($res) > 0): ?>
            <?php while($x = mysqli_fetch_assoc($res)) { ?>
                <div class="col-md-4 mb-4">
                    <div class="card h-100">
                        <div class="d-flex justify-content-center align-items-center" style="height:220px;">
                            <img src="images/<?= $x['img']?>" alt="<?= $x['title']?>" style="max-height:180px; max-width:90%; object-fit:contain;">
                        </div>
                        <div class="card-body">
                            <h5 class="card-title"><?= $x['title']?></h5>
                            <p class="card-text">
                                <strong>MRP:</strong> <?= $x['mrp']?> <br>
                                <strong>Price:</strong> <?= $x['price']?> <br>
                            </p>
                            <form method="post">
                                <input type="hidden" name="pid" value="<?= $x['productid'] ?>">
                                <button type="submit" name="btnCart" class="btn btn-theme w-100 mt-2">
                                    <i class="fa-solid fa-cart-shopping me-2"></i>Add to Cart
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
            <?php } ?>
        <?php else: ?>
            <div class="col-12 text-center text-warning">No products found!</div>
        <?php endif; ?>
    </div>
</div>

<?php include "footer.php"; ?>
</body>
</html>
