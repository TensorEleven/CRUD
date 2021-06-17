<html>
<head>
    <title>CRUD</title>
    <meta charset="UTF_8">
    <link rel="stylesheet" href="styles/style.css">
</head>
<body>
    <?php 
        include ("db_connect.php");
    ?>
<div class="container">
    <div class="data-table">
        <?php
        $sql = "DELETE FROM person_table WHERE id =:id ";
        $statement = $conn->prepare($sql);
        $statement->execute(['id'=>$_GET['id']]);
                if($result->connect_error)
                    //die("erreur de suppression");
                    echo "<div class='message error'>erreur lors du suppression</div>";
                else
                    echo "<div class='message success'>Element supprimé avec succes</div>";
        ?>    
        <div>
            <a class="manage home"  href="index.php">home</a>
        </div>
    
    </div>
</div>
    
</body>
</html>