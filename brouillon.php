if(empty($Ret) || empty($Rvi) || empty($Rty) || empty($Rsi) ||empty($Rpr) || empty($room_image)){
      $message[] = 'please fill out all';
   }else{



      if($upload){
         move_uploaded_file($room_image_tmp_name, $room_image_folder);
         header('location:admin_page.php');
      }else{
         $$message[] = 'please fill out all!'; 
      }



      <li><a href="index5.php">Details</a></li>














<?php

$conn = mysqli_connect('localhost','root','','users');

if(isset($_POST['add_bn'])){

   $Bn = $_POST['Bname'];
   $Bp = $_POST['Bpren'];
   $Bc = $_POST['Bcin'];
   $Bs = $_POST['Bstats'];
  
   if(empty($Bn) || empty($Bp) || empty($Bc) ||empty($Bs)){
      $message[] = 'please fill out all';
      }else{
         header('location:index3.php');
      }
}
if(isset($_GET['delete'])){
   $id = $_GET['delete'];
   mysqli_query($conn, "DELETE FROM bn WHERE  id = '$id'");
   header('location:index1.php');
};

?>

<?php
if ($_SERVER["REQUEST_METHOD"] == "POST" || isset($_POST['suivant'])) {
    $conn = new mysqli("localhost", "root", "", "users");

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Récupérez les données du formulaire et insérez-les dans la base de données
    $Bn = $_POST['Bname'];
    $Bp = $_POST['Bpren'];
    $Bc = $_POST['Bcin'];
    $Bs = $_POST['Bstats'];
    $Bv = $_POST['ville'];
    $Bcom = $_POST['com'];
    $Bd = $_POST['douar'];
    // Récupérez d'autres champs si nécessaire

    $sql = "INSERT INTO bn (nom,prenom,cin,etatcivil,ville,commune,douar) VALUES('$Bn','$Bp','$Bc','$Bs','$Bv','$Bcom','$Bd')";
    
    if ($conn->query($sql) === TRUE) {
        echo "Bénéficiaire ajouté avec succès.";
    } else {
        echo "Erreur lors de l'ajout du bénéficiaire : " . $conn->error;
    }
echo "$Bn";
    $conn->close();
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Ajouter un Bénéficiaire</title>
    <style>
        /* Votre style CSS ici */
    </style>
</head>
<body>
    <h1>Ajouter un Bénéficiaire</h1>
    <form method="POST" action="process_ajouter_beneficiaire.php">
    </form>
    <?php

if(isset($message)){
   foreach($message as $message){
      echo '<span class="message">'.$message.'</span>';
   }
}

?>
   <?php

$typ = mysqli_query($conn, "SELECT * FROM bn");

?>
<body>
   <ul>
      <li><a href="#" class="active">Recherche des bénéficiaires</a></li>
      <!-- Add other navigation links as needed -->
   </ul>

   <div class="container">
      <h2>Recherche des bénéficiaires</h2>
      <p>Cette page vous permet de rechercher les bénéficiaires. Vous pouvez rechercher avec plusieurs critères tels que le nom, numéro PV, nom de l'opérateur, etc.</p>

      <!-- Search Form -->
      <form action="search_results.php" method="GET">
         <label for="searchName">Nom:</label>
         <input type="text" id="searchName" name="searchName" placeholder="Nom du bénéficiaire">
         <br>
         <label for="searchPV">Numéro PV:</label>
         <input type="text" id="searchPV" name="searchPV" placeholder="Numéro PV">
         <br>
         <label for="searchOperator">Nom de l'opérateur:</label>
         <input type="text" id="searchOperator" name="searchOperator" placeholder="Nom de l'opérateur">
         <br>
         <!-- Add more search criteria as needed -->

         <button type="submit">Rechercher</button>
      </form>
   </div>
</body>
</html>

$room_image = $_FILES['room_image']['name'];
   $room_image_tmp_name = $_FILES['room_image']['tmp_name'];
   $room_image_folder = 'uploaded_img/'.$room_image;
