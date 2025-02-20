<div class="page">
    <div class="container-fluid">
        <div class="row clearfix">
            <div class="col-md-12">
                <div class="card">
                    <div class="header">
                        <h2>Lista de Presença - Turma: <?= $list[0]['name']; ?> </h2>
                    </div>
                    <div class="body">
                        <div class="table-responsive">
                            <table class="table va_center mb-0">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Turma</th>
                                        <th>Data</th>
                                        <th>Tempo</th>
                                        <th>Ação</th>
                                    </tr>
                                </thead>
                                <tbody>



                                    <?php foreach ($list as $key => $value) : ?>
                                    <tr>
                                        <td><?= $value['id']; ?></td>
                                        <td><?= $value['name'];?></td>
                                        <td><?= $value['date'];?></td>
                                        <td><?= $value['time'];?></td>
                                        

                                        <td>                                       

                                           

                                            <a href="<?= BASE_URL; ?>Presence/edit/<?= $value['id']; ?>"><button
                                                    type="button" class="btn btn-success btn-sm"
                                                    title="Editar Chamada"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></button></a>



                                            <a href="<?= BASE_URL; ?>Presence/destroy/<?= $value['id']; ?>"
                                                onclick="return confirm('Deseja realmente excluir essa Chamada?');"><button
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