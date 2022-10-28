
<?php
if ($_SERVER['REQUEST_METHOD']=='POST') {
	$errors = [];
	if (empty($_POST['name'])) {
		$errors['name'] = 'Please , enter your name';
		
	}
	if (empty($_POST['loanAmount'])) {
		# code...
		$errors['loanAmount'] = "<p class='text-danger font-weight-bold'> Please , enter your Loan Amount </p>";
	}

	if (empty($_POST['loanYears'])) {

		# code...
		$errors['loanYears'] = "<p class='text-danger font-weight-bold'> Please , enter your Loan Amount </p>";
		
	}

}



?>
<!doctype html>
<html lang="en">

<head>
    <title>Bank</title>
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
            <h1> Bank</h1>
        </div>
        <div class="col-4 offset-4 mt-5">
            <form method="post">
                <div class="form-group">
                    <label for="name">User Name </label>
                    <input type="name" name="name" id="name" required class="form-control" value="<?= $_POST['name'] ?? "" ?>" placeholder="" aria-describedby="helpId">
                    <?= $errors['name'] ?? "" ?>
                </div>
                <div class="form-group">
                    <label for="loanAmount">Loan Amount</label>
                    <input type="loanAmount" name="loanAmount" id="loanAmount" class="form-control" placeholder="" aria-describedby="helpId">
                    <?= $errors['loanAmount'] ?? "" ?>
                </div>
                <div class="form-group">
                    <label for="loanYears">Loan Amount</label>
                    <input type="loanYears" name="loanYears" id="loanYears" class="form-control" placeholder="" aria-describedby="helpId">
                    <?= $errors['loanYears'] ?? "" ?>
                </div>
                <div class="form-group">
                    <input class="btn btn-primary" type="submit" name="calculate"value="calculate">
                </div>
            </form>
        </div>
    </div>

    <?php
    //print_r($_POST);

     if (empty($_POST['calculate'])) {

    	# code..
    	die();}else{
    	if ($_POST['loanYears']<=3) {
    		# code...
    		$insertedRate = 0.1 * $_POST['loanAmount'];
    		$loanAfterInser = $insertedRate + $_POST['loanAmount'];
    		$monthly = $loanAfterInser/($_POST['loanYears']*12);
    	}else{
    		$insertedRate = 0.15 * $_POST['loanAmount'];
    		$loanAfterInser = $insertedRate + $_POST['loanAmount'];
    		$monthly = $loanAfterInser/($_POST['loanYears']*12);
    	}

  }

    ?>

    <table class="table table-hover">
    	<thead>
    		<th><?='User Name'?></th>
    		<th><?='Inserted Rate'?></th>
    		<th><?='Loan After Insert '?></th>
    		<th><?='Monthly'?></th>
    	</thead>
    	<tbody>
    		<td><?=$_POST['name']?></td>
    		<td><?=$insertedRate?></td>
    		<td><?=$loanAfterInser?></td>
    		<td><?=$monthly?></td>

    	</tbody>
    </table>
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
