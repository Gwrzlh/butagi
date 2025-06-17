  <!-- =========={ MAIN }==========  -->
  <main id="content">
      <!-- =========={ HERO }==========  -->
      <div id="hero" class="section py-7 py-md-8 jarallax" data-jarallax-video="https://www.youtube.com/watch?v=slRB0gbIof0&list=PLtNOL2RWahUx60ol2OPjJ1Oli47zjLPbK">
        <!-- background overlay -->
        <div class="overlay bg-gradient-primary opacity-80 z-index-n1"></div>

        <div class="container">
          <div class="row justify-content-center">
            <!-- content -->
            <div class="col-lg-7" data-aos="fade-up">
              <div class="mt-6 mt-lg-4 py-0 py-lg-5 text-center">
                <!-- Pesan Error jika login gagal -->
                <h1 class="display-4 fw-bold text-white mb-3">Selamat Datang <br><span class="fw-light">di SMK Negeri 1 Subang</span></h1><hr><br>
                <p class="lead text-light mb-5">Silakan untuk mengisi form Buku Tamu Digital dengan mengklik Icon dibawah ini.</p><br>
                <a href="<?php echo base_url('');?>GuestController/guest_form" class="btn btn-lg btn-warning text-dark">
                  Isi Form Buku Tamu
                  <svg class="bi bi-chevron-double-right ms-2" width=".8rem" height=".8rem" viewBox="0 0 16 16" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                    <path fill-rule="evenodd" d="M3.646 1.646a.5.5 0 01.708 0l6 6a.5.5 0 010 .708l-6 6a.5.5 0 01-.708-.708L9.293 8 3.646 2.354a.5.5 0 010-.708z" clip-rule="evenodd"></path>
                    <path fill-rule="evenodd" d="M7.646 1.646a.5.5 0 01.708 0l6 6a.5.5 0 010 .708l-6 6a.5.5 0 01-.708-.708L13.293 8 7.646 2.354a.5.5 0 010-.708z" clip-rule="evenodd"></path>
                  </svg>
                </a>
              </div>
            </div><!-- end content -->
          </div>
        </div>

        <!--  -->

        <!-- mathead -->
        <div class="masthead animated-up-down d-none d-md-block">
          <a href="#contact">
            <div class="mouse-icon">
              <div class="scroller"><span class="visually-hidden">Scroll button</span></div>
            </div>
          </a>
        </div>
      </div><!-- end hero -->

      <!-- =========={ CONTACT FORM }==========  -->
      <div id="contact" class="section py-6 pt-md-7 bg-body">
        <div class="container">
          <!-- section header -->
          <header class="text-center mx-auto mb-5">
            <h2 class="h3 fw-bold">Daftar <span class="fw-light">Tamu</span></h2>
            <hr class="divider my-4 bg-warning border-warning">
            <p class="lead text-muted">Tabel data kunjungan tamu hari ini.</p>
          </header>

        <table id="example" class="table table-striped display">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Tanggal</th>
                    <!-- <th>Foto</th> -->
                    <th>Nama</th>
                    <th>Nomor HP</th>
                    <th>Asal Instansi</th>
                    <th>Keperluan</th>
                    <th>Bertemu dengan</th>
                    <th>Tujuan Ruangan</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php $no = 1; foreach ($guests as $t): ?>
                <tr>
                    <td><?php echo $no++; ?></td>
                    <td><?php
                     $tanggal = date('d-m-Y', strtotime($t->created_at));
                     echo $tanggal; 
                     ?>
                    </td>
                    <!-- <td>
                      <a href="" data-bs-toggle="modal" data-bs-target="#exampleModal<?php echo $t->id; ?>">    
                        <img src="<?php echo base_url('assets/uploads/'. $t->photo); ?>" width="50" height="50">
                      </a>
                    </td> -->
                    <td><?php echo $t->name; ?></td>
                    <td><?php echo $t->phone; ?></td>
                    <td><?php echo $t->institution; ?></td>
                    <td><?php echo $t->purpose; ?></td>
                    <td><?php echo $t->user_name; ?></td>
                    <td><?php echo $t->room_name; ?></td>
                    <td>
                    <a href="" class="btn btn-sm btn-secondary" data-bs-toggle="modal" data-bs-target="#detail_tamu<?php echo $t->id; ?>">
                      Lihat Detail
                    </a>
                    </td>
                </tr>
                <?php endforeach; ?>
                <?php if (empty($guests)): ?>
                    <div class="alert alert-warning">
                        No guests found in the system.
                    </div>
                <?php endif; ?>
            </tbody>
        </table>

        <script>
            $(document).ready(function() {
                $('#example').DataTable({
                    responsive: true,
                    paging: true,        // Aktifkan pagination
                    searching: true,     // Aktifkan pencarian
                    ordering: true,      // Aktifkan sorting
                    pageLength: 10,      // Jumlah entri per halaman
                });
            });
        </script>

        </div>
      </div><!-- End Contact Form -->

     

      <!-- Button trigger modal -->

<!-- Modal Foto -->
<?php foreach ($guests as $guest) : ?>
    <div class="modal fade" id="exampleModal<?php echo $guest->id; ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Foto Tamu : <?php echo $guest->name ?></h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <img src="<?php echo base_url('assets/uploads/'. $guest->photo) ?>" width="100%" alt="">
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            </div>
            </div>
        </div>
    </div>  

    <!-- Detail Tamu -->
    <div class="modal fade mt-5" id="detail_tamu<?php echo $guest->id; ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-xl">
            <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Detail Tamu : <?php echo $guest->name ?></h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
            <div class="row">
              <div class="col-lg-5">
                <img src="<?php echo base_url('assets/uploads/'. $guest->photo) ?>" width="100%" class="img img-thumbnail" alt="">
              </div>
              <div class="col-lg-7">
                <table class="table mt-2">
                  <tr>
                    <td><b>Nama Lengkap</b></td>
                    <td>:</td>
                    <td><?= $guest->name ?></td>
                  </tr>
                  <tr>
                    <td><b>Nomor HP</b></td>
                    <td>:</td>
                    <td><?= $guest->phone ?></td>
                  </tr>
                  <tr>
                    <td><b>Asal Instansi/Perusahaan</b></td>
                    <td>:</td>
                    <td><?= $guest->institution ?></td>
                  </tr>
                  <tr>
                    <td><b>Keperluan</b></td>
                    <td>:</td>
                    <td><?= $guest->purpose ?></td>
                  </tr>
                  <tr>
                    <td><b>Bertemu Dengan</b></td>
                    <td>:</td>
                    <td><?= $guest->user_name ?></td>
                  </tr>
                  <tr>
                    <td><b>Ruangan yang dituju</b></td>
                    <td>:</td>
                    <td><?= $guest->room_name ?></td>
                  </tr>
                  <tr>
                    <td><b>Tandatangan</b></td>
                    <td>:</td>
                    <td><img src="<?= base_url('assets/img/icon_ceklis.png') ?>" width="25px" alt=""></td>
                  </tr>
                </table>
              </div>
            </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            </div>
            </div>
        </div>
    </div>  
<?php endforeach; ?>
    </main><!-- end main -->