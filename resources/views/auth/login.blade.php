<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <style>
        body, html {
            height: 100%;
            margin: 0;
            font-family: 'Arial', sans-serif;
        }
        .bg {
            background-image: url('https://cf.bstatic.com/xdata/images/hotel/max1024x768/479121921.jpg?k=60615d0bedc0821238464b035f543726343a5953275e85ec97f25940d939cd9e&o=&hp=1');
            height: 100%;
            background-position: center;
            background-repeat: no-repeat;
            background-size: cover;
            position: relative;
        }
        .login-container {
            position: absolute;
            right: 0;
            top: 0;
            height: 100%;
            width: 35%;
            background-color: rgba(255, 255, 255, 0.9);
            padding: 3rem;
            box-shadow: -2px 0 5px rgba(0,0,0,0.1);
            display: flex;
            flex-direction: column;
            justify-content: center;
        }
        .login-container h2 {
            font-weight: bold;
            margin-bottom: 2rem;
        }
        .login-container .form-control {
            margin-bottom: 1.5rem;
        }
        .login-container .btn-primary {
            background: linear-gradient(to right, #4facfe, #00f2fe);
            border: none;
            padding: 0.75rem;
            font-size: 1rem;
        }
        .login-container .social-login {
            display: flex;
            justify-content: space-around;
            margin-top: 1.5rem;
        }
        .login-container .social-login a {
            width: 45px;
            height: 45px;
            display: flex;
            align-items: center;
            justify-content: center;
            border-radius: 50%;
            color: white;
            font-size: 1.2rem;
        }
        .login-container .social-login a.facebook {
            background-color: #3b5998;
        }
        .login-container .social-login a.twitter {
            background-color: #1da1f2;
        }
        .login-container .social-login a.google {
            background-color: #db4437;
        }
        .bg-text {
            position: absolute;
            top: 50%;
            left: 10%;
            transform: translateY(-50%);
            color: white;
            font-size: 2.5rem;
            text-align: left;
            font-weight: bold;
            text-shadow: 2px 2px 4px rgba(0,0,0,0.5);
            max-width: 50%;
        }
    </style>
</head>
<body>
    <div class="bg">
        <div class="bg-text">
            Explore Attractions, Find Perfect Stays with BExplore!
        </div>
        <div class="login-container">
            <h2>Login</h2>
            <form>
                <div class="mb-3">
                    <label for="email" class="form-label">Email</label>
                    <div class="input-group">
                        <span class="input-group-text"><i class="fas fa-user"></i></span>
                        <input type="email" class="form-control" id="email" placeholder="Type your email">
                    </div>
                </div>
                <div class="mb-3">
                    <label for="password" class="form-label">Password</label>
                    <div class="input-group">
                        <span class="input-group-text"><i class="fas fa-lock"></i></span>
                        <input type="password" class="form-control" id="password" placeholder="Type your password">
                    </div>
                </div>
                <div class="d-flex justify-content-between align-items-center mb-3">
                    <a href="#" class="text-decoration-none">Forgot password?</a>
                </div>
                <button type="submit" class="btn btn-primary w-100">LOGIN</button>
            </form>
            <div class="text-center mt-4">
                <p>Or Sign Up Using</p>
                <div class="social-login">
                    <a href="#" class="facebook"><i class="fab fa-facebook-f"></i></a>
                    <a href="#" class="twitter"><i class="fab fa-twitter"></i></a>
                    <a href="#" class="google"><i class="fab fa-google"></i></a>
                </div>
            </div>
            <div class="text-center mt-4">
                <p>Don't have an account?</p>
                <a href="{{ route('register') }}" class="txt2"> SIGN UP</a>
            </div>
        </div>
    </div>
</body>
</html>
