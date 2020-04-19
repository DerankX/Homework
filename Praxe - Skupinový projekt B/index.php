<html>
<head>
    <title> Praxe - Skupinový projekt B </title>
    <meta name="viewport" content="width=device/width, initial-scale=1.0">
    <meta charset="utf-8">
    <link rel="stylesheet" href="style.css">
</head>
<body>
<form method="post" action="<?php echo $_SERVER["PHP_SELF"];?>">
    <h1 class="nadpis">Zadejte adresu </h1> 
    <input class="input" type="text" name="str">
    <input class="button" type="submit">
</form>
<?php
require ("simple_html_dom.php");
if ($_SERVER ["REQUEST_METHOD"] == "POST"){
    $stranka = $_POST["str"];
    $html = file_get_html($stranka);
    $h = array();
    $i = 0;
    for ($hc = 1;$hc != 6;$hc++){
        foreach($html->find("h$hc") as $heading){
            $h[$i] = $heading;
            echo $h[$i];
            $i++;
        }
        $i = 0;
    }
    $i = 0;
    $l = array();
    foreach($html->find("a") as $links){
        $l[$i] = $links;
        echo $l[$i];
         echo "<br>";
        $i++;
    }
}
?>
</body>
</html>