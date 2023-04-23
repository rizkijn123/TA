<main class="main-content  mt-0">
    <section class="min-vh-100 mb-8">
        <div class="page-header align-items-start min-vh-50 pt-5 pb-11 m-3 border-radius-lg"
            style="background-image: url('../assets/img/curved-images/curved14.jpg');">
            <span class="mask bg-gradient-dark opacity-6"></span>
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-lg-5 text-center mx-auto">
                        <h1 class="text-white mb-2 mt-5">Welcome!</h1>
                        <p class="text-lead text-white">Register user</p>
                    </div>
                </div>
            </div>
        </div>
        <div class="container">
            <div class="row mt-lg-n10 mt-md-n11 mt-n10">
                <div class="col-xl-4 col-lg-5 col-md-7 mx-auto">
                    <div class="card z-index-0">
                        <div class="card-body">
                            <form role="form text-left" method="post" action="<?= base_url('auth/registration'); ?>">
                                <div class="mb-3">
                                    <input type="text" class="form-control" placeholder="Name" aria-label="Name"
                                        aria-describedby="email-addon" name="name" value="<?= set_value('name') ?>">
                                    <?= form_error('name', ' <small class="text-danger">','</small>') ?>
                                </div>
                                <div class="mb-3">
                                    <input type="email" class="form-control" placeholder="Email" aria-label="Email"
                                        aria-describedby="email-addon" name="email" value="<?= set_value('email') ?>">
                                    <?= form_error('email', ' <small class="text-danger">','</small>') ?>
                                </div>
                                <div class=" mb-3">
                                    <input type="password" class="form-control" placeholder="Password"
                                        aria-label="Password" aria-describedby="password-addon" name="password1">
                                    <?= form_error('password1', ' <small class="text-danger">','</small>') ?>
                                </div>
                                <div class=" mb-3">
                                    <input type="password" class="form-control" placeholder="Repeat Password"
                                        aria-label="Password" aria-describedby="password-addon" name="password2">
                                </div>
                                <div class="text-center">
                                    <button type="submit" class="btn bg-gradient-dark w-100 my-4 mb-2">Sign up</button>
                                </div>
                                <p class="text-sm mt-3 mb-0">Already have an account? <a href="<?= base_url('auth'); ?>"
                                        class="text-dark font-weight-bolder">Sign in</a></p>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>