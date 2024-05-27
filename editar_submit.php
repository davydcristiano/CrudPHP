<?php
    include 'contato.class.php';
    $contato = new Contato();
    
    //Recebendo os dados.
    //fazendo a verificação
    if (!empty($_POST['id'])) {
        $nome = $_POST['nome'];
        //para editar tudo vamos colocar o campo
        $email = $_POST['email'];
        $id = $_POST['id'];  // Corrigido: adicionado ponto-e-vírgula
        
        if (!empty($email)) {
            $contato->editar($nome, $email, $id);
        }
        //Redirencionamento para o index.php
        header("Location: index.php");
    }

