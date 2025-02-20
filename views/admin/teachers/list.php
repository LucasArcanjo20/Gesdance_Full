<div class="page">
    <div class="container-fluid">
        <div class="row clearfix">
            <div class="col-md-12">
                <div class="card">
                    <div class="header">
                        <h2>Lista de Professores </h2>
                        <a href="<?= BASE_URL; ?>Teacher/create" class="btn btn-primary btn-lg">Cadastrar
                            Professores</a>
                    </div>
                    <div class="body">
                        <div class="table-responsive">
                            <table class="table va_center mb-0">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Nome</th>
                                        <th>Contato</th>
                                        <th>Ações</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach ($list as $key => $value) : ?>
                                    <tr>
                                        <td><?= $value['id']; ?></td>
                                        <td><?= $value['name'];?></td>
                                        <td><a href="https://wa.me/55+1 (904) 487-8765?text=Ol%C3%A1+Dieter Jacobs 23+...."
                                                target="_blank" ><?= $value['phone'];?></a></td>

                                        <td>
                                            <a href="<?= BASE_URL; ?><?= $value['voice_video_authorization']; ?>" target="_blank" download class="btn btn-success btn-sm">Voz e Vídeo</a>
                                                <a href="http://localhost/gesdance/Teacher/editAccount/<?= $value['account_id']; ?>"
                                                class="btn btn-success btn-sm">Login</a>
                                            <a href="<?= BASE_URL; ?>Teacher/edit/<?= $value['id']; ?>"><button type="button"
                                                    class="btn btn-warning btn-sm" title="Editar"><i
                                                        class="ti-pencil"></i></button></a>
                                            <a href="<?= BASE_URL; ?>Teacher/destroy/<?= $value['id']; ?>"
                                                onclick="return confirm('Deseja realmente excluir esse Professor?');"><button
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