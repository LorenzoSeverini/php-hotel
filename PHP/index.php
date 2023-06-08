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
    <!-- CSS -->
    <link rel="stylesheet" href="../css/style.css">
    <!-- bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">

</head>

<body>

    <?php

    // hotels array
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
    <main>
        <!-- container -->
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <!-- table -->
                    <table class="table table-striped table-hover border border-danger m-3">
                        <thead>
                            <tr class="table-primary text-center">
                                <th>Name</th>
                                <th>Description</th>
                                <th>Parking</th>
                                <th>Vote from 0 to 5</th>
                                <th>Distance to center</th>
                            </tr>
                        </thead>
                        <tbody class="table-dark">
                            <?php foreach ($hotels as $hotel) { ?>
                                <tr class="text-center">
                                    <td><?php echo $hotel['name']; ?></td>
                                    <td><?php echo $hotel['description']; ?></td>
                                    <td><?php echo $hotel['parking'] ? 'Yes' : 'No'; ?></td>
                                    <td><?php echo $hotel['vote']; ?></td>
                                    <td><?php echo $hotel['distance_to_center']; ?>km</td>
                                </tr>
                            <?php } ?>
                        </tbody>
                    </table>
                </div>
            </div>
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