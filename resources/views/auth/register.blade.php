<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>Khetibuddy - Auth</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/css/bootstrap.min.css" rel="stylesheet" />
  <style>
    html, body {
      height: 100%;
      margin: 0;
      font-family: 'Segoe UI', sans-serif;
      background: linear-gradient(to right, #a8edea, #fed6e3);
      display: flex;
      justify-content: center;
      align-items: center;
      padding: 20px;  
    }

    .container-wrapper {
      width: 900px;
      background: white;
      box-shadow: 0 8px 24px rgba(0,0,0,0.15);
      border-radius: 12px;
      overflow: hidden;
      position: relative;
    }

    .auth-container {
      width: 1800px;
      display: flex;
      transition: transform 0.6s ease;
    }

    .auth-container.slide-left {
      transform: translateX(-900px);
    }

    .left-pane, .right-pane {
      width: 900px;
      padding: 40px 50px;
      box-sizing: border-box;
      display: flex;
      flex-direction: column;
    }

    .left-pane {
      background: url('https://via.placeholder.com/450x600?text=Welcome') no-repeat center center;
      background-size: cover;
    }

    .right-pane {
      background: white;
      justify-content: center;
      transition: all 0.5s ease;
    }

    .form-toggle {
      display: none;
    }

    .form-toggle.active {
      display: block;
      animation: fadeIn 0.5s ease;
    }

    @keyframes fadeIn {
      from { opacity: 0; transform: translateY(20px); }
      to { opacity: 1; transform: translateY(0); }
    }

    .brand {
      font-size: 28px;
      font-weight: bold;
      color: #28a745;
      text-align: center;
      margin-bottom: 30px;
    }

    .form-title {
      text-align: center;
      font-weight: 600;
      margin-bottom: 20px;
      color: #333;
    }

    .form-control {
      border-radius: 8px;
    }

    .btn-success {
      border-radius: 8px;
    }

    a.text-info {
      cursor: pointer;
      text-decoration: underline;
    }
  </style>
</head>
<body>
  

<div class="container-wrapper" id="containerWrapper">
  {{-- <div id="authContainer" class="auth-container {{ session('form') === 'login' ? 'slide-left' : '' }}"> --}}
    <div class="left-pane"></div>

    <div class="right-pane" id="formPane">
      <div class="brand">Khetibuddy</div>

      <!-- Register Form -->
      <div id="registerForm" class="form-toggle {{ session('form') !== 'login' ? 'active' : '' }}"> 
        <h2 class="form-title">Register</h2>
        @if ($errors->any() && session('form') !== 'login')
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
        <p class="mt-3 text-center">Already have an account?
          <a class="text-info" onclick="toggleForms()">Login</a>
        </p>
      </div>

      <!-- Login Form -->
      <div id="loginForm" class="form-toggle {{ session('form') === 'login' ? 'active' : '' }}">
        <h2 class="form-title">Login</h2>
        @if(session('error'))
          <div class="alert alert-danger">{{ session('error') }}</div>
        @endif
        @if ($errors->any() && session('form') === 'login')
          <div class="alert alert-danger">
            <ul class="mb-0">
              @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
              @endforeach
            </ul>
          </div>
        @endif
        <form method="POST" action="{{ route('login.submit') }}">
          @csrf
          <div class="mb-3">
            <label for="phone_number">Phone Number</label>
            <input type="text" class="form-control" name="phone_number" id="phone_number" value="{{ old('phone_number') }}" required maxlength="10">
          </div>
          <div class="mb-4">
            <label for="loginPassword">Password</label>
            <input type="password" class="form-control" name="password" id="loginPassword" required>
          </div>
          <button type="submit" class="btn btn-success w-100">Login</button>
        </form>
        <p class="mt-3 text-center">Don't have an account?
          <a class="text-info" onclick="toggleForms()">Register</a>
        </p>
      </div>
    </div>
  </div>
</div>

<script>
  function toggleForms() {
    const registerForm = document.getElementById('registerForm');
    const loginForm = document.getElementById('loginForm');
    const container = document.getElementById('authContainer');

    registerForm.classList.toggle('active');
    loginForm.classList.toggle('active');
    container.classList.toggle('slide-left');
  }
</script>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
