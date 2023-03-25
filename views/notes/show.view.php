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
      <button type="button" class="btn btn-sm btn-outline-secondary dropdown-toggle">
        <span data-feather="calendar" class="align-text-bottom"></span>
        This week
      </button>
    </div>
  </div>

  <div class="container-xxl flex-grow-1 container-p-y">
    <div class="row">
      <div class="col-lg-8 mb-4 order-0">
        <div class="card">
          <div class="d-flex align-items-end row">
         
            <div class="col-sm-7">
              <div class="card-body">
              <a href="/notes" class="btn btn-sm btn-outline-primary mb-4">Go Back</a>
              <a href="/note/edit?id=<?=$note['id']?>" class="btn btn-sm mb-4 btn-warning">Edit</a>
                <h5 class="card-title text-primary"><?=$user?>'s Notes! 🎉</h5>

                <p class="mb-4">
                  <?= $note['body'] ?>
                </p>
               
                <form class="mt-4" method="POST">
                  <input type="hidden" name="_method" value="DELETE">
                  <input type="hidden" name="id" value="<?=$note['id']?>">
                  <button class="btn btn-sm btn-danger">Delete</button>
                </form>
              </div>
            </div>
          </div>
        </div>
      </div>
        </div>
      </div>
    </div>
  </div>


</main>


<!-- Footer -->
<?php view('partials/footer.partial.php')  ?>