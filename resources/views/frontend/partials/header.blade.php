<!-- Header -->
<header class="site-header">
  <div class="container-fluid px-3 px-lg-4">
    <div class="header-inner d-flex align-items-center justify-content-between">
      <a href="{{url('/')}}" class="logo">LOGO</a>
      <nav class="main-nav d-none d-lg-flex">
        <a href="{{url('/')}}" class="nav-link active">Home</a>
        <a href="#" class="nav-link">Services</a>
        <a href="{{url('/become-a-nurse')}}" class="nav-link">Become a Nurse</a>
        <a href="#" class="nav-link">About Us</a>
        <a href="#" class="nav-link">Contact</a>
      </nav>
      <div class="header-search d-none d-md-flex">
        <div class="location-box">
          <i class="fa-solid fa-location-dot"></i>
          <span>Old Ballygunge Road, ...</span>
          <i class="fa-solid fa-chevron-down ms-2 small"></i>
        </div>
        <div class="search-box">
          <i class="fa-solid fa-magnifying-glass"></i>
          <input type="text" placeholder="Search for 'AC service'">
        </div>
      </div>
      <div class="header-icons">
        <button class="icon-btn d-none d-sm-inline-flex"><i class="fa-solid fa-cart-shopping"></i></button>
        <button class="icon-btn d-none d-sm-inline-flex"><i class="fa-regular fa-user"></i></button>
        <button class="icon-btn d-lg-none" type="button" data-bs-toggle="offcanvas" data-bs-target="#mobileMenu" aria-controls="mobileMenu"><i class="fa-solid fa-bars"></i></button>
      </div>
    </div>
  </div>
</header>


<!-- Mobile offcanvas menu -->
<div class="offcanvas offcanvas-end mobile-offcanvas" tabindex="-1" id="mobileMenu">
  <div class="offcanvas-header">
    <h5 class="offcanvas-title">Menu</h5>
    <button type="button" class="btn-close" data-bs-dismiss="offcanvas"></button>
  </div>
  <div class="offcanvas-body">
    <nav class="mobile-nav">
      <a href="{{url('/')}}" class="nav-link active">Home</a>
      <a href="#" class="nav-link">Services</a>
      <a href="{{url('/become-a-nurse')}}" class="nav-link">Become a Nurse</a>
      <a href="#" class="nav-link">About Us</a>
      <a href="#" class="nav-link">Contact</a>
    </nav>
  </div>
</div>