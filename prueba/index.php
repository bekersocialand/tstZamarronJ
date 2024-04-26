<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Viajes al Espacio</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<link rel="stylesheet" href="style.css">
<!-- Navbar -->
<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
  <div class="container">
    <button class="navbar-toggler "  type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
      <ul class="navbar-nav ms-auto">
      <li class="nav-item">
          <a class="nav-link" href="#">00 HOME</a>
        <li class="nav-item">
          <a class="nav-link" href="#">01 DESTINATION</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">02 CREW</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">03 TECHNOLOGY</a>
        </li>

        </li>
      </ul>
    </div>
  </div>
</nav>
<nav class="navbar navbar-expand-lg ">
  <div class="container">
    <button class="navbar-toggler "  type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
      <ul class="navbar-nav ms-auto">
      <li class="nav-item">
          <a class="nav-link" href="#">MOON</a>
        <li class="nav-item">
          <a class="nav-link" href="#">MARS</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">EUROPA</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">TITAN</a>
        </li>

        </li>
      </ul>
    </div>
  </div>
</nav>
<! -- -------------LEER JSON --> 
<?php

$json_file = 'data.json';


if (file_exists($json_file)) {

    $json_data = file_get_contents($json_file);


    $data = json_decode($json_data, true);


    if ($data === null) {
        echo "Error al decodificar el archivo JSON.";
    } else {
        $destinations_array = [];


        foreach ($data['destinations'] as $destination) {
            $destination_info = [
                'name' => $destination['name'],
                'images' => $destination['images'],
                'description' => $destination['description'],
                'distance' => $destination['distance'],
                'travel' => $destination['travel']
            ];
            $destinations_array[] = $destination_info;
        }


        $first_destination = reset($destinations_array); 
        echo "<h2>{$first_destination['name']}</h2>";
        echo "<img src='{$first_destination['images']['png']}' alt='{$first_destination['name']}'>";
        echo "<p>{$first_destination['description']}</p>";
        echo "<p><strong>AVG. DISTANCE </strong> {$first_destination['distance']}</p>";
        echo "<p><strong>Travel Time:</strong> {$first_destination['travel']}</p>";

    }
} else {
    // Si el archivo no existe, muestra un mensaje de error
    echo "El archivo JSON no existe.";
}
?>



<!-- Content -->
<!-- Bootstrap Bundle with Popper -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
