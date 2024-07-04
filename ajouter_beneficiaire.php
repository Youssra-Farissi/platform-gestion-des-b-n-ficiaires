<!DOCTYPE html>
<html>
<head>
    <title>Ajouter un Bénéficiaire</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f5f5f5;
            margin: 0;
            padding: 0;
        }

        h1 {
            background-color: #3498db;
            color: white;
            text-align: center;
            padding: 20px;
            margin: 0;
        }

        .container {
            max-width: 800px;
            margin: 20px auto;
            padding: 20px;
            background-color: white;
            box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.2);
        }

        form {
            display: flex;
            flex-direction: column;
            gap: 10px;
        }

        label {
            font-weight: bold;
        }

        input {
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 5px;
        }

        button {
            background-color: #f39c12;
            color: white;
            padding: 8px 15px;
            text-decoration: none;
            border-radius: 5px;
            border: none;
            cursor: pointer;
            align-self: flex-end;
        }
    </style>
</head>
<body>
    <h1>Ajouter un Bénéficiaire</h1>
    <div class="container">
        <form method="POST" action="process_ajouter_beneficiaire.php">
            <label for="nom">Nom:</label>
            <input type="text" id="nom" name="nom" required>
            
            <label for="prenom">Prénom:</label>
            <input type="text" id="prenom" name="prenom" required>
            
            <label for="cin">Numéro du CIN:</label>
            <input type="text" id="cin" name="cin" required>
            
            <label for="etatcivil">État Civil:</label>
            <input type="text" id="etatcivil" name="etatcivil" required>
            
            <!-- Ajoutez d'autres champs ici pour les informations sur le conjoint et les enfants -->
            
            <button type="submit">Suivant</button>
        </form>
    </div>
</body>
</html>
