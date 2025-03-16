<!-- resources/views/login.blade.php -->

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>

    <style>
        body {
            background-color: #f8f9fa;
        }
        .login-container {
            margin-top: 100px;
        }
        .card {
            padding: 20px;
        }
    </style>
</head>
<body>

    <div class="container login-container">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card shadow-sm">
                    <div class="card-body">
                        <h2 class="card-title text-center mb-4">Login</h2>

                        <!-- Success Message -->
                        @if(session('success'))
                            <div class="alert alert-success">
                                {{ session('success') }}
                            </div>
                        @endif

                        <!-- Error Messages -->
                        @if(session('error'))
                            <div class="alert alert-danger">
                                {{ session('error') }}
                            </div>
                        @endif

                        @if ($errors->has('login'))
                            <div class="alert alert-danger">
                                {{ $errors->first('login') }}
                            </div>
                        @endif
                        
                        <!-- Login Form -->
                        <form action="{{ route('login') }}" method="POST"> <!-- Ensure this route exists -->
                            @csrf
                            <div class="mb-3">
                                <label for="loginname" class="form-label">Username</label>
                                <input name="loginname" type="text" class="form-control @error('loginname') is-invalid @enderror" id="loginname" placeholder="Enter your username" required>
                                @error('loginname')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label for="loginpassword" class="form-label">Password</label>
                                <input name="loginpassword" type="password" class="form-control @error('loginpassword') is-invalid @enderror" id="loginpassword" placeholder="Enter your password" required>
                                @error('loginpassword')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <button type="submit" class="btn btn-primary w-100">Login</button>
                        </form>

                        <div class="mt-3 text-center">
                            <p>No account yet? <a href="{{ url('/register') }}">Register here</a></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

</body>
</html>
