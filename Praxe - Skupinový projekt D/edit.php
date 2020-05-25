<?php
require_once("connection.php");
$ID = $_GET['GetID'];
$query = " select * from place where id='".$ID."'";
$result = mysqli_query($con,$query);
while($row = mysqli_fetch_assoc($result))
{
    $ID = $row['id'];
    $name = $row['name'];
    $gps = $row['gps'];
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
        <form action="update.php?id=<?php echo $ID ?>" method="post">
        <input type="text" class="form-control" placeholder=" Location name" name="name" value="<?php echo $name?>">
        <input type="text" class="form-control" placeholder=" Location GPS " name="gps" value="<?php echo $gps?>">
        <button name="update">edit</button>
        <a href="view.php">Zpět</a>
</body>
</html>