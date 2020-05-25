
<?php
require_once("connection.php");
$query = " select * from place";
$result = mysqli_query($con,$query);
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Přehled míst</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <Table>
    <tr>
    <td>ID</td>
    <td>Název</td>
    <td>Souřadníce</td>
    </tr>
    <a href="index.php">Zpět</a>
    <?php
        while($row = mysqli_fetch_assoc($result))
        {
            $ID = $row['id'];
            $name = $row['name'];
            $gps = $row['gps'];
    ?>
        <tr>
        <td><?php echo $ID?></td>
        <td><?php echo $name?></td>
        <td><?php echo $gps?></td>
        <td><a href="edit.php?GetID=<?php echo $ID ?>">edit</a></td>
        <td><a href="delete.php?Del=<?php echo $ID ?>">delete</a></td>
        </tr>
    <?php
        }
    ?>
    </Table>
</body>
</html>
