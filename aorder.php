<?php include 'admintop.php'; ?>

<?php
// Delete order if requested
if (isset($_GET['deleteid'])) {
    $oid = intval($_GET['deleteid']);
    mysqli_query($con, "DELETE FROM tblorderdetails WHERE orderid=$oid");
    mysqli_query($con, "DELETE FROM tblorder WHERE orderid=$oid");
    $msg = "Order #$oid deleted successfully!";
}

// Fetch orders with user info
$query = "
    SELECT o.orderid, o.orderdate, o.totalamout, u.username, u.email, u.phone, u.address, u.city, u.pincode
    FROM tblorder o
    JOIN tbluser u ON o.userid = u.userid
    ORDER BY o.orderid DESC
";
$res = mysqli_query($con, $query) or die("Query failed: " . mysqli_error($con));
?>

<div class="row mb-4 align-items-center">
    <div class="col-md-12">
        <h2 class="admin-title">Order Management</h2>
        <p class="text-secondary text-uppercase small fw-bold" style="letter-spacing: 1px;">Track and manage customer purchases</p>
    </div>
</div>

<?php if(isset($msg)) { ?>
    <div class="alert alert-success border-0 small mb-4 py-3 rounded-4" style="background: var(--primary-soft); color: var(--primary);">
        <i class="fa-solid fa-check-circle me-2"></i> <?php echo $msg; ?>
    </div>
<?php } ?>

<div class="row">
    <?php while($order = mysqli_fetch_assoc($res)) { ?>
        <div class="col-12 mb-4">
            <div class="admin-card border-0 p-0 overflow-hidden shadow-sm">
                <!-- Order Header -->
                <div class="p-4 d-flex justify-content-between align-items-center bg-light bg-opacity-50 border-bottom">
                    <div class="d-flex align-items-center gap-3">
                        <div class="bg-primary text-white rounded-4 d-flex align-items-center justify-content-center" style="width: 50px; height: 50px;">
                            <i class="fa-solid fa-receipt fs-4"></i>
                        </div>
                        <div>
                            <div class="d-flex align-items-center gap-2">
                                <h5 class="mb-0 fw-bold text-dark">Order #ORD-<?php echo $order['orderid']; ?></h5>
                                <span class="badge bg-success bg-opacity-10 text-success rounded-pill px-3 py-1 small">Processing</span>
                            </div>
                            <div class="text-muted small mt-1">
                                <i class="fa-solid fa-clock me-1 opacity-50"></i> <?php echo date('M d, Y | h:i A', strtotime($order['orderdate'])); ?>
                            </div>
                        </div>
                    </div>
                    <div class="text-end">
                        <div class="bg-white px-4 py-2 rounded-4 shadow-sm border border-light">
                            <div class="text-muted small text-uppercase fw-bold" style="font-size: 10px;">Total Amount</div>
                            <div class="fw-bold text-success fs-4">₹<?php echo number_format($order['totalamout'], 2); ?></div>
                        </div>
                        <a href="aorder.php?deleteid=<?php echo $order['orderid']; ?>" 
                           class="btn btn-link btn-sm text-danger p-0 fw-bold text-decoration-none mt-2 d-inline-block"
                           onclick="return confirm('Delete this order and its history?');">
                           <i class="fa-solid fa-trash-can me-1 small"></i> Remove Record
                        </a>
                    </div>
                </div>

                <div class="p-4">
                    <div class="row g-4">
                        <!-- Customer Info -->
                        <div class="col-lg-4 border-end border-light">
                            <h6 class="text-uppercase small fw-bold text-muted mb-4" style="letter-spacing: 1px;">Customer Information</h6>
                            <div class="d-flex align-items-center gap-3 mb-4">
                                <div class="bg-primary bg-opacity-10 text-primary rounded-circle d-flex align-items-center justify-content-center" style="width: 45px; height: 45px;">
                                    <i class="fa-solid fa-user-check"></i>
                                </div>
                                <div>
                                    <div class="fw-bold text-dark fs-6"><?php echo htmlspecialchars($order['username']); ?></div>
                                    <div class="text-muted small"><?php echo htmlspecialchars($order['email']); ?></div>
                                </div>
                            </div>
                            <div class="bg-light p-3 rounded-4">
                                <div class="small mb-2"><i class="fa-solid fa-phone me-2 text-primary opacity-75"></i><?php echo $order['phone']; ?></div>
                                <div class="small lh-base"><i class="fa-solid fa-location-dot me-2 text-primary opacity-75"></i><?php echo $order['address'] . ", " . $order['city'] . " - " . $order['pincode']; ?></div>
                            </div>
                        </div>

                        <!-- Order Items -->
                        <div class="col-lg-8">
                            <h6 class="text-uppercase small fw-bold text-muted mb-4" style="letter-spacing: 1px;">Order Payload</h6>
                            <div class="table-responsive">
                                <table class="table table-borderless align-middle mb-0">
                                    <thead class="text-muted small border-bottom border-light">
                                        <tr>
                                            <th class="ps-0 py-3">PRODUCT</th>
                                            <th class="text-center py-3">QTY</th>
                                            <th class="text-end py-3">UNIT PRICE</th>
                                            <th class="text-end pe-0 py-3">SUBTOTAL</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        $oid = $order['orderid'];
                                        $detailQuery = "
                                            SELECT d.qty, d.price, d.subtotal, p.title, p.img 
                                            FROM tblorderdetails d
                                            JOIN tblpro p ON d.productid = p.productid
                                            WHERE d.orderid = $oid
                                        ";
                                        $details = mysqli_query($con, $detailQuery);
                                        while($item = mysqli_fetch_assoc($details)) {
                                        ?>
                                        <tr>
                                            <td class="ps-0 py-3">
                                                <div class="d-flex align-items-center gap-3">
                                                    <img src="images/<?php echo $item['img']; ?>" class="rounded-3 shadow-sm" style="width: 42px; height: 42px; object-fit: cover;">
                                                    <span class="fw-bold text-dark small"><?php echo htmlspecialchars($item['title']); ?></span>
                                                </div>
                                            </td>
                                            <td class="text-center fw-bold text-secondary"><?php echo $item['qty']; ?></td>
                                            <td class="text-end text-muted small">₹<?php echo number_format($item['price'], 2); ?></td>
                                            <td class="text-end fw-bold pe-0">₹<?php echo number_format($item['subtotal'], 2); ?></td>
                                        </tr>
                                        <?php } ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    <?php } ?>

    <?php if(mysqli_num_rows($res) == 0) { ?>
        <div class="col-12 text-center py-5">
            <div class="admin-card text-center py-5">
                <i class="fa-solid fa-box-open d-block mb-3 fs-1 opacity-10 text-primary"></i>
                <h5 class="text-muted fw-bold">System clear!</h5>
                <p class="text-muted small mb-0">No active orders found in the database.</p>
            </div>
        </div>
    <?php } ?>
</div>

</div> <!-- Close admin-main from admintop.php -->
</body>
</html>
