<?php view('partials/head.partial.php')  ?>
<!-- Menu -->
<?php view('partials/sidebar.partial.php')  ?>
<!-- Layout container -->

<!-- Navbar -->
<?php view('partials/nav.partial.php')  ?>

<main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">Dashboard</h1>
    <div class="btn-toolbar mb-2 mb-md-0">
      <div class="btn-group me-2">
        <button type="button" class="btn btn-sm btn-outline-secondary">
          Share
        </button>
        <button type="button" class="btn btn-sm btn-outline-secondary">
          Export
        </button>
      </div>
      <a href="/notes/create" class="btn btn-sm btn-outline-danger">Create A Note</a>
    </div>
  </div>

  <div class="container-xxl flex-grow-1 container-p-y">
    <div class="row">
      <div class="col-lg-6 mb-4 order-0">
      <h5 class="card-title mb-3 text-primary">All Notes 🎉</h5>
      <?php foreach ($notes as $note) : ?>  
      <div class="card mb-3">
          <div class="d-flex align-items-end row">
            <div class="col-sm-7">
              <div class="card-body">
               
               
                  <p class="mb-2">
                    <?= $note['body'] ?>
                  </p>
                  <a href="/note?id=<?= $note['id'] ?>" class="btn btn-sm btn-outline-primary">View Notes</a>
              </div>
            </div>
            <div class="col-sm-5 text-center text-sm-left">
              <div class="card-body pb-0 px-0 px-md-4">
               
              </div>
            </div>
          </div>
        </div>
        <?php endforeach; ?>
        
      </div>
      </div>
    </div>

  </div>


</main>


<!-- Footer -->
<?php view('partials/footer.partial.php')  ?>