<!DOCTYPE html>
<html lang="en" data-bs-theme="light" class="expanded">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<title><?php echo $page_title; ?></title>
<link rel="stylesheet" href="<?php echo base_url()?>assets/libs/swiper/swiper-bundle.min.css">
<link rel="stylesheet" href="<?php echo base_url()?>assets/libs/@tabler/icons-webfont/tabler-icons.min.css">
<link rel="apple-touch-icon" href="<?php echo base_url()?>assets/images/favicon/favicon.png">
<link rel="shortcut icon" type="image/png" href="<?php echo base_url()?>assets/images/favicon/favicon.png">

<meta name="msapplication-TileColor" content="#ffffff">
<meta name="msapplication-TileImage" content="<?php echo base_url()?>assets/images/favicon/ms-icon-144x144.png">
<meta name="theme-color" content="#ffffff">
<!-- Libs CSS -->
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Dancing+Script:wght@400..700&family=Figtree:ital,wght@0,300..900;1,300..900&family=Montserrat:ital,wght@0,100..900;1,100..900&family=Pacifico&display=swap" rel="stylesheet">
<link rel="stylesheet" href="<?php echo base_url()?>assets/libs/simplebar/dist/simplebar.min.css">
<link rel="stylesheet" href="<?php echo base_url()?>assets/libs/%40tabler/icons-webfont/tabler-icons.min.css">

<!-- Theme CSS -->
<link rel="stylesheet" href="<?php echo base_url()?>assets/css/theme.min.css">
<script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>

<script src="<?php echo base_url();?>assets/libs/toastr/tata.js"></script>
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>

    
<!-- Color modes -->
<script>
  // Check for saved theme preference or default to 'light'
  const getStoredTheme = () => localStorage.getItem('theme')
  const getPreferredTheme = () => {
    const storedTheme = getStoredTheme()
    if (storedTheme) {
      return storedTheme
    }
    return window.matchMedia('(prefers-color-scheme: dark)').matches ? 'dark' : 'light'
  }
  
  const setTheme = theme => {
    if (theme === 'auto' && window.matchMedia('(prefers-color-scheme: dark)').matches) {
      document.documentElement.setAttribute('data-bs-theme', 'dark')
    } else {
      document.documentElement.setAttribute('data-bs-theme', theme)
    }
  }
  
  setTheme(getPreferredTheme())
</script>
<script src="<?php echo base_url()?>assets/js/vendors/color-modes.js"></script>
<script>
  if (localStorage.getItem('sidebarExpanded') === 'false') {
    document.documentElement.classList.add('collapsed');
    document.documentElement.classList.remove('expanded');
  } else {
    document.documentElement.classList.remove('collapsed');
    document.documentElement.classList.add('expanded');
  }
</script>

<!-- Custom CSS for sidebar hover effects -->
<style>
/* miniSidebar theme-based background */
[data-bs-theme="light"] #miniSidebar {
  background-color: #CC1C02 !important;
}

[data-bs-theme="light"] #miniSidebar .brand-logo {
  background-color: #CC1C02 !important;
}

[data-bs-theme="dark"] #miniSidebar {
  background-color: var(--ds-gray-100) !important;
}

[data-bs-theme="dark"] #miniSidebar .brand-logo {
  background-color: var(--ds-gray-100) !important;
}

#miniSidebar .nav-link:hover {
  background-color: rgba(255, 255, 255, 0.1) !important;
  color: rgba(255, 255, 255, 0.9) !important;
}

#miniSidebar .nav-link:hover .nav-icon {
  color: rgba(255, 255, 255, 0.9) !important;
}

#miniSidebar .nav-link.active {
  background-color: rgba(255, 182, 193, 0.3) !important;
  color: rgba(255, 255, 255, 0.95) !important;
}

#miniSidebar .nav-link.active .nav-icon {
  color: rgba(255, 255, 255, 0.95) !important;
}

.offcanvasNav .nav-link:hover {
  background-color: rgba(0, 0, 0, 0.05) !important;
}

/* Mobile responsive improvements */
@media (max-width: 768px) {
  .custom-container {
    padding-left: 15px;
    padding-right: 15px;
  }
  
  .card-lg {
    margin-bottom: 1rem !important;
  }
  
  .row.g-6 {
    gap: 1rem !important;
  }
  
  .fs-1 {
    font-size: 2rem !important;
  }
  
  .calendar-title {
    font-size: 1.25rem !important;
  }
  
  .swiper-navigation {
    position: relative !important;
    top: auto !important;
    right: auto !important;
    margin: 10px 0 !important;
    text-align: center;
  }
  
  .swiper-navigation .swiper-button-prev,
  .swiper-navigation .swiper-button-next {
    position: relative !important;
    display: inline-block !important;
    margin: 0 10px !important;
  }
}

@media (max-width: 576px) {
  .card-body {
    padding: 1rem !important;
  }
  
  .icon-shape.icon-lg {
    width: 3rem !important;
    height: 3rem !important;
  }
  
  .bg-gray-100 {
    padding: 1rem !important;
  }
  
  .calendar-title {
    font-size: 1rem !important;
  }
}
</style>

  </head>
  <body>
      
      