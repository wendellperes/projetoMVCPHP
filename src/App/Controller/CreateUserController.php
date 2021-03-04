<?php
namespace App\Controller;


use App\Classes\Usuario;

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
         * Chama a Funcao de verioficação de usuario
         */
        $this->verificationUser();
        //$this->emailVerificacao = $chamarDadosUser->getDadosUser()['nome'];



    }
    public function verificationUser(){
        //chamar o modal de verificação

        echo 'verificar';
        //receber o valor booleano
        //$this->resposta = false;
    }
}
