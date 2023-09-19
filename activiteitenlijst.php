<html>
<?php require "src/class.php"; ?>

<head>
    <meta content="text/html" charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Jeugd Betrokkenen</title>
    <link href="css/bootstrap.min.css" rel="stylesheet" media="screen">
    <link href="css/bootstrap.css" rel="stylesheet" media="screen">
    <script src="js/jquery-3.4.1.min.js"></script>
    <script src="js/bootstrap.bundle.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="css/style.css" type="text/css" />
</head>

<body>
    <nav class="navbar navbar-expand-lg nav-kleur">
        <a class="navbar-brand" href="index.php">
            <img src="image/logo.png" width="100" height="100" alt="">
        </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNavDropdown">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" href="menu.php">Menu</a>
                </li>
            </ul>
            <ul class="navbar-nav ml-auto">

                <li class="nav-item">
                    <a class="nav-link" href="jongeren-toevoegen.php"><img src="image/person.png">voeg jongeren toe</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="jongerenlijst.php"><img src="image/beoordeling.png">koppel activiteit aan jongeren</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="jongerenlijst.php"><img src="image/contact.png">rapportage</a>
                </li>

            </ul>
        </div>
    </nav>
    <div class="container-fluid">
        <div class="row content">
            <div class="col-sm-3 col-sm-3-1">
                <ul class="nav nav-pulls flex-column">
                    <li class="nav-item">
                        <a class="nav-link " href="jongeren-toevoegen.php">Jongeren toevoegen</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link " href="jongerenlijst.php">Lijst met jongeren</a>
                    </li>
                    
                    <li class="nav-item">
                        <a class="nav-link active1" href="activiteitenlijst.php">Activiteiten lijst</a>
                    </li>
                    

                </ul>
                <hr class="d-sm-none">
            </div>
            <div class="col-sm-9 text-left">
                <h1>Lijst met jongeren</h1>
                <hr>

                <div class="container">

                    <a href="jongeren-toevoegen.php"><button type="button" class="btn btn-kleur">Voeg jongeren toe</button></a>

                    <br><br>

                    <div class="row">

                        <div class="col">

                            <table class="table">

                                <table class="table">

                                    <thead>

                                        <tr>

                                            <th scope="col">#</th>

                                            <th scope="col">naam</th>

                                            <th scope="col">Bewerk Gegevens</th>

                                            <th scope="col">Verwijderen</th>

                                        </tr>

                                    </thead>

                                    <tbody>

                                        <?php
                                        $activiteiten = new Activiteiten;

                                        $activiteiten_data = $activiteiten->getActiviteiten();
                                        $a = 1;
                                        foreach ($activiteiten_data as $activiteit_data) {

                                        ?>

                                            <tr>

                                                <td class="bold"><?php echo $a ?></td>

                                                <td><?php echo $activiteit_data['activiteit']; ?></td>

                                                

                                            

                                                <td>

                                                    <form method="get" action="#">

                                                        <input type="hidden" name="actiecode" value="<?php echo $activiteit_data['actiecode'];
                                                                                                        ?>">


                                                        <button class="btn btn-primary nav-kleur">Bewerk</button>

                                                    </form>

                                                </td>

                                                <td>

                                                    <form method="post" action="#">

                                                    <input type="hidden" name="actiecode" value="<?php echo $activiteit_data['actiecode'];
                                                                                                        ?>">

                                                        <button class="btn btn-danger" onclick="return confirm('Weet u het zeker?')">Verwijder</button>

                                                    </form>

                                                </td>



                                            </tr>

                                        <?php

                                            $a++;
                                        }

                                        ?>

                                    </tbody>
                                </table>

                            </table>

                        </div>

                    </div>
                </div>


            </div>
        </div>
    </div>
    <!-- Footer -->
    <footer class="page-footer font-small teal pt-4 nav-kleur">

        <!-- Footer Text -->
        <div class="container-fluid text-center text-md-left">

            <!-- Grid row -->
            <div class="row">
                <!-- Grid column -->

                <hr class="clearfix w-100 d-md-none pb-3">

                <!-- Grid column -->
                <div class="col-md-12 mb-md-0 mb-3">

                    <!-- Content -->
                    <h5 class="text-uppercase font-weight-bold">Contact klachten</h5>
                    <p>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Optio deserunt fuga perferendis modi
                        earum
                        commodi aperiam temporibus quod nulla nesciunt aliquid debitis ullam omnis quos ipsam,
                        aspernatur id
                        excepturi hic. Lorem ipsum dolor sit, amet consectetur adipisicing elit. Provident itaque, ipsa
                        perferendis dolorem esse aliquid placeat iure voluptatum quia, deleniti tempore velit asperiores
                        sit saepe officiis necessitatibus, voluptate reprehenderit aspernatur.<br><a href="contact.php">klachtenformulier hier</a></p>

                </div>
                <!-- Grid column -->

            </div>
            <!-- Grid row -->

        </div>
        <!-- Footer Text -->

        <!-- Copyright -->
        <div class="footer-copyright text-center py-3">© 2020 Copyright:
            <a href="#">Jeugd Betrokkenen</a>
        </div>
        <!-- Copyright -->

    </footer>
    <!-- Footer -->
</body>

</html>