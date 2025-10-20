        <!-- container -->
        <div class="custom-container" style="min-height: calc(100vh - 120px);">
            <div id="alert-container" style="position: fixed; top: 20px; right: 20px; z-index: 9999; min-width: 350px; max-width: 500px;"></div>

            <div class="mb-4 d-flex justify-content-between align-items-center">
              <div>
                <h4 class="mb-1 d-flex align-items-center">Edit Permissions: <?php echo htmlspecialchars($user['firstname'].' '.$user['lastname']); ?></h4>
                <nav aria-label="breadcrumb" class="mt-2">
                      <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="<?php echo base_url('/dashboard'); ?>">Settings</a></li>
                        <li class="breadcrumb-item"><a href="<?php echo base_url('/users'); ?>">Users</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Edit Permissions</li>
                      </ol>
                </nav>
              </div>
            </div>

            <div class="row">
              <div class="col-lg-8 col-md-10 col-12 mx-auto">
                <div class="card card-lg">
                  <form method="post" action="">
                  <div class="card-header border-bottom-0 d-flex justify-content-center align-items-center">
                    <h5 class="mb-0 text-center">Grant Permissions</h5>
                  </div>
                  <div class="card-body">
                      <div class="d-flex justify-content-center flex-wrap gap-4">
                        <?php $all_permissions = isset($all_permissions) ? $all_permissions : array('approve','delete','createReservation'); ?>
                        <?php foreach($all_permissions as $perm): ?>
                          <div class="form-check text-center">
                            <input class="form-check-input" type="checkbox" name="permissions[]" id="perm_<?php echo md5($perm); ?>" value="<?php echo htmlspecialchars($perm); ?>" <?php echo in_array($perm, $current_permissions) ? 'checked' : ''; ?>>
                            <label class="form-check-label" for="perm_<?php echo md5($perm); ?>">
                              <?php 
                                $label = preg_replace('/([a-z])([A-Z])/', '$1 $2', $perm);
                                $label = ucwords(str_replace('_',' ', $label));
                                echo htmlspecialchars($label);
                              ?>
                            </label>
                          </div>
                        <?php endforeach; ?>
                      </div>
                      <div class="d-flex justify-content-center gap-2 mt-4">
                        <a href="<?php echo base_url('users'); ?>" class="btn btn-outline-secondary">Cancel</a>
                        <button type="submit" class="btn btn-primary">Save Changes</button>
                      </div>
                  </div>
                  </form>
                </div>
              </div>
            </div>
      </div>

<script src="<?php echo base_url(); ?>assets/libs/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
<script src="<?php echo base_url(); ?>assets/libs/simplebar/dist/simplebar.min.js"></script>
<script src="<?php echo base_url(); ?>assets/js/theme.min.js"></script>


