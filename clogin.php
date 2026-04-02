    <?php 
    include_once("conn.php");

    if(isset($_REQUEST['btnlogin']))
    {
        $email = mysqli_real_escape_string($con, $_REQUEST['txtemail']);
        $pwd   = mysqli_real_escape_string($con, $_REQUEST['txtpwd']);

        $x = mysqli_query($con, "SELECT * FROM tbluser WHERE email='$email' AND password='$pwd'");

        if(mysqli_num_rows($x) > 0)
        {
            $unifo = mysqli_fetch_array($x);
            $_SESSION['uid']   = $unifo['userid'];
            $_SESSION['uname'] = $unifo['username'];
            $_SESSION['pwd']   = $unifo['password'];
            header("location:cviewproduct.php");
            exit;
        }
        else {
            $error = "Invalid Username or Password!";
        }
    }
    ?>
    <html>
    <head>
        <title>Client Login</title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <?php include("topscript.php"); ?>

    <style>
    body {
        margin: 0;
        padding: 0;
        height: 100vh;
        font-family: "Jost", sans-serif;
        background: #f0f4f8;
        display: flex;
        align-items: center;
        justify-content: center;
    }

    .login-container {
        display: flex;
        background: #fff;
        border-radius: 30px;
        overflow: hidden;
        box-shadow: 0 20px 60px rgba(0,0,0,0.08);
        max-width: 900px;
        width: 95%;
    }

    .login-image {
        flex: 1;
        background: url('https://img.freepik.com/free-photo/fresh-fruit-vegetables-shopping-bag-white-background_23-2148290615.jpg') no-repeat center center;
        background-size: cover;
        display: none;
    }

    @media (min-width: 768px) {
        .login-image { display: block; }
    }

    .login-form-section {
        flex: 1;
        padding: 60px 50px;
    }

    .login-form-section h2 {
        font-family: 'Forum', serif;
        font-weight: 800;
        color: #2e7d32;
        margin-bottom: 10px;
        font-size: 32px;
    }

    .form-control {
        background: #f8fafc;
        border: 1px solid #e2e8f0;
        border-radius: 12px;
        color: #334155;
        padding: 14px;
        font-size: 16px;
        transition: 0.3s;
    }

    .form-control:focus {
        background: #fff;
        border-color: #4caf50;
        box-shadow: 0 0 0 4px rgba(76, 175, 80, 0.1);
    }

    .form-label {
        color: #64748b;
        font-weight: 600;
        margin-bottom: 8px;
    }

    .btn-theme {
        background: #4caf50;
        border: none;
        color: #fff;
        font-weight: 700;
        padding: 14px;
        border-radius: 12px;
        transition: 0.3s;
        width: 100%;
    }

    .btn-theme:hover {
        background: #388e3c;
        transform: translateY(-2px);
        box-shadow: 0 10px 20px rgba(76, 175, 80, 0.2);
    }

    .text-theme {
        color: #4caf50;
        font-weight: 700;
    }
    </style>
    </head>
    <body>

<div class="login-container">
    <div class="login-image" style="background: url('https://img.freepik.com/free-photo/view-assortment-fresh-fruit-vegetables-with-copy-space_23-2148425176.jpg') no-repeat center center; background-size: cover;"></div>
    <div class="login-form-section">
        <a href="chome.php" class="text-theme d-block mb-4 text-decoration-none small fw-bold"><i class="fa fa-arrow-left me-2"></i> Back to Home</a>
        <div class="mb-4">
            <h2>Sign In</h2>
            <p class="text-secondary">Welcome back to Nova Grocery store.</p>
        </div>

        <?php if(!empty($error)): ?>
            <div class="alert alert-danger text-center small border-0" style="background: #fee2e2; color: #991b1b;"><?= $error; ?></div>
        <?php endif; ?>

        <form method="post">
            <div class="mb-4">
                <label for="txtemail" class="form-label">Email Address</label>
                <div class="input-group">
                    <span class="input-group-text bg-light border-end-0 text-muted"><i class="fa fa-envelope"></i></span>
                    <input type="email" name="txtemail" id="txtemail" class="form-control border-start-0" placeholder="yourname@gmail.com" required>
                </div>
            </div>
            <div class="mb-4">
                <label for="txtpwd" class="form-label">Password</label>
                <div class="input-group">
                    <span class="input-group-text bg-light border-end-0 text-muted"><i class="fa fa-lock"></i></span>
                    <input type="password" name="txtpwd" id="txtpwd" class="form-control border-start-0" placeholder="••••••••" required>
                </div>
            </div>
            <div class="d-grid gap-2 mb-4">
                <input type="submit" value="Login to Account" name="btnlogin" class="btn btn-theme py-3">
            </div>
            <p class="text-center small text-secondary mb-0">
                Don't have an account? <a href="cregister.php" class="text-theme text-decoration-none">Register Now</a>
            </p>
        </form>
    </div>
</div>

    </body>
    </html>
