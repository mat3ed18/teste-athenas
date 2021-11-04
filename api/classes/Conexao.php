<?php

class Conexao {
    private $host;
    private $user;
    private $pass;
    private $db;
    private $conexao;
    
    public function __construct($host, $user, $pass, $db) {
        $this->host = $host;
        $this->user = $user;
        $this->pass = $pass;
        $this->db = $db;
        $this->conexao = new mysqli($this->host, $this->user, $this->pass, $this->db);
    }
    
    public function getHost() {
        return $this->host;
    }

    public function getUser() {
        return $this->user;
    }

    public function getPass() {
        return $this->pass;
    }

    public function getDb() {
        return $this->db;
    }

    public function getConexao() {
        return $this->conexao;
    }

    public function setHost($host) {
        $this->host = $host;
    }

    public function setUser($user) {
        $this->user = $user;
    }

    public function setPass($pass) {
        $this->pass = $pass;
    }

    public function setDb($db) {
        $this->db = $db;
    }

    public function setConexao($conexao) {
        $this->conexao = $conexao;
    }

}
