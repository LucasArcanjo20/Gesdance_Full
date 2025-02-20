
    <div class="space">
        <div class="container">
            <div class="row">
                <div class="col-xl-12">
                    
                    <div class="tab-content" id="nav-tabContent">
                        <div class="tab-pane fade active show" id="nav-1st" role="tabpanel">
                            
                            <?php foreach($list as $key => $item): ?>
                            <div class="event-item">
                                <div class="event-item_wrapper">
                                    <div class="event-item-wrapp">
                                        <div class="event-item_content">
                                            <div class="event-item_list">
                                                <h3 class="event-item_title"><?= $item["name"];  ?></h3>
                                                <span class="event-item_time"><i class="fa-solid fa-calendar-days"></i></i><?= $item["date"];  ?> | <i class="fa-regular fa-clock"></i><?= $item["time"];  ?></span>
                                                <span class="event-item_location"><i class="fa-regular fa-location-dot"></i>
                                                <?= $item["local"];  ?></span>
                                            </div>
                                            <div class="event-btn">
                                                <a href="<?= BASE_URL; ?>Event/show/<?= $item["id"];  ?>" class="th-btn style8">Visualizar</a>
                                            </div>
                                        </div>
                                        <p class="event-item_text"><?= $item["description"];  ?></p>
                                    </div>
                                </div>
                            </div>
                            <?php endforeach; ?>

                          

                            

                         
                        </div>
                       
                        

                    </div>
                </div>
            </div>
        </div>
    </div>
    
    <div class="overflow-hidden space space">
        <div class="container">
        <h1>Galeria</h1>
            <div class="row gallery-row filter-active">
                <div class="col-md-6 col-xl-auto filter-item cat3 cat4">
                    <div class="gallery-card">
                        <div class="gallery-img">
                            <img src="<?= BASE_URL; ?>assets/images/fotos-sabrina/tumaA.jpeg" alt="fotos-sabrina" style="width: 491px; height: 310px; border: 2px solid #ccc;">
                            <a href="<?= BASE_URL; ?>assets/images/fotos-sabrina/tumaA.jpeg" class="icon-btn popup-image"><i class="fa-regular fa-plus"></i></a>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-xl-auto filter-item cat5 cat1">
                    <div class="gallery-card">
                        <div class="gallery-img">
                            <img src="<?= BASE_URL; ?>assets/images/fotos-sabrina/tumaB.jpeg" alt="fotos-sabrina" style="width: 282px; height: 310px; border: 2px solid #ccc;">
                            <a href="<?= BASE_URL; ?>assets/images/fotos-sabrina/tumaB.jpeg" class="icon-btn popup-image"><i class="fa-regular fa-plus"></i></a>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-xl-auto filter-item cat2 cat4">
                    <div class="gallery-card">
                        <div class="gallery-img">
                            <img src="<?= BASE_URL; ?>assets/images/fotos-sabrina/tumaC.jpeg" alt="fotos-sabrina"style="width: 287px; height: 650px; border: 2px solid #ccc;">
                            <a href="<?= BASE_URL; ?>assets/images/fotos-sabrina/tumaC.jpeg" class="icon-btn popup-image"><i class="fa-regular fa-plus"></i></a>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-xl-auto filter-item cat1 cat4">
                    <div class="gallery-card">
                        <div class="gallery-img">
                            <img src="<?= BASE_URL; ?>assets/images/fotos-sabrina/turmaD.jpeg" alt="fotos-sabrina" style="width: 283px; height: 310px; border: 2px solid #ccc;">
                            <a href="<?= BASE_URL; ?>assets/images/fotos-sabrina/turmaD.jpeg" class="icon-btn popup-image"><i class="fa-regular fa-plus"></i></a>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-xl-auto filter-item cat3 cat2">
                    <div class="gallery-card">
                        <div class="gallery-img">
                            <img src="<?= BASE_URL; ?>assets/images/fotos-sabrina/turmaE.jpeg" alt="fotos-sabrina" style="width: 490px; height: 310px; border: 2px solid #ccc;">
                            <a href="<?= BASE_URL; ?>assets/images/fotos-sabrina/turmaE.jpeg" class="icon-btn popup-image"><i class="fa-regular fa-plus"></i></a>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-xl-auto filter-item cat1 cat3">
                    <div class="gallery-card">
                        <div class="gallery-img">
                            <img src="<?= BASE_URL; ?>assets/images/fotos-sabrina/turmaF.jpeg" alt="fotos-sabrina" style="width: 699px; height: 400px; border: 2px solid #ccc;">
                            <a href="<?= BASE_URL; ?>assets/images/fotos-sabrina/turmaF.jpeg" class="icon-btn popup-image"><i class="fa-regular fa-plus"></i></a>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-xl-auto filter-item cat5 cat2">
                    <div class="gallery-card">
                        <div class="gallery-img">
                            <img src="<?= BASE_URL; ?>assets/images/fotos-sabrina/turmaG.jpeg" alt="fotos-sabrina" style="width: 491px; height: 400px; border: 2px solid #ccc;">
                            <a href="<?= BASE_URL; ?>assets/images/fotos-sabrina/turmaG.jpeg" class="icon-btn popup-image"><i class="fa-regular fa-plus"></i></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>