@extends('frontend.layouts.app')

@section('title', 'ProtoCut - Modern Manufacturing Service')

@section('content')

<!-- Hero -->
<section class="hero-section">
  <div class="container-fluid px-3 px-lg-4">
    <div class="row g-4 align-items-center">
      <div class="col-lg-6">
        <h1 class="hero-title">Verified Home Nurses for Your Loved Ones</h1>
        <p class="hero-sub d-none d-lg-block">Trusted, background-checked caregivers at your doorstep within 60 minutes.</p>

        <div class="services-card">
          {{-- <div class="row g-2 g-md-3">
            <div class="col-3"><div class="service-item"><div class="service-icon bg-blue-soft"><i class="fa-solid fa-user-nurse"></i></div><p>Full Day Nurse</p></div></div>
            <div class="col-3"><div class="service-item"><div class="service-icon bg-indigo-soft"><i class="fa-solid fa-moon"></i></div><p>Night Duty</p></div></div>
            <div class="col-3"><div class="service-item"><div class="service-icon bg-green-soft"><i class="fa-solid fa-person-cane"></i></div><p>Elder Care</p></div></div>
            <div class="col-3"><div class="service-item"><div class="service-icon bg-blue-soft"><i class="fa-solid fa-syringe"></i></div><p>Injection</p></div></div>

            <div class="col-3"><div class="service-item"><div class="service-icon bg-red-soft"><i class="fa-solid fa-user-doctor"></i></div><p>Post Surgery</p></div></div>
            <div class="col-3"><div class="service-item"><div class="service-icon bg-blue-soft"><i class="fa-solid fa-person-walking"></i></div><p>Physiotherapy</p></div></div>
            <div class="col-3"><div class="service-item"><div class="service-icon bg-gray-soft"><i class="fa-solid fa-bed-pulse"></i></div><p>ICU Trained</p></div></div>
            <div class="col-3"><div class="service-item"><div class="service-icon bg-orange-soft"><i class="fa-solid fa-baby"></i></div><p>Baby Care</p></div></div>
          </div> --}}

          <div class="row g-2 g-md-3">
            {{-- <div class="col-3"><div class="service-item"><div class="service-img bg-blue-soft"><img src="{{ asset('assets/icons/full-day-nurse.png') }}" alt="Full Day Nurse"></div><p>Full Day Nurse</p></div></div>
            <div class="col-3"><div class="service-item"><div class="service-img bg-indigo-soft"><img src="{{ asset('assets/icons/night-duty.png') }}" alt="Night Duty"></div><p>Night Duty</p></div></div>
            <div class="col-3"><div class="service-item"><div class="service-img bg-green-soft"><img src="{{ asset('assets/icons/elder-care.png') }}" alt="Elder Care"></div><p>Elder Care</p></div></div>
            <div class="col-3"><div class="service-item"><div class="service-img bg-blue-soft"><img src="{{ asset('assets/icons/injection.png') }}" alt="Injection"></div><p>Injection</p></div></div>

            <div class="col-3"><div class="service-item"><div class="service-img bg-red-soft"><img src="{{ asset('assets/icons/post-surgery.png') }}" alt="Post Surgery"></div><p>Post Surgery</p></div></div>
            <div class="col-3"><div class="service-item"><div class="service-img bg-blue-soft"><img src="{{ asset('assets/icons/physiotherapy.png') }}" alt="Physiotherapy"></div><p>Physiotherapy</p></div></div>
            <div class="col-3"><div class="service-item"><div class="service-img bg-gray-soft"><img src="{{ asset('assets/icons/icu-trained.png') }}" alt="ICU Trained"></div><p>ICU Trained</p></div></div>
            <div class="col-3"><div class="service-item"><div class="service-img bg-orange-soft"><img src="{{ asset('assets/icons/baby-care.png') }}" alt="Baby Care"></div><p>Baby Care</p></div></div> --}}
            {{-- @foreach($categories as $category)
            <div class="col-3">
              <a href="{{ route('service.area', ['category_slug' => $category->slug, 'area_slug' => 'kolkata']) }}">
                <div class="service-item">
                  <div class="service-img bg-blue-soft">
                    <img src="{{ asset('storage/'.$category->image_icon) }}" alt="{{$category->name}}">
                  </div>
                  <p>{{$category->name}}</p>
                </div>
              </a>
            </div>
            @endforeach --}}
            @foreach($categories as $category)
              <div class="col-3">
                  <a href="{{ url($category->slug.'-in-kolkata') }}">
                      <div class="service-item">
                          <div class="service-img bg-blue-soft">
                              <img src="{{ asset('storage/'.$category->image_icon) }}" alt="{{ $category->name }}">
                          </div>
                          <p>{{ $category->name }}</p>
                      </div>
                  </a>
              </div>
            @endforeach

          </div>


          <div class="trust-row">
            <div class="trust-item"><i class="fa-solid fa-shield-halved"></i><span>Verified & Background Checked</span></div>
            <div class="trust-item"><i class="fa-solid fa-clock"></i><span>Quick Booking in 60 Minutes</span></div>
            <div class="trust-item"><i class="fa-solid fa-headset"></i><span>24x7 Customer Support</span></div>
          </div>
        </div>
      </div>

      <div class="col-lg-6 d-none d-lg-block">
        {{-- <div class="hero-gallery">
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
        </div> --}}
        <div class="banner-img-wrap">
            <img src="{{ asset('assets/images/banner-collage.jpg') }}" alt="CareBond nursing services" class="banner-collage">
        </div>
      </div>
    </div>
  </div>
</section>

<!-- How It Works -->
<section class="howitworks-section">
  <div class="container">
    <div class="section-head">
      <span class="eyebrow">Simple Process</span>
      <h2 class="section-title">How It Works</h2>
      <p class="section-sub">Book a verified nurse in 4 easy steps</p>
    </div>
    <div class="steps-wrap">
      <div class="step-card">
        <span class="step-num">01</span>
        <div class="step-icon"><i class="fa-solid fa-list-check"></i></div>
        <h5>Choose Service</h5>
        <p>Select the care you need from our list</p>
      </div>
      <div class="step-card">
        <span class="step-num">02</span>
        <div class="step-icon"><i class="fa-solid fa-calendar-days"></i></div>
        <h5>Book Online</h5>
        <p>Pick date, time & confirm your booking</p>
      </div>
      <div class="step-card">
        <span class="step-num">03</span>
        <div class="step-icon"><i class="fa-solid fa-user-check"></i></div>
        <h5>Nurse Assigned</h5>
        <p>We assign a verified & experienced nurse</p>
      </div>
      <div class="step-card">
        <span class="step-num">04</span>
        <div class="step-icon"><i class="fa-solid fa-house-medical"></i></div>
        <h5>Care at Home</h5>
        <p>Nurse arrives & provides quality care</p>
      </div>
    </div>
  </div>
</section>

<!-- Why Choose + Become a Nurse -->
<section class="why-section">
  <div class="container">
    <div class="row g-4">
      <div class="col-lg-6">
        <div class="section-head text-lg-start">
          <span class="eyebrow">Why Us</span>
          <h2 class="section-title">Why Choose CareBond</h2>
          <p class="section-sub">Built on trust, verified care and 24x7 support</p>
        </div>
        <div class="row g-3 mt-1">
          <div class="col-md-6"><div class="why-card"><div class="why-icon"><i class="fa-solid fa-user-check"></i></div><div><h6>Verified Nurses</h6><p>All nurses are verified & background checked</p></div></div></div>
          <div class="col-md-6"><div class="why-card"><div class="why-icon"><i class="fa-solid fa-shield-halved"></i></div><div><h6>Background Checked</h6><p>Police verified for your peace of mind</p></div></div></div>
          <div class="col-md-6"><div class="why-card"><div class="why-icon"><i class="fa-solid fa-bolt"></i></div><div><h6>Fast Booking</h6><p>Get a nurse within 60 minutes</p></div></div></div>
          <div class="col-md-6"><div class="why-card"><div class="why-icon"><i class="fa-solid fa-headset"></i></div><div><h6>24x7 Support</h6><p>We are here to help anytime, anywhere</p></div></div></div>
          <div class="col-md-6"><div class="why-card"><div class="why-icon"><i class="fa-solid fa-tag"></i></div><div><h6>Affordable Pricing</h6><p>Transparent pricing with no hidden fees</p></div></div></div>
          <div class="col-md-6"><div class="why-card"><div class="why-icon"><i class="fa-solid fa-comments"></i></div><div><h6>Bengali & Hindi</h6><p>Local support for better communication</p></div></div></div>
        </div>
      </div>
      <div class="col-lg-6">
        <div class="become-nurse-card">
          <div class="row g-3 align-items-start">
            <div class="col-7">
              <h3>Become a Nurse</h3>
              <p class="mb-3">Earn More as an Independent Nurse</p>
              <ul class="benefits-list">
                <li><i class="fa-solid fa-circle-check"></i> Flexible Working Hours</li>
                <li><i class="fa-solid fa-circle-check"></i> Weekly Payouts</li>
                <li><i class="fa-solid fa-circle-check"></i> More Patient Opportunities</li>
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
              <div class="col-12"><button type="submit" class="btn w-100 register-btn">Register Now <i class="fa-solid fa-arrow-right ms-1"></i></button></div>
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
    <div class="section-head">
      <span class="eyebrow">Testimonials</span>
      <h2 class="section-title">What Families Say</h2>
      <p class="section-sub">Real stories from families we've helped</p>
    </div>
    <div id="testimonialCarousel" class="carousel slide" data-bs-ride="carousel" data-bs-interval="5000">
      <div class="carousel-inner">
        <div class="carousel-item active">
          <div class="row g-3">
            <div class="col-md-4"><div class="testimonial-card"><div class="stars">★★★★★</div><p>"Very good service! The nurse was punctual, well-behaved and took great care of my mother after surgery."</p><div class="reviewer"><img src="https://i.pravatar.cc/40?img=1" alt=""><span>Ananya S., Salt Lake</span></div></div></div>
            <div class="col-md-4"><div class="testimonial-card"><div class="stars">★★★★★</div><p>"I got a night duty nurse for my father. CareBond made the whole process very easy and reliable."</p><div class="reviewer"><img src="https://i.pravatar.cc/40?img=12" alt=""><span>Rahul D., Newtown</span></div></div></div>
            <div class="col-md-4"><div class="testimonial-card"><div class="stars">★★★★★</div><p>"Professional nurses and very supportive customer service. Highly recommended for elderly care."</p><div class="reviewer"><img src="https://i.pravatar.cc/40?img=5" alt=""><span>Priya M., Garia</span></div></div></div>
          </div>
        </div>
        <div class="carousel-item">
          <div class="row g-3">
            <div class="col-md-4"><div class="testimonial-card"><div class="stars">★★★★★</div><p>"Excellent ICU-trained nurse for my grandfather. Compassionate and skilled in every way possible."</p><div class="reviewer"><img src="https://i.pravatar.cc/40?img=20" alt=""><span>Sourav B., Behala</span></div></div></div>
            <div class="col-md-4"><div class="testimonial-card"><div class="stars">★★★★★</div><p>"Quick booking and the nurse arrived on time. Very professional and gentle with my newborn."</p><div class="reviewer"><img src="https://i.pravatar.cc/40?img=32" alt=""><span>Meera K., Howrah</span></div></div></div>
            <div class="col-md-4"><div class="testimonial-card"><div class="stars">★★★★★</div><p>"Affordable and reliable. CareBond is now our go-to for any home nursing needs."</p><div class="reviewer"><img src="https://i.pravatar.cc/40?img=45" alt=""><span>Arjun T., Park Street</span></div></div></div>
          </div>
        </div>
      </div>
      <button class="carousel-control-prev" type="button" data-bs-target="#testimonialCarousel" data-bs-slide="prev"><i class="fa-solid fa-chevron-left"></i></button>
      <button class="carousel-control-next" type="button" data-bs-target="#testimonialCarousel" data-bs-slide="next"><i class="fa-solid fa-chevron-right"></i></button>
      <div class="carousel-indicators custom-indicators">
        <button type="button" data-bs-target="#testimonialCarousel" data-bs-slide-to="0" class="active"></button>
        <button type="button" data-bs-target="#testimonialCarousel" data-bs-slide-to="1"></button>
      </div>
    </div>
  </div>
</section>

<!-- Areas We Serve -->
<section class="areas-section">
  <div class="container">
    <div class="section-head">
      <span class="eyebrow">Coverage</span>
      <h2 class="section-title">Areas We Serve in Kolkata</h2>
      <p class="section-sub">Serving families across the city</p>
    </div>
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
        <h4>Need an Urgent Nurse Within 60 Minutes?</h4>
        <p class="mb-0">We are available 24x7 for emergencies across Kolkata.</p>
      </div>
      <a href="#" class="btn call-now-btn"><i class="fa-solid fa-phone me-2"></i>Call Now</a>
    </div>
  </div>
</section>


@endsection