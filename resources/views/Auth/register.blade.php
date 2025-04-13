@extends('Auth.app')
@section('content-register')
<h2>Create Account</h2>
                            <p class="text-muted mb-4">Join MedConnect and start your health journey today.</p>
                            
                            <div class="alert alert-success d-flex align-items-center" role="alert">
                                <i class="fas fa-shield-alt me-2"></i>
                                <div>Your health data is protected with medical-grade security</div>
                            </div>
                            
                            <form>
                                <div class="row">
                                    <div class="col-md-6 form-group">
                                        <label for="register-firstname" class="form-label">First Name</label>
                                        <input type="text" class="form-control" id="register-firstname" placeholder="First name" required>
                                    </div>
                                    <div class="col-md-6 form-group">
                                        <label for="register-lastname" class="form-label">Last Name</label>
                                        <input type="text" class="form-control" id="register-lastname" placeholder="Last name" required>
                                    </div>
                                </div>
                                
                                <div class="form-group">
                                    <label for="register-email" class="form-label">Email address</label>
                                    <div class="input-group">
                                        <span class="input-group-text"><i class="fas fa-envelope"></i></span>
                                        <input type="email" class="form-control" id="register-email" placeholder="name@example.com" required>
                                    </div>
                                </div>
                                
                                <div class="form-group">
                                    <label for="register-password" class="form-label">Password</label>
                                    <div class="input-group">
                                        <span class="input-group-text"><i class="fas fa-lock"></i></span>
                                        <input type="password" class="form-control" id="register-password" placeholder="Create a password" required>
                                    </div>
                                    <div class="form-text">Must be at least 8 characters with letters and numbers</div>
                                </div>
                                
                                <div class="form-group">
                                    <label for="register-password-confirm" class="form-label">Confirm Password</label>
                                    <div class="input-group">
                                        <span class="input-group-text"><i class="fas fa-lock"></i></span>
                                        <input type="password" class="form-control" id="register-password-confirm" placeholder="Confirm your password" required>
                                    </div>
                                </div>                              
                                <button type="submit" class="btn btn-primary w-100 mb-4">Create Account</button>
                            </form>
@endsection