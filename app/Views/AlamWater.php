<!doctype html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=Edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Alam Water</title>
    <link rel="icon" type="image/x-icon" href="../assets/images/logo-aw.png">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="<?= base_url('style/landing_page.css') ?>" />
  </head>
  <body>
    <div class="landing-page">
      <!-- Navbar -->
      <div class="navbar">
        <div class="logo">
          <img class="icon" src="../assets/images/logo-aw.png" alt="AW Logo">
        </div> 
        <div class="menu">
          <a href="#home" class="menu-item">Home</a>
          <a href="#tentang" class="menu-item">Tentang</a>
          <a href="#layanan" class="menu-item">Layanan</a>
          <a href="#produk" class="menu-item">Product</a>
          <a href="#contact" class="menu-item">Contact</a>
          <?php if (session()->has('user_session')) : ?>
            <!-- Link transaksi hanya muncul jika user sudah login -->
            <a href="<?= base_url('userTrx'); ?>" class="menu-item">Transaksi</a>
          <?php endif; ?>
        </div>
        <div class="auth-buttons">
          <?php if (!session()->has('user_session')) : ?>
              <!-- Jika belum login, tampilkan tombol login dan sign up -->
              <a href="#" class="btn-login" onclick="openModal('loginModal')">
                <i class="fas fa-sign-in-alt"></i>
              </a>
              <a href="#" class="btn-signup" onclick="openModal('signupModal')">
                <i class="fas fa-user-plus"></i>
              </a>
          <?php else : ?>
              <!-- Jika sudah login, tampilkan nama user -->
              <span class="user-name">
              <i class="fas fa-user-circle profile-icon" onclick="window.location.href='<?= base_url('userProfile'); ?>'"></i>
                Hi, <?= session()->get('user_session')['nama']; ?>
              </span>
              <a href="<?= base_url('logout'); ?>" class="btn-logout">
                <i class="fas fa-sign-in-alt"></i>
              </a>
          <?php endif; ?>
      </div>
    </div>

          <!-- Modal Login -->
          <div id="loginModal" class="modal">
            <div class="modal-content">
              <span class="close" onclick="closeModal('loginModal')">&times;</span>
              <h2 style="text-align: center"><i class="fas fa-sign-in-alt"></i>
              Login</h2>
              <a href="<?= base_url('login'); ?>" class="btn-user">Login sebagai User</a>
              <a href="<?= base_url('loginAdmin'); ?>" class="btn-admin">Login sebagai Admin</a>
            </div>
          </div>

          <!-- Modal Sign Up -->
          <div id="signupModal" class="modal">
            <div class="modal-content">
              <span class="close" onclick="closeModal('signupModal')">&times;</span>
              <h2 style="text-align: center"><i class="fas fa-user-plus"></i>
              Daftar</h2>
              <a href="<?= base_url('register'); ?>" class="btn-user">Daftar sebagai User</a>
              <a href="<?= base_url('registerAdmin'); ?>" class="btn-admin">Daftar sebagai Admin</a>
            </div>
          </div>


      <!-- Hero Section -->
      <div class="hero-section" id="home">
        <div class="hero-text">
          <h1>Butuh Air Mineral Yang Segar Dan Menyehatkan?</h1>
          <h1>Alam Water Solusinya...</h1>
        </div>
        <div class="hero-image">
          <img src="../assets/images/logo-aw.png" alt="Hero Illustration" />
        </div>
      </div>

      <!-- Tentang Kami -->
      <section class="tentang-kami" id="tentang">
        <div class="content">
          <h2>Tentang Kami</h2>
          <p>Alam Water adalah pilihan air mineral yang berasal langsung dari sumber mata air alami, diproses dengan teknologi modern untuk menjaga kemurnian dan kandungan mineral yang penting bagi kesehatan tubuh. Kami berkomitmen untuk memberikan air mineral berkualitas tinggi yang segar dan menyehatkan untuk setiap konsumsi harian Anda.
          Kami percaya bahwa kesehatan dimulai dari air yang kita konsumsi. Dengan berfokus pada keberlanjutan, Alam Water berusaha untuk meminimalkan dampak lingkungan dari setiap tahap produksi kami. Kami memastikan bahwa setiap tetes air tidak hanya berkualitas tinggi tetapi juga dihasilkan dengan cara yang ramah lingkungan.
          Visi kami adalah menjadi pemimpin dalam industri air mineral, dikenal karena kualitas dan layanan pelanggan yang luar biasa. Kami berkomitmen untuk terus berinovasi dan meningkatkan proses kami, agar setiap konsumen merasakan manfaat maksimal dari air mineral kami. Bergabunglah dengan kami dalam perjalanan menuju hidup yang lebih sehat dengan Alam Water!</p>
        </div>
        <div class="image">
          <img src="../assets/images/galon.png" alt="About Illustration" />
        </div>
      </section>

      <!-- Kesehatan Section -->
      <section class="kesehatan-section" id="layanan">
        <h2>Kesehatan adalah yang utama</h2>
        <p>Di Alam Water, kami percaya bahwa air berkualitas memiliki peran penting dalam menjaga kesehatan. Air mineral kami kaya akan nutrisi alami yang membantu mendukung fungsi tubuh, menjaga hidrasi optimal, dan memelihara keseimbangan mineral harian Anda.</p>
        <div class="kesehatan-image">
          <img src="../assets/vectors/plant_x2.svg" alt="Plant" />
          <img src="../assets/vectors/padlock_x2.svg" alt="Padlock" />
        </div>
      </section>

      <!-- Produk Section -->
        <section class="produk-section" id="produk">
          <h2>Product Kami</h2>
          <p>Alam Water menghadirkan berbagai pilihan air mineral dengan kemasan yang praktis untuk memenuhi kebutuhan hidrasi Anda setiap hari. Baik untuk di rumah, di tempat kerja, maupun saat bepergian, Alam Water selalu siap menemani.</p>
          <div class="produk-gallery">
            <div class="produk-item"><img src="../assets/images/air1.jpg" alt="air1"></div>
            <div class="produk-item"><img src="../assets/images/air2.jpg" alt="air2"></div>
            <div class="produk-item"><img src="../assets/images/air3.jpg" alt="air3"></div>
          </div>
          <br>
          <?php if (!session()->has('user_session')) : ?>
              <!-- Jika user belum login, tampilkan alert untuk login dulu -->
              <a href="#" class="btn-beli" onclick="openModal('loginModal')">
                Beli Sekarang
                <i class="fas fa-shopping-cart"></i>
              </a>
          <?php else : ?>
              <!-- Jika user sudah login, arahkan ke halaman shop -->
              <a href="<?= base_url('shop'); ?>" class="btn-beli">
                Beli Sekarang
                <i class="fas fa-shopping-cart"></i>
              </a>
          <?php endif; ?>
      </section>

      <!-- Contact Section -->
      <section class="contact-section" id="contact">
        <h2 style="text-align: center">Kirim Pesan Kepada Kami!</h2>
        <form class="contact-form" action="<?= site_url('kirimPesan') ?>" method="post">
        <?= csrf_field() ?>
          <input type="text" name="nama" placeholder="Masukkan Nama Anda..." required />
          <input type="email" name="email" placeholder="Masukkan Email Anda..." required />
          <input type="tel" name="phone" placeholder="Masukkan No.Telp Anda..." required />
          <textarea name="message" placeholder="Ketik Pesan Anda..." required></textarea>
          <button type="submit">Kirim Pesan <i class="fas fa-paper-plane"></i>
          </button>
        </form>
      </section>

      <!-- Footer -->
      <footer class="footer">
        <p>Copyright © 2024 AlamWater/AdityaBP. All Right Reserved.</p>
      </footer>
    </div>
  </body>
</html>

<script>
  // Fungsi untuk membuka modal
  function openModal(modalId) {
    document.getElementById(modalId).style.display = 'block';
  }

  // Fungsi untuk menutup modal
  function closeModal(modalId) {
    document.getElementById(modalId).style.display = 'none';
  }

  // Menutup modal jika pengguna mengklik di luar modal
  window.onclick = function(event) {
    if (event.target.classList.contains('modal')) {
      closeModal('loginModal');
      closeModal('signupModal');
    }
  }
</script>
