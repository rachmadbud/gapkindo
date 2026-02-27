@extends('layouts.app')

@section('content')
    <div class="login-wrapper">
        <div class="login-box">
            <div class="login-header">
                Apps Gapkindo
            </div>

            <div class="login-body">
                <form method="POST" action="{{ route('login') }}">
                    @csrf

                    <div class="form-group mb-3">
                        <input type="email" name="email" class="form-control @error('email') is-invalid @enderror"
                            placeholder="Email" value="{{ old('email') }}" required autofocus>
                        @error('email')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="form-group">
                        <div class="password-wrapper">
                            <input type="password" name="password" id="password" class="form-control"
                                placeholder="Password" required>

                            <span class="toggle-password" onclick="togglePassword()">
                                <!-- Eye Open -->
                                <svg id="eye-open" xmlns="http://www.w3.org/2000/svg" width="18" height="18"
                                    fill="currentColor" viewBox="0 0 16 16">
                                    <path d="M16 8s-3-5.5-8-5.5S0 8 0 8s3 5.5 8 5.5S16 8 16 8z" />
                                    <path d="M8 5a3 3 0 100 6 3 3 0 000-6z" />
                                </svg>

                                <!-- Eye Closed -->
                                <svg id="eye-closed" xmlns="http://www.w3.org/2000/svg" width="18" height="18"
                                    fill="currentColor" viewBox="0 0 16 16" style="display:none;">
                                    <path
                                        d="M13.359 11.238C14.66 10.043 16 8 16 8s-3-5.5-8-5.5a7.963 7.963 0 00-2.09.279" />
                                    <path d="M2.354 2.354l11.292 11.292" />
                                </svg>
                            </span>
                        </div>
                    </div>

                    <button type="submit" class="btn-login">
                        Sign In
                    </button>
                </form>
            </div>
        </div>
    </div>

    <script>
        function togglePassword() {
            const passwordField = document.getElementById('password');

            if (passwordField.type === "password") {
                passwordField.type = "text";
            } else {
                passwordField.type = "password";
            }
        }
    </script>
    <script>
        function togglePassword() {
            const password = document.getElementById("password");
            const eyeOpen = document.getElementById("eye-open");
            const eyeClosed = document.getElementById("eye-closed");

            if (password.type === "password") {
                password.type = "text";
                eyeOpen.style.display = "none";
                eyeClosed.style.display = "inline";
            } else {
                password.type = "password";
                eyeOpen.style.display = "inline";
                eyeClosed.style.display = "none";
            }
        }
    </script>
@endsection
