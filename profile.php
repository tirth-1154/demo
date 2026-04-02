<?php include 'admintop.php'; ?>

<div class="row mb-5">
    <div class="col-md-12">
        <h2 class="admin-title mb-0">Admin Profile</h2>
        <p class="text-secondary mb-0">View and update your administrative settings.</p>
    </div>
</div>

<div class="row justify-content-center">
    <div class="col-lg-8">
        <div class="admin-card text-center p-5">
            <div class="mb-4">
                <div class="bg-light rounded-circle d-inline-flex align-items-center justify-content-center shadow-sm" style="width: 150px; height: 150px; border: 5px solid #fff;">
                    <i class="fa-solid fa-user-shield text-success display-1"></i>
                </div>
            </div>
            
            <h3 class="fw-bold text-dark mb-1">System Administrator</h3>
            <p class="text-muted mb-4">Nova Grocery Management Portal</p>

            <div class="row text-start justify-content-center">
                <div class="col-md-8">
                    <div class="list-group list-group-flush border-top border-bottom mb-4">
                        <div class="list-group-item bg-transparent py-3 d-flex justify-content-between align-items-center px-0">
                            <span class="text-muted"><i class="fa-solid fa-id-card me-2"></i> Role</span>
                            <span class="fw-bold text-dark">Super Admin</span>
                        </div>
                        <div class="list-group-item bg-transparent py-3 d-flex justify-content-between align-items-center px-0">
                            <span class="text-muted"><i class="fa-solid fa-envelope me-2"></i> Email Address</span>
                            <span class="fw-bold text-dark">admin@novagrocery.com</span>
                        </div>
                        <div class="list-group-item bg-transparent py-3 d-flex justify-content-between align-items-center px-0">
                            <span class="text-muted"><i class="fa-solid fa-phone me-2"></i> Contact</span>
                            <span class="fw-bold text-dark">+91 9601975789</span>
                        </div>
                        <div class="list-group-item bg-transparent py-3 d-flex justify-content-between align-items-center px-0">
                            <span class="text-muted"><i class="fa-solid fa-shield-halved me-2"></i> Last Login</span>
                            <span class="text-dark">Today, <?php echo date('h:i A'); ?></span>
                        </div>
                    </div>

                    <div class="d-grid gap-2 d-md-flex justify-content-md-center">
                        <button class="btn btn-success px-5 py-3 rounded-pill shadow-sm fw-bold">
                            <i class="fa-solid fa-edit me-2"></i> Edit Account Settings
                        </button>
                        <a href="logout.php" class="btn btn-light px-5 py-3 rounded-pill fw-bold text-danger">
                            <i class="fa-solid fa-power-off me-2"></i> Log Out
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

</div> <!-- Close admin-main -->
</body>
</html>
