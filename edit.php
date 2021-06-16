<html>
<head>
    <title>CRUD</title>
    <meta charset="UTF_8">
    <link rel="stylesheet" href="styles/style.css">
</head>
<body>
    <?php

    include "db_connect.php";

    ?>
    <div class="container">
        <div class="data-table">
            <h3>Edition d'information</h3>
            <form action="create.php" method="POST" style="text-align:right">
                <label for="nom">Nom:</label>
                <input type="text" name="nom" ><?=$row["id"]?><br>

                <label for="prenom">Prenom :</label>
                <input type="text" name="prenom"> <br>

                <label for="naissance">Date de naissance :</label>
                <input type="date" name="naissance"><br>

                <label for="age">Age :</label>
                <input type="text" name="age"> <br>
                
                <a class="manage home" href="index.php">Aceuil</a>
                <input class="manage create"type="submit" value ="Valider"></input>
            </form>
        </div>
    </div>
    
</body>
</html>