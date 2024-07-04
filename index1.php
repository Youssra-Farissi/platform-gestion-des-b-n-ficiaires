<?php

$conn = mysqli_connect('localhost','root','','users');

if(isset($_POST['add_bn'])){

   $Bn = $_POST['Bname'];
   $Bp = $_POST['Bpren'];
   $Bc = $_POST['Bcin'];
   $Bs = $_POST['Bstats'];
  
   if(empty($Bn) || empty($Bp) || empty($Bc) ){
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


<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">

   <title>admin page</title>

   <!-- font awesome cdn link  -->
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
   

   <!-- custom css file link  -->
   <link rel="stylesheet" href="style.css">

</head>
<body>
<style>


ul {
  list-style-type: none;
  margin: 0;
  padding: 0;
  overflow: hidden;
  background-color: #333;
}

li {
   font-size: 18px;
  float: left;
}

li a {
  display: block;
  color: white;
  text-align: center;
  padding: 14px 16px;
  text-decoration: none;
}

li a:hover:not(.active) {
  background-color: #111;
}

.active {
  background-color: #04AA6D;
}
.confirmation-dialog {
         display: none;
         position: fixed;
         top: 50%;
         left: 50%;
         transform: translate(-50%, -50%);
         background-color: white;
         padding: 20px;
         border-radius: 5px;
         box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.2);
         z-index: 1000;
      }

      .confirmation-dialog h2 {
         margin-top: 0;
      }

      .confirmation-dialog-buttons {
         text-align: center;
         margin-top: 20px;
      }
      .dropdown {
         position: absolute;
   
   right: 35px;
  display: inline-block;
}

.dropdown-content {
   display: none;
   background-color: #333;
   position: absolute;
   
   width: 170px;
   box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
   padding: 10px 10px;
   z-index: 1;
   top: 60px; /* Adjust the top position as needed */
   right: -22px;
   border-radius: 5px;
   text-align: center;
}

.dropdown:hover .dropdown-content {
  display: block;
}
.dropdown-content a{color: white;
  text-align: center;
 
  text-decoration: none;
  font-size: 16px;}
</style>

<ul>
  <li><a class="active" href="http://localhost/dashboard/gc/index1.php">gestion de bénéficiaires</a></li>
  <li><a class="active" href="http://localhost/dashboard/gc/recherchepage.php" >chercher des bénéficiaires</a></li>
  <div class="dropdown">
  <li><img src="login.png" alt="Logo de mon site" width="55" height="55" ></li>
  <div class="dropdown-content">
  <a href="change_password.php">Changer le mode passe</a>
  <br>
 <g>------------------------</g>
  <br>

    <a href="login.php">Déconnexion</a>

  </div>
</div>
<br>
<br>
<br>
</ul>
  <!-- Profile dropdown -->

<div class="container">
   <div class="admin-product-form-container">
 

      <form method="POST" action="index3.php" enctype="multipart/form-data">
         <h3>information du bénéficiaire<br>1/3</h3>
         <input type="text" placeholder="entrer le nom" name="Bname" class="box">
         <input type="text" placeholder="entrer le prenom"  name="Bpren" class="box">
         <input type="text" placeholder="Entre Cin"  name="Bcin" class="box" required >
         <input type="text" placeholder="état civil"  name="Bstats" class="box">
         <input type="submit" class="btn" name="add_bn" value="suivant">

      </form>
     

   </div>

   <?php

   $select = mysqli_query($conn, "SELECT * FROM bn");

   
   ?>
  <script>
      function confirmDelete(id) {
         var confirmationDialog = document.getElementById('confirmation-dialog');
         confirmationDialog.style.display = 'block';

         var confirmButton = document.getElementById('confirm-button');
         confirmButton.onclick = function() {
            window.location.href = 'index1.php?delete=' + id;
         };

         var cancelButton = document.getElementById('cancel-button');
         cancelButton.onclick = function() {
            confirmationDialog.style.display = 'none';
         };
      }
   </script>
   <br>
   <br>
   <div class="product-display">
      <table class="product-display-table">
         <thead>
         <tr>
            <th>Nom</th>
            <th>Prenom</th>
            <th>Numéro du CIN</th>
            <th>État Civil</th>
            <th>action</th>
         </tr>
         </thead>
         <?php while($row = mysqli_fetch_assoc($select)){ ?>
         <tr>
            <td><?php echo $row['nom']; ?></td>
            <td><?php echo $row['prenom']; ?></td>
            <td><?php echo $row['cin']; ?></td>
            <td><?php echo $row['etatcivil']; ?></td>
            <td>
               <a href="Modifier.php?edit=<?php echo $row['id']; ?>" class="btn"> <i class="fas fa-edit"></i> modifier </a>
               <a href="#" onclick="confirmDelete(<?php echo $row['id']; ?>);" class="btn"> <i class="fas fa-trash"></i> supprimer </a>
            </td>
         </tr>
      <?php } ?>
      </table>
      
   </div>
   <div id="confirmation-dialog" class="confirmation-dialog">
      <h2>alert</h2>
      <h3>Êtes-vous sûr de vouloir supprimer ce bénéficiaire ?</h3>
      <div class="confirmation-dialog-buttons">
         <center>
         <input type="button" class="btn" id="confirm-button" value="Confirmer" style="width: 160px;background-color: red;">
         <input type="button" class="btn" id="cancel-button" value="Annuler" style="width: 160px; background-color: green;"></center>
      </div>
</div>
</body>
</html>