<?php
include("conn.php");

// make sure user is logged in
if (!isset($_SESSION['uid'])) {
    echo "<script>alert('Please login to place order'); window.location='login.php';</script>";
    exit;
}

$userid = $_SESSION['uid'];

// get cart items for this user
$cartQry = mysqli_query($con,"SELECT c.*, p.price 
                              FROM tblcart c 
                              JOIN tblpro p ON c.productid = p.productid 
                              WHERE c.userid=$userid");

if (mysqli_num_rows($cartQry) == 0) {
    echo "<script>alert('Your cart is empty. Add some products first.'); window.location='products.php';</script>";
    exit;
}

// calculate total amount
$totalAmount = 0;
while ($row = mysqli_fetch_assoc($cartQry)) {
    $totalAmount += ($row['qty'] * $row['price']);
}
// reset pointer for re-iteration
mysqli_data_seek($cartQry, 0);

// insert into tblorder
$orderdate = date('Y-m-d H:i:s');
$insertOrder = "INSERT INTO tblorder(userid, orderdate, totalamout) 
                VALUES($userid, '$orderdate', $totalAmount)";
if (!mysqli_query($con, $insertOrder)) {
    die("Order Insertion Failed: " . mysqli_error($con));
}
$orderid = mysqli_insert_id($con);  // get last order id

// insert into tblorderdetails
while ($row = mysqli_fetch_assoc($cartQry)) {
    $pid = $row['productid'];
    $qty = $row['qty'];
    $price = $row['price'];
    $subtotal = $qty * $price;

    $insertDetail = "INSERT INTO tblorderdetails(orderid, productid, qty, price, subtotal) 
                     VALUES($orderid, $pid, $qty, $price, $subtotal)";
    if (!mysqli_query($con, $insertDetail)) {
        die("Order Details Insertion Failed: " . mysqli_error($con));
    }
}

// clear cart after placing order
mysqli_query($con,"DELETE FROM tblcart WHERE userid=$userid");

echo "<script>alert('Order placed successfully!'); window.location='orders.php';</script>";
?>
