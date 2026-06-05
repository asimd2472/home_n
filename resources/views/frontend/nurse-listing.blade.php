@extends('frontend.layouts.app')

@section('title', 'ProtoCut - Modern Manufacturing Service')

@push('styles')
<link rel="stylesheet" href="{{ asset('assets/css/nurse.css') }}">
@endpush

@section('content')

<!-- Search strip -->
<section class="search-strip">
  <div class="container">
    <div class="search-row">
      <div class="search-field">
        <i class="fa-solid fa-location-dot"></i>
        <input type="text" value="Ballygunge, Kolkata" placeholder="Enter your area">
      </div>
      <div class="search-field">
        <i class="fa-solid fa-user-nurse"></i>
        <input type="text" value="Elder Care Nurse" placeholder="Service type">
      </div>
      <button class="btn-search"><i class="fa-solid fa-magnifying-glass"></i><span>Search</span></button>
    </div>
    <div class="prime-tag d-none d-lg-flex">
      <span class="muted">Need urgent care?</span>
      <a href="#" class="prime-link">Book Priority Service <i class="fa-solid fa-circle-check"></i></a>
    </div>
  </div>
</section>

<!-- Filter bar -->
<section class="filter-bar">
  <div class="container">
    <div class="filter-row">
      <div class="filter-chip">
        <select><option>Gender</option><option>Female</option><option>Male</option></select>
      </div>
      <div class="filter-chip">
        <select><option>Experience</option><option>1-3 yrs</option><option>3-5 yrs</option><option>5+ yrs</option></select>
      </div>
      <div class="filter-chip">
        <select><option>Shift</option><option>Day</option><option>Night</option><option>24 Hours</option></select>
      </div>
      <div class="filter-chip">
        <select><option>Languages</option><option>English</option><option>Hindi</option><option>Bengali</option></select>
      </div>
      <div class="filter-chip">
        <select><option>All Filters</option></select>
      </div>
      <div class="filter-sort">
        <span>Sort By</span>
        <select><option>Relevance</option><option>Top Rated</option><option>Most Experienced</option><option>Lowest Fee</option></select>
      </div>
    </div>
  </div>
</section>

<!-- Listing -->
<section class="listing-section">
  <div class="container">
    <div class="row g-4">

      <!-- Main column -->
      <div class="col-lg-8">
        <div class="listing-head">
          <h1 class="listing-title">24 Verified Nurses available in Ballygunge, Kolkata</h1>
          <p class="listing-sub"><i class="fa-solid fa-circle-check"></i> Background-verified caregivers • Arrives within 60 min • No booking fee</p>
        </div>

        <!-- Nurse card -->
        <article class="nurse-card">
          <div class="nurse-photo">
            <img src="https://images.unsplash.com/photo-1559839734-2b71ea197ec2?w=300&q=80" alt="Priya Sharma">
            <span class="verified-dot" title="Verified"><i class="fa-solid fa-circle-check"></i></span>
          </div>
          <div class="nurse-body">
            <div class="nurse-top">
              <h3 class="nurse-name">Priya Sharma</h3>
              <p class="nurse-role">Elder Care Specialist</p>
              <p class="nurse-meta">8 years experience overall</p>
              <p class="nurse-location"><i class="fa-solid fa-location-dot"></i> Ballygunge, Kolkata</p>
              <div class="nurse-tags">
                <span class="tag tag-primary"><i class="fa-solid fa-shield-halved"></i> CareBond Assured</span>
                <span class="tag tag-soft">Elder Care + 3 more</span>
              </div>
              <p class="nurse-fee">₹1,200 <span>/ day shift at home</span> <i class="fa-regular fa-circle-question"></i></p>
            </div>
            <div class="nurse-rating">
              <span class="rating-pill"><i class="fa-solid fa-thumbs-up"></i> 96%</span>
              <a href="#" class="stories-link">128 Family Reviews</a>
            </div>
          </div>
          <div class="nurse-actions">
            <p class="avail"><i class="fa-regular fa-calendar-check"></i> Available Today</p>
            <button class="btn btn-book">Book Nurse<small>No Booking Fee</small></button>
            <button class="btn btn-contact"><i class="fa-solid fa-phone"></i> Contact</button>
          </div>
        </article>

        <article class="nurse-card">
          <div class="nurse-photo">
            <img src="https://images.unsplash.com/photo-1612349317150-e413f6a5b16d?w=300&q=80" alt="Anjali Das">
            <span class="verified-dot"><i class="fa-solid fa-circle-check"></i></span>
          </div>
          <div class="nurse-body">
            <div class="nurse-top">
              <h3 class="nurse-name">Anjali Das</h3>
              <p class="nurse-role">Post-Surgery Care Nurse</p>
              <p class="nurse-meta">12 years experience overall</p>
              <p class="nurse-location"><i class="fa-solid fa-location-dot"></i> Salt Lake, Kolkata</p>
              <div class="nurse-tags">
                <span class="tag tag-primary"><i class="fa-solid fa-shield-halved"></i> CareBond Assured</span>
                <span class="tag tag-soft">ICU + Wound Care</span>
              </div>
              <p class="nurse-fee">₹1,500 <span>/ 12 hr shift</span> <i class="fa-regular fa-circle-question"></i></p>
            </div>
            <div class="nurse-rating">
              <span class="rating-pill"><i class="fa-solid fa-thumbs-up"></i> 98%</span>
              <a href="#" class="stories-link">210 Family Reviews</a>
            </div>
          </div>
          <div class="nurse-actions">
            <p class="avail"><i class="fa-regular fa-calendar-check"></i> Available Tomorrow</p>
            <button class="btn btn-book">Book Nurse<small>No Booking Fee</small></button>
            <button class="btn btn-contact"><i class="fa-solid fa-phone"></i> Contact</button>
          </div>
        </article>

        <article class="nurse-card">
          <div class="nurse-photo">
            <img src="https://images.unsplash.com/photo-1582750433449-648ed127bb54?w=300&q=80" alt="Sunita Roy">
            <span class="verified-dot"><i class="fa-solid fa-circle-check"></i></span>
          </div>
          <div class="nurse-body">
            <div class="nurse-top">
              <h3 class="nurse-name">Sunita Roy</h3>
              <p class="nurse-role">Mother & Baby Care</p>
              <p class="nurse-meta">6 years experience overall</p>
              <p class="nurse-location"><i class="fa-solid fa-location-dot"></i> New Town, Kolkata</p>
              <div class="nurse-tags">
                <span class="tag tag-primary"><i class="fa-solid fa-shield-halved"></i> CareBond Assured</span>
                <span class="tag tag-soft">Newborn + Lactation</span>
              </div>
              <p class="nurse-fee">₹1,000 <span>/ day shift</span> <i class="fa-regular fa-circle-question"></i></p>
            </div>
            <div class="nurse-rating">
              <span class="rating-pill"><i class="fa-solid fa-thumbs-up"></i> 94%</span>
              <a href="#" class="stories-link">85 Family Reviews</a>
            </div>
          </div>
          <div class="nurse-actions">
            <p class="avail"><i class="fa-regular fa-calendar-check"></i> Available Today</p>
            <button class="btn btn-book">Book Nurse<small>No Booking Fee</small></button>
            <button class="btn btn-contact"><i class="fa-solid fa-phone"></i> Contact</button>
          </div>
        </article>

        <article class="nurse-card">
          <div class="nurse-photo">
            <img src="https://images.unsplash.com/photo-1594824476967-48c8b964273f?w=300&q=80" alt="Rajesh Kumar">
            <span class="verified-dot"><i class="fa-solid fa-circle-check"></i></span>
          </div>
          <div class="nurse-body">
            <div class="nurse-top">
              <h3 class="nurse-name">Rajesh Kumar</h3>
              <p class="nurse-role">Male Attendant & Physio Support</p>
              <p class="nurse-meta">10 years experience overall</p>
              <p class="nurse-location"><i class="fa-solid fa-location-dot"></i> Park Street, Kolkata</p>
              <div class="nurse-tags">
                <span class="tag tag-primary"><i class="fa-solid fa-shield-halved"></i> CareBond Assured</span>
                <span class="tag tag-soft">Mobility + Bedridden</span>
              </div>
              <p class="nurse-fee">₹1,300 <span>/ 12 hr shift</span> <i class="fa-regular fa-circle-question"></i></p>
            </div>
            <div class="nurse-rating">
              <span class="rating-pill"><i class="fa-solid fa-thumbs-up"></i> 92%</span>
              <a href="#" class="stories-link">156 Family Reviews</a>
            </div>
          </div>
          <div class="nurse-actions">
            <p class="avail"><i class="fa-regular fa-calendar-check"></i> Available Today</p>
            <button class="btn btn-book">Book Nurse<small>No Booking Fee</small></button>
            <button class="btn btn-contact"><i class="fa-solid fa-phone"></i> Contact</button>
          </div>
        </article>

        <!-- Pagination -->
        <nav class="pager">
          <button class="pg-btn" disabled><i class="fa-solid fa-chevron-left"></i></button>
          <button class="pg-btn active">1</button>
          <button class="pg-btn">2</button>
          <button class="pg-btn">3</button>
          <button class="pg-btn">4</button>
          <button class="pg-btn"><i class="fa-solid fa-chevron-right"></i></button>
        </nav>
      </div>

      <!-- Sidebar -->
      <aside class="col-lg-4">
        <div class="side-card">
          <h6>Why book on CareBond</h6>
          <ul class="side-list">
            <li><i class="fa-solid fa-shield-halved"></i><span>Police-verified, trained caregivers</span></li>
            <li><i class="fa-solid fa-bolt"></i><span>Arrives at your door within 60 minutes</span></li>
            <li><i class="fa-solid fa-rotate"></i><span>Free replacement if not satisfied</span></li>
            <li><i class="fa-solid fa-headset"></i><span>24×7 dedicated care manager</span></li>
          </ul>
        </div>

        <div class="side-card side-articles">
          <h6>Care Resources</h6>
          <ul class="link-list">
            <li><a href="#">Caring for elderly parents at home</a></li>
            <li><a href="#">Post-surgery recovery checklist</a></li>
            <li><a href="#">Newborn care: first 40 days</a></li>
            <li><a href="#">Diabetes management at home</a></li>
            <li><a href="#">Choosing the right home nurse</a></li>
          </ul>
        </div>

        <div class="side-card side-app">
          <h6>Get the CareBond App</h6>
          <p class="muted-sm">Book, manage and track your home nurse in seconds.</p>
          <div class="app-input">
            <span>+91</span>
            <input type="tel" placeholder="Enter your mobile number">
          </div>
          <button class="btn btn-book btn-block">Send App Link</button>
        </div>

        <div class="side-card side-brand">
          <div class="brand-row">
            <div class="brand-mark"><i class="fa-solid fa-heart-pulse"></i></div>
            <div>
              <strong>CareBond</strong>
              <p class="muted-sm m-0">India's trusted home-nursing platform</p>
            </div>
          </div>
          <ul class="stats">
            <li><strong>5,000+</strong><span>Verified Nurses</span></li>
            <li><strong>50,000+</strong><span>Families Served</span></li>
            <li><strong>120+</strong><span>Cities Covered</span></li>
            <li><strong>4.8 ★</strong><span>Average Rating</span></li>
          </ul>
        </div>
      </aside>
    </div>
  </div>
</section>


@endsection
