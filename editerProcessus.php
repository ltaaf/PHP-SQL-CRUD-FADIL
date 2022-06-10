<?php
    print_r($_POST);
    if(!isset($_POST['id_message'])){
        header('Location: index.php?message=error');
    }

    include 'model/connexion.php';
    $id_message = $_POST['id_message'];
    $name = $_POST['txtname'];
    $body = $_POST['txtbody'];
    $priority = $_POST['txtpriority'];

    $requette = $bd->prepare("UPDATE message SET name = ?, body = ?, priority = ? where id_message = ?;");
    $resultado = $requette->execute([$name, $body, $priority, $id_message]);

    if ($resultado === TRUE) {
        header('Location: index.php?message=editer');
    } else {
        header('Location: index.php?message=error');
        exit();
    }
    
?>