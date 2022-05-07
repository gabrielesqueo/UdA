<!DOCTYPE html>
<html lang="it">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!--Links-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="./css/login.css">
    <title>Registrazione Affittuario</title>
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
                    <form action="regaffittuario.php" method="POST"> 
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
                        
                            <input type="number" name="numero" class="form-control form-control-lg"
                            placeholder="Inserisci il numero" />
                            <label class="form-label" for="numero">Numero</label>
                            
                            <input type="number" name="numerocarta" class="form-control form-control-lg"
                            placeholder="Inserisci il numero della carta" minlength="16" maxlength="16"/>
                            <label class="form-label" for="numerocarta">Numero Carta</label>
                            <input type="password" name="password" class="form-control form-control-lg"
                            placeholder="Inserisci la password" />
                            <label class="form-label" for="password">Password</label>
                        </div>

                        <div class="text-center text-lg-start mt-4 pt-2">
                            <a href="regvenditore.php" >Sono un Venditore</a>
                            <a href="homepage.html" style="padding-right:5%; padding-left: 5%;">Homepage</a>
                            <button  class="btn btn-primary btn-lg" type= submit name= "submit" style="padding-left: 2.5rem; padding-right: 2.5rem;">Registrati</button>
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
            if (isset($_POST["nome"]) && isset($_POST["cognome"]) && isset($_POST["email"]) && isset($_POST["numero"]) && isset($_POST["password"]) && isset($_POST["numerocarta"]))
            {   
                $sql = "INSERT INTO `clienti`(`Cognome`, `Nome`, `Telefono`, `Email`, `Password`, `Num_Creditcard`) 
                VALUES ('".$_POST['cognome']."', '".$_POST['nome']."', '".$_POST['numero']."','".$_POST['email']."','".$_POST['password']."','".$_POST['numerocarta']."')";
                //INSERIRE QUALI DATI DI OUTPUT
                if (mysqli_query($conn, $sql)) {
                    $sql = "SELECT Id_Cliente, Email, Password FROM clienti WHERE '".$_POST['email']."'= Email AND '".$_POST['password']."'= Password";
                    $result = mysqli_query($conn, $sql);
                    
                    if (mysqli_num_rows($result) > 0) {
                        while($row = mysqli_fetch_assoc($result)) {
                            echo "<script type='text/javascript'>alert('Creazione avvenuta con successo! Il suo Id è: ".$row['Id_Cliente']."');</script>";
                        }                    
                        
                    }
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