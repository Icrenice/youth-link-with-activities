<html>
<?php session_start();?>
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
                        <a class="nav-link active1" href="jongeren-toevoegen.php">Jongeren toevoegen</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link " href="jongerenlijst.php">Lijst met jongeren</a>
                    </li>
                    
                    <li class="nav-item">
                        <a class="nav-link " href="activiteitenlijst.php">Activiteiten lijst</a>
                    </li>
                    

                </ul>
                <hr class="d-sm-none">
            </div>
            <div class="col-sm-9 text-left">

                <form class="form-login" method="post" id="login-form" action="forms/jongeren-toevoegen-form.php">

                    <h2 class="form-login-hoofdtekst">Registreer jongeren</h2>
                    <hr />

                    <div class="form-group">
                        <input type="text" class="form-control" name="roepnaam" placeholder="Roepnaam">

                    </div>
                    <div class="form-group">
                        <input type="text" class="form-control" name="tussenvoegsel" placeholder="Tussenvoegsel">

                    </div>

                    <div class="form-group">
                        <input type="text" class="form-control" name="achternaam" placeholder="Achternaam">

                    </div>

                    <div class="form-group">
                    <label> inschrijfdatum</label>
                        <input type="date" class="form-control" name="inschrijfdatum" placeholder="inschrijfdatum">

                    </div>
    
                    <div class="form-group">
                        <label> geboortedatum</label>
                        <input type="date" class="form-control" name="geboortedatum" placeholder="geboortedatum">

                    </div>

                    <hr />
                    <div class="flex">
                        <button type="submit" name="submit" class="btn btn-outline-primary">Registreer</button>
                    
                    </div>
                    <?php

                if (isset($_SESSION['ERRORS'])) {
                    echo $_SESSION['ERRORS'];
                    unset($_SESSION['ERRORS']);
                }
                ?>
                </form>
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