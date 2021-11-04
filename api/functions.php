<?php
    include "classes/Conexao.php";
    
    $con = new Conexao("localhost", "root", "usbw", "athenas-db");
    $con->getConexao()->query("SET NAMES 'utf8'");
    
    function CadastrarPessoa($nome, $email, $categoria) {
        $res = $GLOBALS["con"]->getConexao()->query('INSERT INTO pessoas (nome, email, categoria_id) VALUES ("' . $nome . '", "' . $email . '", '.$categoria.')');
        if ($res) {
            return array("mensagem" => "A pessoa foi cadastrada com sucesso!");
        } else {
            return array("erro" => "Erro: " . mysqli_error($GLOBALS["con"]->getConexao()));
        }
    }
    
    function EditarPessoa($codigo, $nome, $email, $categoria) {
        $res = $GLOBALS["con"]->getConexao()->query('UPDATE pessoas p SET p.nome = "' . $nome . '", p.email = "' . $email . '", p.categoria_id = ' . $categoria . ' WHERE p.codigo = ' . $codigo);        
        if ($res) {
            return array("mensagem" => "A pessoa foi atualizada com sucesso!");
        } else {
            return array("erro" => "Erro: " . mysqli_error($GLOBALS["con"]->getConexao()));
        }
    }
    
    function ExcluirPessoa($codigo) {
        $res = $GLOBALS["con"]->getConexao()->query('DELETE FROM pessoas WHERE codigo = ' . $codigo);        
        if ($res) {
            return array("mensagem" => "A pessoa foi atualizada com sucesso!");
        } else {
            return array("erro" => "Erro: " . mysqli_error($GLOBALS["con"]->getConexao()));
        }
    }
    
    function ListarPessoa($codigo) {
        $res = $GLOBALS["con"]->getConexao()->query("SELECT p.* FROM pessoas p WHERE p.codigo = $codigo");
        if ($res) {
            $pessoa = $res->fetch_all(MYSQLI_ASSOC);
            return $pessoa;
        } else {
            return array("erro" => "Erro: " . mysqli_error($GLOBALS["con"]->getConexao()));
        }
    }
    
    function ListarPessoas() {
        $res = $GLOBALS["con"]->getConexao()->query("SELECT p.*, c.nome AS 'categoria_nome' FROM pessoas p, categoria c WHERE p.categoria_id = c.codigo ORDER BY p.codigo ASC");
        if ($res) {
            $pessoas = $res->fetch_all(MYSQLI_ASSOC);
            return $pessoas;
        } else {
            return array("erro" => "Erro: " . mysqli_error($GLOBALS["con"]->getConexao()));
        }
    }
    
    
    function ListarCategoria($codigo) {
        $res = $GLOBALS["con"]->getConexao()->query("SELECT c.* FROM categoria c WHERE c.codigo = $codigo");
        if ($res) {
            $categoria = $res->fetch_all(MYSQLI_ASSOC);
            return $categoria;
        } else {
            return array("erro" => "Erro: " . mysqli_error($GLOBALS["con"]->getConexao()));
        }
    }
    
    function ListarCategorias() {
        $res = $GLOBALS["con"]->getConexao()->query("SELECT c.* FROM categoria c ORDER BY c.codigo ASC");
        if ($res) {
            $pessoas = $res->fetch_all(MYSQLI_ASSOC);
            return $pessoas;
        } else {
            return array("erro" => "Erro: " . mysqli_error($GLOBALS["con"]->getConexao()));
        }
    }