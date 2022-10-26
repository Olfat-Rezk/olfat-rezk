

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
            <h1> Result </h1>
        </div>
        <div class="col-4 offset-4 mt-5">
            <form  method="post">
                <div class="form-group">
                    <label for="number">Physics</label>
                    <input type="number" name="Physics" id="number" class="form-control" placeholder="" aria-describedby="helpId">
                </div>

                <div class="form-group">
                    <label for="number">Chemistry</label>
                    <input type="number" name="Chemistry" id="number" class="form-control" placeholder="" aria-describedby="helpId">
                </div>

                <div class="form-group">
                    <label for="number"> Biology</label>
                    <input type="number" name="Biology" id="number" class="form-control" placeholder="" aria-describedby="helpId">
                </div>

                <div class="form-group">
                    <label for="number">Mathematics </label>
                    <input type="number" name="Mathematics" id="number" class="form-control" placeholder="" aria-describedby="helpId">
                </div>

                <div class="form-group">
                    <label for="number">Computer </label>
                    <input type="number" name="Computer" id="number" class="form-control" placeholder="" aria-describedby="helpId">
                </div>
                <div class="form-group">
                    <button class="btn btn-outline-danger rounded form-control"> Result </button>
                </div>
            </form>
            <?php
            if ($_POST){
                $phy = $_POST['Physics'];
                $chem = $_POST['Chemistry'];
                $bio = $_POST['Biology'];
                $math = $_POST['Mathematics'];
                $comp = $_POST['Computer'];
                define('MAX_GRADE',100);

                if ($phy<0 or $phy>MAX_GRADE){
                    echo 'Error';die();
                }
                if ($chem<0 or $chem>MAX_GRADE){
                    echo 'Error';die();
                }
                if ($bio<0 or $bio>MAX_GRADE){
                    echo 'Error';die();
                }
                if ($math<0 or $math>MAX_GRADE){
                    echo 'Error';die();
                }
                if ($comp<0 or $comp>MAX_GRADE){
                    echo 'Error';die();
                }
                $result = ($phy + $chem + $bio + $math + $comp)/(MAX_GRADE*5) ;
                $percentage = $result*100;
//            echo $percentage;
                if ($percentage >0 && $percentage<40){
                    echo "percentage : " . $percentage ." => F";
                }elseif ($percentage>=40 && $percentage<60){
                    echo "percentage : " . $percentage ." => E";
                }elseif ($percentage>=60 && $percentage<70){
                    echo "percentage : " . $percentage ." => D";
                }elseif ($percentage>=70 && $percentage<80){
                    echo "percentage : " . $percentage ." => C";
                }elseif($percentage>=80 && $percentage<90){
                    echo "percentage : " . $percentage ." => B";
                }else{
                    echo "percentage : " . $percentage ." => A";

                }
            }

            ?>
        </div>
    </div>
</div>
<!-- Optional JavaScript -->
<!-- jQuery first, then Popper.js, then Bootstrap JS -->
<!--<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>-->
<!--<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>-->
<!--<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>-->
</body>
</html>

