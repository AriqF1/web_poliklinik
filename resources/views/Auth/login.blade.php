@extends('Auth.app')
@section('content-login')
<h2>Welcome Back!</h2>
                            <p class="text-muted mb-4">Please enter your Account.</p>
                            
                            <form method="POST" action="{{ route('login.submit') }}">
                                @csrf
                                <div class="form-group">
                                    <label for="login-email" class="form-label">Email address</label>
                                    <div class="input-group">
                                        <span class="input-group-text"><i class="fas fa-envelope"></i></span>
                                        <input 
                                            type="email" 
                                            class="form-control" 
                                            id="login-email" 
                                            name="email" 
                                            placeholder="name@example.com" 
                                            required>
                                    </div>
                                </div>
                                
                                <div class="form-group">
                                    <label for="login-password" class="form-label">Password</label>
                                    <div class="input-group">
                                        <span class="input-group-text"><i class="fas fa-lock"></i></span>
                                        <input 
                                            type="password" 
                                            class="form-control" 
                                            id="login-password" 
                                            name="password" 
                                            placeholder="Enter your password" 
                                            required>
                                    </div>
                                </div>
                            
                                <div class="row mb-4">
                                    <div class="col-6"></div>
                                    <div class="col-6 text-end">
                                        <a href="#" class="text-decoration-none">Forgot password?</a>
                                    </div>
                                </div>
                            
                                <button type="submit" class="btn btn-primary w-100 mb-4">Sign in</button>
                            
                                <div class="text-center">
                                    <p>Register here...</p>
                                    <div class="d-flex justify-content-center gap-3">
                                        <a href="{{ route('register') }}" class="btn btn-outline-secondary">
                                            <i class="fas fa-user"></i> Register
                                        </a>
                                    </div>
                                </div>
                            </form>
                            
@endsection