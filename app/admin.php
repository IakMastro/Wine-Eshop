<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin - Το κρασί του Μιχάλη Κερκόπουλου</title>

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

    <script src="js/admin.js"></script>
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

        <div class="navbar-nav">
            <?php if (isset($_SESSION['username'])) {?>
            <li class="nav-item">
                <a class="nav-link" href="cart.php">Καλάθι</a>
            </li>
            <?php }?>

            <?php if (isset($_SESSION['type']) && $_SESSION['type'] == 'admin') {?>
            <li class="nav-item">
                <a class="nav-link active" href="admin.php">Admin</a>
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
    </nav>

    <?php
    if (!isset($_SESSION['username'])) {
        header("Location: index.php");
    } else {
    ?>

    <br>
    <h2>Σελίδα διαχείρησης</h2>
    <hr>
    <table class="table">
        <thead class="thead-dark">
            <tr>
                <th scope="col">Κωδικός παραγγελίας</th>
                <th scope="col">Κωδικός πελάτη</th>
                <th scope="col">Τελική τιμή</th>
                <th scope="col">Τρόπος πληρωμής</th>
                <th scope="col">Έγκριση</th>
                <th colspan="2" />
            </tr>
        </thead>
        <tbody>
            <?php
            if (isset($_SESSION['orders'])) {
                foreach($_SESSION['orders'] as $order) {?>
                    <tr>
                        <td><?php echo $order['order_id']; ?></td>
                        <td><?php echo $order['account_id']; ?></td>
                        <td><?php echo $order['final_cost']; ?></td>
                        <td><?php echo $order['payment']; ?></td>
                        <td><?php echo $order['approved']; ?></td>
                        <td><button class="btn btn-info">Λεπτομέριες</button></td>

                        <?php if($order['approved'] == 'Όχι') { ?>
                            <td><button class="btn btn-danger">Αποδοχή</button></td>
                        <?php }?>
                    </tr>
                <?php }
            } else {?>
                <tr><td>Δεν υπάρχουν παρραγελίες</td></tr>
            <?php } ?>
        </tbody>
    </table>

    <?php }?>

    <div class="jumbotron text-center" style="margin-bottom: 0">
        <p>Coded with &#10084;&#65039; by iakmastro</p>
    </div>
</body>
</html>