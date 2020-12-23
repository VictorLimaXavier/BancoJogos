<?php
class Jogo{
    //Atributos
    private $id;
    private $nome;
    private $genero;
    private $ano;
    private $tenho;
    private $favorito;

    //Construtor
    function __construct($nome, $genero, $ano, $tenho = false, $favorito = false, $id = 0){
        $this -> id = $id;
        $this -> nome = $nome;
        $this -> genero = $genero;
        $this -> ano = $ano;
        $this -> tenho = $tenho;
        $this -> favorito = $favorito;
    }

    //Setters
    function setId($id){
        $this -> id = $id;
    }
    function setNome($nome){
        $this -> nome = $nome;
    }
    function setGenero($genero){
        $this -> genero = $genero;
    }
    function setAno($ano){
        $this -> ano = $ano;
    }
    function setTenho($tenho){
        $this -> tenho = $tenho;
    }
    function setFavorito($favorito){
        $this -> favorito = $favorito;
    }

    //Getters
    function getId(){
        return $this -> id;
    }
    function getNome(){
        return $this -> nome;
    }
    function getGenero(){
        return $this -> genero;
    }
    function getAno(){
        return $this -> ano;
    }
    function getTenho(){
        return $this -> tenho;
    }
    function getFavorito(){
        return $this -> favorito;
    }
    
}
?>