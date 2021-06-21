<html>
<head>
    <title>CRUD</title>
    <meta charset="UTF_8">
    <link rel="stylesheet" href="styles/style.css">
</head>
<body>
    
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
            //$count_rows = $conn->query($sql_count_rows);
            //$rows = conn->query($sql_count_rows);
            /*
            pdo
            $sql_count_rows = "SELECT :name  FROM person_table";
            
            $statement = $conn->prepare($sql_count_rows);
            //$statement = $conn->query($sql_count_rows);
            $statement->bindParam(':name', "nom");
            var_dump($statement);
            $count_rows = $statement->execute();
            */

        include ("db_connect.php");
        
        if(isset($_GET["page"])){
            $offset = 1 + ($_GET["page"]-1)*5 ;
        }
        else
            $offset = 1;

        
        $count = "SELECT COUNT(*) FROM person_table";
        $stat = $conn->query($count);
        $row_count = $stat->fetch();
        $row_count = $row_count[0];
        $page_number = ceil($row_count/5);


        $sql = "SELECT * FROM person_table LIMIT 5 OFFSET ".$offset;
        $statement = $conn->query($sql);
        //$statement->execute();
            while($row = $statement->fetch()){
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
            <div class="link">
            <?php
                for($i=1;$i<=$page_number;$i++){?>
                    <a href="index.php?page=<?=$i?>"><?=$i?></a>
                <?php }?>
            </di>    
        </div>
    </div>
</div>
    
</body>
</html>