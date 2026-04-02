<?php include 'admintop.php'; ?>

<?php
// Delete user if requested
if(isset($_GET['deleteid'])) {
    $uid = intval($_GET['deleteid']);
    mysqli_query($con, "DELETE FROM tbluser WHERE userid = $uid") or die("Delete failed");
    $msg = "User deleted successfully!";
}

// Search functionality
$search_term = "";
if(isset($_POST['btnsearch'])) {
    $search_term = mysqli_real_escape_string($con, $_POST['txtsname']);
    $res = mysqli_query($con, "SELECT * FROM tbluser WHERE username LIKE '%$search_term%' OR email LIKE '%$search_term%' OR phone LIKE '%$search_term%' OR city LIKE '%$search_term%' OR userid LIKE '%$search_term%' ORDER BY userid DESC") or die("cannot search"); 
} else {
    // Default select query
    $res = mysqli_query($con, "SELECT * FROM tbluser ORDER BY userid DESC");
}
?>

<div class="row mb-4 align-items-center">
    <div class="col-md-7">
        <h2 class="admin-title">Customer Management</h2>
        <p class="text-secondary">View and manage registered customers.</p>
    </div>
    <div class="col-md-5">
        <form method="post" class="d-flex gap-2">
            <div class="input-group">
                <span class="input-group-text bg-light border-0 py-3 rounded-4 px-3 text-muted">
                    <i class="fa-solid fa-magnifying-glass"></i>
                </span>
                <input type="text" name="txtsname" value="<?php echo htmlspecialchars($search_term); ?>" class="form-control bg-light border-0 py-3 rounded-4 ps-0" placeholder="Search by name, email, phone or city...">
            </div>
            <button type="submit" name="btnsearch" class="btn btn-success rounded-4 px-4 shadow-sm">Search</button>
        </form>
    </div>
</div>

<?php if(isset($msg)) { ?>
    <div class="alert alert-success border-0 small mb-4 py-3 rounded-4" style="background: var(--primary-soft); color: var(--primary);">
        <i class="fa-solid fa-check-circle me-2"></i> <?php echo $msg; ?>
    </div>
<?php } ?>

<div class="admin-card">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h4 class="fw-bold mb-0" style="font-family: 'Forum', serif; color: var(--primary);">User Database</h4>
        <div class="badge bg-primary bg-opacity-10 text-primary px-3 py-2 rounded-pill">
            Active Users: <?php echo mysqli_num_rows($res); ?>
        </div>
    </div>
    <div class="table-responsive">
        <table class="table table-hover align-middle">
            <thead class="bg-light border-0">
                <tr>
                    <th class="py-3 px-4 border-0 small fw-bold text-muted text-uppercase">User Info</th>
                    <th class="py-3 px-4 border-0 small fw-bold text-muted text-uppercase">Contact</th>
                    <th class="py-3 px-4 border-0 small fw-bold text-muted text-uppercase">Address</th>
                    <th class="py-3 px-4 border-0 small fw-bold text-muted text-uppercase">Preferences</th>
                    <th class="py-3 px-4 border-0 small fw-bold text-muted text-uppercase text-end">Actions</th>
                </tr>
            </thead>
            <tbody class="border-0">
                <?php while($row = mysqli_fetch_array($res)) { ?>
                    <tr>
                        <td class="px-4">
                            <div class="d-flex align-items-center gap-3">
                                <div class="bg-primary bg-opacity-10 rounded-circle d-flex align-items-center justify-content-center" style="width: 48px; height: 48px; color: var(--primary);">
                                    <i class="fa-solid fa-user-tag"></i>
                                </div>
                                <div>
                                    <div class="fw-bold text-dark"><?php echo $row['username']; ?></div>
                                    <div class="text-muted smaller" style="font-size: 11px;">#USER-<?php echo $row['userid']; ?></div>
                                </div>
                            </div>
                        </td>
                        <td class="px-4">
                            <div class="fw-bold small text-dark"><?php echo $row['email']; ?></div>
                            <div class="text-muted small"><?php echo $row['phone'] ? $row['phone'] : 'No phone'; ?></div>
                        </td>
                        <td class="px-4">
                            <div class="text-secondary small" style="max-width: 220px;">
                                <?php if($row['address']) { 
                                    echo '<i class="fa-solid fa-location-dot me-1 small opacity-50"></i> ' . $row['address'] . ", " . $row['city'] . " - " . $row['pincode'];
                                } else {
                                    echo '<span class="text-muted opacity-50 italic">Not provided</span>';
                                } ?>
                            </div>
                        </td>
                        <td class="px-4">
                            <span class="badge bg-light text-muted border border-light rounded-pill px-3" style="font-size: 10px;">
                                <?php echo strtoupper($row['gender']); ?>
                            </span>
                            <div class="text-primary smaller fw-bold mt-1" style="font-size: 11px;"><?php echo $row['hobbies']; ?></div>
                        </td>
                        <td class="px-4 text-end">
                            <a href="users.php?deleteid=<?php echo $row['userid']; ?>" 
                               class="btn btn-light btn-sm rounded-pill px-3 fw-bold text-danger border-0"
                               onclick="return confirm('Permanently delete this user?');">
                                <i class="fa-solid fa-user-slash me-1"></i> Delete
                            </a>
                        </td>
                    </tr>
                <?php } ?>
                
                <?php if(mysqli_num_rows($res) == 0) { ?>
                    <tr>
                        <td colspan="5" class="py-5 text-center text-muted">
                            <i class="fa-solid fa-users-slash d-block mb-3 fs-1 opacity-25"></i>
                            No users found in database.
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
