<?php
    include_once("conn.php");


    
    if(isset($_REQUEST['btnBuy']))
    {
        $productid=$_REQUEST['txtpid'];
        $qnty=$_REQUEST['txtqnty'];
        $total=$_REQUEST['txttotal'];
        $price=$_REQUEST['txtprice'];
        $orderDt=$_REQUEST['txtorddate'];
        $userid=$_REQUEST['txtuid']; 
   
        $qry="insert into tblorder values(null,'$productid','$qnty','$total','$price','$orderDt','$userid')";
        mysqli_query($con,$qry) or die($qry);
    }
    
?>

<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cart</title>
    <link rel="stylesheet" href="assets/bootstrap.min.css">
    <link rel="stylesheet" href="assets/bootstrap.min.js">
</head>
	<body>
		<div class="col-md-2"></div>
		<div class="col-md-10">
                    <form class="border border-1 p-3" method="post" enctype="multipart/form-data">
                        <h1 class="text-center">Order</h1>
                        
                        <div class="mb-3">
                            <label class="fs-4 mb-3">Enter ProductId</label>
                            <input type="text" name="txtpid" class="form-control">
                        </div>
                        <div class="mb-3">
                            <label class="fs-4 mb-3">Enter Quantity</label>
                            <input type="text" name="txtqnty" class="form-control">
                        </div>
                        <div class="mb-3">
                            <label class="fs-4 mb-3">Enter total</label>
                            <input type="text" name="txttotal" class="form-control">
                        </div>
                        <div class="mb-3">
                            <label class="fs-4 mb-3">Enter Price</label>
                            <input type="text" name="txtprice" class="form-control">
                        </div>
                        <div class="mb-3">
                            <label class="fs-4 mb-3">Enter Date</label>
                            <input type="date" name="txtorddate" class="form-control">
                        </div>
                        <div class="mb-3">
                            <label class="fs-4 mb-3">Enter Userid</label>
                            <input type="text" name="txtuid" class="form-control">
                        </div>
                       <div class="mb-3">
                            <input type="submit" name="btnBuy" class="btn btn-outline-primary">
                       </div>
                    </form>
        	</div>
	</body>
</html>