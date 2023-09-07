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

    <form action="" method="get" class="w-25 p-3">
        <div>
            <label for="parking" class="form-label">Filtra per parcheggio:</label>
            <select class="form-select" id="parking" name="parking">
                <option value="" selected>Scegli</option>
                <option value="true">Si</option>
                <option value="false">No</option>
            </select>

        </div>
        <div>
            <label for="voto" class="form-label">Filtra per voto</label>
            <input type="number" class="form-control" id="voto" name="voto" min="1" max="5">
        </div>
        <button type="submit" class="btn btn-primary mt-3">Filtra</button>
    </form>

    <table class="table mt-5">
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
            if (isset($_GET["parking"]) && isset($_GET["voto"])) {
                $isParking = $_GET["parking"];
                $vote = intval($_GET["voto"]);
                var_dump($vote);
                //se è stata scelto di filtrare per parcheggio o per voto
                if ($isParking === "true" || $vote > 0) {
                    foreach ($hotels as $hotel) { ?><?php
                                                    if (($hotel["parking"] && $isParking === "true") || ($vote > 0 && $hotel["vote"] >= $vote)) { ?>
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
            </tr> <?php
                                                    }
                                                }
                    ?>
    <?php
                } elseif ($isParking === "true" && $vote > 0) {
                    foreach ($hotels as $hotel) { ?><?php
                        if (($hotel["parking"] && $isParking === "true")  && (($vote > 0) && ($hotel["vote"] >= $vote))) { ?>
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
</tr><?php
                }}}
                else {
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
                }
                //come apro la pagina nessuna ricerca è stata effettuata e quindi mostro tutto
            } else {
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
            }
?>

        </tbody>
    </table>
</body>

</html>