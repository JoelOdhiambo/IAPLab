<?php
include_once 'DBConnector.php';
include_once 'user.php';
// ini_set('memory_limit','3072M');

$con = new DBConnector;
if (isset($_POST['btn-login'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];
    $instance = User::create();
    $instance->setPassword($password);
    $instance->setUsername($username);

    if ($instance->isPasswordCorrect()) {
        $instance->login();

        $con->closeDatabase();

        $instance->createUserSession();
    } else {
        $con->closeDatabase();
        // header("Location:login.php");
        echo "Wrong password";
    }
}
?>

<html>

<head>
    <title>LOG IN</title>
    <!-- <script type="text/javascript" src="validate.js"></script> -->
    <link rel="stylesheet" type="text/css" href="validate.css">
    <link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap.css">
</head>

<body class="bg-dark text-white" >
    <div class="align-middle">
    <form method="POST" name="login" id="login" action="<?= $_SERVER['PHP_SELF'] ?>">

        <table align="center">
            <tr>
                <td><div class="input-group mb-3"><input class="font-italic" type="text" name="username" placeholder="Username" required></div>
                </td>
            </tr>
            <tr>
                <td>
                    <div class="input-group mb-3"><input class="font-italic" type="password" name="password" placeholder="Password"></div>
                </td>
            </tr>
            <tr>
                <td><button class="btn btn-dark font-weight-light" type="submit" name="btn-login"><strong>LOGIN</strong></button></td>
            </tr>

        </table>
    </form>
    </div>
</body>

</html>