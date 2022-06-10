<?php include 'template/header.php' ?>

<?php
    include_once "model/connexion.php";
    $requette = $bd -> query("select * from message");
    $message = $requette->fetchAll(PDO::FETCH_OBJ);
    //print_r($message);
?>

<div class="container mt-5">
    <div class="row justify-content-center">
    <div class="col-md-4">
            <div class="card">
                <div class="card-header">
                Entrez les données :
                </div>
                <form class="p-4" method="POST" action="ajouter.php">
                    <div class="mb-3">
                        <label class="form-label">Nom: </label>
                        <input type="text" class="form-control" name="txtname" autofocus required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Message: </label>
                        <input type="text" class="form-control" name="txtbody" autofocus required>
                    </div>

                    <div class="mb-3">
                    <label for="priority">Priorité</label>
                            <select id="priority" name="txtpriority" class="form-select" aria-label="Default select example">
                                <option selected>Ouvrez ce menu de sélection</option>
                                <option value="Faible">Faible</option>
                                <option value="Normal">Normal</option>
                                <option value="Fort">Fort</option>
                            </select>
                    </div>

                    <div class="mb-3">
                    <fieldset>
                    <legend>Type</legend>

                    <input class="form-check-input" type="radio" name="txttype" value="Complaint" checked>
                     <label for="" class="form-check-label">Complaint</label>   
                    

                    <br>
                    <input class="form-check-input" type="radio" name="txttype" value="Suggestion">
                    <label for="" class="form-check-label">Suggestion</label>

                    </fieldset>

                    </div>


                    <div class="md-3">
                    <label><input type="checkbox" name="terms">J'accepte les termes et conditions</label>
                    </div> 
                
                    <br>

                    <div class="d-grid">
                        <input type="hidden" name="caché" value="1">
                        <input type="submit" class="btn btn-primary" value="Enregistrer">
                    </div>
                </form>
            </div>
        </div>





        <div class="col-md-7">
            <!-- Avec bootstrap nous allons gérer les adresses -->
            <?php 
                if(isset($_GET['message']) and $_GET['message'] == 'falta'){
            ?>
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
            <strong>Error!</strong> Complétez tous les champs.
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
            <?php 
                }
            ?>


            <?php 
                if(isset($_GET['message']) and $_GET['message'] == 'registrado'){
            ?>
            <div class="alert alert-success alert-dismissible fade show" role="alert">
            <strong>Enregistré !</strong> Les données ont été agrégées.
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
            <?php 
                }
            ?>   
            
            

            <?php 
                if(isset($_GET['message']) and $_GET['message'] == 'error'){
            ?>
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
            <strong>Error!</strong> Essayez encore.
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
            <?php 
                }
            ?>   



            <?php 
                if(isset($_GET['message']) and $_GET['message'] == 'editer'){
            ?>
            <div class="alert alert-success alert-dismissible fade show" role="alert">
            <strong>Changé !</strong> Les données ont été mises à jour.
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
            <?php 
                }
            ?> 


            <?php 
                if(isset($_GET['message']) and $_GET['message'] == 'supprimer'){
            ?>
            <div class="alert alert-warning alert-dismissible fade show" role="alert">
            <strong>Éliminé !</strong> Les données ont été supprimées.
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
            <?php 
                }
            ?> 

            <!-- fin alert -->

            <div class="card">
                <div class="card-header">
                Liste des personnes
                </div>
                <div class="p-4">
                    <table class="table align-middle">
                        <thead>
                            <tr>    
                                <th scope="col">#</th>
                                <th scope="col">Nom</th>
                                <th scope="col">Message</th>
                                <th scope="col">Priorité</th>
                                <th scope="col">Types</th>
                                <th scope="col" colspan="2">Options</th>
                            </tr>
                        </thead>
                        <tbody>
                            
                            <?php 
                                foreach($message as $donnees){ 
                            ?>

                            <tr>
                                <td scope="row"><?php echo $donnees->id_message; ?></td>
                                <td><?php echo $donnees->name; ?></td>
                                <td><?php echo $donnees->body; ?></td>
                                <td><?php echo $donnees->priority; ?></td>
                                <td><?php echo $donnees->type; ?></td>

                                <td><a class="text-success" href="editer.php?id_message=<?php echo $donnees->id_message; ?>"><i class="bi bi-pencil-square"></i></a></td>
                                <td><a onclick="return confirm('Vous êtes sûr de vouloir supprimer ?');" class="text-danger" href="supprimer.php?id_message=<?php echo $donnees->id_message; ?>"><i class="bi bi-trash"></i></a></td>
                            </tr>

                            <?php 
                                }
                            ?>

                        </tbody>
                    </table>
                    
                </div>
            </div>
        </div>



       
    </div>
</div>

<?php include 'template/footer.php' ?>