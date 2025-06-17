<header>

      <!-- Navbar -->
      <nav class="main-nav navbar navbar-expand-lg hover-navbar dark-to-light fixed-top navbar-dark">
        <div class="container">
          <a class="navbar-brand main-logo" href="<?= base_url(); ?>#">
            <!-- <span class="h2 text-white fw-bold mt-2">Onekit</span> -->
            <img class="logo-light" src="<?= base_url('assets/'); ?>src/img/ceren.png" alt="LOGO">
            <img class="logo-dark" src="<?= base_url('assets/'); ?>src/img/ceren.png" alt="LOGO">
          </a>

          <!-- navbar toggler -->
          <button class="navbar-toggler" type="button"
            data-bs-toggle="collapse"
            data-bs-target="#navbarTogglerDemo"
            aria-controls="navbarTogglerDemo"
            aria-expanded="false"
            aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>

          <!-- collapse menu -->
          <div class="collapse navbar-collapse" id="navbarTogglerDemo">
            <div class="d-grid d-lg-block ms-auto">
              <a class="btn btn-warning btn-sm text-dark" rel="noopener" href="<?= site_url('login'); ?>">
                <svg xmlns="http://www.w3.org/2000/svg" width="1rem" height="1rem" fill="currentColor" viewBox="0 0 512 512"><path d="M176,176V136a40,40,0,0,1,40-40H424a40,40,0,0,1,40,40V376a40,40,0,0,1-40,40H216a40,40,0,0,1-40-40V336" style="fill:none;stroke:currentColor;stroke-linecap:round;stroke-linejoin:round;stroke-width:32px"/><polyline points="272 336 352 256 272 176" style="fill:none;stroke:currentColor;stroke-linecap:round;stroke-linejoin:round;stroke-width:32px"/><line x1="48" y1="256" x2="336" y2="256" style="fill:none;stroke:currentColor;stroke-linecap:round;stroke-linejoin:round;stroke-width:32px"/></svg>
              </a>
            </div>
          </div><!-- end collapse menu -->
        </div>
      </nav><!-- End Navbar -->
</header><!-- end header -->