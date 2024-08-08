<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Masuk</title>
  
  <style>
    /* Gaya umum untuk body */
    body {
      background-color: #f4f6f9;
      font-family: Arial, sans-serif;
    }

    /* Kotak login */
    .login-box {
      width: 360px;
      margin: 7% auto;
      padding: 20px;
      background: #fff;
      border-radius: 8px;
      box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
    }

    /* Logo login */
    .login-logo {
      text-align: center;
      margin-bottom: 20px;
    }

    .login-logo b {
      font-size: 24px;
      color: #333;
    }

    /* Form login */
    .login-card-body {
      padding: 20px;
    }

    .login-box-msg {
      text-align: center;
      margin-bottom: 20px;
      font-size: 18px;
      color: #333;
    }

    .input-group {
      margin-bottom: 15px;
    }

    .form-control {
      border-radius: 4px;
      border: 1px solid #ddd;
      padding: 10px;
      font-size: 16px;
    }

    .btn-primary {
      background-color: #007bff;
      border: none;
      color: #fff;
      padding: 10px;
      font-size: 16px;
      border-radius: 4px;
      cursor: pointer;
      transition: background-color 0.3s ease;
    }

    .btn-primary:hover {
      background-color: #0056b3;
    }

    .btn-danger {
      background-color: #dc3545;
      border: none;
      color: #fff;
      padding: 10px;
      font-size: 16px;
      border-radius: 4px;
      cursor: pointer;
      transition: background-color 0.3s ease;
    }

    .btn-danger:hover {
      background-color: #c82333;
    }

    .alert {
      padding: 10px;
      margin-bottom: 20px;
      border: 1px solid transparent;
      border-radius: 4px;
    }

    .alert-danger {
      color: #721c24;
      background-color: #f8d7da;
      border-color: #f5c6cb;
    }

    .social-auth-links {
      text-align: center;
    }

    .social-auth-links a {
      display: block;
      margin-bottom: 10px;
      text-decoration: none;
      font-size: 16px;
      border-radius: 4px;
      padding: 10px;
      color: #fff;
    }

    .social-auth-links .btn-primary {
      background-color: #007bff;
    }

    .social-auth-links .btn-danger {
      background-color: #dc3545;
    }

    /* Responsif */
    @media (max-width: 767px) {
      .login-box {
        width: 90%;
        padding: 15px;
      }
    }
  </style>
</head>
<body class="hold-transition login-page">
<div class="login-box">
  <div class="login-logo">
    <b>MASUK</b>
  </div>
  <!-- /.login-logo -->
  <div class="card">
    <div class="card-body login-card-body">
      <p class="login-box-msg">Silakan masuk</p>

      <!-- Menampilkan pesan kesalahan jika login gagal -->
      <?php if (isset($_GET['error']) && $_GET['error'] == 1): ?>
        <div class="alert alert-danger" role="alert">
          Nama pengguna atau kata sandi salah.
        </div>
      <?php endif; ?>

      <!-- Form login -->
      <form action="index.php" method="POST">
        <div class="input-group mb-3">
          <input type="text" name="username" class="form-control" placeholder="Username" required>
        </div>
        <div class="input-group mb-3">
          <input type="password" name="password" class="form-control" placeholder="Password" required>
        </div>
        <div class="row">
          <div class="col-8">
            <!-- Bisa menambahkan link "Lupa kata sandi?" di sini -->
          </div>
          <!-- /.col -->
          <div class="col-4">
            <button type="submit" class="btn btn-primary btn-block">Masuk</button>
          </div>
          <!-- /.col -->
        </div>
      </form>

      <div class="social-auth-links text-center mb-3">
        <p>- ATAU -</p>
        <a href="index.php" class="btn btn-block btn-primary">
          Masuk ke Panel Admin Tanpa Login
        </a>
        <a href="index.php" class="btn btn-block btn-danger">
          Ke Tampilan End User
        </a>
      </div>
      <!-- /.social-auth-links -->

    </div>
    <!-- /.login-card-body -->
  </div>
</div>
<!-- /.login-box -->

<?php include('_part/_script.php'); ?>
</body>
</html>