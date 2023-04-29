<?php

if (isset($_POST['enter-products'])) {
    $productTable = drawProductsTable();
}

if (isset($_POST['invoice'])) {
    $invoiceTable = drawInvoiceTable();
}

function drawProductsTable()
{
    $table = "<table class='table text-center'>
                <thead>
                    <tr>
                        <th >Product Name</th>
                        <th >Price</th>
                        <th >Quantity</th>
                    </tr>
                </thead>
                <tbody>
                    ";
                        for ($i = 1; $i <= $_POST['number']; $i++) {
                            $table .=   "<tr>
                                                                <th ><input type='text' class='form-control' name='product$i' > </th>
                                                                <th ><input type='number' class='form-control' name='price$i' ></th>
                                                                <th ><input type='number' class='form-control' name='quantity$i' ></th>
                                                            </tr>";
                        }
    $table .=    "
                </tbody>
            </table>
            <button class='btn btn-dark form-control' name='invoice'> View Invoice </button>";
    return $table;
}

function drawInvoiceTable()
{
    $table = "<table class='table text-center'>
                <thead>
                    <tr>
                        <th >Product Name</th>
                        <th >Price</th>
                        <th >Quantity</th>
                        <th >SubTotal</th>
                    </tr>
                </thead>
                <tbody>
                    ";
                        $total = 0;
                        for ($i = 1; $i <= $_POST['number']; $i++) {
                            $subTotal = $_POST['quantity' . $i] * $_POST['price' . $i];
                            $total += $subTotal;
                            $table .=   "<tr>
                                                                <th >{$_POST['product' .$i]}</th>
                                                                <th >{$_POST['price' .$i]}</th>
                                                                <th >{$_POST['quantity' .$i]}</th>
                                                                <th >$subTotal</th>
                                                            </tr>";
                        }
                        $percentage = calculateDiscountPercentage($total);
                        $discount = $percentage * $total;
                        $priceAfterDiscount = $total - $discount;
                        $delivery = calculateDelivery($_POST['city']);
                        $totalAfterDelivery = $priceAfterDiscount + $delivery;
    $table .=    "<tr>
                        <th >CLIENT NAME </th>
                        <th >{$_POST['name']}</th>
                    </tr>
                    <tr>
                        <th >City </th>
                        <th >{$_POST['city']}</th>
                    </tr>
                    <tr>
                        <th >Total </th>
                        <th >$total EGP</th>
                    </tr>
                    <tr>
                        <th > Discount Percentage </th>
                        <th >".($percentage * 100)." %</th>
                    </tr>
                    <tr>
                        <th > Discount Value </th>
                        <th >$discount EGP</th>
                    </tr>
                    <tr>
                        <th > Price After Discount </th>
                        <th >$priceAfterDiscount EGP</th>
                    </tr>
                    <tr>
                        <th > Dlivery </th>
                        <th >$delivery EGP</th>
                    </tr>
                    <tr>
                        <th > Total </th>
                        <th class='text-danger'>$totalAfterDelivery EGP</th>
                    </tr>
                </tbody>
            </table>";
    return $table;
}

function calculateDiscountPercentage($total)
{
    if ($total < 1000) {
        return 0;
    } elseif ($total >= 1000 && $total < 3000) {
        return 0.1;
    } elseif ($total >= 3000 && $total < 4500) {
        return 0.15;
    } else {
        return 0.2;
    }
}

function calculateDelivery ($city){
    switch ($city) {
        case 'cairo':
           return 0; 
        case 'giza':
            return 30;
        case 'alex':
            return 50;       
        default:
            return 100;  
    }
}
?>

<!doctype html>
<html lang="en">

<head>
    <title>Super Market</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>

<body>
    <div class="contianer">
        <div class="row mt-5">
            <div class="col-12">
                <h1 class="h1 text-center text-dark"> SuperMarket </h1>
            </div>
            <div class="col-6 offset-3 mt-5">
                <form action="" method="post">
                    <div class="form-group">
                        <label for="name">Name</label>
                        <input type="text" name="name" id="name" class="form-control" placeholder="" aria-describedby="helpId" value="<?php if (isset($_POST['name'])) {
                                                                                                                                            echo $_POST['name'];
                                                                                                                                        } ?>">
                    </div>
                    <div class="form-group">
                        <label for="city">City</label>
                        <select class="form-control" name="city" id="city">
                            <option <?= (isset($_POST['city']) && $_POST['city'] == 'cairo') ? 'selected' : '' ?> value="cairo">Cairo</option>
                            <option <?= (isset($_POST['city']) && $_POST['city'] == 'giza') ? 'selected' : '' ?> value="giza">Giza</option>
                            <option <?= (isset($_POST['city']) && $_POST['city'] == 'alex') ? 'selected' : '' ?> value="alex">Alex</option>
                            <option <?= (isset($_POST['city']) && $_POST['city'] == 'others') ? 'selected' : '' ?> value="others">Others</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="number">Number Of Products</label>
                        <input type="number" name="number" id="number" class="form-control" placeholder="" aria-describedby="helpId" value="<?= isset($_POST['number']) ? $_POST['number'] : '' ?>">
                    </div>
                    <button class="btn btn-dark form-control mb-3" name="enter-products"> Enter Products </button>
                    <?php
                    if (isset($productTable)) {
                        echo $productTable;
                    }
                    if (isset($invoiceTable)) {
                        echo $invoiceTable;
                    }
                    ?>
                </form>
            </div>
        </div>
    </div>
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</body>

</html>
