<?php
$result;
if ($_POST) {
    $number1 = $_POST['number1'];
    $number2 = $_POST['number2'];
    $number3 = $_POST['number3'];
    $number4 = $_POST['number4'];
    $number5 = $_POST['number5'];
    $total = $number1 + $number2 + $number3 + $number4 + $number5;
    if ($total <= 25) {
        $total = "we will call you later ";
    } else {
        $total = "thank you ";
    }
}
?>

<!doctype html>
<html lang="en">

<head>
    <title>opinion</title>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <style>
        table {
            width: 300px;
            border-collapse: collapse;
        }

        table,
        th,
        td {
            border: 1px solid black;
        }

        th,
        td {
            padding: 10px;
        }
    </style>
</head>

<body>
    <div class="container">
        <div class="row mt-5">
            <form method="post">
                <table class="table">

                    <tr>
                        <th>the questions</th>
                        <th>bad(0)</th>
                        <th>good(3)</th>
                        <th>very good(5)</th>
                        <th>excllent(10)</th>
                        <th>please enter your rate here</th>
                    </tr>
                    <tr>
                        <td>DO YOU SATISFY ABOUt the cleanless</td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td><input type="number" name="number1" id="number1"></td>
                    </tr>
                    <tr>
                        <td>DO YOU SATISFY ABOUt the price</td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td><input type="number" name="number2" id="number2"></td>
                    </tr>
                    <tr>
                        <td>DO YOU SATISFY ABOUt the nurses</td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td><input type="number" name="number3" id="number3"></td>
                    </tr>
                    <tr>
                        <td>DO YOU SATISFY ABOUt OUR doctors</td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td><input type="number" name="number4" id="number4"></td>
                    </tr>
                    <tr>
                        <td>DO YOU SATISFY ABOUt the silence</td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td><input type="number" name="number5" id="number5"></td>
                    </tr>
                </table>
                <div class="form-group">
                    <button class="btn btn-dark rounded"> Calculate </button>
                </div>
            </form>
            <div class="alert alert_success"><?php if (isset($total)) {
                                                    echo $total;
                                                } ?>
            </div>
        </div>

        <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</body>

</html>