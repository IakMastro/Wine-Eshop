<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Σύνδεση/εγγραφή - Το κρασί του Μιχάλη Κερκόπουλου</title>

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</head>

<body>
    <div class="jumbotron text-center" style="margin-bottom: 0;">
        <h1>Το κρασί του Μιχάλη Κερκόπουλου</h1>
        <p>Το νούμερο 1 μερός αγοράς κρασιού στο ίντερνετ!</p>
    </div>

    <?php
    include "php/db.php";
    getAccount($_GET['email'], $_GET['pwd'])
    ?>

    <nav class="navbar navbar-expand-sm bg-dark navbar-dark">
        <a class="navbar-brand" href="index.php">Μενού</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapsibleNavbar">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="collapsibleNavbar">
            <div class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" href="cart.php">Καλάθι</a>
                </li>

                <li class="nav-item">
                    <a class="nav-link" href="admin.php">Admin</a>
                </li>

                <li class="nav-item">
                    <a class="nav-link active" href="login.php">Σύνδεση/εγγραφή</a>
                </li>
            </div>
        </div>
    </nav>

    <div class="container">
        <br>
        <h5>Καλώς ορίσατε πίσω!</h5>
        <form method="get">
            <div class="form-group">
                <label for="email">Email:</label>
                <input type="email" class="form-control" id="email" placeholder="Enter email" name="email">
            </div>

            <div class="form-group">
                <label for="pwd">Κωδικός πρόσβασης:</label>
                <input type="password" class="form-control" id="pwd" placeholder="Enter password" name="pwd">
            </div>

            <div class="checkbox">
                <label><input type="checkbox" name="remember">  Remember me?</label>
            </div>

            <button type="submit" class="btn btn-default">Σύνδεση</button>
        </form>

        <hr>
        <h5>Νεός χρήστης;</h5>
        <form method="post">
            <div class="form-group">
                <label for="email">Email:</label>
                <input type="email" class="form-control" id="email" placeholder="Enter email" name="email">
            </div>

            <div class="form-group">
                <label for="username">Username:</label>
                <input type="text" class="form-control" id="username" placeholder="Enter a username" name="username">
            </div>

            <div class="form-group">
                <label for="pwd">Κωδικός πρόσβασης:</label>
                <input type="password" class="form-control" id="pwd" placeholder="Enter password" name="pwd">
            </div>

            <div class="form-group">
                <label for="pwd">Επανέλαβε τον κωδικό:</label>
                <input type="rePassword" class="form-control" id="pwd" placeholder="Retype password" name="pwd">
            </div>

            <button type="submit" class="btn btn-default">Εγγραφή</button>
        </form>
        <br></br>
    </div>

    <div class="jumbotron text-center" style="margin-bottom: 0">
        <p>Coded with &#10084;&#65039; by iakmastro</p>
    </div>
</body>
</html>