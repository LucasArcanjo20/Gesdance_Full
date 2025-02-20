
    <!--==============================
    Breadcumb
============================== -->
    <div class="breadcumb-wrapper">
        <div class="container">
            <div class="breadcumb-content">
                <h1 class="breadcumb-title">Contate-nos</h1>
                <ul class="breadcumb-menu">
                    <li><a href="<?= BASE_URL; ?>">INÍCIO</a></li>
                    <li>Contate-nos</li>
                </ul>
            </div>
        </div>
    </div>
   
    <!--==============================
Contact Area  
==============================-->
    <div class="space-bottom overflow-hidden mt-2" id="contact-sec">
        <div class="container">
            <div class="row">
                <div class="col-lg-6">
                    <div class="contact-image">
                        <img src="<?= BASE_URL; ?>assets\images\fotos-sabrina\foto-home1.jpeg" alt="">
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="title-area mt-n1 mb-35">
                        <span class="sub-title style1">Entrar em contato</span>
                        
                    </div>
                    <form action="mail.php" method="POST" class="contact-us-form ajax-contact">
                        <div class="row">
                            <div class="form-group col-md-6">
                                <input type="text" class="form-control" name="name" id="name" placeholder="Seu nome">
                                <i class="fal fa-user"></i>
                            </div>
                            <div class="form-group col-md-6">
                                <input type="email" class="form-control" name="email" id="email" placeholder="Seu email">
                                <i class="fal fa-envelope"></i>
                            </div>
                            <div class="form-group col-md-6">
                                <input type="tel" class="form-control" name="number" id="number" placeholder="Número de telefone">
                                <i class="fa-regular fa-phone-flip"></i>
                            </div>
                            <div class="form-group col-md-6"><!--MODIFICAR MUITA COISA DISSO NO VITOR-->
                                <select name="subject" id="subject" class="form-select nice-select">
                                    <option value="" disabled selected hidden>Como ficou sabendo do Studio</option>
                                    <option value="Instagram">Instagram</option>
                                    <option value="Facebook">Facebook</option>
                                    <option value="Google">Google</option>
                                    <option value="Alunos">Alunos</option>
                                    <option value="Outros">Outros</option>
                                    
                                </select><!--MODIFICAR MUITA COISA DISSO NO VITOR-->
                            </div>
                            <div class="form-group col-12">
                                <textarea name="message" id="message" cols="30" rows="3" class="form-control" placeholder="Sua mensagem"></textarea>
                                <i class="fal fa-comment"></i>
                            </div>
                            <div class="contact-form-btn col-12">
                                <button class="th-btn">Enviar mensagem</button>
                            </div>
                        </div>
                        <p class="form-messages mb-0 mt-3"></p>
                    </form>
                </div>
            </div>
        </div>
        <div class="shape-mockup ripple-animation d-none d-xl-block" data-bottom="15%" data-left="5%"><img src="<?= BASE_URL; ?>assets/images/shape/shape_7.png" alt="shape"></div>
        <div class="shape-mockup jump d-none d-xl-block" data-top="-45%" data-right="0%"><img src="<?= BASE_URL; ?>assets/images/shape/contact_shape.svg" alt="shape"></div>

    </div>
    <div class="map-sec">
    <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3732.6074297098125!2d-42.62276942553349!3d-20.685544362278655!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0xa4aa0542d7d277%3A0x784824478d20811!2sMGT-482%2C%2095%2C%20Cana%C3%A3%20-%20MG%2C%2036592-000!5e0!3m2!1spt-PT!2sbr!4v1712685679388!5m2!1spt-PT!2sbr" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
    </div>

    