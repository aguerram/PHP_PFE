
  <!DOCTYPE html>
<html>
  <head>
   
    <meta charset="utf-8">
    <title>Complex Marker Icons</title>
    <style>
      /* id map. */
      #map {
        height:100% ;
		width:60%;
		//margin_left: 400px;
		float:right;
		border:1px, solid, red;
		display:inline_block;
      }
	   #inf {
        height:100% ;
		width:40%;
		float:left;
		border:3px, solid, red;
		display:inline_block;
      }
      /* Optional: Makes the sample page fill the window. */
      html, body {
        height: 100%;
        margin: 0;
        padding: 10;
      }
    </style>
	
	
  </head>
  <body>
 
  <?php
$d=0;
//echo 'ok-------------><br>';
try{
$c=new PDO("mysql:host=localhost;dbname=bd_pfe",'root','');
$c->exec("set character set utf8");
	$i=0;
	//echo "<br>les donnees de la table article de la base mysql<br>";

	foreach ($c->query("select * from article") as $t){

	$article[$i][0]=$t[0];//id
	$article[$i][1]=$t[3];//titre
  $article[$i][5]=$t[8];//titre
	$article[$i][2]=$t[11];//type
	$article[$i][3]=$t[9];//X
	$article[$i][4]=$t[10];//Y
	$i++;
 
	  
	  }
	  $d=$i;
	$c=null;
	}
catch (PDOException $e){
	echo "<br>pas de conn".$e->getMessage();
	die();
}



//save data in xml file
$fp=fopen('xm.xml','w+');
fputs($fp,"<?xml version='1.0' encoding='UTF-8' ?>\n");

fputs($fp, "<markers>\n");

for ($i=0;$i<$d; $i++){
	fputs($fp,"<marker CORDGEOX='".$article[$i][3]."' CORDGEOY='".$article[$i][4]."'  titre='".$article[$i][1]."' address='".$article[$i][2]."' historique='".$article[$i][5]."'/>\n");

}
fputs($fp,"</markers>");
fclose($fp);

//fin de sauvegarde
	  
	  ?>
  
    <div id="map">

    <script>
      

        function initMap() {
        var map = new google.maps.Map(document.getElementById('map'), {
          center: new google.maps.LatLng(31.45, -9.7302),
          zoom: 9
        });
        var infoWindow = new google.maps.InfoWindow;

          // Change this depending on the name of your PHP or XML file
          downloadUrl('xm.xml', function(data) {
            var xml = data.responseXML;
            var markers = xml.documentElement.getElementsByTagName('marker');
            Array.prototype.forEach.call(markers, function(markerElem) {
              //var id = markerElem.getAttribute('ID_ARTICLE');
              var name_e = markerElem.getAttribute('titre');
              var address = markerElem.getAttribute('address');
              var historique = markerElem.getAttribute('historique');
              var point = new google.maps.LatLng(
                  parseFloat(markerElem.getAttribute('CORDGEOX')),
                  parseFloat(markerElem.getAttribute('CORDGEOY')));

              var infowincontent = document.createElement('div');
              var strong = document.createElement('strong');
              strong.textContent = name_e
              infowincontent.appendChild(strong);
              infowincontent.appendChild(document.createElement('br'));

              
			  
			  var image = {
          url: address,
          // This marker is 20 pixels wide by 32 pixels high.
          scaledSize: new google.maps.Size(40,40, 'px','px'),
          // The origin for this image is (0, 0).
          origin: new google.maps.Point(0, 0),
          // The anchor for this image is the base of the flagpole at (0, 32).
          anchor: new google.maps.Point(0, 32)
        };
			  alert(address);
			  
              var marker = new google.maps.Marker({
                map: map,
                position: point,
                icon:image
            
              });
              marker.addListener('click', function() {
                infoWindow.setContent(infowincontent);
                infoWindow.open(map, marker);

							document.getElementById("inf").innerHTML = "<center><h4>"+name_e+"</h4><br><img src="+address+" > </center><br> "+historique+"<br>";
              });
            });
          });
        }



      function downloadUrl(url, callback) {
        var request = window.ActiveXObject ?
            new ActiveXObject('Microsoft.XMLHTTP') :
            new XMLHttpRequest;

        request.onreadystatechange = function() {
          if (request.readyState == 4) {
            request.onreadystatechange = doNothing;
            callback(request, request.status);
          }
        };

        request.open('GET', url, true);
        request.send(null);
      }

      function doNothing() {}
    </script>
    <script async defer
    src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBF7olYBTz7Z4Pf7iMV_vKn0_iqVgIdVbo&callback=initMap">
    </script>
	</div>
	<div id='inf'><br>
	<center><img src='433.jpg' width="100px" height="100px"></center><br>

	</div>
  </body>
</html>