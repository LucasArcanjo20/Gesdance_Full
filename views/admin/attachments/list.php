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
                        <h2>Lista de Anexos</h2>
                        <a href="<?= BASE_URL; ?>Attachment/create" class="btn btn-primary btn-lg">Cadastrar Anexos</a>
                    </div>
                    <div class="body">
                        <div class="table-responsive">
                            <table class="table va_center mb-0">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Name</th>
                                        <th>Ações</th>
                                
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php if (count($list) != 0) : ?>
                                        <?php foreach ($list as $key => $items) : ?>
                                            <tr>
                                                <td><?= $items['id']; ?></td>
                                                <td><?= $items['name']; ?></td>
                                                
                                              
                                                <td>
                                                <a href="<?= BASE_URL; ?><?= $items['path']; ?>" download><button type="button" class="btn btn-success btn-sm" title="Baixar"><i class="fa fa-download"></i></button></a>
                        
                                                <a href="<?= BASE_URL; ?>Attachment/destroy/<?= $items['id']; ?>" onclick="return confirm('Deseja realmente excluir esse Anexo?');"><button type="button" class="btn btn-danger btn-sm" title="Deletar"><i class="ti-trash"></i></button></a>
                            
                                                </td>
                                            </tr>
                                        <?php endforeach; ?>
                                    <?php else : ?>
                                        <tr>
                                            <td colspan="5" class="text-center">Ainda não há Anexos cadastrados.</td>
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
                                <a class="page-link" href="<?= BASE_URL; ?>admin/clients?p=<?= $currentPage - 1; ?>" aria-label="Previous">
                                    <span aria-hidden="true">Anterior</span>
                                </a>
                            </li>
                        <?php endif; ?>
                        <?php if ($numberOfPages > 1) : ?>
                            <?php for ($q = 1; $q <= $numberOfPages; $q++) : ?>
                                <?php if ($currentPage == $q) : ?>
                                    <li class="page-item active"><a class="page-link" href="#"><?= $q; ?></a></li>
                                <?php else : ?>
                                    <li class="page-item "><a class="page-link" href="<?= BASE_URL; ?>admin/clients?p=<?= $q; ?>"><?= $q; ?></a></li>
                                <?php endif; ?>
                            <?php endfor; ?>

                            <?php if ($currentPage != $numberOfPages) : ?>
                                <li class="page-item">
                                    <a class="page-link" href="<?= BASE_URL; ?>admin/clients?p=<?= $currentPage + 1; ?>" aria-label="Next">
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




<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Adiconar aluno na turma</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="<?= BASE_URL; ?>TeamStudent/store" method="POST">
                <input type="hidden" name="student_id" id="student_id" value="">
                    <div class="form-group">
                        <label for="team_id">Escolha a Turma</label>
                        <select class="form-control" name="team_id" id="team_id">
                                <option value="1">Street </option>
                        </select>
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

<script src="<?= BASE_URL; ?>assets/admin/js/pages/TeamStudent/list.js"></script>