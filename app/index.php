<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Το κρασί του Μιχάλη Κερκόπουλου</title>

    <link rel="stylesheet" href="css/index.css">
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
                    <a class="nav-link" href="login.php">Σύνδεση/εγγραφή</a>
                </li>
            </div>
        </div>
    </nav>

    <div class="container">
        <div class="row">
            <div class="col-sm-4">
                <h2>Λίγες πληροφορίες</h2>
                <h5>Ιστορικό background</h5>
                <p>Είμαστε μία οικογενείακη επιχειρίση από το 1886 με έδρα τη Λάρισσα.
                    Το κρασί παράγεται με αγάπη και αφοσίωση με τον ίδιο τρόπο που αγαπήσατε όλα αυτά τα χρόνια!</p>

                <h5>Βραβεία</h5>
                <p>Από όλα αυτά τα χρόνια, έχουμε βραβευτεί 15 φορές από τον όμοιλο οινών Λάρισσας για το καλύτερο
                    κρασί της χρόνια, ένω από το 2015 βραβευόμαστε ετήσιως από τον όμοιλο The secrets of travelling
                    Διαδικτύο για το καλύτερο κόκκινο κρασί παγκοσμίος!</p>
            </div>

            <div class="col-sm-8">
                <h2>ΚΟΚΚΙΝΟ ΚΡΑΣΙ - ΕΜΦΙΑΛΩΜΕΝΟ</h2>
                <img src="img/emfialomeno.jpg" alt="Εμφιαλωμένο κοκκίνο κρασί">
                <p>Περιγραφή</p>
                <button class="btn btn-primary">Προσθήκη στο καλάθι</button><br><br><br>

                <h2>ΚΟΚΚΙΝΟ ΚΡΑΣΙ - ΧΥΜΑ</h2>
                <img src="img/xima.jpg" alt="Χύμα κόκκινο κρασί">
                <p>Περιγραφή</p>
                <button class="btn btn-primary">Προσθήκη στο καλάθι</button><br><br><br>
            </div>
        </div>
    </div>

    <div class="jumbotron text-center" style="margin-bottom: 0">
        <p>Coded with &#10084;&#65039; by iakmastro</p>
    </div>
</body>
</html>