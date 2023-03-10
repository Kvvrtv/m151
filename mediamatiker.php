<!DOCTYPE html>
<html>
    <style>

    </style>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="bulma-0.8.0\css\bulma.min.css">
        <link rel="stylesheet" href="bulma-0.8.0\css\bulma.css">
    </head>
    <body>
        <?php
        //database
        $servername = "127.0.0.1";
        $username = "root";
        $password = "";
        $dbname = "m151";

        // Create connection
        $conn = new mysqli($servername, $username, $password, $dbname);
        // Check connection
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        } ?>
        <!-- START NAV -->
        <nav class="navbar is-white">
            <div class="container">
                <div class="navbar-brand">
                    <a class="navbar-item brand-text" href="privat.php">
                        IBV
                    </a>
                    <div class="navbar-burger burger" data-target="navMenu">
                        <span></span>
                        <span></span>
                        <span></span>
                    </div>
                </div>
                <div id="navMenu" class="navbar-menu">
                    <div class="navbar-start">
                        <a class="navbar-item" href="privat.php">
                            Alle
                        </a>
                        <a class="navbar-item" href="infomatikerAppi.php">
                            Infomatiker Appi
                        </a>
                        <a class="navbar-item" href="mediamatiker.php" style="color:blue;">
                            Mediamatiker
                        </a>
                    </div>
                </div>
            </div>
        </nav>
        <!-- END NAV -->
        <div class="container">
            <div class="column is-9">
                <section class="hero is-info welcome is-small">
                    <div class="hero-body">
                        <div class="container">
                            <h1 class="title">
                                Hallo, Admin.
                            </h1>
                            <h2 class="subtitle">
                                I hope you are having a great day!
                            </h2>
                        </div>
                    </div>
                </section>
                <?php
                //das muss noch korriegiert werden
                $sqlfreiZwei = $conn->prepare("SELECT freiePlaetze, MaxPlaetze FROM event WHERE IDEvent = ?");
                $sqlfreiZwei->bind_param("i", $idEvent);
                $sqlfreiZwei->execute();
                $resZwei = $sqlfreiZwei->get_result();
                $rowZwei = $resZwei->fetch_assoc();
                $sqlfreiZwei->close();

                $teilnehmer = $rowZwei['MaxPlaetze'] - $rowZwei['freiePlaetze'];
                ?>
                <section class="info-tiles">
                    <div class="tile is-ancestor has-text-centered">
                        <div class="tile is-parent">
                            <article class="tile is-child box">
                                <p class="title">439k</p>
                                <p class="subtitle">Events die noch kommen </p>
                            </article>
                        </div>
                        <div class="tile is-parent">
                            <article class="tile is-child box">
                                <p class="title">59k</p>
                                <p class="subtitle">fertige Events</p>
                            </article>
                        </div>
                        <div class="tile is-parent">
                            <article class="tile is-child box">
                                <p class="title">3.4k</p>
                                <p class="subtitle">insgesamt Events</p>
                            </article>
                        </div>
                    </div>
                </section>
                <div class="columns">
                    <div class="column is-12">
                        <div class="card events-card">
                            <header class="card-header">
                                <p class="card-header-title">
                                    Events
                                </p>
                                <a href="#" class="card-header-icon" aria-label="more options">
                                    <span class="icon">
                                        <i class="fa fa-angle-down" aria-hidden="true"></i>
                                    </span>
                                </a>
                            </header>
                            <div class="card-table">
                                <div class="content">
                                    <table class="table is-fullwidth is-striped">
                                        <tbody>
                                            <?php
                                            // connection database
                                            $sql = "SELECT * FROM event WHERE Beruf = 'Mediamatiker EFZ'";
                                            $result = $conn->query($sql);
                                            if ($result->num_rows > 0) {
                                                // output data of each row
                                                echo "<tr>";
                                                while($row = $result->fetch_assoc()) {
                                                    echo "
                                                                    <td width=\"5%\"><i class=\"fa fa-bell-o\"></i></td>
                                                                    <td>" . $row['Beruf'] . "</td>
                                                                    <td>" . $row['Datum'] . "</td>
                                                                    <td><a href='http://localhost/Worker/details.php?idEvent=" . $row['IDEvent'] . "'>
                                                                        <input class='button is-link' type='submit' value='Details' /></a></td>";
                                                    echo "</tr>";
                                                }
                                                $conn = null;
                                            }
                                            ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <footer class="footer">
            <div class="content has-text-centered">
                <p>
                    <strong><a href="https://www.ibv.com">IBV</a></strong> Modul 151
                </p>
            </div>
        </footer>
    </body>
</html>