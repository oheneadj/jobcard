<?php view('partials/head.partial.php')  ?>

<?php view('partials/mobile-toggle.partial.php')  ?>

<?php view('partials/sidebar.partial.php')  ?>

<?php view('partials/header.partial.php')  ?>

<?php view('partials/add-new.partial.php') ?>
            <div class="row d-flex justify-content-center py-4">
                <div class="col-12 col-md-6">
                <?php view('partials/alert.partial.php')  ?>

                    <?php if(isset($errors['user_exists'])) {?>
                    <p class="bg-danger text-center text-white rounded px-3 py-1 text-sm"><?=$errors['user_exists']; ?></p>
                    <?php } elseif (isset($errors['no_errors'])) {?>
                        <p class="bg-success text-center text-white rounded px-3 py-1 text-sm"><?=$errors['no_errors']; ?></p> 
                        <?php } ?>
                    <div class="card card-body border-0 shadow mb-4">
                        <h2 class="h5 mb-4">Edit User</h2>
                        <form action="/user/edit" method="POST">
                        <input type="hidden" name="_method" value="PATCH">
                            <input type="hidden" name="uuid" value="<?= $user['uuid'] ?>">
                            <div class="row">
                                <div class="col-md-12 mb-3">
                                    <div>
                                        <label for="name">Name</label>
                                        <input name="name" class="form-control" id="name" type="text" placeholder="Eg. Ohene Adjei" value="<?= $user['name'] ?? $_POST['name'] ?>" required>
                                    </div>
                                    <?php if(isset($errors['name'])) :?>
                                                <span class="text-danger mt-1"><?=$errors['name']; ?></span>
                                    <?php endif;?>
                                </div>
                                
                            </div>
                            <div class="row">
                                <div class="col-md-12 mb-3">
                                    <div>
                                        <label for="email">Email</label>
                                        <input name="email" class="form-control" id="email" type="email" placeholder="ohene@example.com" value="<?= $user['email'] ?? $_POST['email'] ?>" required="">
                                    </div>
                                    <?php if(isset($errors['email'])) :?>
                                                <span class="text-danger mt-1"><?=$errors['email']; ?></span>
                                    <?php endif;?>
                                </div>
                                
                            </div>
                            <div class="row align-items-center">
                                <div class="col-md-12 mb-3">
                                    <label for="user-type">User Type</label>
                                    <select name="user-type" class="form-select mb-0" id="user-type" aria-label="Select user type">
                                        <option value="1" <?= $user['user_type'] == 1 ? "selected" : "" ?> >Admin</option>
                                        <option value="2" <?= $user['user_type'] == 2 ? "selected" : "" ?> >User</option>
                                    </select>
                                </div>
                                <?php if(isset($errors['user_type'])) :?>
                                                <span class="text-danger mt-1"><?=$errors['user_type']; ?></span>
                                <?php endif;?>
                            </div>
                            <div class="mt-3 d-flex justify-content-end">
                                <button name="submit" class="btn btn-gray-800 mt-2 animate-up-2" type="submit">Update User</button>
                            </div>
                        </form>
                    </div>
                    <div class="mt-3 d-flex justify-content-start">
                    <button type="button" class="btn btn-block text-white btn-success mb-3" data-bs-toggle="modal" data-bs-target="#modalNotification">Reset <?= $user['name'] ?>'s Password</button>                    </div>
                </div>
            </div>
            <div class="theme-settings card bg-gray-800 pt-2 collapse" id="theme-settings">
    <div class="card-body bg-gray-800 text-white pt-4">
        <button type="button" class="btn-close theme-settings-close" aria-label="Close" data-bs-toggle="collapse"
            href="#theme-settings" role="button" aria-expanded="false" aria-controls="theme-settings"></button>
        <div class="d-flex justify-content-between align-items-center mb-3">
            <p class="m-0 mb-1 me-4 fs-7">Open source <span role="img" aria-label="gratitude">💛</span></p>
            <a class="github-button" href="https://github.com/themesberg/volt-bootstrap-5-dashboard"
                data-color-scheme="no-preference: dark; light: light; dark: light;" data-icon="octicon-star"
                data-size="large" data-show-count="true"
                aria-label="Star themesberg/volt-bootstrap-5-dashboard on GitHub">Star</a>
        </div>
        <a href="https://themesberg.com/product/admin-dashboard/volt-bootstrap-5-dashboard" target="_blank"
            class="btn btn-secondary d-inline-flex align-items-center justify-content-center mb-3 w-100">
            Download
            <svg class="icon icon-xs ms-2" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M2 9.5A3.5 3.5 0 005.5 13H9v2.586l-1.293-1.293a1 1 0 00-1.414 1.414l3 3a1 1 0 001.414 0l3-3a1 1 0 00-1.414-1.414L11 15.586V13h2.5a4.5 4.5 0 10-.616-8.958 4.002 4.002 0 10-7.753 1.977A3.5 3.5 0 002 9.5zm9 3.5H9V8a1 1 0 012 0v5z" clip-rule="evenodd"></path></svg>
        </a>
        <p class="fs-7 text-gray-300 text-center">Available in the following technologies:</p>
        <div class="d-flex justify-content-center">
            <a class="me-3" href="https://themesberg.com/product/admin-dashboard/volt-bootstrap-5-dashboard"
                target="_blank">
                <img src="../../assets/img/technologies/bootstrap-5-logo.svg" class="image image-xs">
            </a>
            <a href="https://demo.themesberg.com/volt-react-dashboard/#/" target="_blank">
                <img src="../../assets/img/technologies/react-logo.svg" class="image image-xs">
            </a>
        </div>
    </div>
</div>

<div class="card theme-settings bg-gray-800 theme-settings-expand" id="theme-settings-expand">
    <div class="card-body bg-gray-800 text-white rounded-top p-3 py-2">
        <span class="fw-bold d-inline-flex align-items-center h6">
            <svg class="icon icon-xs me-2" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M11.49 3.17c-.38-1.56-2.6-1.56-2.98 0a1.532 1.532 0 01-2.286.948c-1.372-.836-2.942.734-2.106 2.106.54.886.061 2.042-.947 2.287-1.561.379-1.561 2.6 0 2.978a1.532 1.532 0 01.947 2.287c-.836 1.372.734 2.942 2.106 2.106a1.532 1.532 0 012.287.947c.379 1.561 2.6 1.561 2.978 0a1.533 1.533 0 012.287-.947c1.372.836 2.942-.734 2.106-2.106a1.533 1.533 0 01.947-2.287c1.561-.379 1.561-2.6 0-2.978a1.532 1.532 0 01-.947-2.287c.836-1.372-.734-2.942-2.106-2.106a1.532 1.532 0 01-2.287-.947zM10 13a3 3 0 100-6 3 3 0 000 6z" clip-rule="evenodd"></path></svg>
            Settings
        </span>
    </div>
</div>

<!-- Button Modal -->

<!-- Modal Content -->
<div class="modal fade" id="modalNotification" tabindex="-1" role="dialog" aria-labelledby="modalTitleNotify" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-body">
                <div class="py-3 text-center">
                <h2 class="h4 modal-title my-3">Do you want to reset password?</h2>
                    <p>A new password will be generated and sent to <?= $user['name'] ?>'s email</p>
                    
                </div>
                <div class="d-flex justify-content-center ">
                <button type="button" class="btn btn-success text-white">Reset password</button>
                <button type="button" class="btn btn-danger text-gray ms-auto" data-bs-dismiss="modal">Close</button>
                </div>   
            </div>
            
        </div>
    </div>
</div>
<!-- End of Modal Content -->

<?php view('partials/footer.partial.php')  ?>
<?php view('partials/scripts.partial.php')  ?>