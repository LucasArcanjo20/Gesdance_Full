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
                        <form action="<?= BASE_URL; ?>student/update/<?= $info["id"]; ?>" method="post" enctype="multipart/form-data>

                        <fieldset>
                                <legend>Dados</legend>
                                <div class="row clearfix">
                                    <div class="col-lg-4 col-md-6">
                                        <div class="form-group">
                                            <label for="name">Nome: (*)</label>
                                            <input type="text" class="form-control" name="name" id="name" required="">
                                        </div>
                                    </div>

                                    <div class="col-lg-4 col-md-6 ">

                                        <label for="document">caminho: (*)</label>
                                        <input type="text" class="form-control" name="path" id="path" required="">
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

