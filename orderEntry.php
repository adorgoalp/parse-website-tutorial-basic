<!DOCTYPE html>
<html lang="en">
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
        use Parse\ParseObject;
ParseClient::initialize('wbBrSDOUcBhQnbIwxrHDwpXTOu2YXzROiSynhtmH', 'cBgdYmWxTiK3rUTChtDVhYEyBuvRT8WlUAtxK4Cj', 'fi2UFS8TwmEzx4oKtsrv567TG4nuZV94GSj2ruYF');
        ?>
    </head>
    <body>
        <div class="container" style="margin-top: 100px;">
            <div class="panel panel-primary">
                <div class="panel-heading">
                    <h3 class="panel-title">New Order</h3>
                </div>
                <form action="orderEntry.php" method="post">
                    <div class="panel-body">
                        <div class="form-group">
                            <label >Order ID</label>
                            <input type="number" class="form-control" name="orderId" required>
                        </div>
                        <div class="form-group">
                            <label >Product Name</label>
                            <input type="text" class="form-control" name="productName" required>
                        </div>
                        <div class="form-group">
                            <label >Quantity</label>
                            <input type="number" class="form-control" name="quantity" required>
                        </div><div class="form-group">
                            <label >Customer</label>
                            <input type="text" class="form-control"  name="customer" required>
                        </div>
                        <div class="form-group">
                            <label >Customer Address</label>
                            <input type="text" class="form-control" name="customerAddress" required>
                        </div>
                        <div class="form-group">
                            <label >Market Name</label>
                            <input type="text" class="form-control" name="marketName" required>
                        </div>
                        <div class="form-group">
                            <label >Delivery Date</label>
                            <input type="text" class="form-control" name="date" required>
                        </div>   
                    </div>
                    <div class="panel-footer">
                        <div class="from-massage">
                            <?php
                                if(isset($_POST['placeOrder']))
                                {
                                    $orderId = (int)$_POST['orderId'];
                                    $productName = $_POST['productName'];
                                    $quantity = (int)$_POST['quantity'];
                                    $customer = $_POST['customer'];
                                    $customerAddress = $_POST['customerAddress'];
                                    $marketName = $_POST['marketName'];
                                    $date = $_POST['date'];
                                    
                                    $order = new ParseObject($TABLE_ORDER);
                                    $order->set($ORDER_ID, $orderId);
                                    $order->set($PRODUCT, $productName);
                                    $order->set($QUANTITY, $quantity);
                                    $order->set($CUSTOMER, $customer);
                                    $order->set($CUSTOMER_ADDRESS, $customerAddress);
                                    $order->set($MARKET_NAME, $marketName);
                                    $order->set($DELIVARY_DATE, $date);
                                    
                                    try {
                                        $order->save();
                                        echo 'Saved!';
                                    } catch (\Parse\ParseException $exc) {
                                        echo $exc->getTraceAsString();
                                    }
                                                                }
                            ?>
                        </div>
                        <button type="submit" class="btn btn-primary" name="placeOrder">Place</button>
                    </div>
                </form>

            </div>
        </div>
    </body>
</html>
