$(document).ready(function () {
    let cadastro = $("#cadastroRealizado").val();
    let cadastroDuplicado = $("#usuarioCadastrado").val();
    let emailUser = $("#emailUser").val();

    if (cadastro === 'true'){
        // define os textos a serem exibidos no formulario
        let textTitle = "Sucesso!!!"
        let textBody  = "Seu Cadastro com email: "+emailUser+" foi realizado com Sucesso!!!"

        //insere no html via id os textos
        $("#modalMenssageTitle").append(textTitle);
        $("#bodyModal").append(textBody);

        //chama a funcao que vai exibir o modal
        exibirModalCadastroRealizado();
    }else if (cadastroDuplicado === 'true'){
        // define os textos a serem exibidos no formulario
        let textTitle = "Atenção!!!"
        let textBody  = "Já existe uma conta registrada com esse email: "+emailUser+"! "

        //insere no html via id os textos
        $("#modalMenssageTitle").append(textTitle);
        $("#bodyModal").append(textBody);

        //chama a funcao que vai exibir o modal
        exibirModalCadastroRealizado();
    }
});
function exibirModalCadastroRealizado(){
    $('#acionarModalButton').click();
}


