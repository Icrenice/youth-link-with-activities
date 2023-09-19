<html>
<?php require "src/class.php";
session_start() ?>

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
                        <a class="nav-link active1" href="jongerenlijst.php">Lijst met jongeren</a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link " href="activiteitenlijst.php">Activiteiten lijst</a>
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

                                            <th scope="col">inschrijfdatum</th>

                                            <th scope="col">leeftijd</th>

                                            <th scope="col">activiteit</th>

                                            <th scope="col">afgerond</th>

                                            <th scope="col">Activiteiten datum</th>

                                            <th scope="col">koppel</th>

                                            <th scope="col">rapportage</th>



                                        </tr>

                                    </thead>

                                    <tbody>

                                        <?php

                                        //zet variable $a op 1 (zodat hij later kan optellen)

                                        $a = 1;

                                        //Foreach om door alle rows een loop te doen
                                        $jongeren = new Jongeren;
                                        //Pass POST variable

                                        $jongeren_data = $jongeren->getJongeren();
    
                                        foreach ($jongeren_data as $jonger_data) {
                                        ?>

                                            <tr>

                                                <td class="bold"><?php echo $a ?></td>

                                                <td><?php echo $jonger_data['roepnaam'] . " " . $jonger_data['tussenvoegsel'] . " " . $jonger_data['achternaam']; ?></td>

                                                <td>

                                                    <?php echo $jonger_data['inschrijfdatum']; ?>
                                                </td>
                                                <td>

                                                    <?php echo $jonger_data['leeftijd']; ?>
                                                </td>

                                                <?php
                                                $jActiviteit = new Jongerenactiviteit;
                                                $jongerid = $jonger_data['jongerencode'];
                                                $jactiviteiten_data = $jActiviteit->getJongerenActiviteiten($jongerid);
                                                foreach ($jactiviteiten_data as $jactiviteit_data) {
                                                    // print_r($jactiviteit_data);
                                                }

                                                ?>
                                                <td>
                                                    <?php
                                                    if (!empty($jactiviteit_data['actiecode'])) {
                                                        echo "(" . $jactiviteit_data['actiecode'] . ")" . " ";
                                                    }
                                                    ?>
                                                </td>
                                                <td>
                                                    <?php
                                                    if (!empty($jactiviteit_data['afgerond'])) {
                                                        echo "(" . $jactiviteit_data['afgerond'] . ")" . " ";
                                                    }
                                                    ?>
                                                </td>
                                                <td>
                                                    <?php
                                                    if (!empty($jactiviteit_data['startdatum'])) {
                                                        echo "(" . $jactiviteit_data['startdatum'] . ")" . " ";
                                                    }
                                                    ?>
                                                </td>

                                                <td>

                                                    <form method="get" action="jongeren-koppelen.php">

                                                        <input type="hidden" name="jongerencode" value="<?php echo $jonger_data['jongerencode'] ?>">



                                                        <button class="btn btn-primary nav-kleur">koppel</button>

                                                    </form>

                                                </td>

                                                <td>

                                                    <form method="get" action="#">

                                                        <input type="hidden" name="jongerencode" value="<?php echo $jongerid;
                                                                                                        ?>">


                                                        <button class="btn btn-primary nav-kleur">Bekijk</button>

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
                    <div class="row">

                        <div class="col">

                            <table class="table">

                                <table class="table">

                                    <thead>

                                        <tr>

                                            <th scope="col">#</th>

                                            <th scope="col">naam</th>

                                            <th scope="col">inschrijfdatum</th>

                                            <th scope="col">leeftijd</th>

                                            <th scope="col">activiteit</th>

                                            <th scope="col">afgerond</th>

                                            <th scope="col">Activiteiten datum</th>

                                            <th scope="col">koppel</th>

                                            <th scope="col">rapportage</th>



                                        </tr>

                                    </thead>

                                    <tbody>

                                        <?php

                                        //zet variable $a op 1 (zodat hij later kan optellen)

                                       
                                        if($jonger_data['minderjarig'] = "ja"){
                                        ?>

                                            <tr>
                                            
                                                <td class="bold"><?php echo $a ?></td>

                                                <td><?php echo $jonger_data['roepnaam'] . " " . $jonger_data['tussenvoegsel'] . " " . $jonger_data['achternaam']; ?></td>

                                                <td>

                                                    <?php echo $jonger_data['inschrijfdatum']; ?>
                                                </td>
                                                <td>

                                                    <?php echo $jonger_data['leeftijd']; ?>
                                                </td>

                                                <?php
                                                $jActiviteit = new Jongerenactiviteit;
                                                $jongerid = $jonger_data['jongerencode'];
                                                $jactiviteiten_data = $jActiviteit->getJongerenActiviteiten($jongerid);
                                                foreach ($jactiviteiten_data as $jactiviteit_data) {
                                                    // print_r($jactiviteit_data);
                                                }

                                                ?>
                                                <td>
                                                    <?php
                                                    if (!empty($jactiviteit_data['actiecode'])) {
                                                        echo "(" . $jactiviteit_data['actiecode'] . ")" . " ";
                                                    }
                                                    ?>
                                                </td>
                                                <td>
                                                    <?php
                                                    if (!empty($jactiviteit_data['afgerond'])) {
                                                        echo "(" . $jactiviteit_data['afgerond'] . ")" . " ";
                                                    }
                                                    ?>
                                                </td>
                                                <td>
                                                    <?php
                                                    if (!empty($jactiviteit_data['startdatum'])) {
                                                        echo "(" . $jactiviteit_data['startdatum'] . ")" . " ";
                                                    }
                                                    ?>
                                                </td>

                                                <td>

                                                    <form method="get" action="jongeren-koppelen.php">

                                                        <input type="hidden" name="jongerencode" value="<?php echo $jonger_data['jongerencode'] ?>">



                                                        <button class="btn btn-primary nav-kleur">koppel</button>

                                                    </form>

                                                </td>

                                                <td>

                                                    <form method="get" action="#">

                                                        <input type="hidden" name="jongerencode" value="<?php echo $jongerid;
                                                                                                        ?>">


                                                        <button class="btn btn-primary nav-kleur">Bekijk</button>

                                                    </form>

                                                </td>





                                            </tr>

                                        <?php

                                             ;
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