<?php include("config.php"); ?>
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>spordipäev 2025</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.5/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-SgOJa3DmI69IUzQ2PVdRZhwQ+dy64/BUtbMJw1MZ8t5HZApcHrRKUc4W0kG879m7" crossorigin="anonymous">
  </head>
  <body>
    <div class="container">
        <h1>HKHK spordipäev 2025</h1>

        <form action="index.php" method="get" class="py-4">
            Nimi: <input type="text" name="fullname" require><br>
            E-mail: <input type="email" name="email"><br>
            Vanus: <input type="number" name="age" min="16" max="88" step="1"><br>
            sugu: <input type="text" name="gender" limit= "5"><br>
            spordiala: <input type="text" name="category" limit="20"><br>
            <input type="submit" value="salvesta" class="btn btn-primary"><br>
             
        </form>

        <?php
             if (isset($_GET["fullname"]) && !empty($_GET["fullname"])) {
                $lisa_paring = "INSERT INTO spot2025 (fullname, email, age, gender, category)
                VALUES ('mattias elmers', 'mattias.elmers@gmail.com', '18', 'mees', 'jalgpall')";
                $saada_paring = mysqli_query($yhendus, $lisa_paring);

                $tulemus = mysqli_affected_rows($yhendus);
                if ($tulemus > 0) {
                    echo "<div class='alert alert-success'>Andmed on salvestatud!</div>";
                } else {
                    echo "<div class='alert alert-danger'>Andmete salvestamine nurjus!</div>";
                }

             }
        ?>


        <form action="index.php" method="get" class="py-4">
            <input type="text" name="otsi" >
            <select name="cat">
                <option value="fullname">Nimi</option>
                <option value="category">spordiala</option>
            </select>
            <input type="submit" value="otsi...=">
        </form>

        <table class="table table-striped">
    <tr>
        <td>id</td>
        <td>fullname</td>
        <td>email</td>
        <td>age</td>
        <td>gender</td>
        <td>category</td>
        <td>reg_time</td>
        <td>muuda</td>
        <td>kustuta</td>
    </tr>
        <?php
            if (isset($_GET["otsi"]) && !empty($_GET["otsi"])){
                $s = $_GET["otsi"];
                echo "Otsing: " .$s;
                $cat = $_GET["cat"];

                $paring = 'SELECT * FROM spot2025 WHERE '.$cat.' LIKE "%' .$s. '%"';
            }else{
                $paring = "SELECT * FROM spot2025 LIMIT 50";
            }
        

            // $paring = "SELECT * FROM spot2025 LIMIT 50";
            $saada_paring = mysqli_query($yhendus, $paring);
            // võtab kõik read
            while($rida = mysqli_fetch_assoc($saada_paring)){
                // print_r($rida);
            
            echo "<tr>";
            echo "<td>".$rida['id']."</td>";
            echo "<td>".$rida['fullname']."</td>";
            echo "<td>".$rida['email']."</td>";
            echo "<td>".$rida['age']."</td>";
            echo "<td>".$rida['gender']."</td>";
            echo "<td>".$rida['category']."</td>";
            echo "<td>".$rida['reg_time']."</td>";
            echo "<td><a class='btn btn-success' herf='#'>muuda</a></td>";
            echo "<td><a class='btn btn-warning' herf='#'>muuda</a></td>";
         
            echo "</tr>";
            }
            
        ?>
        </table>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.5/dist/js/bootstrap.bundle.min.js" integrity="sha384-k6d4wzSIapyDyv1kpU366/PK5hCdSbCRGRCMv+eplOQJWyd1fbcAu9OCUj5zNLiq" crossorigin="anonymous"></script>
  </body>
</html>