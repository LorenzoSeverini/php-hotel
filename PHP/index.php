<?php

// hotels array
$hotels = [

    [
        'name' => 'Hotel Belvedere',
        'description' => 'Hotel Belvedere Descrizione',
        'parking' => true,
        'vote' => 4,
        'distance to center' => 10.4
    ],
    [
        'name' => 'Hotel Futuro',
        'description' => 'Hotel Futuro Descrizione',
        'parking' => true,
        'vote' => 2,
        'distance to center' => 2
    ],
    [
        'name' => 'Hotel Rivamare',
        'description' => 'Hotel Rivamare Descrizione',
        'parking' => false,
        'vote' => 1,
        'distance to center' => 1
    ],
    [
        'name' => 'Hotel Bellavista',
        'description' => 'Hotel Bellavista Descrizione',
        'parking' => false,
        'vote' => 5,
        'distance to center' => 5.5
    ],
    [
        'name' => 'Hotel Milano',
        'description' => 'Hotel Milano Descrizione',
        'parking' => true,
        'vote' => 2,
        'distance to center' => 50
    ],

];

// filter the hotels
$filteredHotels = [];

// determinate parking icon and vote stars 
foreach ($hotels as $key => $hotel) {

    // determinate parking icon
    if ($hotel['parking'] == true) {
        $hotels[$key]['parking'] = '<i class="fas fa-parking"></i>';
    } else {
        $hotels[$key]['parking'] = '<i class="fas fa-times"></i>';
    }

    // determinate vote stars
    $vote = $hotel['vote'];
    $stars = '';
    for ($i = 0; $i < 5; $i++) {
        if ($i < $vote) {
            $stars .= '<i class="fas fa-star"></i>';
        } else {
            $stars .= '<i class="far fa-star"></i>';
        }
    }
    $hotels[$key]['vote'] = $stars;

    // determinate distance to center
    $distance = $hotel['distance to center'];
    if ($distance < 5) {
        $hotels[$key]['distance to center'] = '<i class="fas fa-walking"></i> <div class="d-inline-block">' . $distance . ' km</div>';
    } elseif ($distance < 20) {
        $hotels[$key]['distance to center'] = '<i class="fas fa-bicycle"></i> <div class="d-inline-block">' . $distance . ' km</div>';
    } else {
        $hotels[$key]['distance to center'] = '<i class="fas fa-car"></i> <div class="d-inline-block">' . $distance . ' km</div>';
    }
}


// filter by parking
if (!empty($_GET['parking'])) {
    $parking = $_GET['parking'];
    if ($parking == 'true') {
        foreach ($hotels as $hotel) {
            if ($hotel['parking'] == '<i class="fas fa-parking"></i>') {
                $filteredHotels[] = $hotel;
            }
        }
    } else {
        $filteredHotels = $hotels;
    }
} else {
    $filteredHotels = $hotels;
}

// filter by vote show all or only the selected vote 
if (!empty($_GET['vote'])) {
    $vote = $_GET['vote'];
    if ($vote == 'all') {
        $filteredHotels = $filteredHotels;
    } else {
        foreach ($filteredHotels as $hotel) {
            if ($hotel['vote'] == $vote) {
                $filteredHotels = [$hotel];
            }
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>php-hotel</title>
    <!-- font -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto&display=swap" rel="stylesheet">
    <!-- bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <!-- CSS -->
    <link rel="stylesheet" href="../css/style.css">
    <!-- fontawesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />

</head>

<body>

    <!-- header -->
    <header class="bg-dark">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <h1 class="text-white text-center">Hotels</h1>
                </div>
            </div>
        </div>
    </header>

    <!-- main -->
    <main class="bg-danger">
        <!-- form -->
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <!-- form for filtered the hotels -->
                    <form action="./index.php" method="GET" class="d-flex gap-3">
                        <!-- select for parking  -->
                        <div class="m-3">
                            <label for="parking">Parking</label>
                            <select name="parking" id="parking" class="m-3">
                                <option value="all">All</option>
                                <option value="true">Parking</option>
                            </select>
                        </div>
                        <!-- select for vote all or 3 stars and more -->
                        <div class="m-3">
                            <label for="vote">Vote</label>
                            <select name="vote" id="vote" class="m-3">
                                <option value="all">All</option>
                                <option value="3+">3 stars and more</option>
                            </select>
                        </div>
                        <!-- button for search hotel -->
                        <button class="btn btn-success m-3" type="submit">Search</button>
                    </form>
                </div>
            </div>
        </div>

        <!-- show the hotel filtered in table -->
        <div class="container">
            <!-- table -->
            <table class="table table-striped table-hover m-3">
                <!-- thead -->
                <thead class="table-warning">
                    <tr>
                        <?php foreach ($hotels[0] as $key => $value) { ?>
                            <th><?php echo $key ?></th>
                        <?php } ?>
                    </tr>
                </thead>
                <!-- tbody -->
                <tbody class="table-dark">
                    <?php foreach ($filteredHotels as $hotel) { ?>
                        <tr>
                            <?php foreach ($hotel as $key => $value) { ?>
                                <td><?php echo $value ?></td>
                            <?php } ?>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>

    </main>

    <!-- footer -->
    <footer class="bg-dark">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <p class="text-white text-center p-2 m-0">Footer</p>
                </div>
            </div>
        </div>
    </footer>

    <!-- script -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.min.js" integrity="sha384-cuYeSxntonz0PPNlHhBs68uyIAVpIIOZZ5JqeqvYYIcEL727kskC66kF92t6Xl2V" crossorigin="anonymous"></script>
</body>

</html>