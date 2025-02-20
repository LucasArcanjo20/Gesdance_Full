<div class="page">
    <div class="container-fluid">

        <!-- Advanced Select2 -->
        <div class="row clearfix">
            <div class="col-lg-12 col-md-12 col-sm-12">
                <div class="card">
                    <div class="header">
                        <h2>Cadastro de Professores</h2>
                    </div>
                    <div class="body">
                        <form action="<?= BASE_URL; ?>Teacher/store" method="post" enctype="multipart/form-data">

                            <fieldset>
                                <legend>Conta</legend>
                                <div class="row clearfix">
                                    <div class="col-lg-6 col-md-6">
                                        <div class="form-group">
                                            <label for="login">login: (*)</label>
                                            <input type="text" class="form-control" name="login" id="login" required="">
                                        </div>
                                    </div>

                                    <div class="col-lg-6 col-md-6 ">

                                        <label for="password">Senha: (*)</label>
                                        <input type="password" class="form-control" name="password" id="password" required="">
                                    </div>


                                </div>
                            </fieldset>
                            <fieldset>
                                <legend>Outras Informações</legend>
                                <div class="row clearfix">
                                    <div class="col-lg-4 col-md-6">
                                        <div class="form-group">
                                            <label for="name">Nome (*)</label>
                                            <input type="text" class="form-control phone-number" name="name" id="name" required="">
                                        </div>
                                    </div>
                                    <div class="col-lg-4 col-md-6">

                                        <div class="form-group">
                                            <label for="phone">Whatsapp / Telefone: (*)</label>
                                            <input type="text" class="form-control" name="phone" id="phone" required="">
                                        </div>
                                    </div>

                                    <div class="col-lg-4 col-md-6">
                                        <div class="form-group">
                                            <label for="email">Email</label>
                                            <input type="text" class="form-control" name="email" id="email">
                                        </div>
                                    </div>
                                </div>

                                <fieldset>

                                    <legend>Endereço</legend>
                                    <div class="row clearfix">
                                        <div class="col-lg-3 col-md-6">
                                            <div class="form-group">
                                                <label for="zipcode">CEP: (*)</label>
                                                <input type="text" class="form-control" name="zipcode" id="zipcode" required="" onchange="pesquisacep(this.value)">
                                            </div>
                                        </div>
                                        <div class="col-lg-4 col-md-6">

                                            <div class="form-group">
                                                <label for="street">Rua: (*)</label>
                                                <input type="text" class="form-control" name="street" id="street" required="">
                                            </div>
                                        </div>

                                        <div class="col-lg-2 col-md-6">
                                            <div class="form-group">
                                                <label for="number">Número: (*)</label>
                                                <input type="number" class="form-control" name="number" id="number">
                                            </div>
                                        </div>

                                        <div class="col-lg-3 col-md-6">

                                            <div class="form-group">
                                                <label for="complement">Complemento:</label>
                                                <input type="text" class="form-control" name="complement" id="complement">
                                            </div>
                                        </div>

                                        <div class="col-lg-3 col-md-6">
                                            <div class="form-group">
                                                <label for="district">Bairro: (*)</label>
                                                <input type="text" class="form-control" name="district" id="district" required="">
                                            </div>
                                        </div>

                                        <div class="col-lg-3 col-md-6">
                                            <label for="state">Estado:</label>
                                            <select class="form-control " data-placeholder="Select" name="state" id="state" onchange="muda_estado();">
                                            </select>
                                        </div>

                                        <div class="col-lg-3 col-md-6">
                                            <label for="city">Cidade:</label>
                                            <select class="form-control " data-placeholder="Select" name="city" id="city" onchange="muda_cidade();">
                                            </select>
                                        </div>

                                        <div class="col-lg-3 col-md-6">
                                            <div class="form-group">
                                                <label for="reference">Referência: </label>
                                                <input type="text" class="form-control" required="" name="reference" id="reference">
                                            </div>
                                        </div>



                                    </div>

                                    <fieldset>

                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text">Tipos de Dança</span>
                                            </div>
                                            <textarea class="form-control" aria-label="Tipos-de-dança" name="descrition" id="descrition"></textarea>
                                        </div>

                                    </fieldset>
                                </fieldset>
                            </fieldset>

                            <fieldset>
                                <legend>Informações Complemetares</legend>
                                <div class="row clearfix">


                                    <div class="col-lg-6 col-md-6 ">

                                        <label for="password">Instagram: (*)</label>
                                        <input type="text" class="form-control" name="instagram" id="instagram" required="">
                                    </div>

                                    <div class="col-lg-6 col-md-6 ">

                                        <label for="document">Documentos (*)</label>
                                        <input type="text" class="form-control" name="document" id="document" required="">
                                    </div>

                                    <div class="col-lg-6 col-md-6 ">

                                        <label for="image">Imagem: (*)</label>
                                        <input type="text" class="form-control" name="image" id="image" required="">
                                    </div>

                                    <div class="col-lg-6 col-md-6 ">

                                        <label for="date_birth">Data de Nascimento: (*)</label>
                                        <input type="date" class="form-control" name="date_birth" id="date_birth" required="">
                                    </div>


                                </div>
                            </fieldset>
                            <fieldset>
                                <legend>Anexo</legend>
                                <div class="row clearfix">

                                    <div class="col-lg-12 col-md-12 ">

                                        <label for="voice_video_authorization">Autorização de voz e vídeo: (*)</label>
                                        <input type="file" class="form-control" name="voice_video_authorization" id="voice_video_authorization" required="">
                                    </div>

                                </div>
                            </fieldset>
                            <div class="row clearfix mt-3">

                                <div class="col-lg-12 col-md-6">
                                    <button type="submit" class="btn btn-primary">Cadastrar</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>



    </div>
</div>


<!-- cidades e estado padrão -->
<script>
    const default_state = ["", "", ""];
    const default_city = "";
</script>