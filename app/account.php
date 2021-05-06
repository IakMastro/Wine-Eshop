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

    <script src="js/account.js"></script>
    <script src="js/get_order_details.js"></script>

    <style>
    .modal-body {
        overflow-x: auto;
    }
    </style>
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

                <?php if (isset($_SESSION['type']) && $_SESSION['type'] == 'admin') {?>
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
                    <a class="nav-link active" href="account.php">Σύνδεση/εγγραφή</a>
                <?php } ?>
                </li>
            </div>
        </div>
    </nav>

    <?php
    if (!isset($_SESSION['username'])) {
    ?>
    <div class="container">
        <br>
        <h5>Καλώς ορίσατε πίσω!</h5>
        <div class="loginDiv">
            <div id="loginMessage"></div>

            <div class="form-group">
                <label for="email">Email:</label>
                <input type="email" class="form-control" id="email" placeholder="Enter email" name="email">
            </div>

            <div class="form-group">
                <label for="pwd">Κωδικός πρόσβασης:</label>
                <input type="password" class="form-control" id="pwd" placeholder="Enter password" name="pwd">
            </div>

            <div class="checkbox">
                <label><input type="checkbox" name="remember" id="rememberMe">  Remember me?</label>
            </div>

            <button type="submit" id="login" class="btn btn-default">Σύνδεση</button>
        </div>

        <hr>
        <h5>Νεός χρήστης;</h5>
        <div class="signupDiv">
            <div id="signupMessage"></div>

            <div class="form-group">
                <label for="email">Email:</label>
                <input type="email" class="form-control" id="new_email" placeholder="Enter email" name="email">
            </div>

            <div class="form-group">
                <label for="pwd">Κωδικός πρόσβασης:</label>
                <input type="password" class="form-control" id="new_pwd" placeholder="Enter password" name="pwd">
            </div>

            <div class="form-group">
                <label for="pwd">Επανέλαβε τον κωδικό:</label>
                <input type="password" class="form-control" id="repeat_pwd" placeholder="Retype password" name="pwd">
            </div>

            <button type="submit" id="signup" class="btn btn-default">Εγγραφή</button>
        </div>
        <br></br>
    </div>

    <?php } else { ?>
        <div class="orders">
            <br>
            <h3>Παραγγελίες</h3>
            <hr>
            <table class="table" id="orders">
                <thead class="thead-dark">
                    <tr>
                        <th scope="col">Κωδικός παραγγελίας</th>
                        <th scope="col">Κωδικός πελάτη</th>
                        <th scope="col">Τελική τιμή</th>
                        <th scope="col">Τρόπος πληρωμής</th>
                        <th scope="col">Έγκριση</th>
                        <th colspan="1" />
                    </tr>
                </thead>
                <tbody>
                    <?php
                    if (isset($_SESSION['orders'])) {
                        foreach($_SESSION['orders'] as $order) {?>
                            <tr>
                                <td><span class="order"><?php echo $order['order_id']; ?></span></td>
                                <td><?php echo $order['final_cost']; ?></td>
                                <td><?php echo $order['payment']; ?></td>
                                <td><?php echo $order['approved']; ?></td>
                                <td><button id="detailsBtn" class="btn btn-info">Λεπτομέριες</button></td>
                            </tr>
                        <?php }
                    } else {?>
                        <tr><td>Δεν υπάρχουν παρραγελίες</td></tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>
    <?php }?>
    <div class="jumbotron text-center" style="margin-bottom: 0">
        <p>Coded with &#10084;&#65039; by iakmastro</p>
    </div>

    <div class="modal" tabindex="-1" role="dialog">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Πληροφορίες παραγγελίας</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <table class="table table-bordered">
                        <thead class="thead-dark">
                            <tr>
                                <th scope="col">Κωδικός παραγγελίας</th>
                                <th scope="col">Κωδικός προϊόντος</th>
                                <th scope="col">Όνομα προϊόντος</th>
                                <th scope="col">Λίτρα</th>
                                <th scope="col">Κόστος ανά λίτρο</th>
                                <th scope="col">Τιμή προϊόντος</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            foreach($_SESSION['order_details'] as $order) {?>
                                <tr>
                                    <td><?php echo $order['order_id']; ?></td>
                                    <td><?php echo $order['product_id']; ?></td>
                                    <td><?php echo $order['name']; ?></td>
                                    <td><?php echo $order['litre']; ?></td>
                                    <td><?php echo $order['cost_per_litre']; ?></td>
                                    <td><?php echo $order['cost']; ?></td>
                                </tr>
                            <?php } ?>
                        </tbody>
                    </table>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-primary" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>
</body>
</html>