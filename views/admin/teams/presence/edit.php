<div class="page">
    <div class="container-fluid">
        <!-- Advanced Select2 -->
        <div class="row clearfix">

            <div class="col-lg-12 col-md-12 col-sm-12">
                <div class="card">
                    <div class="header">
                        <h2>Lista de Alunos - Turma: <span style="font-weight:1000;text-decoration:underline;"><?= $info['name']; ?> </span></h2>
                        <a href="<?= BASE_URL; ?>Presence?team_id=<?= $info['team_id']; ?>" class="btn btn-primary">Visualizar todas chamadas</a>
                    </div>
                    <div class="body">
                        <form action="<?= BASE_URL; ?>Presence/update" method="post">
                            <fieldset>
                                <legend>Informações Gerais</legend>
                                <div class="row clearfix">
                                    <div class="col-lg-6 col-md-6">
                                        <div class="form-group">
                                            <label for="date">Data: (*)</label>
                                            <input type="date" class="form-control" name="date" id="date" required="" value="<?= $info['date']; ?>">
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-md-6">
                                        <div class="form-group">
                                            <label for="time">Hora: (*)</label>
                                            <input type="time" class="form-control" name="time" id="time" required="" value="<?= $info['time']; ?>">
                                        </div>
                                    </div>
                                    <input type="hidden" name="team_id" value="<?= $info['team_id']; ?>">
                                    <input type="hidden" name="call_id" value="<?= $info['id']; ?>">
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
                                            <?php foreach ($list_team_student as $student) : ?>
                                                <tr>
                                                    <td><?= $student['id']; ?></td>
                                                    <td style="width: 50px;">
                                                        <div class="custom-control custom-checkbox">
                                                            <input type="hidden" name="student_id[]" value="<?= $student['id']; ?>">
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <span><?= $student['name']; ?></span>
                                                    </td>
                                                    <td>
                                                        <span class="document"><i class="zmdi zmdi-document m-r-10"></i><?= $student['document']; ?></span>
                                                    </td>
                                                    <td>
                                                        <div class="custom-control custom-checkbox">
                                                            <input type="checkbox" class="custom-control-input" name="presence_<?= $student['id']; ?>" id="presence_<?= $student['id']; ?>" value="1" <?= ($student['call_info']['presence'] == 1) ? 'checked' : ''; ?>>
                                                            <label class="custom-control-label" for="presence_<?= $student['id']; ?>">&nbsp;</label>
                                                        </div>
                                                    </td>
                                                    <td>
                                                    <textarea class="form-control" placeholder="" name="observation_<?= $student['id']; ?>"><?= $student['call_info']['observation']; ?></textarea>
                                                    </td>
                                                </tr>
                                            <?php endforeach; ?>

                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            <div class="row clearfix">
                                <div class="col-lg-12 col-md-6">
                                    <button type="submit" class="btn btn-primary">Atualizar Presença</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>