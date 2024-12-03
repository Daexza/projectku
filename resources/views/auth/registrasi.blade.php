<!doctype html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Register</title>
  <link rel="stylesheet" href="{{ asset('assets/css/styles.min.css') }}">
</head>
<body>
  <div class="d-flex justify-content-center align-items-center min-vh-100 bg-light">
    <div class="card p-4 shadow-sm" style="width: 450px;">
      <h3 class="text-center mb-4">Create Account</h3>

      @if ($errors->any())
      <div class="alert alert-danger">
        <ul>
          @foreach ($errors->all() as $error)
          <li>{{ $error }}</li>
          @endforeach
        </ul>
      </div>
      @endif

      @if (session('success'))
      <div class="alert alert-success">
        {{ session('success') }}
      </div>
      @endif

      <form action="{{ route('register') }}" method="POST">
        @csrf
        <div class="mb-3">
          <label for="name" class="form-label">Full Name</label>
          <input type="text" class="form-control" id="name" name="name"
                 placeholder="Enter your full name"
                 value="{{ old('name') }}"
                 required
                 pattern="[A-Za-z\s]+"
                 title="Name should contain only letters and spaces">
        </div>
        <div class="mb-3">
          <label for="email" class="form-label">Email</label>
          <input type="email" class="form-control" id="email" name="email"
                 placeholder="Enter email"
                 value="{{ old('email') }}"
                 required>
        </div>
        <div class="mb-3">
          <label for="password" class="form-label">Password</label>
          <input type="password" class="form-control" id="password" name="password"
                 placeholder="Create password"
                 required
                 minlength="8"
                 title="Password must be at least 8 characters long">
        </div>
        <div class="mb-3">
          <label for="password_confirmation" class="form-label">Confirm Password</label>
          <input type="password" class="form-control" id="password_confirmation"
                 name="password_confirmation"
                 placeholder="Repeat password"
                 required>
        </div>
        <div class="mb-3 form-check">
          <input type="checkbox" class="form-check-input" id="terms" name="terms" required>
          <label class="form-check-label" for="terms">
            I agree to the terms and conditions
          </label>
        </div>
        <div class="d-grid">
          <button type="submit" class="btn btn-primary">Register</button>
        </div>
        <div class="text-center mt-3">
          <p>Already have an account? <a href="{{ route('login') }}">Login</a></p>
        </div>
      </form>
    </div>
  </div>
  <script src="{{ asset('assets/js/custom.js') }}"></script>
</body>
</html>
