<?php
include_once("conn.php");

// Database Migration: Ensure tblcat table exists
mysqli_query($con, "CREATE TABLE IF NOT EXISTS `tblcat` (
    `categoryid` INT(11) NOT NULL AUTO_INCREMENT,
    `categoryname` VARCHAR(255) NOT NULL,
    PRIMARY KEY (`categoryid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4");

// Database Migration: Ensure tblpro has categoryid
$check_col = mysqli_query($con, "SHOW COLUMNS FROM `tblpro` LIKE 'categoryid'");
if (mysqli_num_rows($check_col) == 0) {
    mysqli_query($con, "ALTER TABLE `tblpro` ADD COLUMN `categoryid` INT(11) AFTER `price`") or die("Migration failed: " . mysqli_error($con));
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Nova Admin | Premium Management Dashboard</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800&family=Forum&display=swap" rel="stylesheet">
    <style>
        :root {
            --primary: #2e7d32;
            --primary-light: #4caf50;
            --primary-soft: #e8f5e9;
            --dark: #0f172a;
            --secondary: #64748b;
            --bg-body: #f8fafc;
            --glass-bg: rgba(255, 255, 255, 0.85);
            --sidebar-width: 280px;
            --transition: all 0.35s cubic-bezier(0.4, 0, 0.2, 1);
            --shadow-sm: 0 2px 4px rgba(0,0,0,0.05);
            --shadow-md: 0 4px 12px rgba(0,0,0,0.06);
            --shadow-lg: 0 10px 30px rgba(0,0,0,0.08);
        }

        body {
            font-family: 'Inter', sans-serif;
            background-color: var(--bg-body);
            color: var(--dark);
            min-height: 100vh;
            overflow-x: hidden;
        }

        .quick-action-btn {
            transition: all 0.3s cubic-bezier(0.165, 0.84, 0.44, 1);
        }

        .quick-action-btn:hover {
            transform: translateY(-5px);
            box-shadow: 0 10px 20px rgba(0,0,0,0.1);
            color: #fff !important;
        }

        .quick-action-btn:hover .bg-opacity-10 {
            background-color: rgba(255, 255, 255, 0.2) !important;
        }

        .quick-action-btn:hover i, 
        .quick-action-btn:hover .fw-bold,
        .quick-action-btn:hover .small {
            color: #fff !important;
        }

        /* Premium Sidebar */
        .admin-sidebar {
            width: var(--sidebar-width);
            background: #ffffff;
            height: 100vh;
            position: fixed;
            left: 0;
            top: 0;
            border-right: 1px solid rgba(0,0,0,0.05);
            z-index: 1000;
            padding: 2.5rem 1.5rem;
            display: flex;
            flex-direction: column;
            transition: var(--transition);
        }

        .admin-sidebar .brand {
            padding: 0 1rem 2.5rem;
            font-family: 'Forum', serif;
            font-size: 28px;
            color: var(--primary);
            font-weight: 800;
            display: flex;
            align-items: center;
            gap: 12px;
            text-transform: uppercase;
            letter-spacing: 1px;
        }

        .admin-nav .nav-link {
            padding: 14px 18px;
            color: var(--secondary);
            font-weight: 500;
            font-size: 15px;
            border-radius: 12px;
            transition: var(--transition);
            display: flex;
            align-items: center;
            gap: 14px;
            margin-bottom: 8px;
        }

        .admin-nav .nav-link:hover {
            color: var(--primary);
            background: var(--primary-soft);
            transform: translateX(4px);
        }

        .admin-nav .nav-link.active {
            color: #ffffff;
            background: var(--primary);
            box-shadow: 0 8px 20px rgba(46, 125, 50, 0.25);
        }

        .admin-nav .nav-link i {
            font-size: 18px;
            width: 24px;
            text-align: center;
        }

        /* Main Content Container */
        .admin-main {
            margin-left: var(--sidebar-width);
            padding: 3rem 4rem;
            min-height: 100vh;
        }

        .admin-card {
            background: var(--glass-bg);
            backdrop-filter: blur(10px);
            border: 1px solid rgba(255,255,255,0.7);
            border-radius: 24px;
            padding: 35px;
            box-shadow: var(--shadow-lg);
        }

        .admin-title {
            font-family: 'Forum', serif;
            font-weight: 800;
            font-size: 42px;
            color: var(--primary);
            margin-bottom: 0.5rem;
        }

        .btn-success {
            background: var(--primary);
            border: none;
            padding: 12px 28px;
            font-weight: 600;
            border-radius: 14px;
            box-shadow: 0 4px 15px rgba(46, 125, 50, 0.2);
            transition: var(--transition);
        }

        .btn-success:hover {
            background: #1b5e20;
            transform: translateY(-3px);
            box-shadow: 0 8px 25px rgba(46, 125, 50, 0.3);
        }

        /* Stats & UI Elements */
        .stat-card {
            background: #ffffff;
            border-radius: 24px;
            padding: 28px;
            display: flex;
            align-items: center;
            gap: 20px;
            box-shadow: var(--shadow-md);
            transition: var(--transition);
            border: 1px solid rgba(0,0,0,0.03);
        }

        .stat-card:hover {
            transform: translateY(-8px);
            box-shadow: var(--shadow-lg);
        }

        .stat-icon {
            width: 65px;
            height: 65px;
            border-radius: 18px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 26px;
        }

        .bg-gradient-green { background: linear-gradient(135deg, #2e7d32, #66bb6a); color: #fff; }
        .bg-gradient-blue { background: linear-gradient(135deg, #0f172a, #334155); color: #fff; }
        .bg-gradient-orange { background: linear-gradient(135deg, #f59e0b, #fbbf24); color: #fff; }

        @media (max-width: 1200px) {
            .admin-main { padding: 2rem; }
        }

        @media (max-width: 992px) {
            .admin-sidebar { transform: translateX(-100%); width: 260px; }
            .admin-sidebar.show { transform: translateX(0); }
            .admin-main { margin-left: 0; padding: 1.5rem; }
        }
    </style>
</head>
<body>

<div class="admin-sidebar" id="sidebar">
    <div class="brand">
        <div class="d-flex align-items-center justify-content-center bg-success text-white rounded-circle shadow-sm" style="width: 45px; height: 45px;">
            <i class="fa-solid fa-leaf"></i>
        </div>
        <span>Nova Admin</span>
    </div>
    
    <div class="admin-nav mt-2">
        <p class="text-uppercase small fw-bold text-muted mb-3 px-3" style="letter-spacing: 1px; font-size: 11px;">Main Menu</p>
        
        <a href="dashboard.php" class="nav-link <?php echo basename($_SERVER['PHP_SELF']) == 'dashboard.php' ? 'active' : ''; ?>">
            <i class="fa-solid fa-grid-2"></i> Dashboard
        </a>
        <a href="category.php" class="nav-link <?php echo basename($_SERVER['PHP_SELF']) == 'category.php' ? 'active' : ''; ?>">
            <i class="fa-solid fa-layer-group"></i> Categories
        </a>
        <a href="products.php" class="nav-link <?php echo (basename($_SERVER['PHP_SELF']) == 'products.php' || basename($_SERVER['PHP_SELF']) == 'caddpro.php' || basename($_SERVER['PHP_SELF']) == 'proudp.php') ? 'active' : ''; ?>">
            <i class="fa-solid fa-box-open"></i> Products
        </a>
        <a href="users.php" class="nav-link <?php echo basename($_SERVER['PHP_SELF']) == 'users.php' ? 'active' : ''; ?>">
            <i class="fa-solid fa-users-gear"></i> Customers
        </a>
        <a href="aorder.php" class="nav-link <?php echo basename($_SERVER['PHP_SELF']) == 'aorder.php' ? 'active' : ''; ?>">
            <i class="fa-solid fa-receipt"></i> Orders
        </a>
        
        <div class="mt-auto">
            <a href="logout.php" class="nav-link text-danger logout-btn bg-danger bg-opacity-10">
                <i class="fa-solid fa-sign-out-alt"></i> Sign Out
            </a>
        </div>
    </div>
</div>

<div class="admin-main">
