<?php
$title= 'forget password';
use App\Database\Models\User;
use App\Http\Requests\Validation;

include"layouts/header.php";
include "App/Http/middlewares/guest.php";
include"layouts/nav.php";
include"layouts/Breadcrumb.php";
$Validation = new Validation;

if($_SERVER['REQUEST_METHOD']=='POST'){
    
    
    $Validation->setInput($_POST['email']??'')->setInputName('email')->required()->regex('/^[\w-\.]+@([\w-]+\.)+[\w-]{2,4}$/')->unique();
    
    if(empty($Validation->getErrors())){
        $user = new User;
        $forgetPassword =rand(10000,99999);
        $user->setVerification_code($forgetPassword)->setEmail($_POST['email']);
       //$result =$user->updateVerificationCode();
       if($user->updateVerificationCode()){
        //send email

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
                            <h4> <?=$title?> </h4>
                        </a>

                    </div>
                    <div class="tab-content">
                        <div id="lg1" class="tab-pane active">
                            <div class="login-form-container">
                                <div class="login-register-form">
                                    <form  method="post">
                                        <input type="password" name="old_password" placeholder="old_password">
                                        <input type="password" name="new_password" placeholder="new_password">
                                        <input type="password" name="confirm_password" placeholder="confirm_password">
                                        
                                        <div class="button-box">
                                            
                                            <button type="submit"><span>submit</span></button>
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