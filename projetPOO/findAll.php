<!doctype html>
<html lang="en">
  <head>
    <title>findAll</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="css/bootstrap.min.css" >
    <link rel="stylesheet" href="tab.css" >

  </head>
  <body>
  <nav class="navbar navbar-expand-lg  navbar-dark bg-primary ">
  <a class="navbar-brand" href="index.php">Acceuil</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item active">
        <a class="nav-link" href="find.php">Find <span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="findAll.php">FindAll</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="checkstatus.php">checkstatus</a>
      </li>
    </ul>
   
  </div>
</nav>
  <h1>Page de recherche de tous les  Etudiant</h1>
  <h2>Voici la liste des différents option disponible</h2>
<ul>
    <li>etudiant</li>
    <li>boursier</li>
    <li>non_boursier</li>
</ul>
  <center><div class="form">
  <form action="findAll.php" method="post">
  <label for="">Que voulez vous Rechercher:</label>
<input type="search" id="site-search" name="rech"
       aria-label="Search through site content"> 
       <label for=""></label>  
 <input type="submit" value="Rechercher" name="sub">
 </form>
  </div></center> 
    <?php
    
    include_once 'class/Autoloader.php';
    Autoloader::register();
    
   $connexion= Database::connect();
    
if(isset($_POST['sub'])){


  
if($_POST["rech"]=='etudiant'){
    echo '
    <table class="tableau">
    <tr>
        <th>id</th>
        <th>matricule</th>
        <th>Nom</th>
        <th>Prenom</th>
        <th>email</th>
        <th>Tel</th>
        <th>Date de naissance</th>
        
    </tr>';
 $req=$connexion->query('SELECT * FROM ETUDIANT ');
 while ($rep=$req->fetch()) {
     //var_dump($rep);
     echo " <tr>";
            
     echo " <td>".$rep[0]. " </td>";
       echo"<td>".$rep[1].  "</td>";
      echo "<td>".$rep[2].  "</td>";
       echo "<td>".$rep[3].   "  </td>";
       echo "<td>".$rep[4].   "  </td>";
       echo "<td>".$rep[5].   "  </td>";
       echo "<td>".$rep[6].   "  </td>";
 }

}
elseif ($_POST["rech"]=='boursier') {
    echo '
    <table class="tableau">
    <tr>
        <th>id_brs</th>
        <th>id_etu</th>
        <th>id_type</th>
       
        
    </tr>';
    $req=$connexion->query('SELECT* FROM BOURSIER ');
    while ($rep=$req->fetch()) {
        //var_dump($rep);
        echo " <tr>";
               
        echo " <td>".$rep[0]. " </td>";
          echo"<td>".$rep[1].  "</td>";
         echo "<td>".$rep[2].  "</td>";
         
    }
}
elseif ($_POST["rech"]=='non_boursier'){
    echo '
    <table class="tableau">
    <tr>
      
        <th>id_etu</th>
        <th>addresse</th>
       
        
    </tr>';
    $req=$connexion->query('SELECT* FROM NON_BOURSIER ');
    while ($rep=$req->fetch()) {
        //var_dump($rep);
        echo " <tr>";
               
        echo " <td>".$rep[0]. " </td>";
          echo"<td>".$rep[1].  "</td>";
        
         
    }
}  
}

   
     
     
    
    
    
    ?>
  


















    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  </body>
</html>