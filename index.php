<html>
    <head>
        <meta charset="utf-8">

        <title>Parse Web Tutorial</title>
        <meta name="description" content="My Parse App">
        <meta name="viewport" content="width=device-width">
        <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
        <link rel="stylesheet" type="text/css" href="css/iftaCss.css">
        <?php
        require './vendor/autoload.php';
        require './dataTableInfo.php';
        use Parse\ParseClient;
        use Parse\ParseQuery;

ParseClient::initialize('wbBrSDOUcBhQnbIwxrHDwpXTOu2YXzROiSynhtmH', 'cBgdYmWxTiK3rUTChtDVhYEyBuvRT8WlUAtxK4Cj', 'fi2UFS8TwmEzx4oKtsrv567TG4nuZV94GSj2ruYF');
        ?>
    </head>
    <body>
        <div class="container">
            <table class="table table-hover">
            <?php
            $orderQuery = new ParseQuery($TABLE_ORDER);
            $orderQuery->greaterThan($ORDER_ID, 1);
            $result = $orderQuery->find();
            $count = 1;
            foreach ($result as $r)
            {
                echo '<tr><td>'.$count++.'</td><td>';
                echo 'Order Id :'.$r->get($ORDER_ID).'<br>';
                echo 'Product Name :'.$r->get($PRODUCT).'<br>';
                echo 'Quantity :'.$r->get($QUANTITY).'<br>';
                echo 'Customer :'.$r->get($CUSTOMER).'<br>';
                echo 'Customer Address :'.$r->get($CUSTOMER_ADDRESS).'<br>';
                echo 'Market Name :'.$r->get($MARKET_NAME).'<br>';
                echo 'Delevary Date :'.$r->get($DELIVARY_DATE).'<br>';
                echo '</td></tr>';
                
            }
        ?>
                </table>
        </div>
        <div class="container" style="margin-bottom: 100px;">
            <a href="orderEntry.php" class="btn btn-warning">Make An Order</a>
        </div>
    </body>
</html>
