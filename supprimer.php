<?php 
    if(!isset($_GET['id_message'])){
        header('Location: index.php?mensaje=error');
        exit();
    }

    include 'model/connexion.php';
    $id_message = $_GET['id_message'];

    $phrase = $bd->prepare("DELETE FROM message where id_message = ?;");
    $requette = $phrase->execute([$id_message]);

    if ($requette === TRUE) {
        header('Location: index.php?mensaje=eliminado');
    } else {
        header('Location: index.php?mensaje=error');
    }
    
?>