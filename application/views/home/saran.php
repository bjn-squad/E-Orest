    <!-- ======= Hero Section ======= -->
    <section class="d-flex align-items-center">
      <div class="container position-relative text-center text-lg-start" data-aos="zoom-in" data-aos-delay="100"></div>
    </section>
    <!-- End Hero -->

    <!-- ======= Book A Table Section ======= -->
    <section id="book-a-table" class="book-a-table">
      <div class="container" data-aos="fade-up">

        <div class="section-title">
          <h2>Form</h2>
          <p>Kritik & Saran</p>
        </div>

        <form action="<?php base_url("saran/add") ?>" method="post" role="form" class="php-email-form" enctype="multipart/form-data">
          <div class="row">
            <div class="col-md-6 form-group">
              <input type="text" name="nama_pelanggan" class="form-control <?php echo form_error('nama_pelanggan') ? 'is-invalid' : '' ?>" placeholder="Nama Anda" required>
              <div class="invalid-feedback">
                <?php echo form_error('nama_pelanggan') ?>
              </div>
            </div>
            <div class="col-md-6 form-group">
              <input type="text" name="email" class="form-control <?php echo form_error('email') ? 'is-invalid' : '' ?>" placeholder="Email" required>
              <div class="invalid-feedback">
                <?php echo form_error('email') ?>
              </div>
            </div>
          </div>
          <div class="form-group mt-3">
            <textarea class="form-control <?php echo form_error('saran') ? 'is-invalid' : '' ?>" name="saran" rows="8" placeholder="Kritik & Saran" required></textarea>
            <div class="invalid-feedback">
              <?php echo form_error('saran') ?>
            </div>
          </div>
          <div class="my-3">
            <div class="loading">Loading</div>
            <div class="sent-message">Your message has been sent. Thank you!</div>
          </div>
          <div class="text-center"><button type="submit" name="submit" class="btn btn-success btn-sm">Send Message</button></div>
        </form>

      </div>
    </section><!-- End Book A Table Section -->