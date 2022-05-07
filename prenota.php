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
        <title>Prenotazione</title>
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
                <a class="navbar-brand" href="homeutente.php?id= <?php echo $_GET['id']?>" >
                    <button class="cta" >
                        <span class="hover-underline-animation"> Home Utente </span>
                    </button>
                </a>
            </div>
        </nav>
        <!--Body-->
        <div>
            <section class="vh-90">
                <div class="container-fluid h-custom">
                    <div class="row d-flex justify-content-center align-items-center h-100">
                        <div class="col-md-9 col-lg-6 col-xl-5">
                            <img src="./images/LoginImage.jpg"
                            class="img-fluid" alt="Sample image">
                        </div>
                        <div class="col-md-8 col-lg-6 col-xl-4 offset-xl-1">
                            <form action="prenota.php?id=<?php echo $_GET["id"] ?>" method="POST"> 

                                <div class="form-outline mb-4">
                                    <select name="appartanento" id="appartanento" class="form-control form-control-lg">
                                    <option>Scegli appartamento</option>
                                    <?php
                                        $servername = "localhost";
                                        $username = "root";
                    
                    
                                        // Create connection
                                        $conn = mysqli_connect($servername, $username, "", "bedandbreakfast");

                                        // Check connection
                                        if (!$conn) {
                                            die("Connection failed: " . mysqli_connect_error());
                                        }
                                        $sql = "SELECT appartamenti.Id_Appartamento, appartamenti.descrizione FROM appartementi"
                                        if (mysqli_query($conn, $sql)) {
                                            if (mysqli_num_rows($result) > 0) {
                                                while($row = mysqli_fetch_assoc($result)) {
                                                    echo "<option value=".$row["Id.Appartamento"].">".$row["descrizione"]."</option>";
                                                  } 
                                                
                                            }
                                        }
                                    ?>
                                    <option value="1">Valenzano</option>
                                    <option value="2">Bari</option>
                                    <option value="3">Sora</option>
                                </select>
                                    <label class="form-label" for="appartanento">Seleziona l'appartamento</label>
                                
                                    <input type="date" name="datainizio" class="form-control form-control-lg"
                                    placeholder="Inserisci il numero" />
                                    <label class="form-label" for="datainizio">Data di Inizio prenotazione</label>
                                    
                                    <input type="text" name="datafine" class="form-control form-control-lg"
                                    placeholder="Inserisci il numero della carta" />
                                    <label class="form-label" for="datafine">Data di fine prenotazione</label>
                                </div>

                                <div class="text-center text-lg-start mt-4 pt-2">
                                    <a href="homepage.html" style="padding-right:5%;  color:red;">Homepage</a>
                                    <button  class="btn btn-primary btn-lg" type= submit name= "submit" style="padding-left: 2.5rem; padding-right: 2.5rem;" >Prenota</button>
                                </div>

                            </form>
                        </div>
                    </div>
                </div>
            </section>
            <?php
            //FINIRE
                error_reporting(0);
                if(isset($_POST["submit"])) {
                    $servername = "localhost";
                    $username = "root";


                    // Create connection
                    $conn = mysqli_connect($servername, $username, "", "bedandbreakfast");

                    // Check connection
                    if (!$conn) {
                        die("Connection failed: " . mysqli_connect_error());
                    }
                    if (isset($_POST["nome"]) && isset($_POST["civico"])  && isset($_POST["comune"]) && isset($_POST["numero"]) && isset($_POST["descrizione"]))
                    {   
                        $sql = "INSERT INTO `appartamenti`(`Nome_via`, `Civico`, `id_comuneapp`, `Prezzo`, `Descrizione`, `id_proprietario`) 
                        VALUES ('".$_POST['nome']."', ".$_POST['civico'].", ".$_POST['comune'].", ".$_POST['numero'].",'".$_POST['descrizione']."',".$_GET["id"].")";
                        //INSERIRE QUALI DATI DI OUTPUT
                        if (mysqli_query($conn, $sql)) {
                            echo "<script type='text/javascript'>alert('Appartamento aggiunto con successo!');</script>";
                        
                        } else {
                            echo "<script type='text/javascript'>alert('Errore generico durante la registrazione! Riprovare');</script>";
                        }

                    }
                    else
                    {
                        echo "<script type='text/javascript'>alert('Non hai compilato uno dei campi');</script>";
                    }
                    mysqli_close($conn);
                }
            ?>
        </div>
    </body>
</html>