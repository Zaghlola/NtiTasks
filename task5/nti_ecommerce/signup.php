<?php
$title = 'Sign Up';
use app\models\User;
use app\helpers\Hash;
// use app\mail\verificationMail;
// use app\mail\verificationMail;
use app\mail\verificationMail;
use app\requests\RegisterRequest;


include_once "layouts/header.php";
include_once "layouts/nav.php";
include_once "layouts/breadcrumb.php";

$registerRequest = new RegisterRequest;

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    $errors = [];
    $registerRequest->setEmail($_POST['email']);
    $registerRequest->emailValidation();
    $registerRequest->setPhone($_POST['phone']);
    $registerRequest->phoneValidation();
    $registerRequest->setPassword($_POST['password']);
    $registerRequest->passwordValidation();
    $registerRequest->setPassword_confirmation($_POST['password_confirmation']);
    $registerRequest->passwordConirmationValidation();

    if (empty($registerRequest->errors())) {
        $verificationCode = rand(10000, 99999);
        $hashedPassword = Hash::make($_POST['password']);
        $user = new User;
        $result = $user->setfirst_name($_POST['first_name'])
            ->setLast_name($_POST['last_name'])
            ->setEmail($_POST['email'])
            ->setPhone($_POST['phone'])
            ->setPassword($hashedPassword)
            ->setVerification_code($verificationCode)
            ->create();

        if ($result) {
            $subject = 'verfication Code';
            $body = "<div>
                    <p> Hello {$_POST['first_name']} {$_POST['last_name']}</p>
                    <p>Your Verifiction Code :<strong>{$verificationCode}</strong></p>
                    </div>";
            $verificationMail = new verificationMail($_POST['email'], $subject, $body);
            $verificationMailResult = $verificationMail->send();
            
            if ($verificationMailResult) {               
                header('location:check-code.php');
                die;
            } else {
                $errors['mail'] = 'somthing went wrong';
            }
        } else {
            $errors['insert'] = 'somthing wrong';
        }
    }
}

?>
<div class="login-register-area ptb-100">
    <div class="container">
        <div class="row">
            <div class="col-lg-7 col-md-12 ml-auto mr-auto">
                <div class="login-register-wrapper">
                    <div class="login-register-tab-list nav">

                        <a class="active" data-toggle="tab" href="#lg2">
                            <h4> <?= $title ?> </h4>
                        </a>
                    </div>
                    <div class="tab-content">

                        <div id="lg2" class="tab-pane active">
                            <div class="login-form-container">
                                <div class="login-register-form">
                                    <?php
                                    if (!empty($errors)) {
                                        foreach ($errors as $error) {
                                            echo "<div class='alert alert-danger'><strong>{$error}</strong></div>";
                                        }
                                    }

                                    ?>
                                    <form  method="post">
                                        <input type="text" name="first_name" placeholder="First Name" value="<?= old('first_name') ?>">
                                        <input type="text" name="last_name" placeholder="Last Name" value="<?= old('last_name') ?>">
                                        <input type="tel" name="phone" placeholder="Phone" value="<?= old('phone') ?>">
                                        <?= $registerRequest->getErrorMessage('phone') ?>
                                        <input name="email" placeholder="Email" type="email" value="<?= old('email') ?>">
                                        <?= $registerRequest->getErrorMessage('email') ?>
                                        <input type="password" name="password" placeholder="Password">
                                        <?= $registerRequest->getErrorMessage('password') ?>
                                        <input type="password" name="password_confirmation" placeholder="Password Confirmation">
                                        <?= $registerRequest->getErrorMessage('password_confirmation') ?>
                                        <select>
                                            <option <?= old('gender') == 'm' ? 'selected' : '' ?> value="m">Male</option>
                                            <option <?= old('gender') == 'f' ? 'selected' : '' ?> value="f">Female</option>
                                        </select>
                                        <div class="button-box mt-3">
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