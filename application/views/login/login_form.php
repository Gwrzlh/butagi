<!-- =========={ MAIN }==========  -->
<main id="content">
      <!-- =========={ HERO }==========  -->
      <div id="hero" class="section py-6 py-md-7 jarallax overflow-hidden">
        <!-- background parallax -->
        <img class="jarallax-img" src="<?= base_url('assets/') ?>src/img-min/bg/bg-planet.jpg" alt="title">
        <!-- background overlay -->
        <div class="overlay bg-primary opacity-90 z-index-n1"></div>
      </div><!-- End hero -->

      <!-- =========={ login }==========  -->
      <div id="login-area" class="section pb-5 pb-md-6 border-top bg-light-dark">
        <div class="container">
          <div class="row justify-content-center">
            <!-- login form -->
            <div class="col-md-8 col-lg-7 px-5" data-aos="fade-up">
              <div class="position-relative mt-n7">
                <div class="p-5 rounded-3 bg-body shadow-sm">
                  <form id="login-form" class="needs-validation" action="<?= site_url('login/verify'); ?>" method="post">
                    <h1 class="h3 mb-4 text-center">Login</h1>
                    <hr class="divider my-4 mx-auto bg-warning border-warning">
                    <div class="mb-4">
                      <input name="username" class="form-control" placeholder="Username" value="" aria-label="username" type="text" required="">
                      <div class="invalid-feedback">
                        Silakan masukkan Username yang sudah terdaftar.
                      </div>
                    </div>
                    <div class="mb-4">
                      <input class="form-control" placeholder="Password" aria-label="password" type="password" name="password" required="">
                      <div class="invalid-feedback">
                        Silakan memasukkan Password yang sesuai.
                      </div>
                    </div>
                    <div class="mb-4">
                      <div class="d-grid">
                        <button type="submit" class="btn btn-primary">Login<svg xmlns="http://www.w3.org/2000/svg" class="ms-1" width="1.2rem" height="1.2rem" fill="currentColor" viewBox="0 0 512 512"><path d="M192,176V136a40,40,0,0,1,40-40H392a40,40,0,0,1,40,40V376a40,40,0,0,1-40,40H240c-22.09,0-48-17.91-48-40V336" style="fill:none;stroke:currentColor;stroke-linecap:round;stroke-linejoin:round;stroke-width:32px"/><polyline points="288 336 368 256 288 176" style="fill:none;stroke:currentColor;stroke-linecap:round;stroke-linejoin:round;stroke-width:32px"/><line x1="80" y1="256" x2="352" y2="256" style="fill:none;stroke:currentColor;stroke-linecap:round;stroke-linejoin:round;stroke-width:32px"/></svg></button>
                      </div>
                      <div class="d-grid mt-2">
                        <a class="btn btn-secondary" href="<?= base_url('/') ?>">Kembali ke Landing Page</a>
                      </div>
                    </div>
                  </form>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div><!-- End Contact Form -->
    </main><!-- end main -->