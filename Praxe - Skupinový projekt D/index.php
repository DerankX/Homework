
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <script src="https://api.mapy.cz/loader.js"></script>
	<script >Loader.load()</script>
</head>
<body>
    <?php
        require_once("connection.php");
        $query = " select * from place ";
        $result = mysqli_query($con,$query);
    ?>      
    <?php
        $array = array();
        $z = array();
        $y = array();
        $i = 0;
        while($row = mysqli_fetch_assoc($result))
        {
            $userresgps = $row['gps'];
            $array[$i] = $userresgps;
            $piece = explode("," , $array[$i]);
            $y[$i] = floatval($piece[0]);
            $z[$i] = floatval($piece[1]);
            $i++;

        }
    ?>

    <form action="insert.php" method="post">
        <input type="text" class="form-control" placeholder=" Location name" name="name">
        <input type="text" class="form-control" placeholder=" Location GPS " name="gps">
        <button name="submit">Submit</button>
        <a href="view.php"> Záznamy </a>
        <div>GPS souřadnice zadejte ve formátu: 14.41, 50.08 </div>

        <div id="mapa" style="width:600px; height:400px;"></div>
	<script type="text/javascript">
		var stred = SMap.Coords.fromWGS84(14.41, 50.08);
		var mapa = new SMap(JAK.gel("mapa"), stred, 10);
		mapa.addDefaultLayer(SMap.DEF_BASE).enable();
        mapa.addDefaultControls();
        var i = 0;
        var p = <?php echo $i ?>;
        for (i = 0; i != p; i++ ){           
            var x = <?php echo json_encode($y); ?>;
            var y = <?php echo json_encode($z); ?>;
            var c = SMap.Coords.fromWGS84(x[i], y[i]);
            var layer = new SMap.Layer.Marker();
            mapa.addLayer(layer);
            layer.enable();

            var options = {};
            var marker = new SMap.Marker(c, "myMarker", options);  
            layer.addMarker(marker);  
        }
	</script>

</body>
</html>