<?php
    // session_start();
    include_once("conn.php");
    $uid = $_SESSION['uid'];

    if (isset($_POST['delete_order'])) {
        $orderid = (int)$_POST['orderid'];
        mysqli_query($con, "DELETE FROM tblorderdetails WHERE orderid=$orderid");
        mysqli_query($con, "DELETE FROM tblorder WHERE orderid=$orderid AND userid=$uid");
    }

    $q = "SELECT * FROM tblorder WHERE userid=$uid ORDER BY orderdate DESC";
$res = mysqli_query($con, $q);
?>
<html>
    <head>
        <?php include "topscript.php"; ?>
        <style>
            body {
                background: #f8fafc;
                font-family: 'Jost', sans-serif;
                color: #334155;
            }

            h1 {
                font-family: 'Forum', serif;
                font-weight: 800;
                color: #2e7d32;
                margin-bottom: 40px;
            }

            .order-container {
                max-width: 1100px;
                margin: 60px auto;
                padding: 0 20px;
            }

            .order-card {
                background: #ffffff;
                border: 1px solid #e2e8f0;
                border-radius: 20px;
                overflow: hidden;
                transition: 0.3s;
                box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.05);
            }
            .order-card:hover {
                box-shadow: 0 20px 25px -5px rgba(0, 0, 0, 0.1);
            }

            .order-header {
                background: #f1f8e9;
                padding: 20px 30px;
                display: flex;
                justify-content: space-between;
                align-items: center;
                border-bottom: 1px solid #e8f5e9;
            }
            .order-header span {
                color: #388e3c;
                font-weight: 600;
            }
            .total-amount { 
                color: #1b5e20;
                font-weight: 800;
                font-size: 22px; 
            }

            .table thead { 
                background: #f8fafc;
                color: #475569;
                font-weight: 700;
                text-transform: uppercase;
                font-size: 13px;
                letter-spacing: 0.5px;
            }
            
            .table td {
                padding: 20px 15px;
                color: #1a202c;
            }

            .btn-delete {
                background: #fee2e2;
                padding: 10px 20px;
                border-radius: 12px;
                font-weight: 700;
                color: #ef4444;
                border: none;
                transition: 0.2s;
            }
            .btn-delete:hover { 
                background: #fecaca;
                color: #dc2626;
            }

            /* PAYMENT SECTION */
            .pay-box {
                background: #f1f8e9;
                padding: 30px;
                border-radius: 16px;
                margin: 20px;
                border: 1px solid #e8f5e9;
            }
            .payment-select {
                background: #ffffff;
                border: 1px solid #e2e8f0;
                padding: 12px;
                color: #334155;
                font-weight: 600;
                border-radius: 12px;
                width: 100%;
                max-width: 300px;
            }
            .pay-btn {
                background: #4caf50;
                padding: 12px 25px;
                color: #fff;
                border: none;
                font-weight: 700;
                border-radius: 12px;
                transition: 0.3s;
            }
            .pay-btn:hover {
                background: #388e3c;
                box-shadow: 0 4px 12px rgba(76, 175, 80, 0.2);
            }

            .form-control {
                border-radius: 12px;
                padding: 12px;
                border: 1px solid #e2e8f0;
            }
        </style>
    </head>

    <body>
        <?php include "nav.php"; ?>

        <div class="order-container">
            <h1 class="text-center mb-4" style="color:#ffcc00;font-weight:700;">My Luxury Orders</h1>

            <?php if (mysqli_num_rows($res) == 0): ?>
            <div class="alert alert-warning text-center shadow-sm">No orders yet.</div>
            <?php else: ?>
            <?php while($order = mysqli_fetch_assoc($res)) { 

                $q2 = "SELECT d.*, p.title, p.img FROM tblorderdetails d JOIN tblpro p ON d.productid=p.productid WHERE d.orderid={$order['orderid']}";
                $items = mysqli_query($con, $q2);

                $upi_id = "tirth@upi";
                $amount = $order['totalamout'];
                $upiUrl = "upi://pay?pa=$upi_id&pn=NovaGrocery&am=$amount&cu=INR";
                $qr = "https://api.qrserver.com/v1/create-qr-code/?data=$upiUrl&size=220x220";
                
            ?>
            <div class="order-card mb-4">

                <div class="order-header">
                    <span>Order <?= $order['orderid']?> <?= $order['orderdate']?></span>
                    <span class="total-amount"><?= $order['totalamout']?></span>
                </div>

                <div class="p-4">
                    <table class="table align-middle">
                        <thead class="t"><tr><th>Image</th><th>Product</th><th>Qty</th><th>Price</th><th>Subtotal</th></tr></thead>
                        <tbody>
                            <?php while($it = mysqli_fetch_assoc($items)) { ?>
                        <tr>
                        <td><img src="images/<?= $it['img']?>" width="60" style="border-radius:10px;"></td>
                        <td><?= $it['title']?></td>
                        <td><?= $it['qty']?></td>
                        <td><?= $it['price']?></td>
                        <td><b><?= $it['subtotal']?></b></td>
                        </tr>
                        <?php } ?>
                        </tbody>
                    </table>

                    <!-- TIMELINE -->
                    <!-- PAYMENT SECTION -->
                    <div class="pay-box">
                        <h5 style="color:#ffcc00;">Payment Method</h5>

                        <select class="form-select payment-select" onchange="showPayOption(this.value,<?= $order['orderid']?>)">
                            <option value="">Select</option>
                            <option value="upi">UPI</option>
                            <option value="card">Card</option>
                        </select>

                        <div id="upi_box_<?= $order['orderid']?>" style="display:none;">
                            <div class="d-flex gap-4 mt-3">
                                <img src="<?= $qr ?>" width="170" style="border-radius:12px;">
                                <div>
                                    <h4 style="color:#ffcc00;font-weight:700;"><?= $amount ?></h4>
                                    <button class="pay-btn">I Have Paid</button>
                                </div>
                            </div>
                        </div>
                        <div id="card_box_<?= $order['orderid']?>" style="display:none;" class="mt-3">
                            <input class="form-control mb-2" placeholder="Card Number">
                            <div class="row g-2">
                                <div class="col"><input class="form-control" placeholder="MM/YY"></div>
                                <div class="col"><input class="form-control" placeholder="CVV"></div>
                            </div>
                            <button class="pay-btn mt-3 w-100">Pay Now</button>
                        </div>
                    </div>
                </div>
            </div>
            <?php } ?>
            <?php endif; ?>
        </div>

        <script>
            function showPayOption(type,id){
                document.getElementById("upi_box_"+id).style.display=(type==="upi")?"block":"none";
                document.getElementById("card_box_"+id).style.display=(type==="card")?"block":"none";
            }
        </script>

        <?php include "footer.php"; ?>
    </body>
</html>
