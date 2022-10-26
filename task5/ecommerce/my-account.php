<?php
$title = 'My Account';

use App\Database\Models\User;
use App\Http\Requests\Validation;


include "layouts/header.php";
include "App/Http/middlewares/auth.php";
include "layouts/nav.php";
include "layouts/breadcrumb.php";
$validation = new Validation;
if($_SERVER['REQUEST_METHOD']=='POST'){
    if(isset($_POST['update-profile'])){
        $validation->setInput($_POST['first_name'] ?? "")->setInputName('first_name')->required()->string()->between(2,16);
        $validation->setInput($_POST['last_name'] ?? "")->setInputName('last_name')->required()->string()->between(2,16);
        $validation->setInput($_POST['gender'] ?? "")->setInputName('gender')->required()->in(['m','f']);
        if(empty($validation->getErrors())){
          $user = new User;

            $user->setFirst_name($_POST['first_name'])->setLast_name($_POST['last_name'])
            ->setGender($_POST['gender'])->setEmail($_SESSION['user']->email);
         
          
          if($user->update()){
            $_SESSION['user']->first_name = $_POST['first_name'];
            $_SESSION['user']->last_name = $_POST['last_name'];
            $_SESSION['user']->gender = $_POST['gender'];

          }else{
            echo "error";
          }
        }
    }elseif(isset($_POST['change_password'])){
            $validation->setInput($_POST['old_password'] ?? "")->setInputName('password')->required();
            //->regex('/^(?=.*[A-Za-z])(?=.*\d)[A-Za-z\d]{8,32}$/','Wrong email or password');
            $validation->setInput($_POST['new_password'] ?? "")->setInputName('password')->required();
           // ->regex('/^(?=.*[A-Za-z])(?=.*\d)[A-Za-z\d]{8,32}$/','Wrong email or password');
            $validation->setInput($_POST['password_confirm'] ?? "")->setInputName('password')->required();
            if(empty($validation->getErrors())){
                if($_POST['new_password']===$_POST['password_confirm']){
                   $_SESSION['email']= 'smsm@gmail.com';
                    $user = new User;
                    $user->setEmail($_SESSION['email'])
                    ->setPassword($_POST['new_password']);
                    //print_r($user);die;
                    $user->changePassword($_POST['new_password']);
                    echo"password changed";
                }else{
                    echo "password error";
                }
            }
               

        
            
     }

}

?>

<!-- my account start -->
<div class="checkout-area pb-80 pt-100">
    <div class="container">
        <div class="row">
            <div class="ml-auto mr-auto col-lg-9">
                <div class="checkout-wrapper">
                    <div id="faq" class="panel-group">
                        <div class="panel panel-default">
                            <form method="post" enctype="multipart/form-data">
                                <div class="panel-heading">
                                    <h5 class="panel-title"><span>1</span> <a data-toggle="collapse" data-parent="#faq"
                                            href="#my-account-1">Edit your account information </a></h5>
                                </div>
                                <div id="my-account-1" class="panel-collapse collapse show">
                                    <div class="panel-body">
                                        <div class="billing-information-wrapper">
                                            <div class="account-info-wrapper">
                                                <h4>My Account Information</h4>
                                                <h5>Your Personal Details</h5>
                                            </div>
                                            <div class="row">

                                                <div class="col-lg-6 col-md-6">
                                                    <!-- <?php  
                                                                if($_SESSION['user']->image == 'default.jpg'){
                                                                    if($_SESSION['user']->gender == 'm'){
                                                                        $image = 'male.png';
                                                                    }else{
                                                                        $image = 'female.png';
                                                                    }
                                                                }else{
                                                                    $image = $_SESSION['user']->image;
                                                                }
                                                            ?> -->
                                                    <div class="billing-info">
                                                        <label>Your Image</label>
                                                        <input type="file">
                                                    </div>
                                                </div>
                                                <div class="col-lg-6 col-md-6">
                                                    <div class="billing-info">
                                                        <label>First Name</label>
                                                        <input type="text">
                                                    </div>
                                                </div>
                                                <div class="col-lg-6 col-md-6">
                                                    <div class="billing-info">
                                                        <label>Last Name</label>
                                                        <input type="text">
                                                    </div>
                                                </div>
                                                <div class="col-lg-12 col-md-12">
                                                    <div class="billing-info">
                                                        <label>Gender</label>
                                                        <select name="gender" class="form-control" id="">
                                                            <option
                                                                <?= $_SESSION['user']->gender == 'm' ? 'selected' : '' ?>
                                                                value="1">Male</option>
                                                            <option
                                                                <?= $_SESSION['user']->gender == 'f' ? 'selected' : '' ?>
                                                                value="0">Female</option>
                                                        </select>
                                                    </div>
                                                </div>

                                            </div>

                                            <div class="billing-btn">
                                                <button type="submit">Continue</button>
                                            </div>
                                        </div>
                                    </div>
                            </form>
                        </div>
                    </div>

                </div>
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h5 class="panel-title"><span>2</span> <a data-toggle="collapse" data-parent="#faq"
                                href="#my-account-2">Change your password </a></h5>
                    </div>
                    <div id="my-account-2" class="panel-collapse collapse">
                        <div class="panel-body">
                            <form method="post">
                                <div class="billing-information-wrapper">
                                    
                                    <div class="account-info-wrapper">
                                        <h4>Change Password</h4>
                                        <h5>Your Password</h5>
                                    </div>
                                    <div class="row">
                                    <div class="col-lg-12 col-md-12">
                                            <div class="billing-info">
                                                <label> Old Password</label>
                                                <input type="password"name='old_password'>
                                            </div>
                                        </div>
                                        <div class="col-lg-12 col-md-12">
                                            <div class="billing-info" >
                                                <label>New Password</label>
                                                <input type="password"name='new_password'>
                                            </div>
                                        </div>
                                        <div class="col-lg-12 col-md-12">
                                            <div class="billing-info">
                                                <label>Password Confirm</label>
                                                <input type="password"name='password_confirm'>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="billing-back-btn">
                                        <div class="billing-back">
                                            <a href="#"><i class="ion-arrow-up-c"></i> back</a>
                                        </div>
                                        <div class="billing-btn">
                                            <button type="submit" name="change_password">Continue</button>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h5 class="panel-title"><span>3</span> <a data-toggle="collapse" data-parent="#faq"
                                href="#my-account-3">Modify your address book entries </a></h5>
                    </div>
                    <div id="my-account-3" class="panel-collapse collapse">
                        <div class="panel-body">
                            <div class="billing-information-wrapper">
                                <div class="account-info-wrapper">
                                    <h4>Address Book Entries</h4>
                                </div>
                                <div class="entries-wrapper">
                                    <div class="row">
                                        <div class="col-lg-6 col-md-6 d-flex align-items-center justify-content-center">
                                            <div class="entries-info text-center">
                                                <p>Farhana hayder (shuvo) </p>
                                                <p>hastech </p>
                                                <p> Road#1 , Block#c </p>
                                                <p> Rampura. </p>
                                                <p>Dhaka </p>
                                                <p>Bangladesh </p>
                                            </div>
                                        </div>
                                        <div class="col-lg-6 col-md-6 d-flex align-items-center justify-content-center">
                                            <div class="entries-edit-delete text-center">
                                                <a class="edit" href="#">Edit</a>
                                                <a href="#">Delete</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="billing-back-btn">
                                    <div class="billing-back">
                                        <a href="#"><i class="ion-arrow-up-c"></i> back</a>
                                    </div>
                                    <div class="billing-btn">
                                        <button type="submit">Continue</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h5 class="panel-title"><span>4</span> <a href="wishlist.php">Modify your wish list </a>
                        </h5>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</div>
</div>
<!-- my account end -->
<!-- Footer style Start -->
<footer class="footer-area pt-75 gray-bg-3">
    <div class="footer-top gray-bg-3 pb-35">
        <div class="container">
            <div class="row">
                <div class="col-lg-3 col-md-6 col-sm-6">
                    <div class="footer-widget mb-40">
                        <div class="footer-title mb-25">
                            <h4>My Account</h4>
                        </div>
                        <div class="footer-content">
                            <ul>
                                <li><a href="my-account.php">My Account</a></li>
                                <li><a href="about-us.php">Order History</a></li>
                                <li><a href="wishlist.php">WishList</a></li>
                                <li><a href="#">Newsletter</a></li>
                                <li><a href="about-us.php">Order History</a></li>
                                <li><a href="#">International Orders</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 col-sm-6">
                    <div class="footer-widget mb-40">
                        <div class="footer-title mb-25">
                            <h4>Information</h4>
                        </div>
                        <div class="footer-content">
                            <ul>
                                <li><a href="about-us.php">About Us</a></li>
                                <li><a href="#">Delivery Information</a></li>
                                <li><a href="#">Privacy Policy</a></li>
                                <li><a href="#">Terms & Conditions</a></li>
                                <li><a href="#">Customer Service</a></li>
                                <li><a href="#">Return Policy</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 col-sm-6">
                    <div class="footer-widget mb-40">
                        <div class="footer-title mb-25">
                            <h4>Quick Links</h4>
                        </div>
                        <div class="footer-content">
                            <ul>
                                <li><a href="#">Support Center</a></li>
                                <li><a href="#">Term & Conditions</a></li>
                                <li><a href="#">Shipping</a></li>
                                <li><a href="#">Privacy Policy</a></li>
                                <li><a href="#">Help</a></li>
                                <li><a href="#">FAQS</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 col-sm-6">
                    <div class="footer-widget footer-widget-red footer-black-color mb-40">
                        <div class="footer-title mb-25">
                            <h4>Contact Us</h4>
                        </div>
                        <div class="footer-about">
                            <p>Your current address goes to here,120 haka, angladesh</p>
                            <div class="footer-contact mt-20">
                                <ul>
                                    <li>(+008) 254 254 254 25487</li>
                                    <li>(+009) 358 587 657 6985</li>
                                </ul>
                            </div>
                            <div class="footer-contact mt-20">
                                <ul>
                                    <li>yourmail@example.com</li>
                                    <li>example@admin.com</li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="footer-bottom pb-25 pt-25 gray-bg-2">
        <div class="container">
            <div class="row">
                <div class="col-md-6">
                    <div class="copyright">
                        <p><a target="_blank" href="https://www.templateshub.net">Templates Hub</a></p>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="payment-img f-right">
                        <a href="#">
                            <img alt="" src="assets/img/icon-img/payment.png">
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</footer>
<!-- Footer style End -->


<!-- all js here -->
<script src="assets/js/vendor/jquery-1.12.0.min.js"></script>
<script src="assets/js/popper.js"></script>
<script src="assets/js/bootstrap.min.js"></script>
<script src="assets/js/imagesloaded.pkgd.min.js"></script>
<script src="assets/js/isotope.pkgd.min.js"></script>
<script src="assets/js/ajax-mail.js"></script>
<script src="assets/js/owl.carousel.min.js"></script>
<script src="assets/js/plugins.js"></script>
<script src="assets/js/main.js"></script>
</body>

</html>