<html>
<head>
    <title>Register</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <style>
        body {
            background-image: url('https://cf.bstatic.com/xdata/images/hotel/max1024x768/479121921.jpg?k=60615d0bedc0821238464b035f543726343a5953275e85ec97f25940d939cd9e&o=&hp=1');
            background-size: cover;
            background-position: center;
            background-repeat: no-repeat;
            height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
        }
        .register-container {
            width: 100%;
            max-width: 800px;
            padding: 20px;
            background-color: rgba(255, 255, 255, 0.8);
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
        .register-container h2 {
            text-align: center;
            margin-bottom: 20px;
            font-weight: 500;
        }
        .form-check-label a {
            color: #007bff;
            text-decoration: none;
        }
        .form-check-label a:hover {
            text-decoration: underline;
        }
    </style>
</head>
<body>
    <div class="register-container">
        <h2>Create Account</h2>
        <form>
            <div class="row">
                <div class="col-md-6">
                    <div class="mb-3">
                        <label for="fullName" class="form-label">Full Name</label>
                        <input type="text" class="form-control" id="fullName" placeholder="Enter your full name">
                    </div>
                    <div class="mb-3">
                        <label for="phoneNumber" class="form-label">Phone Number</label>
                        <input type="text" class="form-control" id="phoneNumber" placeholder="Enter your phone number">
                    </div>
                    <div class="mb-3">
                        <label for="address" class="form-label">Address</label>
                        <textarea class="form-control" id="address" rows="3" placeholder="Enter your address"></textarea>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="mb-3">
                        <label for="email" class="form-label">Email</label>
                        <input type="email" class="form-control" id="email" placeholder="Enter email">
                    </div>
                    <div class="mb-3">
                        <label for="password" class="form-label">Password</label>
                        <input type="password" class="form-control" id="password" placeholder="Create password">
                    </div>
                    <div class="mb-3">
                        <label for="confirmPassword" class="form-label">Confirm Password</label>
                        <input type="password" class="form-control" id="confirmPassword" placeholder="Repeat password">
                    </div>
                    <div class="mb-3">
                        <label for="role" class="form-label">Role</label>
                        <select class="form-select" id="role">
                            <option selected>Select Role</option>
                            <option value="1">User</option>
                            <option value="2">Admin</option>
                        </select>
                    </div>
                </div>
            </div>
            <div class="mb-3 form-check">
                <input type="checkbox" class="form-check-input" id="terms">
                <label class="form-check-label" for="terms">I agree to the terms and conditions</label>
            </div>
            <button type="submit" class="btn btn-primary w-100">Register</button>
        </form>
        <div class="text-center mt-3">
            <p>Already have an account? <a href="{{ route('login') }}">Login</a></p>
        </div>
    </div>
</body>
</html>














{{-- <!doctype html>
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
          <label for="full_name" class="form-label">Full Name</label>
          <input type="text" class="form-control @error('full_name') is-invalid @enderror"
                 id="full_name"
                 name="full_name"
                 placeholder="Enter your full name"
                 value="{{ old('full_name') }}"
                 required
                 minlength="2"
                 maxlength="100">
          @error('full_name')
            <div class="invalid-feedback">{{ $message }}</div>
          @enderror
        </div>

        <div class="mb-3">
          <label for="phone_number" class="form-label">Phone Number</label>
          <input type="tel" class="form-control @error('phone_number') is-invalid @enderror"
                 id="phone_number"
                 name="phone_number"
                 placeholder="Enter your phone number"
                 value="{{ old('phone_number') }}"
                 maxlength="20">
          @error('phone_number')
            <div class="invalid-feedback">{{ $message }}</div>
          @enderror
        </div>

        <div class="mb-3">
          <label for="address" class="form-label">Address</label>
          <textarea class="form-control @error('address') is-invalid @enderror"
                    id="address"
                    name="address"
                    placeholder="Enter your address"
                    rows="3">{{ old('address') }}</textarea>
          @error('address')
            <div class="invalid-feedback">{{ $message }}</div>
          @enderror
        </div>

        <div class="mb-3">
          <label for="email" class="form-label">Email</label>
          <input type="email" class="form-control @error('email') is-invalid @enderror"
                 id="email"
                 name="email"
                 placeholder="Enter email"
                 value="{{ old('email') }}"
                 required>
          @error('email')
            <div class="invalid-feedback">{{ $message }}</div>
          @enderror
        </div>

        <div class="mb-3">
          <label for="password" class="form-label">Password</label>
          <input type="password" class="form-control @error('password') is-invalid @enderror"
                 id="password"
                 name="password"
                 placeholder="Create password"
                 required
                 minlength="8">
          @error('password')
            <div class="invalid-feedback">{{ $message }}</div>
          @enderror
        </div>

        <div class="mb-3">
          <label for="password_confirmation" class="form-label">Confirm Password</label>
          <input type="password" class="form-control"
                 id="password_confirmation"
                 name="password_confirmation"
                 placeholder="Repeat password"
                 required
                 minlength="8">
        </div>

        <div class="mb-3">
          <label for="role" class="form-label">Role</label>
          <select class="form-control @error('role') is-invalid @enderror" id="role" name="role" required>
              <option value="">Select Role</option>
              <option value="admin" {{ old('role') == 'admin' ? 'selected' : '' }}>Admin</option>
              <option value="manager" {{ old('role') == 'manager' ? 'selected' : '' }}>Manager</option>
              <option value="user" {{ old('role') == 'user' ? 'selected' : '' }}>User </option>
          </select>
          @error('role')
              <div class="invalid-feedback">{{ $message }}</div>
          @enderror
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
</body>
</html> --}}
