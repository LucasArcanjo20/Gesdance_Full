<div class="page">
    <div class="container-fluid">
        <!-- Advanced Select2 -->
        <div class="row clearfix">
            <div class="col-lg-12 col-md-12 col-sm-12">
                <div class="card">
                    <div class="header">
                        <h2>Informações Gerais - Turma: <span
                                style="font-weight:1000;text-decoration:underline;">SABRINA</span></h2>
                        <a data-toggle="modal" data-target="#teacherModal" class="btn btn-primary">Adicionar Professor
                            no evento</a>
                        <a data-toggle="modal" data-target="#studentModal" class="btn btn-success">Adicionar Aluno no
                            evento</a>
                    </div>
                    <div class="body">
                        <form action="<?= BASE_URL; ?>Event/peoplestore" method="post">
                            <fieldset>
                                <legend>Professor(s)</legend>
                                <div class="row clearfix">
                                    <!-- Conteúdo do row clearfix se necessário -->
                                </div>
                                <input type="hidden" name="team_id" value="<?= $id; ?>">
                            </fieldset>
                            <div class="row">
                                <div class="table-responsive">
                                    <table class="table table-hover mb-0 c_list">
                                        <thead>
                                            <tr>
                                                <th>#</th>
                                                <th>Nome</th>
                                                <th>Documento</th>
                                                <th>Observação</th>
                                                <th>Ação</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php foreach ($list_event_teacher as $key => $item) : ?>
                                            <tr>
                                                <td><?= $item['id']; ?> </td>
                                                <td><?= $item['name']; ?> </td>
                                                <td><?= $item['document']; ?> </td>
                                                <td><?= $item['observation']; ?> </td>

                                                <td> <a href="<?= BASE_URL; ?>Event/destroyTeacher/<?= $item['id']; ?>/<?= $event_id; ?>"
                                                        onclick="return confirm('Deseja realmente excluir essa ação?');"><button
                                                            type="button" class="btn btn-danger btn-sm"
                                                            title="Deletar"><i class="ti-trash"></i></button></a>

                                                </td>

                                            </tr>
                                            <?php endforeach; ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </form>
                    </div>
                    <div class="body">
                        <form action="<?= BASE_URL; ?>Event/peoplestore" method="post">
                            <fieldset>
                                <legend>Aluno(s)</legend>
                                <div class="row clearfix">
                                    <!-- Conteúdo do row clearfix se necessário -->
                                </div>
                                <input type="hidden" name="team_id" value="<?= $id; ?>">
                            </fieldset>
                            <div class="row">
                                <div class="table-responsive">
                                    <table class="table table-hover mb-0 c_list">
                                        <thead>
                                            <tr>
                                                <th>#</th>
                                                <th>Nome</th>
                                                <th>Documento</th>
                                                <th>Observação</th>
                                                <th>Ação</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php foreach ($list_event_student as $key => $item) : ?>
                                            <tr>
                                                <td><?= $item['id']; ?> </td>
                                                <td><?= $item['name']; ?> </td>
                                                <td><?= $item['document']; ?> </td>
                                                <td><?= $item['observation']; ?> </td>

                                                <td>
                                                    <!-- Verificação de Anexo -->
                                                    <?php if (!empty($item['attachments_authorization']) && file_exists($item['attachments_authorization'])) : ?>
                                                    <a href="<?= BASE_URL; ?><?= $item['attachments_authorization']; ?>" target="_blank" download>
                                                        <button type="button" class="btn btn-warning btn-sm"
                                                            title="Anexo">
                                                            <i class="fa fa-paperclip" aria-hidden="true"></i>
                                                        </button>
                                                    </a>
                                                    <?php else : ?>
                                                    <button type="button" class="btn btn-warning btn-sm btnattachmentModal" title="Anexo"
                                                        data-toggle="modal" data-target="#attachmentModal" data-id="<?= $item['id']; ?>">
                                                        <i class="fa fa-paperclip" aria-hidden="true"></i>
                                                    </button>
                                                    <?php endif; ?>



                                                    <a href="<?= BASE_URL; ?>Event/destroyStudent/<?= $item['id']; ?>/<?= $event_id; ?>"
                                                        onclick="return confirm('Deseja realmente excluir essa ação?');"><button
                                                            type="button" class="btn btn-danger btn-sm"
                                                            title="Deletar"><i class="ti-trash"></i></button></a>
                                                </td>

                                            </tr>
                                            <?php endforeach; ?>
                                        </tbody>
                                    </table>
                                </div>

                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Modal -->
<div class="modal fade" id="studentModal" tabindex="-1" aria-labelledby="studentModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="studentModalLabel">Adicionar Aluno no evento</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="<?= BASE_URL; ?>Event/storeStudent" method="POST">
                    <input type="hidden" name="event_id" value="<?= $event_id; ?>">
                    <div class="form-group">
                        <label for="student_id">Escolha o Aluno</label>
                        <select class="form-control" name="student_id" id="student_id">
                            <?php foreach ($list_student as $key => $item) : ?>
                                <option value="<?= $item['id']; ?>"><?= $item['name']; ?> </option>
                            <?php endforeach; ?>
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="observation">Observação</label>
                        <textarea class="form-control" name="observation" id="observation" rows="4"></textarea>
                    </div>

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>
                <button type="submit" class="btn btn-primary">Salvar</button>
                </form>
            </div>
        </div>
    </div>
</div>



<!-- Modal -->
<div class="modal fade" id="teacherModal" tabindex="-1" aria-labelledby="tearherModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="teacherModalLabel">Adicionar Professor no Evento</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="<?= BASE_URL; ?>Event/storeTeacher" method="POST" enctype="multipart/form-data">
                    <input type="hidden" name="event_id" value="<?= $event_id; ?>">
                    <div class="form-group">
                        <label for="teacher_id">Escolha o Professor</label>
                        <select class="form-control" name="teacher_id" id="teacher_id">
                            <?php foreach ($list_teacher as $key => $item) : ?>
                                <option value="<?= $item['id']; ?>"><?= $item['name']; ?> </option>
                            <?php endforeach; ?>
                        </select>

                    </div>

                    <div class="form-group">
                        <label for="observation">Observação</label>
                        <textarea class="form-control" name="observation" id="observation" rows="4"></textarea>
                    </div>



            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>
                <button type="submit" class="btn btn-primary">Salvar</button>
                </form>
            </div>
        </div>
    </div>
</div>

<!-- Modal -->
<div class="modal fade" id="attachmentModal" tabindex="-1" aria-labelledby="attachmentModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="teacherModalLabel">Adicionar Anexo no Evento</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="<?= BASE_URL; ?>Event/uploadAttachmentsAuthorization" method="POST" enctype="multipart/form-data">
                    <input type="hidden" name="event_id" value="<?= $event_id; ?>">
                    <input type="hidden" name="event_students_id" id="event_students_id" value="">
                    <div class="form-group">
                        <label for="file">Anexar Arquivo</label>
                        <input type="file" class="form-control-file" id="attachments_authorization" name="attachments_authorization">
                    </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>
                <button type="submit" class="btn btn-primary">Salvar</button>
                </form>
            </div>
        </div>
    </div>
</div>

<script>
        document.addEventListener('DOMContentLoaded', function () {
            var buttons = document.querySelectorAll('.btnattachmentModal');
            buttons.forEach(function (button) {
                button.addEventListener('click', function () {
                    var dataId = button.getAttribute('data-id');
                    var input = document.getElementById('event_students_id');
                    input.value = dataId;
                    // Aqui você pode adicionar outras ações que deseja realizar com o data-id
                });
            });
        });
</script>