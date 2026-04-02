<?php include 'admintop.php'; ?>

<?php
$pid = $_GET['uid'];

// Fetch categories for dropdown
$cat_res = mysqli_query($con, "SELECT * FROM tblcat");

// Fetch existing product info
$p_qry = mysqli_query($con, "SELECT * FROM tblpro WHERE productid='$pid'");
$pinfo = mysqli_fetch_array($p_qry);

if(isset($_POST['btnupd']))
{
    $title = mysqli_real_escape_string($con, $_POST['txttitle']);
    $mrp = (int)$_POST['txtmrp'];
    $price = (int)$_POST['txtprice'];
    $cat = (int)$_POST['txtcatid'];
    $des = mysqli_real_escape_string($con, $_POST['txtdes']);
    
    // Handle image upload
    if($_FILES['fup']['name'] != "") {
        $img = $_FILES['fup']['name'];
        copy($_FILES['fup']['tmp_name'], "images/".$img);
    } else {
        $img = $pinfo['img']; // Keep old image
    }
    
    // Server-side validation
    if($price > $mrp) {
        $error = "Price cannot be greater than MRP.";
    } else {
        $upd_qry = "UPDATE tblpro SET title='$title', mrp='$mrp', price='$price', categoryid='$cat', des='$des', img='$img' WHERE productid='$pid'";
        if(mysqli_query($con, $upd_qry)) {
            $msg = "Product updated successfully!";
            // Refresh info
            $p_qry = mysqli_query($con, "SELECT * FROM tblpro WHERE productid='$pid'");
            $pinfo = mysqli_fetch_array($p_qry);
        } else {
            $error = "Error updating product: " . mysqli_error($con);
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
            <h2 class="admin-title mb-0">Update Inventory</h2>
        </div>
        <p class="text-secondary small fw-bold text-uppercase ms-5" style="letter-spacing: 1px;">Refining product information</p>
    </div>
</div>

<div class="row justify-content-center">
    <div class="col-lg-10">
        <div class="admin-card border-0">
            <?php if(isset($msg)) { ?>
                <div class="alert alert-success border-0 py-3 rounded-4 mb-4" style="background: var(--primary-soft); color: var(--primary);">
                    <div class="d-flex align-items-center justify-content-between">
                        <div><i class="fa-solid fa-check-circle me-2"></i> <?php echo $msg; ?></div>
                        <a href="products.php" class="btn btn-success btn-sm rounded-pill px-3 shadow-sm">View Changes</a>
                    </div>
                </div>
            <?php } ?>
            
            <?php if(isset($error)) { ?>
                <div class="alert alert-danger border-0 py-3 rounded-4 mb-4 bg-danger bg-opacity-10 text-danger">
                    <i class="fa-solid fa-triangle-exclamation me-2"></i> <?php echo $error; ?>
                </div>
            <?php } ?>

            <form method="post" enctype="multipart/form-data" class="row g-4">
                <div class="col-md-4 text-center">
                    <div class="position-relative d-inline-block">
                        <img src="images/<?php echo $pinfo['img']; ?>" class="rounded-4 shadow-lg border border-3 border-white" style="width: 200px; height: 200px; object-fit: cover;">
                        <div class="bg-primary text-white position-absolute bottom-0 start-50 translate-middle-x mb-2 px-3 py-1 rounded-pill small shadow-sm">
                            <i class="fa-solid fa-camera me-1"></i> Current View
                        </div>
                    </div>
                    <div class="mt-4 text-start">
                        <label class="form-label small fw-bold text-muted text-uppercase" style="letter-spacing: 0.5px;">Swap Product Image</label>
                        <div class="input-group">
                            <span class="input-group-text bg-light border-0 rounded-start-4"><i class="fa-solid fa-upload"></i></span>
                            <input type="file" name="fup" class="form-control bg-light border-0 py-2 rounded-end-4">
                        </div>
                        <p class="text-muted smaller mt-2">Leave blank to keep current photo.</p>
                    </div>
                </div>

                <div class="col-md-8">
                    <div class="row g-4">
                        <div class="col-12">
                            <label class="form-label small fw-bold text-muted text-uppercase" style="letter-spacing: 0.5px;">Product Heading</label>
                            <input type="text" name="txttitle" class="form-control bg-light border-0 py-3 rounded-4 fw-bold" value="<?php echo htmlspecialchars($pinfo['title']); ?>" required>
                        </div>
                        
                        <div class="col-md-12">
                            <label class="form-label small fw-bold text-muted text-uppercase" style="letter-spacing: 0.5px;">Assign Category</label>
                            <div class="input-group">
                                <span class="input-group-text bg-light border-0 rounded-start-4"><i class="fa-solid fa-layer-group text-muted"></i></span>
                                <select name="txtcatid" class="form-select bg-light border-0 py-3 rounded-end-4" required>
                                    <option value="">Choose...</option>
                                    <?php 
                                    $cat_res = mysqli_query($con, "SELECT * FROM tblcat"); // Resetting resource pointer
                                    while($row = mysqli_fetch_array($cat_res)) { ?>
                                        <option value="<?php echo $row['categoryid']?>" <?php echo ($pinfo['categoryid'] == $row['categoryid']) ? 'selected' : ''; ?>>
                                            <?php echo $row['categoryname'] ?>
                                        </option>
                                    <?php } ?>
                                </select>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <label class="form-label small fw-bold text-muted text-uppercase" style="letter-spacing: 0.5px;">Original MRP</label>
                            <div class="input-group">
                                <span class="input-group-text bg-light border-0 rounded-start-4 fw-bold">₹</span>
                                <input type="number" name="txtmrp" class="form-control bg-light border-0 py-3 rounded-end-4" value="<?php echo $pinfo['mrp']; ?>" required min="0">
                            </div>
                        </div>

                        <div class="col-md-6">
                            <label class="form-label small fw-bold text-muted text-uppercase" style="letter-spacing: 0.5px;">Special Price</label>
                            <div class="input-group">
                                <span class="input-group-text bg-light border-0 rounded-start-4 fw-bold">₹</span>
                                <input type="number" name="txtprice" class="form-control bg-light border-0 py-3 rounded-end-4" value="<?php echo $pinfo['price']; ?>" required min="0">
                            </div>
                        </div>

                        <div class="col-12">
                            <label class="form-label small fw-bold text-muted text-uppercase" style="letter-spacing: 0.5px;">Product Description</label>
                            <textarea name="txtdes" class="form-control bg-light border-0 py-3 rounded-4" rows="4" required><?php echo htmlspecialchars($pinfo['des']); ?></textarea>
                        </div>
                    </div>

                    <div class="mt-5">
                        <button type="submit" name="btnupd" class="btn btn-success w-100 py-3 rounded-4 shadow-lg fs-5 fw-bold">
                            <i class="fa-solid fa-check-double me-2"></i> Save Changes & Sync
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>

</div> <!-- Close admin-main from admintop.php -->
</body>
</html>