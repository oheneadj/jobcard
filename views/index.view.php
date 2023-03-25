<?php view('partials/head.partial.php')  ?>

<!-- Content -->

<div class="container-xxl d-flex min-vh-100 align-items-center justify-content-center">
  <div class="authentication-wrapper authentication-basic container-p-y">
    <div class="authentication-inner">
      <!-- Register -->
      <div class="card">
        <div class="card-body">
          <!-- Logo -->

          <!-- /Logo -->
          <h4 class="mb-2 text-center">Welcome 👋</h4>
          <p class="mb-4 text-center"">Please sign-in to your account and start the adventure</p>

          <div class="mb-3">
            <a href="/login" class="btn btn-primary d-grid w-100" type="submit">Sign in</a>
          </div>
          </form>
             <a href="/register">Create new account</a>
        </div>
      </div>
      <!-- /Register -->
    </div>
  </div>
</div>

<!-- / Content -->
<?php view('partials/footer.partial.php')  ?>