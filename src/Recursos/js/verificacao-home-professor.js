$(document).ready( function (){
    //limpar os campos de formularios cadCursos;

    $("#nomecurso").val('');
    $("#img_curso").val('');
    $("#cargahoraria").val('');
    $("#categoriasCursos").val('');

});
function exibirDados(id, nome, carga, categoria, img){
    console.log(id);
    console.log(nome);
    console.log(carga);
    $('input[name="nome"]').val(nome);
    $('input[name="cargaHoraria"]').val(carga);
    $('select[name=categoria]').val(categoria);
    $('input[name=imageCurso]').val(img);

}