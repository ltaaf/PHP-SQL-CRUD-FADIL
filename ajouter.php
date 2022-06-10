<?php
    //print_r($_POST);
    if(empty($_POST["caché"]) || empty($_POST["txtname"]) || empty($_POST["txtbody"]) || empty($_POST["txtpriority"])|| empty($_POST["txttype"])){
        header('Location: index.php?message=falta');
        exit();
    }
    
    include_once 'model/connexion.php';
    $name = $_POST["txtname"];
    $body = $_POST["txtbody"];
    $priority = $_POST["txtpriority"];
    $type = $_POST["txttype"];
    $terms = filter_input(INPUT_POST, "terms", FILTER_VALIDATE_BOOL);
    
    // On verifie si la case dédiée au terme est vide, si le cas on affiche un message, 
    // sinon on insert les donées dans la base de données
    if ( ! $terms) {
        die("Terms must be accepted");
    }else{
        $requette = $bd->prepare("INSERT INTO message(name,body,priority,type) VALUES (?,?,?,?);");
        $resultat = $requette->execute([$name,$body,$priority,$type]);
        if ($resultat === TRUE) {
            header('Location: index.php?message=ajouter');
        } else {
            header('Location: index.php?message=error');
            exit();
        }
    }

   
    
?>