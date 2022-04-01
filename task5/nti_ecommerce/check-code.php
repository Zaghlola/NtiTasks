<?php

use app\models\User;

$title = 'Check Code';
include_once "layouts/header.php";
include_once "layouts/nav.php";
include_once "layouts/breadcrumb.php";
if (!empty($_SESSION['email'])) {
    header('location:signin.php');
    die;
}
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $errors = [];
    if (!empty($_POST['code'])) {
        $userObject = new User;
        $userObject->setVerification_code($_POST['code']);
        $userObject->setEmail($_SESSION['email']);
        $result = $userObject->checkCode();
        if ($result->num_rows == 1) {
            $verificationResult = $userObject->verifyUser();
            if ($verificationResult) {
                unset($_SESSION['email']);
                $success= "<p class='text-success font-weight-bold'>Correct Code </p>";
                header(' Refresh:3; url=signin.php');die;
            } 
            else {
                $errors['tryAgin'] = 'please Try agin later';
            }
        }else {
            $errors['wrong'] = 'Code Is wrong ';
        }
    } else {
        $errors['code'] = 'Code Is Required ';
    }
}
?>
<div class="login-register-area ptb-100">
    <div class="container">
        <div class="row">
            <div class="col-lg-7 col-md-12 ml-auto mr-auto">
                <div class="login-register-wrapper">
                    <div class="login-register-tab-list nav">
                        <a class="active" data-toggle="tab" href="#lg1">
                            <h4> <?= $title ?> </h4>
                        </a>

                    </div>
                    <div class="tab-content">
                        <div id="lg1" class="tab-pane active">
                            <div class="login-form-container">
                                <div class="login-register-form">
                                    <form method="post">
                                        <input type="number" name="code" placeholder="Enter Code">

                                       <?php 
                                       if(!empty($errors)){
                                           foreach($errors as $error){
                                               echo "<p class='text-danger font-weight-bold'> * {$error}</p>";
                                           }
                                       }
                                       echo $success ?? null;
                                       
                                       ?>
                                        <div class="button-box">

                                            <button type="submit"><span><?= $title ?></span></button>
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
include_once "layouts/footer.php";
include_once "layouts/footer-script.php";
?>