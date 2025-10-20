        <!-- container -->
        <div class="custom-container" style="min-height: calc(100vh - 120px);">
            <!-- Alert Container -->
            <div id="alert-container" style="position: fixed; top: 20px; right: 20px; z-index: 9999; min-width: 350px; max-width: 500px;"></div>

            <!-- Header -->
            <div class="mb-4">
              <h4 class="mb-1 d-flex align-items-center">Add New User</h4>
              <nav aria-label="breadcrumb" class="mt-2">
                    <ol class="breadcrumb">
                      <li class="breadcrumb-item"><a href="<?php echo base_url('/dashboard'); ?>">Home</a></li>
                      <li class="breadcrumb-item"><a href="<?php echo base_url('/users'); ?>">Users</a></li>
                      <li class="breadcrumb-item active" aria-current="page">Add New</li>
                    </ol>
              </nav>
            </div>

            <div class="row">
              <div class="col-12">
                <div class="card card-lg">
                  <div class="card-header border-bottom-0">
                    <h5 class="mb-0">User Details</h5>
                  </div>
                  <div class="card-body">
                    <form id="createUserForm" action="<?php echo base_url('users/create'); ?>" method="post" enctype="multipart/form-data">
                      <div class="row g-4">
                        <div class="col-md-6">
                          <label class="form-label">Email</label> <span class="text-danger">*</span>
                          <input type="email" name="email" class="form-control" placeholder="Enter email" required>
                        </div>
                        <div class="col-md-6">
                          <label class="form-label">Password</label> <span class="text-danger">*</span>
                          <input type="password" name="password" class="form-control" placeholder="Enter password" required>
                        </div>
                        <div class="col-md-6">
                          <label class="form-label">Confirm Password</label> <span class="text-danger">*</span>
                          <input type="password" name="cpassword" class="form-control" placeholder="Confirm password">
                        </div>
                        <div class="col-md-6">
                          <label class="form-label">First Name</label> <span class="text-danger">*</span>
                          <input type="text" name="fname" class="form-control" placeholder="Enter first name" required>
                        </div>
                        <div class="col-md-6">
                          <label class="form-label">Last Name</label> <span class="text-danger">*</span>
                          <input type="text" name="lname" class="form-control" placeholder="Enter last name">
                        </div>
                        <div class="col-md-6">
                          <label class="form-label">Mobile Number</label> <span class="text-danger">*</span>
                          <input type="text" name="mobile_number" class="form-control" placeholder="Enter mobile number">
                        </div>
                        <div class="col-md-6">
                          <label class="form-label">Affiliation</label> <span class="text-danger">*</span>
                          <select name="affiliation" class="form-select" required>
                            <option value="">Select affiliation</option>
                            <option value="Student">Student</option>
                            <option value="Admin">Admin</option>
                            <option value="Faculty">Faculty</option>
                          </select>
                        </div>
                        <div class="col-md-6"> 
                          <label class="form-label">Profile Image</label>
                          <input type="file" name="profile_image" class="form-control" accept="image/*">
                        </div>
                      </div>

                      <div class="d-flex justify-content-end gap-2 mt-4">
                        <a href="<?php echo base_url('users'); ?>" class="btn btn-subtle-secondary">Cancel</a>
                        <button type="submit" class="btn btn-subtle-danger">Create User</button>
                      </div>
                    </form>
                  </div>
                </div>
              </div>
            </div>
      </div>

<script src="<?php echo base_url(); ?>assets/libs/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
<script src="<?php echo base_url(); ?>assets/libs/simplebar/dist/simplebar.min.js"></script>
<script src="<?php echo base_url(); ?>assets/js/theme.min.js"></script>

<script>
document.addEventListener('DOMContentLoaded', function() {
  const form = document.getElementById('createUserForm');
  // Reservation-style success alert helper
  function showAlert(message, type) {
    var alertContainer = document.getElementById('alert-container');
    var alertId = 'alert-' + Date.now();
    var cls = type === 'success' ? 'alert-success' : 'alert-danger';
    var html = `
      <div id="${alertId}" class="alert ${cls} alert-dismissible fade show shadow-lg" role="alert">
        <strong>${type === 'success' ? 'Success!' : 'Error!'}</strong> ${message}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
      </div>
    `;
    alertContainer.insertAdjacentHTML('beforeend', html);
    setTimeout(function(){
      var el = document.getElementById(alertId);
      if (el) { var bs = new bootstrap.Alert(el); bs.close(); }
    }, 2000);
  }
  form.addEventListener('submit', function(e) {
    // Client-side validation
    const pwd = form.querySelector('input[name="password"]').value;
    const cpwd = form.querySelector('input[name="cpassword"]').value;
    const email = form.querySelector('input[name="email"]').value;
    const fname = form.querySelector('input[name="fname"]').value;
    const affiliation = form.querySelector('select[name="affiliation"]').value;
    
    // Check required fields
    if (!email || !pwd || !fname || !affiliation) {
      e.preventDefault();
      showAlert('Please fill in all required fields', 'danger');
      return;
    }
    
    // Check password length
    if (pwd.length < 8) {
      e.preventDefault();
      showAlert('Password must be at least 8 characters long', 'danger');
      return;
    }
    
    // Check password match
    if (cpwd && pwd !== cpwd) {
      e.preventDefault();
      showAlert('Passwords do not match', 'danger');
      return;
    }
    
    // All validation passed - show loading state
    const submitBtn = form.querySelector('button[type="submit"]');
    submitBtn.disabled = true;
    submitBtn.innerHTML = '<span class="spinner-border spinner-border-sm me-2"></span>Creating...';
  });
});
</script>


