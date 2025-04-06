<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Change Password</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Arial', sans-serif;
        }

        body {
            background-color: #f5f5f5;
        }

        .header {
            background: #007bff;
            color: white;
            padding: 20px 15px;
            position: relative;
        }

        .back-button {
            display: flex;
            align-items: center;
            gap: 5px;
            color: white;
            text-decoration: none;
            margin-bottom: 15px;
        }

        .container {
            padding: 20px;
            max-width: 600px;
            margin: 0 auto;
        }

        .card {
            background: white;
            border-radius: 10px;
            padding: 20px;
            box-shadow: 0 2px 5px rgba(0,0,0,0.1);
        }

        .form-group {
            margin-bottom: 20px;
        }

        .form-group label {
            display: block;
            margin-bottom: 8px;
            color: #333;
            font-size: 14px;
        }

        .password-input-container {
            position: relative;
        }

        .password-input {
            width: 100%;
            padding: 12px;
            border: 1px solid #ddd;
            border-radius: 5px;
            font-size: 16px;
            padding-right: 40px;
        }

        .password-input:focus {
            border-color: #007bff;
            outline: none;
        }

        .toggle-password {
            position: absolute;
            right: 10px;
            top: 50%;
            transform: translateY(-50%);
            background: none;
            border: none;
            cursor: pointer;
            color: #666;
            font-size: 18px;
        }

        .password-strength {
            margin-top: 8px;
            font-size: 12px;
        }

        .strength-meter {
            height: 4px;
            background: #eee;
            border-radius: 2px;
            margin-top: 5px;
            overflow: hidden;
        }

        .strength-fill {
            height: 100%;
            width: 0%;
            transition: width 0.3s ease;
        }

        .weak {
            background: #dc3545;
            width: 33%;
        }

        .medium {
            background: #ffc107;
            width: 66%;
        }

        .strong {
            background: #28a745;
            width: 100%;
        }

        .requirements {
            margin-top: 8px;
            font-size: 12px;
            color: #666;
        }

        .requirement {
            display: flex;
            align-items: center;
            gap: 5px;
            margin-top: 4px;
        }

        .requirement.met {
            color: #28a745;
        }

        .submit-button {
            width: 100%;
            padding: 12px;
            background: #007bff;
            color: white;
            border: none;
            border-radius: 5px;
            font-size: 16px;
            cursor: pointer;
            transition: background 0.3s;
        }

        .submit-button:disabled {
            background: #ccc;
            cursor: not-allowed;
        }

        .submit-button:hover:not(:disabled) {
            background: #0056b3;
        }

        .alert {
            padding: 10px 15px;
            border-radius: 5px;
            margin-bottom: 20px;
            font-size: 14px;
        }

        .alert-success {
            background: #d4edda;
            color: #155724;
            border: 1px solid #c3e6cb;
        }

        .alert-error {
            background: #f8d7da;
            color: #721c24;
            border: 1px solid #f5c6cb;
        }
    </style>
</head>
<body>
    <div class="header">
        <a href="#" class="back-button">
            ← Back to Profile
        </a>
        <h1>Change Password</h1>
    </div>

    <div class="container">
        <!-- Success Message (hidden by default) -->
        <div class="alert alert-success" style="display: none;">
            Password successfully changed!
        </div>

        <!-- Error Message (hidden by default) -->
        <div class="alert alert-error" style="display: none;">
            Current password is incorrect. Please try again.
        </div>

        <div class="card">
            <form id="changePasswordForm">
                <div class="form-group">
                    <label for="currentPassword">Current Password</label>
                    <div class="password-input-container">
                        <input type="password" id="currentPassword" class="password-input" required>
                        <button type="button" class="toggle-password">👁️</button>
                    </div>
                </div>

                <div class="form-group">
                    <label for="newPassword">New Password</label>
                    <div class="password-input-container">
                        <input type="password" id="newPassword" class="password-input" required>
                        <button type="button" class="toggle-password">👁️</button>
                    </div>
                    <div class="password-strength">
                        Password Strength:
                        <div class="strength-meter">
                            <div class="strength-fill"></div>
                        </div>
                    </div>
                    <div class="requirements">
                        Password requirements:
                        <div class="requirement" id="length">• Minimum 8 characters</div>
                        <div class="requirement" id="uppercase">• At least one uppercase letter</div>
                        <div class="requirement" id="lowercase">• At least one lowercase letter</div>
                        <div class="requirement" id="number">• At least one number</div>
                        <div class="requirement" id="special">• At least one special character</div>
                    </div>
                </div>

                <div class="form-group">
                    <label for="confirmPassword">Confirm New Password</label>
                    <div class="password-input-container">
                        <input type="password" id="confirmPassword" class="password-input" required>
                        <button type="button" class="toggle-password">👁️</button>
                    </div>
                </div>

                <button type="submit" class="submit-button" disabled>Change Password</button>
            </form>
        </div>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const form = document.getElementById('changePasswordForm');
            const newPassword = document.getElementById('newPassword');
            const confirmPassword = document.getElementById('confirmPassword');
            const submitButton = document.querySelector('.submit-button');
            const strengthFill = document.querySelector('.strength-fill');
            
            // Toggle password visibility
            document.querySelectorAll('.toggle-password').forEach(button => {
                button.addEventListener('click', function() {
                    const input = this.previousElementSibling;
                    if (input.type === 'password') {
                        input.type = 'text';
                        this.textContent = '🔒';
                    } else {
                        input.type = 'password';
                        this.textContent = '👁️';
                    }
                });
            });

            // Check password strength
            function checkPasswordStrength(password) {
                let strength = 0;
                const requirements = {
                    length: password.length >= 8,
                    uppercase: /[A-Z]/.test(password),
                    lowercase: /[a-z]/.test(password),
                    number: /[0-9]/.test(password),
                    special: /[^A-Za-z0-9]/.test(password)
                };

                // Update requirement indicators
                Object.keys(requirements).forEach(req => {
                    const element = document.getElementById(req);
                    if (requirements[req]) {
                        element.classList.add('met');
                        strength++;
                    } else {
                        element.classList.remove('met');
                    }
                });

                // Update strength meter
                strengthFill.className = 'strength-fill';
                if (strength < 2) strengthFill.classList.add('weak');
                else if (strength < 4) strengthFill.classList.add('medium');
                else strengthFill.classList.add('strong');

                // Enable/disable submit button
                submitButton.disabled = strength < 4 || password !== confirmPassword.value;
            }

            newPassword.addEventListener('input', () => {
                checkPasswordStrength(newPassword.value);
            });

            confirmPassword.addEventListener('input', () => {
                checkPasswordStrength(newPassword.value);
            });

            // Form submission
            form.addEventListener('submit', function(e) {
                e.preventDefault();
                
                // Show success message (in real implementation, this would be after API response)
                const successAlert = document.querySelector('.alert-success');
                successAlert.style.display = 'block';
                
                // Reset form
                setTimeout(() => {
                    form.reset();
                    successAlert.style.display = 'none';
                    strengthFill.className = 'strength-fill';
                    document.querySelectorAll('.requirement').forEach(req => {
                        req.classList.remove('met');
                    });
                    submitButton.disabled = true;
                }, 2000);
            });
        });
    </script>
</body>
</html>
