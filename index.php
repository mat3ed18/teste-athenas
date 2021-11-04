<!DOCTYPE html>
<html>
    <head>
        <title>CRUD Athenas</title>
        <meta charset="UTF-8">
        <link rel="stylesheet" href="source/css/estilo.css"/>
        <script type="text/javascript" src="jquery/jquery-3.6.0.min.js"></script>
        <script type="text/javascript" src="bootstrap/js/bootstrap.bundle.min.js"></script>
        <script type="text/javascript" src="source/js/script.js"></script>
        <script src="https://gist.github.com/pedropuppim/fd15c4d0ecd766873c721407df0ac2f9.js"></script>
    </head>
    <body>
        <div class="container">
            <?php include 'api/functions.php' ?>
            <form action="../teste-athenas/" class="row g-3" method="post">
                <div class="col-6">
                    <label for="nomeUsuario" class="form-label">Nome</label>
                    <input type="text" class="form-control" name="nome" value="<?php echo (isset($_GET["cod_pessoa"])) ? ListarPessoa($_GET["cod_pessoa"])[0]["nome"] : "" ?>" required>
                </div>
                <div class="col-4">
                    <label for="emailUsuario" class="form-label">Email</label>
                    <input type="email" class="form-control" name="email" value="<?php echo (isset($_GET["cod_pessoa"])) ? ListarPessoa($_GET["cod_pessoa"])[0]["email"] : "" ?>" required>
                </div>
                <div class="col-2">
                    <label for="inputState" class="form-label">Categoria</label>
                    <select class="form-select" name="categoria" required>
                        <option value="" selected> - Selecione - </option>
                        <?php
                            $categorias = ListarCategorias();
                            foreach ($categorias as $key => $categoria) {
                                $selecionado = false;
                                if (isset($_GET["cod_pessoa"])) {
                                    $usuario = ListarPessoa($_GET["cod_pessoa"])[0];
                                    $cat = ListarCategoria($usuario["categoria_id"])[0];
                                    $selecionado = ($categorias[$key]["nome"] == $cat["nome"]);
                                }
                                ?><option value="<?php echo $categoria["codigo"] ?>" <?php echo ($selecionado) ? "selected" : "" ?> ><?php echo $categoria["nome"] ?></option><?php
                            }
                        ?>
                    </select>
                </div>
                <div class="col-12">
                    <?php
                        if (isset($_GET["cod_pessoa"])) {
                            ?> 
                            <input type="hidden" name="pessoa_cod" value="<?php echo $_GET["cod_pessoa"] ?>">
                            <button type="submit" class="btn btn-primary" name="atualizar_pessoa">Atualizar</button> 
                            <?php
                        } else {
                            ?> <button type="submit" class="btn btn-primary" name="cadastrar_pessoa">Cadastrar</button> <?php
                        }
                    ?>
                </div>
                
                <?php 
                    if (isset($_POST["cadastrar_pessoa"])) {
                        $cadastro = CadastrarPessoa($_POST["nome"], $_POST["email"], $_POST["categoria"]);
                        
                        if (isset($cadastro["mensagem"])) {
                            ?> <div class="alert alert-success col-12"><?php echo $cadastro["mensagem"] ?></div> <?php
                        } else {
                            ?> <div class="alert alert-danger col-12"><?php echo $cadastro["erro"] ?></div> <?php
                        }
                    } else if (isset($_POST["atualizar_pessoa"])) {
                        $atualizacao = EditarPessoa($_POST["pessoa_cod"], $_POST["nome"], $_POST["email"], $_POST["categoria"]);
                        
                        if (isset($atualizacao["mensagem"])) {
                            ?> <div class="alert alert-success col-12"><?php echo $atualizacao["mensagem"] ?></div> <?php
                        } else {
                            ?> <div class="alert alert-danger col-12"><?php echo $atualizacao["erro"] ?></div> <?php
                        }
                    } else if (isset($_GET["excluir_pessoa"])) {
                        $exclusao = ExcluirPessoa($_GET["excluir_pessoa"]);
                        
                        if (isset($exclusao["mensagem"])) {
                            ?> <div class="alert alert-success col-12"><?php echo $exclusao["mensagem"] ?></div> <?php
                        } else {
                            ?> <div class="alert alert-danger col-12"><?php echo $exclusao["erro"] ?></div> <?php
                        }
                    }
                ?>
            </form>
        </div>

        <div class="container">
            <div class="row">
                <table class="table table-striped table-hover col-12">
                    <thead>
                        <tr>
                            <td>Código</td>
                            <td>Nome</td>
                            <td>E-mail</td>
                            <td>Categoria</td>
                            <td></td>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                            $pessoas = ListarPessoas();
                            
                            $pagina = (isset($_GET["pagina"])) ? $_GET["pagina"] - 1 : 0;
                            $pessoas_pag = array_chunk($pessoas, (isset($_GET["qtd"])) ? $_GET["qtd"] : 10);
                            
                            foreach ($pessoas_pag[$pagina] as $key => $pessoa) {
                                ?>
                                    <tr>
                                        <td><?php echo $pessoa["codigo"]; ?></td>
                                        <td><?php echo $pessoa["nome"]; ?></td>
                                        <td><?php echo $pessoa["email"]; ?></td>
                                        <td><?php echo $pessoa["categoria_nome"]; ?></td>
                                        <td>
                                            <a href="../teste-athenas?cod_pessoa=<?php echo $pessoa["codigo"]; ?>"><i class="bi bi-pencil-square"></i></a>
                                            <a href="../teste-athenas?excluir_pessoa=<?php echo $pessoa["codigo"]; ?>"><i class="bi bi-trash"></i></a>
                                        </td>
                                    </tr>
                                <?php
                            }
                        ?>
                    </tbody>
                </table>
                
                <div class="btn-group" role="group" aria-label="Basic example">
                    <?php
                        $nr_buttons = ceil(count($pessoas) / ((isset($_GET["qtd"])) ? $_GET["qtd"] : 10));
                        
                        for ($i = 1; $i <= $nr_buttons; $i++) {
                            ?> <a class="btn btn-secondary" href="../teste-athenas?pagina=<?php echo $i ?>"><?php echo $i ?></a> <?php
                        }
                    ?>
                </div>
                
            </div>
        </div>
    </body>
</html>
