
<body>

<header>
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <a class="navbar-brand" href="#">Cursos Tec</a>
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
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        Dropdown link
                    </a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                        <a class="dropdown-item" href="#">Action</a>
                        <a class="dropdown-item" href="#">Another action</a>
                        <a class="dropdown-item" href="#">Something else here</a>
                    </div>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Pricing</a>
                </li>
            </ul>
        </div>
    </nav>
</header>




<section class="site-section site-section-categories">
    <div class="container mt-5">
        <div class="row">
            <div class="col-md-4">
                <h2 class="mb-3">Bem Vindo! <br> Aluno Fulano</h2>
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
            <h2>Meus Cursos em Andamento</h2>
            <table class="table">
                <thead>
                <tr>
                    <th scope="col">N°</th>
                    <th scope="col">Nome Curso</th>
                    <th scope="col">Carga Horária</th>
                    <th scope="col">Acao</th>
                </tr>
                </thead>
                <tbody>
                    <tr>
                        <th scope="row">1</th>
                        <td>Mark</td>
                        <td>Otto</td>
                        <td>@mdo</td>
                    </tr>
                    <tr>
                        <th scope="row">2</th>
                        <td>Jacob</td>
                        <td>Thornton</td>
                        <td>@fat</td>
                    </tr>
                    <tr>
                        <th scope="row">3</th>
                        <td>Larry</td>
                        <td>the Bird</td>
                        <td>@twitter</td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</section>




<!-- Modal de login -->
<div class="modal fade" id="modalLogin" tabindex="-1" aria-labelledby="modalLoginLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modalLoginLabel">cursostec Login</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="formLogin" method="post" action="http://localhost/webart/login.">
                    <div class="form-group">
                        <label for="emaillogin">Email address</label>
                        <input type="email" class="form-control" id="emaillogin" aria-describedby="emailHelp">
                    </div>
                    <div class="form-group">
                        <label for="senhalogin">Password</label>
                        <input type="password" class="form-control" id="senhalogin">
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" required name="permissao" id="radioAlunologin" value="Aluno">
                        <label class="form-check-label" for="radioAlunologin">
                            Aluno
                        </label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="permissao" id="radioProfessorlogin" value="Professor">
                        <label class="form-check-label" for="radioProfessorlogin">
                            Professor
                        </label>
                    </div>
                    <div class="text-center">
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </div>

                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Voltar</button>
                <button type="button" class="btn btn-primary" data-dismiss="modal" data-toggle="modal" data-target="#modalCadastro">Cadastrar-se</button>
            </div>
        </div>
    </div>
</div>
<!-- Modal de cadastro-->
<div class="modal fade" id="modalCadastro" tabindex="-1" aria-labelledby="modalLoginLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modalCadastroLabel">cursostec Login</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="formCadastro" method="post" action="http://localhost/webart/create/user">
                    <div class="form-group">
                        <label for="nomeCadastro">Nome Completo</label>
                        <input type="text" class="form-control" required name="nome" id="nomeCadastro" aria-describedby="emailHelp">
                    </div>
                    <div class="form-group">
                        <label for="emailCadastro">Email</label>
                        <input type="email" class="form-control" required name="email" id="emailCadastro" aria-describedby="emailHelp">
                    </div>
                    <div class="form-group">
                        <label for="senhaCadastro">Password</label>
                        <input type="password" class="form-control" required name="senha" id="senhaCadastro">
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" required name="permissao" id="radioAluno" value="Aluno">
                        <label class="form-check-label" for="radioAluno">
                            Aluno
                        </label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="permissao" id="radioProfessor" value="Professor">
                        <label class="form-check-label" for="radioProfessor">
                            Professor
                        </label>
                    </div>
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
<!-- Button trigger modal -->
<button type="button" id="acionarModalButton" class="btn btn-primary d-none" data-toggle="modal" data-target="#modalCadastroRealizado">
    Launch demo modal
</button>

<!-- Modal -->
<div class="modal fade" id="modalCadastroRealizado" tabindex="-1" aria-labelledby="modalCadastroRealizadoLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modalCadastroRealizadoLabel">Sucesso!</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                Seu Cadastro com email: <span>{{emailUser}}</span> foi realizado com Sucesso!!!
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-success" data-dismiss="modal">Logar</button>
            </div>
        </div>
    </div>
</div>
<input type="hidden" value="{{cadastroRealizado}}" id="cadastroRealizado">


<script src="/../webart/src/App/view/js/verificacao-inicial.js"></script>
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-Piv4xVNRyMGpqkS2by6br4gNJ7DXjqk09RmUpJ8jgGtD7zP9yug3goQfGII0yAns" crossorigin="anonymous"></script>
<script src="/../webart/src/App/view/js/jquery-3.3.1.min.js"></script>
<script src="/../webart/src/App/view/js/bootstrap.min.js"></script>
<script src="/../webart/src/App/view/js/jquery.waypoints.min.js"></script>
<script src="/../webart/src/App/view/js/jquery.paroller.js"></script>
<script src="/../webart/src/App/view/js/main.js"></script>
</body>
</html>
