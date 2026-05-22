<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8" />
<meta name="viewport" content="width=device-width, initial-scale=1.0"/>
<title>CareBond - Verified Home Nurses</title>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
<link rel="preconnect" href="https://fonts.googleapis.com">
<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&display=swap" rel="stylesheet">

<link rel="stylesheet" href="{{ asset('assets/css/style.css') }}">

</head>
<body>

<!-- Header -->
<header class="site-header">
  <div class="container px-4">
    <div class="header-inner d-flex align-items-center justify-content-between">
      <a href="#" class="logo">LOGO</a>
      <nav class="main-nav d-none d-lg-flex">
        <a href="#" class="nav-link active">Home</a>
        <a href="#" class="nav-link">Services</a>
        <a href="#" class="nav-link">Become a Nurse</a>
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
        <button class="icon-btn"><i class="fa-solid fa-cart-shopping"></i></button>
        <button class="icon-btn"><i class="fa-regular fa-user"></i></button>
        <button class="icon-btn d-lg-none" id="mobileMenuBtn"><i class="fa-solid fa-bars"></i></button>
      </div>
    </div>
  </div>
</header>

<!-- Hero -->
<section class="hero-section">
  <div class="container px-4">
    <div class="row g-4">
      <div class="col-lg-6">
        <h1 class="hero-title">Verified Home Nurses<br>for Your <span class="text-primary-blue">Loved Ones</span></h1>

        <div class="services-card">
          <div class="row g-3">
            <div class="col-3"><div class="service-item"><div class="service-icon bg-blue-soft"><i class="fa-solid fa-user-nurse"></i></div><p>Full Day Nurse</p></div></div>
            <div class="col-3"><div class="service-item"><div class="service-icon bg-indigo-soft"><i class="fa-solid fa-moon"></i></div><p>Night Duty Nurse</p></div></div>
            <div class="col-3"><div class="service-item"><div class="service-icon bg-green-soft"><i class="fa-solid fa-person-cane"></i></div><p>Elder Care</p></div></div>
            <div class="col-3"><div class="service-item"><div class="service-icon bg-blue-soft"><i class="fa-solid fa-syringe"></i></div><p>Injection & Dressing</p></div></div>

            <div class="col-3"><div class="service-item"><div class="service-icon bg-red-soft"><i class="fa-solid fa-user-doctor"></i></div><p>Post Surgery Care</p></div></div>
            <div class="col-3"><div class="service-item"><div class="service-icon bg-blue-soft"><i class="fa-solid fa-person-walking"></i></div><p>Physiotherapy</p></div></div>
            <div class="col-3"><div class="service-item"><div class="service-icon bg-gray-soft"><i class="fa-solid fa-bed-pulse"></i></div><p>ICU Trained Nurse</p></div></div>
            <div class="col-3"><div class="service-item"><div class="service-icon bg-orange-soft"><i class="fa-solid fa-baby"></i></div><p>Baby Care</p></div></div>
          </div>

          <div class="trust-row">
            <div class="trust-item"><i class="fa-solid fa-shield-halved text-primary-blue"></i><span>Verified & Background Checked</span></div>
            <div class="trust-item"><i class="fa-solid fa-clock text-success"></i><span>Quick Booking in 60 Minutes</span></div>
            <div class="trust-item"><i class="fa-solid fa-headset text-primary-blue"></i><span>24x7 Customer Support</span></div>
          </div>
        </div>
      </div>

      <div class="col-lg-6">
        <div class="hero-gallery">
          <div class="g-img g1">
            <img src="https://images.unsplash.com/photo-1576765608535-5f04d1e3f289?w=800&q=80" alt="Nurse with elderly patient">
            <span class="g-badge"><i class="fa-solid fa-shield-halved"></i> Verified</span>
          </div>
          <div class="g-img g2">
            <img src="https://images.unsplash.com/photo-1666214280557-f1b5022eb634?w=600&q=80" alt="Nurse caring">
          </div>
          <div class="g-img g3">
            <img src="https://images.unsplash.com/photo-1584515933487-779824d29309?w=600&q=80" alt="Nurse helping elderly">
            <span class="g-badge badge-time"><i class="fa-solid fa-clock"></i> 60 min</span>
          </div>
          <div class="g-img g4">
            <img src="https://images.unsplash.com/photo-1559839734-2b71ea197ec2?w=600&q=80" alt="Doctor with patient">
          </div>
        </div>
      </div>
    </div>
  </div>
</section>

<!-- How It Works -->
<section class="howitworks-section">
  <div class="container">
    <h2 class="section-title">How <span class="text-primary-blue">It Works</span></h2>
    <div class="steps-wrap">
      <div class="step-card">
        <div class="step-icon bg-blue-soft"><i class="fa-solid fa-list-check"></i></div>
        <h5>1. Choose Service</h5>
        <p>Select the care you need from our list</p>
      </div>
      <div class="step-arrow"><i class="fa-solid fa-arrow-right"></i></div>
      <div class="step-card">
        <div class="step-icon bg-green-soft"><i class="fa-solid fa-calendar-days"></i></div>
        <h5>2. Book Online</h5>
        <p>Pick date, time & confirm your booking</p>
      </div>
      <div class="step-arrow"><i class="fa-solid fa-arrow-right"></i></div>
      <div class="step-card">
        <div class="step-icon bg-indigo-soft"><i class="fa-solid fa-user-check"></i></div>
        <h5>3. Verified Nurse Assigned</h5>
        <p>We assign a verified & experienced nurse</p>
      </div>
      <div class="step-arrow"><i class="fa-solid fa-arrow-right"></i></div>
      <div class="step-card">
        <div class="step-icon bg-orange-soft"><i class="fa-solid fa-house-medical"></i></div>
        <h5>4. Care at Home</h5>
        <p>Nurse arrives & provides quality care at home</p>
      </div>
    </div>
  </div>
</section>

<!-- Why Choose + Become a Nurse -->
<section class="why-section">
  <div class="container">
    <div class="row g-4">
      <div class="col-lg-6">
        <h2 class="section-title text-start">Why Choose</h2>
        <div class="row g-3 mt-1">
          <div class="col-md-6"><div class="why-card"><div class="why-icon bg-green-soft"><i class="fa-solid fa-user-check"></i></div><div><h6>Verified Nurses</h6><p>All nurses are verified & background checked</p></div></div></div>
          <div class="col-md-6"><div class="why-card"><div class="why-icon bg-blue-soft"><i class="fa-solid fa-shield-halved"></i></div><div><h6>Background Checked</h6><p>Police verified for your peace of mind</p></div></div></div>
          <div class="col-md-6"><div class="why-card"><div class="why-icon bg-orange-soft"><i class="fa-solid fa-bolt"></i></div><div><h6>Fast Booking</h6><p>Get a nurse within 60 minutes</p></div></div></div>
          <div class="col-md-6"><div class="why-card"><div class="why-icon bg-indigo-soft"><i class="fa-solid fa-headset"></i></div><div><h6>24x7 Support</h6><p>We are here to help anytime, anywhere</p></div></div></div>
          <div class="col-md-6"><div class="why-card"><div class="why-icon bg-orange-soft"><i class="fa-solid fa-tag"></i></div><div><h6>Affordable Pricing</h6><p>Transparent pricing with no hidden fees</p></div></div></div>
          <div class="col-md-6"><div class="why-card"><div class="why-icon bg-red-soft"><i class="fa-solid fa-comments"></i></div><div><h6>Bengali & Hindi Support</h6><p>Local support for better communication</p></div></div></div>
        </div>
      </div>
      <div class="col-lg-6">
        <div class="become-nurse-card">
          <div class="row g-3 align-items-start">
            <div class="col-7">
              <h3>Become a <span class="text-success">Nurse</span></h3>
              <p class="mb-3">Earn More as an Independent Nurse</p>
              <ul class="benefits-list">
                <li><i class="fa-solid fa-circle-check text-success"></i> Flexible Working Hours</li>
                <li><i class="fa-solid fa-circle-check text-success"></i> Weekly Payouts</li>
                <li><i class="fa-solid fa-circle-check text-success"></i> More Patient Opportunities</li>
              </ul>
            </div>
            <div class="col-5">
              <img src="https://images.unsplash.com/photo-1559839734-2b71ea197ec2?w=400" alt="Nurse" class="nurse-img">
            </div>
          </div>
          <form class="nurse-form mt-3">
            <div class="row g-2">
              <div class="col-md-6"><input type="text" class="form-control" placeholder="Full Name"></div>
              <div class="col-md-6"><input type="text" class="form-control" placeholder="Phone Number"></div>
              <div class="col-md-6">
                <select class="form-select"><option>Experience</option><option>0-1 years</option><option>1-3 years</option><option>3+ years</option></select>
              </div>
              <div class="col-md-6">
                <label class="upload-box"><i class="fa-solid fa-upload"></i> Upload Certificate<input type="file" hidden></label>
              </div>
              <div class="col-12"><small class="text-muted">PDF, JPG or PNG (Max 5MB)</small></div>
              <div class="col-12"><button type="submit" class="btn btn-success w-100 register-btn">Register Now <i class="fa-solid fa-arrow-right ms-1"></i></button></div>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
</section>

<!-- Testimonials -->
<section class="testimonials-section">
  <div class="container">
    <h2 class="section-title">What <span class="text-primary-blue">Families</span> Say</h2>
    <div id="testimonialCarousel" class="carousel slide" data-bs-ride="carousel">
      <div class="carousel-inner">
        <div class="carousel-item active">
          <div class="row g-3">
            <div class="col-md-4"><div class="testimonial-card"><div class="stars">★★★★★</div><p>"Very good service! The nurse was punctual, well-behaved and took great care of my mother after surgery."</p><div class="reviewer"><img src="https://i.pravatar.cc/40?img=1" alt=""><span>– Ananya S., Salt Lake</span></div></div></div>
            <div class="col-md-4"><div class="testimonial-card"><div class="stars">★★★★★</div><p>"I got a night duty nurse for my father. CareBond made the whole process very easy and reliable."</p><div class="reviewer"><img src="https://i.pravatar.cc/40?img=12" alt=""><span>– Rahul D., Newtown</span></div></div></div>
            <div class="col-md-4"><div class="testimonial-card"><div class="stars">★★★★★</div><p>"Professional nurses and very supportive customer service. Highly recommended for elderly care."</p><div class="reviewer"><img src="https://i.pravatar.cc/40?img=5" alt=""><span>– Priya M., Garia</span></div></div></div>
          </div>
        </div>
      </div>
      <button class="carousel-control-prev" data-bs-target="#testimonialCarousel" data-bs-slide="prev"><i class="fa-solid fa-chevron-left"></i></button>
      <button class="carousel-control-next" data-bs-target="#testimonialCarousel" data-bs-slide="next"><i class="fa-solid fa-chevron-right"></i></button>
      <div class="carousel-dots">
        <span class="dot active"></span><span class="dot"></span><span class="dot"></span><span class="dot"></span>
      </div>
    </div>
  </div>
</section>

<!-- Areas We Serve -->
<section class="areas-section">
  <div class="container">
    <h2 class="section-title">Areas <span class="text-primary-blue">We Serve</span> in <span class="text-primary-blue">Kolkata</span></h2>
    <div class="areas-grid">
      <div class="area-card"><img src="https://images.unsplash.com/photo-1582719508461-905c673771fd?w=300" alt=""><span>Salt Lake</span></div>
      <div class="area-card"><img src="https://images.unsplash.com/photo-1599661046289-e31897846e41?w=300" alt=""><span>Newtown</span></div>
      <div class="area-card"><img src="https://images.unsplash.com/photo-1564507592333-c60657eea523?w=300" alt=""><span>Dumdum</span></div>
      <div class="area-card"><img src="https://images.unsplash.com/photo-1587474260584-136574528ed5?w=300" alt=""><span>Behala</span></div>
      <div class="area-card"><img src="https://images.unsplash.com/photo-1599661046289-e31897846e41?w=300" alt=""><span>Garia</span></div>
      <div class="area-card"><img src="https://images.unsplash.com/photo-1564507592333-c60657eea523?w=300" alt=""><span>Howrah</span></div>
      <div class="area-card"><img src="https://images.unsplash.com/photo-1587474260584-136574528ed5?w=300" alt=""><span>Park Street</span></div>
    </div>
  </div>
</section>

<!-- Urgent CTA -->
<section class="urgent-section">
  <div class="container">
    <div class="urgent-banner">
      <img src="https://cdn-icons-png.flaticon.com/512/2967/2967350.png" alt="Ambulance" class="ambulance-img">
      <div class="urgent-text">
        <h4>Need an Urgent Nurse Within <span class="text-success">60 Minutes?</span></h4>
        <p class="mb-0">We are available 24x7 for emergencies across Kolkata.</p>
      </div>
      <a href="#" class="btn btn-danger call-now-btn">Call Now</a>
    </div>
  </div>
</section>

<!-- Footer -->
<footer class="site-footer">
  <div class="container">
    <div class="row g-4">
      <div class="col-lg-3 col-md-6">
        <div class="footer-logo">LOGO</div>
        <p>Trusted home nursing care services across Kolkata. Your loved ones are in safe hands.</p>
        <div class="social-icons">
          <a href="#"><i class="fa-brands fa-facebook-f"></i></a>
          <a href="#"><i class="fa-brands fa-instagram"></i></a>
          <a href="#"><i class="fa-brands fa-whatsapp"></i></a>
          <a href="#"><i class="fa-brands fa-youtube"></i></a>
        </div>
      </div>
      <div class="col-lg-2 col-md-6">
        <h6>Quick Links</h6>
        <ul><li><a href="#">Home</a></li><li><a href="#">Services</a></li><li><a href="#">Become a Nurse</a></li><li><a href="#">About Us</a></li><li><a href="#">Contact Us</a></li></ul>
      </div>
      <div class="col-lg-2 col-md-6">
        <h6>Our Services</h6>
        <ul><li><a href="#">Full Day Nurse</a></li><li><a href="#">Night Duty Nurse</a></li><li><a href="#">Elder Care</a></li><li><a href="#">Post Surgery Care</a></li><li><a href="#">Physiotherapy</a></li></ul>
      </div>
      <div class="col-lg-2 col-md-6">
        <h6>Support</h6>
        <ul><li><a href="#">Help Center</a></li><li><a href="#">FAQs</a></li><li><a href="#">Privacy Policy</a></li><li><a href="#">Terms & Conditions</a></li></ul>
      </div>
      <div class="col-lg-3 col-md-6">
        <h6>Contact Us</h6>
        <ul class="contact-list">
          <li><i class="fa-solid fa-location-dot"></i> Kolkata, West Bengal, India</li>
          <li><i class="fa-solid fa-phone"></i> +91 98765 43210</li>
          <li><i class="fa-solid fa-envelope"></i> support@carebond.com</li>
          <li><i class="fa-solid fa-clock"></i> Mon - Sun: 24x7</li>
        </ul>
      </div>
    </div>
    <hr>
    <div class="footer-bottom d-flex flex-wrap justify-content-between">
      <span>© 2024 CareBond. All Rights Reserved.</span>
      <span>Made with <i class="fa-solid fa-heart text-danger"></i> in Kolkata</span>
    </div>
  </div>
</footer>

<!-- Floating buttons -->
<div class="floating-buttons">
  <a href="tel:+919876543210" class="float-btn call-btn"><i class="fa-solid fa-phone"></i><span>Call<br>Now</span></a>
  <a href="https://wa.me/919876543210" class="float-btn whatsapp-btn"><i class="fa-brands fa-whatsapp"></i><span>WhatsApp</span></a>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
