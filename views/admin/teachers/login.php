<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="ThemeMakker">
    <link rel="icon" href="favicon.ico" type="image/x-icon">
    <title>:: Gesdance :: Login</title>
    <link rel="stylesheet" href="<?= BASE_URL; ?>assets/admin/vendor/themify-icons/themify-icons.css">
    <link rel="stylesheet" href="<?= BASE_URL; ?>assets/admin/vendor/fontawesome/css/font-awesome.min.css">

    <link rel="stylesheet" href="<?= BASE_URL; ?>assets/admin/css/main.css" type="text/css">
    <link rel="stylesheet" href="<?= BASE_URL; ?>assets/admin/css/dark.css" type="text/css">
</head>

<body class="theme-black full-dark">

    <!-- Page Loader -->
    <div class="page-loader-wrapper">
        <div class="loader">
            <div class="m-t-30"><img src="<?= BASE_URL; ?>assets/admin/images/brand/icon_black.svg" width="48" height="48" alt="ArrOw"></div>
            <p>Por favor, aguarde...</p>
        </div>
    </div>

    <!-- WRAPPER -->
    <div id="wrapper">
        <div class="vertical-align-wrap">
            <div class="vertical-align-middle auth-main">
                <div class="auth-box">
                    <div class="top">
                        <img src="<?= BASE_URL; ?>assets/admin/images/brand/icon.svg" alt="Lucid">
                        <strong>Ges</strong> <span>Dance</span>

                        <?php if(!empty($_SESSION['error'])): ?>

                        <div class="alert alert-warning alert-dismissible fade show" role="alert">
                            <strong>Atenção!</strong> Login ou senham não conferem.
                        </div>

                        <?php endif; ?>

                        
                    </div>
                    <div class="card">
                        <div class="header">
                            <p class="lead">Faça login na sua conta</p>
                        </div>
                        <div class="body">
                            <form class="form-auth-small" action="<?= BASE_URL; ?>Authenticator/checkLogin" method="POST">
                                <div class="form-group">
                                    <label for="login" class="control-label sr-only">Login</label>
                                    <input type="email" class="form-control" placeholder="E-mail" name="login" id="login">
                                </div>
                                <div class="password">
                                    <label for="password" class="control-label sr-only">Senha</label>
                                    <input type="password" class="form-control" placeholder="Senha:" name="password" id="password">
                                </div>

                                <button type="submit" class="btn btn-primary btn-lg btn-block">ENTRAR</button>
                                <div class="bottom">
                                    <span class="helper-text m-b-10"><i class="fa fa-lock"></i> <a href="auth-forgot-password.html">Esqueceu sua senha?</a></span>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- END WRAPPER -->

    <!-- Core -->
    <script src="<?= BASE_URL; ?>assets/admin/bundles/libscripts.bundle.js"></script>
    <script src="<?= BASE_URL; ?>assets/admin/bundles/vendorscripts.bundle.js"></script>

    <script src="<?= BASE_URL; ?>assets/admin/js/theme.js"></script>
</body>

</html>