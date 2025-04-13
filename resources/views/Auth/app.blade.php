<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>MedConnect - Login & Register</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet">
    <style>
        :root {
            --primary-color: #1a8cff;
            --secondary-color: #e6f2ff;
            --accent-color: #66b3ff;
            --success-color: #28a745;
            --text-color: #333;
        }
        
        body {
            background-color: #f8f9fa;
            color: var(--text-color);
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        }
        
        .auth-container {
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 20px;
        }
        
        .auth-card {
            border-radius: 15px;
            box-shadow: 0 8px 20px rgba(0, 0, 0, 0.1);
            overflow: hidden;
            max-width: 900px;
            width: 100%;
        }
        
        .auth-sidebar {
            background: linear-gradient(135deg, var(--primary-color), var(--accent-color));
            padding: 40px;
            color: white;
            display: flex;
            flex-direction: column;
            justify-content: center;
        }
        
        .auth-sidebar img {
            max-width: 80%;
            margin: 0 auto 30px;
        }
        
        .auth-form {
            padding: 40px;
            background-color: white;
        }
        
        .auth-form h2 {
            color: var(--primary-color);
            margin-bottom: 25px;
            font-weight: 600;
        }
        
        .form-control {
            padding: 12px;
            border-radius: 8px;
            border: 1px solid #ced4da;
            margin-bottom: 20px;
        }
        
        .form-control:focus {
            border-color: var(--accent-color);
            box-shadow: 0 0 0 0.2rem rgba(102, 179, 255, 0.25);
        }
        
        .btn-primary {
            background-color: var(--primary-color);
            border-color: var(--primary-color);
            border-radius: 8px;
            padding: 12px;
            font-weight: 600;
            text-transform: uppercase;
            letter-spacing: 1px;
        }
        
        .btn-primary:hover {
            background-color: var(--accent-color);
            border-color: var(--accent-color);
        }
        
        .form-check-input:checked {
            background-color: var(--primary-color);
            border-color: var(--primary-color);
        }
        
        .tab-content {
            padding-top: 20px;
        }
        
        .nav-pills .nav-link {
            border-radius: 8px;
            padding: 10px 20px;
            font-weight: 600;
            color: var(--text-color);
        }
        
        .nav-pills .nav-link.active {
            background-color: var(--primary-color);
            color: white;
        }
        
        .form-group {
            margin-bottom: 15px;
        }
        
        .health-features {
            margin-top: 30px;
        }
        
        .health-feature-item {
            display: flex;
            align-items: center;
            margin-bottom: 15px;
        }
        
        .health-feature-item i {
            color: white;
            margin-right: 15px;
            font-size: 1.25rem;
        }
        
        .alert-success {
            background-color: rgba(40, 167, 69, 0.1);
            border-color: var(--success-color);
            color: var(--success-color);
            border-radius: 8px;
            padding: 12px;
            margin-bottom: 20px;
        }
        
        @media (max-width: 767.98px) {
            .auth-sidebar {
                padding: 30px;
            }
            
            .auth-form {
                padding: 30px;
            }
        }
    </style>
</head>
<body>
    <div class="auth-container">
        <div class="auth-card">
            <div class="row g-0">
                <div class="col-md-5 auth-sidebar d-none d-md-flex">
                    <div>
                        <h1 class="mb-4">MedConnect</h1>
                        <p class="lead mb-4">Your digital health companion for better health management and professional care.</p>
                        
                        <div class="health-features">
                            <div class="health-feature-item">
                                <i class="fas fa-calendar-check"></i>
                                <span>Easy appointment scheduling</span>
                            </div>
                            <div class="health-feature-item">
                                <i class="fas fa-file-medical"></i>
                                <span>Access medical records securely</span>
                            </div>
                            <div class="health-feature-item">
                                <i class="fas fa-user-md"></i>
                                <span>Connect with health professionals</span>
                            </div>
                            <div class="health-feature-item">
                                <i class="fas fa-pills"></i>
                                <span>Medication</span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-7 auth-form">
                    <div class="tab-content" id="authTabsContent">
                        <div class="tab-pane fade {{ request()->routeIs('login') ? 'show active' : '' }}" id="login" role="tabpanel">
                            @yield('content-login')
                        </div>
                        <div class="tab-pane fade {{ request()->routeIs('register') ? 'show active' : '' }}" id="register" role="tabpanel">
                            @yield('content-register')
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap JS and dependencies -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/js/bootstrap.bundle.min.js"></script>
</body>
</html>