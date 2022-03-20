<?php
session_start();
if($_POST){

    $errors=[];
    if(empty($_POST['name']) ){
        $errors['name_required']="<div class='text-danger font-weight-bold'> Name Is Required </div>";
    }
    if(empty($_POST['memberNumber']) ){
        $errors['memberNumber_required']="<div class='text-danger font-weight-bold'> Number Required </div>";
    }
    
        if(empty($errors)){
            if(($_POST['memberNumber']<=0)|| ( is_numeric ($_POST['name']))){
                $errors['error-credentials']= "<div class='text-danger font-weight-bold my-1'>These Credentials are warning </div>";        
            }
        $_SESSION['name']=$_POST['name'];
        $_SESSION['memberNumber']=$_POST['memberNumber'];
        header('location:Games.php');

       

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
        <div class="col-12 text-center h1">
          Clue
        </div>
        <div class="col-4 offset-4 mt-5">
            <form action="" method="post">
            <div class="form-group ">
                <label for="name">Your Name</label>
                <input type="text" name="name" id="name" class="form-control" value="<?php echo(isset($_POST['name'])?  $_POST['name'] : ''  )?>" placeholder=" " aria-describedby="helpId">
                <p class='text-primary h6'> Clue Subscription Starts With <strong>10,000 LE</strong> </p>
                <?php 
                if(isset($errors['name_required'])){
                    echo $errors['name_required'];
                }
                ?>
            </div>
          
            <div class="form-group ">
                <label for="loanYears">Number Of Family Member</label>
                <input type="number" name="memberNumber" id="memberNumber" class="form-control" value="<?php echo(isset($_POST['loanYears'])?  $_POST['loanYears'] : ''  )?>">
                <p class='text-primary h6'> Cost Of Each Member <strong>2500 LE</strong> </p>
                <?php 
                if(isset($errors['memberNumber_required'])){
                    echo $errors['memberNumber_required'];
                }
                if(isset($errors['error-credentials'])){
                    echo $errors['error-credentials'];
                }

               
                ?>
            </div>
            <div class="form-group text-center ">
            <button class="btn btn-outline-dark rounded">Subscribe </button>
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