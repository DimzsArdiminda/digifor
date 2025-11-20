
@extends('layouts.master')

@section('content')

{{-- HOME --}}
<section id="home" class="hero-section py-5 bg-light">
    <div class="container">
        <div class="row align-items-center">
            <!-- Left Content -->
            <div class="col-md-6" data-aos="zoom-in-right">
                <div class="mb-3 d-flex align-items-center">
                    <span class="badge bg-primary-subtle text-primary px-3 py-2">
                        Hi, {{ Auth::user()->nama ?? 'Warga sipil sekalian ' }} <br><i class="bi bi-gear me-2"></i> EduCareer Tracker
                    </span>
                </div>
                <h1 class="fw-bold display-5 mb-3">
                    Sistem Tracer Study Alumni<br>
                    <span class="text-primary">Universitas Negeri Malang</span>
                </h1>
                <p class="text-muted mb-4">
                    Platform terintegrasi untuk tracking status pekerjaan, evaluasi kurikulum, dan analisis data alumni. Mendukung akreditasi dengan laporan komprehensif dan visualisasi data real-time.
                </p>
                <div class="d-flex align-items-center gap-3 mt-4">
                    <a href="#" class="btn btn-primary btn-get-started px-4 py-2">
                        Get Started
                    </a>
                    <a href="https://youtu.be/pQtyOxZzzX0" class="d-flex align-items-center text-dark play-btn">
                        <i class="bi bi-play-circle fs-4 me-2"></i> Play Video
                    </a>
                </div>


                <div class="d-flex align-items-center mt-4 gap-4">
                    <div class="stat-item">
                        <h3 class="fw-bold text-primary mb-0">1,234+</h3>
                        <p class="text-muted small mb-0">Alumni Terdaftar</p>
                    </div>
                    <div class="stat-item">
                        <h3 class="fw-bold text-primary mb-0">85%</h3>
                        <p class="text-muted small mb-0">Tingkat Penyerapan</p>
                    </div>
                    <div class="stat-item">
                        <h3 class="fw-bold text-primary mb-0">3.2</h3>
                        <p class="text-muted small mb-0">Bulan Tunggu Kerja</p>
                    </div>
                </div>
            </div>

            <!-- Right Image -->
            <div class="col-md-6 text-center" data-aos="flip-left">
                <img src="{{ asset('frontend/image/illustration-1.webp') }}" alt="Alumni Tracer Illustration" class="img-fluid">
            </div>
        </div>
</section>      

    <!-- Statistics Section -->
    <section class="py-5 bg-light" id="statistics">
    <div class="container">
        <div class="text-center mb-5" data-aos="fade-up">
        <h2 class="fw-bold">Campus Achievements</h2>
        <p class="text-muted">Our continuous journey of excellence and innovation</p>
        </div>

        <div class="row text-center justify-content-center">
        <div class="col-md-3 col-6 mb-4" data-aos="zoom-in" data-aos-delay="100">
            <div class="p-4 shadow-sm rounded bg-white stat-box">
            <i class="bi bi-trophy fs-1 text-primary mb-2"></i>
            <h3 class="fw-bold counter" data-target="15">0</h3>
            <p class="text-muted mb-0">National Awards</p>
            </div>
        </div>
        <div class="col-md-3 col-6 mb-4" data-aos="zoom-in" data-aos-delay="200">
            <div class="p-4 shadow-sm rounded bg-white stat-box">
            <i class="bi bi-mortarboard fs-1 text-primary mb-2"></i>
            <h3 class="fw-bold counter" data-target="6500">0</h3>
            <p class="text-muted mb-0">Graduated Students</p>
            </div>
        </div>
        <div class="col-md-3 col-6 mb-4" data-aos="zoom-in" data-aos-delay="300">
            <div class="p-4 shadow-sm rounded bg-white stat-box">
            <i class="bi bi-journal-check fs-1 text-primary mb-2"></i>
            <h3 class="fw-bold counter" data-target="120">0</h3>
            <p class="text-muted mb-0">Active Research Projects</p>
            </div>
        </div>
        <div class="col-md-3 col-6 mb-4" data-aos="zoom-in" data-aos-delay="400">
            <div class="p-4 shadow-sm rounded bg-white stat-box">
            <i class="bi bi-people fs-1 text-primary mb-2"></i>
            <h3 class="fw-bold counter" data-target="300">0</h3>
            <p class="text-muted mb-0">Dedicated Lecturers</p>
            </div>
        </div>
        </div>
    </div>
    </section>

    {{-- ABOUT SECTION --}}

    <section class="who-we-are-section py-5" id="about">
    <div class="container">
        <div class="row align-items-center">
            <!-- Text content -->
            <div class="col-md-6" data-aos="fade-right">
                <div class="content-box p-4 shadow-sm bg-light rounded-3">
                    <span class="text-uppercase text-primary small fw-bold">EduCareer Tracker</span>
                    <h3 class="fw-bold mt-2 mb-3 text-dark">
                        Solusi Terpadu untuk Monitoring dan Evaluasi Alumni
                    </h3>
                    <p class="text-muted mb-4">
                        EduCareer Tracking hadir sebagai platform komprehensif yang memudahkan institusi dalam melacak perkembangan karir alumni. 
                        Sistem berbasis data dengan fitur tracking real-time, pelaporan otomatis, dan dashboard interaktif, kami memudahkan 
                        proses pengumpulan data tracer study yang akurat dan mendukung peningkatan kualitas pendidikan.
                    </p>
                    <a href="#" class="btn btn-primary btn-read-more px-4 py-2">
                        Read More <i class="bi bi-arrow-right ms-2"></i>
                    </a>
                </div>
            </div>

            <!-- Image -->
            <div class="col-md-6 text-center" data-aos="fade-left">
                <img src="{{ asset('frontend/image/ilustrasi-2.webp') }}" 
                     alt="Who We Are Illustration" 
                     class="img-fluid rounded-3 shadow-sm who-we-are-img">
            </div>
        </div>
    </div>
</section>

{{-- FITUR --}}
<!-- Main Features Section -->
<section class="py-5 bg-white" id="features">
    <div class="container text-center">
        <div class="section-header" data-aos="fade-up">
            <h2 class="fw-bold mb-3">Fitur Alumni Tracer</h2>
            <p class="text-muted mb-5">
                Sistem terintegrasi untuk memantau perkembangan karir alumni dan meningkatkan kualitas pendidikan
            </p>
        </div>

        <div class="row g-4 justify-content-center">
            <!-- Data Alumni -->
            <div class="col-md-6 col-lg-4" data-aos="zoom-in">
                <a href=""></a>
                <div class="feature-card p-4 rounded-4 shadow-sm h-100" onclick="handleFeatureClick('data-alumni')">
                    <div class="shine"></div>
                    <div class="feature-icon ">
                        <i class="bi bi-people"></i>
                    </div>
                    <div class="feature-content">
                        <h5>Data Alumni</h5>
                        <p>Pendataan Alumni bagi lulusan baru Universitas Negeri Malang</p>
                        <span class="feature-badge">Jelajahi <i class="bi bi-arrow-right ms-1"></i></span>
                    </div>
                    <div class="click-indicator">
                        <i class="bi bi-cursor"></i>
                    </div>
                </div>
            </div>

            <!-- Employment Tracking -->
            <div class="col-md-6 col-lg-4" data-aos="zoom-in" data-aos-delay="100">
                <div class="feature-card p-4 rounded-4 shadow-sm h-100" onclick="handleFeatureClick('employment')">
                    <div class="shine"></div>
                    <div class="feature-icon floating" style="animation-delay: 0.5s;">
                        <i class="bi bi-briefcase"></i>
                    </div>
                    <div class="feature-content">
                        <h5>Status Pekerjaan</h5>
                        <p>Monitoring status ketenagakerjaan dan perkembangan karir alumni.</p>
                        <span class="feature-badge">Lihat Detail <i class="bi bi-arrow-right ms-1"></i></span>
                    </div>
                    <div class="click-indicator">
                        <i class="bi bi-cursor"></i>
                    </div>
                </div>
            </div>

            <!-- Analytics -->
            <div class="col-md-6 col-lg-4" data-aos="zoom-in" data-aos-delay="200">
                <div class="feature-card p-4 rounded-4 shadow-sm h-100" onclick="handleFeatureClick('analytics')">
                    <div class="shine"></div>
                    <div class="feature-icon floating" style="animation-delay: 1s;">
                        <i class="bi bi-bar-chart-line"></i>
                    </div>
                    <div class="feature-content">
                        <h5>Analisis & Statistik</h5>
                        <p>Dashboard interaktif dengan visualisasi data dan insights mendalam.</p>
                        <span class="feature-badge">Buka Dashboard <i class="bi bi-arrow-right ms-1"></i></span>
                    </div>
                    <div class="click-indicator">
                        <i class="bi bi-cursor"></i>
                    </div>
                </div>
            </div>
        </div>

        <div class="row g-4 justify-content-center mt-2">
            <!-- Survey & Feedback -->
            <div class="col-md-6 col-lg-4" data-aos="zoom-in" data-aos-delay="300">
                <div class="feature-card p-4 rounded-4 shadow-sm h-100" onclick="handleFeatureClick('survey')">
                    <div class="shine"></div>
                    <div class="feature-icon floating" style="animation-delay: 1.5s;">
                        <i class="bi bi-clipboard-data"></i>
                    </div>
                    <div class="feature-content">
                        <h5>Survey & Feedback</h5>
                        <p>Kuesioner online untuk evaluasi program studi dan kompetensi lulusan.</p>
                        <span class="feature-badge">Isi Survey <i class="bi bi-arrow-right ms-1"></i></span>
                    </div>
                    <div class="click-indicator">
                        <i class="bi bi-cursor"></i>
                    </div>
                </div>
            </div>

            <!-- Data Security -->
            <div class="col-md-6 col-lg-4" data-aos="zoom-in" data-aos-delay="400">
                <div class="feature-card p-4 rounded-4 shadow-sm h-100" onclick="handleFeatureClick('security')">
                    <div class="shine"></div>
                    <div class="feature-icon floating" style="animation-delay: 2s;">
                        <i class="bi bi-shield-lock"></i>
                    </div>
                    <div class="feature-content">
                        <h5>Keamanan Data</h5>
                        <p>Sistem terenkripsi untuk melindungi privasi data alumni.</p>
                        <span class="feature-badge">Pelajari Lebih <i class="bi bi-arrow-right ms-1"></i></span>
                    </div>
                    <div class="click-indicator">
                        <i class="bi bi-cursor"></i>
                    </div>
                </div>
            </div>

            <!-- Reporting -->
            <div class="col-md-6 col-lg-4" data-aos="zoom-in" data-aos-delay="500">
                <div class="feature-card p-4 rounded-4 shadow-sm h-100" onclick="handleFeatureClick('reporting')">
                    <div class="shine"></div>
                    <div class="feature-icon floating" style="animation-delay: 2.5s;">
                        <i class="bi bi-file-earmark-text"></i>
                    </div>
                    <div class="feature-content">
                        <h5>Export & Laporan</h5>
                        <p>Generate laporan tracer study dalam format PDF dan Excel.</p>
                        <span class="feature-badge">Download <i class="bi bi-arrow-right ms-1"></i></span>
                    </div>
                    <div class="click-indicator">
                        <i class="bi bi-cursor"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

{{-- LOGO --}}
<!-- Clients Section -->
<section id="fakultas" class="clients section py-5">
  <div class="container text-center" data-aos="fade-up">
    <div class="section-header mb-4">
      <span class="badge bg-light text-primary rounded-pill px-3 py-1"></span>
      <h2 class="fw-bold text-dark mt-3">Faculty State University Of Malang</h2>
    </div>

    <div class="swiper init-swiper">
      <script type="application/json" class="swiper-config">
        {
          "loop": true,
          "speed": 1500,
          "autoplay": {
            "delay": 2000,
            "disableOnInteraction": false
          },
          "slidesPerView": 5,
          "spaceBetween": 70,
          "centeredSlides": true,
          "pagination": {
            "el": ".swiper-pagination",
            "type": "bullets",
            "clickable": true
          },
          "breakpoints": {
            "320": {
              "slidesPerView": 2,
              "spaceBetween": 20
            },
            "640": {
              "slidesPerView": 3,
              "spaceBetween": 30
            },
            "992": {
              "slidesPerView": 5,
              "spaceBetween": 40
            }
          }
        }
      </script>

      <div class="swiper-wrapper align-items-center">
        <div class="swiper-slide"><img src="{{ asset('frontend/image/ft.webp') }}" class="img-fluid" alt="Citrus"></div>
        <div class="swiper-slide"><img src="{{ asset('frontend/image/feb.jpg') }}" class="img-fluid" alt="Trustly"></div>
        <div class="swiper-slide"><img src="{{ asset('frontend/image/fip.webp') }}" class="img-fluid" alt="Oldendorff"></div>
        <div class="swiper-slide"><img src="{{ asset('frontend/image/fk.webp') }}" class="img-fluid" alt="Lilly"></div>
        <div class="swiper-slide"><img src="{{ asset('frontend/image/FV.webp') }}" class="img-fluid" alt="Myob"></div>
        <div class="swiper-slide"><img src="{{ asset('frontend/image/fs.webp') }}" class="img-fluid" alt="Belimo"></div>
        <div class="swiper-slide"><img src="{{ asset('frontend/image/fpsi.webp') }}" class="img-fluid" alt="Belimo"></div>
        <div class="swiper-slide"><img src="{{ asset('frontend/image/pasca.webp') }}" class="img-fluid" alt="Belimo"></div>
        <div class="swiper-slide"><img src="{{ asset('frontend/image/fik.png') }}" class="img-fluid" alt="Belimo"></div>
        <div class="swiper-slide"><img src="{{ asset('frontend/image/fmipa.webp') }}" class="img-fluid" alt="Belimo"></div>
        <div class="swiper-slide"><img src="{{ asset('frontend/image/fis.webp') }}" class="img-fluid" alt="Belimo"></div>
      </div>
      <div class="swiper-pagination mt-4"></div>
    </div>
  </div>
</section>


{{-- CONTACT --}}
<!-- Contact Section -->
<section class="py-5 bg-light" id="contact">
    <div class="container">
        <div class="text-center mb-5" data-aos="fade-up">
        <h2 class="fw-bold">CONTACT</h2>
        <p class="text-muted">Contact Us</p>
        </div>

        <div class="row gy-4">
            <!-- Contact Info -->
            <div class="col-lg-5" data-aos="fade-right">
                <div class="row g-3">
                    <div class="col-md-6">
                        <div class="contact-box p-4 rounded-4 bg-white shadow-sm h-100">
                            <i class="bi bi-geo-alt fs-3 text-primary mb-3"></i>
                            <h6 class="fw-semibold">Address</h6>
                            <p class="small text-muted mb-0">State University Of Malang<br>Jl. Cakrawala No.5, Sumbersari, Kec. Lowokwaru, Kota Malang, Jawa Timur 65145</p>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="contact-box p-4 rounded-4 bg-white shadow-sm h-100">
                            <i class="bi bi-telephone fs-3 text-primary mb-3"></i>
                            <h6 class="fw-semibold">Call Us</h6>
                            <p class="small text-muted mb-0">(0341) 551312</p>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="contact-box p-4 rounded-4 bg-white shadow-sm h-100">
                            <i class="bi bi-envelope fs-3 text-primary mb-3"></i>
                            <h6 class="fw-semibold">Website</h6>
                            <p class="small text-muted mb-0">https://um.ac.id//p>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="contact-box p-4 rounded-4 bg-white shadow-sm h-100">
                            <i class="bi bi-clock fs-3 text-primary mb-3"></i>
                            <h6 class="fw-semibold">Open Hours</h6>
                            <p class="small text-muted mb-0">Monday - Friday<br>7:00AM - 04:00PM</p>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Contact Form -->
            <div class="col-lg-7" data-aos="fade-left">
                <div class="contact-box p-4 rounded-4 bg-white shadow-sm">
                    <form action="#" method="post">
                        @csrf
                        <div class="row g-3">
                            <div class="col-md-6">
                                <input type="text" name="name" class="form-control rounded-3" placeholder="Your Name" required>
                            </div>
                            <div class="col-md-6">
                                <input type="email" name="email" class="form-control rounded-3" placeholder="Your Email" required>
                            </div>
                            <div class="col-12">
                                <input type="text" name="subject" class="form-control rounded-3" placeholder="Subject" required>
                            </div>
                            <div class="col-12">
                                <textarea name="message" rows="5" class="form-control rounded-3" placeholder="Message" required></textarea>
                            </div>
                            <div class="col-12 text-end">
                                <button type="submit" class="btn btn-primary rounded-pill px-4 mt-2">Send Message</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>


</section>
@endsection
