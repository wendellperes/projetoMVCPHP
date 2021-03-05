<?php
namespace App\Controller;


use App\Classes\Usuario;
use App\Model\CreateUsuarioModel;
use App\Model\VerificacaoUsuario;
use App\Classes\BancoConexao;
class CreateUserController{
    /**
     * reposta que ira prosseguir com o cadastro
     * @var string
     */
    private $resposta = false;

    /**
     * Estas duas variaveis serao enviadas para o modal para checkar duplicidade
     * @var string
     */
    private $nomeVerificacao;
    private $emailVerificacao;

    public function createUser(){
        /*
         * Instanciando um novo Objeto da Classe Usuario na Variavel $chamarDadosUser
         * Passando os Dados do Formulario via Post para o Construct
         */
        $chamarDadosUser = new Usuario($_POST['nome'], $_POST['email'], $_POST['senha'], $_POST['permissao']);

        /*
         * Seta nas Variaveis de verificação do nome e email
         */
        $this->nomeVerificacao = $chamarDadosUser->getDados()['nome'];
        $this->emailVerificacao = $chamarDadosUser->getDados()['email'];

        /*
         * Chama a Funcao de verificação de usuario
         */
        //$this->verificationUser();

        /**
         * verifica se a variavel de resposta e false para prosseguir com o cadastro
         */
        if ($this->resposta == false){
            if ($_POST['permissao']='Aluno'){
                $chamarCreateUserModel = new CreateUsuarioModel($_POST['nome'], $_POST['email'], $_POST['senha'], $_POST['permissao']);
                $chamarCreateUserModel->enviarDados();

            }else{

            }

        }else{
            //redireciona para home da pagina com uma mensagem de error
        }



    }
    public function verificationUser(){
        //chamar o modal de verificação
//        $chamarVerify = new VerificacaoUsuario($this->nomeVerificacao, $this->emailVerificacao);
//        $resposta = $chamarVerify->checkDados();

        //receber o valor booleano
        $this->resposta = false;
        return $this->resposta;
    }
}
