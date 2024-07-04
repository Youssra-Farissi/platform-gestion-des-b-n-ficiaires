


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
   <link rel="stylesheet" href="style1.css">

</head>
<body>

<style>
p {
  text-align: center;
  background-color: #f8d7da; /* Light red background */
  color: #721c24; /* Dark red text color */
  border: 1px solid #f5c6cb; /* Light red border */
  padding: 10px 15px;
  margin: 10px 0;
  border-radius: 5px;
  font-size: 14px;
}



ul {
  list-style-type: none;
  margin: 0;
  padding: 0;
  overflow: hidden;
  background-color: ##6495ED;
  
}

li {
   font-size: 18px;
  float: left;
}

li a {
  display: block;
  color: white;
  text-align: center;
  padding: 32px 32px;
  text-decoration: none;
}

li a:hover:not(.active) {
  background-color: #111;
}

.active {
  background-color: #04AA6D;
}
</style>

<ul><center>
<img src="banner.png" alt="Logo de mon site" width="800" height="100" style="border: 1px solid white;">
</center>
</ul>
<BR>
<BR>
<hr>
<div class="container">
<img src="picc.png" alt="Logo de mon site" width="540" height="450" style="border: 1px solid white;   margin-right:55%;">

   <div class="admin-product-form-container">

      <form action="index.php" method="POST" enctype="multipart/form-data">
      <h3>Authentification</h3>
         <input type="text" placeholder="votre nom d utilisateur" name="username" class="box">
         <input type="text" placeholder="votre mode passe"  name="password" class="box">
         <input type="submit" class="btn" name="suivant" value="se connecter">
         <br> <div class="forgot-password">
    <a href="/forgot-password">mode de passe oublié?</a>
  </div>

      </form>
      <br>
      <br>
      <img src="logo.png" alt="Logo de mon site" width="100" height="90" style="border: 1px solid white;   margin-left:55%;">

   </div>

   <?php
        
   if(isset($_POST['suivant']))
{
  session_start();
$LogMail = $_POST['username'];
$LogPass = $_POST['password'];
$bd = mysqli_connect('localhost', 'root','', 'users');
  $req = "Select * from users where nom = '$LogMail' and mdp = '$LogPass'";
  $res = mysqli_query($bd, $req);
  if (mysqli_num_rows($res) == 1) {
     header('location: index1.php');
   }else {
     echo "<p><big>Le nom d'utilisateur ou le mot de passe que vous avez saisi est incorrect. Veuillez réessayer.</big></p>";
   }
}
?>


</body>
</html>
