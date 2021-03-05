$(document).ready(function () {
    let cadastro = '';
    cadastro = $("#cadastroRealizado").val();

    if (cadastro === 'true'){
        exibirModal();
    }else{
        return false;
    }
});
function exibirModal(){
    $('#acionarModalButton').click();
}


