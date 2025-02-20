<div class="page">
    <div class="container-fluid">
        <div class="row clearfix">
            <div class="col-md-12">
                <div class="card">
                    <div class="header">
                        <h2>Lista de Turmas </h2>
                        <a href="<?= BASE_URL; ?>Team/create" class="btn btn-primary btn-lg">Cadastrar
                            Turmas</a>
                    </div>
                    <div class="body">
                        <div class="table-responsive">
                            <table class="table va_center mb-0">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Atividade Práticada</th>
                                        <th>Professor</th>
                                        <th>Ações</th>
                                    </tr>
                                </thead>
                                <tbody>



                                    <?php foreach ($list as $key => $value) : ?>
                                    <tr>
                                        <td><?= $value['id']; ?></td>
                                        <td><?= $value['name'];?></td>
                                        <td><?= $value['name_teacher'];?></td>

                                        <td>


                                        

                                            <a href="<?= BASE_URL; ?>presence/create/<?= $value['id']; ?>"><button
                                                    type="button" class="btn btn-secondary btn-sm"
                                                    title="Fazer a chamada"><i class="fa fa-address-card"
                                                        aria-hidden="true"></i></button></a>

                                                        



                                            <a href="<?= BASE_URL; ?>Team/destroy/<?= $value['id']; ?>"
                                                onclick="return confirm('Deseja realmente excluir essa Turma?');"><button
                                                    type="button" class="btn btn-danger btn-sm" title="Deletar"><i
                                                        class="ti-trash"></i></button></a>
                                        </td>

                                    </tr>
                                    <?php endforeach; ?>



                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row ">
            <div class="col-md-12 ">
                <nav aria-label="Page navigation example">
                    <ul class="pagination justify-content-center">
                    </ul>
                </nav>
            </div>
        </div>
    </div>
</div>
</div>