<?php

use App\Database\Models\User;
use App\Http\Requests\Validation;

$title = "Verification Code";
include"layouts/header.php";

$validation = new Validation;
if($_SERVER["REQUEST_METHOD"] == "POST"){
   
    $validation->setInput($_POST['verification_code'])->setInputName('verification_code')->required()->numeric()->digits(5);
    if(empty($validation->getErrors())){
        $user = new User;
        $user->setInput($_SESSION['email'])->setInputName($_POST['verification_code']);
       $result=  $user->checkCode();
       if($result !==false){
        if($result->num_rows==1){
            $user->setEmail_verification_at(date('yy mm  dd h:m:s'));
            if($user->verified()){
                if($_SESSION['page']== 'register'){
                   unset($_SESSION['verification-email']);
                    unset($_SESSION['page']);
                    header('location:login.php');

                }elseif($_SESSION['page']== 'verification-email'){
                    unset($_SESSION['verification_email']);
                    unset($_SESSION['page']);
                    header('location:index.php');

                }elseif($_SESSION['page']== 'forget'){
                    unset($_SESSION['page']);
                    header('location:index.php');
            }
        }
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
                            <h4>
                                <?$titl?>
                            </h4>
                        </a>

                    </div>
                    <div class="tab-content">
                        <div id="lg1" class="tab-pane active">
                            <div class="login-form-container">
                                <div class="login-register-form">
                                    <form action="login.php" method="post">
                                        <input type="number" name="verification_code" placeholder="verification code">

                                        <div class="button-box">
                                            <div class="login-toggle-btn">
                                                <input type="checkbox">
                                                <label>Remember me</label>
                                                <a href="#">Forgot Password?</a>
                                            </div>
                                            <button type="submit"><span>Verify</span></button>
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