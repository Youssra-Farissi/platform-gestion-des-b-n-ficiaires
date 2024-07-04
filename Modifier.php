<?php
$conn = mysqli_connect('localhost','root','','users');


$id = $_GET['edit'];

if(isset($_POST['modifier'])){

    $Bn = $_POST['Bname'];
    $Bp = $_POST['Bpren'];
    $Bc = $_POST['Bcin'];
    $Bs = $_POST['Bstats'];
    $Bv = $_POST['ville'];
    $Bcom = $_POST['com'];
    $Bd = $_POST['douar']; 
    $Bpv = $_POST['pv'];
    $Bop = $_POST['op'];
    $Bno = $_POST['no'];
    $Bnr = $_POST['nr'];
    $Bda = $_POST['da'];
    $Bti = $_POST['ti'];
    $Bprix = $_POST['prix']; 
    $Bsub = $_POST['sub'];
    $Bnl = $_POST['nl'];
    
  
      $update_data = "UPDATE bn SET nom='$Bn',prenom='$Bp',cin='$Bc',etatcivil='$Bs',ville='$Bv',commune='$Bcom',douar='$Bd',Npv='$Bpv',operateur='$Bop',nomoperation='$Bno',Nressencement='$Bnr',dateaffectation='$Bda',typeintervention='$Bti',prixproduit='$Bprix',subvention='$Bsub',Nlot='$Bnl' where id='$id' ";
      $upload = mysqli_query($conn, $update_data);

   }
;

?>

<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
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
</style>
<ul>
  <li><a href="index1.php">gestion de bénéficiaire</a></li>
 

</ul>

<div class="container">


<div class="admin-product-form-container centered">

   <?php
      
      $select = mysqli_query($conn, "SELECT * FROM bn WHERE id = '$id'");
      while($row = mysqli_fetch_assoc($select)){
    
   ?>
   
   <form action="" method="post" enctype="multipart/form-data">
      <h3 class="title">MODEFIER LES INFORMATIONS DU BENEFICIAIRE</h3>
      
      <input type="text" placeholder="entrer le nom" name="Bname" class="box" value="<?php echo $row['nom']; ?>">
         <input type="text" placeholder="entrer le prenom"  name="Bpren" class="box"value="<?php echo $row['prenom']; ?>">
         <input type="text" placeholder="Entre Cin"  name="Bcin" class="box"value="<?php echo $row['cin']; ?>">
         <input type="text" placeholder="état civil"  name="Bstats" class="box"value="<?php echo $row['etatcivil']; ?>">
         <input type="text" placeholder="la ville:" name="ville" class="box"value="<?php echo $row['ville']; ?>">
         <input type="text" placeholder="commune:"  name="com" class="box"value="<?php echo $row['commune']; ?>">
         <input type="text" placeholder="Douar:"  name="douar" class="box"value="<?php echo $row['douar']; ?>">

         </form>

         <form action="" method="post" enctype="multipart/form-data">
         <h3 class="title">MODEFIER LES INFORMATIONS DE L OPERATION</h3>
         <input type="text" placeholder="num pv" name="pv" class="box"value="<?php echo $row['Npv']; ?>">
         <input type="text" placeholder="operateur:"  name="op" class="box"value="<?php echo $row['operateur']; ?>">
         <input type="text" placeholder="Nom d opération:"  name="no" class="box"value="<?php echo $row['nomoperation']; ?>">
         <input type="text" placeholder="numéro de ressencement" name="nr" class="box"value="<?php echo $row['Nressencement']; ?>">
         <input type="text" placeholder="date d affectation"  name="da" class="box"value="<?php echo $row['dateaffectation']; ?>">
         <input type="text" placeholder="type d intervention:"  name="ti" class="box"value="<?php echo $row['typeintervention']; ?>">
         <input type="text" placeholder="prix de produit" name="prix" class="box"value="<?php echo $row['prixproduit']; ?>">
         <input type="text" placeholder="la subvention FSHIU:"  name="sub" class="box"value="<?php echo $row['subvention']; ?>">
         <input type="text" placeholder="N° de lot:"  name="nl" class="box"value="<?php echo $row['Nlot']; ?>">
      <input type="submit" value="modifier " name="modifier" class="btn">
      <a href="index1.php" class="btn">go back!</a>
   </form>
   <?php }; ?>
</div>

</div>

</body>
</html>