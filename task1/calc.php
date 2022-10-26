<?php
?>

<!doctype html>
<html lang="en">
  <head>
    <title>Title</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  </head>
  <body>
      <div class="contianer">
        <div class="row">
            <div class="col-12 text-center text-danger mt-5">
                <h1> simple calculator </h1>
            </div>
            <div class="col-4 offset-4 mt-5">
                <form  method="post">
                    <div class="form-group">
                      <label for="number">Number1</label>
                      <input type="number" name="Number1" id="number" class="form-control" placeholder="" aria-describedby="helpId">
                    </div>
                    <div class="form-group">
                        <label for="number">Number2</label>
                        <input type="number" name="Number2" id="number" class="form-control" placeholder="" aria-describedby="helpId">
                    </div>
                    <div class="form-group">
                        <div class="btn-group mr-2" >
                            <label class="btn btn">
                                <input type="submit" name="options" value="+" >
                            </label>
                        </div>
                        <div class="btn btn  mr-2">
                            <label class="btn btn">
                                <input type="submit" name="options" value="-" >
                            </label>
                        </div>
                        <div class="btn-group mr-2" >
                            <label class="btn btn ">
                                <input type="submit" name="options" value="*">
                            </label>
                        </div>
                        <div class="btn-group mr-2" >
                            <label class="btn btn ">
                                <input type="submit" name="options" value="/"  >
                            </label>
                        </div>
                    </div>


                </form>
                <?php
//                $num1 = '';
//                $num2 = '';
                if ($_POST){
                    $num1 = $_POST['Number1'];
                    $num2 = $_POST['Number2'];
//
//              echo $_POST['options'];
                    switch ($_POST['options']){
                        case '+':
                            echo $num1 +$num2;
                            break;
                        case '-':
                            echo $num1 - $num2;
                            break;
                        case '*':
                            echo $num1 * $num2;
                            break;
                        case '/':
                            echo $num1 / $num2;
                            break;

                    }
                }

//                if ( isset($options) && $options=='+'){
//                    echo $num1 +$num2;
//                }elseif($options=='-'){
//                    echo $num1 -$num2;
//                }elseif ($options=='*'){
//                    echo $num1 *$num2;
//                }else{
//                    echo $num1 /$num2;
//                }


                ?>

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