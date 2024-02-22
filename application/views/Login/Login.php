<!doctype html>
<html lang="en">

<head>

<script>
    $(document).ready(function () {
        $('form').submit(function (e) {
            var passwordInput = $('#password');
            if (passwordInput.val() == '') {
                alert('Please enter your password');
                e.preventDefault();
            }
        });
    });
</script>

    <meta charset="utf-8" />
    <title>Login</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- Bootstrap Css -->

    <link rel="stylesheet"
      href="<?php echo base_url();?>assets/css/bootstrap.min.css" id="bootstrap-style" rel="stylesheet" type="text/css">

      <link rel="stylesheet"
      href="<?php echo base_url();?>assets/css/app.min.css" id="app-style" rel="stylesheet" type="text/css" >

      <script type="text/javascript" src="<?php echo base_url();?>assets/libs/jquery/jquery.min.js"></script>
      <script type="text/javascript" src="<?php echo base_url();?>assets/libs/bootstrap/js/bootstrap.bundle.min.js"></script>

</head>

<body class="auth-body-bg">

    <div>
        <div class="container-fluid p-0">
            <div class="row g-0">

                <div class="col-xl-9">
                    <div class="auth-full-bg pt-lg-5 p-4">
                        <div class="w-100">
                            <div class="bg-overlay"></div>
                            <div class="d-flex h-100 flex-column">

                                <div class="p-4 mt-auto">
                                    <div class="row justify-content-center">
                                        <div class="col-lg-7">
                                            <div class="text-center">

                                                
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- end col -->

                <div class="col-xl-3">
                    <div class="auth-full-page-content p-md-5 p-4">
                        <div class="w-100">

                            <div class="d-flex flex-column h-100">
                                <div class="mb-4 mb-md-5">
                                </div>
                                <div class="my-auto">

                                    <div>
                                        <h5 class="text-primary">Selamat Datang !</h5>
                                        <p class="text-muted">DI Sistem Penentu Lulusan Terbaik SMAN 1 MANDIRANCAN.</p>
                                    </div>

                                    <div class="mt-4">
    <?php echo form_open('Login/cek_login')?>

        <div class="mb-3">
            <label for="username" class="form-label">Username</label>
            <input type="text" class="form-control" id="username"
                placeholder="Enter username" name="username">
                <?php if(form_error('username')) { ?>
                <div class="text-danger"><?php echo form_error('username'); ?></div>
            <?php } ?>
        </div>

        <div class="mb-3">
            <label for="password" class="form-label">Password</label>
            <div class="input-group auth-pass-inputgroup">
                <input type="password" class="form-control"
                    placeholder="Enter password" aria-label="Password"
                    aria-describedby="password-addon" name="password">
            </div>
            <?php if(form_error('password')) { ?>
                <div class="text-danger"><?php echo form_error('password'); ?></div>
            <?php } ?>
        </div>

        <div class="mt-3 d-grid">
            <button class="btn btn-primary waves-effect waves-light"
                type="submit">Log In</button>
        </div>
    <?php echo form_close()?>
</div>
                                </div>

                            </div>


                        </div>
                    </div>
                </div>
                <!-- end col -->
            </div>
            <!-- end row -->
        </div>
        <!-- end container-fluid -->
    </div>

</body>

</html>