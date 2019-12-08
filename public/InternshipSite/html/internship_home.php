<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <!-- Bootstrap 4; Sets initial zoom level and sets the width to the screen width of the viewing device -->
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <!-- Latest compiled and minified CSS -->
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
  <!-- jQuery library -->
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <!-- Popper JS -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
  <!-- Latest compiled JavaScript -->
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
  <!-- Imports Google Font Open-Sans -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans&display=swap" rel="stylesheet">
  <!-- General Stylesheet Link -->
  <link rel="stylesheet" type="text/css" href="../css/BootstrapTemplate.css">
  <!-- Internship Website Stylesheet Link -->
  <link rel="stylesheet" type="text/css" href="../css/InternshipStyle.css">
  <!-- Map -->
  <script src="https://api.mqcdn.com/sdk/place-search-js/v1.0.0/place-search.js"></script>
    <link type="text/css" rel="stylesheet" href="https://api.mqcdn.com/sdk/place-search-js/v1.0.0/place-search.css"/>

    <script src="https://api.mqcdn.com/sdk/mapquest-js/v1.3.2/mapquest.js"></script>
    <link type="text/css" rel="stylesheet" href="https://api.mqcdn.com/sdk/mapquest-js/v1.3.2/mapquest.css"/>

    <script type="text/javascript">
      window.onload = function() {
        let ps = placeSearch({
          key: 'lYrP4vF3Uk5zgTiGGuEzQGwGIVDGuy24',
          container: document.querySelector('#search-input'),
          useDeviceLocation: true,
          collection: [
            'poi',
            'airport',
            'address',
            'adminArea',
          ]
        });

        L.mapquest.key = 'lYrP4vF3Uk5zgTiGGuEzQGwGIVDGuy24';

        var map = L.mapquest.map('map', {
          center: [38.3032, -77.4605],
          layers: L.mapquest.tileLayer('map'),
          zoom: 8
        });

        L.mapquest.control().addTo(map);

        let markers = [];

        ps.on('change', (e) => {
          markers
            .forEach(function(marker, markerIndex) {
              if (markerIndex === e.resultIndex) {
                markers = [marker];
                marker.setOpacity(1);
                map.setView(e.result.latlng, 11);
              } else {
                removeMarker(marker);
              }
            });
        });

        ps.on('results', (e) => {
          markers.forEach(removeMarker);
          markers = [];

          if (e.results.length === 0) {
            map.setView(new L.LatLng(0, 0), 2);
            return;
          }

          e.results.forEach(addMarker);
          findBestZoom();
        });

        ps.on('cursorchanged', (e) => {
          markers
            .forEach(function(marker, markerIndex) {
              if (markerIndex === e.resultIndex) {
                marker.setOpacity(1);
                marker.setZIndexOffset(1000);
              } else {
                marker.setZIndexOffset(0);
                marker.setOpacity(0.5);
              }
            });
        });

        ps.on('clear', () => {
          console.log('cleared');
          map.setView(new L.LatLng(0, 0), 2);
          markers.forEach(removeMarker);
        });

        ps.on('error', (e) => {
          console.log(e);
        });

        function addMarker(result) {
          let marker = L.marker(result.latlng, {opacity: .4});
          marker.addTo(map);
          markers.push(marker);
        }

        function removeMarker(marker) {
          map.removeLayer(marker);
        }

        function findBestZoom() {
          let featureGroup = L.featureGroup(markers);
          map.fitBounds(featureGroup.getBounds().pad(0.5), { animate: false });
        }
      }
    </script>

</head>

<body>
<!-- Container for topnav -->
<div class="topnav">
  <a href="http://35.199.20.205/main.php"><img src="../include/images/home.png" width="15" height = "15"><br>Home</a>
  <a href="http://35.199.20.205/index.php"><img src="../include/images/wrench.png" width="15" height = "15"><br>Tools, Tips, and Tricks</a>
  <a href="http://34.74.193.71/html/internship_home.php"><img src="../include/images/briefcase.png" width="15" height = "15"><br>Internships</a>
  <a href="http://35.226.71.244/index.php"><img src="../include/images/flag.png" width="15" height = "15"><br>Capture the Flag</a>
  <a href="http://35.185.94.134"><img src="../include/images/persons.png" width="15" height = "15"><br>Alumni</a>
  <a href="http://35.245.253.27/Home.php"><img src="../include/images/books.png" width="15" height = "15"><br>Research</a>
</div>

<!-- Container for header -->
<div class="container-fluid"> <!-- container-fluid is a full width container. it scales to the screen width -->
    <div class="row header"> <!-- each row can contain up to 12 columns. no matter what, all col must add up to 12 -->
      <div class="col-sm-1">
        <div class="dropdown">
          <button type="button" class="btn" data-toggle="dropdown">
            <img src='../include/images/burger-menu.jpg' class='img-fluid'>
          </button>
          <div class="dropdown-menu">
            <a class="dropdown-item" href="internship_home.php"><h3>Home</h3></a>
            <div class="dropdown-divider"></div>
            <a class="dropdown-item" href="add_review.php"><h3>Submit an Internship Review</h3></a>
            <div class="dropdown-divider"></div>
            <a class="dropdown-item" href="LoginTemplate.php"><h3>Administrator Tools</h3></a>
          </div>
        </div>
    </div> <!-- img-fluid will scaled images to the size of their parent -->
      <div class="col-sm-3"><h1 class="img-fluid">Internships</h1></div>
    </div>
</div>

<div class="jumbotron main"> <!-- jumbotron acts like a big screen, and anything inside of it is fit to its dimensions -->
  <div class="container-fluid"> <!-- normally this would watch screen-width, but since it's in a jumbotron, it only matches jumbotron width -->
    <div><center><h1>UMW Computer Science Internships</h1></center></div>
    
    <!-- Employer Table -->
    <div>
      <table class="table table-white">
        <tr>
          <th scope="col" width="40%">Employer</th>
	  <th scope="col" width="50%">Location</th>
          <th scope="col"></th>
        </tr>
        <!-- Modify to PHP function which prints rows for each employer in database -->
        <?php
          $host = 'localhost';
          $username = 'cpsc';
          $password = '430';
          $dbname = 'internship';

          $conn = new mysqli($host, $username, $password, $dbname);
          if(mysqli_connect_error())
          {
            die('Connect Error (' . mysqli_connect_errorno() . ')' . mysqli_connect_error());
          } 
          else 
          {
            $sql = "SELECT name, location FROM employer";
            $result = mysqli_query($conn, $sql) or die('error getting data');
            while($row = mysqli_fetch_array($result,MYSQLI_ASSOC))
            {
              //$trimmedName = str_replace(' ', '', $row['name']); //used for passing to employer details page
              echo "<tr><td>";
              echo $row['name'];
              echo "</td><td>";
              echo $row['location'];
	      echo "</td><td>
                      <div class=\"dropdown\">
                        <button type=\"button\" class=\"btn\" data-toggle=\"dropdown\">
                          <img src=\"../include/images/arrow.png\" width=\"20\" height=\"20\">
                        </button>
                        <div class=\"dropdown-menu\">
                          <a class=\"dropdown-item\" href=\"employer_details.php?id=".$row['name']."\">View Employer Details</a>
                          <div class=\"dropdown-divider\"></div>
                          <a class=\"dropdown-item\" href=\"add_review.php\">Submit a Review</a>
                        </div>
                      </div>
                    </td>
                  </tr>";
            }
          }
        ?>
        <!-- Test Template Row
        <tr>
          <td>SimVentions</td>
          <td>100 Riverside Pkwy, Fredericksburg, VA</td>
          <td>
            <div class="dropdown">
              <button type="button" class="btn" data-toggle="dropdown">
                <img src='../include/images/arrow.png' width="20" height="20">
              </button>
              <div class="dropdown-menu">
                <a class="dropdown-item" href="employer_details.php">View Employer Details</a>
                <div class="dropdown-divider"></div>
                <a class="dropdown-item" href="add_review.php">Submit a Review</a>
                <div class="dropdown-divider"></div>
                <a class="dropdown-item" onclick="">View on Map</a>
              </div>
            </div>
          </td>
        </tr>
        -->
      </table>
    </div>
    <!-- End of Employer Table -->
    <!-- This line declares the map to be displayed on the page -->
    <div id="map" style="width: 100%; height:530px;"><center></center></div>
    <input type="search" id="search-input" placeholder="Copy and paste employer address here. Then click enter!" />
  </div>
</div>
</body>
</html>
