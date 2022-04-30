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

        </div>
    </body>
</html>