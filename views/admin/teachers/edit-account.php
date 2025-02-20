<div class="page">
    <div class="container-fluid">

        <!-- Advanced Select2 -->
        <div class="row clearfix">
            <div class="col-lg-12 col-md-12 col-sm-12">
                <div class="card">
                    <div class="header">
                        <h2>Editar Informações da Conta </h2>
                    </div>
                    <div class="body">
                        <form action="<?= BASE_URL; ?>Teacher/updateAccount/<?= $info["id"]; ?>" method="post">

                            
                            <fieldset>
                                <legend>Informações</legend>
                                <div class="row clearfix">
                                <div class="col-lg-6 col-md-6">
                                        <div class="form-group">
                                            <label for="login">login: (*)</label>
                                            <input type="text" class="form-control" name="login" id="login" required="" value="<?= $info["login"]; ?>" >
                                        </div>
                                    </div>

                                    <div class="col-lg-6 col-md-6 ">

                                        <label for="password">Senha: (*)</label>
                                        <input type="password" class="form-control" name="password" id="password">
                                    </div>
                                </div>
                                    
                               
                            <div class="row clearfix mt-3">

                                <div class="col-lg-12 col-md-6">
                                    <button type="submit" class="btn btn-primary">Atualizar</button>
                            <div class="row clearfix">

                            
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