<?php

?>
<html>

<head>
    <title>About Order</title>
    <script src="jquery-3.5.1.min"></script>
    <script type="text/javascript" src="placeholde.js"></script>
    <script type="text/javascript" src="bootstrap/js/bootstrap.js"></script>
    <script type="text/javascript" src="bootstrap/js/bootstrap.js"></script>

    <link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap.css">
    <link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap.css.map">
    <link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap.min.css.map">
    <link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap-theme.css">
    <link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap-theme.css.map">
    <link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap-theme.min.css">
    <link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap-theme.min.css.map">
</head>
<body>
    <h3>It is time to communicate with the exposed API, all we need is the API key to be passed in the header</h3>
    <hr>
    <h4>1. Feature 1 - Placing an Order</h4>
    <hr>

    <form action="order_form" id="order_form">
        <fieldset>
            <legend>Place Order</legend>
            <input type="text" name="name_of_food" id="name_of_food" required placeholder="Name Of Food"/><br>
            <input type="number" name="number_of_units" id="number_of_units" required placeholder="Number of Units"/><br>
            <input type="number" name="unit_price" id="unit_price" required placeholder="Unit Price"/><br><br>
            <input type="hidden" name="status" id="status" required placeholder="Unit Price" value="order paced"/><br><br>
            <button class="btn btn-primary" type="submit">Place Order</button>
        </fieldset>
    </form>

    <hr>
    <h4>2. Feature 2 - Checking Order Status</h4>
    <hr>
    <form name="order_status_form" id="order_status_form" action="<?=$_SERVER['PHP_SELF']?>" method="post">
    <fieldset>
        <legend>Check Order Status</legend>
        <input type="number" name="order_id" id="order_id" required placeholder="Order ID"/> <br><br>
        <button type="submit" class="btn btn-warning">Check Order Status</button>
    </fieldset>

    </form>
</body>
</html>