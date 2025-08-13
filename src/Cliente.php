<?php
namespace App;

class Cliente
{
    private $nome;
    public function __construct($nome="Cliente") {
        $this->nome = $nome;
    }

    public function getNome(){
        return $this->nome;
    }
}