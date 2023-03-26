<?php view('partials/head.partial.php')  ?>

<body>
   <main>
        <!-- Section -->
        <section class="vh-lg-100 mt-5 mt-lg-0 bg-soft d-flex align-items-center">
            <div class="container">
                <div class="row justify-content-center form-bg-image" data-background-lg="../../assets/img/illustrations/signin.svg">
                    <div class="col-12 d-flex align-items-center justify-content-center">
                        <div class="bg-white shadow border-0 rounded border-light p-4 p-lg-5 w-100 fmxw-500">
                            <div class="text-center text-md-center mb-4 mt-md-0">
                                <h1 class="mb-0 h3">Sign in to our platform</h1>
                            </div>
                            <!-- Form -->
                            <form action="/login" method="POST" class="mt-4">
                                <div class="form-group mb-4">
                                    <label for="email">Your Email</label>
                                    <div class="input-group">
                                        <span class="input-group-text" id="basic-addon1">
                                            <svg class="icon icon-xs text-gray-600" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path d="M2.003 5.884L10 9.882l7.997-3.998A2 2 0 0016 4H4a2 2 0 00-1.997 1.884z"></path><path d="M18 8.118l-8 4-8-4V14a2 2 0 002 2h12a2 2 0 002-2V8.118z"></path></svg>
                                        </span>
                                        <input name="email" type="email" class="form-control" placeholder="example@company.com" id="email" value="<?= $_POST['email'] ?? 'nanajaam@gmail.com'?>" autofocus >
                                        
                                    </div>
                                    <?php if(isset($errors['email'])) :?>
                                                <span class="text-danger mt-1"><?=$errors['email']; ?></span>
                                    <?php endif;?>
                                </div>

                                <div class="form-group">

                                    <div class="form-group mb-4">
                                        <label for="password">Your Password</label>
                                        <div class="input-group">
                                            <span class="input-group-text" id="basic-addon2">
                                                <svg class="icon icon-xs text-gray-600" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M5 9V7a5 5 0 0110 0v2a2 2 0 012 2v5a2 2 0 01-2 2H5a2 2 0 01-2-2v-5a2 2 0 012-2zm8-2v2H7V7a3 3 0 016 0z" clip-rule="evenodd"></path></svg>
                                            </span>
                                            <input name="password" type="password" placeholder="Password" class="form-control" id="password" value="@password@" required>
                                            
                                        </div>
                                        <?php if(isset($errors['password'])) :?>
                                                <span class="text-danger mt-1"><?=$errors['password']; ?></span>
                                            <?php endif;?>
                                    </div>

                                    <div class="d-flex justify-content-between align-items-top mb-4">
                                        <div class="form-check">
                                        </div>
                                        <div>
                                           <a href="./forgot-password.html" class="small text-right">Lost password?</a>
                                        </div>
                                    </div>
                                </div>
                                <div class="d-grid">
                                    <button name="submit" type="submit" class="btn btn-gray-800">Sign in</button>
                                </div>
                            </form>
                            <!-- End of Form -->
                            <div class="d-flex justify-content-center align-items-center mt-4">
                                <span class="fw-normal">
                                    Not registered?
                                    <a href="./sign-up.html" class="fw-bold">Create account</a>
                                </span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </main>

<?php view('partials/scripts.partial.php')  ?>
