<!-- =========={ MAIN }==========  -->
<main id="content">
      <!-- =========={ HERO }==========  -->
      <div id="hero" class="section py-6 py-md-7 jarallax overflow-hidden">
        <!-- background parallax -->
        <img class="jarallax-img" src="<?php echo base_url('assets/')?>src/img-min/bg/bg-planet.jpg" alt="title">
        <!-- background overlay -->
        <div class="overlay bg-primary opacity-90 z-index-n1"></div>
      </div><!-- End hero -->

      <!-- =========={ login }==========  -->
      <div id="login-area" class="section pb-5 pb-md-6 border-top bg-light-dark">
        <div class="container">
          <div class="row justify-content-center">
            <!-- login form -->
            <div class="col-lg-12 px-5" data-aos="fade-up">
              <div class="position-relative mt-n7">
                <div class="p-5 rounded-3 bg-body shadow-sm">
                  <form id="login-form" class="needs-validation" method="POST" action="<?= site_url('GuestController/submit_form'); ?>" enctype="multipart/form-data">
                    <h1 class="h3 mb-4 text-center">Informasi Tamu</h1>
                    <hr class="divider my-4 mx-auto bg-warning border-warning">
                    <!-- Capture -->
                    <div class="text-center" style="text-align: center;"> 
                        <video id="video" width="900px" height="550px" autoplay></video>
                        <img id="capturedImage" src="" alt="Foto Tamu" width="1000px" height="650px" style="display: none;" class="text-center">
                    </div>
                    <div class="d-grid mt-2 mb-4 mx-auto">
                        <button type="button" id="captureBtn" class="btn btn-success btn-lg">Ambil Foto <svg xmlns="http://www.w3.org/2000/svg" width="2rem" height="2rem" fill="currentColor" viewBox="0 0 512 512"><path d="M350.54,148.68l-26.62-42.06C318.31,100.08,310.62,96,302,96H210c-8.62,0-16.31,4.08-21.92,10.62l-26.62,42.06C155.85,155.23,148.62,160,140,160H80a32,32,0,0,0-32,32V384a32,32,0,0,0,32,32H432a32,32,0,0,0,32-32V192a32,32,0,0,0-32-32H373C364.35,160,356.15,155.23,350.54,148.68Z" style="fill:none;stroke:currentColor;stroke-linecap:round;stroke-linejoin:round;stroke-width:32px"/><circle cx="256" cy="272" r="80" style="fill:none;stroke:currentColor;stroke-miterlimit:10;stroke-width:32px"/><polyline points="124 158 124 136 100 136 100 158" style="fill:none;stroke:currentColor;stroke-linecap:round;stroke-linejoin:round;stroke-width:32px"/></svg></button>
                        <button type="button" id="retakeBtn" class="btn btn-warning" style="display: none;">Ambil Foto Ulang</button>
                    </div>
                    <!-- <button type="button"  class="btn btn-primary mt-2">Ambil Foto</button> -->
                    <div id="photoPreview" class="mt-2 mx-auto" style="display: none;">
                        <h5>Foto Tamu:</h5>
                        <img id="photoImg" src="" alt="Foto Tamu" width="900" height="650">
                    </div>
                        <input type="hidden" id="photo" name="photo" required>
                        <p id="photoError" class="alert alert-danger text-center text-danger" style="display: none;">Foto wajib diambil!</p>
                        <!-- End Capture -->
                    <div class="mb-4">
                      <input name="name" class="form-control" placeholder="Nama Lengkap" value="" aria-label="full name" type="text" required="">
                      <div class="invalid-feedback">
                        Silakan Masukkan Nama Lengkap.
                      </div>
                    </div>
                    <div class="mb-4">
                      <input name="phone" class="form-control" placeholder="Nomor Handphone/WhatsApp" value="" aria-label="email" type="text" required="">
                      <div class="invalid-feedback">
                        Nomor Handphone/WhatsApp.
                      </div>
                    </div>
                    <div class="mb-4">
                      <input class="form-control" name="institution" placeholder="Asal Instansi/Perusahaan" aria-label="password" type="text" value="" required="">
                      <div class="invalid-feedback">
                        Asal Instansi/Perusahaan.
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-lg-8">
                        <label class="form-label" for="admin_id">Bertemu Dengan :</label>
                        <div class="form-group">
                            <select id="admin_id" name="user_id" class="form-control select2" required>
                                <option value="">Pilih Admin</option>
                                <?php foreach ($admins as $admin): ?>
                                    <option value="<?= $admin->id ?>" data-room="<?= $admin->room_name ?>">
                                        <?= $admin->admin_name ?>
                                    </option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                      </div>
                      <div class="col-lg-4">
                        <label class="form-label" for="room_name">Ruangan</label>
                        <input type="text" id="room_name" class="form-control" readonly>
                      </div>
                    </div>
                    <div class="mt-4 mb-4">
                    <textarea class="form-control" id="purpose" name="purpose" required placeholder="Keperluan"></textarea>
                    </div>

                    <div class="mb-4 form-group" style="text-align: center;">
                        <label for="signature">Tanda Tangan:</label>
                        <div id="signature-pad" class="signature-pad">
                            <canvas id="signature-canvas" width="400px" height="250" style="border: 1px solid #ccc;"></canvas>
                            <div class="mt-2">
                                <button type="button" id="clear-signature" class="btn btn-danger ms-auto">Bersihkan Tanda Tangan</button>
                            </div>
                        </div>
                        <input type="hidden" name="signature" id="signature-input">
                    </div>

                    <div class="mb-4">
                      <div class="d-grid">
                        <button type="submit" class="btn btn-primary btn-lg">Simpan <svg xmlns="http://www.w3.org/2000/svg" class="ms-1" width="1.2rem" height="1.2rem" fill="currentColor" viewBox="0 0 512 512"><path d="M192,176V136a40,40,0,0,1,40-40H392a40,40,0,0,1,40,40V376a40,40,0,0,1-40,40H240c-22.09,0-48-17.91-48-40V336" style="fill:none;stroke:currentColor;stroke-linecap:round;stroke-linejoin:round;stroke-width:32px"/><polyline points="288 336 368 256 288 176" style="fill:none;stroke:currentColor;stroke-linecap:round;stroke-linejoin:round;stroke-width:32px"/><line x1="80" y1="256" x2="352" y2="256" style="fill:none;stroke:currentColor;stroke-linecap:round;stroke-linejoin:round;stroke-width:32px"/></svg></button>
                      </div>
                    </div>
                    <div class="mb-4">
                      <div class="d-grid">
                        <a href="<?php echo base_url('')?>" class="btn btn-secondary"><svg xmlns="http://www.w3.org/2000/svg" width="2rem" height="2rem" fill="currentColor" viewBox="0 0 512 512"><polyline points="328 112 184 256 328 400" style="fill:none;stroke:currentColor;stroke-linecap:round;stroke-linejoin:round;stroke-width:48px"/></svg> Kembali ke halaman utama</a>
                      </div>
                    </div>
                  </form>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div><!-- End Contact Form -->

    <!-- JS Video -->
    <script>
    document.addEventListener('DOMContentLoaded', function () {
    const video = document.getElementById('video');
    const captureBtn = document.getElementById('captureBtn');
    const retakeBtn = document.getElementById('retakeBtn');
    const capturedImage = document.getElementById('capturedImage');
    const photoInput = document.getElementById('photo');
    const photoError = document.getElementById('photoError');

    // Aktifkan kamera
    if (navigator.mediaDevices && navigator.mediaDevices.getUserMedia) {
        navigator.mediaDevices.getUserMedia({ video: true }).then(function (stream) {
            video.srcObject = stream;
            video.play();
        });
    }

    // Ambil foto
    captureBtn.addEventListener('click', function () {
        const canvas = document.createElement('canvas');
        canvas.width = video.videoWidth;
        canvas.height = video.videoHeight;
        const context = canvas.getContext('2d');
        context.drawImage(video, 0, 0, canvas.width, canvas.height);

        const photoData = canvas.toDataURL('image/png');
        capturedImage.src = photoData;
        capturedImage.style.display = 'block';
        video.style.display = 'none';

        photoInput.value = photoData; // Masukkan data foto ke input hidden
        retakeBtn.style.display = 'inline-block';
        captureBtn.style.display = 'none';
        photoError.style.display = 'none';
    });

    // Ambil ulang foto
    retakeBtn.addEventListener('click', function () {
        capturedImage.style.display = 'none';
        video.style.display = 'block';

        photoInput.value = ''; // Kosongkan nilai input foto
        retakeBtn.style.display = 'none';
        captureBtn.style.display = 'inline-block';
    });

    // Validasi sebelum submit form
    const form = document.querySelector('form');
    form.addEventListener('submit', function (e) {
        if (!photoInput.value) {
            photoError.style.display = 'block';
            e.preventDefault(); // Batalkan submit jika foto belum diambil
        } else {
            photoError.style.display = 'none';
        }
    });
});
</script>

<script>
    $(document).ready(function () {
        $('#admin_id').on('change', function () {
            // Ambil nama ruangan dari opsi yang dipilih
            const roomName = $(this).find(':selected').data('room');
            $('#room_name').val(roomName || ''); // Isi nama ruangan atau kosongkan jika tidak ada
        });

        // Inisialisasi Select2
        $('#admin_id').select2({
            placeholder: "-",
            allowClear: true
        });
    });
</script>


    </main><!-- end main -->