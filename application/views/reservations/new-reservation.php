        <!-- container -->
        <div class="custom-container" style="min-height: calc(100vh - 120px);">
            <!-- Alert Container for Bootstrap Alerts -->
            <div id="alert-container" style="position: fixed; top: 20px; right: 20px; z-index: 9999; min-width: 350px; max-width: 500px;"></div>
            
            <!-- Welcome Section -->
            <div class="mb-6">
              <h4 class="mb-2 d-flex align-items-center">Create New Reservation</h4>
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                      <li class="breadcrumb-item"><a href="<?php echo base_url('/dashboard'); ?>">Home</a></li>
                      <li class="breadcrumb-item active" aria-current="page">New Reservation Form</li>
                    </ol>
                  </nav>
              <p class="text-muted">Complete the form below to reserve a facility</p>
            </div>
            
            <div class="row g-4">
              <div class="col-xxl-12 col-12">
                <div>
                  <!-- stepper -->
                  <div id="stepperForm" class="bs-stepper">
                    <!-- Stepper Button -->
                    <div class="bs-stepper-header p-0 bg-transparent mb-4" role="tablist">
                      <div class="step active" data-target="#test-l-1">
                        <button type="button" class="step-trigger" role="tab" id="stepperFormtrigger1" aria-controls="test-l-1" aria-selected="true">
                          <span class="bs-stepper-circle me-2 d-flex align-items-center">
                           <svg  xmlns="http://www.w3.org/2000/svg"  width="24"  height="24"  viewBox="0 0 24 24"  fill="none"  stroke="currentColor"  stroke-width="2"  stroke-linecap="round"  stroke-linejoin="round"  class="icon icon-tabler icons-tabler-outline icon-tabler-building"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M3 21l18 0" /><path d="M9 8l1 0" /><path d="M9 12l1 0" /><path d="M9 16l1 0" /><path d="M14 8l1 0" /><path d="M14 12l1 0" /><path d="M14 16l1 0" /><path d="M5 21v-16a2 2 0 0 1 2 -2h10a2 2 0 0 1 2 2v16" /></svg>
                          </span>
                          <span class="bs-stepper-label">Choose a facility</span>
                        </button>
                      </div>
                      <div class="bs-stepper-line"></div>
                      <!-- Stepper Button -->
                      <div class="step" data-target="#step-date">
                        <button type="button" class="step-trigger" role="tab" id="stepperFormtrigger2" aria-controls="step-date" aria-selected="false">
                          <span class="bs-stepper-circle me-2 d-flex align-items-center">
                           <svg  xmlns="http://www.w3.org/2000/svg"  width="24"  height="24"  viewBox="0 0 24 24"  fill="none"  stroke="currentColor"  stroke-width="2"  stroke-linecap="round"  stroke-linejoin="round"  class="icon icon-tabler icons-tabler-outline icon-tabler-calendar-week"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M4 7a2 2 0 0 1 2 -2h12a2 2 0 0 1 2 2v12a2 2 0 0 1 -2 2h-12a2 2 0 0 1 -2 -2v-12z" /><path d="M16 3v4" /><path d="M8 3v4" /><path d="M4 11h16" /><path d="M7 14h.013" /><path d="M10.01 14h.005" /><path d="M13.01 14h.005" /><path d="M16.015 14h.005" /><path d="M13.015 17h.005" /><path d="M7.01 17h.005" /><path d="M10.01 17h.005" /></svg>
                          </span>
                          <span class="bs-stepper-label">Select date</span>
                        </button>
                      </div>
                      <div class="bs-stepper-line"></div>
                      <!-- Stepper Button -->
                      <div class="step" data-target="#step-time">
                        <button type="button" class="step-trigger" role="tab" id="stepperFormtrigger3" aria-controls="step-time" aria-selected="false">
                          <span class="bs-stepper-circle me-2 d-flex align-items-center">
                           <svg  xmlns="http://www.w3.org/2000/svg"  width="24"  height="24"  viewBox="0 0 24 24"  fill="none"  stroke="currentColor"  stroke-width="2"  stroke-linecap="round"  stroke-linejoin="round"  class="icon icon-tabler icons-tabler-outline icon-tabler-clock-hour-10"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M12 12m-9 0a9 9 0 1 0 18 0a9 9 0 1 0 -18 0" /><path d="M12 12l-3 -2" /><path d="M12 7v5" /></svg>
                          </span>
                          <span class="bs-stepper-label">Select time</span>
                        </button>
                      </div>
                      <div class="bs-stepper-line"></div>
                      <!-- Stepper Button -->
                      <div class="step" data-target="#step-info">
                        <button type="button" class="step-trigger" role="tab" id="stepperFormtrigger4" aria-controls="step-info" aria-selected="false">
                          <span class="bs-stepper-circle me-2 d-flex align-items-center">
                          <svg  xmlns="http://www.w3.org/2000/svg"  width="24"  height="24"  viewBox="0 0 24 24"  fill="none"  stroke="currentColor"  stroke-width="2"  stroke-linecap="round"  stroke-linejoin="round"  class="icon icon-tabler icons-tabler-outline icon-tabler-info-circle"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M3 12a9 9 0 1 0 18 0a9 9 0 0 0 -18 0" /><path d="M12 9h.01" /><path d="M11 12h1v4h1" /></svg>
                          </span>
                          <span class="bs-stepper-label">Enter information</span>
                        </button>
                      </div>
                      <div class="bs-stepper-line"></div>
                      <!-- Stepper Button -->
                      <div class="step" data-target="#step-confirm">
                        <button type="button" class="step-trigger" role="tab" id="stepperFormtrigger5" aria-controls="step-confirm" aria-selected="false">
                          <span class="bs-stepper-circle me-2 d-flex align-items-center">
                          <svg  xmlns="http://www.w3.org/2000/svg"  width="24"  height="24"  viewBox="0 0 24 24"  fill="none"  stroke="currentColor"  stroke-width="2"  stroke-linecap="round"  stroke-linejoin="round"  class="icon icon-tabler icons-tabler-outline icon-tabler-circle-check"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M12 12m-9 0a9 9 0 1 0 18 0a9 9 0 1 0 -18 0" /><path d="M9 12l2 2l4 -4" /></svg>
                          </span>
                          <span class="bs-stepper-label">Confirm details</span>
                        </button>
                      </div>
                    </div>
                    
                    <!-- Stepper Content -->
                    <div class="bs-stepper-content">
                      <!-- Step 1: Choose Facility -->
                      <div id="test-l-1" class="content active" role="tabpanel" aria-labelledby="stepperFormtrigger1">
                        <div class="row mt-8">
                      <div class="col-xxl-3 col-lg-4 col-md-6 col-sm-12 mb-4">
                        <div class="card card-lg h-100">
                          <div class="card-body text-center px-4 py-4">
                            <div class="my-2 d-flex flex-column gap-4">
                              <div>
                                <h5 class="mb-0">Gymnasium</h5>
                              </div>
                            </div>
                            <div class="mt-6 d-flex justify-content-center gap-8">
                              <div>
                                <div>
                                  <div class="fs-5 fw-bold">500</div>
                                  <span class="text-secondary">Maximum capacity</span>
                                </div>
                              </div>
                              <div class="border-end border-dashed"></div>
                              <div>
                                <div>
                                  <div class="fs-5 fw-bold">₱6,830/hr</div>
                                  <span class="text-secondary">Rate</span>
                                </div>
                              </div>
                            </div>
                          </div>
                          <div class="card-footer text-end border-top border-dashed px-6 py-5">
                            <button type="button" class="btn btn-subtle-info reserve-facility" data-facility="Gymnasium" data-capacity="500" data-rate="6830">
                              <span>Reserve Now</span>
                              <span class="ms-1">
                                <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-arrow-narrow-right" width="18" height="18" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                  <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                  <path d="M5 12l14 0"></path>
                                  <path d="M15 16l4 -4"></path>
                                  <path d="M15 8l4 4"></path>
                                </svg>
                              </span>
                            </button>
                          </div>
                        </div>
                      </div>
          
                      <div class="col-xxl-3 col-lg-4 col-md-6 col-sm-12 mb-4">
                        <div class="card card-lg h-100">
                          <div class="card-body text-center px-4 py-4">
                            <div class="my-2 d-flex flex-column gap-4">
                              <div>
                                <h5 class="mb-0">Multi-Purpose Hall</h5>
                              </div>
                            </div>
                            <div class="mt-6 d-flex justify-content-center gap-8">
                              <div>
                                <div>
                                  <div class="fs-5 fw-bold">200</div>
                                  <span class="text-secondary">Maximum capacity</span>
                                </div>
                              </div>
                              <div class="border-end border-dashed"></div>
                              <div>
                                <div>
                                  <div class="fs-5 fw-bold">₱4,500/hr</div>
                                  <span class="text-secondary">Rate</span>
                                </div>
                              </div>
                            </div>
                          </div>
                          <div class="card-footer text-end border-top border-dashed px-6 py-5">
                            <button type="button" class="btn btn-subtle-info reserve-facility" data-facility="Multi-Purpose Hall" data-capacity="200" data-rate="4500">
                              <span>Reserve Now</span>
                              <span class="ms-1">
                                <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-arrow-narrow-right" width="18" height="18" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                  <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                  <path d="M5 12l14 0"></path>
                                  <path d="M15 16l4 -4"></path>
                                  <path d="M15 8l4 4"></path>
                                </svg>
                              </span>
                            </button>
                          </div>
                        </div>
                      </div>
                          
                      <div class="col-xxl-3 col-lg-4 col-md-6 col-sm-12 mb-4">
                        <div class="card card-lg h-100">
                          <div class="card-body text-center px-4 py-4">
                            <div class="my-2 d-flex flex-column gap-4">
                              <div>
                                <h5 class="mb-0">Court</h5>
                              </div>
                            </div>
                            <div class="mt-6 d-flex justify-content-center gap-8">
                              <div>
                                <div>
                                  <div class="fs-5 fw-bold">500</div>
                                  <span class="text-secondary">Maximum capacity</span>
                                </div>
                              </div>
                              <div class="border-end border-dashed"></div>
                              <div>
                                <div>
                                  <div class="fs-5 fw-bold">₱500/hr</div>
                                  <span class="text-secondary">Rate</span>
                                </div>
                              </div>
                            </div>
                          </div>
                          <div class="card-footer text-end border-top border-dashed px-6 py-5">
                            <button type="button" class="btn btn-subtle-info reserve-facility" data-facility="Court" data-capacity="500" data-rate="500">
                              <span>Reserve Now</span>
                              <span class="ms-1">
                                <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-arrow-narrow-right" width="18" height="18" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                  <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                  <path d="M5 12l14 0"></path>
                                  <path d="M15 16l4 -4"></path>
                                  <path d="M15 8l4 4"></path>
                                </svg>
                              </span>
                            </button>
                          </div>
                        </div>
                      </div>
                          
                      <div class="col-xxl-3 col-lg-4 col-md-6 col-sm-12 mb-4">
                        <div class="card card-lg h-100">
                          <div class="card-body text-center px-4 py-4">
                            <div class="my-2 d-flex flex-column gap-4">
                              <div>
                                <h5 class="mb-0">University Ground</h5>
                              </div>
                            </div>
                            <div class="mt-6 d-flex justify-content-center gap-8">
                              <div>
                                <div>
                                  <div class="fs-5 fw-bold">350</div>
                                  <span class="text-secondary">Maximum capacity</span>
                                </div>
                              </div>
                              <div class="border-end border-dashed"></div>
                              <div>
                                <div>
                                  <div class="fs-5 fw-bold">₱500/hr</div>
                                  <span class="text-secondary">Rate</span>
                                </div>
                              </div>
                            </div>
                          </div>
                          <div class="card-footer text-end border-top border-dashed px-6 py-5">
                            <button type="button" class="btn btn-subtle-info reserve-facility" data-facility="University Ground" data-capacity="350" data-rate="500">
                              <span>Reserve Now</span>
                              <span class="ms-1">
                                <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-arrow-narrow-right" width="18" height="18" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                  <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                  <path d="M5 12l14 0"></path>
                                  <path d="M15 16l4 -4"></path>
                                  <path d="M15 8l4 4"></path>
                                </svg>
                              </span>
                            </button>
                          </div>
                        </div>
                      </div>
                    </div>
                      
                    <div class="row mt-0 mt-lg-8">
                      <div class="col-xxl-3 col-lg-4 col-md-6 col-sm-12 mb-4">
                        <div class="card card-lg h-100">
                          <div class="card-body text-center px-4 py-4">
                            <div class="my-2 d-flex flex-column gap-4">
                              <div>
                                <h5 class="mb-0">Classrooms</h5>
                              </div>
                            </div>
                            <div class="mt-6 d-flex justify-content-center gap-8">
                              <div>
                                <div>
                                  <div class="fs-5 fw-bold">50</div>
                                  <span class="text-secondary">Maximum capacity</span>
                                </div>
                              </div>
                              <div class="border-end border-dashed"></div>
                              <div>
                                <div>
                                  <div class="fs-5 fw-bold">₱60/hr</div>
                                  <span class="text-secondary">Rate</span>
                                </div>
                              </div>
                            </div>
                          </div>
                          <div class="card-footer text-end border-top border-dashed px-6 py-5">
                            <button type="button" class="btn btn-subtle-info reserve-facility" data-facility="Classrooms" data-capacity="50" data-rate="60">
                              <span>Reserve Now</span>
                              <span class="ms-1">
                                <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-arrow-narrow-right" width="18" height="18" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                  <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                  <path d="M5 12l14 0"></path>
                                  <path d="M15 16l4 -4"></path>
                                  <path d="M15 8l4 4"></path>
                                </svg>
                              </span>
                            </button>
                          </div>
                        </div>
                      </div>
                          
                      <div class="col-xxl-3 col-lg-4 col-md-6 col-sm-12 mb-4">
                        <div class="card card-lg h-100">
                          <div class="card-body text-center px-4 py-4">
                            <div class="my-2 d-flex flex-column gap-4">
                              <div>
                                <h5 class="mb-0">Mini Theater</h5>
                              </div>
                            </div>
                            <div class="mt-6 d-flex justify-content-center gap-8">
                              <div>
                                <div>
                                  <div class="fs-5 fw-bold">600</div>
                                  <span class="text-secondary">Maximum capacity</span>
                                </div>
                              </div>
                              <div class="border-end border-dashed"></div>
                              <div>
                                <div>
                                  <div class="fs-5 fw-bold">₱6200/hr</div>
                                  <span class="text-secondary">Rate</span>
                                </div>
                              </div>
                            </div>
                          </div>
                          <div class="card-footer text-end border-top border-dashed px-6 py-5">
                            <button type="button" class="btn btn-subtle-info reserve-facility" data-facility="Mini Theater" data-capacity="600" data-rate="6200">
                              <span>Reserve Now</span>
                              <span class="ms-1">
                                <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-arrow-narrow-right" width="18" height="18" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                  <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                  <path d="M5 12l14 0"></path>
                                  <path d="M15 16l4 -4"></path>
                                  <path d="M15 8l4 4"></path>
                                </svg>
                              </span>
                            </button>
                          </div>
                        </div>
                      </div>
                        </div>
                      </div>
                      
                      <!-- Step 2: Select Date -->
                      <div id="step-date" class="content" role="tabpanel" aria-labelledby="stepperFormtrigger2">
                          <h5 class="mb-4">Select Date for <span id="selected-facility">your facility</span></h5>
                        <div class="row">
                          <div class="col-12">
                            
                            
                            <div class="row g-4">
                              <div class="col-xl-8 col-lg-8 col-md-12 col-12">
              <!-- Card -->
              <div class="card card-lg overflow-hidden">
                <div class="row align-items-center p-4 p-sm-6 gy-3">
                  <!-- Select View -->
                  <div class="col-sm-4 col-md-2 mb-3 mb-sm-0">
                    <select id="calendar-view" class="form-select" data-choices="">
                      <option value="dayGridMonth" selected="">Month</option>
                      <option value="timeGridWeek">Week</option>
                      <option value="timeGridDay">Day</option>
                      <option value="listMonth">List</option>
                    </select>
                  </div>

                  <!-- Navigation and Title -->
                  <div class="col-sm-4 col-md-8 mb-3 mb-sm-0">
                    <div class="d-flex align-items-center justify-content-center gap-3 gap-sm-8">
                      <a href="#!" id="prev-month" class="text-inherit">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewbox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round">
                          <path d="M15 6l-6 6l6 6"></path>
                        </svg>
                      </a>

                      <h3 id="calendar-title" class="calendar-title mb-0 text-center"></h3>

                      <a href="#!" id="next-month" class="text-inherit">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewbox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round">
                          <path d="M9 6l6 6l-6 6"></path>
                        </svg>
                      </a>
                    </div>
                  </div>

                  <!-- Today Button -->
                  <div class="col-sm-4 col-md-2">
                    <div class="d-grid">
                      <button id="today-btn" class="btn btn-danger">Today</button>
                    </div>
                  </div>
                </div>

                <!-- Calendar -->
                <div class="position-relative z-0">
                  <div id="calendar" style="visibility: hidden; opacity: 0; transition: opacity 0.3s ease;"></div>
                </div>
              </div>

              <!-- <div id="calendar"></div> -->
            </div>
                                
                              
                                <div class="col-xxl-4 col-12">
                                <div class="card card-lg">
                                  <div class="card-body px-6 py-5">
                                    <div class="d-flex justify-content-between align-items-center mb-6">
                                      <h5 class="mb-0">Reservation Details</h5>
                                    </div>
                                    <div class="mb-3">
                                      <label class="form-label fw-bold">Facility:</label>
                                      <p id="facility-name" class="mb-1">-</p>
                                    </div>
                                    <div class="mb-3">
                                      <label class="form-label fw-bold">Capacity:</label>
                                      <p id="facility-capacity" class="mb-1">-</p>
                                    </div>
                                    <div class="mb-3">
                                      <label class="form-label fw-bold">Rate:</label>
                                      <p id="facility-rate" class="mb-1">-</p>
                                    </div>
                                    <div class="mb-3">
                                      <label class="form-label fw-bold">Selected Date:</label>
                                      <p id="selected-date" class="mb-1 text-primary fw-bold">Please select a date</p>
                                    </div>
                                  </div>
                                </div>
                              </div>
                            </div>
                            
                            <div class="mt-4">
                              <button type="button" class="btn btn-subtle-secondary me-2" id="prev-step">Previous</button>
                              <button type="button" class="btn btn-subtle-info" id="next-step" disabled>Next: Select Time</button>
                            </div>
                          </div>
                        </div>
                      </div>
                      
                      <!-- Step 3: Select Time -->
                      <div id="step-time" class="content" role="tabpanel" aria-labelledby="stepperFormtrigger3">
                        <div class="row">
                          <div class="col-12">
                            <div class="card">
                              <div class="card-body">
                                <h5 class="card-title mb-4">Select Time Slot</h5>
                                <p class="text-muted">Choose your preferred time slot for <span id="time-selected-date">the selected date</span></p>
                                
                                <!-- Time slots will be populated here -->
                                <div id="time-slots-container">
                                  <div class="row g-3">
                                    <!-- Time slots will be generated dynamically -->
                                  </div>
                                </div>
                                
                                <div class="mt-8">
                                  <button type="button" class="btn btn-subtle-secondary me-2" id="prev-step-2">Previous</button>
                                  <button type="button" class="btn btn-subtle-info" id="next-step-2" disabled>Next: Enter Information</button>
                                </div>
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>
                      
                      <!-- Step 4: Enter Information -->
                      <div id="step-info" class="content" role="tabpanel" aria-labelledby="stepperFormtrigger4">
                        <div class="row">
                          <div class="col-12">
                            <div class="card">
                              <div class="card-body">
                                <h5 class="card-title mb-4">Reservation Information</h5>
                                
                                <form id="reservation-form" novalidate>
                                  <div class="row">
                                    <div class="col-md-6">
                                      <div class="mb-3">
                                        <label for="contact-name" class="form-label">Contact Person Name <span class="text-danger">*</span></label>
                                        <input type="text" class="form-control" id="contact-name" required minlength="2" maxlength="100">
                                        <div class="invalid-feedback">Please enter a valid name (2-100 characters).</div>
                                      </div>
                                    </div>
                                    <div class="col-md-6">
                                      <div class="mb-3">
                                        <label for="contact-phone" class="form-label">Phone Number <span class="text-danger">*</span></label>
                                        <input type="tel" class="form-control" id="contact-phone" required pattern="[0-9]{10,15}" maxlength="15" placeholder="e.g., 09123456789">
                                        <div class="invalid-feedback">Please enter a valid phone number (10-15 digits only).</div>
                                      </div>
                                    </div>
                                  </div>
                                  
                                  <div class="row">
                                    <div class="col-md-6">
                                      <div class="mb-3">
                                        <label for="contact-email" class="form-label">Email Address <span class="text-danger">*</span></label>
                                        <input type="email" class="form-control" id="contact-email" required>
                                        <div class="invalid-feedback">Please enter a valid email address.</div>
                                      </div>
                                    </div>
                                    <div class="col-md-6">
                                      <div class="mb-3">
                                        <label for="organization" class="form-label">Organization/Department <span class="text-danger">*</span></label>
                                        <input type="text" class="form-control" id="organization" required minlength="2" maxlength="100">
                                        <div class="invalid-feedback">Please enter your organization or department.</div>
                                      </div>
                                    </div>
                                  </div>
                                  
                                  <div class="mb-3">
                                    <label for="event-purpose" class="form-label">Purpose of Event <span class="text-danger">*</span></label>
                                    <textarea class="form-control" id="event-purpose" rows="3" required minlength="5" maxlength="500"></textarea>
                                      <div class="invalid-feedback">Please describe the purpose of your event (5-500 characters).</div>
                                  </div>
                                  
                                    <div class="row">
                                    <div class="col-md-6">
                                      <div class="mb-3">
                                        <label for="expected-attendees" class="form-label">Expected Number of Attendees <span class="text-danger">*</span></label>
                                        <input type="number" class="form-control" id="expected-attendees" min="1" max="10000" required>
                                        <div class="invalid-feedback">Please enter the expected number of attendees (1-10000).</div>
                                      </div>
                                    </div>
                                   </div>
                                      <div class="mb-3">
                                        <label for="special-requirements" class="form-label">Special Requirements</label>
                                        <textarea class="form-control" id="special-requirements" rows="4" placeholder="e.g., projector, microphone, sound system, chairs, tables, etc." maxlength="500"></textarea>
                                        <small class="text-muted">Optional - List any special equipment or setup requirements</small>
                                      </div>
                                </form>
                                
                                <div class="mt-4">
                                  <button type="button" class="btn btn-subtle-secondary me-2" id="prev-step-3">Previous</button>
                                  <button type="button" class="btn btn-subtle-info" id="next-step-3">Next: Confirm Details</button>
                                </div>
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>
                      
                      <!-- Step 5: Confirm Details -->
                      <div id="step-confirm" class="content" role="tabpanel" aria-labelledby="stepperFormtrigger5">
                        <div class="row">
                          <div class="col-12">
                            <div class="card">
                              <div class="card-body">
                                <h5 class="card-title mb-4">Confirm Reservation Details</h5>
                                
                                <div class="row">
                                  <div class="col-md-8">
                                    <div class="card bg-light">
                                      <div class="card-body">
                                        <h6 class="card-title">Reservation Summary</h6>
                                        <div id="confirmation-details">
                                          <!-- Details will be populated here -->
                                        </div>
                                      </div>
                                    </div>
                                  </div>
                                  
                                  <div class="col-md-4">
                                    <div class="card">
                                      <div class="card-body">
                                        <h6 class="card-title">Total Cost</h6>
                                        <div class="fs-4 fw-bold text-primary" id="total-cost">₱0.00</div>
                                        <small class="text-muted">Applicable fees may apply</small>
                                      </div>
                                    </div>
                                  </div>
                                </div>
                                
                                <div class="mt-4">
                                  <button type="button" class="btn btn-subtle-secondary me-2" id="prev-step-4">Previous</button>
                                  <button type="button" class="btn btn-subtle-info" id="submit-reservation">Submit Reservation</button>
                                </div>
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                   
                  </div>
                </div>
              </div>
            </div>

      </div>

                
    <!-- Libs JS -->
<script src="<?php echo base_url(); ?>assets/libs/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
<script src="<?php echo base_url(); ?>assets/libs/simplebar/dist/simplebar.min.js"></script>

<!-- Theme JS -->
<script src="<?php echo base_url(); ?>assets/js/theme.min.js"></script>

    <script src="<?php echo base_url(); ?>assets/js/vendors/sidebarnav.js"></script>
    <script src="<?php echo base_url(); ?>assets/libs/apexcharts/dist/apexcharts.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/js/vendors/chart.js"></script>
    <script src="<?php echo base_url(); ?>assets/libs/swiper/swiper-bundle.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/js/vendors/swiper.js"></script>
    <script src="<?php echo base_url(); ?>assets/libs/fullcalendar/index.global.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/libs/flatpickr/dist/flatpickr.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/libs/bs-stepper/dist/js/bs-stepper.min.js"></script>
    
    <script>
    document.addEventListener('DOMContentLoaded', function() {
        // Function to show Bootstrap alert
        function showAlert(message, type, duration = 5000) {
            var alertContainer = document.getElementById('alert-container');
            var alertId = 'alert-' + Date.now();
            
            var alertHTML = `
                <div id="${alertId}" class="alert alert-${type} alert-dismissible fade show shadow-lg" role="alert">
                    <div class="d-flex align-items-start">
                        <div class="me-3">
                            ${type === 'success' ? 
                                '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="text-success"><path d="M22 11.08V12a10 10 0 1 1-5.93-9.14"></path><polyline points="22 4 12 14.01 9 11.01"></polyline></svg>' :
                                '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="text-danger"><circle cx="12" cy="12" r="10"></circle><line x1="15" y1="9" x2="9" y2="15"></line><line x1="9" y1="9" x2="15" y2="15"></line></svg>'
                            }
                        </div>
                        <div class="flex-grow-1">
                            <strong>${type === 'success' ? 'Success!' : 'Error!'}</strong>
                            <div class="mt-1">${message}</div>
                        </div>
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                </div>
            `;
            
            alertContainer.insertAdjacentHTML('beforeend', alertHTML);
            
            // Auto dismiss after duration
            if (duration > 0) {
                setTimeout(function() {
                    var alertElement = document.getElementById(alertId);
                    if (alertElement) {
                        var bsAlert = new bootstrap.Alert(alertElement);
                        bsAlert.close();
                    }
                }, duration);
            }
        }
        
        // Initialize the stepper
        var stepperElement = document.querySelector('#stepperForm');
        if (stepperElement) {
            var stepper = new Stepper(stepperElement);
            
            // Global variables to store reservation data
            var reservationData = {
                facility: '',
                capacity: '',
                rate: '',
                date: '',
                dateRange: {
                    start: '',
                    end: ''
                },
                time: '',
                timeSlots: {}, // Store time slots for each date in range
                duration: 1
            };
            
            // Store existing reservations for the selected facility
            var facilityReservations = [];
            var fullyReservedDates = [];
            
            // Handle Reserve Now button clicks
            document.querySelectorAll('.reserve-facility').forEach(function(button) {
                button.addEventListener('click', function() {
                    // Store facility data
                    reservationData.facility = this.dataset.facility;
                    reservationData.capacity = this.dataset.capacity;
                    reservationData.rate = this.dataset.rate;
                    
                    // Update the UI with selected facility
                    document.getElementById('selected-facility').textContent = reservationData.facility;
                    document.getElementById('facility-name').textContent = reservationData.facility;
                    document.getElementById('facility-capacity').textContent = reservationData.capacity + ' people';
                    document.getElementById('facility-rate').textContent = '₱' + parseInt(reservationData.rate).toLocaleString() + '/hour';
                    
                    // Fetch existing reservations for this facility
                    fetchFacilityReservations(reservationData.facility);
                    
                    // Move to next step
                    stepper.next();
                });
            });
            
            // Function to fetch reservations for a specific facility
            function fetchFacilityReservations(facilityName) {
                var today = new Date();
                var threeMonthsLater = new Date();
                threeMonthsLater.setMonth(threeMonthsLater.getMonth() + 3);
                
                var fromDate = today.toISOString().split('T')[0];
                var toDate = threeMonthsLater.toISOString().split('T')[0];
                
                fetch('<?php echo base_url(); ?>reservations/getReservationsByFacility?facility=' + encodeURIComponent(facilityName) + '&from_date=' + fromDate + '&to_date=' + toDate)
                    .then(response => response.json())
                    .then(data => {
                        if (data.success) {
                            facilityReservations = data.events;
                            
                            // Update calendar with reservations
                            if (calendar) {
                                calendar.removeAllEvents();
                                calendar.addEventSource(facilityReservations);
                                calendar.render();
                            }
                            
                            // Check for fully reserved dates
                            checkFullyReservedDates();
                        }
                    })
                    .catch(error => {
                        console.error('Error fetching reservations:', error);
                    });
            }
            
            // Function to check which dates are fully reserved
            function checkFullyReservedDates() {
                fullyReservedDates = [];
                var dateMap = {};
                
                // Group reservations by date
                facilityReservations.forEach(function(reservation) {
                    var date = reservation.start;
                    if (!dateMap[date]) {
                        dateMap[date] = [];
                    }
                    dateMap[date].push(reservation);
                });
                
                // Check each date if it has 9 time slots (fully reserved)
                Object.keys(dateMap).forEach(function(date) {
                    if (dateMap[date].length >= 9) {
                        fullyReservedDates.push(date);
                    }
                });
            }
            
            // Initialize FullCalendar for date selection
            var calendar = null; // Declare in broader scope
            var calendarEl = document.getElementById('calendar');
            if (calendarEl) {
                // Get today's date in local timezone and normalize to midnight
                var today = new Date();
                today.setHours(0, 0, 0, 0);
                var year = today.getFullYear();
                var month = String(today.getMonth() + 1).padStart(2, '0');
                var day = String(today.getDate()).padStart(2, '0');
                var todayStr = year + '-' + month + '-' + day;
                
                calendar = new FullCalendar.Calendar(calendarEl, {
                    initialView: 'dayGridMonth',
                    height: '65vh',
                    headerToolbar: false, // We'll use custom header
                    selectable: true,
                    selectMirror: true,
                    unselectAuto: false,
                    selectLongPressDelay: 0,
                    selectMinDistance: 0,
                    dayMaxEvents: true, // Show "more" link when many events
                    moreLinkClick: 'popover', // Show popover when clicking "more" link
                    validRange: {
                        start: '2020-01-01' // Allow selection from past dates (they'll be disabled via styling)
                    },
                    selectAllow: function(selectInfo) {
                        // Prevent selection of past dates
                        var selectDate = new Date(selectInfo.start);
                        selectDate.setHours(0, 0, 0, 0);
                        var selectYear = selectDate.getFullYear();
                        var selectMonth = String(selectDate.getMonth() + 1).padStart(2, '0');
                        var selectDay = String(selectDate.getDate()).padStart(2, '0');
                        var selectDateStr = selectYear + '-' + selectMonth + '-' + selectDay;
                        
                        return selectDateStr >= todayStr;
                    },
                    businessHours: {
                        daysOfWeek: [1, 2, 3, 4, 5, 6, 0], // Monday - Sunday
                        startTime: '08:00',
                        endTime: '18:00'
                    },
                    dayCellDidMount: function(info) {
                        var cellDate = new Date(info.date);
                        cellDate.setHours(0, 0, 0, 0);
                        var cellYear = cellDate.getFullYear();
                        var cellMonth = String(cellDate.getMonth() + 1).padStart(2, '0');
                        var cellDay = String(cellDate.getDate()).padStart(2, '0');
                        var cellDateStr = cellYear + '-' + cellMonth + '-' + cellDay;
                        
                        // Disable past dates only (not today)
                        if (cellDateStr < todayStr) {
                            info.el.classList.add('fc-day-disabled');
                            info.el.style.backgroundColor = 'rgba(0, 0, 0, 0.15)';
                            info.el.style.color = 'inherit';
                            info.el.style.cursor = 'not-allowed';
                            info.el.style.opacity = '0.9';
                            info.el.style.pointerEvents = 'none';
                        } else if (fullyReservedDates.includes(cellDateStr)) {
                            // Disable fully reserved dates
                            info.el.classList.add('fc-day-fully-reserved');
                            info.el.style.backgroundColor = '#ffebee';
                            info.el.style.color = '#c62828';
                            info.el.style.cursor = 'not-allowed';
                            info.el.style.pointerEvents = 'none';
                            
                            // Add a badge to show it's fully reserved
                            var badge = document.createElement('span');
                            badge.className = 'badge bg-danger position-absolute';
                            badge.style.fontSize = '8px';
                            badge.style.top = '2px';
                            badge.style.right = '2px';
                            badge.textContent = 'Full';
                            info.el.style.position = 'relative';
                            info.el.appendChild(badge);
                        } else {
                            info.el.classList.add('fc-day-available');
                            info.el.style.cursor = 'pointer';
                            
                            // Highlight dates with partial bookings
                            var hasBooking = facilityReservations.some(function(res) {
                                return res.start === cellDateStr;
                            });
                            if (hasBooking) {
                                info.el.style.backgroundColor = '#fff3cd';
                                info.el.classList.add('fc-day-partial-booking');
                            }
                        }
                    },
                    select: function(info) {
                        // Remove previous selection styling
                        document.querySelectorAll('.fc-day-selected, .fc-day-range-middle').forEach(function(el) {
                            el.classList.remove('fc-day-selected', 'fc-day-range-middle');
                        });
                        
                        var startDate = new Date(info.start);
                        var endDate = new Date(info.end);
                        endDate.setDate(endDate.getDate() - 1); // FullCalendar end is exclusive
                        
                        startDate.setHours(0, 0, 0, 0);
                        endDate.setHours(0, 0, 0, 0);
                        
                        // Format dates
                        var startYear = startDate.getFullYear();
                        var startMonth = String(startDate.getMonth() + 1).padStart(2, '0');
                        var startDay = String(startDate.getDate()).padStart(2, '0');
                        var startDateStr = startYear + '-' + startMonth + '-' + startDay;
                        
                        var endYear = endDate.getFullYear();
                        var endMonth = String(endDate.getMonth() + 1).padStart(2, '0');
                        var endDay = String(endDate.getDate()).padStart(2, '0');
                        var endDateStr = endYear + '-' + endMonth + '-' + endDay;
                        
                        // Check if any date in the range is disabled or fully reserved
                        var currentDate = new Date(startDate);
                        var hasDisabledDate = false;
                        var hasFullyReservedDate = false;
                        
                        while (currentDate <= endDate) {
                            var currYear = currentDate.getFullYear();
                            var currMonth = String(currentDate.getMonth() + 1).padStart(2, '0');
                            var currDay = String(currentDate.getDate()).padStart(2, '0');
                            var currDateStr = currYear + '-' + currMonth + '-' + currDay;
                            
                            if (currDateStr < todayStr) {
                                hasDisabledDate = true;
                                break;
                            }
                            
                            if (fullyReservedDates.includes(currDateStr)) {
                                hasFullyReservedDate = true;
                                break;
                            }
                            
                            currentDate.setDate(currentDate.getDate() + 1);
                        }
                        
                        if (hasDisabledDate) {
                            calendar.unselect();
                            showAlert('Cannot select past dates.', 'danger', 3000);
                            return false;
                        }
                        
                        if (hasFullyReservedDate) {
                            calendar.unselect();
                            showAlert('One or more dates in your selection are fully reserved.', 'danger', 4000);
                            return false;
                        }
                        
                        // Store date range
                        reservationData.dateRange.start = startDateStr;
                        reservationData.dateRange.end = endDateStr;
                        reservationData.date = startDateStr; // Keep for compatibility
                        
                        // Apply styling to selected range using setTimeout to ensure cells are rendered
                        setTimeout(function() {
                            var currentDate = new Date(startDate);
                            while (currentDate <= endDate) {
                                var cellYear = currentDate.getFullYear();
                                var cellMonth = String(currentDate.getMonth() + 1).padStart(2, '0');
                                var cellDay = String(currentDate.getDate()).padStart(2, '0');
                                var cellDateStr = cellYear + '-' + cellMonth + '-' + cellDay;
                                
                                // Find the day cell using FullCalendar's data attribute
                                var dayCell = calendarEl.querySelector('.fc-day[data-date="' + cellDateStr + '"]');
                                if (dayCell) {
                                    if (currentDate.getTime() === startDate.getTime() || currentDate.getTime() === endDate.getTime()) {
                                        dayCell.classList.add('fc-day-selected');
                                    } else {
                                        dayCell.classList.add('fc-day-range-middle');
                                    }
                                }
                                
                                currentDate.setDate(currentDate.getDate() + 1);
                            }
                        }, 50);
                        
                        // Update UI
                        var startOptions = { weekday: 'long', year: 'numeric', month: 'long', day: 'numeric' };
                        if (startDateStr === endDateStr) {
                            document.getElementById('selected-date').textContent = startDate.toLocaleDateString('en-US', startOptions);
                        } else {
                            var endOptions = { month: 'long', day: 'numeric', year: 'numeric' };
                            document.getElementById('selected-date').textContent = 
                                startDate.toLocaleDateString('en-US', startOptions) + ' - ' + 
                                endDate.toLocaleDateString('en-US', endOptions);
                        }
                        
                        // Enable next button
                        document.getElementById('next-step').disabled = false;
                    },
                    unselect: function() {
                        // Remove selection styling
                        document.querySelectorAll('.fc-day-selected, .fc-day-range-middle').forEach(function(el) {
                            el.classList.remove('fc-day-selected', 'fc-day-range-middle');
                        });
                    },
                    dayCellClassNames: function(info) {
                        var cellDate = new Date(info.date);
                        cellDate.setHours(0, 0, 0, 0);
                        var cellYear = cellDate.getFullYear();
                        var cellMonth = String(cellDate.getMonth() + 1).padStart(2, '0');
                        var cellDay = String(cellDate.getDate()).padStart(2, '0');
                        var cellDateStr = cellYear + '-' + cellMonth + '-' + cellDay;
                        
                        if (cellDateStr < todayStr) {
                            return ['fc-day-disabled'];
                        }
                        if (fullyReservedDates.includes(cellDateStr)) {
                            return ['fc-day-fully-reserved'];
                        }
                        return ['fc-day-available'];
                    },
                    datesSet: function() {
                        // Update calendar title when view changes
                        updateCalendarTitle();
                        // Show calendar after it's fully rendered
                        setTimeout(function() {
                            if (calendarEl) {
                                calendarEl.style.visibility = 'visible';
                                calendarEl.style.opacity = '1';
                            }
                        }, 100);
                    },
                    eventDidMount: function(info) {
                        // Get the date of this event
                        var eventDate = new Date(info.event.start);
                        eventDate.setHours(0, 0, 0, 0);
                        var eventYear = eventDate.getFullYear();
                        var eventMonth = String(eventDate.getMonth() + 1).padStart(2, '0');
                        var eventDay = String(eventDate.getDate()).padStart(2, '0');
                        var eventDateStr = eventYear + '-' + eventMonth + '-' + eventDay;
                        
                        // Get all events from the calendar for this specific date
                        var allEvents = calendar.getEvents();
                        var eventsOnDate = allEvents.filter(function(event) {
                            var evtDate = new Date(event.start);
                            evtDate.setHours(0, 0, 0, 0);
                            var evtYear = evtDate.getFullYear();
                            var evtMonth = String(evtDate.getMonth() + 1).padStart(2, '0');
                            var evtDay = String(evtDate.getDate()).padStart(2, '0');
                            var evtDateStr = evtYear + '-' + evtMonth + '-' + evtDay;
                            return evtDateStr === eventDateStr;
                        });
                        
                        // Build tooltip content
                        var tooltipContent = '<div style="padding: 5px;"><strong>Reserved Times on ' + 
                            eventDate.toLocaleDateString('en-US', { month: 'short', day: 'numeric', year: 'numeric' }) + 
                            ':</strong><ul style="margin: 8px 0 0 0; padding-left: 20px; list-style: disc;">';
                        
                        eventsOnDate.forEach(function(event) {
                            var timeSlot = event.extendedProps && event.extendedProps.time ? event.extendedProps.time : event.title;
                            tooltipContent += '<li style="margin: 2px 0;">' + timeSlot + '</li>';
                        });
                        
                        tooltipContent += '</ul></div>';
                        
                        // Add tooltip using Bootstrap's tooltip
                        if (typeof bootstrap !== 'undefined' && bootstrap.Tooltip) {
                            new bootstrap.Tooltip(info.el, {
                                html: true,
                                placement: 'top',
                                trigger: 'hover focus',
                                container: 'body',
                                title: tooltipContent,
                                customClass: 'reservation-tooltip'
                            });
                        }
                    },
                    eventClick: function(info) {
                        // Prevent default click behavior - only show tooltip on hover
                        info.jsEvent.preventDefault();
                        // Do nothing on click - tooltip will show on hover
                    }
                });
                
                // Function to update calendar title
                function updateCalendarTitle() {
                    var titleElement = document.getElementById('calendar-title');
                    if (titleElement) {
                        titleElement.textContent = calendar.view.title;
                    }
                }
                
                // Custom navigation controls
                var prevBtn = document.getElementById('prev-month');
                var nextBtn = document.getElementById('next-month');
                var todayBtn = document.getElementById('today-btn');
                var viewSelect = document.getElementById('calendar-view');
                
                if (prevBtn) {
                    prevBtn.addEventListener('click', function(e) {
                        e.preventDefault();
                        calendar.prev();
                        updateCalendarTitle();
                    });
                }
                
                if (nextBtn) {
                    nextBtn.addEventListener('click', function(e) {
                        e.preventDefault();
                        calendar.next();
                        updateCalendarTitle();
                    });
                }
                
                if (todayBtn) {
                    todayBtn.addEventListener('click', function(e) {
                        e.preventDefault();
                        calendar.today();
                        updateCalendarTitle();
                        
                        // Highlight today's date after navigating to today
                        setTimeout(function() {
                            // Remove previous selection
                            document.querySelectorAll('.fc-day-selected').forEach(function(el) {
                                el.classList.remove('fc-day-selected');
                            });
                            
                            // Find and select today's cell
                            var todayCells = document.querySelectorAll('.fc-day-today');
                            todayCells.forEach(function(cell) {
                                // Check if it's not disabled
                                if (!cell.classList.contains('fc-day-disabled')) {
                                    cell.classList.add('fc-day-selected');
                                    
                                    // Update reservation data
                                    reservationData.date = todayStr;
                                    
                                    // Update UI
                                    var dateObj = new Date();
                                    dateObj.setHours(0, 0, 0, 0);
                                    var options = { weekday: 'long', year: 'numeric', month: 'long', day: 'numeric' };
                                    document.getElementById('selected-date').textContent = dateObj.toLocaleDateString('en-US', options);
                                    
                                    // Enable next button
                                    document.getElementById('next-step').disabled = false;
                                }
                            });
                        }, 100);
                    });
                }
                
                if (viewSelect) {
                    viewSelect.addEventListener('change', function(e) {
                        calendar.changeView(e.target.value);
                        updateCalendarTitle();
                    });
                }
                
                // Render calendar
                calendar.render();
                
                // Add a global listener to prevent disabled dates from being selected
                calendarEl.addEventListener('click', function(e) {
                    var clickedDay = e.target.closest('.fc-day');
                    if (clickedDay && clickedDay.classList.contains('fc-day-disabled')) {
                        // Remove selected class if it was somehow added
                        setTimeout(function() {
                            clickedDay.classList.remove('fc-day-selected');
                        }, 0);
                    }
                });
                
                // Force initial render and title update with better timing
                setTimeout(function() {
                    if (calendar && calendarEl.offsetHeight > 0) {
                        calendar.render();
                        updateCalendarTitle();
                    }
                }, 100);
                
                // Additional render attempt after a longer delay
                setTimeout(function() {
                    if (calendar) {
                        calendar.render();
                        updateCalendarTitle();
                    }
                }, 500);
            }
            
            // Generate time slots for date range
            function generateTimeSlots() {
                var container = document.getElementById('time-slots-container').querySelector('.row');
                container.innerHTML = '<div class="col-12 text-center"><div class="spinner-border text-primary" role="status"><span class="visually-hidden">Loading...</span></div><p class="mt-2">Checking available time slots...</p></div>';
                
                var startDateStr = reservationData.dateRange.start;
                var endDateStr = reservationData.dateRange.end;
                
                // Generate array of dates in the range
                var dateArray = [];
                var currentDate = new Date(startDateStr);
                var endDate = new Date(endDateStr);
                
                while (currentDate <= endDate) {
                    var year = currentDate.getFullYear();
                    var month = String(currentDate.getMonth() + 1).padStart(2, '0');
                    var day = String(currentDate.getDate()).padStart(2, '0');
                    dateArray.push(year + '-' + month + '-' + day);
                    currentDate.setDate(currentDate.getDate() + 1);
                }
                
                // Reset time slots storage
                reservationData.timeSlots = {};
                
                // Fetch availability for all dates
                var fetchPromises = dateArray.map(function(dateStr) {
                    return fetch('<?php echo base_url(); ?>reservations/checkDateAvailability?facility=' + encodeURIComponent(reservationData.facility) + '&date=' + dateStr)
                        .then(response => response.json())
                        .then(data => ({ date: dateStr, data: data }));
                });
                
                Promise.all(fetchPromises)
                    .then(results => {
                        container.innerHTML = '';
                        
                        var allTimeSlots = [
                            { time: '08:00 AM - 09:00 AM', value: '08:00 AM - 09:00 AM' },
                            { time: '09:00 AM - 10:00 AM', value: '09:00 AM - 10:00 AM' },
                            { time: '10:00 AM - 11:00 AM', value: '10:00 AM - 11:00 AM' },
                            { time: '11:00 AM - 12:00 PM', value: '11:00 AM - 12:00 PM' },
                            { time: '12:00 PM - 01:00 PM', value: '12:00 PM - 01:00 PM' },
                            { time: '01:00 PM - 02:00 PM', value: '01:00 PM - 02:00 PM' },
                            { time: '02:00 PM - 03:00 PM', value: '02:00 PM - 03:00 PM' },
                            { time: '03:00 PM - 04:00 PM', value: '03:00 PM - 04:00 PM' },
                            { time: '04:00 PM - 05:00 PM', value: '04:00 PM - 05:00 PM' }
                        ];
                        
                        // Create sections for each date
                        results.forEach(function(result) {
                            var dateObj = new Date(result.date);
                            var dateOptions = { weekday: 'long', month: 'long', day: 'numeric', year: 'numeric' };
                            var dateDisplay = dateObj.toLocaleDateString('en-US', dateOptions);
                            
                            // Create date header
                            var dateHeader = document.createElement('div');
                            dateHeader.className = 'col-12 mt-4';
                            dateHeader.innerHTML = '<h5 class="mb-3">' + dateDisplay + '</h5>';
                            container.appendChild(dateHeader);
                            
                            if (!result.data.success || result.data.available_slots.length === 0) {
                                var noSlots = document.createElement('div');
                                noSlots.className = 'col-12';
                                noSlots.innerHTML = '<div class="alert alert-warning">All time slots are reserved for this date.</div>';
                                container.appendChild(noSlots);
                                return;
                            }
                            
                            // Create time slot cards for this date
                            allTimeSlots.forEach(function(slot) {
                                var isAvailable = result.data.available_slots.includes(slot.time);
                                
                                var col = document.createElement('div');
                                col.className = 'col-md-4 col-sm-6 mb-3';
                                
                                var card = document.createElement('div');
                                card.className = 'card time-slot-card';
                                
                                if (isAvailable) {
                                    card.style.cursor = 'pointer';
                                    card.dataset.date = result.date;
                                    card.dataset.time = slot.value;
                                    card.dataset.timeDisplay = slot.time;
                                    
                                    card.innerHTML = '<div class="card-body text-center py-3"><h6 class="mb-0">' + slot.time + '</h6></div>';
                                    
                                    card.addEventListener('click', function() {
                                        var date = this.dataset.date;
                                        var time = this.dataset.time;
                                        
                                        // Toggle selection for this specific date/time combination
                                        if (this.classList.contains('border-danger')) {
                                            this.classList.remove('border-danger', 'bg-light');
                                            delete reservationData.timeSlots[date];
                                        } else {
                                            // Remove other selections for this date
                                            document.querySelectorAll('.time-slot-card[data-date="' + date + '"]').forEach(function(el) {
                                                el.classList.remove('border-danger', 'bg-light');
                                            });
                                            
                                            this.classList.add('border-danger', 'bg-light');
                                            reservationData.timeSlots[date] = {
                                                time: time,
                                                display: this.dataset.timeDisplay
                                            };
                                        }
                                        
                                        // Check if all dates have time slots selected
                                        var allDatesHaveSlots = dateArray.every(function(d) {
                                            return reservationData.timeSlots[d] !== undefined;
                                        });
                                        
                                        // Enable next button only if all dates have slots
                                        document.getElementById('next-step-2').disabled = !allDatesHaveSlots;
                                    });
                                } else {
                                    card.style.cursor = 'not-allowed';
                                    card.style.opacity = '0.5';
                                    card.classList.add('bg-light', 'text-muted');
                                    card.innerHTML = '<div class="card-body text-center py-3"><h6 class="mb-0 text-muted">' + slot.time + '</h6><small class="text-danger">Reserved</small></div>';
                                }
                                
                                col.appendChild(card);
                                container.appendChild(col);
                            });
                        });
                        
                        // Add summary section
                        var summaryDiv = document.createElement('div');
                        summaryDiv.className = 'col-12 mt-4';
                        summaryDiv.innerHTML = '<div class="alert alert-info"><strong>Note:</strong> Please select a time slot for each date in your reservation range. You must select time slots for all ' + dateArray.length + ' date(s).</div>';
                        container.appendChild(summaryDiv);
                    })
                    .catch(error => {
                        console.error('Error fetching time slots:', error);
                        container.innerHTML = '<div class="col-12"><div class="alert alert-danger">Error loading time slots. Please try again.</div></div>';
                    });
            }
            
            // Navigation button handlers
            document.getElementById('prev-step').addEventListener('click', function() {
                stepper.previous();
            });
            
            document.getElementById('next-step').addEventListener('click', function() {
                // Update time step with selected date
                document.getElementById('time-selected-date').textContent = document.getElementById('selected-date').textContent;
                generateTimeSlots();
                stepper.next();
            });
            
            // Add event listener for when step becomes active
            var stepperFormElement = document.getElementById('stepperForm');
            if (stepperFormElement) {
                stepperFormElement.addEventListener('shown.bs-stepper', function (event) {
                    // If we're on the date selection step, ensure calendar is rendered
                    if (event.detail.to === 1) { // Step 2 (0-indexed)
                        setTimeout(function() {
                            if (calendar) {
                                calendar.render();
                                updateCalendarTitle();
                            }
                        }, 200);
                    }
                });
            }
            
            document.getElementById('prev-step-2').addEventListener('click', function() {
                stepper.previous();
            });
            
            document.getElementById('next-step-2').addEventListener('click', function() {
                stepper.next();
            });
            
            document.getElementById('prev-step-3').addEventListener('click', function() {
                stepper.previous();
            });
            
            // Phone number validation - only allow numeric input
            var phoneInput = document.getElementById('contact-phone');
            if (phoneInput) {
                phoneInput.addEventListener('input', function(e) {
                    // Remove any non-numeric characters
                    this.value = this.value.replace(/[^0-9]/g, '');
                });
                
                phoneInput.addEventListener('keypress', function(e) {
                    // Only allow numeric keys
                    if (e.which < 48 || e.which > 57) {
                        e.preventDefault();
                    }
                });
            }
            
            document.getElementById('next-step-3').addEventListener('click', function() {
                // Validate form
                var form = document.getElementById('reservation-form');
                
                // Add Bootstrap validation classes
                form.classList.add('was-validated');
                
                if (form.checkValidity()) {
                    // Store form data
                    reservationData.contactName = document.getElementById('contact-name').value;
                    reservationData.contactPhone = document.getElementById('contact-phone').value;
                    reservationData.contactEmail = document.getElementById('contact-email').value;
                    reservationData.organization = document.getElementById('organization').value;
                    reservationData.eventPurpose = document.getElementById('event-purpose').value;
                    reservationData.expectedAttendees = document.getElementById('expected-attendees').value;
                    reservationData.specialRequirements = document.getElementById('special-requirements').value;
                    
                    // Generate confirmation details
                    generateConfirmationDetails();
                    stepper.next();
                } else {
                    // Scroll to first invalid field
                    var firstInvalid = form.querySelector(':invalid');
                    if (firstInvalid) {
                        firstInvalid.focus();
                        firstInvalid.scrollIntoView({ behavior: 'smooth', block: 'center' });
                    }
                    
                    showAlert('Please fill in all required fields correctly.', 'danger', 4000);
                }
            });
            
            document.getElementById('prev-step-4').addEventListener('click', function() {
                stepper.previous();
            });
            
            function generateConfirmationDetails() {
                // Calculate total cost based on number of time slots
                var numberOfSlots = Object.keys(reservationData.timeSlots).length;
                var totalCost = parseInt(reservationData.rate) * numberOfSlots;
                
                var detailsHtml = '<div class="row">' +
                    '<div class="col-md-6"><strong>Facility:</strong><br>' + reservationData.facility + '</div>' +
                    '<div class="col-md-6"><strong>Date Range:</strong><br>' + document.getElementById('selected-date').textContent + '</div>' +
                    '</div><hr>';
                
                // Display time slots for each date
                detailsHtml += '<div><strong>Reserved Time Slots:</strong><br>';
                var timeSlotsList = '<ul class="list-unstyled mt-2">';
                
                Object.keys(reservationData.timeSlots).sort().forEach(function(dateStr) {
                    var dateObj = new Date(dateStr);
                    var dateOptions = { weekday: 'short', month: 'short', day: 'numeric', year: 'numeric' };
                    var formattedDate = dateObj.toLocaleDateString('en-US', dateOptions);
                    var timeSlot = reservationData.timeSlots[dateStr];
                    
                    timeSlotsList += '<li class="mb-2"><strong>' + formattedDate + ':</strong> ' + timeSlot.display + '</li>';
                });
                
                timeSlotsList += '</ul></div><hr>';
                detailsHtml += timeSlotsList;
                
                detailsHtml += '<div class="row">' +
                    '<div class="col-md-6"><strong>Contact Person:</strong><br>' + reservationData.contactName + '</div>' +
                    '<div class="col-md-6"><strong>Phone:</strong><br>' + reservationData.contactPhone + '</div>' +
                    '</div><hr>' +
                    '<div class="row">' +
                    '<div class="col-md-6"><strong>Email:</strong><br>' + reservationData.contactEmail + '</div>' +
                    '<div class="col-md-6"><strong>Organization:</strong><br>' + (reservationData.organization || 'N/A') + '</div>' +
                    '</div><hr>' +
                    '<div><strong>Purpose:</strong><br>' + reservationData.eventPurpose + '</div>';
                
                if (reservationData.expectedAttendees) {
                    detailsHtml += '<hr><div><strong>Expected Attendees:</strong> ' + reservationData.expectedAttendees + '</div>';
                }
                
                if (reservationData.specialRequirements) {
                    detailsHtml += '<hr><div><strong>Special Requirements:</strong><br>' + reservationData.specialRequirements + '</div>';
                }
                
                document.getElementById('confirmation-details').innerHTML = detailsHtml;
                document.getElementById('total-cost').textContent = '₱' + totalCost.toLocaleString() + '.00';
            }
            
            document.getElementById('submit-reservation').addEventListener('click', function() {
                var submitBtn = this;
                submitBtn.disabled = true;
                submitBtn.innerHTML = '<span class="spinner-border spinner-border-sm me-2"></span>Submitting...';
                
                // Prepare form data
                var formData = new FormData();
                formData.append('facility_name', reservationData.facility);
                formData.append('facility_capacity', reservationData.capacity);
                formData.append('facility_rate', reservationData.rate);
                formData.append('date_range_start', reservationData.dateRange.start);
                formData.append('date_range_end', reservationData.dateRange.end);
                formData.append('time_slots', JSON.stringify(reservationData.timeSlots));
                formData.append('contact_name', reservationData.contactName);
                formData.append('contact_phone', reservationData.contactPhone);
                formData.append('contact_email', reservationData.contactEmail);
                formData.append('organization', reservationData.organization);
                formData.append('event_purpose', reservationData.eventPurpose);
                formData.append('expected_attendees', reservationData.expectedAttendees);
                formData.append('special_requirements', reservationData.specialRequirements);
                formData.append('is_multi_day', Object.keys(reservationData.timeSlots).length > 1 ? '1' : '0');
                
                // Submit reservation via AJAX
                fetch('<?php echo base_url(); ?>reservations/submitReservation', {
                    method: 'POST',
                    body: formData
                })
                .then(response => response.json())
                .then(data => {
                    if (data.success) {
                        showAlert(data.message + '<br><small>Your reservation has been created and is pending approval. You will receive a confirmation email shortly.</small>', 'success', 6000);
                        
                        // Redirect to Manage Reservations page after showing the alert
                        setTimeout(function() {
                            window.location.href = '<?php echo base_url(); ?>reservations';
                        }, 2000);
                    } else {
                        showAlert(data.message, 'danger', 5000);
                        submitBtn.disabled = false;
                        submitBtn.innerHTML = 'Submit Reservation';
                    }
                })
                .catch(error => {
                    console.error('Error submitting reservation:', error);
                    showAlert('An error occurred while submitting your reservation. Please try again.', 'danger', 5000);
                    submitBtn.disabled = false;
                    submitBtn.innerHTML = 'Submit Reservation';
                });
            });
        }
    });
    </script>
    
    <style>
    /* Calendar Styling */
    #calendar {
        min-height: 400px;
        width: 100%;
    }
    
    /* Hide loading indicator and loading text */
    .fc .fc-popover {
        display: none !important;
    }
    
    .fc-loading {
        display: none !important;
    }
    
    /* Ensure calendar container is properly sized */
    .fc {
        width: 100% !important;
    }
    
    .fc-view-harness {
        height: auto !important;
    }
    
    .fc-day-selected {
        background-color: #F75757 !important;
        color: white !important;
    }
    
    .fc-day-range-middle {
        background-color: rgba(247, 87, 87, 0.2) !important;
        cursor: pointer;
    }
    
    .fc-day-available:hover {
        background-color: #e3f2fd !important;
        cursor: pointer;
        transition: background-color 0.2s ease;
    }
    
    .fc-day-disabled {
        background-color: rgba(0, 0, 0, 0.15) !important;
        color: inherit !important;
        cursor: not-allowed !important;
        opacity: 0.9 !important;
        pointer-events: none !important;
    }
    
    .fc-day-disabled:hover {
        background-color: rgba(0, 0, 0, 0.15) !important;
    }
    
    .fc-day-disabled:active {
        background-color: rgba(0, 0, 0, 0.15) !important;
    }
    
    /* Prevent past dates from being clickable */
    .fc-day-disabled .fc-daygrid-day-frame {
        pointer-events: none !important;
    }
    
    .fc-day-disabled * {
        pointer-events: none !important;
    }
    
    /* Prevent selected styling from being applied to disabled dates */
    .fc-day-disabled.fc-day-selected,
    .fc-day-disabled.fc-day-selected:hover,
    .fc-day-disabled.fc-day-selected:active {
        background-color: rgba(0, 0, 0, 0.15) !important;
        color: inherit !important;
    }
    
    /* Fully reserved dates styling */
    .fc-day-fully-reserved {
        background-color: #ffebee !important;
        color: #c62828 !important;
        cursor: not-allowed !important;
        pointer-events: none !important;
    }
    
    .fc-day-fully-reserved:hover {
        background-color: #ffebee !important;
    }
    
    .fc-day-fully-reserved .fc-daygrid-day-frame {
        pointer-events: none;
    }
    
    /* Partially reserved dates styling */
    .fc-day-partial-booking {
        background-color: #fff3cd !important;
    }
    
    .fc-day-partial-booking:hover {
        background-color: #ffe69c !important;
    }
    
    /* Event title container styling (reservation time badges) */
    .fc-event-title-container,
    .fc-daygrid-event-harness .fc-event,
    .fc-h-event {
        background-color: #000000 !important;
        border-color: #000000 !important;
        cursor: default;
    }
    
    .fc-event-title {
        color: #ffffff !important;
    }
    
    /* More link styling */
    .fc-daygrid-more-link {
        color: #0d6efd !important;
        font-weight: 500 !important;
        font-size: 0.85rem !important;
        text-decoration: none !important;
        cursor: pointer !important;
    }
    
    .fc-daygrid-more-link:hover {
        color: #0a58ca !important;
        text-decoration: underline !important;
    }
    
    .fc-more-popover {
        z-index: 1050 !important;
        box-shadow: 0 0.5rem 1rem rgba(0, 0, 0, 0.15) !important;
    }
    
    /* Tooltip styling for event hover */
    .tooltip {
        font-size: 13px;
    }
    
    .tooltip-inner {
        max-width: 300px;
        padding: 12px 15px;
        text-align: left;
        background-color: #2c3e50;
        border-radius: 6px;
        box-shadow: 0 4px 12px rgba(0, 0, 0, 0.3);
    }
    
    .tooltip-inner strong {
        color: #ffffff;
        font-weight: 600;
    }
    
    .tooltip-inner ul {
        color: #ecf0f1;
        margin-bottom: 0;
    }
    
    .tooltip-inner li {
        padding: 4px 0;
        color: #ecf0f1;
    }
    
    /* Bootstrap Alert Styling */
    #alert-container .alert {
        margin-bottom: 10px;
        border-radius: 8px;
        animation: slideInRight 0.3s ease-out;
    }
    
    @keyframes slideInRight {
        from {
            transform: translateX(100%);
            opacity: 0;
        }
        to {
            transform: translateX(0);
            opacity: 1;
        }
    }
    
    #alert-container .alert-success {
        background-color: #d1e7dd;
        border-color: #badbcc;
        color: #0f5132;
    }
    
    #alert-container .alert-danger {
        background-color: #f8d7da;
        border-color: #f5c2c7;
        color: #842029;
    }
    
    #alert-container .alert-info {
        background-color: #cff4fc;
        border-color: #b6effb;
        color: #055160;
    }
    
    #alert-container .alert svg {
        flex-shrink: 0;
    }
    
    /* Calendar header styling */
    .fc-header-toolbar {
        margin-bottom: 1rem !important;
    }
    
    .fc-button {
        background-color: #007bff !important;
        border-color: #007bff !important;
    }
    
    .fc-button:hover {
        background-color: #0056b3 !important;
        border-color: #0056b3 !important;
    }
    
    .fc-today-button {
        background-color: #28a745 !important;
        border-color: #28a745 !important;
    }
    
    /* Time slot cards */
    .time-slot-card {
        transition: all 0.3s ease;
        border: 2px solid transparent;
    }
    
    .time-slot-card:hover {
        border-color: #ff5630;
        transform: translateY(-2px);
        box-shadow: 0 4px 8px rgba(0,123,255,0.2);
    }
    
    .time-slot-card.border-primary {
        border-color: #007bff !important;
        background-color: #e3f2fd !important;
    }
    
    /* Card headers */
    .card-header {
        background-color: #f8f9fa;
        border-bottom: 1px solid #dee2e6;
    }
    
    .card-header.bg-primary {
        background-color: #007bff !important;
    }
    
    /* Custom Calendar Navigation */
    .calendar-title {
        font-size: 1.2rem;
        font-weight: 600;
    }
    
    #calendar-view {
        min-width: 120px;
    }
    
    #prev-month, #next-month {
        color: #6c757d;
        text-decoration: none;
        padding: 8px;
        border-radius: 4px;
        transition: all 0.2s ease;
    }
    
    #prev-month:hover, #next-month:hover {
        color: #007bff;
        background-color: #f8f9fa;
    }
    
    #today-btn {
        min-width: 80px;
    }
    
    /* Responsive calendar */
    @media (max-width: 991.98px) {
        #calendar {
            min-height: 400px;
        }
        
        .calendar-title {
            font-size: 1.1rem;
        }
        
        .fc-header-toolbar {
            flex-direction: column;
            gap: 10px;
        }

        .fc-daygrid-day-number {
            font-size: 0.9rem;
        }

        .fc-col-header-cell-cushion {
            font-size: 0.9rem;
        }
    }

    @media (max-width: 767.98px) {
        #calendar {
            min-height: 350px;
        }
        
        .calendar-title {
            font-size: 1rem;
            max-width: 150px;
            white-space: nowrap;
            overflow: hidden;
            text-overflow: ellipsis;
        }

        .fc-daygrid-day-number {
            font-size: 0.8rem;
            padding: 4px !important;
        }

        .fc-col-header-cell-cushion {
            font-size: 0.8rem;
            padding: 4px !important;
        }

        .fc-toolbar-chunk {
            display: flex;
            justify-content: center;
            width: 100%;
            margin-bottom: 0.5rem;
        }

        .fc-button {
            padding: 0.25rem 0.5rem !important;
            font-size: 0.875rem !important;
        }
    }

    @media (max-width: 575.98px) {
        #calendar {
            min-height: 300px;
        }

        .calendar-title {
            font-size: 0.9rem;
            max-width: 120px;
        }

        .fc-daygrid-day-number {
            font-size: 0.75rem;
            padding: 2px !important;
        }

        .fc-col-header-cell-cushion {
            font-size: 0.75rem;
            padding: 2px !important;
        }

        .fc-button {
            padding: 0.2rem 0.4rem !important;
            font-size: 0.8rem !important;
        }
    }
    </style>
    
    
  </body>
</html>




