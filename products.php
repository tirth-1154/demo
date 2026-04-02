<?php include 'admintop.php'; ?>

<?php
if(isset($_POST['btndel'])){
    $pid = $_POST['txtpid'];
    mysqli_query($con, "DELETE FROM tblpro WHERE productid='$pid'") or die("cannot Delete");
    $msg = "Product deleted successfully!";
}

// Fetch products with category names
$qry = mysqli_query($con, "SELECT p.*, c.categoryname FROM tblpro p LEFT JOIN tblcat c ON p.categoryid = c.categoryid ORDER BY p.productid DESC");
?>

<div class="row mb-4 align-items-center">
    <div class="col-md-8">
        <h2 class="admin-title">Product Inventory</h2>
        <p class="text-secondary">Manage your store's stock, prices, and product details.</p>
    </div>
    <div class="col-md-4 text-end">
        <a href="caddpro.php" class="btn btn-success shadow-sm">
            <i class="fa-solid fa-plus-circle me-2"></i> Add New Product
        </a>
    </div>
</div>

<?php if(isset($msg)) { ?>
    <div class="alert alert-success border-0 small mb-4 py-3 rounded-4" style="background: var(--primary-soft); color: var(--primary);">
        <i class="fa-solid fa-check-circle me-2"></i> <?php echo $msg; ?>
    </div>
<?php } ?>

<div class="admin-card">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h4 class="fw-bold mb-0" style="font-family: 'Forum', serif; color: var(--primary);">All Products</h4>
        <div class="badge bg-success bg-opacity-10 text-success px-3 py-2 rounded-pill">
            Stock Items: <?php echo mysqli_num_rows($qry); ?>
        </div>
    </div>
    <div class="table-responsive">
        <table class="table table-hover align-middle">
            <thead class="bg-light border-0">
                <tr>
                    <th class="py-3 px-4 border-0 small fw-bold text-muted text-uppercase">Product</th>
                    <th class="py-3 px-4 border-0 small fw-bold text-muted text-uppercase">Category</th>
                    <th class="py-3 px-4 border-0 small fw-bold text-muted text-uppercase">Price/MRP</th>
                    <th class="py-3 px-4 border-0 small fw-bold text-muted text-uppercase">Description</th>
                    <th class="py-3 px-4 border-0 small fw-bold text-muted text-uppercase text-end">Actions</th>
                </tr>
            </thead>
            <tbody class="border-0">
                <?php while($row = mysqli_fetch_array($qry)) { ?>
                    <tr>
                        <td class="px-4">
                            <div class="d-flex align-items-center gap-3">
                                <div class="position-relative">
                                    <img src="images/<?php echo $row['img']; ?>" class="rounded-4 shadow-sm border" style="width: 55px; height: 55px; object-fit: cover;">
                                </div>
                                <div>
                                    <div class="fw-bold text-dark"><?php echo $row['title']; ?></div>
                                    <div class="text-muted small" style="font-size: 11px;">ID: #<?php echo $row['productid']; ?></div>
                                </div>
                            </div>
                        </td>
                        <td class="px-4">
                            <span class="badge bg-primary bg-opacity-10 text-primary fw-bold p-2 px-3 rounded-pill" style="font-size: 11px;">
                                <?php echo $row['categoryname'] ? $row['categoryname'] : 'Uncategorized'; ?>
                            </span>
                        </td>
                        <td class="px-4">
                            <div class="fw-bold text-success fs-5">₹<?php echo $row['price']; ?></div>
                            <div class="text-muted smaller text-decoration-line-through">₹<?php echo $row['mrp']; ?></div>
                        </td>
                        <td class="px-4">
                            <div class="text-secondary small text-truncate" style="max-width: 180px;">
                                <?php echo $row['des']; ?>
                            </div>
                        </td>
                        <td class="px-4 text-end">
                            <div class="d-flex justify-content-end gap-2">
                                <a href="proudp.php?uid=<?php echo $row['productid']; ?>" class="btn btn-light btn-sm rounded-pill px-3 fw-bold text-primary border-0">
                                    <i class="fa-solid fa-pen-to-square"></i>
                                </a>
                                <form method="post" style="display:inline;" onsubmit="return confirm('Delete this product?')">
                                    <input type="hidden" name="txtpid" value="<?php echo $row['productid']; ?>">
                                    <button type="submit" name="btndel" class="btn btn-light btn-sm rounded-pill px-3 fw-bold text-danger border-0">
                                        <i class="fa-solid fa-trash-can"></i>
                                    </button>
                                </form>
                            </div>
                        </td>
                    </tr>
                <?php } ?>
                
                <?php if(mysqli_num_rows($qry) == 0) { ?>
                    <tr>
                        <td colspan="5" class="py-5 text-center text-muted">
                            <i class="fa-solid fa-box-open d-block mb-3 fs-1 opacity-25"></i>
                            No products found in inventory.
                        </td>
                    </tr>
                <?php } ?>
            </tbody>
        </table>
    </div>
</div>

</div> <!-- Close admin-main from admintop.php -->
</body>
</html>
