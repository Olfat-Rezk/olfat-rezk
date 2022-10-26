<?php

use App\Database\Models\User;
use App\Http\Requests\Validation;

include"layouts/header.php";
include "App/Http/middlewares/guest.php";
include"layouts/nav.php";
include"layouts/Breadcrumb.php";
$Validation = new Validation;

if($_SERVER['REQUEST_METHOD']=='POST'){
    
    
    $Validation->setInput($_POST['email']??'')->setInputName('email')->required();//->regex('/^[\w-\.]+@([\w-]+\.)+[\w-]{2,4}$/')->unique();
    $Validation->setInput($_POST['password'] ?? "")->setInputName('password')->required();
    //->regex('/^(?=.*[A-Za-z])(?=.*\d)[A-Za-z\d]{8,32}$/','Wrong email or password');
    if(empty($Validation->getErrors())){
        $user = new User;
        $user->setEmail($_POST['email'])->setPassword($_POST['email']);
       $result =$user->getUserByEmail();
       if( $result !=false){
            if($result->num_rows == 1){
                $resultFetched= $result->fetch_object();
                $_SESSION['user'] = $resultFetched;
    
                header('location:index.php');die;}
        
       }
    }
}
?>


<div class="login-register-area ptb-100">
    <div class="container">
        <div class="row">
            <div class="col-lg-7 col-md-12 ml-auto mr-auto">
                <div class="login-wrapper">
                    <div class="login-tab-list nav">
                        <a class="active" data-toggle="tab" href="#lg1">
                            <h4> login </h4>
                        </a>

                    </div>
                    <div class="tab-content">
                        <div id="lg1" class="tab-pane active">
                            <div class="login-form-container">
                                <div class="login-register-form">
                                    <form method="post">
                                        <input type="email" name="email" placeholder="email">
                                        <input type="password" name="password" placeholder="Password">
                                        <div class="button-box">
                                            <div class="login-toggle-btn">
                                                <input type="checkbox">
                                                <label>Remember me</label>
                                                <a href="#">Forgot Password?</a>
                                            </div>
                                            <button type="submit"><span>Login</span></button>
                                        </div>
                                    </form>
                                </div>
                            </div>
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