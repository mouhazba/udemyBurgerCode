<!DOCTYPE html>
<html>
    <head>
        <title>Restaurant</title>
        <meta charset="utf-8"/>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
        <link href='http://fonts.googleapis.com/css?family=Holtwood+One+SC' rel='stylesheet' type='text/css'>
        <link rel="stylesheet" href="../css/test.css">
    </head>
    
    <body>
        <h1 class="text-logo"><span class="glyphicon glyphicon-cutlery"></span> Burger Code <span class="glyphicon glyphicon-cutlery"></span></h1>
        <div class="container admin">
            <div class="row">
                <h1><strong>Liste des items   </strong><a href="insert.php" class="btn btn-success btn-lg"><span class="glyphicon   glyphicon-plus"></span> Ajouter</a></h1>
                <table class="table table-striped table-bordered table-hover">
                
                  <thead class="thead-dark">
                    <tr>
                      <th>Name</th>
                      <th>Description</th>
                      <th>Prix</th>
                      <th>Catégorie</th>
                      <th>Actions</th>
                    </tr>
                  </thead>
                  <?php
                      require 'database.php';
                      $db = Database::connect ();
                      $sql="SELECT items.id, items.name, items.description, items.price, categories.name AS category FROM items LEFT JOIN categories ON items.category = categories.id ORDER BY items.id DESC";
                      $statement = $db->query($sql);
                      while($ligne = $statement->fetch())
                      {
                        
                  ?>
                    
                  <tbody>
                    <tr>
                      <td><?php echo $ligne["name"]; ?></td>
                      <td><?php echo $ligne["description"]; ?></td>
                      <td><?php echo number_format((float)$ligne["price"],2,'.',''); ?> €</td>
                      <td><?php echo $ligne["category"]; ?></td>
                      <td width="300px">
                        <a href="view.php?id=<?php echo $ligne["id"]; ?>"  class="btn btn-default "><span class="glyphicon glyphicon-eye-open"></span> voir</a>
                        <a href="update.php?id=<?php echo $ligne["id"]; ?>" class="btn btn-primary "><span class="glyphicon glyphicon-pencil"></span> modifier</a>
                        <a href="delete.php?id=<?php echo $ligne["id"]; ?>" class="btn btn-danger "><span class="glyphicon glyphicon-remove"></span> supprimer</a>
                      </td>
                    </tr>  
                  </tbody>
                  <?php  }  Database::disconnect();?>
                </table>
            </div>
        </div>
    </body>
</html>
