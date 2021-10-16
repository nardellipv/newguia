<footer class="section-padding bg-light-theme pt-0 u-line bg-black">
    <div class="container-fluid">
        <div class="row">
            <div class="col-xl col-lg-3 col-md-3 col-sm-6">
                <div class="footer-links">
                    <h6 class="text-custom-white">Links utiles</h6>
                    <ul>
                        <li><a href="{{ route('list.blog') }}" class="text-light-white fw-600" title="Blog"
                                itemprop="url">Blog</a></li>
                        <li><a href="{{ route('term') }}" class="text-light-white fw-600" title="Términos y Condiciones"
                                itemprop="url">Términos y
                                Condiciones</a></li>
                        <li><a href="{{ route('policity') }}" class="text-light-white fw-600"
                                title="Política de Privacidad" itemprop="url">Política de
                                privacidad</a></li>
                        <li><a href="{{ route('contact') }}" class="text-light-white fw-600" title="Contacto"
                                itemprop="url">Contacto</a></li>
                    </ul>
                </div>
            </div>
            <div class="col-xl col-lg-3 col-md-3 col-sm-6">
                <div class="footer-links">
                    <h6 class="text-custom-white">Mantenete en contacto</h6>
                    <ul>
                        <li class="text-light-white fw-600"><i class="fa fa-map-marker"></i> Mendoza, Argentina</li>
                        <li class="text-light-white fw-600"><i class="fa fa-envelope"></i> info@guiaceliaca.com.ar</li>
                    </ul>
                </div>
            </div>
            <div class="col-xl col-lg-3 col-md-3 col-sm-6">
                <div class="footer-links">
                    <h6 class="text-custom-white">Partner</h6>
                    <ul>
                        <li class="text-light-white fw-600"><a href="https://mikant.com.ar" target="_blank">MikAnt</a></li>
                        <li class="text-light-white fw-600"><a href="https://avisosmendoza.com.ar" target="_blank">Avisos Mendoza</a></li>
                    </ul>
                </div>
            </div>
            <div class="col-xl col-lg-3 col-md-3 col-sm-6">
                <div class="footer-contact">
                    <h6 class="text-custom-white">Newsletter</h6>
                    <form class="subscribe_form" method="post" action="{{ route('newsletter.add') }}">
                        @csrf
                        <div class="input-group">
                            <input type="text" class="form-control form-control-submit" name="email"
                                placeholder="Ingresar tu email">
                            <span class="input-group-btn">
                                <button class="btn btn-second btn-submit" type="submit"><i
                                        class="fas fa-paper-plane"></i></button>
                            </span>
                        </div>
                    </form>
                </div>
            </div>


            <div class="u-line instagram-slider swiper-container">
                <!-- SnapWidget -->
                <iframe src="https://snapwidget.com/embed/943053" class="snapwidget-widget" allowtransparency="true"
                    frameborder="0" scrolling="no"
                    style="border:none; overflow:hidden;  width:1440px; height:160px"></iframe>
            </div>

            <div class="col-md-12">
                <div class="ft-social-media">
                    <ul>
                        <li> <a href="https://www.facebook.com/guiaceliaca" target="_blank"><i
                                    class="fab fa-facebook-f"></i></a>
                        </li>
                        <li> <a href="https://www.instagram.com/guiaceliaca/" target="_blank"><i
                                    class="fab fa-instagram"></i></a>
                        </li>
                    </ul>
                </div>
            </div>

            <div class="u-line instagram-slider swiper-container">
                <!-- SnapWidget -->
                <iframe src="https://snapwidget.com/embed/946071" class="snapwidget-widget" allowtransparency="true"
                    frameborder="0" scrolling="no"
                    style="border:none; overflow:hidden;  width:1440px; height:160px"></iframe>
            </div>

        </div>
    </div>
</footer>
<div class="copyright bg-black">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-4">
                <div class="copyright-text"> <span class="text-light-white">Copyright 2021 MikAnt | All Rights Reserved
                        | <a href="https://mikant.com.ar" target="_blank">Design by MikAnt</a>
                    </span>
                </div>
            </div>
        </div>
    </div>
</div>