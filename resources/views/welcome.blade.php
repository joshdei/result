<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">
  <title>24EduResult - Student Exam Results</title>
  <meta name="description" content="View your student exam results easily with 24EduResult.">
  <meta name="keywords" content="student results, exam results, education, academic performance">

  <!-- Favicons -->
  <link href="assets/img/favicon.png" rel="icon">
  <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon">

  <!-- Fonts -->
  <link href="https://fonts.googleapis.com" rel="preconnect">
  <link href="https://fonts.gstatic.com" rel="preconnect" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500;700&display=swap" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="assets/vendor/aos/aos.css" rel="stylesheet">
  <link href="assets/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
  <link href="assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">

  <!-- Main CSS File -->
  <link href="assets/css/main.css" rel="stylesheet">

</head>

<body class="index-page">

  <header id="header" class="header d-flex align-items-center fixed-top">
    <div class="container-fluid container-xl position-relative d-flex align-items-center">
      <a href="index.html" class="logo d-flex align-items-center me-auto">
        <img src="assets/img/logo.png" alt="24EduResult Logo">
        <h1 class="sitename">24EduResult</h1>
      </a>

      <nav id="navmenu" class="navmenu">
        <ul>
          <li><a href="#hero" class="active">Home</a></li>
          <li><a href="#about">About</a></li>
        </ul>
        <i class="mobile-nav-toggle d-xl-none bi bi-list"></i>
      </nav>

      @if (Route::has('login'))
        @auth
          <a class="btn-getstarted flex-md-shrink-0" href="{{ url('/') }}">Dashboard</a>
        @else
          <a class="btn-getstarted flex-md-shrink-0" href="{{ route('login') }}">Student Login</a>
          <a class="btn-getstarted flex-md-shrink-0" href="{{ route('tlogin') }}">Teacher Login</a>
          @if (Route::has('register'))
            <a class="btn-getstarted flex-md-shrink-0" href="{{ route('register') }}">Register</a>
          @endif
        @endauth
      @endif
    </div>
  </header>

  <main class="main">

    <!-- Hero Section -->
    <section id="hero" class="hero section">
      <div class="container">
        <div class="row gy-4">
          <div class="col-lg-6 order-2 order-lg-1 d-flex flex-column justify-content-center">
            <h1 data-aos="fade-up">Access Your Results Anytime, Anywhere</h1>
            <p data-aos="fade-up" data-aos-delay="100">24EduResult makes it easy for students and educators to view academic results securely.</p>
            <div class="d-flex flex-column flex-md-row" data-aos="fade-up" data-aos-delay="200">
              <a href="login" class="btn-get-started">Login <i class="bi bi-arrow-right"></i></a>
            </div>
          </div>
          <div class="col-lg-6 order-1 order-lg-2 hero-img" data-aos="zoom-out">
            <img src="assets/img/hero-img.png" class="img-fluid animated" alt="Student Results Access">
          </div>
        </div>
      </div>
    </section><!-- /Hero Section -->

    <!-- About Section -->
    <section id="about" class="about section">
      <div class="container" data-aos="fade-up">
        <div class="row gx-0">
          <div class="col-lg-6 d-flex flex-column justify-content-center" data-aos="fade-up" data-aos-delay="200">
            <div class="content">
              <h3>About 24EduResult</h3>
              <h2>Your One-Stop Platform for Student Results</h2>
              <p>We provide a seamless way for students, teachers, and schools to manage and view exam results with ease. Our platform ensures accurate, timely, and secure access to academic performance data.</p>
              <div class="text-center text-lg-start">
                <a href="#" class="btn-read-more d-inline-flex align-items-center justify-content-center align-self-center">
                  <span>Read More</span>
                  <i class="bi bi-arrow-right"></i>
                </a>
              </div>
            </div>
          </div>

          <div class="col-lg-6 d-flex align-items-center" data-aos="zoom-out" data-aos-delay="200">
            <img src="assets/img/about.jpg" class="img-fluid" alt="About 24EduResult">
          </div>
        </div>
      </div>
    </section><!-- /About Section -->

    <!-- Values Section -->
    <section id="values" class="values section">
      <div class="container section-title" data-aos="fade-up">
        <h2>Our Values</h2>
        <p>Our commitment to excellence in education<br></p>
      </div>

      <div class="container">
        <div class="row gy-4">
          <div class="col-lg-4" data-aos="fade-up" data-aos-delay="100">
            <div class="card">
              <img src="assets/img/values-1.png" class="img-fluid" alt="">
              <h3>Accuracy</h3>
              <p>We ensure accurate and verified exam results, free of errors and discrepancies.</p>
            </div>
          </div>

          <div class="col-lg-4" data-aos="fade-up" data-aos-delay="200">
            <div class="card">
              <img src="assets/img/values-2.png" class="img-fluid" alt="">
              <h3>Timeliness</h3>
              <p>Results are delivered promptly, providing students with timely feedback on their academic performance.</p>
            </div>
          </div>

          <div class="col-lg-4" data-aos="fade-up" data-aos-delay="300">
            <div class="card">
              <img src="assets/img/values-3.png" class="img-fluid" alt="">
              <h3>Security</h3>
              <p>Your data is safe with us. We prioritize the confidentiality and security of student information.</p>
            </div>
          </div>
        </div>
      </div>
    </section><!-- /Values Section -->

  </main>

  <footer id="footer" class="footer">
    <div class="container footer-top">
      <div class="row gy-4">
        <div class="col-lg-4 col-md-6 footer-about">
          <a href="index.html" class="d-flex align-items-center">
            <span class="sitename">24EduResult</span>
          </a>
          <div class="footer-contact pt-3">
            <p>123 Learning Street, Education City</p>
            <p><strong>Phone:</strong> +1 234 5678 910</p>
            <p><strong>Email:</strong> info@24EduResult.com</p>
          </div>
        </div>

        <div class="col-lg-2 col-md-3 footer-links">
          <h4>Quick Links</h4>
          <ul>
            <li><i class="bi bi-chevron-right"></i> <a href="#">Home</a></li>
            <li><i class="bi bi-chevron-right"></i> <a href="#">About Us</a></li>
            <li><i class="bi bi-chevron-right"></i> <a href="#">Results</a></li>
          </ul>
        </div>

        <div class="col-lg-2 col-md-3 footer-links">
          <h4>Our Services</h4>
          <ul>
            <li><i class="bi bi-chevron-right"></i> <a href="#">Student Results</a></li>
            <li><i class="bi bi-chevron-right"></i> <a href="#">Exam Analytics</a></li>
          </ul>
        </div>

        <div class="col-lg-4 col-md-12">
          <h4>Follow Us</h4>
          <div class="social-links d-flex">
            <a href="#"><i class="bi bi-twitter"></i></a>
            <a href="#"><i class="bi bi-facebook"></i></a>
            <a href="#"><i class="bi bi-instagram"></i></a>
          </div>
        </div>
      </div>
    </div>
  </footer>

  <!-- Scroll Top -->
  <a href="#" id="scroll-top" class="scroll-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

  <!-- Vendor JS Files -->
  <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="assets/vendor/aos/aos.js"></script>
  <script src="assets/vendor/glightbox/js/glightbox.min.js"></script>
  <script src="assets/vendor/swiper/swiper-bundle.min.js"></script>

  <!-- Main JS File -->
  <script src="assets/js/main.js"></script>

</body>
</html>
