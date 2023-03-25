<?php view('partials/head.partial.php', []) ?>
<!-- Menu -->
<?php  view('partials/sidebar.partial.php', []) ?>
<!-- Layout container -->

<!-- Navbar -->
<?php  view('partials/nav.partial.php', []) ?>

<main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
  <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">Dashboard</h1>
    <div class="btn-toolbar mb-2 mb-md-0">
      <div class="btn-group me-2">
        
      </div>
      <a href="/notes" class="btn btn-sm btn-outline-secondary">
        <span data-feather="arrow-left" class="align-text-bottom"></span>
        Go Back
      </a>
    </div>
  </div>

  <div class="container-xxl flex-grow-1 container-p-y">
    <div class="row">
      <div class="col-lg-10 mb-4 order-0">
        <div class="card">
          <div class="d-flex align-items-end row">
            <div class="col-sm-10">
              <div class="card-body">
              <span class="text-success mb-2"><?=$prompts['success'] ?? ''; ?></span>
                <form action="/notes" method="POST">
                  <div class="mb-3">
                    <label for="body" class="form-label">Body</label>
                    <textarea name="body" class="form-control" id=""><?= $_POST['body'] ?? ''?></textarea>
                    <?php if(isset($errors['body'])) :?>
                    <span class="text-danger mt-1"><?=$errors['body']; ?></span>
                    <?php endif;?>
                  </div>
                  <button type="submit" class="btn btn-primary">Create</button>
                </form>
              </div>
            </div>

          </div>
        </div>
      </div>
  </div>


</main>


<!-- Footer -->
<?php view ('partials/footer.partial.php') ?>