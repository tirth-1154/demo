<?php include 'admintop.php'; ?>

<?php
// Fetch Stats
$prod_count = mysqli_fetch_array(mysqli_query($con, "SELECT COUNT(*) FROM tblpro"))[0];
$user_count = mysqli_fetch_array(mysqli_query($con, "SELECT COUNT(*) FROM tbluser"))[0];
$order_count = mysqli_fetch_array(mysqli_query($con, "SELECT COUNT(*) FROM tblorder"))[0];
$cat_count = mysqli_fetch_array(mysqli_query($con, "SELECT COUNT(*) FROM tblcat"))[0];
?>

<div class="row mb-4">
    <div class="col-md-12">
        <h2 class="admin-title">Dashboard Overview</h2>
        <p class="text-secondary">Welcome back, Admin! Here's a snapshot of your store today.</p>
    </div>
</div>

<!-- Stats Grid -->
<div class="row g-4 mb-5">
    <div class="col-xl-3 col-md-6">
        <div class="stat-card">
            <div class="stat-icon bg-gradient-green">
                <i class="fa-solid fa-boxes-stacked"></i>
            </div>
            <div>
                <h3 class="fw-bold mb-0"><?php echo $prod_count; ?></h3>
                <p class="text-muted small mb-1">Total Products</p>
                <span class="badge bg-success bg-opacity-10 text-success small">
                    <i class="fa-solid fa-arrow-up me-1"></i> 12%
                </span>
            </div>
        </div>
    </div>
    <div class="col-xl-3 col-md-6">
        <div class="stat-card">
            <div class="stat-icon bg-gradient-blue">
                <i class="fa-solid fa-user-group"></i>
            </div>
            <div>
                <h3 class="fw-bold mb-0"><?php echo $user_count; ?></h3>
                <p class="text-muted small mb-1">Active Users</p>
                <span class="badge bg-primary bg-opacity-10 text-primary small">
                    <i class="fa-solid fa-arrow-up me-1"></i> 8%
                </span>
            </div>
        </div>
    </div>
    <div class="col-xl-3 col-md-6">
        <div class="stat-card">
            <div class="stat-icon bg-gradient-orange">
                <i class="fa-solid fa-cart-shopping"></i>
            </div>
            <div>
                <h3 class="fw-bold mb-0"><?php echo $order_count; ?></h3>
                <p class="text-muted small mb-1">Total Orders</p>
                <span class="badge bg-warning bg-opacity-10 text-warning small">
                    <i class="fa-solid fa-arrow-up me-1"></i> 5%
                </span>
            </div>
        </div>
    </div>
    <div class="col-xl-3 col-md-6">
        <div class="stat-card">
            <div class="stat-icon bg-primary text-white" style="background: linear-gradient(135deg, #1b5e20, #2e7d32);">
                <i class="fa-solid fa-tags"></i>
            </div>
            <div>
                <h3 class="fw-bold mb-0"><?php echo $cat_count; ?></h3>
                <p class="text-muted small mb-1">Categories</p>
                <span class="badge bg-dark bg-opacity-10 text-dark small">Stable</span>
            </div>
        </div>
    </div>
</div>

<div class="row g-4">
    <!-- Quick Actions -->
    <div class="col-lg-8">
        <div class="admin-card h-100">
            <div class="d-flex justify-content-between align-items-center mb-4">
                <h4 class="fw-bold mb-0" style="font-family: 'Forum', serif; color: var(--primary);">Quick Management</h4>
                <button class="btn btn-light btn-sm rounded-circle"><i class="fa-solid fa-ellipsis-v"></i></button>
            </div>
            <div class="row g-3">
                <div class="col-md-6">
                    <a href="caddpro.php" class="btn btn-outline-success w-100 p-4 rounded-4 text-start border-2 d-flex align-items-center gap-3 quick-action-btn">
                        <div class="bg-success bg-opacity-10 p-2 rounded-3 text-success transition-base">
                            <i class="fa-solid fa-plus-circle fs-4"></i>
                        </div>
                        <div>
                            <div class="fw-bold">Add Product</div>
                            <div class="small opacity-75">Update your inventory</div>
                        </div>
                    </a>
                </div>
                <div class="col-md-6">
                    <a href="category.php" class="btn btn-outline-primary w-100 p-4 rounded-4 text-start border-2 d-flex align-items-center gap-3 quick-action-btn">
                        <div class="bg-primary bg-opacity-10 p-2 rounded-3 text-primary transition-base">
                            <i class="fa-solid fa-list-check fs-4"></i>
                        </div>
                        <div>
                            <div class="fw-bold">Categories</div>
                            <div class="small opacity-75">Organize store structure</div>
                        </div>
                    </a>
                </div>
                <div class="col-md-6">
                    <a href="products.php" class="btn btn-outline-dark w-100 p-4 rounded-4 text-start border-2 d-flex align-items-center gap-3 quick-action-btn">
                        <div class="bg-dark bg-opacity-10 p-2 rounded-3 text-dark transition-base">
                            <i class="fa-solid fa-cubes-stacked fs-4"></i>
                        </div>
                        <div>
                            <div class="fw-bold">View Stock</div>
                            <div class="small opacity-75">Check inventory levels</div>
                        </div>
                    </a>
                </div>
                <div class="col-md-6">
                    <a href="aorder.php" class="btn btn-outline-info w-100 p-4 rounded-4 text-start border-2 d-flex align-items-center gap-3 quick-action-btn">
                        <div class="bg-info bg-opacity-10 p-2 rounded-3 text-info transition-base">
                            <i class="fa-solid fa-truck-fast fs-4"></i>
                        </div>
                        <div>
                            <div class="fw-bold">Orders</div>
                            <div class="small opacity-75">Manage shipments</div>
                        </div>
                    </a>
                </div>
            </div>
        </div>
    </div>

    <!-- System Info -->
    <div class="col-lg-4">
        <div class="admin-card h-100">
            <h4 class="fw-bold mb-4" style="font-family: 'Forum', serif; color: var(--primary);">System Health</h4>
            <div class="space-y-4">
                <div class="d-flex align-items-center justify-content-between p-3 rounded-4 bg-light mb-3">
                    <div class="d-flex align-items-center gap-3">
                        <div class="text-success fs-5"><i class="fa-solid fa-circle-check"></i></div>
                        <div>
                            <div class="fw-bold small">Server Engine</div>
                            <div class="text-muted smaller" style="font-size: 11px;">Apache/v2.4 (Win64)</div>
                        </div>
                    </div>
                    <span class="badge bg-success rounded-pill">Optimal</span>
                </div>
                
                <div class="d-flex align-items-center justify-content-between p-3 rounded-4 bg-light mb-3">
                    <div class="d-flex align-items-center gap-3">
                        <div class="text-primary fs-5"><i class="fa-solid fa-database"></i></div>
                        <div>
                            <div class="fw-bold small">Database Connection</div>
                            <div class="text-muted smaller" style="font-size: 11px;">MySQL 8.0.30</div>
                        </div>
                    </div>
                    <span class="text-success fw-bold small">Active</span>
                </div>

                <div class="p-3 rounded-4 bg-primary bg-opacity-5 border border-primary border-opacity-10 mt-4">
                    <div class="d-flex align-items-center gap-2 text-primary mb-2">
                        <i class="fa-solid fa-shield-halved"></i>
                        <span class="fw-bold small">Security Note</span>
                    </div>
                    <p class="smaller text-muted mb-0" style="font-size: 11px;">Your admin session is encrypted. Last login from 127.0.0.1 at 08:30 PM.</p>
                </div>
            </div>
        </div>
    </div>
</div>

</div> <!-- Close admin-main from admintop.php -->
</body>
</html>
