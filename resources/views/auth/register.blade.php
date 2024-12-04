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
</html>
