<?php

namespace App\Model;

use App\Classes\BancoConexao;

class UpdateCursosModel{
    /*
     * As variaveis
     * Serao atribuidas no Construct da Class
     */
    private $idRetorno;
    private $idCurso;
    private $idProfessor;
    private $nomeCurso;
    private $imgCurso;
    private $cargaHorario;
    private $categoria;

    public function __construct($idProfessor, $nomeCurso, $imgCurso = null, $cargaHorario, $categoria, $idcurso){
        $this->idProfessor = $idProfessor;
        $this->nomeCurso = $nomeCurso;
        $this->imgCurso = $imgCurso;
        $this->cargaHorario = $cargaHorario;
        $this->categoria = $categoria;
        $this->idCurso = $idcurso;
    }

    public function enviarDadosCurso(){
        $objBanco = new BancoConexao('cursos_cadastrados');
        if ($this->imgCurso == null && $this->imgCurso == ''){
            $this->idRetorno = $objBanco->update('id ='. $this->idCurso, [
                'id_professor'=>$this->idProfessor,
                ' nome_curso'=>$this->nomeCurso,
                ' carga_horaria'=>$this->cargaHorario,
                ' categoria'=>$this->categoria,
            ]);
            echo 'model'.$this->idRetorno;
        }else{
            $this->idRetorno = $objBanco->update('id ='.$this->idCurso, [
                'id_professor'=>$this->idProfessor,
                ' img_curso'=>$this->imgCurso,
                ' nome_curso'=>$this->nomeCurso,
                ' carga_horaria'=>$this->cargaHorario,
                ' categoria'=>$this->categoria,
            ]);
            return $this->idRetorno;
        }

    }

}