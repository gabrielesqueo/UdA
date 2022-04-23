<!DOCTYPE html>
<html lang="it">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <!--Script-->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
        <link rel="stylesheet" href="./css/buttons.css">
        <link rel="stylesheet" href="./css/navbar.css">
        <link rel="stylesheet" href="./css/table.css">
        <title>Homepage Venditore</title>
    </head>
    <body>
        <!--Navbar-->
        <nav class="navbar navbar-dark bg-custom-2 sticky-top" >
            <div class="container-fluid" >
            <a class="navbar-brand" href="homepage.html">
                <img src="./images/Logo.png" alt=""  height="50px" class="d-inline-block align-text-top"> </img>
            </a>
            <div class="d-flex " style="padding-bottom:10px">
                <a class="navbar-brand" href="homepage.html" >
                    <button class="cta" >
                        <span class="hover-underline-animation"> Home </span>
                    </button>
                </a>
                <a class="navbar-brand" href="affitta.php" >
                    <button class="cta" >
                        <span class="hover-underline-animation"> Metti In Affitto </span>
                    </button>
                </a>
            </div>
            
        </nav>
        <!--Body-->
        <div>
            <?php
            error_reporting(0);
            $servername = "localhost";
            $username = "root";


            // Create connection
            $conn = mysqli_connect($servername, $username, "", "bedandbreakfast");

            // Check connection
            if (!$conn) {
                die("Connection failed: " . mysqli_connect_error());
            }
                $id = $_GET["id"];
                $sql = "SELECT appartamenti.Nome_via, appartamenti.Civico, appartamenti.Prezzo, appartamenti.Descrizione FROM appartamenti, proprietari WHERE  proprietari.id_proprietario = $id AND proprietari.id_proprietario = appartamenti.id_proprietario";
                $result = mysqli_query($conn, $sql);
                
                if (mysqli_num_rows($result) > 0) {
                    echo "<div class='table-wrapper'><table class='fl-table'><thead> <tr> <th>Indirizzo /th> <th>Civico </th> <th>Prezzo</th> <th>Descrizione </th> </tr> </thead>";
                    while($row = mysqli_fetch_assoc($result)) {
                        echo "<tr><th>". $row["Nome_via"]. "</th><th> " . $row["Civico"]."</th><th>". $row["Prezzo"]. "</th><th>".$row["Descrizione"]."</th></tr>";
                      } 
                    echo "</table></div>";
                } else {
                    echo "<button class='cssbuttons-io-button' style='margin-top: 30px;margin-left:35%'>Metti In Affitto La Tua Prima Proprietà! <div class='icon'><svg height='24' width='24' viewBox='0 0 24 24' xmlns='http://www.w3.org/2000/svg'><path d='M0 0h24v24H0z' fill='none'></path><path d='M16.172 11l-5.364-5.364 1.414-1.414L20 12l-7.778 7.778-1.414-1.414L16.172 13H4v-2z' fill='currentColor'></path></svg> </button>";
                }
                
            ?>
        </div>
    </body>
</html>