<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
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
 

    $conn = new mysqli("localhost", "root", "", "users");

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Récupérez les données du formulaire et insérez-les dans la base de données
   
    // Récupérez d'autres champs si nécessaire

    $sql = "INSERT INTO bn (nom,prenom,cin,etatcivil,ville,commune,douar,Npv,operateur,nomoperation,Nressencement,dateaffectation,typeintervention,prixproduit,subvention,Nlot) 
    VALUES('$Bn','$Bp','$Bc','$Bs','$Bv','$Bcom','$Bd','$Bpv','$Bop','$Bno','$Bnr','$Bda','$Bti','$Bprix','$Bsub','$Bnl')";
    
    if ($conn->query($sql) === TRUE) {
        header('location:index1.php');
        echo "Bénéficiaire ajouté avec succès.";
       
    } else {
        echo "Erreur lors de l'ajout du bénéficiaire : " . $conn->error;
    }

    $conn->close();
}
?>
