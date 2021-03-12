$(document).ready(function () {

    //check os dados para exibicao de mensagem login/cadastroUsuario
    let cadastro = $("#cadastroRealizado").val();
    let cadastroDuplicado = $("#usuarioCadastrado").val();
    let emailUser = $("#emailUser").val();

    if (cadastro === 'true'){
        // define os textos a serem exibidos no Modal
        let textTitle = "Sucesso!!!"
        let textBody  = "Seu Cadastro com email: "+emailUser+" foi realizado com Sucesso!!!"

        //insere no html via id os textos
        $("#modalMenssageTitle").append(textTitle);
        $("#bodyModal").append(textBody);

        //chama a funcao que vai exibir o modal
        exibirModalCadastro();
    }else if (cadastro === 'duplicado'){
        // define os textos a serem exibidos no Modal
        let textTitle = "Atenção!!!"
        let textBody  = "Já existe uma conta registrada com esse email: "+emailUser+"! "

        //insere no html via id os textos
        $("#modalMenssageTitle").append(textTitle);
        $("#bodyModal").append(textBody);

        //chama a funcao que vai exibir o modal
        exibirModalCadastro();
    }else if ( cadastro === 'naoencontrado'){
        // define os textos a serem exibidos no Modal
        let textTitle = "Atenção!!!"
        let textBody  = "Verifique seu email e senha ou Cadastre-se! "

        //insere no html via id os textos
        $("#modalMenssageTitle").append(textTitle);
        $("#bodyModal").append(textBody);

        //chama a funcao que vai exibir o modal
        exibirModalCadastro();
    }


});
function exibirModalCadastro(){
    $('#acionarModalButton').click();
}
function exibirDados(id, nome, carga, categoria, img){
    console.log(id);
    console.log(nome);
    console.log(carga);
    $('input[name="nome"]').val(nome);
    $('input[name="cargaHoraria"]').val(carga);
    $('select[name=categoria]').val(categoria);
    $('input[name=imageCurso]').val(img);

}



