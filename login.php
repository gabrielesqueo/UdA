<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!--Links-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="./css/login.css">
    <title>Login</title>
</head>
<body>
    <!--Body-->
    <section class="vh-100">
        <div class="container-fluid h-custom">
            <div class="row d-flex justify-content-center align-items-center h-100">
                <div class="col-md-9 col-lg-6 col-xl-5">
                    <img src="./images/LoginImage.jpg"
                    class="img-fluid" alt="Sample image">
                </div>
                <div class="col-md-8 col-lg-6 col-xl-4 offset-xl-1">
                    <form action="login.php" method="POST">
                    <!-- Email input -->
                        <div class="form-outline mb-4">
                            <input type="text" name="idUtente" class="form-control form-control-lg"
                            placeholder="Inserisci un Id utente valido" />
                            <label class="form-label" for="form3Example3">Id Utente</label>
                        </div>

                        <!-- Password input -->
                        <div class="form-outline mb-3">
                            <input type="text" name="password" class="form-control form-control-lg"
                            placeholder="Inserisci la password" />
                            <label class="form-label" for="form3Example4">Password</label>
                        </div>

                        <div class="d-flex justify-content-between align-items-center">
                            <!-- Checkbox -->
                            <div class="form-check mb-0">
                            <input class="form-check-input me-2" type="radio"  name="tipo" />
                            <label class="form-check-label" for="form2Example3">
                                Sono un Venditore
                            </label>
                            
                            </div>
                            
                        </div>

                        <div class="text-center text-lg-start mt-4 pt-2">
                            <a href="homepage.html" style="padding-right:5%">Homepage</a>
                            <button  type= "submit" name="submit" class="btn btn-primary btn-lg" style="padding-left: 2.5rem; padding-right: 2.5rem;">Login</button>
                            <p class="small fw-bold mt-2 pt-1 mb-0">Non hai un account? <a href="regaffittuario.php"
                                class="link-danger">Registrati</a></p>
                        </div>

                    </form>
                </div>
            </div>
        </div>
        <div class="d-flex flex-column flex-md-row text-center text-md-start justify-content-between py-4 px-4 px-xl-5 bg-primary">
            <!-- Copyright -->
            <div class="text-white mb-3 mb-md-0">
            <img src="./images/Logo.png" alt=""  height="25px" class="d-inline-block align-text-top"> </img>
            </div>
            <!-- Copyright -->

        </div>
    </section>
    <!--JS-->
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
            if (isset($_POST["tipo"]))
            {
                $sql = "SELECT Id_Proprietario, Password FROM proprietari WHERE '".$_POST['idUtente']."'= Id_Proprietario AND '".$_POST['password']."'= Password";
                $result = mysqli_query($conn, $sql);

                if (mysqli_num_rows($result) > 0) {
                    $redirect = "homevenditore.php?id=".$_POST['idUtente'];
                    echo "<script>window.location.href='$redirect';</script>";
                } else {
                    echo "<script type='text/javascript'>alert('Id o Password sbagliati');</script>";
                }
                
            }
            else
            {
                $sql = "SELECT Id_Cliente, Password FROM clienti WHERE '".$_POST['idUtente']."'= Id_Cliente AND '".$_POST['password']."'= Password";
                $result = mysqli_query($conn, $sql);

                if (mysqli_num_rows($result) > 0) {
                    $redirect = "homeutente.php?id=".$_POST['idUtente'];
                    echo "<script>window.location.href='$redirect';</script>";
                    exit;
                } else {
                    echo "<script type='text/javascript'>alert('Id o Password sbagliati');</script>";
                }
            }
            mysqli_close($conn);
        }
    ?>
</body>
</html>