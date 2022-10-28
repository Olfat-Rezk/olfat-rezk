<?php
$errors = [];
if($_SERVER['REQUEST_METHOD']=='POST'){


    if(empty($_POST['name'])){
        $errors = "Enter your name";
    }

    if(empty($_POST['city'])){
        $errors = "Enter your city";
    }
    if(empty($_POST['numVariable'])){
        $errors = "Enter your numVariable";
    }
    print_r($_POST);
    if ($_POST['city']=="cairo") {
        $delivery=0;

    }elseif ($_POST['city']=="giza") {
        # code...
        $delivery = 30;
    }elseif ($_POST['city']=="alex") {
        # code...
        $delivery = 50;
    }else{
        $delivery = 100;
    }

 

}

?>
<!DOCTYPE html>
<html>

<head>
    <title>Supermarket</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
        integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>

<body>
    <div class="container">
        <div class="row">
            <div class="col-12 text-center mt-5">
                <h1> Supermarket</h1>
                <form method="post">
                    <div class="form-group">
                        <label for="name">User Name </label>
                        <input type="name" name="userName" id="name" required class="form-control"
                            value="<?=$_POST['userName']??''?>" placeholder="" aria-describedby="helpId">
                        <?= $errors['name'] ?? "" ?>
                    </div>
                    <div class="form-select form-select-lg mb-3" aria-label=".form-select-lg example">

                        <label for="city">Your city </label>
                        <select class="form-group" name="city">
                            <option>Open this select menu</option>
                            <option value="cairo">Cairo</option>
                            <option value="giza">Giza</option>
                            <option value="alex">Alex</option>
                            <option value="other">Other</option>
                        </select>
                        <?= $errors['city'] ?? "" ?>
                    </div>



                    <div class="form-group">
                        <label for="numVariable">Number of Variable</label>
                        <input type="integer" name="numVariable" id="numVariable" class="form-control" placeholder=""
                            aria-describedby="helpId" value="<?=$_POST['numVariable']??''?>">

                        <?= $errors['numVariable'] ?? "" ?>
                    </div>



                    <button class="btn btn-outline-dark rounded form-control" type="submit" name="Products"> Enter
                        Products </button>

                    <?php
                        if(isset($_POST['Products'])){

                   echo ('<table class="table table-bordered table-hover">'.
                        '<thead>'.
                            '<tr>'.
                                '<th>Product Name</th>'.
                                '<th>Price</th>'.
                                '<th>Quantities</th>'.
                            '</tr>'.
                        '</thead>'.
                        '<tbody>');

                                $price=0;
                                $total = 0;
                                $discount= 0;
                                $subTotal = 0;

                                 for($i=1;$i<=$_POST['numVariable'];$i++){
                            
                                 echo(' <tr>' .
                                '<td><input type="text" id="productName" name="productName_'.$i.'"></td>' .
                                '<td><input type="float" id="Price" name="Price_'.$i.'" ></td>' .
                                '<td><input type="float" id="quatity" name="quatity_'.$i.'"></td>' .
                                 '</tr>');
                                 }
                                 echo('<button class="btn btn-outline-dark rounded form-control" type="submit" name="show_invoice"> 
                            Show Invoice </button>');

                            if(isset($_POST['show_invoice'])){
                                 $subTotal = $_POST['price_'.$i] * $_POST['quantity_'.$i];
                                 $total += $subTotal;
                                

                                     
                                    if ($total<=1000) {
                                        # code...
                                        $discount = 0;
                                    }elseif ($total>1000 && $total<=3000 ) {
                                        # code...
                                        $discount = 0.1*$total;
                                    }elseif ($total>3000 && $total<=4500) {
                                        # code...
                                        $discount = 0.15*$total;
                                    }else{
                                        $discount = 0.2*$total;
                                    }
                                
                                    $discount+=$discount;
                                    $totalAfterDis = $total-$discount;
                                    $netTotal = $totalAfterDis + $delivery;?>



                    <tr>
                        <td>client Name</td>
                        <td>{$_POST["userName"]}</td>
                    </tr>
                    <tr>
                        <td>city</td>
                        <td><?=$_POST["city"]?></td>
                    </tr>
                    <tr>
                        <td>Total</td>
                        <td><?=$total?></td>
                    </tr>
                    <tr>
                        <td>Discount </td>
                        <td><?=$discount?></td>
                    </tr>
                    <tr>
                        <td>Total After Discount</td>
                        <td><?=$totalAfterDis?></td>
                    </tr>
                    <tr>
                        <td>Delivery</td>
                        <td><?=$delivery?></td>
                    </tr>
                    <tr>
                        <td>Net TOtal</td>
                        <td><?=$netTotal?></td>
                    </tr>
                    </tbody>

                    <?php }} ?>
                </form>



            </div>
            <!-- </div> -->
        </div>
        <footer class="w-100 bg-dark text-light text-center py-2" style="position: fixed;bottom:0;">
            All Rights Reserved
        </footer>
        <!-- Optional JavaScript -->
        <!-- jQuery first, then Popper.js, then Bootstrap JS -->
        <!-- <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
        integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous">
    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"
        integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous">
    </script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"
        integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous">
    </script> -->
</body>

</html>