<?php
    include 'contato.class.php';
    $contato = new Contato();

    //verificação se
    if (!empty($_GET['idContato'])) {
        $idContato = $_GET['idContato'];

        $info = $contato->getInfo($idContato);

        if (empty($info['email'])) {
            header("Location: index.php");
            exit; //exit para não exibir o resto do conteudo
        }       
    } else {
        header("Location: index.php");
        exit; //exit para não exibir o resto do conteudo
    }
?>

<h1>Editar</h1>

<!-- metodo de adicionar dados dados em uma tabela usando o formulário -->

<form method="POST" action="editar_submit.php">
    <!--Para editar o submit eu preciso enviar o id-->
    <input type="hidden" name="id" value="<?php echo $info['idContato']; ?>" />

    Nome: <br>
    <input type="text" name="nome" value="<?php echo $info['nome']; ?>"/><br><br>

    <!--para editar tudo vamos fazer pequenas mudanças-->
    E-mail: <br>
    <input type="email" name="email" value="<?php echo $info['email']; ?>"> <br><br>

    <input type="submit" value="Salvar" /> <br>

</form>
