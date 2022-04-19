<!DOCTYPE html>
<html lang="it">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!--Links-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="./css/login.css">
    <title>Registrazione Venditore</title>
</head>
<body>
    <br>
    <!--Body-->
    <section class="vh-100">
        <div class="container-fluid h-custom">
            <div class="row d-flex justify-content-center align-items-center h-100">
                <div class="col-md-9 col-lg-6 col-xl-5">
                    <img src="./images/LoginImage.jpg"
                    class="img-fluid" alt="Sample image">
                </div>
                <div class="col-md-8 col-lg-6 col-xl-4 offset-xl-1">
                    <form action="regvenditore.php" method="POST">
                        <!-- Email input -->
                        <div class="form-outline mb-4">
                            <input type="text" name="nome" class="form-control form-control-lg"
                            placeholder="Inserisci il nome" />
                            <label class="form-label" for="nome">Nome</label>
                        
                            <input type="text" name="cognome" class="form-control form-control-lg"
                            placeholder="Inserisci il cognome" />
                            <label class="form-label" for="cognome">Cognome</label>
                        </div>

                        <!-- Password input -->
                        <div class="form-outline mb-4">
                            <input type="text" name="email" class="form-control form-control-lg"
                            placeholder="Inserisci l'email" />
                            <label class="form-label" for="email">Email</label>
                        
                            <input type="text" name="numero" class="form-control form-control-lg"
                            placeholder="Inserisci il numero" />
                            <label class="form-label" for="numero">Numero</label>
                            <input type="password" name="password" class="form-control form-control-lg"
                            placeholder="Inserisci la password" />
                            <label class="form-label" for="password">Password</label>
                        </div>

                        <div class="text-center text-lg-start mt-4 pt-2">
                            <a href="regaffittuario.php" >Sono un Affittuario</a>
                            <a href="homepage.html" style="padding-right:5%; padding-left: 5%;">Homepage</a>
                            <button type= "submit" name="submit" class="btn btn-primary btn-lg" style="padding-left: 2.5rem; padding-right: 2.5rem;">Registrati</button>
                            <p class="small fw-bold mt-2 pt-1 mb-0">Hai un account? <a href="login.php"
                                class="link-danger">Accedi</a></p>
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </section>
    <?php
        error_reporting(0);
        if (isset($_POST["submit"])) {
            $servername = "localhost";
            $username = "root";


            // Create connection
            $conn = mysqli_connect($servername, $username, "", "bedandbreakfast");

            // Check connection
            if (!$conn) {
                die("Connection failed: " . mysqli_connect_error());
            }
            if (isset($_POST["nome"]) && isset($_POST["cognome"]) && isset($_POST["email"]) && isset($_POST["numero"]) && isset($_POST["password"]))
            {   
                $sql = "INSERT INTO `proprietari`(`Cognome`, `Nome`, `Telefono`, `Email`, `Password`) 
                VALUES ('".$_POST['cognome']."', '".$_POST['nome']."', '".$_POST['numero']."','".$_POST['email']."','".$_POST['password']."')";
                
                if (mysqli_query($conn, $sql)) {
                    echo "<script type='text/javascript'>alert('Creazione account avvenuta con successo');</script>";
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
</body>
</html>