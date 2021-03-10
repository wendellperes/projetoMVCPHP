<?php

    use App\Model\ReadDatabaseCursosModel;
    use App\Controller\CreateCursoController;
    $result = '';
    $cursos = ReadDatabaseCursosModel::getDadosBanco('id_professor = "'.$_SESSION["id"].'"');
    foreach ($cursos as $curso){
        //var_dump($curso->categoria);
        $result .='<tr>
                    <td>'.$curso->id_curso.'</td>
                    <td><img src='.$curso->img_curso.'></td>
                    <td>'.$curso->nome_curso.'</td>
                    <td>'.$curso->carga_horaria.'</td>
                    <td><button type="button" class="btn btn-primary btn-sm">Alualizar</button></td>
                    </tr>';

    }
    //recebe a variavel para exibir a mensagem de cadastro realizado ou nao
    $cadastroRealizado = '';
    $cadastroRealizado .= CreateCursoController::getResposta();

?>
<body>

<header>
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <a class="navbar-brand" href="http://localhost/webart/user/logado">Cursos Tec</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse ml-auto" id="navbarNav">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item active">
                    <a class="nav-link" href="#">Home <span class="sr-only">(current)</span></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Features</a>
                </li>

                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" id="menu_categoria" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" href="#">Minha Conta</a>
                    <div class="dropdown-menu" aria-labelledby="menu_categoria">
                        <a class="dropdown-item" href="#">Perfil</a>
                    </div>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Sair</a>
                </li>
            </ul>
        </div>
    </nav>
</header>




<section class="site-section site-section-categories">
    <div class="container mt-5">
        <div class="row">
            <div class="col-md-4">
                <h2 class="mb-3">Bem Vindo! <br> <?php  echo $_SESSION['nomeUser']?></h2>
                <p>Olá! seja muito bem vindo estamos felizes em te ver novamente e continue
                    seus cursos na tabela abaixo</p>
            </div>
            <div class="col-md-8">
                <div class="row">
                    <div class="col-md-4">
                        <a href="#" class="img-bg">
                            <div class="text">
                                <h3>front-end</h3>
                                <div class="img-wrap">
                                    <img src="/../webart/src/App/view/images/img_1.jpg" class="img-fluid" alt="">
                                    <p>Explorar Novos</p>
                                </div>
                            </div>
                        </a>
                    </div>

                    <div class="col-md-4">
                        <a href="#" class="img-bg">
                            <div class="text ">
                                <h3>back-end</h3>
                                <div class="img-wrap">
                                    <img src="/../webart/src/App/view/images/img_2.jpg" class="img-fluid" alt="">
                                    <p>Explorar Novos</p>
                                </div>
                            </div>
                        </a>
                    </div>

                    <div class="col-md-4">
                        <a href="#" class="img-bg">
                            <div class="text">
                                <h3>fullstack</h3>
                                <div class="img-wrap">
                                    <img src="/../webart/src/App/view/images/img_3.jpg" class="img-fluid" alt="">
                                    <p>Explorar Novos</p>
                                </div>
                            </div>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="site-section site-section-differential">
    <div class="container">
        <div class="mb-5 text-center">
            <h2>Meus Cursos</h2>
            <table class="table">
                <thead>
                <tr>
                    <th scope="col">N°</th>
                    <th scope="col">imagem</th>
                    <th scope="col">Nome Curso</th>
                    <th scope="col">Carga Horária</th>
                    <th scope="col">Acao</th>
                </tr>
                </thead>
                <tbody>
                <?php echo $result?>
                </tbody>
            </table>
            <div class="container text-center">
                <button type="button" class="btn btn-success btn-sm" data-toggle="modal" data-target="#modalCadastroCurso">Cadastrar novo curso +</button>

            </div>
        </div>
    </div>
</section>


<!-- Modal de cadastro-->
<div class="modal fade" id="modalCadastroCurso" tabindex="-1" aria-labelledby="modalLoginLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modalCadastroLabel">cursostec - Cadastro Cursos</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="formCadastroCursos" method="post" action="http://localhost/webart/create/curso">
                    <div class="form-group">
                        <label for="nomecurso">Nome do Curso</label>
                        <input type="text" class="form-control" value="" required name="nome" id="nomecurso" aria-describedby="emailHelp">
                    </div>
                    <div class="form-group">
                        <label for="img_curso">Selecione uma imagem para seu curso</label>
                        <input type="file" name="imageCurso" value="" class="form-control-file" id="img_curso">
                    </div>
                    <div class="form-group">
                        <label for="cargahoraria">Carga Horaria</label>
                        <input type="text" class="form-control" value="" required name="cargaHoraria" id="cargahoraria" aria-describedby="emailHelp">
                    </div>

                    <div class="form-group">
                        <label for="categoriasCursos">Categorias</label>
                        <select class="form-control" name="categoria" id="categoriasCursos">
                            <option value="">Selecione uma categoria</option>
                            <option value="frontend">Front end</option>
                            <option value="backend">Back end</option>
                            <option value="fullstack">Fullstack</option>
                        </select>
                    </div>
                    <input type="hidden" name="id_professor" value="<?php echo $_SESSION['id']?>">
                    <div class="text-center">
                        <button type="submit" class="btn btn-primary">Cadastrar</button>
                    </div>

                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Voltar</button>
            </div>
        </div>
    </div>
</div>
<button type="button" id="acionarModalCadastroCurso" class="btn btn-primary d-none" data-toggle="modal" data-target="#cadastroRealizadoCurso">
    Launch demo modal
</button>

<!-- Modal em Respostas de cadastro realizado ou usuario ja cadastrado-->
<div class="modal fade" id="cadastroRealizadoCurso" tabindex="-1" aria-labelledby="modalMenssageTitle" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modalMenssageTitle"></h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body" id="bodyModal">

            </div>
        </div>
    </div>
</div>
<input type="hidden" value="<?php echo $cadastroRealizado ?>" id="cadastro">


<script src="/../webart/src/App/view/js/verificacao-home-professor.js"></script>
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-Piv4xVNRyMGpqkS2by6br4gNJ7DXjqk09RmUpJ8jgGtD7zP9yug3goQfGII0yAns" crossorigin="anonymous"></script>
<script src="/../webart/src/App/view/js/jquery-3.3.1.min.js"></script>
<script src="/../webart/src/App/view/js/bootstrap.min.js"></script>
<script src="/../webart/src/App/view/js/jquery.waypoints.min.js"></script>
<script src="/../webart/src/App/view/js/jquery.paroller.js"></script>
<script src="/../webart/src/App/view/js/main.js"></script>
</body>
</html>
