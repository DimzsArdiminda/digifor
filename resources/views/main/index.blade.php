
@extends('layouts.master')

@section('content')

{{-- HOME --}}
<section id="home" class="hero-section py-4 bg-light">
    <div class="container">
        <div class="row align-items-center">
            <!-- Left Content -->
            <div class="col-md-6" data-aos="zoom-in-right">
                <div class="mb-3 d-flex align-items-center">
                    <span class="badge bg-primary-subtle text-primary px-3 py-2">
                        Hi, {{ Auth::user()->nama ?? 'Welcome to ' }} <br><i class="bi bi-gear me-2"></i> FCMS
                    </span>
                </div>
                <h1 class="fw-bold display-5 mb-3">
                    Forensic Case Management System<br>
                    {{-- <span class="text-primary">Universitas Negeri Malang</span> --}}
                </h1>
                <p class="text-muted mb-4">
                     Platform Berbasis Web untuk Dokumentasi Kasus dan Data Korban
                </p>
                {{-- <div class="d-flex align-items-center gap-3 mt-4">
                    <a href="#" class="btn btn-primary btn-get-started px-4 py-2">
                        Get Started
                    </a>
                    <a href="https://youtu.be/pQtyOxZzzX0" class="d-flex align-items-center text-dark play-btn">
                        <i class="bi bi-play-circle fs-4 me-2"></i> Play Video
                    </a>
                </div> --}}


                <div class="d-flex align-items-center mt-4 gap-4">
                    <div class="stat-item">
                        <h3 class="fw-bold text-primary mb-0">125</h3>
                        <p class="text-muted small mb-0">Kasus Selesai</p>
                    </div>
                    <div class="stat-item">
                        <h3 class="fw-bold text-primary mb-0">50+</h3>
                        <p class="text-muted small mb-0">Rating</p>
                    </div>
                    <div class="stat-item">
                        <h3 class="fw-bold text-primary mb-0">80</h3>
                        <p class="text-muted small mb-0">Kasus dalam penanganan</p>
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
    <section class="py-5" id="statistics">
    <div class="container">
        <div class="text-center mb-5" data-aos="fade-up">
        <h2 class="fw-bold">Achievements</h2>
        <p class="text-muted">Our continuous journey of excellence and innovation</p>
        </div>

        <div class="row text-center justify-content-center">
            <div class="col-md-3 col-6 mb-4" data-aos="zoom-in" data-aos-delay="100">
                <div class="p-4 shadow-sm rounded bg-white stat-box">
                <i class="bi bi-check-circle fs-1 text-primary mb-2"></i>
                <h3 class="fw-bold counter" data-target="125">0</h3>
                <p class="text-muted mb-0">Kasus Selesai</p>
                </div>
            </div>
            <div class="col-md-3 col-6 mb-4" data-aos="zoom-in" data-aos-delay="200">
                <div class="p-4 shadow-sm rounded bg-white stat-box">
                <i class="bi bi-star fs-1 text-primary mb-2"></i>
                <h3 class="fw-bold counter" data-target="50">0</h3>
                <p class="text-muted mb-0">Rating</p>
                </div>
            </div>
            <div class="col-md-3 col-6 mb-4" data-aos="zoom-in" data-aos-delay="300">
                <div class="p-4 shadow-sm rounded bg-white stat-box">
                <i class="bi bi-hourglass-split fs-1 text-primary mb-2"></i>
                <h3 class="fw-bold counter" data-target="80">0</h3>
                <p class="text-muted mb-0">Kasus dalam Penanganan</p>
                </div>
            </div>
            <div class="col-md-3 col-6 mb-4" data-aos="zoom-in" data-aos-delay="400">
                <div class="p-4 shadow-sm rounded bg-white stat-box">
                <i class="bi bi-file-earmark-text fs-1 text-primary mb-2"></i>
                <h3 class="fw-bold counter" data-target="255">0</h3>
                <p class="text-muted mb-0">Total Kasus Forensik</p>
                </div>
            </div>
        </div>
    </div>
    </section>

    {{-- ABOUT SECTION --}}

    <section class="who-we-are-section py-5 bg-light" id="about">
    <div class="container">
        <div class="row align-items-center">
            <!-- Text content -->
            <div class="col-md-6" data-aos="fade-right">
                <div class="content-box p-4 shadow-sm bg-light rounded-3">
                    <span class="text-uppercase text-primary small fw-bold">FCMS</span>
                    <h3 class="fw-bold mt-2 mb-3 text-dark">
                         Platform Berbasis Web untuk Dokumentasi Kasus dan Data Korban
                    </h3>
                    <p class="text-muted mb-4">
                        Forensic Case Management System (FCMS) adalah sebuah platform berbasis web yang dirancang khusus untuk membantu dalam dokumentasi dan manajemen kasus forensik serta data korban. Sistem ini bertujuan untuk mempermudah proses pencatatan, pelacakan, dan analisis informasi terkait kasus forensik, sehingga dapat meningkatkan efisiensi dan akurasi dalam penanganan kasus.
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

{{-- CONTACT --}}
<!-- Contact Section -->
{{-- <section class="py-5 " id="contact">
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
</section> --}}


</section>
@endsection
