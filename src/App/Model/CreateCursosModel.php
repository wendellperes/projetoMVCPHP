<?php

namespace App\Model;

use App\Classes\BancoConexao;

class CreateCursosModel{
    /*
     * As variaveis
     * Serao atribuidas no Construct da Class
     */
    private $idRetorno;
    private $idProfessor;
    private $nomeCurso;
    private $imgCurso;
    private $cargaHorario;
    private $categoria;

    public function __construct($idProfessor, $nomeCurso, $imgCurso, $cargaHorario, $categoria){
        $this->idProfessor = $idProfessor;
        $this->nomeCurso = $nomeCurso;
        $this->imgCurso = $imgCurso;
        $this->cargaHorario = $cargaHorario;
        $this->categoria = $categoria;
    }

    public function enviarDadosCurso(){
        $objBanco = new BancoConexao('cursos_cadastrados');
        $this->idRetorno = $objBanco->inserir([
            'id_professor'=>$this->idProfessor,
            ' img_curso'=>$this->imgCurso,
            ' nome_curso'=>$this->nomeCurso,
            ' carga_horaria'=>$this->cargaHorario,
            ' categoria'=>$this->categoria,
        ]);
        return $this->idRetorno;
    }

}