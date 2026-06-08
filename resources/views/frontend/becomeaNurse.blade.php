@extends('frontend.layouts.app')

@section('title', 'Become a Nurse — CareBond')

@push('styles')
<link rel="stylesheet" href="{{ asset('assets/css/become-nurse.css') }}">
@endpush

@section('content')
<section class="bn-hero">
    <div class="container">
        <div class="bn-hero-inner">
            {{-- <span class="bn-badge">Join CareBond Family</span> --}}
            <h1>Become a Trusted <span class="text-grad">CareBond Nurse</span></h1>
            <p>Help thousands of families across Kolkata. Flexible hours, fair pay, real impact.</p>
            <div class="bn-hero-stats">
                <div><strong>500+</strong><span>Active Nurses</span></div>
                <div><strong>10k+</strong><span>Happy Families</span></div>
                <div><strong>₹25k+</strong><span>Avg. Monthly</span></div>
            </div>
        </div>
    </div>
</section>

<section class="bn-form-section">
    <div class="container">

        @if(session('success'))
            <div class="bn-alert success">
                <i class="fa-solid fa-circle-check"></i> {{ session('success') }}
            </div>
        @endif

        <div class="bn-card">

            {{-- Stepper --}}
            <div class="bn-stepper">
                @foreach(['Basic Details','Professional','Service Areas','Documents','Photo & Review'] as $i => $label)
                    <div class="bn-step {{ $i === 0 ? 'active' : '' }}" data-step="{{ $i+1 }}">
                        <div class="bn-step-num">{{ $i+1 }}</div>
                        <div class="bn-step-label">{{ $label }}</div>
                    </div>
                @endforeach
                <div class="bn-progress"><div class="bn-progress-bar" style="width:20%"></div></div>
            </div>

            <form id="nurseForm" action="{{ route('nurse.register.store') }}" method="POST" enctype="multipart/form-data" novalidate>
                @csrf

                {{-- ============ STEP 1: Basic Details ============ --}}
                <div class="bn-pane active" data-pane="1">
                    <h2 class="bn-pane-title">Tell us about yourself</h2>
                    <p class="bn-pane-sub">Basic information helps families know who they're hiring.</p>

                    <div class="bn-grid">
                        <div class="bn-field">
                            <label>Full Name <span class="required">*</span></label>
                            <input type="text" name="name" value="{{ old('name') }}" required>
                        </div>
                        <div class="bn-field">
                            <label>Phone Number <span class="required">*</span></label>
                            <input type="tel" name="phone" value="{{ old('phone') }}" required maxlength="10" pattern="[0-9]{10}">
                        </div>
                        <div class="bn-field">
                            <label>Email <span class="required">*</span></label>
                            <input type="email" name="email" value="{{ old('email') }}" required>
                        </div>
                        {{-- <div class="bn-field">
                            <label>Date of Birth <span class="required">*</span></label>
                            <input type="date" name="dob" value="{{ old('dob') }}" required>
                        </div> --}}
                        <div class="bn-field">
                            <label>Date of Birth <span class="required">*</span></label>
                            <input type="date" name="dob" id="dobInput"
                                value="{{ old('dob') }}" required>
                            <small class="bn-error" data-error-for="dob"></small>
                        </div>

                        <div class="bn-field">
                            <label>Gender <span class="required">*</span></label>
                            <div class="bn-radio-row">
                                @foreach(['Female','Male','Other'] as $g)
                                <label class="bn-radio">
                                    <input type="radio" name="gender" value="{{ $g }}" {{ old('gender')===$g?'checked':'' }} required>
                                    <span>{{ $g }}</span>
                                </label>
                                @endforeach
                            </div>
                        </div>
                    </div>

                    <div class="bn-actions">
                        <span></span>
                        <button type="button" class="bn-btn primary" data-next>Continue <i class="fa-solid fa-arrow-right"></i></button>
                    </div>
                </div>

                {{-- ============ STEP 2: Professional ============ --}}
                <div class="bn-pane" data-pane="2">
                    <h2 class="bn-pane-title">Your professional profile</h2>
                    <p class="bn-pane-sub">Showcase your skills, experience and pricing.</p>

                    <div class="bn-grid">
                        <div class="bn-field">
                            <label>Years of Experience <span class="required">*</span></label>
                            <input type="number" name="experience_years" min="0" max="60" value="{{ old('experience_years') }}" required>
                        </div>
                        <div class="bn-field">
                            <label>Price per Day (₹) <span class="required">*</span></label>
                            <input type="number" name="price_per_day" min="0" step="50" value="{{ old('price_per_day') }}" required>
                        </div>
                        <div class="bn-field">
                            <label>Price per Visit (₹) <span class="required">*</span></label>
                            <input type="number" name="price_per_visit" min="0" step="50" value="{{ old('price_per_visit') }}" required>
                        </div>
                    </div>

                    <div class="bn-field">
                        <label>Languages You Speak <span class="required">*</span></label>
                        <div class="bn-chips">
                            @foreach(['Bengali','Hindi','English','Urdu','Odia'] as $lang)
                            <label class="bn-chip">
                                <input type="checkbox" name="languages[]" value="{{ $lang }}" required>
                                <span>{{ $lang }}</span>
                            </label>
                            @endforeach
                        </div>
                    </div>

                    <div class="bn-field">
                        <label>Service Categories <span class="required">*</span> <small>(choose all that apply)</small></label>
                        <div class="bn-chips">
                            @foreach($categories as $cat)
                            <label class="bn-chip">
                                <input type="checkbox" name="categories[]" value="{{ $cat->id }}" required>
                                <span>{{ $cat->name }}</span>
                            </label>
                            @endforeach
                        </div>
                    </div>

                    <div class="bn-field">
                        <label>About You <span class="required">*</span></label>
                        <textarea name="about" rows="4" placeholder="Briefly describe your experience, specialities, what families can expect…" required>{{ old('about') }}</textarea>
                    </div>

                    <div class="bn-actions">
                        <button type="button" class="bn-btn ghost" data-prev><i class="fa-solid fa-arrow-left"></i> Back</button>
                        <button type="button" class="bn-btn primary" data-next>Continue <i class="fa-solid fa-arrow-right"></i></button>
                    </div>
                </div>

                {{-- ============ STEP 3: Service Areas ============ --}}
                <div class="bn-pane" data-pane="3">
                    <h2 class="bn-pane-title">Where can you serve?</h2>
                    <p class="bn-pane-sub">Pick the localities you're willing to travel to.</p>

                    <div class="bn-field">
                        <label>Service Areas <span class="required">*</span> (select one or more)</label>

                        <div class="bn-areas-toolbar">
                            <div class="bn-search-wrap">
                                <i class="fa fa-search"></i>
                                <input type="text" id="areaSearch" placeholder="Search areas…">
                            </div>
                            <label class="bn-selectall">
                                <input type="checkbox" id="areaSelectAll">
                                <span>Select All</span>
                            </label>
                            <span class="bn-area-count"><span id="areaSelectedCount">0</span> selected</span>
                        </div>

                        <div class="bn-chips bn-chips-scroll" id="areaList">
                            @foreach($areas as $area)
                            <label class="bn-chip area-chip" data-name="{{ strtolower($area->area_name) }}">
                                <input type="checkbox" name="areas[]" value="{{ $area->id }}" class="area-cb">
                                <span>{{ $area->area_name }}</span>
                            </label>
                            @endforeach
                        </div>
                        <small class="bn-error" id="areasError"></small>
                    </div>

                    <div class="bn-grid">
                        <div class="bn-field bn-col-2">
                            <label>Current Address <span class="required">*</span></label>
                            <input type="text" name="address" value="{{ old('address') }}" placeholder="Ballygunge" required>
                        </div>
                        <div class="bn-field">
                            <label>City <span class="required">*</span></label>
                            <input type="text" name="city" value="{{ old('city', 'Kolkata') }}" required>
                        </div>
                        <div class="bn-field">
                            <label>State <span class="required">*</span></label>
                            <input type="text" name="state" value="{{ old('state', 'West Bengal') }}" required>
                        </div>
                        <div class="bn-field">
                            <label>Pincode <span class="required">*</span></label>
                            <input type="text" name="pincode" maxlength="6" value="{{ old('pincode') }}" required pattern="[0-9]{6}">
                        </div>
                    </div>

                    <div class="bn-actions">
                        <button type="button" class="bn-btn ghost" data-prev><i class="fa-solid fa-arrow-left"></i> Back</button>
                        <button type="button" class="bn-btn primary" data-next>Continue <i class="fa-solid fa-arrow-right"></i></button>
                    </div>
                </div>

                


                {{-- ============ STEP 4: Documents ============ --}}
                <div class="bn-pane" data-pane="4">
                    <h2 class="bn-pane-title">Verify your identity</h2>
                    <p class="bn-pane-sub">Your documents are encrypted and visible only to our verification team.</p>

                    <div class="bn-grid">
                        <div class="bn-field">
                            <label>Identity Proof Type <span class="required">*</span></label>
                            <select name="identity_proof_type" required>
                                <option value="">Select…</option>
                                <option value="Aadhaar">Aadhaar Card</option>
                                <option value="PAN">PAN Card</option>
                                <option value="Voter ID">Voter ID</option>
                                <option value="Driving License">Driving License</option>
                            </select>
                        </div>
                        <div class="bn-field">
                            <label>ID Number <span class="required">*</span></label>
                            <input type="text" name="identity_proof_number" required>
                        </div>
                    </div>

                    <div class="bn-grid">
                        <div class="bn-field">
                            <label>ID Proof — Front <span class="required">*</span></label>
                            <div class="bn-upload" data-target="idFront">
                                <i class="fa-solid fa-cloud-arrow-up"></i>
                                <span>Click to upload (JPG/PNG, max 4MB)</span>
                                <input type="file" id="idFront" name="identity_proof_front" accept="image/*" required>
                            </div>
                        </div>
                        <div class="bn-field">
                            <label>ID Proof — Back <span class="required">*</span></label>
                            <div class="bn-upload" data-target="idBack">
                                <i class="fa-solid fa-cloud-arrow-up"></i>
                                <span>Click to upload (optional)</span>
                                <input type="file" id="idBack" name="identity_proof_back" accept="image/*" required>
                            </div>
                        </div>
                    </div>

                    <div class="bn-divider"><span>Nursing Certification</span></div>

                    <div class="bn-grid">
                        <div class="bn-field">
                            <label>Certificate Number <span class="required">*</span></label>
                            <input type="text" name="certificate_number" value="{{ old('certificate_number') }}" required>
                        </div>
                        <div class="bn-field">
                            <label>Certificate Document <span class="required">*</span></label>
                            <div class="bn-upload" data-target="certDoc">
                                <i class="fa-solid fa-file-arrow-up"></i>
                                <span>PDF/JPG/PNG, max 6MB</span>
                                <input type="file" id="certDoc" name="certificate_document" accept=".pdf,image/*" required>
                            </div>
                        </div>
                    </div>

                    <div class="bn-actions">
                        <button type="button" class="bn-btn ghost" data-prev><i class="fa-solid fa-arrow-left"></i> Back</button>
                        <button type="button" class="bn-btn primary" data-next>Continue <i class="fa-solid fa-arrow-right"></i></button>
                    </div>
                </div>

                {{-- ============ STEP 5: Photo & Review ============ --}}
                {{-- <div class="bn-pane" data-pane="5">
                    <h2 class="bn-pane-title">Almost done!</h2>
                    <p class="bn-pane-sub">Add a friendly profile photo and submit your application.</p>

                    <div class="bn-photo-wrap">
                        <div class="bn-avatar">
                            <img id="avatarPreview" src="{{ asset('assets/images/avatar-placeholder.png') }}" alt="Preview">
                        </div>
                        <div class="bn-upload" data-target="avatarInput">
                            <i class="fa-solid fa-camera"></i>
                            <span>Upload Profile Photo <span class="required">*</span></span>
                            <input type="file" id="avatarInput" name="profile_image" accept="image/*" required>
                        </div>
                    </div>

                    <div class="bn-terms">
                        <label class="bn-check">
                            <input type="checkbox" id="agreeTerms" required>
                            <span>I confirm all information provided is accurate and agree to CareBond's <a href="#">Terms of Service</a> and <a href="#">Privacy Policy</a>.</span>
                        </label>
                    </div>

                    <div class="bn-actions">
                        <button type="button" class="bn-btn ghost" data-prev><i class="fa-solid fa-arrow-left"></i> Back</button>
                        <button type="submit" class="bn-btn primary lg">
                            <i class="fa-solid fa-paper-plane"></i> Submit Application
                        </button>
                    </div>
                </div> --}}

                <div class="bn-pane" data-pane="5">
                    <h3 class="bn-pane-title">Almost done!</h3>
                    <p class="bn-pane-sub">Add a profile photo, review your details, and submit.</p>

                    <div class="bn-photo-wrap">
                        <div class="bn-avatar">
                            <img id="avatarPreview" src="{{ asset('assets/images/avatar-placeholder.png') }}" alt="Preview">
                        </div>
                        <div class="bn-upload" id="avatarBox">
                            <i class="fa fa-camera"></i>
                            <span>Upload Profile Photo *</span>
                            <input type="file" id="avatarInput" name="profile_image" accept="image/*" required>
                        </div>
                    </div>

                    {{-- Review summary --}}
                    <div class="bn-review" id="reviewPanel">
                        <h4 class="bn-review-title"><i class="fa fa-clipboard-check"></i> Review Your Application</h4>

                        <div class="bn-review-grid">
                            <div class="bn-review-block">
                                <h5>Basic Details</h5>
                                <ul>
                                    <li><b>Name:</b> <span data-review="name">—</span></li>
                                    <li><b>Phone:</b> <span data-review="phone">—</span></li>
                                    <li><b>Email:</b> <span data-review="email">—</span></li>
                                    <li><b>DOB:</b> <span data-review="dob">—</span></li>
                                    <li><b>Gender:</b> <span data-review="gender">—</span></li>
                                </ul>
                            </div>
                            <div class="bn-review-block">
                                <h5>Professional</h5>
                                <ul>
                                    <li><b>Experience:</b> <span data-review="experience">—</span> yrs</li>
                                    <li><b>Price/Day:</b> ₹<span data-review="price_per_day">—</span></li>
                                    <li><b>Price/Visit:</b> ₹<span data-review="price_per_visit">—</span></li>
                                    <li><b>Languages:</b> <span data-review="languages">—</span></li>
                                    <li><b>Categories:</b> <span data-review="categories">—</span></li>
                                </ul>
                            </div>
                            <div class="bn-review-block">
                                <h5>Service & Address</h5>
                                <ul>
                                    <li><b>Areas:</b> <span data-review="areas">—</span></li>
                                    <li><b>Address:</b> <span data-review="address">—</span></li>
                                    <li><b>City:</b> <span data-review="city">—</span></li>
                                    <li><b>State:</b> <span data-review="state">—</span></li>
                                    <li><b>Pincode:</b> <span data-review="pincode">—</span></li>
                                </ul>
                            </div>
                            <div class="bn-review-block">
                                <h5>Documents</h5>
                                <ul>
                                    <li><b>ID Type:</b> <span data-review="id_proof_type">—</span></li>
                                    <li><b>ID No:</b> <span data-review="id_proof_number">—</span></li>
                                    <li><b>Certificate No:</b> <span data-review="certificate_number">—</span></li>
                                </ul>
                            </div>
                            <div class="bn-review-block bn-col-2">
                                <h5>About You</h5>
                                <p data-review="about">—</p>
                            </div>
                        </div>
                    </div>

                    <div class="bn-terms">
                        <label class="bn-check">
                            <input type="checkbox" id="agreeTerms">
                            <span>I confirm all information is accurate and agree to CareBond's <a href="#">Terms</a> & <a href="#">Privacy Policy</a>.</span>
                        </label>
                    </div>

                    <div class="bn-actions">
                        <button type="button" class="bn-btn ghost" data-prev><i class="fa fa-arrow-left"></i> Back</button>
                        <button type="submit" class="bn-btn primary lg">
                            <i class="fa fa-paper-plane"></i> Submit Application
                        </button>
                    </div>
                </div>


            </form>
        </div>
    </div>
</section>
@endsection

@push('scripts')
<script>
(function(){
    const MAX_FILE_KB = 500;
    const panes = document.querySelectorAll('.bn-pane');
    const steps = document.querySelectorAll('.bn-step');
    const bar   = document.querySelector('.bn-progress-bar');
    const form  = document.getElementById('nurseForm');
    let current = 1;
    const total = panes.length;

    /* --- DOB: min 20 years old --- */
    const dob = document.getElementById('dobInput');
    if (dob) {
        const d = new Date();
        d.setFullYear(d.getFullYear() - 20);
        const max = d.toISOString().split('T')[0];
        dob.max = max;
        // also set a sensible min (e.g. 65 years old max)
        const dmin = new Date();
        dmin.setFullYear(dmin.getFullYear() - 65);
        dob.min = dmin.toISOString().split('T')[0];
    }

    /* --- Inline validation helper --- */
    function showFieldError(field, msg){
        field.classList.add('is-invalid');
        let small = field.parentElement.querySelector('.bn-error');
        if (!small){
            small = document.createElement('small');
            small.className = 'bn-error';
            field.parentElement.appendChild(small);
        }
        small.textContent = msg;
    }
    function clearFieldError(field){
        field.classList.remove('is-invalid');
        const small = field.parentElement.querySelector('.bn-error');
        if (small) small.textContent = '';
    }
    document.querySelectorAll('.bn-pane input, .bn-pane select, .bn-pane textarea').forEach(f => {
        f.addEventListener('input', () => clearFieldError(f));
        f.addEventListener('change', () => clearFieldError(f));
    });

    function show(n){
        panes.forEach(p => p.classList.toggle('active', +p.dataset.pane === n));
        steps.forEach(s => {
            const num = +s.dataset.step;
            s.classList.toggle('active', num === n);
            s.classList.toggle('done', num < n);
        });
        bar.style.width = ((n/total)*100) + '%';
        window.scrollTo({top: document.querySelector('.bn-card').offsetTop - 80, behavior:'smooth'});
        current = n;
        if (n === total) buildReview();
    }

    function validatePane(n){
        const pane = document.querySelector(`.bn-pane[data-pane="${n}"]`);
        let ok = true;
        pane.querySelectorAll('[required]').forEach(f => {
            if (f.type === 'radio' || f.type === 'checkbox') return;
            if (!f.value.trim()){
                showFieldError(f, 'This field is required');
                ok = false;
            } else if (!f.checkValidity()){
                showFieldError(f, f.validationMessage);
                ok = false;
            } else {
                clearFieldError(f);
            }
        });

        // DOB age check
        if (n === 1 && dob && dob.value){
            const age = (new Date() - new Date(dob.value)) / (365.25*24*3600*1000);
            if (age < 20){ showFieldError(dob, 'You must be at least 20 years old'); ok = false; }
        }

        // Gender
        if (n === 1 && !pane.querySelector('input[name="gender"]:checked')){
            alert('Please select gender'); ok = false;
        }
        if (n === 2){
            if (!pane.querySelector('input[name="languages[]"]:checked')){ alert('Select at least one language'); return false; }
            if (!pane.querySelector('input[name="categories[]"]:checked')){ alert('Select at least one category'); return false; }
        }
        if (n === 3){
            const err = document.getElementById('areasError');
            if (!pane.querySelector('input[name="areas[]"]:checked')){
                if (err) err.textContent = 'Please select at least one service area';
                ok = false;
            } else if (err) err.textContent = '';
        }
        return ok;
    }

    document.querySelectorAll('[data-next]').forEach(b => b.addEventListener('click', () => {
        if (validatePane(current) && current < total) show(current+1);
    }));
    document.querySelectorAll('[data-prev]').forEach(b => b.addEventListener('click', () => {
        if (current > 1) show(current-1);
    }));

    /* --- File uploads with 500 KB cap --- */
    document.querySelectorAll('.bn-upload').forEach(box => {
        const input = box.querySelector('input[type=file]');
        if (!input) return;
        box.addEventListener('click', e => { if (e.target !== input) input.click(); });
        input.addEventListener('change', () => {
            const f = input.files[0];
            if (!f) return;
            if (f.size > MAX_FILE_KB * 1024){
                alert(`"${f.name}" is ${(f.size/1024).toFixed(0)} KB. Max allowed is ${MAX_FILE_KB} KB.`);
                input.value = '';
                box.classList.remove('has-file');
                return;
            }
            box.classList.add('has-file');
            const label = box.querySelector('span');
            if (label) label.textContent = f.name;
        });
    });

    /* --- Avatar preview --- */
    const avatarInput = document.getElementById('avatarInput');
    const avatarPreview = document.getElementById('avatarPreview');
    if (avatarInput){
        avatarInput.addEventListener('change', () => {
            const f = avatarInput.files[0];
            if (f) avatarPreview.src = URL.createObjectURL(f);
        });
    }

    /* --- Area search + select all --- */
    const searchInput = document.getElementById('areaSearch');
    const selectAll   = document.getElementById('areaSelectAll');
    const areaList    = document.getElementById('areaList');
    const countEl     = document.getElementById('areaSelectedCount');

    function updateCount(){
        const n = areaList.querySelectorAll('.area-cb:checked').length;
        countEl.textContent = n;
    }
    if (searchInput){
        searchInput.addEventListener('input', e => {
            const q = e.target.value.toLowerCase().trim();
            areaList.querySelectorAll('.area-chip').forEach(chip => {
                chip.style.display = chip.dataset.name.includes(q) ? '' : 'none';
            });
        });
    }
    if (selectAll){
        selectAll.addEventListener('change', e => {
            areaList.querySelectorAll('.area-chip').forEach(chip => {
                if (chip.style.display === 'none') return;
                const cb = chip.querySelector('.area-cb');
                cb.checked = e.target.checked;
            });
            updateCount();
        });
    }
    areaList && areaList.addEventListener('change', updateCount);

    /* --- Build review on step 5 --- */
    function buildReview(){
        const fd = new FormData(form);
        const set = (key, val) => {
            const el = document.querySelector(`[data-review="${key}"]`);
            if (el) el.textContent = val || '—';
        };
        ['name','phone','email','dob','experience','price_per_day','price_per_visit',
         'address','city','state','pincode','id_proof_type','id_proof_number',
         'certificate_number','about','gender'].forEach(k => set(k, fd.get(k)));

        set('languages', fd.getAll('languages[]').join(', '));
        const catLabels = [...document.querySelectorAll('input[name="categories[]"]:checked')]
            .map(i => i.closest('label').querySelector('span').textContent.trim());
        set('categories', catLabels.join(', '));
        const areaLabels = [...document.querySelectorAll('input[name="areas[]"]:checked')]
            .map(i => i.closest('label').querySelector('span').textContent.trim());
        set('areas', areaLabels.join(', '));
    }

    /* --- Final submit --- */
    form.addEventListener('submit', e => {
        if (!document.getElementById('agreeTerms').checked){
            e.preventDefault();
            alert('Please accept the terms to continue.');
        }
    });
})();
</script>
@endpush


