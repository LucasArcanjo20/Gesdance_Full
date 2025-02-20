<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="Webpixels">
    <link rel="icon" href="favicon.ico" type="image/x-icon">
    <title>:: Gesdance :: Home</title>

    <link rel="stylesheet" href="<?= BASE_URL; ?>assets/admin/vendor/themify-icons/themify-icons.css">
    <link rel="stylesheet" href="<?= BASE_URL; ?>assets/admin/vendor/fontawesome/css/font-awesome.min.css">

    <link rel="stylesheet" href="<?= BASE_URL; ?>assets/admin/vendor/charts-c3/plugin.css" />
    <link rel="stylesheet" href="<?= BASE_URL; ?>assets/admin/vendor/jvectormap/jquery-jvectormap-2.0.3.css" />
    <link rel="stylesheet" href="<?= BASE_URL; ?>assets/admin/css/main.css" type="text/css">
    <link rel="stylesheet" href="<?= BASE_URL; ?>assets/admin/css/dark.css" type="text/css">
    <link rel="stylesheet" href="<?= BASE_URL; ?>assets/admin/vendor/markdown/bootstrap-markdown.min.css"/>
    <script src="<?= BASE_URL; ?>assets/admin/vendor/jquery/jquery.min.js"></script>

    <script>
        var BASE_URL = '<?= BASE_URL; ?>';
    </script>
</head>

<body class="theme-black full-dark">
    <!-- Page Loader -->
    <div class="page-loader-wrapper">
        <div class="loader">
            <div class="m-t-30"><img src="<?= BASE_URL; ?>assets/admin/images/brand/icon_black.svg" width="48" height="48" alt="ArrOw"></div>
            <p>Por favor, aguarde...</p>
        </div>
    </div>

    <nav class="navbar custom-navbar navbar-expand-lg py-2">
        <div class="container-fluid px-0">
            <a href="javascript:void(0);" class="menu_toggle"><i class="fa fa-align-left"></i></a>
            <a href="<?= BASE_URL; ?>" class="navbar-brand"><img src="<?= BASE_URL; ?>assets/admin/images/brand/icon.svg" alt="BigBucket" /> <strong>Ges</strong> Dance</a>
            <div id="navbar_main">
                <ul class="navbar-nav mr-auto hidden-xs">
                    <li class="nav-item page-header">
                        <ul class="breadcrumb">
                            <li class="breadcrumb-item"><a href="<?= BASE_URL; ?>admin"><i class="fa fa-home"></i></a></li>
                            <li class="breadcrumb-item active">Dashboard</li>
                        </ul>
                    </li>
                </ul>
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item hidden-xs">
                        <form class="form-inline main_search">
                            <input class="form-control form-control-sm mr-sm-2" type="search" placeholder="Search..." aria-label="Search">
                        </form>
                    </li>


                    <li class="nav-item dropdown">
                        <a class="nav-link nav-link-icon" href="javascript:void(0);" id="navbar_1_dropdown_3" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="fa fa-user"></i></a>
                        <div class="dropdown-menu dropdown-menu-right">
                            <h6 class="dropdown-header">User menu</h6>
                            <a class="dropdown-item" href="javascript:void(0);"><i class="fa fa-user text-primary"></i>Meu perfil</a>


                            <a class="dropdown-item" href="javascript:void(0);"><i class="fa fa-cog text-primary"></i>Configurações</a>
                            <div class="dropdown-divider" role="presentation"></div>
                            <a class="dropdown-item" href="<?= BASE_URL; ?>Teacher/logout"><i class="fa fa-sign-out text-primary"></i>sair</a>
                        </div>
                    </li>
                </ul>
            </div>
        </div>
    </nav>



    <div class="main_content" id="main-content">

        <div class="left_sidebar">
            <nav class="sidebar">
                <div class="user-info">
                    <div class="image"><a href="javascript:void(0);"><img src="<?= BASE_URL; ?>assets/images/teachers/profile/sabrina-rodrigues.jpg" alt="User"></a>
                    </div>
                    <div class="detail mt-3">
                        <h5 class="mb-0">Sabrina Rodrígues</h5>
                        <small>Admin</small>
                    </div>
                    <div class="social">

                    <a href="javascript:void(0);" title="whatsapp" target="_blank"><i class="fa fa-whatsapp"></i></a>
<a href="javascript:void(0);" title="instagram" target="_blank"><i class="fa fa-instagram"></i></a>
<a href="javascript:void(0);" title="email" target="_blank"><i class="fa fa-envelope"></i></a>
                    </div>
                </div>
                <ul id="main-menu" class="metismenu">

                    <li class="active"><a href="<?= BASE_URL; ?>admin"><i class="ti-home"></i><span>INÍCIO</span></a></li>

                    <li class="g_heading">Modulos</li>
                    <li><a href="<?= BASE_URL; ?>Team"><i class="fa fa-users"></i><span>Turmas</span></a></li>
                    <li><a href="<?= BASE_URL; ?>Event/adminList"><i class="ti-calendar"></i><span>Eventos</span></a></li>
                    <li><a href="<?= BASE_URL; ?>Student"><i class="fa fa-graduation-cap"></i><span>Alunos</span></a></li>
                    <li><a href="<?= BASE_URL; ?>Teacher"><i class="fa fa-user"></i><span>Professor</span></a></li>
                    <li><a href="<?= BASE_URL; ?>Financial"><i class="fa fa-money" aria-hidden="true"></i><span>Controle Finaceiro</span></a></li>
                    <li><a href="<?= BASE_URL; ?>Attachment"><i class="fa fa-paperclip" aria-hidden="true"></i><span>Anexos</span></a></li>










            </nav>
        </div>

        <div class="right_sidebar">
            <div class="setting_div">
                <a href="javascript:void(0);" class="rightbar_btn"><i class="fa fa-cog fa-spin"></i></a>
            </div>
            <ul class="nav nav-pills nav-fill flex-column flex-sm-row mx-3 my-3" id="myTab" role="tablist">
                <li class="nav-item"><a class="nav-link active" id="Settings-tab" data-toggle="tab" href="#Settings" role="tab" aria-controls="Settings" aria-selected="true">Configurações</a></li>
                
            </ul>
            <hr>
            <div class="tab-content" id="myTabContent">
                <div class="tab-pane show active" id="Settings" role="tabpanel" aria-labelledby="Settings-tab">
                    <div class="sidebar-scroll">
                        <div class="sidebar-widget px-3">
                            <h5>Configuração do tema</h5>
                            <ul class="choose-skin list-unstyled">
                                <li data-theme="black" class="active">
                                    <div class="black"></div>
                                </li>
                                <li data-theme="azure">
                                    <div class="azure"></div>
                                </li>
                                <li data-theme="indigo">
                                    <div class="indigo"></div>
                                </li>
                                <li data-theme="purple">
                                    <div class="purple"></div>
                                </li>
                                <li data-theme="orange">
                                    <div class="orange"></div>
                                </li>
                                <li data-theme="green">
                                    <div class="green"></div>
                                </li>
                                <li data-theme="cyan">
                                    <div class="cyan"></div>
                                </li>
                                <li data-theme="blush">
                                    <div class="blush"></div>
                                </li>
                            </ul>
                            <ul class="setting-list list-unstyled mt-3">
                                <li>
                                    <label class="custom-switch">
                                        <span class="custom-switch-description">Mini barra lateral</span>
                                        <label class="toggle-switch switch-sm mb-0">
                                            <input type="checkbox" class="switch-sidebar">
                                            <span class="toggle-switch-slider"></span>
                                        </label>
                                    </label>
                                </li>
                                <li>
                                    <label class="custom-switch">
                                        <span class="custom-switch-description">Escuro completo</span>
                                        <label class="toggle-switch switch-sm mb-0">
                                            <input type="checkbox" class="switch-dark-full" checked>
                                            <span class="toggle-switch-slider"></span>
                                        </label>
                                    </label>
                                </li>
                            </ul>
                            <hr>
                        </div>
                        <div class="sidebar-widget px-3">
                            <h5>Configuração de idioma</h5>
                            <select class="selectpicker" title="Selecione o idioma">
                                <option>Português</option>
                            </select>
                            <hr>
                        </div>


                    </div>
                </div>
               <div class="tab-pane" id="Contact" role="tabpanel" aria-labelledby="Contact-tab">
                   
                </div >
            </div>
        </div>
        <?php $this->loadViewInTemplate($viewName, $viewData); ?>
    </div>
    <!-- Core -->
    <script src="<?= BASE_URL; ?>assets/admin/bundles/libscripts.bundle.js"></script>
    <script src="<?= BASE_URL; ?>assets/admin/bundles/vendorscripts.bundle.js"></script>

    <script src="<?= BASE_URL; ?>assets/admin/bundles/c3.bundle.js"></script>
    <script src="<?= BASE_URL; ?>assets/admin/bundles/jvectormap.bundle.js"></script> <!-- JVectorMap Plugin Js -->

    <script src="<?= BASE_URL; ?>assets/admin/js/theme.js"></script>
    <script src="<?= BASE_URL; ?>assets/admin/js/pages/index.js"></script>
    <script src="<?= BASE_URL; ?>assets/admin/js/pages/todo-js.js"></script>


    <script src="<?= BASE_URL; ?>assets/js/estado_cidade_localiZAZ.js"></script>
    <script src="<?= BASE_URL; ?>assets/js/cep.js"></script>

    <script src="<?= BASE_URL; ?>assets/js/file-input-image-preview.js"></script>

    <script src="<?= BASE_URL; ?>assets/admin/bundles/markdown.bundle.js"></script>
    
</body>

</html>