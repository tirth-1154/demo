<?php include 'admintop.php'; ?>

<?php
if(isset($_POST['btnadd'])){
    $catname = mysqli_real_escape_string($con, $_POST['txtcatname']);
    mysqli_query($con, "INSERT INTO tblcat VALUES(NULL, '$catname')") or die("cannot insert category");
    $msg = "Category added successfully!";
}

if(isset($_POST['btnupd'])){
    $catid = $_POST['txtcatid'];
    $catname = mysqli_real_escape_string($con, $_POST['txtcatname']);
    mysqli_query($con, "UPDATE tblcat SET categoryname='$catname' WHERE categoryid='$catid'") or die("cannot update record");
    $msg = "Category updated successfully!";
}

if(isset($_POST['btndel'])){
    $catid = $_POST['txtcatid'];
    mysqli_query($con, "DELETE FROM tblcat WHERE categoryid='$catid'") or die("cannot delete");
    $msg = "Category deleted successfully!";
}

$qry = mysqli_query($con, "SELECT * FROM tblcat ORDER BY categoryid DESC");
?>

<div class="row mb-4">
    <div class="col-md-12">
        <h2 class="admin-title">Manage Categories</h2>
        <p class="text-secondary">Organize your store by adding, updating, or removing product categories.</p>
    </div>
</div>

<div class="row g-4">
    <!-- Form Section -->
    <div class="col-lg-4">
        <div class="admin-card">
            <h4 class="fw-bold mb-4" style="font-family: 'Forum', serif; color: var(--primary);">Category Details</h4>
            
            <?php if(isset($msg)) { ?>
                <div class="alert alert-success border-0 small mb-4 py-3 rounded-4" style="background: var(--primary-soft); color: var(--primary);">
                    <i class="fa-solid fa-check-circle me-2"></i> <?php echo $msg; ?>
                </div>
            <?php } ?>

            <form method="post">
                <div class="mb-3">
                    <label class="form-label small fw-bold text-muted text-uppercase" style="letter-spacing: 0.5px;">Category ID</label>
                    <input type="text" class="form-control bg-light border-0 py-3 rounded-4" name="txtcatid" id="txtcatid" placeholder="ID (Auto-filled)" readonly>
                </div>
                <div class="mb-4">
                    <label class="form-label small fw-bold text-muted text-uppercase" style="letter-spacing: 0.5px;">Category Name</label>
                    <input type="text" class="form-control bg-light border-0 py-3 rounded-4" name="txtcatname" id="txtcatname" placeholder="e.g. Fresh Fruits" required>
                </div>
                
                <div class="d-grid gap-3">
                    <button type="submit" name="btnadd" class="btn btn-success py-3 shadow-sm">
                        <i class="fa-solid fa-plus-circle me-2"></i> Add Category
                    </button>
                    <div class="d-flex gap-2">
                        <button type="submit" name="btnupd" class="btn btn-outline-primary flex-fill fw-bold rounded-4 py-2">
                            Update
                        </button>
                        <button type="submit" name="btndel" class="btn btn-outline-danger flex-fill fw-bold rounded-4 py-2" onclick="return confirm('Are you sure you want to delete this category?')">
                            Delete
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </div>

    <!-- Table Section -->
    <div class="col-lg-8">
        <div class="admin-card">
            <div class="d-flex justify-content-between align-items-center mb-4">
                <h4 class="fw-bold mb-0" style="font-family: 'Forum', serif; color: var(--primary);">Existing Categories</h4>
                <div class="badge bg-primary bg-opacity-10 text-primary px-3 py-2 rounded-pill">
                    Total: <?php echo mysqli_num_rows($qry); ?>
                </div>
            </div>
            <div class="table-responsive">
                <table class="table table-hover align-middle">
                    <thead class="bg-light border-0">
                        <tr>
                            <th class="py-3 px-4 border-0 small fw-bold text-muted text-uppercase">ID</th>
                            <th class="py-3 px-4 border-0 small fw-bold text-muted text-uppercase">Category Name</th>
                            <th class="py-3 px-4 border-0 small fw-bold text-muted text-uppercase text-end">Action</th>
                        </tr>
                    </thead>
                    <tbody class="border-0">
                        <?php while($row = mysqli_fetch_array($qry)) { ?>
                            <tr>
                                <td class="px-4 fw-bold text-secondary">#<?php echo $row['categoryid']; ?></td>
                                <td class="px-4">
                                    <div class="fw-bold text-dark"><?php echo $row['categoryname']; ?></div>
                                </td>
                                <td class="px-4 text-end">
                                    <button class="btn btn-light btn-sm rounded-pill px-4 fw-bold text-primary border-0" 
                                            onclick="fillForm('<?php echo $row['categoryid']; ?>', '<?php echo $row['categoryname']; ?>')">
                                        Select
                                    </button>
                                </td>
                            </tr>
                        <?php } ?>
                        
                        <?php if(mysqli_num_rows($qry) == 0) { ?>
                            <tr>
                                <td colspan="3" class="py-5 text-center text-muted">
                                    <i class="fa-solid fa-folder-open d-block mb-3 fs-1 opacity-25"></i>
                                    No categories found.
                                </td>
                            </tr>
                        <?php } ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

<script>
function fillForm(id, name) {
    document.getElementById('txtcatid').value = id;
    document.getElementById('txtcatname').value = name;
    window.scrollTo({ top: 0, behavior: 'smooth' });
}
</script>

</div> <!-- Close admin-main from admintop.php -->
</body>
</html>