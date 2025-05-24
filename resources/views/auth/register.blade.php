<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>Khetibuddy - Register</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/css/bootstrap.min.css" rel="stylesheet" />
  <style>
    body {
      background: linear-gradient(to right, #a8edea, #fed6e3);
      font-family: 'Segoe UI', sans-serif;
      margin: 0;
      padding: 0;
      height: 100vh;
      display: flex;
      justify-content: center;
      align-items: center;
    }

    .register-wrapper {
      width: 75%;
      max-width: 900px;
      background: #ffffff;
      box-shadow: 0 8px 24px rgba(0, 0, 0, 0.15);
      border-radius: 16px;
      padding: 40px;
    }

    .brand {
      font-size: 32px;
      font-weight: bold;
      color: #28a745;
      text-align: center;
      margin-bottom: 30px;
    }

    .form-title {
      font-size: 22px;
      font-weight: 600;
      color: #444;
      text-align: center;
      margin-bottom: 20px;
    }

    label {
      font-weight: 500;
      color: #333;
    }

    .form-control {
      border-radius: 10px;
      padding: 10px 14px;
      font-size: 15px;
    }

    .btn-success {
      border-radius: 10px;
      padding: 10px;
      font-size: 16px;
    }

    .text-info {
      color: #28a745 !important;
      cursor: pointer;
    }

    .text-info:hover {
      text-decoration: underline;
    }

    .alert ul {
      margin-bottom: 0;
    }

    @media (max-width: 768px) {
      .register-wrapper {
        width: 95%;
        padding: 30px 20px;
      }
    }
  </style>
</head>
<body>

  <div class="register-wrapper">
    <div class="brand">Khetibuddy</div>

    <div class="form-title">Register</div>

    @if ($errors->any())
      <div class="alert alert-danger">
        <ul class="mb-0">
          @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
          @endforeach
        </ul>
      </div>
    @endif

    <form method="POST" action="{{ route('register.submit') }}">
      @csrf
      <div class="mb-3">
        <label for="name">Name</label>
        <input type="text" class="form-control" name="uname" id="name" required value="{{ old('uname') }}">
      </div>
      <div class="mb-3">
        <label for="phone">Phone Number</label>
        <input type="text" class="form-control" name="uphone" id="phone" required maxlength="10" value="{{ old('uphone') }}">
      </div>
      <div class="mb-3">
        <label for="email">Email <span class="text-muted">(Optional)</span></label>
        <input type="email" class="form-control" name="uemail" id="email" value="{{ old('uemail') }}">
      </div>
      <div class="mb-3">
        <label for="password">Password</label>
        <input type="password" class="form-control" name="upassword" id="password" required>
      </div>
      <div class="mb-4">
        <label for="cpassword">Confirm Password</label>
        <input type="password" class="form-control" name="ucpassword" id="cpassword" required>
      </div>
      <button type="submit" class="btn btn-success w-100">Register</button>
    </form>

    <p class="mt-3 text-center">
      Already have an account? <a class="text-info" onclick="window.location.href='{{ route('login') }}'">Login</a>
    </p>
  </div>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
