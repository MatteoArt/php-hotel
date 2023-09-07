<?php

$hotels = [

    [
        'name' => 'Hotel Belvedere',
        'description' => 'Hotel Belvedere Descrizione',
        'parking' => true,
        'vote' => 4,
        'distance_to_center' => 10.4
    ],
    [
        'name' => 'Hotel Futuro',
        'description' => 'Hotel Futuro Descrizione',
        'parking' => true,
        'vote' => 2,
        'distance_to_center' => 2
    ],
    [
        'name' => 'Hotel Rivamare',
        'description' => 'Hotel Rivamare Descrizione',
        'parking' => false,
        'vote' => 1,
        'distance_to_center' => 1
    ],
    [
        'name' => 'Hotel Bellavista',
        'description' => 'Hotel Bellavista Descrizione',
        'parking' => false,
        'vote' => 5,
        'distance_to_center' => 5.5
    ],
    [
        'name' => 'Hotel Milano',
        'description' => 'Hotel Milano Descrizione',
        'parking' => true,
        'vote' => 2,
        'distance_to_center' => 50
    ],

];

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PHP Hotel</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
</head>

<body>
    <h1 class="text-center">Php Hotel</h1>

    <table class="table">
        <thead>
            <tr>
                <?php 
                foreach ($hotels[0] as $key => $dato) {
                    echo "<th scope='col'>$key</th>";
                }                
                ?>
            </tr>
        </thead>
        <tbody>
            <?php 
            foreach ($hotels as $hotel) { ?>
            <tr>
                <?php 
                foreach ($hotel as $key => $dato) {
                    if ($key === "parking") {
                        if ($dato) {
                            echo "<td>Si</td>";
                        } else {
                            echo "<td>No</td>";
                        }
                    } else {
                        echo "<td>$dato</td>";
                    }
                }
                ?>
            </tr>
            <?php 
            }
            ?>
        </tbody>
    </table>
</body>

</html>