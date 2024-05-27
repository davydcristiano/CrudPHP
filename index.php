<?php
    include 'contato.class.php';
    $contato = new Contato();
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>crud basico php</title>
</head>
<body>

    <h1>Contatos</h1>

    <a href="adicionar.php">[ADICIONAR]</a> <br><br>

    <table border="1" width="500">
        <tr>
            <th>ID</th>
            <th>NOME</th>
            <th>E-MAIL</th>
            <th>AÇÕES</th>
        </tr>

        <?php 
        $lista = $contato->getAll();
        foreach ($lista as $item):
        ?>
        <tr>
            <td> <?php echo $item['idContato']; ?> </td>
            <td> <?php echo $item['nome']; ?> </td>
            <td> <?php echo $item['email']; ?> </td>
            <td>
                <a href="editar.php?idContato=<?php echo $item['idContato']; ?>">[EDITAR]</a>
                <a href="excluir.php?idContato=<?php echo $item['idContato']; ?>">[EXCLUIR]</a>
            </td>
        </tr>
        <?php endforeach; ?>
    </table>

</body>
</html>