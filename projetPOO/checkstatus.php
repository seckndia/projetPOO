<!doctype html>
<html >
  <head>
    <title>find</title>
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
    <h1>Page de recherche d'un Etudiant</h1>
  <center><div class="form">
  <form action="checkstatus.php" method="post">
<label for=""  >matricule: &nbsp;&nbsp;  </label>
 <input type="text" name="matricule"><br/>
 <!-- <label for="">Prenom:</label>
<input type="text" name="prenom"><br/> -->
<label for=""></label>  
 <input type="submit" value="Rechercher" name="sub">
<!-- <label for="">Donnez le matricule :</label>
<input type="search" id="site-search" name="q"
       aria-label="Search through site content">

<button>Rechercher</button> -->
  </form>
  </div></center> 
  <?php


  include_once 'class/Autoloader.php';
  Autoloader::register();
  
 $connexion= Database::connect();
//Requete okkkk
//  $req=$connexion->query('SELECT* FROM ETUDIANT WHERE matricule="KD1001"');
//  while ($rep=$req->fetch()) {
//      //var_dump($rep);
//      echo " <tr>";
            
//      echo " <td>".$rep[0]. " </td>";
//        echo"<td>".$rep[1].  "</td>";
//       echo "<td>".$rep[2].  "</td>";
//        echo "<td>".$rep[3].   "  </td>";
//        echo "<td>".$rep[4].   "  </td>";
//        echo "<td>".$rep[5].   "  </td>";
//        echo "<td>".$rep[6].   "  </td>";
//  }

if(isset($_POST['sub'])){

  $matricule=($_POST['matricule']);
 //$prenom=strtolower($_POST['prenon']);
 $etuservice = new Service_Etudiant();
$req= $etuservice->findNonBoursier($matricule);
//var_dump($_POST['matricule']);
//var_dump($req);

foreach ($req as $rep) {
 // var_dump($rep);

 echo '
 <table class="tableau">
 <tr>
  
     <th>matricule</th>
     <th>Nom</th>
     <th>Prenom</th>
     <th>email</th>
     <th>Tel</th>
     <th>Date de naissance</th>
     <th>Adresse</th>
     <th>status</th>
 </tr>';
  echo " <tr>";
            
   echo " <td>".$rep->matricule. " </td>";
    echo"<td>".$rep->nom.  "</td>";
    echo "<td>".$rep->prenom.  "</td>";
     echo "<td>".$rep->email.   "  </td>";
     echo "<td>".$rep->tel.   "  </td>";
     echo "<td>".$rep->date_naiss.   "  </td>";
     echo "<td>".$rep->adresse.   "  </td>";
     echo "<td> non boursier  </td>";
     echo " </tr>";
  

   }

  }
   if(isset($_POST['sub'])){

   
    $matricule=($_POST['matricule']);
   //$prenom=strtolower($_POST['prenon']);
   $etuservice = new Service_Etudiant();
  $req= $etuservice->findBoursier($matricule);
  //var_dump($_POST['matricule']);
  //var_dump($req);
  
  foreach ($req as $rep) {
    echo '
    <table class="tableau">
    <tr>
     
        <th>matricule</th>
        <th>Nom</th>
        <th>Prenom</th>
        <th>email</th>
        <th>Tel</th>
        <th>Date de naissance</th>
        <th>libelle</th>
        <th>Montant</th>
        <th>status</th>
    </tr>'; 
   // var_dump($rep);
    echo " <tr>";
              
     echo " <td>".$rep->matricule. " </td>";
      echo"<td>".$rep->nom.  "</td>";
      echo "<td>".$rep->prenom.  "</td>";
       echo "<td>".$rep->email.   "  </td>";
       echo "<td>".$rep->tel.   "  </td>";
       echo "<td>".$rep->date_naiss.   "  </td>";
       echo "<td>".$rep->libelle.   "  </td>";
       echo "<td>".$rep->montant.   "  </td>";
       echo "<td>  boursier  </td>";
       echo " </tr>";
    
  
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