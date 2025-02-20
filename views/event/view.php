

    <div class="breadcumb-wrapper " data-bg-src="<?= BASE_URL; ?>assets/images/fotos-sabrina/foto-event2.jpg">
        <div class="container">
            <div class="breadcumb-content">
                <h1 class="breadcumb-title"><?= $info["name"]; ?></h1>
                <ul class="breadcumb-menu">
                    <li><a href="<?= BASE_URL; ?>">INÍCIO</a></li>
                    <li>Eventos</li>
                </ul>
            </div>
        </div>
    </div>
    <!--==============================
Event Area  
==============================-->
    <section class="space-top space-extra-bottom">
        <div class="container">
            <div class="row">
                <div class="col-lg-8">
                    <div class="page-single event-single">
                        <div class="page-img">
                            <img src="<?= BASE_URL; ?><?= $info["image"]; ?>" alt="<?= $info["name"]; ?>">
                        </div>
                        <h3 class="h3 mt-n2"><?= $info["name"]; ?></h3>
                        <p class="mb-30"><?= $info["description"]; ?></p>
                        
                        
                    </div>
                </div>
                <div class="col-lg-4">
                    <aside class="sidebar-area">
                        <div class="widget widget_info  ">
                            <h3 class="widget_title">Informações do evento</h3>
                            <div class="info-list">
                                <ul>
                                    <li>
                                        <i class="fa-light fa-calendar-days"></i><!--DADOS DA SABRINA-->
                                        <strong><?= $info["date"]; ?></p> </strong>
                                        
                                    </li>
                                    <li>
                                        <i class="fa-light fa-clock"></i>
                                        <strong>Hora: </strong>
                                        <span><?= $info["time"]; ?></span>
                                    </li>
                                    <li>
                                        <i class="fa-light fa-location-dot"></i>
                                        <strong><?= $info["local"]; ?> </strong>
                                       
                                    </li>
                                   
                                    
                                </ul>
                            </div>
                        </div>
                        <div class="widget widget_banner  ">
                            <div class="widget-map">
                                <iframe src="<?= $info["frame_map"]; ?>"></iframe>
                            </div>
                        </div>
                    </aside>
                </div>
            </div>
        </div>
    </section>
    
    <div class="overflow-hidden space space">
        <div class="container">
            <div class="row gallery-row filter-active">
                <div class="col-md-6 col-xl-auto filter-item cat3 cat4">
                    <div class="gallery-card">
                        <div class="gallery-img">
                            <img src="<?= BASE_URL; ?>assets/images/fotos-sabrina/turmaH.jpeg" alt="fotos-sabrina" style="width: 491px; height: 310px; border: 2px solid #ccc;">
                            <a href="<?= BASE_URL; ?>assets/images/fotos-sabrina/turmaH.jpeg" class="icon-btn popup-image"><i class="fa-regular fa-plus"></i></a>
                        </div>
                    </div>
                </div>
                <div class="gallery-img">
                            <img src="<?= BASE_URL; ?>assets/images/gallery/gallery_1_1.jpg" alt="gallery image">
                            <a href="<?= BASE_URL; ?>assets/images/gallery/gallery_1_1.jpg" class="icon-btn popup-image"><i class="fa-regular fa-plus"></i></a>
                        </div>   
                
               
               
                
                <div class="col-md-6 col-xl-auto filter-item cat5 cat2">
                    <div class="gallery-card">
                        <div class="gallery-img">
                            <img src="<?= BASE_URL; ?>assets/images/fotos-sabrina/turmaI.jpeg" alt="fotos-sabrina" style="width: 491px; height: 400px; border: 2px solid #ccc;">
                            <a href="<?= BASE_URL; ?>assets/images/fotos-sabrina/turmaI.jpeg" class="icon-btn popup-image"><i class="fa-regular fa-plus"></i></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
                
    