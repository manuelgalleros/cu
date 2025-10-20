<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<meta content="Codescandy" name="author">
    <title>Sign In | CU - Facilities Reservation System</title>
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

/* Prevent checkbox validation styling - keep it unchanged */
.was-validated #rememberMeCheckbox:valid,
.was-validated #rememberMeCheckbox:invalid,
#rememberMeCheckbox.is-valid,
#rememberMeCheckbox.is-invalid {
  border-color: var(--bs-border-color) !important;
  background-color: transparent !important;
  background-image: none !important;
}

/* Keep checkbox in its checked state only if user actually checked it */
.was-validated #rememberMeCheckbox:checked {
  background-color: #0d6efd !important;
  border-color: #0d6efd !important;
  background-image: url("data:image/svg+xml,%3csvg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 20 20'%3e%3cpath fill='none' stroke='%23fff' stroke-linecap='round' stroke-linejoin='round' stroke-width='3' d='m6 10 3 3 6-6'/%3e%3c/svg%3e") !important;
}

/* Prevent unchecked checkbox from turning blue/green on validation */
.was-validated #rememberMeCheckbox:not(:checked):valid {
  border-color: var(--bs-border-color) !important;
  background-color: transparent !important;
  background-image: none !important;
}

/* Don't show validation feedback for checkbox */
.was-validated #rememberMeCheckbox ~ .valid-feedback,
.was-validated #rememberMeCheckbox ~ .invalid-feedback {
  display: none !important;
}
</style>

  </head>

  <body>
    <main class="d-flex flex-column justify-content-center min-vh-100 py-4">
      <!--Sign up start-->
      <section>
        <div class="container">
          <div class="row mb-8">
            <div class="col-xl-4 offset-xl-4 col-md-12 col-12">
              <div class="text-center">
                <a class='fs-2 fw-bold d-flex align-items-center gap-2 justify-content-center mb-6'>
                  <img src="<?php echo base_url()?>assets/images/brand/cu_logo_white.png" alt="" width="70%" height="100%" class="mb-4 logo-light">
                  <img src="<?php echo base_url()?>assets/images/brand/cu_logo_black.png" alt="" width="70%" height="100%" class="mb-4 logo-dark">
                </a>
                <h5 class="mb-1">Welcome to CU Facilities Reservation System</h5>
              </div>
            </div>
          </div>
          <div class="row justify-content-center">
            <div class="col-xl-5 col-lg-6 col-md-8 col-12">
              <div class="card card-lg mb-6">
                <div class="card-body p-6">
                  
                  <?php if(isset($errors) && !empty($errors)): ?>
                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                      <ul class="mb-0">
                        <?php foreach($errors as $error): ?>
                          <li><?php echo $error; ?></li>
                        <?php endforeach; ?>
                      </ul>
                      <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                  <?php endif; ?>
                  
                  <form action="<?php echo base_url('auth/signin'); ?>" method="post" class="needs-validation mb-6" id="loginForm" novalidate>
                    <input type="hidden" name="ajax" value="1" id="ajaxField">
                    <div class="mb-4">
                      <label for="signinEmailInput" class="form-label">
                        Email
                        <span class="text-danger">*</span>
                      </label>
                      <input type="email" class="form-control" id="signinEmailInput" name="email" value="<?php echo set_value('email'); ?>" required>
                      <div class="invalid-feedback">Please enter a valid email.</div>
                    </div>
                    <div class="mb-4">
                      <label for="formSignUpPassword" class="form-label">Password
                        <span class="text-danger">*</span></label>
                      <div class="password-field position-relative">
                        <input type="password" class="form-control fakePassword" id="formSignUpPassword" name="password" required>
                        <span><i class="ti ti-eye-off passwordToggler"></i></span>
                        <div class="invalid-feedback">Please enter password.</div>
                      </div>
                    </div>

                    <div class="mb-4 d-flex align-items-center justify-content-between">
                      <div class="form-check">
                        <input class="form-check-input" type="checkbox" id="rememberMeCheckbox" name="remember_me">
                        <label class="form-check-label" for="rememberMeCheckbox">Remember me</label>
                      </div>

                      <div><a href="<?php echo base_url('auth/forgot-password'); ?>" class="text-info">Forgot Password?</a></div>
                    </div>
                    <div class="mb-5">
                      <div class="g-recaptcha" 
                           data-sitekey="6Lcxpc8rAAAAAH6plX0CZ15gwBGFHcUobrrq9EnC" 
                           data-callback="onRecaptchaSuccess"
                           data-expired-callback="onRecaptchaExpired"></div>
                      <div class="invalid-feedback d-block" id="recaptcha-error" style="display: none !important;"></div>
                    </div>
                    <div class="d-grid" style="margin-bottom: -1rem">
                      <button class="btn btn-danger" type="submit" id="loginBtn" disabled>
                        <span class="btn-text">Sign In</span>
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
        document.getElementById('loginBtn').disabled = false;
        document.getElementById('recaptcha-error').style.display = 'none';
      }
      
      // reCAPTCHA expired callback
      function onRecaptchaExpired() {
        recaptchaVerified = false;
        document.getElementById('loginBtn').disabled = true;
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
        
        // Insert alert before form
        const form = document.getElementById('loginForm');
        form.parentNode.insertBefore(alertDiv, form);
        
        // Auto-dismiss after 5 seconds
        setTimeout(function() {
          const bsAlert = new bootstrap.Alert(alertDiv);
          bsAlert.close();
        }, 5000);
      }
      
      // Login form handling
      document.addEventListener('DOMContentLoaded', function() {
        const loginForm = document.getElementById('loginForm');
        const loginBtn = document.getElementById('loginBtn');
        const btnText = loginBtn.querySelector('.btn-text');
        const spinner = loginBtn.querySelector('.spinner-border');
        
        loginForm.addEventListener('submit', function(e) {
          e.preventDefault();
          e.stopPropagation();
          
          // Check HTML5 validation
          if (!loginForm.checkValidity()) {
            loginForm.classList.add('was-validated');
            return false;
          }
          
          // Check reCAPTCHA
          if (!recaptchaVerified) {
            document.getElementById('recaptcha-error').textContent = 'Please verify that you are not a robot.';
            document.getElementById('recaptcha-error').style.display = 'block';
            return false;
          }
          
          // Show loading state
          loginBtn.disabled = true;
          btnText.textContent = 'Signing in...';
          spinner.classList.remove('d-none');
          
          // Get form data
          const formData = new FormData(loginForm);
          
          // Add reCAPTCHA response
          const recaptchaResponse = grecaptcha.getResponse();
          formData.append('g-recaptcha-response', recaptchaResponse);
          
          // Make AJAX request
          fetch('<?php echo base_url("auth/signin"); ?>', {
            method: 'POST',
            body: formData
          })
          .then(response => response.json())
          .then(data => {
            // Reset button state
            loginBtn.disabled = false;
            btnText.textContent = 'Sign In';
            spinner.classList.add('d-none');
            
            if (data.success) {
              // Show success message
              showAlert(data.message || 'Login successful! Redirecting...', 'success');
              
              // Redirect after short delay
              setTimeout(function() {
                window.location.href = data.redirect || '<?php echo base_url("dashboard"); ?>';
              }, 1000);
            } else {
              // Show error message
              showAlert(data.message || 'Login failed. Please try again.', 'danger');
              
              // Reset reCAPTCHA
              grecaptcha.reset();
              recaptchaVerified = false;
              loginBtn.disabled = true;
            }
          })
          .catch(error => {
            console.error('Error:', error);
            
            // Reset button state
            loginBtn.disabled = false;
            btnText.textContent = 'Sign In';
            spinner.classList.add('d-none');
            
            // Show error message
            showAlert('An error occurred. Please try again.', 'danger');
            
            // Reset reCAPTCHA
            grecaptcha.reset();
            recaptchaVerified = false;
            loginBtn.disabled = true;
          });
          
          return false;
        });
        
        // Auto-dismiss existing alerts after 5 seconds
        const alerts = document.querySelectorAll('.alert');
        alerts.forEach(function(alert) {
          setTimeout(function() {
            const bsAlert = new bootstrap.Alert(alert);
            bsAlert.close();
          }, 5000);
        });
      });
    </script>
  </body>
</html>
