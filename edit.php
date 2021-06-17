<html>
<head>
    <title>CRUD</title>
    <meta charset="UTF_8">
    <link rel="stylesheet" href="styles/style.css">
</head>
<body>
    <?php

    include ("db_connect.php");
    $sql = "SELECT id, nom, prenom, naissance, age FROM person_table WHERE id=".$_GET["id"];
    $result = $conn->query($sql);
    
    if ($result) 
        // output data
        $row = $result->fetch();
        
    
    if(!isset($_POST['id'])){
        $id= $_GET['id'];
    }
    else
        $id= $_POST['id'];

    if(isset($_POST["nom"])&&isset($_POST["prenom"])&&isset($_POST["age"])&&isset($_POST["naissance"])){
        $update_query = 'UPDATE person_table SET nom=:nom, prenom=:prenom, naissance=:naissance, age=:age WHERE id=:id';
        $statement = $conn->prepare($update_query);
        $state = $statement->execute(['nom' => $_POST['nom'],'prenom' => $_POST['prenom'], 'naissance'=>$_POST['naissance'], 'age'=>$_POST['age'] ,'id'=> $id ]);
        if($state)
            echo 'success';
        else
            echo 'error';
    } 

    ?>

    <div class="container">
        <div class="data-table">
            <h3>Edition d'information</h3>
            <form action="edit.php" method="POST" style="text-align:right">
                <label for="nom">Nom:</label>
                <input type="text" name="nom" value="<?=$row["nom"]?>"><br>

                <label for="prenom">Prenom :</label>
                <input type="text" name="prenom" value="<?=$row["prenom"]?>"><br>

                <label for="naissance">Date de naissance :</label>
                <input type="date" name="naissance" value="<?=$row["naissance"]?>"><br>

                <label for="age">Age :</label>
                <input type="text" name="age" value="<?=$row["age"]?>"> <br>
                
                <input type="hidden" name="id" value="<?=$_GET["id"]?>">

                <a class="manage home" href="index.php">Aceuil</a>
                <input class="manage create" type="submit" value ="Valider"></input>
            </form>
        </div>
    </div>
    
</body>
</html>