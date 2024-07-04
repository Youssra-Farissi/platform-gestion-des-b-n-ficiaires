<?php
// Enable error reporting for debugging
ini_set('display_errors', 1);
error_reporting(E_ALL);


// Establish database connection
$conn = mysqli_connect('localhost','root','','users');

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST["username"];
    $currentPassword = $_POST["current_password"];
    $newPassword = $_POST["new_password"];
    $confirmPassword = $_POST["confirm_password"];

    // Fetch the user's ID based on the username
    $query = "SELECT id, mdp FROM users WHERE nom = '$username'";
    $result = $conn->query($query);

    if ($result->num_rows === 1) {
        $row = $result->fetch_assoc();
        $id = $row["id"];
        $storedPassword = $row["mdp"];

        // Verify the current password against the stored password
        if ($currentPassword === $storedPassword) {
            // Update the password in the database
            $updateQuery = "UPDATE users SET mdp = '$newPassword' WHERE id = '$id'";
            if ($conn->query($updateQuery) === TRUE) {
                echo "<p>Mot de passe changé avec succès!</p>";
                header('location:index1.php');
            } else {
                echo "<p>Erreur lors de la mise à jour du mot de passe: </p>" . $conn->error;
            }
        } else {
            echo "<p>Le mot de passe actuel est incorrect.</p>";
        }
    } else {
        echo "<p>Utilisateur non trouvé.</p>";
    }
}

$conn->close();
?>

<!DOCTYPE html>
<html>
<head>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
   

   <!-- custom css file link  -->
   <link rel="stylesheet" href="style.css">
    <title>Changer le mot de passe</title>
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
  margin-top:  40%;
  position: absolute;
  margin-left:40%;
}

    label {
        font-size:18px;
    }
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
  <li><a class="active" href="index1.php">gestion de bénéficiaires</a></li>

</ul>
  
    <div class="container">

   <div class="admin-product-form-container">
    <form action="" method="POST">
    <h3>Changer le mot de passe</h3>
        <label for="username">Nom d'utilisateur:</label>
        <input type="text" name="username" required class="box"><br>
        
        <label for="current_password">Mot de passe actuel:</label>
        <input type="password" name="current_password" required class="box"><br>
        
        <label for="new_password">Nouveau mot de passe:</label>
        <input type="password" name="new_password" required class="box"><br>
        
        <label for="confirm_password">Confirmer le nouveau mot de passe:</label>
        <input type="password" name="confirm_password" required class="box"><br>
        
        <input type="submit" class="btn" value="Changer le mot de passe">
    </form>
    </div>
    </div>
</body>
</html>
