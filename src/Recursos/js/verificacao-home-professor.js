$(document).ready( function (){
    //limpar os campos de formularios cadCursos;

    $("#nomecurso").val('');
    $("#img_curso").val('');
    $("#cargahoraria").val('');
    $("#categoriasCursos").val('');
    //check os dados para exibicao de mensagem login/cadastroUsuario
    // let cadastro = $("#cadastro").val();
    //
    // if (cadastro === 'true'){
    //     console.log('entriou');
    //     // define os textos a serem exibidos no Modal
    //     let textTitle = "Sucesso!!!"
    //     let textBody  = "Seu Curso foi Cadastrado com Sucesso!!!"
    //
    //     //insere no html via id os textos
    //     $("#modalMenssageTitle").append(textTitle);
    //     $("#bodyModal").append(textBody);
    //
    //     //chama a funcao que vai exibir o modal
    //     //exibirModalCadastroCurso();
    // }else if (cadastro === 'false'){
    //     console.log('nao entrou');
    //     // define os textos a serem exibidos no Modal
    //     let textTitle = "Atenção!!!"
    //     let textBody  = "Houve um problema em Cadastrar Seu Curso Chame Oseas do Backend! "
    //
    //     //insere no html via id os textos
    //     $("#modalMenssageTitle").append(textTitle);
    //     $("#bodyModal").append(textBody);
    //
    //     //chama a funcao que vai exibir o modal
    //     //exibirModalCadastroCurso();
    // }else{
    //     console.log('nao funcionou');
    // }
});
function exibirModalAtualizar(id, nome){
     //$("#editar").val(id);
    // $("#nomecurso").val(nome);
    console.log(id, );
}