<!DOCTYPE html>
<html>
  <head>
    <title>Earthquake Markers</title>
    <script src="https://polyfill.io/v3/polyfill.min.js?features=default"></script>
    <link rel="stylesheet" type="text/css" href="../css/styles.css" />
    <script src="../js/index.js"></script>
  </head>
  <body>
    <div id="map"></div>

    <!-- Async script executes immediately and must be after any DOM elements used in callback. -->
    <script
      src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCDmORBl-a_pPS52d0644u3_Jg1Pdhy9no&callback=initMap&v=weekly"
      async
    ></script>
    <script type="text/javascript">
        window.onload = IndexLoadCode;
        function IndexLoadCode() {
            api = new Api('localhost','44307','http://','');
            
            api.GetSync('api/Usuario');
        }
    </script>
  </body>
</html>