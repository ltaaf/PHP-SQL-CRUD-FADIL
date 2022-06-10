<?php include 'template/header.php' ?>

<?php
    if(!isset($_GET['id_message'])){
        header('Location: index.php?message=error');
        exit();
    }

    include_once 'model/connexion.php';
    $id_message = $_GET['id_message'];

    $requette = $bd->prepare("select * from message where id_message = ?;");
    $requette->execute([$id_message]);
    $message = $requette->fetch(PDO::FETCH_OBJ);
    //print_r($message);
?>

<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-4">
            <div class="card">
                <div class="card-header">
                Modifier les données :
                </div>
                <form class="p-4" method="POST" action="editerProcessus.php">
                    <div class="mb-3">
                        <label class="form-label">nom: </label>
                        <input type="text" class="form-control" name="txtname" required 
                        value="<?php echo $message->name; ?>">
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Message: </label>
                        <input type="text" class="form-control" name="txtbody" autofocus required
                        value="<?php echo $message->body; ?>">
                    </div>
                  
                    <div class="mb-3">
                    <label for="priority">Priorité</label>
                            <select id="priority" name="txtpriority">
                                <option value="<?php echo $message->priority; ?>">Faible</option>
                                <option value="<?php echo $message->priority; ?>" selected>Normal</option>
                                <option value="<?php echo $message->priority; ?>">Fort</option>
                            </select>
                            
                    </div>

                    <div class="mb-3">
                    <fieldset>
            <legend>Type</legend>

            <label>
                <input type="radio" name="txttype" value="<?php echo $message->type; ?>" checked>
                Complaint
            </label>

            <br>

            <label>
                <input type="radio" name="txttype" value="<?php echo $message->type; ?>">
                Suggestion
            </label>

        </fieldset>
                    </div>

                    <div class="d-grid">
                        <input type="hidden" name="id_message" value="<?php echo $message->id_message; ?>">
                        <input type="submit" class="btn btn-primary" value="modifier">
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<?php include 'template/footer.php' ?>