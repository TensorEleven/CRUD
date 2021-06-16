<html>
<head>
    <title>CRUD</title>
    <meta charset="UTF_8">
    <link rel="stylesheet" href="styles/style.css">
</head>
<body>
    <div class="container">
        <div class="data-table">
            <h3>Ajouter un nouveau person</h3>
            <form action="create.php" method="POST" style="text-align:right">
                <label for="nom">Nom:</label>
                <input type="text" name="nom"> <br>

                <label for="prenom">Prenom :</label>
                <input type="text" name="prenom"> <br>

                <label for="naissance">Date de naissance :</label>
                <input type="date" name="naissance"><br>

                <label for="age">Age :</label>
                <input type="text" name="age"> <br>
                
                <a class="manage home" href="index.php">Aceuil</a>
                <input class="manage create"type="submit" value ="Valider"></input>
            </form>
    <?php
    $servername = "localhost";
    $username = "root";
    $password = "123456";
    $dbname = "person";
    
    //open connection
    $conn = new mysqli($servername, $username, $password, $dbname);
    
    if ($conn->connect_error){
        die("Connection failed: " . $conn->connect_error);
      } 

    if(isset($_POST["nom"])&&isset($_POST["prenom"])&&isset($_POST["age"])&&isset($_POST["naissance"])){
        $posted_value =  '"'.$_POST["nom"].'","'.$_POST["prenom"].'","'.$_POST["naissance"].'","'.$_POST["age"].'"';
        $sql = "INSERT INTO person_table (nom, prenom, naissance, age)
        VALUES (".$posted_value.")";

        if ($conn->query($sql) === TRUE) {
        echo "<div class='message success'>Element créé avec succes</div>";
        } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
        }
    }
    ?>

</div>
    </div>
</body>
</html>