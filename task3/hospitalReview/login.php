<?php

session_start();

if($_POST){
    $errors=[];
    if(empty($_POST['phone']) ){
        $errors['phone_required']="<div class='text-danger font-weight-bold'> Phone Is Required </div>";
    }

    if(empty($errors)){
    $_SESSION['phone']=$_POST['phone'];
   
    header('location:review.php');die;
    }



}





?>



<!doctype html>

<html lang="en">
  <head>
    <title>Login</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  </head>
  <body>

  <div class="container">
    <div class="row mt-5">
        <div class="col-12 text-center h1 mt-5">
            Login 
        </div>
        <div class="col-4 offset-4 mt-2">
            <form action="" method="post">
            <div class="form-group ">

                <label for="phone">Please Enter Your Phone</label>    
                <input type="text" name="phone" id="phone" class="form-control" placeholder="* 01000---" aria-describedby="helpId">
               <?php
                if(isset($errors['phone_required'])){
                    echo $errors['phone_required'];
                }
                ?>
            </div>
          
            <div class="form-group text-center ">
            <button class="btn btn-outline-dark rounded">Submit </button>
            </div>
            </form>
        </div>
    </div>
</div>


    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  </body>
</html>