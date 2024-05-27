<?php
    include 'contato.class.php';
    $contato = new Contato();

    //verificando se recebeu o ID 
    if (!empty($_GET['idContato'])) {
        $idContato = $_GET['idContato'];

        //printando pra ver se ta retornando o idContato
        /*echo "ID: " . $idContato;*/

        //comando excluir o idContato
        $contato->excluirId($idContato);

        //redirecionando pelo index.php
        header("Location: index.php");

    } else {
        //retorna para o index.php
        header("location: index.php");
    }
