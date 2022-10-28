<?php
$title = 'Result';
include"Review.php";
// print_r($_SESSION);
$result = $_SESSION['quest1']+$_SESSION['quest2']+$_SESSION['quest3']+$_SESSION['quest4']+$_SESSION['quest5'];

if ($result<=25) {
	# code...
	$message= "<p class='text-danger font-weight-bold text-center'> Total Review is Bad  </p>"
     ."<p class=' font-weight-bold text-center'>We will call you later on this phone</p> ". $_SESSION['number'];
}else{
	$message="<p class='font-wiegh-bold text-center'>Total Review is Good .</p>"."<br>"."<p class='font-wiegh-bold text-center'>Thank you</p>";

}
echo $message;

?>

