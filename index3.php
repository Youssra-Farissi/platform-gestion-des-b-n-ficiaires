
<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  
   $Bn = $_POST['Bname'];
   $Bp = $_POST['Bpren'];
   $Bc = $_POST['Bcin'];
   $Bs = $_POST['Bstats'];}
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
</style>

   
<ul>
  <li><a class="active" href="index3">gestion de bénéficiaires</a></li>

</ul>
<div class="container">

   <div class="admin-product-form-container">

      <form action="index4.php" method="POST" enctype="multipart/form-data">
         <h3>origine du bénéficiaire<br>2/3</h3>
         <input type="text" placeholder="la ville:" name="ville" class="box">
         <input type="text" placeholder="commune:"  name="com" class="box">
         <input type="text" placeholder="Douar:"  name="douar" class="box">
         <input type="hidden" name="Bname" value="<?php echo htmlspecialchars($Bn); ?>">
    <input type="hidden" name="Bpren" value="<?php echo htmlspecialchars($Bp); ?>">
    <input type="hidden" name="Bcin" value="<?php echo htmlspecialchars($Bc); ?>">
    <input type="hidden" name="Bstats" value="<?php echo htmlspecialchars($Bs); ?>">
         <input type="submit" class="btn" name="suivant" value="suivant">
         <input type="submit" class="btn" name="annuler" value="précedent">
      </form>
      </div>
      
   </div>
   
</body>
</html>
