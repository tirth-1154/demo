<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Select Login</title>
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600&display=swap" rel="stylesheet">
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
  <style>
    * {
      margin: 0;
      padding: 0;
      box-sizing: border-box;
      font-family: 'Poppins', sans-serif;
    }

    body {
      height: 100vh;
      background: linear-gradient(135deg, #0a0f1f, #162032, #1e3a54);
      display: flex;
      justify-content: center;
      align-items: center;
      overflow: hidden;
    }

    .container {
      display: flex;
      gap: 3rem;
      padding: 20px;
      animation: fadeIn 1.2s ease-in-out;
    }

    @keyframes fadeIn {
      from { opacity: 0; transform: translateY(20px); }
      to { opacity: 1; transform: translateY(0); }
    }

    .card {
      width: 300px;
      height: 340px;
      background: rgba(255, 255, 255, 0.08);
      border-radius: 20px;
      backdrop-filter: blur(14px);
      border: 1px solid rgba(255, 255, 255, 0.15);
      box-shadow: 0 10px 40px rgba(0,0,0,0.4);
      display: flex;
      justify-content: center;
      align-items: center;
      flex-direction: column;
      color: #fff;
      text-align: center;
      transition: all 0.35s ease;
      cursor: pointer;
      position: relative;
      overflow: hidden;
    }

    .card::before {
      content: "";
      position: absolute;
      top: -50%;
      left: -50%;
      width: 200%;
      height: 200%;
      background: radial-gradient(circle, rgba(255,215,0,0.15) 0%, transparent 60%);
      transform: scale(0);
      transition: 0.4s ease;
    }

    .card:hover::before {
      transform: scale(1);
    }

    .card:hover {
      transform: translateY(-14px) scale(1.06);
      border: 1px solid rgba(255, 255, 255, 0.35);
      box-shadow: 0 15px 45px rgba(0,0,0,0.6);
    }

    .card i {
      font-size: 75px;
      margin-bottom: 20px;
      color: #ffd700;
      transition: 0.3s ease;
    }

    .card:hover i {
      color: #fff5cc;
    }

    .card h2 {
      font-size: 26px;
      font-weight: 600;
      margin-bottom: 10px;
      letter-spacing: 1px;
    }

    .card p {
      font-size: 15px;
      opacity: 0.85;
      width: 80%;
    }

    a {
      text-decoration: none;
      color: inherit;
    }
  </style>
</head>
<body>
  <div class="container">
    <a href="clogin.php">
      <div class="card">
        <i class="material-icons">person</i>
        <h2>Client</h2>
        <p>Access client portal</p>
      </div>
    </a>

    <a href="aLogin.php">
      <div class="card">
        <i class="material-icons">admin_panel_settings</i>
        <h2>Admin</h2>
        <p>Manage system settings</p>
      </div>
    </a>
  </div>
</body>
</html>
