<!-- start footer -->
<a id="spy-get-in-touch" class="ancor"></a>
<footer id="footer" class="footer--style-2 footer--dark">
    <div class="footer__inner">
        <div class="container">
            <div class="row">

                <div class="col-md-6 col-lg-6">
                    <div class="footer__item">
                        <h3 class="footer__title">Contactos</h3>



                        <div class="company-contacts">
                            <address>
                                <p>
                                    <i class="fontello-location"></i>
                                    IPEME - Av 25 de Setembro, nº1509, 1º andar, Maputo
                                </p>
                                <p>
                                    <i class="fontello-phone-call"></i>
                                    Tel.(+258) 21305626, Fax 21018356, Cell: (+258) 82 040 0690

                                </p>
                                <p>
                                    <i class="fontello-mail"></i>
                                    <a href="mailto:info@ipeme.gov.mz">info@ipeme.gov.mz</a>
                                </p>
                            </address>

                            <div class="social-btns">
                                <div class="social-btns__inner">
                                    <a class="fontello-twitter" href="#" target="_blank"></a>
                                    <a class="fontello-facebook" href="#" target="_blank"></a>
                                    <a class="fontello-linkedin-squared" href="#" target="_blank"></a>
                                    <a class="fontello-youtube" href="#" target="_blank"></a>
                                    <a class="fontello-gplus" href="#" target="_blank"></a>
                                    <a class="fontello-vimeo" href="#" target="_blank"></a>
                                    <a class="fontello-vkontakte" href="#" target="_blank"></a>
                                    <a class="fontello-instagram" href="#" target="_blank"></a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-md-12 col-lg-6">
                    <div class="footer__item">
                        <h3 class="footer__title">Entre em Contacto</h3>

                        <h4 class="h2"> @include('flash::message')</h4>

                        <form action="{{route("site.contato-envia")}}" method="post">

                            {!! csrf_field() !!}


                            <label class="input-wrp">
                                <i class="fontello-user"></i>
                                <input class="textfield" type="text" placeholder="Nome" name="nome" required />
                            </label>

                            @if ($errors->has('nome'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('nome') }}</strong>
                                </span>
                            @endif

                            <label class="input-wrp">
                                <i class="fontello-mail"></i>
                                <input class="textfield" type="text" name="email" placeholder="E-mail" required />
                            </label>

                            @if ($errors->has('email'))
                                <span class="help-block">
                            <strong>{{ $errors->first('email') }}</strong>
                        </span>
                            @endif

                            <label class="input-wrp">
                                <i class="fontello-comment"></i>
                                <textarea class="textfield" placeholder="Mensagem" name="mensagem" required></textarea>
                            </label>

                            @if ($errors->has('mensagem'))
                                <span class="help-block">
                            <strong>{{ $errors->first('mensagem') }}</strong>
                        </span>
                            @endif

                            <div class="btn-wrp">
                                <button class="custom-btn primary long" type="submit" role="button">Enviar Mensagem</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</footer>
<!-- end footer -->
