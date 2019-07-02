<!doctype html>
<html>

<head>
  <title>ProjetPOO</title>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="css/bootstrap.min.css">
  
  <link rel="stylesheet" href="test.css">

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
</head>

<body>

  <?php
  include_once 'class/Autoloader.php';
  Autoloader::register();
  //$database=new Database();
  //$connection=$database->connect();
  Database::connect();
  ?>
  <br />
  <br />

  <div class="container">
    <form  id="form" action="index.php" method="POST">
      <h1>Formulaire d'ajout </h1>
      <div class="form-row">
          <div class="form-group">
             <label for="">Matricule :</label>
               <input type="text" name="matricule" id="name" required />
          </div>
         <div class="form-group">
            <label for="nom"> Nom :</label>
              <input type="text" name="nom" id="nom" required />
              </div>
                </div>
              <div class="form-row">
                   <div class="form-group">
                  <label for="prenom">Prenom :</label>
            <input type="text" name="prenom" id="name" required />
                </div>
                <div class="form-group">
                <label for="nom"> Email :</label>
               <input type="email" name="email" id="" required />
           </div>
        </div>
          <div class="form-row">
          <div class="form-group">
          <label for="">Date de naissance:</label>
            <input type="date" name="date_naiss" id="" required />
         </div>
      <div class="form-group">
      <label for=""> Tel :</label>
      <input type="number" name="tel" id="" required />
            </div>
            </div>

      <h2>Information supplémentaire</h2>
      <div id="boursier">
        <div id="nbr">
          <label>
            <input type="radio" name="boursier" id="nonbours" checked="checked" value="Non_boursier" />
            Non_boursier 
          </label>
        </div>
        <div id="br">
          <label>
            <input type="radio" name="boursier" id="bours" value="Boursier" />
            Boursier &nbsp;
          </label><br />
        </div>
      </div>
      <div id="adresse">
        <label>Addresse : </label>
        <input type="text" name="adresse"  /><br />
      </div>
      <div id="tybourse">
        <label>Type de bourse: </label>
        <?php
        include_once 'class/Autoloader.php';
        Autoloader::register();
       
        $connexion = Database::connect();
        echo "<select name='type' >";
        echo '<option value=""></option>';

        $request = $connexion->query('SELECT *  FROM TYPE_bourse');
        while ($perso = $request->fetch()) {
         
          echo '<option value=' . $perso["id_type"] . '>' . $perso["libelle"] . '</option>';
        }


        echo "</select><br>";

        ?>
      </div>
      <div id="lonon">

        <div id="lo">
          <label>
            <input type="radio" name="loge" id="nonlog" checked="checked" value="Non_loger" />
            Non_loger
          </label>
        </div>

        <div id="nonlo">
          <label>
            <input type="radio" name="loge" id="loger" value="loger" />
            loger &nbsp;
          </label><br />
        </div>

      </div>

    <div id="numcham">
        <label>Numéro de chambre: </label>
        <?php
        include_once 'class/Autoloader.php';
        Autoloader::register();
        //$database=new Database();
        //$connection=$database->connect();
        $connexion = Database::connect();
        echo "<select name='numcham' >";
        echo '<option value=""></option>';

        $request = $connexion->query('SELECT *  FROM CHAMBRE');
        while ($perso = $request->fetch()) {
          //$id=$perso['m'];
          //break;
          echo '<option value=' . $perso["id_chambre"] . '>' . $perso["id_chambre"] . '</option>';
        }


        echo "</select><br>";

        ?>
      </div>
    <div id="numbat">
        <label>Numéro de Batiment: </label>
        <?php
        include_once 'class/Autoloader.php';
        Autoloader::register();
        //$database=new Database();
        //$connection=$database->connect();
        $connexion = Database::connect();
        echo "<select name='numbat' >";
        echo '<option value=""></option>';

        $request = $connexion->query('SELECT *  FROM BATIMENT');
        while ($perso = $request->fetch()) {
          //$id=$perso['m'];
          //break;
          echo '<option value=' . $perso["id_bat"] . '>' . $perso["num_bat"] . '</option>';
        }


        echo "</select><br>";

        ?>
      </div>


      <input type="submit" name="envoyer" value="envoyer" />

    </form>
  </div>

  <?php
  //récupération 

  if (isset($_POST['envoyer'])) {
    $matricule = $_POST['matricule'];
    $nom = $_POST['nom'];
    $prenom = $_POST['prenom'];
    $email = $_POST['email'];
    $tel = $_POST['tel'];
    $date_naiss = $_POST['date_naiss'];
    $addresse = $_POST['adresse'];
    $id_type = $_POST['type'];
    $numcham=$_POST['numcham'];
    //$numbat=$_POST['numbat'];
if($_POST['boursier']=='Boursier'){
  if($_POST['loge']=='loger'){
    $etuservice = new Service_Etudiant();
    $loge=new Loger($matricule, $nom, $prenom, $email, $tel, $date_naiss, $id_type,$numcham);
  //var_dump($loge);
      $etuservice->addEtudiant($loge);
  }
  else{
    $etuservice = new Service_Etudiant();
 
    $bs= new Boursier($matricule, $nom, $prenom, $email, $tel, $date_naiss, $id_type);
    $etuservice->addEtudiant($bs);
    //var_dump($bs);
  }
  
}
else if($_POST['boursier']=='Non_boursier')
  {
   $nb = new Non_boursier($matricule, $nom, $prenom, $email, $tel, $date_naiss, $addresse);
   $etuservice = new Service_Etudiant();
   $etuservice->addEtudiant($nb);
   //var_dump($nb);
}

    
  }



  ?>


<script src="jquery-3.4.1.js"></script>
<script>
$(document).ready(function(){
$('#form').submit(function(){
  alert('Formulaire bien envoyer ');
});

});





</script>

  <script src="test.js"></script>




  <!-- Optional JavaScript -->
  <!-- jQuery first, then Popper.js, then Bootstrap JS -->
  <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</body>

</html>