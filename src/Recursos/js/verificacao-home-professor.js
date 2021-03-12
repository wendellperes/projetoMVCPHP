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
    $('input[name="nomeCursoAtualiza"]').val(nome);
    $('input[name=id_curso]').val(id);
    $('input[name=cargaHorariaAtualiza]').val(carga);
    $('select[name=categoriaAtualiza]').val(categoria);
    $('input[name=imageCurso]').val(img);

}