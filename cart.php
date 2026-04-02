<?php
include_once("conn.php");
$uid = $_SESSION['uid'];

// UPDATE CART (remove or change qty)
if (isset($_POST['remove'])) {
    $cid = $_REQUEST['cid'];
    mysqli_query($con, "DELETE FROM tblcart WHERE cartid=$cid AND userid=$uid");
}
if (isset($_POST['update'])) {
    foreach ($_POST['qty'] as $cid => $qty) {
        $qty = max(1, (int)$qty);
        mysqli_query($con, "UPDATE tblcart SET qty=$qty WHERE cartid=$cid AND userid=$uid");
    }
}

// FETCH CART ITEMS
$q = "SELECT c.cartid, c.qty, p.title, p.price, p.img 
      FROM tblcart c JOIN tblpro p ON c.productid=p.productid 
      WHERE c.userid=$uid";
$res = mysqli_query($con, $q);

$total = 0; $count = 0;
?>
<html>
<head>
    <?php include "topscript.php"; ?>
    <style>
        body {
            background: #f8fafc;
            color: #334155;
            font-family: 'Jost', sans-serif;
        }

        h1 {
            font-weight: 800;
            color: #2e7d32;
            text-align: center;
            margin-bottom: 40px;
            font-family: 'Forum', serif;
        }

        .cart-container {
            background: #ffffff;
            border-radius: 24px;
            padding: 40px;
            box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.05), 0 2px 4px -1px rgba(0, 0, 0, 0.03);
            border: 1px solid #f1f5f9;
        }

        table {
            border-collapse: separate;
            border-spacing: 0 10px;
            width: 100%;
        }
        thead {
            background: #f1f8e9;
        }
        thead th {
            color: #2e7d32;
            font-weight: 700;
            font-size: 15px;
            text-transform: uppercase;
            padding: 15px;
            border-bottom: 2px solid #e8f5e9;
        }
        tbody tr {
            background: #ffffff;
            transition: all 0.2s;
        }
        tbody tr:hover {
            background: #fdfdfd;
            box-shadow: 0 10px 15px -3px rgba(0, 0, 0, 0.05);
        }
        tbody td {
            padding: 20px 15px;
            vertical-align: middle;
            border-bottom: 1px solid #f1f5f9;
        }
        tbody td img {
            border-radius: 12px;
            background: #f8fafc;
            padding: 5px;
        }

        input[type="number"] {
            background: #fff;
            border: 1px solid #e2e8f0;
            color: #334155;
            text-align: center;
            border-radius: 8px;
            padding: 8px;
            width: 70px;
        }

        .btn-theme {
            background: #4caf50;
            border: none;
            color: #fff;
            font-weight: 700;
            padding: 12px 25px;
            border-radius: 12px;
            transition: 0.3s;
        }
        .btn-theme:hover {
            background: #388e3c;
            transform: translateY(-2px);
            box-shadow: 0 4px 12px rgba(76, 175, 80, 0.2);
        }
        .btn-success {
            background: #2e7d32;
            border: none;
            border-radius: 12px;
            padding: 12px 30px;
            font-weight: 700;
            transition: 0.3s;
        }
        .btn-success:hover {
            background: #1b5e20;
            transform: translateY(-2px);
        }
        .btn-danger {
            border-radius: 10px;
            font-size: 13px;
            padding: 8px 16px;
            background: #fee2e2;
            color: #ef4444;
            border: none;
            font-weight: 600;
        }
        .btn-danger:hover {
            background: #fecaca;
            color: #dc2626;
        }

        .cart-summary {
            margin-top: 30px;
            padding: 30px;
            border-radius: 20px;
            background: #f1f8e9;
            border: 1px solid #e8f5e9;
        }
        .cart-summary h4 {
            font-weight: 800;
            color: #1b5e20;
            margin: 0;
        }
    </style>
</head>
<body>
<?php include "nav.php"; ?>

<div class="container mt-5">
    <div class="cart-container">
        <h1><i class="fa-solid fa-cart-shopping me-2"></i> Your Cart</h1>

        <form method="post">
            <table>
                <thead>
                    <tr>
                        <th>Image</th>
                        <th>Title</th>
                        <th>Price</th>
                        <th>Qty</th>
                        <th>Subtotal</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                <?php if (mysqli_num_rows($res) == 0) { ?>
                    <tr><td colspan="6" class="text-center">No items in cart.</td></tr>
                <?php } else { 
                    while($row = mysqli_fetch_assoc($res)) { 
                        $sub = $row['price'] * $row['qty'];
                        $total += $sub;
                        $count += $row['qty'];
                ?>
                    <tr>
                        <td><img src="images/<?= $row['img']?>" width="70"></td>
                        <td><?= $row['title']?></td>
                        <td>Rs. <?= $row['price']?></td>
                        <td><input type="number" name="qty[<?= $row['cartid']?>]" value="<?= $row['qty']?>" min="1"></td>
                        <td>Rs. <?= $sub?></td>
                        <td>
                            <button type="submit" name="remove" value="1" class="btn btn-sm btn-danger" formaction="cart.php?remove=1&cid=<?= $row['cartid']?>">Remove</button>
                        </td>
                    </tr>
                <?php } } ?>
                </tbody>
            </table>

            <?php if ($count > 0): ?>
                
                    <div class="d-flex justify-content-between">
                        <h4>Total (<?= $count ?> items): Rs. <?= $total ?></h4>
                        <div>
                            <button type="submit" name="update" class="btn btn-theme">Update Cart</button>
                            <a href="placeorder.php" class="btn btn-success">Place Order</a>
                        </div>
                    </div>
               
            <?php endif; ?>
        </form>
    </div>
</div>

<?php include "footer.php"; ?>
</body>
</html>

