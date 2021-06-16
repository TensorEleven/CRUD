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
        <table>
            <tr>
                <th>id</th>
                <th>Nom</th>
                <th>Prenom</th>
                <th class="date-naissance">D.N.</th>
                <th>Age</th>
                <th>Manage</th>
            </tr>
            
            <?php
            
            $sql_count_rows = 'SELECT nom  FROM person_table';
            
            $count_rows = $conn->query($sql_count_rows);
            var_dump($count_rows);
            //$rows = conn->query($sql_count_rows);

            if(isset($_GET["page"])){
                $offset = 1 + ($_GET["page"]-1)*5 ;
                $sql = "SELECT id, nom, prenom, naissance, age FROM person_table LIMIT 5 OFFSET ".$offset;
                echo "OFFSET ".$offset;
            }
            else
                $sql = "SELECT id, nom, prenom, naissance, age FROM person_table LIMIT 5 OFFSET 1";
                //limit result to 5

            $result = $conn->query($sql);
                if ($result->num_rows > 0) {
                    // output data of each row
                    
                    while($row = $result->fetch_assoc()){
            ?>
                    <tr>
                        <td><?=$row["id"]?></td>
                        <td><?=$row["nom"]?></td>
                        <td><?=$row["prenom"]?></td>
                        <td><?=$row["naissance"]?></td>
                        <td><?=$row["age"]?></td>
                        <td>
                            <a class="manage edit" href="edit.php?id=<?=$row["id"]?>">Edit</a>
                            <a class="manage delete" href="delete.php?id=<?=$row["id"]?>">Delete</a>
                        </td>   
                    </tr>
                    <?php
                    }
                  } else {
                    echo "0 results";
                  }
            ?>
            <tr>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td><a class="manage create" href="create.php">Ajouter</a></td>
            </tr>
        </table>
        <div class="pagination">
            <di class="link">
                <a href="index.php?page=1">1</a>
                <a href="index.php?page=2">2</a>
                <a href="index.php?page=3">3</a>
            </di>    
        </div>
    </div>
</div>
    
</body>
</html>