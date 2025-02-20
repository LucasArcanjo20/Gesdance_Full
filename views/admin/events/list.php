<div class="page">
    <div class="container-fluid">
        <?php if (isset($_SESSION["success"])) : ?>
        <div class="alert alert-success" role="alert">
            <?= $_SESSION["success"]; ?>
        </div>
        <?php unset($_SESSION['success']); ?>
        <?php endif; ?>
        <div class="row clearfix">
            <div class="col-md-12">
                <div class="card">
                    <div class="header">
                        <h2>Lista de Eventos</h2>
                        <a href="<?= BASE_URL; ?>Event/create" class="btn btn-primary btn-lg">Cadastro de Eventos</a>
                    </div>
                    <div class="body">
                        <div class="table-responsive">
                            <table class="table va_center mb-0">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Nome</th>
                                        <th>Data</th>
                                        <th>Local</th>
                                        <th>Ações</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php if (count($list) != 0) : ?>
                                    <?php foreach ($list as $key => $items) : ?>
                                    <tr>
                                        <td><?= $items['id']; ?></td>
                                        <td><?= $items['name']; ?></td>
                                        <td><?= $items['date']; ?></td>

                                        <td>
                                            <?= $items['local']; ?>
                                        </td>
                                        <td>
                                           
                                        <a href="<?= BASE_URL; ?>Event/createpeople/<?= $items['id']; ?>"><button
                                                    type="button" class="btn btn-primary btn-sm" title="Chamadas"><i
                                                        class="fa fa-users"></i></button></a>
                                            <a href="<?= BASE_URL; ?>Event/edit/<?= $items['id']; ?>"><button
                                                    type="button" class="btn btn-warning btn-sm" title="Editar"><i
                                                        class="ti-pencil"></i></button></a>
                                            <a href="<?= BASE_URL; ?>Event/destroy/<?= $items['id']; ?>"
                                                onclick="return confirm('Deseja realmente excluir esse evento?');"><button
                                                    type="button" class="btn btn-danger btn-sm" title="Deletar"><i
                                                        class="ti-trash"></i></button></a>

                                        </td>
                                    </tr>
                                    <?php endforeach; ?>
                                    <?php else : ?>
                                    <tr>
                                        <td colspan="5" class="text-center">Não existe eventos cadastrados.</td>
                                    </tr>
                                    <?php endif; ?>
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
                        <?php if ($currentPage >= 2) : ?>
                        <li class="page-item">
                            <a class="page-link" href="<?= BASE_URL; ?>admin/clients?p=<?= $currentPage - 1; ?>"
                                aria-label="Previous">
                                <span aria-hidden="true">Anterior</span>
                            </a>
                        </li>
                        <?php endif; ?>
                        <?php if ($numberOfPages > 1) : ?>
                        <?php for ($q = 1; $q <= $numberOfPages; $q++) : ?>
                        <?php if ($currentPage == $q) : ?>
                        <li class="page-item active"><a class="page-link" href="#"><?= $q; ?></a></li>
                        <?php else : ?>
                        <li class="page-item "><a class="page-link"
                                href="<?= BASE_URL; ?>admin/clients?p=<?= $q; ?>"><?= $q; ?></a></li>
                        <?php endif; ?>
                        <?php endfor; ?>

                        <?php if ($currentPage != $numberOfPages) : ?>
                        <li class="page-item">
                            <a class="page-link" href="<?= BASE_URL; ?>admin/clients?p=<?= $currentPage + 1; ?>"
                                aria-label="Next">
                                <span aria-hidden="true">Próximo</span>
                            </a>
                        </li>
                        <?php endif; ?>
                        <?php endif; ?>
                    </ul>
                </nav>
            </div>
        </div>
    </div>
</div>
