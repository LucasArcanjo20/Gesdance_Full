<div class="page">
    <div class="container-fluid">

        <!-- Advanced Select2 -->
        <div class="row clearfix">
            <div class="col-lg-12 col-md-12 col-sm-12">
                <div class="card">
                    <div class="header">
                        <h2>Cadastro de Turmas</h2>
                    </div>
                    <div class="body">
                        <form action="<?= BASE_URL; ?>Team/store" method="post">

                            <fieldset>
                                <legend>Informações Gerais</legend>
                                <div class="row clearfix">
                                    <div class="col-lg-6 col-md-6">
                                        <div class="form-group">
                                            <label for="name">Nome: (*)</label>
                                            <input type="text" class="form-control" name="name" id="name" required="">
                                        </div>
                                    </div>

                                    <div class="col-lg-3 col-md-6">
                                            <label for="teacher_id">Professor:</label>
                                            <select class="form-control " data-placeholder="teacher_id" name="teacher_id" id="state" onchange="muda_estado();">
                                            <?php foreach($list as $key => $item): ?>
                                                <option value="<?= $item['id']; ?>"><?= $item['name']; ?></option>
                                            <?php endforeach; ?>
                                            </select>
                                    </div>

                                    

                                    
                                </div>
                                <div class="row clearfix">
                                    <div class="col-lg-6 col-md-6">
                                        <div class="form-group">
                                            <label for="days">Dias: (*)</label>
                                            <input type="text" class="form-control" name="days" id="days" required="">
                                        </div>
                                    </div>

    
                                   
                                    <div class="col-lg-6 col-md-6">
                                        <div class="form-group">
                                            <label for="schedules">horários: (*)</label>
                                            <input type="text" class="form-control" name="schedules" id="schedules" required="">
                                        </div>
                                    </div>

                                    

                                    
                                </div>
                            </fieldset>
                          
                            
                            <div class="row clearfix">

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