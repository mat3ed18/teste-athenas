<?php
    include "classes/Conexao.php";
    
    $con = new Conexao("localhost", "root", "usbw", "athenas-db");
    $con->getConexao()->query("SET NAMES 'utf8'");
    
    function CadastrarUsuario($nome, $email, $categoria) {
        $res = $GLOBALS["con"]->getConexao()->query('INSERT INTO pessoas (nome, email, categoria_id) VALUES ("' . $nome . '", "' . $email . '", '.$categoria.')');
        if ($res) {
            return array("mensagem" => "A pessoa foi cadastrada com sucesso!");
        } else {
            return array("erro" => "Erro: " . mysqli_error($GLOBALS["con"]->getConexao()));
        }
    }
    
    function EditarUsuario($id, $nome, $email, $categoria) {
        
    }
    
    function ExcluirUsuario($id) {
        
    }
    
    function ListarUsuario($id) {
        
    }
    
    function ListarUsuarios() {
        $res = $GLOBALS["con"]->getConexao()->query("SELECT p.*, c.nome AS 'categoria_nome' FROM pessoas p, categoria c WHERE p.categoria_id = c.codigo ORDER");
        if ($res) {
            $pessoas = $res->fetch_all(MYSQLI_ASSOC);
            return $pessoas;
        } else {
            return array("erro" => "Erro: " . mysqli_error($GLOBALS["con"]->getConexao()));
        }
    }
    
    function CadastrarCategoria($nome, $email, $categoria) {
        
    }
    
    function EditarCategoria($id, $nome, $email, $categoria) {
        
    }
    
    function ExcluirCategoria($id) {
        
    }
    
    function ListarCategoria($id) {
        
    }
    
    function ListarCategorias() {
        
    }