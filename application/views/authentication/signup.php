<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<meta content="Codescandy" name="author">
    <title>Sign Up | CU - Facilities Reservation System</title>
<link rel="stylesheet" href="<?php echo base_url()?>assets/libs/swiper/swiper-bundle.min.css">
<link rel="apple-touch-icon" href="<?php echo base_url()?>assets/images/favicon/favicon.png">
<link rel="shortcut icon" type="image/png" href="<?php echo base_url()?>assets/images/favicon/favicon.png">

<meta name="msapplication-TileColor" content="#ffffff">
<meta name="msapplication-TileImage" content="<?php echo base_url()?>assets/images/favicon/ms-icon-144x144.png">
<meta name="theme-color" content="#ffffff">
<script src="https://www.google.com/recaptcha/api.js" async defer></script>
<!-- Color modes -->
<script>
  // Check for saved theme preference or default to 'light'
  const getStoredTheme = () => localStorage.getItem('theme')
  const getPreferredTheme = () => {
    const storedTheme = getStoredTheme()
    if (storedTheme) {
      return storedTheme
    }
    return 'light'
  }
  
  const setTheme = theme => {
    if (theme === 'auto' && window.matchMedia('(prefers-color-scheme: dark)').matches) {
      document.documentElement.setAttribute('data-bs-theme', 'dark')
    } else {
      document.documentElement.setAttribute('data-bs-theme', theme)
    }
  }
  
  // Force light theme as default if no theme is stored
  if (!getStoredTheme()) {
    localStorage.setItem('theme', 'light')
  }
  setTheme(getPreferredTheme())
</script>
<script src="<?php echo base_url()?>assets/js/vendors/color-modes.js"></script>
<script>
  // Ensure light theme is set as default after external scripts load
  if (!localStorage.getItem('theme')) {
    localStorage.setItem('theme', 'light')
    document.documentElement.setAttribute('data-bs-theme', 'light')
  }
  
  if (localStorage.getItem('sidebarExpanded') === 'false') {
    document.documentElement.classList.add('collapsed');
    document.documentElement.classList.remove('expanded');
  } else {
    document.documentElement.classList.remove('collapsed');
    document.documentElement.classList.add('expanded');
  }
</script>
<!-- Libs CSS -->
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Dancing+Script:wght@400..700&family=Figtree:ital,wght@0,300..900;1,300..900&family=Montserrat:ital,wght@0,100..900;1,100..900&family=Pacifico&display=swap" rel="stylesheet">
<link rel="stylesheet" href="<?php echo base_url()?>assets/libs/simplebar/dist/simplebar.min.css">
<link rel="stylesheet" href="<?php echo base_url()?>assets/libs/%40tabler/icons-webfont/tabler-icons.min.css">

<!-- Theme CSS -->
<link rel="stylesheet" href="<?php echo base_url()?>assets/css/theme.min.css">

<!-- Custom CSS for theme-based logo -->
<style>
/* Show white logo in light mode, hide black logo */
[data-bs-theme="light"] .logo-dark {
  display: none !important;
}

[data-bs-theme="light"] .logo-light {
  display: block !important;
}

/* Show black logo in dark mode, hide white logo */
[data-bs-theme="dark"] .logo-light {
  display: none !important;
}

[data-bs-theme="dark"] .logo-dark {
  display: block !important;
}

/* Prevent checkbox validation styling */
.was-validated .form-check-input:valid,
.was-validated .form-check-input:invalid,
.form-check-input.is-valid,
.form-check-input.is-invalid {
  border-color: var(--bs-border-color) !important;
  background-color: transparent !important;
  background-image: none !important;
}

.was-validated .form-check-input:checked {
  background-color: #0d6efd !important;
  border-color: #0d6efd !important;
}
</style>

  </head>

  <body>
    <main class="d-flex flex-column justify-content-center min-vh-100 py-4">
      <!--Sign up start-->
      <section>
        <div class="container">
          <div class="row mb-8">
            <div class="col-xl-4 offset-xl-4 col-md-12 col-12 mt-8">
              <div class="text-center">
                <a class='fs-2 fw-bold d-flex align-items-center gap-2 justify-content-center mb-6'>
                  <img src="<?php echo base_url()?>assets/images/brand/cu_logo_white.png" alt="" width="70%" height="100%" class="mb-4 logo-light">
                  <img src="<?php echo base_url()?>assets/images/brand/cu_logo_black.png" alt="" width="70%" height="100%" class="mb-4 logo-dark">
                </a>
                <h5 class="mb-1">Welcome to CU Facilities Reservation System</h5>
                <p class="mb-0">
                  Already have an account?
                  <a class='text-info' href="<?php echo base_url()?>auth/signin">Signin here</a>
                </p>
              </div>
            </div>
          </div>
          <div class="row justify-content-center">
            <div class="col-xl-5 col-lg-6 col-md-8 col-12">
              <div class="card card-lg mb-6">
                <div class="card-body p-6">
                  
                  <div id="alertContainer"></div>
                  
                  <form action="<?php echo base_url('auth/signup'); ?>" method="post" class="needs-validation mb-6" id="signupForm" novalidate>
                    <input type="hidden" name="ajax" value="1">
                    <div class="row mb-4">
                      <div class="col-lg-6 col-md-12">
                              <label for="profileFirstNameInput" class="form-label">First Name
                                <span class="text-danger">*</span>
                             </label>
                              <input type="text" class="form-control" id="profileFirstNameInput" name="firstname" required>
                              <div class="invalid-feedback">Please enter first name.</div>
                            </div>
                                          <div class="col-lg-6 col-md-12">
                              <label for="profileLastNameInput" class="form-label">Last Name
                                <span class="text-danger">*</span>
                             </label>
                              <input type="text" class="form-control" id="profileLastNameInput" name="lastname" required>
                              <div class="invalid-feedback">Please enter last name.</div>
                            </div>
                    </div>
                    <div class="mb-4">
                      <label for="signinEmailInput" class="form-label">
                        Email
                        <span class="text-danger">*</span>
                      </label>
                      <input type="email" class="form-control" id="signinEmailInput" name="email" required>
                      <div class="invalid-feedback">Please enter a valid email.</div>
                    </div>
                    <div class="mb-4">
                      <label for="formSignUpPassword" class="form-label">Password
                        <span class="text-danger">*</span></label>
                      <div class="password-field position-relative">
                        <input type="password" class="form-control fakePassword" id="formSignUpPassword" name="password" minlength="8" required>
                        <span><i class="ti ti-eye-off passwordToggler"></i></span>
                        <div class="invalid-feedback" id="passwordError">Please enter a strong password.</div>
                      </div>
                      <!-- Password strength indicator -->
                      <div id="passwordStrength" class="mt-2" style="display: none;">
                        <div class="d-flex align-items-center gap-2">
                          <div class="progress flex-grow-1" style="height: 6px;">
                            <div class="progress-bar" id="strengthBar" role="progressbar" style="width: 0%"></div>
                          </div>
                          <small id="strengthText" class="text-muted"></small>
                        </div>
                        <small class="text-muted d-block mt-1">
                          Password must contain: 8+ characters, uppercase, lowercase, number, and special character
                        </small>
                      </div>
                    </div>
                    <div class="mb-4">
                      <label for="formSignUpConfirmPassword" class="form-label">Confirm Password
                        <span class="text-danger">*</span></label>
                      <div class="password-field position-relative">
                        <input type="password" class="form-control fakePassword" id="formSignUpConfirmPassword" name="confirm_password" required>
                        <span><i class="ti ti-eye-off passwordToggler"></i></span>
                        <div class="invalid-feedback" id="confirmPasswordError">Please re-enter your password.</div>
                        <div class="valid-feedback" id="confirmPasswordSuccess">Passwords match!</div>
                      </div>
                    </div>
                    <div class="mb-4">
                      <label for="mobileNumberInput" class="form-label">Mobile Number
                        <span class="text-danger">*</span></label>
                            <div class="input-group">
                            <span class="input-group-text" id="basic-addon1">+63</span>
                            <input type="text" class="form-control" id="mobileNumberInput" name="mobile_number" placeholder="9xxxxxxxxx" pattern="[0-9]{10}" required/>
                            <div class="invalid-feedback">Please enter a valid 10-digit mobile number.</div>
                        </div>
                    </div>
                    <div class="mb-4">
                      <label for="selectOption" class="form-label">
                        Affiliation
                        <span class="text-danger">*</span>
                      </label>
                       <select class="form-select" id="selectOption" name="affiliation" required>
                          <option value="">Select your affiliation</option>
                          <option value="Administrative Member">Administrative Member</option>
                          <option value="PPFMO">PPFMO</option>
                          <option value="External Organization">External Organization</option>
                          <option value="Faculty Member">Faculty Member</option>
                          <option value="Student">Student</option>
                       </select>
                       <div class="invalid-feedback">Please select your affiliation.</div>
                    </div> 
                    <div class="mb-4 d-flex align-items-center justify-content-between">
                      <div class="form-check">
                          <input class="form-check-input" type="checkbox" id="signupCheckTextCheckbox" required>
                          <label class="form-check-label ms-2" for="signupCheckTextCheckbox">
                            By signing up, you agree to our <a href="#" class="text-info">Terms of Service</a>
                            &amp;
                            <a href="#" class="text-info">Privacy Policy</a>.
                          </label>
                          <div class="invalid-feedback">You must agree to the terms.</div>
                        </div>
                    </div>
                    <div class="mb-5">
                      <div class="g-recaptcha" 
                           data-sitekey="6Lcxpc8rAAAAAH6plX0CZ15gwBGFHcUobrrq9EnC"
                           data-callback="onRecaptchaSuccess"
                           data-expired-callback="onRecaptchaExpired"></div>
                      <div class="invalid-feedback d-block" id="recaptcha-error" style="display: none !important;"></div>
                    </div>

                    <div class="d-grid" style="margin-bottom: -1rem">
                      <button class="btn btn-danger" type="submit" id="signupBtn" disabled>
                        <span class="btn-text">Sign Up</span>
                        <span class="spinner-border spinner-border-sm d-none" role="status" aria-hidden="true"></span>
                      </button>
                    </div>
                </form>
              </div>
            </div>
          </div>
        </div>
          </div>
      </section>
      <!--Sign up end-->
      <div class="position-fixed end-0 bottom-0 m-4" style="z-index: 1050;">
        <div class="dropdown">
          <button class="btn btn-light btn-icon rounded-circle d-flex align-items-center" type="button" aria-expanded="false" data-bs-toggle="dropdown" aria-label="Toggle theme (auto)">
            <i class="bi theme-icon-active lh-1"><i class="bi theme-icon bi-sun-fill"></i></i>
            <span class="visually-hidden bs-theme-text">Toggle theme</span>
          </button>
          <ul class="dropdown-menu dropdown-menu-end shadow">
            <li>
              <button type="button" class="dropdown-item d-flex align-items-center active" data-bs-theme-value="light" aria-pressed="true">
                <i class="ti theme-icon ti ti-sun"></i>
                <span class="ms-2">Light</span>
              </button>
            </li>
            <li>
              <button type="button" class="dropdown-item d-flex align-items-center" data-bs-theme-value="dark" aria-pressed="false">
                <i class="ti theme-icon ti-moon-stars"></i>
                <span class="ms-2">Dark</span>
              </button>
            </li>
            <li>
              <button type="button" class="dropdown-item d-flex align-items-center" data-bs-theme-value="auto" aria-pressed="false">
                <i class="ti theme-icon ti-circle-half-2"></i>
                <span class="ms-2">Auto</span>
              </button>
            </li>
          </ul>
        </div>
      </div>
    </main>

    <!-- Libs JS -->
<script src="<?php echo base_url()?>assets/libs/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
<script src="<?php echo base_url()?>assets/libs/simplebar/dist/simplebar.min.js"></script>

<!-- Theme JS -->
<script src="<?php echo base_url()?>assets/js/theme.min.js"></script>

    <script src="<?php echo base_url()?>assets/js/vendors/password.js"></script>
    
    <script>
      // Global variable to track reCAPTCHA status
      var recaptchaVerified = false;
      
      // reCAPTCHA callback function
      function onRecaptchaSuccess(token) {
        recaptchaVerified = true;
        document.getElementById('signupBtn').disabled = false;
        document.getElementById('recaptcha-error').style.display = 'none';
      }
      
      // reCAPTCHA expired callback
      function onRecaptchaExpired() {
        recaptchaVerified = false;
        document.getElementById('signupBtn').disabled = true;
        showAlert('reCAPTCHA expired. Please verify again.', 'warning');
      }
      
      // Function to show alert messages
      function showAlert(message, type = 'danger') {
        // Remove existing alerts
        const existingAlerts = document.querySelectorAll('.alert');
        existingAlerts.forEach(alert => alert.remove());
        
        // Create new alert
        const alertDiv = document.createElement('div');
        alertDiv.className = `alert alert-${type} alert-dismissible fade show`;
        alertDiv.setAttribute('role', 'alert');
        alertDiv.innerHTML = `
          ${message}
          <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        `;
        
        // Insert alert in container
        const container = document.getElementById('alertContainer');
        container.appendChild(alertDiv);
        
        // Auto-dismiss after 5 seconds
        setTimeout(function() {
          const bsAlert = new bootstrap.Alert(alertDiv);
          bsAlert.close();
        }, 5000);
      }
      
      // Signup form handling
      document.addEventListener('DOMContentLoaded', function() {
        const signupForm = document.getElementById('signupForm');
        const signupBtn = document.getElementById('signupBtn');
        const btnText = signupBtn.querySelector('.btn-text');
        const spinner = signupBtn.querySelector('.spinner-border');
        const passwordInput = document.getElementById('formSignUpPassword');
        const confirmPasswordInput = document.getElementById('formSignUpConfirmPassword');
        const strengthBar = document.getElementById('strengthBar');
        const strengthText = document.getElementById('strengthText');
        const passwordStrength = document.getElementById('passwordStrength');
        const passwordError = document.getElementById('passwordError');
        const confirmPasswordError = document.getElementById('confirmPasswordError');
        const confirmPasswordSuccess = document.getElementById('confirmPasswordSuccess');
        
        // Function to check password strength
        function checkPasswordStrength(password) {
          let strength = 0;
          const checks = {
            length: password.length >= 8,
            uppercase: /[A-Z]/.test(password),
            lowercase: /[a-z]/.test(password),
            number: /[0-9]/.test(password),
            special: /[!@#$%^&*(),.?":{}|<>]/.test(password)
          };
          
          // Calculate strength
          Object.values(checks).forEach(check => {
            if (check) strength++;
          });
          
          return { strength, checks };
        }
        
        // Function to update password strength UI
        function updatePasswordStrengthUI(password) {
          if (password.length === 0) {
            passwordStrength.style.display = 'none';
            passwordInput.classList.remove('is-valid', 'is-invalid');
            return;
          }
          
          passwordStrength.style.display = 'block';
          const { strength, checks } = checkPasswordStrength(password);
          
          // Update progress bar
          const percentage = (strength / 5) * 100;
          strengthBar.style.width = percentage + '%';
          
          // Update colors and text based on strength
          strengthBar.classList.remove('bg-danger', 'bg-warning', 'bg-info', 'bg-success');
          
          if (strength <= 2) {
            strengthBar.classList.add('bg-danger');
            strengthText.textContent = 'Weak';
            strengthText.className = 'text-danger';
            passwordInput.classList.add('is-invalid');
            passwordInput.classList.remove('is-valid');
            passwordError.textContent = 'Password is too weak. Add more variety.';
            passwordInput.setCustomValidity('Weak password');
          } else if (strength === 3) {
            strengthBar.classList.add('bg-warning');
            strengthText.textContent = 'Fair';
            strengthText.className = 'text-warning';
            passwordInput.classList.add('is-invalid');
            passwordInput.classList.remove('is-valid');
            passwordError.textContent = 'Password could be stronger.';
            passwordInput.setCustomValidity('Fair password');
          } else if (strength === 4) {
            strengthBar.classList.add('bg-info');
            strengthText.textContent = 'Good';
            strengthText.className = 'text-info';
            passwordInput.classList.remove('is-invalid', 'is-valid');
            passwordInput.setCustomValidity('');
          } else {
            strengthBar.classList.add('bg-success');
            strengthText.textContent = 'Strong';
            strengthText.className = 'text-success';
            passwordInput.classList.add('is-valid');
            passwordInput.classList.remove('is-invalid');
            passwordInput.setCustomValidity('');
          }
        }
        
        // Live password strength validation
        passwordInput.addEventListener('input', function() {
          updatePasswordStrengthUI(this.value);
          
          // Re-validate confirm password if it has a value
          if (confirmPasswordInput.value) {
            confirmPasswordInput.dispatchEvent(new Event('input'));
          }
        });
        
        // Password match validation with visual feedback
        confirmPasswordInput.addEventListener('input', function() {
          const password = passwordInput.value;
          const confirmPassword = this.value;
          
          if (confirmPassword.length === 0) {
            this.classList.remove('is-valid', 'is-invalid');
            this.setCustomValidity('');
            return;
          }
          
          if (confirmPassword !== password) {
            this.classList.add('is-invalid');
            this.classList.remove('is-valid');
            confirmPasswordError.textContent = 'Passwords do not match';
            this.setCustomValidity('Passwords do not match');
          } else {
            this.classList.add('is-valid');
            this.classList.remove('is-invalid');
            this.setCustomValidity('');
          }
        });
        
        signupForm.addEventListener('submit', function(e) {
          e.preventDefault();
          e.stopPropagation();
          
          // Check HTML5 validation
          if (!signupForm.checkValidity()) {
            signupForm.classList.add('was-validated');
            return false;
          }
          
          // Check if passwords match
          if (passwordInput.value !== confirmPasswordInput.value) {
            showAlert('Passwords do not match!', 'danger');
            confirmPasswordInput.focus();
            return false;
          }
          
          // Check reCAPTCHA
          if (!recaptchaVerified) {
            document.getElementById('recaptcha-error').textContent = 'Please verify that you are not a robot.';
            document.getElementById('recaptcha-error').style.display = 'block';
            return false;
          }
          
          // Show loading state
          signupBtn.disabled = true;
          btnText.textContent = 'Creating Account...';
          spinner.classList.remove('d-none');
          
          // Get form data
          const formData = new FormData(signupForm);
          
          // Add reCAPTCHA response
          const recaptchaResponse = grecaptcha.getResponse();
          formData.append('g-recaptcha-response', recaptchaResponse);
          
          // Make AJAX request
          fetch('<?php echo base_url("auth/signup"); ?>', {
            method: 'POST',
            body: formData
          })
          .then(response => response.json())
          .then(data => {
            // Reset button state
            signupBtn.disabled = false;
            btnText.textContent = 'Sign Up';
            spinner.classList.add('d-none');
            
            if (data.success) {
              // Show success message
              showAlert(data.message || 'Registration successful! Redirecting...', 'success');
              
              // Redirect after short delay
              setTimeout(function() {
                window.location.href = data.redirect || '<?php echo base_url("auth/signin"); ?>';
              }, 2000);
            } else {
              // Show error message
              showAlert(data.message || 'Registration failed. Please try again.', 'danger');
              
              // Reset reCAPTCHA
              grecaptcha.reset();
              recaptchaVerified = false;
              signupBtn.disabled = true;
            }
          })
          .catch(error => {
            console.error('Error:', error);
            
            // Reset button state
            signupBtn.disabled = false;
            btnText.textContent = 'Sign Up';
            spinner.classList.add('d-none');
            
            // Show error message
            showAlert('An error occurred. Please try again.', 'danger');
            
            // Reset reCAPTCHA
            grecaptcha.reset();
            recaptchaVerified = false;
            signupBtn.disabled = true;
          });
          
          return false;
        });
      });
    </script>
  </body>
</html>
