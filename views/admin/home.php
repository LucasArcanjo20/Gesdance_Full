<div class="page">
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <a class="navbar-brand" href="javascript:void(0);">Dashboard</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <i class="fa fa-align-justify"></i>
        </button>


    </nav>
    <div class="container-fluid">
        <div class="row clearfix">
            <div class="col-lg-4 col-md-6 col-sm-12">
                <div class="card widget_2 big_icon traffic">
                    <div class="body">
                        <h6>Número de Alunos</h6>
                        <h2>18</h2>


                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-6 col-sm-12">
                <div class="card widget_2 big_icon sales">
                    <div class="body">
                        <h6>Eventos</h6>
                        <h2>3</small></h2>


                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-6 col-sm-12">
                <div class="card widget_2 big_icon email">
                    <div class="body">
                        <h6>Professores</h6>
                        <h2>2</h2>


                    </div>
                </div>
            </div>

        </div>

        <div class="container-fluid">
            <div class="row clearfix">
                <div class="col-lg-12 col-md-12">
                    <div class="card">
                        <div class="header">
                            <h2>Anotações</h2>
                        </div>
                        <div class="body">
                            <form action="<?= BASE_URL; ?>admin/update/1" method="POST">
                                <textarea id="markdown-editor" name="notes" data-provide="markdown" rows="10" class="p-3">
                                    <?= $info['notes']; ?>
                                </textarea>

                                <button class="btn btn-primary mt-3" type="submit">Salvar</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>


        <div class="row clearfix">
            <div class="col-sm-12">
                <div class="card">
                    <div class="header">
                        <h2>Alunos com pendecia de pagamento</h2>
                    </div>
                    <div class="body">
                        <div class="table-responsive">
                            <table class="table table-hover">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Nome</th>
                                        <th>Turma</th>
                                        <th>Valor</th>
                                        <th>Ação</th>

                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>1</i>
                                        </td>
                                        <td>
                                            <span class="">Lucas</span>
                                        </td>
                                        <td>Forro</td>
                                        <td>50 Reais</td>
                                        <td>
                                            <button type="button" title="Editar" class="btn btn-primary btn-sm">
                                                <i class="fa fa-pencil-square-o" aria-hidden="true"></i>
                                            </button>
                                            <button type="button" title="Editar" class="btn btn-danger btn-sm">
                                                <i class="fa fa-trash" aria-hidden="true"></i>
                                            </button>
                                            <button type="button" title="Editar" class="btn btn-success btn-sm">
                                                <i class="fa fa-money" aria-hidden="true"></i>
                                            </button>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>2</i>
                                        </td>
                                        <td>
                                            <span class="">Marcos</span>
                                        </td>
                                        <td>Dança Urbana</td>
                                        <td>65 Reais</td>
                                        <td>
                                            <button type="button" title="Editar" class="btn btn-primary btn-sm">
                                                <i class="fa fa-pencil-square-o" aria-hidden="true"></i>
                                            </button>
                                            <button type="button" title="Editar" class="btn btn-danger btn-sm">
                                                <i class="fa fa-trash" aria-hidden="true"></i>
                                            </button>
                                            <button type="button" title="Editar" class="btn btn-success btn-sm">
                                                <i class="fa fa-money" aria-hidden="true"></i>
                                            </button>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>3</i>
                                        </td>
                                        <td>
                                            <span class="">Victor</span>
                                        </td>
                                        <td>Ritmos</td>
                                        <td>60 Reais</td>
                                        <td>
                                            <button type="button" title="Editar" class="btn btn-primary btn-sm">
                                                <i class="fa fa-pencil-square-o" aria-hidden="true"></i>
                                            </button>
                                            <button type="button" title="Editar" class="btn btn-danger btn-sm">
                                                <i class="fa fa-trash" aria-hidden="true"></i>
                                            </button>
                                            <button type="button" title="Editar" class="btn btn-success btn-sm">
                                                <i class="fa fa-money" aria-hidden="true"></i>
                                            </button>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>



    </div>


</div>