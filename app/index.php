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
    <script src="js/index.js"></script>
</head>

<body>
    <?php session_start();?>

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
                <?php if (isset($_SESSION['username'])) {?>
                <li class="nav-item">
                    <a class="nav-link" href="cart.php">Καλάθι</a>
                </li>
                <?php }?>

                <?php if (isset($_SESSION['type']) && $_SESSION['type'] == "admin") {?>
                <li class="nav-item">
                    <a class="nav-link" href="admin.php">Admin</a>
                </li>
                <?php }?>

                <li class="nav-item">
                <?php if (isset($_SESSION['username'])) {?>
                    <div class="dropdown">
                        <button class="nav-item btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <?php echo $_SESSION["username"];?>
                        </button>
                        <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                            <a class="dropdown-item" href="php/sign_out.php">Αποσύνδεση</a>
                            <a class="dropdown-item" href="account.php">Προηγούμενες παραγγελίες</a>
                        </div>
                    </div>
                <?php } else {?>
                    <a class="nav-link" href="account.php">Σύνδεση/εγγραφή</a>
                <?php } ?>
                </li>
            </div>
        </div>
    </nav>

    <div class="container">
        <div class="row">
            <div class="col-sm-4">
                <h2>Λίγες πληροφορίες</h2>
                <h5>Ιστορικό background</h5>
                <p>Είμαστε μία οικογενείακη επιχειρίση από το 1886 με έδρα τη Λάρισα.
                    Το κρασί παράγεται με αγάπη και αφοσίωση με τον ίδιο τρόπο που αγαπήσατε όλα αυτά τα χρόνια!</p>

                <h5>Βραβεία</h5>
                <p>Από όλα αυτά τα χρόνια, έχουμε βραβευτεί 15 φορές από τον όμιλο οινών Λάρισας για το καλύτερο
                    κρασί της χρόνια, ένω από το 2015 βραβευόμαστε ετήσιως από τον όμιλο The secrets of travelling
                    Διαδικτύο για το καλύτερο κόκκινο κρασί παγκοσμίος!</p>
            </div>

            <div class="col-sm-8">
                <h2>ΚΟΚΚΙΝΟ ΚΡΑΣΙ - ΕΜΦΙΑΛΩΜΕΝΟ</h2>
                <img src="img/emfialomeno.jpg" alt="Εμφιαλωμένο κοκκίνο κρασί">
                <p>Το αγαπήμενο σας κρασί εμφιαλωμένο. Σας το δίνουμε στην διαδικτυακή προσφόρα των 5 ευρώ ανά λίτρο.</p>
                <?php if (isset($_SESSION['username'])) {?>
                <button id="emfialomenoBtn" class="btn btn-primary">Προσθήκη στο καλάθι</button><br><br><br>
                <?php }?>

                <h2>ΚΟΚΚΙΝΟ ΚΡΑΣΙ - ΧΥΜΑ</h2>
                <img src="img/xima.jpg" alt="Χύμα κόκκινο κρασί">
                <p>Χύμα κράσι, φτιαγμένο από έμας, με αγάπη. 10 ευρώ ανά λίτρο.</p>
                <?php if (isset($_SESSION['username'])) {?>
                <button id="xumaBtn" class="btn btn-primary">Προσθήκη στο καλάθι</button><br><br><br>
                <?php }?>
            </div>
        </div>
    </div>

    <div class="jumbotron text-center" style="margin-bottom: 0">
        <p>Coded with &#10084;&#65039; by iakmastro</p>
    </div>
</body>
</html>