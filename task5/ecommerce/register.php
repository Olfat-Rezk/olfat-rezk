<?php

use App\Database\Models\User;
use App\Http\Requests\Validation;
// include 'App\Http\Requests\Validation';
$title ="Register";

include"layouts/header.php";
include "App/Http/middlewares/guest.php";
include"layouts/nav.php";
include"layouts/Breadcrumb.php";

$Validation = new Validation;

if($_SERVER['REQUEST_METHOD']=='POST'){
    // [
    //     'first_name'=>['required','string','between:2,10'],
    //     'last_name'=>['required','string','between:2,10'],
    //     'email'=>['required','regular exep','unique:users.email'],
    //     'phone'=>['required','regular exep','unique:users,phone'],
    //     'password'=>['required','regular exep','confirmed:pass_confirm'],
    //     'pass_confirm'=>['required'];
    //     'gender'=>['required','in:"f","m"']
    // ]
    // var_dump($_POST['email']??'');die;
    $Validation->setInput($_POST['first_name'] ??'')->setInputName('first_name')->required()->string()->between(2,10);
    $Validation->setInput($_POST['last_name']??'')->setInputName('last_name')->required()->string()->between(2,10);
    $Validation->setInput($_POST['email']??'')->setInputName('email')->required();
    //->regex('/^([a-zA-Z0-9_\-\.]+)@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.)|(([a-zA-Z0-9\-]+\.)+))([a-zA-Z]{2,4}|[0-9]{1,3})(\]?)$/')->unique();
    $Validation->setInput($_POST['phone']??'')->setInputName('phone')->required();
    //->regex('/^01[0-2,5]{1}[0-9]{8}$/')->unique();
    $Validation->setInput( $_POST['password']?? "")->setInputName('password')->required();
    //->regex('/^(?=.*[A-Za-z])(?=.*\d)[A-Za-z\d]{8,32}$/','Wrong email or password');
    $Validation->setInput($_POST['pass_confirm']??'')->setInputName('pass_confirm')->required();
    $Validation->setInput($_POST['gender']??'')->setInputName('gender')->required()->in(['f','m']);

    if(empty($Validation->getErrors())){
        // echo"no validation errors";die;
        $verification_code= rand(10000,99999);
        $user = new User;
        $user->setFirst_name($_POST['first_name'])
        ->setLast_name($_POST['last_name'])
        ->setEmail($_POST['email'])
        ->setPhone($_POST['phone'])
        ->setPassword($_POST['password'])
        ->setGender($_POST['gender'])
        ->setVerification_code($verification_code);
      $user->create();
      echo"success";
     //print_r($user);
    //send email
    }


}
?>


<div class="login-register-area ptb-100">
    <div class="container">
        <div class="row">
            <div class="col-lg-7 col-md-12 ml-auto mr-auto">
                <div class="register-wrapper">
                    <div class="register-tab-list nav">

                        <a class="active" data-toggle="tab" href="#lg2">
                            <h4> register </h4>
                        </a>
                    </div>

                    <div id="lg2" class="tab-pane">
                        <div class="login-form-container">
                            <div class="login-register-form">
                                <form method="post">
                                    <input type="text" name="first_name" placeholder="First name">
                                    <?=$Validation->getErrorMessage('first_name') ?>
                                    <input type="text" name="last_name" placeholder="Last name">
                                    <?=$Validation->getErrorMessage('last_name') ?>
                                    <input name="email" placeholder="Email" type="email">
                                    <?=$Validation->getErrorMessage('email') ?>
                                    <input name="phone" placeholder="Phone" type="number">
                                    <?=$Validation->getErrorMessage('phone') ?>
                                    <input type="password" name="password" placeholder="Password">
                                    <?=$Validation->getErrorMessage('password') ?>
                                    <input type="password" name="pass_confirm" placeholder="Password confirmed">
                                    <?=$Validation->getErrorMessage('pass_confirm') ?>
                                    <select name="gender" class="form-control">
                                        <option value="m">Male</option>
                                        <option value="f">Female</option>
                                    </select>
                                    <?=$Validation->getErrorMessage('gender') ?>

                                    <div class="button-box mt-5">
                                        <button type="submit"><span>Register</span></button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</div>
<?php
include"layouts/footer.php";
include"layouts/scripts.php";
?>