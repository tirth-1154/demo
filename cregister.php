<?php
include_once("conn.php");

if (isset($_POST['BtnReg'])) {
    $uname = mysqli_real_escape_string($con, $_POST['txtuname']);
    $pwd   = mysqli_real_escape_string($con, $_POST['txtpwd']);
    $mail  = mysqli_real_escape_string($con, $_POST['txtemail']);
    $phone = mysqli_real_escape_string($con, $_POST['txtphone']);
    $addr  = mysqli_real_escape_string($con, $_POST['txtaddress']);
    $city  = mysqli_real_escape_string($con, $_POST['txtcity']);
    $pin   = mysqli_real_escape_string($con, $_POST['txtpincode']);
    $gen   = isset($_POST['gender']) ? $_POST['gender'] : '';
    $hbb   = isset($_POST['hbb']) ? implode(",", $_POST['hbb']) : '';

    $qry = "INSERT INTO tbluser VALUES (NULL,'$uname','$pwd','$mail','$phone','$addr','$city','$pin','$gen','$hbb')";
    $x = mysqli_query($con, $qry) or die(mysqli_error($con));

    if ($x > 0) {
        $success = true;
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Join Nova Grocery - Create Account</title>
  <?php include("topscript.php"); ?>
  <style>
    body {
      margin: 0;
      padding: 0;
      min-height: 100vh;
      font-family: "Jost", sans-serif;
      background: #f8fafc;
      display: flex;
      align-items: center;
      justify-content: center;
    }
    
    .register-wrapper {
      display: flex;
      width: 100%;
      min-height: 100vh;
      background: #fff;
    }

    .register-image {
      flex: 1.2;
      background: url('https://images.unsplash.com/photo-1542838132-92c53300491e?ixlib=rb-4.0.3&auto=format&fit=crop&w=1074&q=80') no-repeat center center;
      background-size: cover;
      position: relative;
    }

    .register-image::after {
      content: '';
      position: absolute;
      top: 0; left: 0; right: 0; bottom: 0;
      background: linear-gradient(to right, rgba(0,0,0,0.4), transparent);
    }

    .register-form-container {
      flex: 1;
      padding: 60px 80px;
      display: flex;
      flex-direction: column;
      justify-content: center;
      background: #ffffff;
      max-height: 100vh;
      overflow-y: auto;
    }

    .register-form-container h3 {
      font-family: 'Forum', serif;
      font-weight: 800;
      color: #2e7d32;
      margin-bottom: 5px;
      font-size: 38px;
    }

    .form-label {
      color: #475569;
      font-weight: 700;
      font-size: 14px;
      margin-bottom: 8px;
      text-transform: uppercase;
      letter-spacing: 0.5px;
    }

    .input-group-text {
      background: #f8fafc;
      border-color: #e2e8f0;
      color: #94a3b8;
      border-radius: 12px 0 0 12px;
    }

    .form-control {
      background: #fcfdfe;
      border: 1px solid #e2e8f0;
      border-radius: 12px;
      color: #1e293b;
      padding: 12px 15px;
      font-size: 16px;
      transition: 0.3s;
    }

    .form-control:focus {
      border-color: #4caf50 !important;
      box-shadow: 0 0 0 4px rgba(76, 175, 80, 0.1) !important;
    }

    .option-pill {
      position: relative;
      display: inline-block;
      margin-right: 8px;
      margin-bottom: 8px;
      cursor: pointer;
    }

    .option-pill input {
      display: none;
    }

    .option-pill span {
      display: inline-block;
      padding: 8px 20px;
      background: #f1f5f9;
      border-radius: 100px;
      font-size: 13px;
      font-weight: 700;
      color: #64748b;
      transition: 0.3s;
      border: 1px solid transparent;
    }

    .option-pill input:checked + span {
      background: #e8f5e9;
      color: #2e7d32;
      border-color: #4caf50;
    }

    .btn-theme {
      background: #2e7d32;
      border: none;
      color: #fff;
      font-weight: 800;
      padding: 16px;
      border-radius: 14px;
      transition: 0.3s;
      font-size: 16px;
      text-transform: uppercase;
      letter-spacing: 1px;
    }

    .btn-theme:hover {
      background: #1b5e20;
      transform: translateY(-2px);
      box-shadow: 0 10px 25px rgba(46, 125, 50, 0.2);
    }

    @media (max-width: 1200px) {
      .register-form-container { padding: 40px; }
    }

    @media (max-width: 992px) {
      .register-image { display: none; }
      .register-form-container { flex: 1; padding: 40px 20px; }
    }
  </style>
</head>
<body>

<div class="register-wrapper">
    <div class="register-image">
        <div class="position-absolute bottom-0 start-0 p-5 text-white z-2">
            <h1 class="display-3 fw-bold mb-3" style="font-family: 'Forum', serif;">Freshness <br>at Your Door</h1>
            <p class="lead opacity-75">Join thousands of happy customers who get the best produce delivered daily.</p>
        </div>
    </div>
    <div class="register-form-container">
      <div class="max-width: 500px; width: 100%; margin: 0 auto;">
          <a href="chome.php" class="text-success text-decoration-none fw-bold small d-block mb-4"><i class="fa fa-arrow-left me-2"></i> BACK TO HOME</a>
          
          <h3>Create Account</h3>
          <p class="text-secondary mb-5">Fill in your details to start shopping fresh.</p>
          
          <form method="post">
            <div class="row">
              <div class="col-md-6 mb-4">
                <label class="form-label">Username</label>
                <div class="input-group">
                    <span class="input-group-text"><i class="fa fa-user"></i></span>
                    <input type="text" name="txtuname" class="form-control" placeholder="john_doe" required>
                </div>
              </div>
              <div class="col-md-6 mb-4">
                <label class="form-label">Email Address</label>
                <div class="input-group">
                    <span class="input-group-text"><i class="fa fa-envelope"></i></span>
                    <input type="email" name="txtemail" class="form-control" placeholder="john@email.com" required>
                </div>
              </div>
            </div>

            <div class="row">
              <div class="col-md-6 mb-4">
                <label class="form-label">Password</label>
                <div class="input-group">
                    <span class="input-group-text"><i class="fa fa-lock"></i></span>
                    <input type="password" name="txtpwd" class="form-control" placeholder="••••••••" required>
                </div>
              </div>
              <div class="col-md-6 mb-4">
                <label class="form-label">Phone Number</label>
                <div class="input-group">
                    <span class="input-group-text"><i class="fa fa-phone"></i></span>
                    <input type="tel" name="txtphone" class="form-control" placeholder="+91 98765 43210" required>
                </div>
              </div>
            </div>

            <div class="mb-4">
              <label class="form-label">Delivery Address</label>
              <div class="input-group">
                  <span class="input-group-text"><i class="fa fa-map-marker-alt"></i></span>
                  <textarea name="txtaddress" class="form-control" rows="2" placeholder="Full delivery address" required></textarea>
              </div>
            </div>

            <div class="row">
              <div class="col-md-6 mb-4">
                <label class="form-label">City</label>
                <input type="text" name="txtcity" class="form-control" placeholder="City" required>
              </div>
              <div class="col-md-6 mb-4">
                <label class="form-label">Pincode</label>
                <input type="text" name="txtpincode" class="form-control" placeholder="400001" required>
              </div>
            </div>

            <div class="row mb-4">
              <div class="col-md-5">
                <label class="form-label d-block">Gender</label>
                <label class="option-pill">
                  <input type="radio" name="gender" value="Male" required>
                  <span>Male</span>
                </label>
                <label class="option-pill">
                  <input type="radio" name="gender" value="Female" required>
                  <span>Female</span>
                </label>
              </div>

              <div class="col-md-7">
                <label class="form-label d-block">Dietary Preferences</label>
                <label class="option-pill">
                  <input type="checkbox" name="hbb[]" value="Organic">
                  <span>Organic</span>
                </label>
                <label class="option-pill">
                  <input type="checkbox" name="hbb[]" value="Vegan">
                  <span>Vegan</span>
                </label>
                <label class="option-pill">
                  <input type="checkbox" name="hbb[]" value="Sugar Free">
                  <span>Sugar Free</span>
                </label>
              </div>
            </div>

            <button type="submit" name="BtnReg" class="btn btn-theme w-100 mb-4">Register Now</button>
            
            <p class="text-center small text-secondary">
              Already a member? <a href="clogin.php" class="text-success text-decoration-none fw-bold">Sign In</a>
            </p>
          </form>

          <?php if (isset($success) && $success) { ?>
            <div class="alert alert-success mt-4 p-4 border-0 rounded-4 shadow-sm text-center" style="background: #e8f5e9;">
                <div class="h4 text-success mb-2"><i class="fa fa-check-circle"></i> Success!</div>
                <p class="text-secondary small mb-3">Your account has been created successfully.</p>
                <a href="clogin.php" class="btn btn-success btn-sm px-4 rounded-pill">Login Now</a>
            </div>
          <?php } ?>
      </div>
    </div>
</div>

</body>
</html>
