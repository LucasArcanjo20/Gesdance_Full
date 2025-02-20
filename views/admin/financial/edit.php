<div class="page">
    <div class="container-fluid">

        <!-- Advanced Select2 -->
        <div class="row clearfix">
            <div class="col-lg-12 col-md-12 col-sm-12">
                <div class="card">
                    <div class="header">
                        <h2>Editar Alunos</h2>
                    </div>
                    <div class="body">
                        <form action="<?= BASE_URL; ?>student/update/<?= $info["id"]; ?>" method="post">

                            <fieldset>
                                <legend>Pessoais</legend>
                                <div class="row clearfix">
                                    <div class="col-lg-4 col-md-6">
                                        <div class="form-group">
                                            <label for="name">Nome: (*)</label>
                                            <input type="text" class="form-control" name="name" id="name" required="" value="<?= $info["name"]; ?>">
                                        </div>
                                    </div>

                                    <div class="col-lg-4 col-md-6 ">

                                        <label for="document">Documento: (*)</label>
                                        <input type="text" class="form-control" name="document" id="document" required="" value="<?= $info["document"]; ?>">
                                    </div>

                                    <div class="col-lg-4 col-md-6">
                                        <div class="form-group">
                                            <label for="date_birth">Data de Nascimento: (*)</label>
                                            <input type="date" class="form-control" name="date_birth" id="date_birth" required="" value="<?= date('Y-m-d', strtotime($info['date_birth'])); ?>">
                                        </div>
                                    </div>
                                </div>
                            </fieldset>
                            <fieldset>
                                <legend>Contato</legend>
                                <div class="row clearfix">
                                    <div class="col-lg-6 col-md-6">
                                        <div class="form-group">
                                            <label for="phone">Whatsapp / Telefone: (*)</label>
                                            <input type="text" class="form-control phone-number" name="phone" id="phone" required="" value="<?= $info["phone"]; ?>">
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-md-6">

                                        <div class="form-group">
                                            <label for="email">E-mail:</label>
                                            <input type="email" class="form-control" name="email" id="email" value="<?= $info["email"]; ?>">
                                        </div>
                                    </div>

                                </div>
                            </fieldset>
                            <fieldset>
                                <legend>Endereço</legend>
                                <div class="row clearfix">
                                    <div class="col-lg-3 col-md-6">
                                        <div class="form-group">
                                            <label for="zipcode">CEP: (*)</label>
                                            <input type="text" class="form-control" name="zipcode" id="zipcode" required="" onchange="pesquisacep(this.value)" value="<?= $info["zipcode"]; ?>">
                                        </div>
                                    </div>
                                    <div class="col-lg-4 col-md-6">

                                        <div class="form-group">
                                            <label for="street">Rua: (*)</label>
                                            <input type="text" class="form-control" name="street" id="street" required="" value="<?= $info["street"]; ?>">
                                        </div>
                                    </div>

                                    <div class="col-lg-2 col-md-6">
                                        <div class="form-group">
                                            <label for="number">Número: (*)</label>
                                            <input type="number" class="form-control" name="number" id="number" value="<?= $info["number"]; ?>">
                                        </div>
                                    </div>

                                    <div class="col-lg-3 col-md-6">

                                        <div class="form-group">
                                            <label for="complement">Complemento:</label>
                                            <input type="text" class="form-control" name="complement" id="complement" value="<?= $info["complement"]; ?>">
                                        </div>
                                    </div>

                                    <div class="col-lg-3 col-md-6">
                                        <div class="form-group">
                                            <label for="district">Bairro: (*)</label>
                                            <input type="text" class="form-control" name="district" id="district" required="" value="<?= $info["district"]; ?>">
                                        </div>
                                    </div>

                                    <div class="col-lg-3 col-md-6">
                                        <label for="state">Estado:</label>
                                        <select class="form-control " data-placeholder="Select" name="state" id="state" onchange="muda_estado();" value="<?= $info["state"]; ?>">
                                        </select>
                                    </div>

                                    <div class="col-lg-3 col-md-6">
                                        <label for="city">Cidade:</label>
                                        <select class="form-control " data-placeholder="Select" name="city" id="city" onchange="muda_cidade();" value="<?= $info["city"]; ?>">
                                        </select>
                                    </div>

                                    <div class="col-lg-3 col-md-6">
                                        <div class="form-group">
                                            <label for="reference">Referência: </label>
                                            <input type="text" class="form-control" required="" name="reference" id="reference" value="<?= $info["reference"]; ?>">
                                        </div>
                                    </div>



                                </div>


                            </fieldset>
                            <div class="row clearfix">

                                <div class="col-lg-12 col-md-6">
                                    <button type="submit" class="btn btn-primary">Atualizar</button>
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
    const default_state = ["<?= $info['state']; ?>", "<?= $info['state']; ?>", ""];
    const default_city = "<?= $info['city']; ?>";    
</script>

