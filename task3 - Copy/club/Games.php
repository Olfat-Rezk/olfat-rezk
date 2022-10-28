<?php
session_start();
print_r($_SESSION);
// $arr = array[null];
if($_POST['calculate']) {
    if(isset($_POST['memberFamily0'])){
    
        
        for($i=0;$i<$_SESSION['countFamily'];$i++){
          $arr[$i] = $_SESSION['memberFamily'.$i];
        }
    }
    //   print_r($arr);
}
?>

<!doctype html>
<html lang="en">

<head>
    <title>Games</title>
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
                <h1> Games</h1>
            </div>
            <div class="col-4 offset-4 mt-5">
                <form method="post" action="Result.php">
                <input type="hidden" name="name" value="<?= $_POST['name']??'' ?>">
                    <div class="form-group">
                        <label for="name">Member Name </label>
                        <input type="name" name="name" id="name" value="<?=$_SESSION['name'] ?? "" ?>" placeholder=""
                            aria-describedby="helpId">

                    </div>
                    <div class="form-group">
                        <label for="countFamily">count of family</label>
                        <input type="countFamily" name="countFamily" id="countFamily"
                            value="<?=$_SESSION['countFamily'] ?? "" ?>" class="form-control" placeholder=""
                            aria-describedby="helpId">

                    </div>
                    <?php for($i=0;$i<$_SESSION['countFamily'];$i++){?>

                    <label for="memberFamily">Member[<?=$i?>]</label>
                    
                    <input type="memberFamily" name="member[$i][name]" id="memberFamily" value="" class="form-control"
                        placeholder="" aria-describedby="helpId">

                       

                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" value="300" id="football<?$i?>" name="member[<?$i?>][games][football]">
                        <label class="form-check-label" for="Football">
                            Football(300 EGP)
                        </label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" value="250" id="swimming<?$i?>"
                            name="member[<?$i?>][games][swimming]">
                        <label class="form-check-label" for="swimming">
                            Swimming (250 EGP)
                        </label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" value="150" id="Volley[$i]" name="member[<?$i?>][games][volly]">
                        <label class="form-check-label" for="Volley">
                            Volley ball (150 EGP)
                        </label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" value="100" id="other[$i]" name="member[<?$i?>][games][other]">
                        <label class="form-check-label" for="Other">
                            Other (100 EGP)
                        </label>
                    </div>



                    <?php  } ?>




                    <div class="form-group">
                        <input class="btn btn-primary" type="submit" name="calculate" value="submit">
                    </div>
                </form>
            </div>
        </div>
        <footer class="w-100 bg-dark text-light text-center py-2" style="position: fixed;bottom:0;">
            All Rights Reserved
        </footer>
        <!-- Optional JavaScript -->
        <!-- jQuery first, then Popper.js, then Bootstrap JS -->
        <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
            integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous">
        </script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"
            integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous">
        </script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"
            integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous">
        </script>
</body>

</html>