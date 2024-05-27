<!--dados vindo pra cá-->
<?php
    include 'contato.class.php';
    $contato = new Contato();

    
    //Recebendo os dados.
    //fazendo a verificação
    if (!empty($_POST['email'])) {
        $nome = $_POST['nome'];
        $email = $_POST['email'];

        $contato->adicionar($email, $nome);
        
        //Redirencionamento para o index.php
        header("Location: index.php");

    }

