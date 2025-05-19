<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>Khetibuddy - Auth</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/css/bootstrap.min.css" rel="stylesheet"/>
  <style>
    body {
      background-color: #989d93;
      color: #f8f9fa;
      font-family: 'Segoe UI', sans-serif;
    }

    .form-toggle { display: none; }
    .form-toggle.active { display: block; }

    .auth-box {
      background-color: #2a2a2a;
      padding: 30px;
      border-radius: 12px;
      box-shadow: 0 0 20px rgba(0,0,0,0.3);
      width: 100%;
      max-width: 500px;
    }

    a.text-info {
      cursor: pointer;
    }

    label {
      font-weight: 500;
    }
  </style>
</head>
<body>
  <div class="container vh-100 d-flex flex-column justify-content-center align-items-center">
    <h1 class="mb-4 text-success">Khetibuddy</h1>

    <div class="auth-box">

      <!-- Register Form -->
      <div id="registerForm" class="form-toggle active">
        <h2 class="mb-3 text-center">Register</h2>
        <form method="POST" action="{{ route('register.submit') }}">
          @csrf
          <div class="mb-3">
            <label for="name">Name</label>
            <input type="text" class="form-control" name="uname" id="name" placeholder="Enter your name" required>
          </div>

          <div class="mb-3">
            <label for="phone">Phone Number</label>
            <input type="text" class="form-control" name="uphone" id="phone" placeholder="Enter your mobile number" maxlength="10" pattern="\d{10}" required>
          </div>

          <div class="mb-3">
            <label for="email">Email address <span class="text-secondary">(Optional)</span></label>
            <input type="email" class="form-control" name="uemail" id="email" placeholder="Enter email">
          </div>

          <div class="mb-3">
            <label for="password">Password</label>
            <input type="password" class="form-control" name="upassword" id="password" placeholder="Enter password" required>
          </div>

          <div class="mb-4">
            <label for="cpassword">Confirm Password</label>
            <input type="password" class="form-control" name="ucpassword" id="cpassword" placeholder="Confirm password" required>
          </div>

          <button type="submit" class="btn btn-success w-100">Register</button>
        </form>
        <p class="mt-3 text-center">
          Already have an account?
          <a class="text-info" onclick="toggleForms()">Login</a>
        </p>
      </div>

      <!-- Login Form -->
      <div id="loginForm" class="form-toggle">
        <h2 class="mb-3 text-center">Login</h2>

         @if(session('error'))
        <div class="alert alert-danger">{{ session('error') }}</div>
      @endif


        <form action="{{ route('login.submit') }}" method="POST">
        @csrf
        <div class="mb-3">
          <label for="phone_number">Phone Number</label>
          <input type="text" class="form-control" name="phone_number" id="phone_number" 
                 value="{{ old('phone_number') }}" placeholder="Enter your mobile number"
                 maxlength="10" pattern="\d{10}" required>
          @error('phone_number') <small class="text-danger">{{ $message }}</small> @enderror
        </div>

        <div class="mb-4">
          <label for="password">Password</label>
          <input type="password" class="form-control" name="password" id="password" placeholder="Enter password" required>
          @error('password') <small class="text-danger">{{ $message }}</small> @enderror
        </div>

        <button type="submit" class="btn btn-success w-100">Login</button>
      </form>
        <p class="mt-3 text-center">
          Don't have an account?
          <a class="text-info" onclick="toggleForms()">Register</a>
        </p>
      </div>

    </div>
  </div>

  <script>
    function toggleForms() {
      const reg = document.getElementById('registerForm');
      const login = document.getElementById('loginForm');
      reg.classList.toggle('active');
      login.classList.toggle('active');
    }
  </script>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
