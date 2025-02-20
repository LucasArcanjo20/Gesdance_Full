<div class="page">
    <div class="container-fluid">
        <!-- Advanced Select2 -->
        <div class="row clearfix">
    
            <div class="col-lg-12 col-md-12 col-sm-12">
                <div class="card">
                    <div class="header">
                        <h2>Lista de Alunos - Turma: <span style="font-weight:1000;text-decoration:underline;"><?= $info['name']; ?> </span></h2>
                        <a href="<?= BASE_URL; ?>Presence?team_id=<?= $id; ?>" class="btn btn-primary">Visualizar todas chamadas</a>
                    </div>
                    <div class="body">
                        <form action="<?= BASE_URL; ?>Presence/store" method="post">
                            <fieldset>
                                <legend>Informações Gerais</legend>
                                <div class="row clearfix">
                                    <div class="col-lg-6 col-md-6">
                                        <div class="form-group">
                                            <label for="date">Data: (*)</label>
                                            <input type="date" class="form-control" name="date" id="date" required="">
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-md-6">
                                        <div class="form-group">
                                            <label for="time">Hora: (*)</label>
                                            <input type="time" class="form-control" name="time" id="time" required="">
                                        </div>
                                    </div>
                                    <input type="hidden" name="team_id" value="<?= $id; ?>">
                                </div>
                            </fieldset>
                            <div class="row">
                                <div class="table-responsive">
                                    <table class="table table-hover mb-0 c_list">
                                        <thead>
                                            <tr>
                                                <th>#</th>
                                                <th></th>
                                                <th>Nome</th>                                    
                                                <th>Documento</th>                                    
                                                <th>Presença</th>
                                                <th>Observação</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php foreach ($list as $key => $value) : ?>
                                            <tr>
                                                <td><?= $value['id']; ?></td>
                                                <td style="width: 50px;">
                                                    <div class="custom-control custom-checkbox">
                                                        <input type="hidden" name="student_id[]" value="<?= $value['id']; ?>">
                                                        
                                                    </div>
                                                </td>
                                                <td>
                                                    <span><?= $value['name']; ?></span>
                                                </td>
                                                <td>
                                                    <span class="document"><i class="zmdi zmdi-document m-r-10"></i><?= $value['document']; ?></span>
                                                </td>
                                                <td>
                                                    <div class="custom-control custom-checkbox">
                                                        <input type="checkbox" class="custom-control-input" name="presence_<?= $value['id']; ?>" id="presence_<?= $value['id']; ?>" value="1" checked>
                                                        <label class="custom-control-label" for="presence_<?= $value['id']; ?>">&nbsp;</label>
                                                    </div>
                                                </td>
                                                <td>
                                                    <textarea class="form-control" placeholder="" name="observation_<?= $value['id']; ?>"></textarea>
                                                </td>
                                            </tr>
                                            <?php endforeach; ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            <div class="row clearfix">
                                <div class="col-lg-12 col-md-6">
                                    <button type="submit" class="btn btn-primary">Confirmar Presença</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


<script>
    // Função para obter a data atual formatada como YYYY-MM-DD
    function getCurrentDate() {
        const today = new Date();
        const year = today.getFullYear();
        const month = String(today.getMonth() + 1).padStart(2, '0');
        const day = String(today.getDate()).padStart(2, '0');
        return `${year}-${month}-${day}`;
    }

    // Função para obter a hora atual formatada como HH:MM
    function getCurrentTime() {
        const now = new Date();
        const hours = String(now.getHours()).padStart(2, '0');
        const minutes = String(now.getMinutes()).padStart(2, '0');
        return `${hours}:${minutes}`;
    }

    // Definir a data atual como o valor do input
    document.getElementById('date').value = getCurrentDate();

    // Definir a hora atual como o valor do input
    document.getElementById('time').value = getCurrentTime();
</script>
