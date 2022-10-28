<?php
$title = "Number";
  session_start();
  //print_r($_POST);
if($_SERVER['REQUEST_METHOD'] == "POST"){
 $_SESSION=$_POST;
echo $_POST['quest1'];
  $errors = [];
    if(empty($_POST['number'])){
        // error
        $errors['number'] = "<p class='text-danger font-weight-bold'> Number is required </p>";
    }
    if(empty($_POST['quest1'])){
      $errors['quest1'] = "<p class='text-danger font-weight-bold'> Answer Question 1 </p>";
    }
    if(empty($_POST['quest2'])){
      $errors['quest2'] = "<p class='text-danger font-weight-bold'> Answer Question 2 </p>";
    }
    if(empty($_POST['quest3'])){
      $errors['quest3'] = "<p class='text-danger font-weight-bold'> Answer Question 3 </p>";
    }
    if(empty($_POST['quest4'])){
      $errors['quest4'] = "<p class='text-danger font-weight-bold'> Answer Question 4 </p>";
    }
    if(empty($_POST['quest5'])){
      $errors['quest5'] = "<p class='text-danger font-weight-bold'> Answer Question 5 </p>";
    }
    
      
      
    
 
 if (isset($_POST['number'])) {
   # code...
  
   header("location:Review.php");
 }
}
?>

<!DOCTYPE html>
<html>
<head>
	<title><?=$title?></title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
        integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>
<body>
	<div class='container'>
		
		<div class="col-12 text-center mt-5">
            <h1> Hospital</h1>
        </div>
        <div class="col-12 text-center mt-5">
           <form method="post">
           	<div class="form-group">
           		<table  class="col-12 text-left mt-5">
           			<thead  >
           				<tr>
           				<th>Questions</th>
           				<th>Bad</th>
           				<th>Good</th>
           				<th>Very Good</th>
           				<th>Excellent</th>
           				</tr>
           			</thead>
           			<tbody>
           				<tr>
           					<td>Are you satisfied with the level of cleanliness?</td>
           					<td><input class="form-check-input" type="radio" value="0" name="quest1" ></td>
           					<td><input class="form-check-input" type="radio" value="3" name="quest1" ></td>
           					<td><input class="form-check-input" type="radio" value="5" name="quest1" ></td>
           					<td><input class="form-check-input" type="radio" value="10" name="quest1" ></td>
           				</tr>
                   
                  <tr>
                    <td>Are you satisfied with the service price?</td>
                    <td><input class="form-check-input" type="radio" value="0" name="quest2" ></td>
                    <td><input class="form-check-input" type="radio" value="3" name="quest2" ></td>
                    <td><input class="form-check-input" type="radio" value="5" name="quest2" ></td>
                    <td><input class="form-check-input" type="radio" value="10" name="quest2" ></td>
                  </tr>
                  

                  <tr>
                    <td>Are you satisfied with nursing service ?</td>
                    <td><input class="form-check-input" type="radio" value="0" name="quest3" ></td>
                    <td><input class="form-check-input" type="radio" value="3" name="quest3" ></td>
                    <td><input class="form-check-input" type="radio" value="5" name="quest3" ></td>
                    <td><input class="form-check-input" type="radio" value="10" name="quest3" ></td>
                  </tr>
                  
                    <td>Are you satisfied with level of the doctors?</td>
                    <td><input class="form-check-input" type="radio"value="0" name="quest4" ></td>
                    <td><input class="form-check-input" type="radio"value="3" name="quest4" ></td>
                    <td><input class="form-check-input" type="radio"value="5" name="quest4" ></td>
                    <td><input class="form-check-input" type="radio"value="10" name="quest4" ></td>
                  </tr>
                  
                  <tr>
                    <td>Are you satisfied with calmness of hospital?</td>
                    <td><input class="form-check-input" type="radio" value="0" name="quest5" ></td>
                    <td><input class="form-check-input" type="radio" value="3" name="quest5" ></td>
                    <td><input class="form-check-input" type="radio" value="5" name="quest5" ></td>
                    <td><input class="form-check-input" type="radio" value="10" name="quest5" ></td>
                  </tr>
                  
                  
           			</tbody>
           		</table>
           	</div>
                    
             <!-- <?$errors['quest5']??''?> -->
                  <div class="form-group">
                    <label for="number">number</label>
                    <input type="number"  class="form-control" placeholder="" aria-describedby="helpId"
                    name="number">
            
               
                    <input class="btn btn-primary" type="submit" value="Add Number">

                 <?=$errors['number']?? ""; ?>  
                </div>

           	




           </form>
        </div>
        
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