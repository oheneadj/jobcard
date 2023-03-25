<?php view('partials/head.partial.php')  ?>

<!-- Menu -->
<?php view('partials/sidebar.partial.php')  ?>

<!-- Layout container -->

<!-- Navbar -->
<?php view('partials/nav.partial.php')  ?>



<!-- Content wrapper -->
<div class="content-wrapper">
  <!-- Content -->

  <div class="container-xxl flex-grow-1 container-p-y">
    <div class="row">
      <div class="col-lg-8 mb-4 order-0">
        <div class="card">
          <div class="d-flex align-items-end row">
            <div class="col-sm-7">
              <div class="card-body">
                <a href="/notes" class="btn btn-sm btn-outline-primary">Go back</a>
                <h5 class="card-title text-primary">Notes John! 🎉</h5>
                <p class="mb-4">
                  <?= $note['body'] ?>
                </p>
                <!-- <a href="javascript:;" class="btn btn-sm btn-outline-primary">View Badges</a> -->
              </div>
            </div>
            <div class="col-sm-5 text-center text-sm-left">
              <div class="card-body pb-0 px-0 px-md-4">
                <img src="views/assets/img/illustrations/man-with-laptop-light.png" height="140" alt="View Badge User" data-app-dark-img="views/assets/img/illustrations/man-with-laptop-dark.png" data-app-light-img="views/assets/img/illustrations/man-with-laptop-light.png" />
              </div>
            </div>
          </div>
        </div>
      </div>
        </div>
      </div>
    </div>
  </div>
  <!-- / Content -->

  <!-- Footer -->
  <?php view('partials/footer.partial.php')  ?>