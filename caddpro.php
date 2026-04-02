<?php include 'admintop.php'; ?>

<?php
$res = mysqli_query($con, "SELECT * FROM tblcat");

if(isset($_POST['btnadd']))
{
    $title = mysqli_real_escape_string($con, $_POST['txttitle']);
    $mrp = (int)$_POST['txtmrp'];
    $price = (int)$_POST['txtprice'];
    $cat = (int)$_POST['txtcatid'];
    $des = mysqli_real_escape_string($con, $_POST['txtdes']);
    $img = $_FILES['fup']['name'];
    
    // Server-side validation
    if($price > $mrp) {
        $error = "Price cannot be greater than MRP.";
    } else {
        copy($_FILES['fup']['tmp_name'], "images/".$img) or die("image cannot be inserted");
        $qry = "INSERT INTO tblpro (title, mrp, price, categoryid, des, img) VALUES ('$title', '$mrp', '$price', '$cat', '$des', '$img')";
        if(mysqli_query($con, $qry)) {
            $msg = "Product added successfully!";
        } else {
            $error = "Error adding product: " . mysqli_error($con);
        }
    }
}
?>

<div class="row mb-4">
    <div class="col-md-12">
        <div class="d-flex align-items-center gap-3 mb-3">
            <a href="products.php" class="btn btn-light rounded-circle p-2 d-flex align-items-center justify-content-center" style="width: 40px; height: 40px; color: var(--primary);">
                <i class="fa-solid fa-arrow-left"></i>
            </a>
            <h2 class="admin-title mb-0">Add New Product</h2>
        </div>
        <p class="text-secondary small fw-bold text-uppercase ms-5" style="letter-spacing: 1px;">Expand your store catalog</p>
    </div>
</div>

<div class="row justify-content-center">
    <div class="col-lg-9">
        <div class="admin-card border-0">
            <div class="d-flex align-items-center gap-3 mb-5">
                <div class="bg-success text-white rounded-4 d-flex align-items-center justify-content-center" style="width: 55px; height: 55px; box-shadow: 0 10px 20px rgba(46, 125, 50, 0.2);">
                    <i class="fa-solid fa-cart-plus fs-3"></i>
                </div>
                <div>
                    <h4 class="fw-bold mb-0 text-dark" style="font-family: 'Forum', serif;">Product Details</h4>
                    <p class="text-muted small mb-0">Fill in the information below to list a new item.</p>
                </div>
            </div>

            <?php if(isset($msg)) { ?>
                <div class="alert alert-success border-0 py-3 rounded-4 mb-4" style="background: var(--primary-soft); color: var(--primary);">
                    <div class="d-flex align-items-center justify-content-between">
                        <div><i class="fa-solid fa-check-circle me-2"></i> <?php echo $msg; ?></div>
                        <a href="products.php" class="btn btn-success btn-sm rounded-pill px-3 shadow-sm">View Inventory</a>
                    </div>
                </div>
            <?php } ?>
            
            <?php if(isset($error)) { ?>
                <div class="alert alert-danger border-0 py-3 rounded-4 mb-4 bg-danger bg-opacity-10 text-danger">
                    <i class="fa-solid fa-triangle-exclamation me-2"></i> <?php echo $error; ?>
                </div>
            <?php } ?>

            <form method="post" enctype="multipart/form-data" class="row g-4">
                <div class="col-md-12">
                    <label class="form-label small fw-bold text-muted text-uppercase" style="letter-spacing: 0.5px;">Product Title</label>
                    <input type="text" name="txttitle" class="form-control bg-light border-0 py-3 rounded-4" placeholder="e.g. Organic Bananas (1kg)" required>
                </div>
                
                <div class="col-md-6">
                    <label class="form-label small fw-bold text-muted text-uppercase" style="letter-spacing: 0.5px;">Category</label>
                    <div class="input-group">
                        <span class="input-group-text bg-light border-0 rounded-start-4 px-3"><i class="fa-solid fa-tags text-muted"></i></span>
                        <select name="txtcatid" class="form-select bg-light border-0 py-3 rounded-end-4" required>
                            <option value="">Select Category</option>
                            <?php 
                            $res = mysqli_query($con, "SELECT * FROM tblcat"); // Resetting resource pointer
                            while($row = mysqli_fetch_array($res)) { ?>
                                <option value="<?php echo $row['categoryid']?>">
                                    <?php echo $row['categoryname'] ?>
                                </option>
                            <?php } ?>
                        </select>
                    </div>
                </div>

                <div class="col-md-6">
                    <label class="form-label small fw-bold text-muted text-uppercase" style="letter-spacing: 0.5px;">Product Image</label>
                    <div class="input-group">
                        <span class="input-group-text bg-light border-0 rounded-start-4 px-3"><i class="fa-solid fa-image text-muted"></i></span>
                        <input type="file" name="fup" class="form-control bg-light border-0 py-3 rounded-end-4" required>
                    </div>
                </div>

                <div class="col-md-6">
                    <label class="form-label small fw-bold text-muted text-uppercase" style="letter-spacing: 0.5px;">MRP (Full Price)</label>
                    <div class="input-group">
                        <span class="input-group-text bg-light border-0 rounded-start-4 px-3 fw-bold">₹</span>
                        <input type="number" name="txtmrp" class="form-control bg-light border-0 py-3 rounded-end-4" placeholder="0.00" required min="0">
                    </div>
                </div>

                <div class="col-md-6">
                    <label class="form-label small fw-bold text-muted text-uppercase" style="letter-spacing: 0.5px;">Selling Price (Offer)</label>
                    <div class="input-group">
                        <span class="input-group-text bg-light border-0 rounded-start-4 px-3 fw-bold">₹</span>
                        <input type="number" name="txtprice" class="form-control bg-light border-0 py-3 rounded-end-4" placeholder="0.00" required min="0">
                    </div>
                </div>

                <div class="col-md-12">
                    <label class="form-label small fw-bold text-muted text-uppercase" style="letter-spacing: 0.5px;">Brief Description</label>
                    <textarea name="txtdes" class="form-control bg-light border-0 py-3 rounded-4" rows="4" placeholder="Describe the product features and benefits..." required></textarea>
                </div>

                <div class="col-12 mt-5">
                    <button type="submit" name="btnadd" class="btn btn-success w-100 py-3 rounded-4 shadow-lg fs-5 fw-bold">
                        <i class="fa-solid fa-cloud-upload me-2"></i> Confirm & Publish Product
                    </button>
                    <p class="text-center mt-3 text-muted smaller">This product will be immediately visible to customers in the store.</p>
                </div>
            </form>
        </div>
    </div>
</div>

</div> <!-- Close admin-main from admintop.php -->
</body>
</html>