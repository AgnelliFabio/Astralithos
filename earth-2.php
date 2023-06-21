<?php 
    include_once('connect.php'); 
	?>
    
<!DOCTYPE html>
<html>
<head>
    <title>Cesium Map</title>

    <style>
#cesiumContainer {
  width: 100%;
  height: 100vh;
  display: flex;
  justify-content: center;
  align-items: center;
}

#cesiumContainer canvas {
  height: 800px;
  width: 1000px;
  border-radius: 50px;
}

    #cesiumContainer canvas{
        height: 100%px;
    }
    #cesiumContainer .cesium-viewer-selectionIndicatorContainer{
        display: none;
    }
    #cesiumContainer .cesium-viewer-bottom{
        display: none;
    }
    #cesiumContainer .cesium-viewer-infoBoxContainer{
        display: none;
    }
    #cesiumContainer .cesium-viewer-toolbar{
        display: none;
    }
    #cesiumContainer .cesium-button{
        display: none;
    }

</style>
    
</head>
<body>

<br><br>
<div id="cesiumContainer"></div>
<br><br><br>




    <script src="https://cesium.com/downloads/cesiumjs/releases/1.84/Build/Cesium/Cesium.js"></script>
    <script>
        // Set your Cesium ion access token here
        Cesium.Ion.defaultAccessToken = 'eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCJ9.eyJqdGkiOiI0YTc5MWU1Zi1kMmQ0LTRmNTMtOGQ4MS0xOWIzZjVhYjhmOGUiLCJpZCI6MTQ4MDI3LCJpYXQiOjE2ODcyNDc3ODR9.qTEg_eM3zVfQ3qdEDmeUUoKVnSH8j_iBzyqjvTPFjhc';

        // Create a Cesium viewer
        var viewer = new Cesium.Viewer('cesiumContainer', {
            shouldAnimate: true,
            animation: false,
            timeline: false,
        });

        // Function to add a point at a given latitude and longitude
        function addPoint(latitude, longitude, type, size) {
            
            viewer.entities.add({
            position: Cesium.Cartesian3.fromDegrees(longitude, latitude),
                billboard: {
                    image: type,
                    scale: size,
                    // color: Cesium.Color.RED
                }
            });

        }


        </script>








        <?php

             global $servername,$username,$pwdBDD,$dbname;
			$conn = mysqli_connect($servername, $username, $pwdBDD, $dbname) or die(mysqli_error($conn));

            $requete = "SELECT * FROM earth";
            $resultat = mysqli_query($conn, $requete);
            if (!$resultat) {
                die("Erreur lors de l'exécution de la requête: " . mysqli_error($conn));
            }
            while ($row = mysqli_fetch_assoc($resultat)) {
                if ($row['impact_magnitude'] >1){
                echo"<script>addPoint($row[location_latitude], $row[location_longitude], 'assets/img/meteorite.png', 0.1);</script>";
                }

            else{
                echo"<script>addPoint($row[location_latitude], $row[location_longitude], 'assets/ico2.png', 0.02);</script>";

                }
            }

        ?>
    <script>
        viewer.zoomTo(viewer.entities);
    </script>
    
</body>
</html>