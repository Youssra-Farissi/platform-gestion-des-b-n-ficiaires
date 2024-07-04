<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Recherche des bénéficiaires</title>

   <!-- font awesome cdn link  -->
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">

   <!-- custom css file link  -->
   <link rel="stylesheet" href="style.css">
   <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap-theme.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
<script src="tableExport/tableExport.js"></script>
<script type="text/javascript" src="tableExport/jquery.base64.js"></script>
<script src="js/export.js"></script>
   <style>
      p {
  text-align: center;
  background-color: #f8d7da; /* Light red background */
  color: #721c24; /* Dark red text color */
  border: 1px solid #f5c6cb; /* Light red border */
  padding: 10px 15px;
  margin: 10px 10;
  border-radius: 5px;
  font-size: 14px;
  width:20%;
  
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
    table,th,td{border:1px solid black;
   padding: 10px;
text-align:center;
}
   </style>
</head>
<body>
   <ul>
      <li><a class="active" href="index1.php">gestion de bénéficiaire d'une province</a></li>
   </ul>

   <div class="container">
      <div class="admin-product-form-container">
         <form action="recherchepage.php" method="GET" enctype="multipart/form-data">
            <h3>CHERCHER UN BENEFICIAIRE</h3>
            <input type="text" placeholder="ENTRER LE NOM DU BENEFICIAIRE" name="SHN" class="box">
            <input type="text" placeholder="ENTRER LE PRENOM DU BENEFICIAIRE"  name="SHP" class="box">
            <input type="text" placeholder="ENTRER Cin DU BENEFICIAIRE"  name="cin" class="box">
            <input type="text" placeholder="ENTRER NOM D OPERATION DU BENEFICIAIRE"  name="ND" class="box">

            <input type="submit" class="btn" name="suivant" value="CHERCHER">
         </form>
      </div>
   </div>
  
   <input type="button" class="btn" id="exportButton" value="Export to Excel" style="width: 200px; float:right ; margin:5px 46px ;background-color: blue;"  >

  
<?php
if ($_SERVER["REQUEST_METHOD"] == "GET") {
    if (isset($_GET['SHN']) && isset($_GET['SHP']) && isset($_GET['cin'])&& isset($_GET['ND'])) {
       $nom = $_GET['SHN'];
       $prenom = $_GET['SHP'];
       $cin = $_GET['cin'];
       $Nop = $_GET['ND'];
// Database connection
$conn = new mysqli("localhost", "root", "", "users");
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}


$sql = "SELECT * FROM bn WHERE nom LIKE '$nom' OR prenom LIKE '$prenom' OR cin LIKE '$cin' OR nomoperation LIKE '$Nop'";

// Execute the query
$result = $conn->query($sql);

// Display the results
if ($result->num_rows > 0) {
    echo "<center>
    <table id='table' border='1'>
            <tr>
                <th>Nom</th>
                <th>Prénom</th>
                <th>CIN</th>
                <th>Ville</th>
                <th>Commune</th>
                <th>Douar</th>
                <th>NPV</th>
                <th>Nom Opération</th>
                <th>Opérateur</th>
                <th>N° Recensement</th>
                <th>Date Affectation</th>
                <th>Type d'Intervention</th>
                <th>Prix Produit</th>
                <th>Subvention</th>
                <th>N° Lot</th>
            </tr>";

    while ($row = $result->fetch_assoc()) {
        echo "<tr>
                <td>" . $row["nom"] . "</td>
                <td>" . $row["prenom"] . "</td>
                <td>" . $row["cin"] . "</td>
                <td>" . $row["ville"] . "</td>
                <td>" . $row["commune"] . "</td>
                <td>" . $row["douar"] . "</td>
                <td>" . $row["Npv"] . "</td>
                <td>" . $row["nomoperation"] . "</td>
                <td>" . $row["operateur"] . "</td>
                <td>" . $row["Nressencement"] . "</td>
                <td>" . $row["dateaffectation"] . "</td>
                <td>" . $row["typeintervention"] . "</td>
                <td>" . $row["prixproduit"] . "</td>
                <td>" . $row["subvention"] . "</td>
                <td>" . $row["Nlot"] . "</td>
            </tr>" ;
    }

    echo "</table></center><br><br>";
} else {
    echo "<center><p>Aucun bénéficiaire trouvé.</p></center>";
}

    }
   }

   
?>
<script>
document.getElementById("exportButton").addEventListener("click", function() {
   
    const table = document.getElementById("table");
    const rows = table.getElementsByTagName("tr");
    let csvContent = "data:text/csv;charset=utf-8,";
    
    for (const row of rows) {
        const cells = row.getElementsByTagName("td");
        const cellValues = Array.from(cells).map(cell => cell.innerText);
        const rowCSV = cellValues.join("          ");
        csvContent += rowCSV + "\n";
    }

    // Create a Blob and generate a download link
    const encodedUri = encodeURI(csvContent);
    const link = document.createElement("a");
    link.setAttribute("href", encodedUri);
    link.setAttribute("download", "table.csv");
    document.body.appendChild(link);
    link.click();
    document.body.removeChild(link);
});
</script>
</body>
</html>
