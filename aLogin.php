<?php

include_once("conn.php");

if (isset($_REQUEST['btnlogin'])) 
{
    $uname = $_REQUEST['txtuname'];
    $pwd = $_REQUEST['txtpwd'];

    if ($uname == 'admin' && $pwd == 'admin123') {
        header("location:dashboard.php");
        exit;
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Nova Admin - Secure Access</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800&family=Forum&display=swap" rel="stylesheet">
    <style>
        :root {
            --primary: #bdc4bdff;
            --primary-dark: #1b5e20;
            --primary-soft: #e8f5e9;
        }

        body {
            margin: 0;
            padding: 0;
            min-height: 100vh;
            font-family: "Inter", sans-serif;
            background: #f8fafc;
            display: flex;
            align-items: center;
            justify-content: center;
        }
        
        .admin-login-wrapper {
            display: flex;
            width: 100%;
            min-height: 100vh;
            background: #fff;
        }

        .admin-image {
            flex: 1.2;
            background: url('https://images.unsplash.com/photo-1542838132-92c53300491e?ixlib=rb-4.0.3&auto=format&fit=crop&w=1074&q=80') no-repeat center center;
            background-size: cover;
            position: relative;
        }

        .admin-image::after {
            content: '';
            position: absolute;
            top: 0; left: 0; right: 0; bottom: 0;
            /* background: linear-gradient(135deg, rgba(0, 34, 2, 0.9)); */
            background: linear-gradient(135deg, rgba(52, 74, 54, 0.45));
        }

        .admin-form-container {
            flex: 1;
            padding: 60px 80px;
            display: flex;
            flex-direction: column;
            justify-content: center;
            background: #ffffff;
        }

        .admin-form-container h2 {
            font-family: 'Forum', serif;
            font-weight: 800;
            /* color: var(--primary); */
            color: #000000;
            margin-bottom: 8px;
            font-size: 42px;
        }

        .form-label {
            color: #64748b;
            font-weight: 700;
            font-size: 11px;
            margin-bottom: 8px;
            text-transform: uppercase;
            letter-spacing: 1px;
        }

        .input-group-text {
            background: #f1f5f9;
            border: none;
            color: #94a3b8;
            border-radius: 12px 0 0 12px;
            padding-left: 20px;
        }

        .form-control {
            background: #f1f5f9;
            border: none;
            border-radius: 12px;
            color: #1e293b;
            padding: 14px 15px;
            font-size: 15px;
            font-weight: 500;
            transition: all 0.3s ease;
        }

        .form-control:focus {
            background: #fff;
            box-shadow: 0 0 0 4px rgba(46, 125, 50, 0.1) !important;
            border-radius: 12px;
        }

        .btn-success {
            background: var(--primary);
            border: none;
            color: #fff;
            font-weight: 800;
            padding: 18px;
            border-radius: 16px;
            transition: all 0.4s cubic-bezier(0.165, 0.84, 0.44, 1);
            font-size: 15px;
            text-transform: uppercase;
            letter-spacing: 1.5px;
            margin-top: 25px;
            box-shadow: 0 10px 20px rgba(46, 125, 50, 0.2);
        }

        .btn-success:hover {
            background: var(--primary-dark);
            transform: translateY(-3px);
            box-shadow: 0 15px 30px rgba(46, 125, 50, 0.3);
        }

        .brand-text {
            color: var(--primary);
            font-weight: 800;
            text-transform: uppercase;
            letter-spacing: 3px;
            margin-bottom: 50px;
            font-size: 13px;
            display: flex;
            align-items: center;
            gap: 10px;
        }

        .brand-text .dot {
            width: 8px;
            height: 8px;
            background: var(--primary);
            border-radius: 50%;
        }

        @media (max-width: 992px) {
            .admin-image { display: none; }
            .admin-form-container { flex: 1; padding: 40px 24px; }
        }
    </style>
</head>
<body>

<div class="admin-login-wrapper">
    <div class="admin-image">
        <div class="position-absolute translate-middle top-50 start-50 text-center text-white z-2 w-75">
            <h1 class="display-3 fw-bold mb-3" style="font-family: 'Forum', serif; letter-spacing: -1px;"><span style="color: #ffffff;">Nova Admin</span></h1>
            <p class="lead opacity-75 fw-light" style="font-size: 1.25rem;">Command center for your premium grocery experience. Manage freshness, daily.</p>
        </div>
    </div>
    <div class="admin-form-container">
        <div style="max-width: 420px; width: 100%; margin: 0 auto;">
            <div class="brand-text">
                <div class="dot"></div> NOVA GROCERY <div class="dot"></div>
            </div>
            
            <h2>Welcome Back</h2>
            <p class="text-secondary mb-5">Please authenticate with your credentials.</p>
            
            <form method="post">
                <div class="mb-4">
                    <label class="form-label">Administrative User</label>
                    <div class="input-group">
                        <span class="input-group-text"><i class="fa-solid fa-shield-halved"></i></span>
                        <input type="text" name="txtuname" class="form-control" placeholder="Enter username" required>
                    </div>
                </div>
                <div class="mb-4">
                    <label class="form-label">Security Key</label>
                    <div class="input-group">
                        <span class="input-group-text"><i class="fa-solid fa-key"></i></span>
                        <input type="password" name="txtpwd" class="form-control" placeholder="••••••••" required>
                    </div>
                </div>
                
                <div class="d-grid">
                    <button type="submit" name="btnlogin" class="btn btn-success">
                        Access Control Center <i class="fa-solid fa-arrow-right-to-bracket ms-2"></i>
                    </button>
                </div>
                
                <div class="text-center mt-5">
                    <p class="small text-muted mb-4 text-uppercase fw-bold" style="letter-spacing: 1px; font-size: 10px;">Security Protocol Active</p>
                    <a href="chome.php" class="btn btn-outline-success btn-sm rounded-pill px-4 py-2 border-0 fw-bold">
                        <i class="fa-solid fa-store me-2"></i> Return to Storefront
                    </a>
                </div>
            </form>
        </div>
    </div>
</div>

</body>
</html>
