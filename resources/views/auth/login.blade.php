<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>Login - Khetibuddy</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/css/bootstrap.min.css" rel="stylesheet"/>
  <style>
    body {
      background-color: #1c1c1c;
      color: #f8f9fa;
      font-family: 'Segoe UI', sans-serif;
    }

    .auth-box {
      background-color: #2a2a2a;
      padding: 30px;
      border-radius: 12px;
      box-shadow: 0 0 20px rgba(0,0,0,0.3);
      width: 100%;
      max-width: 500px;
    }

    label {
      font-weight: 500;
    }

    .text-danger {
      font-size: 0.875rem;
    }

    a.text-info {
      cursor: pointer;
    }
  </style>
</head>
<body>
  <div class="container vh-100 d-flex flex-column justify-content-center align-items-center">
    <h1 class="mb-4">Khetibuddy</h1>

    <div class="auth-box">

      <h2 class="mb-3 text-center">Login</h2>

     
      

      <p class="mt-3 text-center">
        Don't have an account? 
        <a href="{{ route('register') }}" class="text-info">Register</a>
      </p>
    </div>
  </div>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
