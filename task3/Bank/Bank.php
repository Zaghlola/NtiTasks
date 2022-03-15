<?php

if($_POST){

    $errors=[];
    if(empty($_POST['name']) ){
        $errors['name_required']="<div class='text-danger font-weight-bold'> Name Is Required </div>";
    }
    if(empty($_POST['loanAmount']) ){
        $errors['loanAmount_required']="<div class='text-danger font-weight-bold'> Loan Amount Is Required </div>";
    }
    if(empty($_POST['loanYears']) ){
        $errors['loanYears_required']="<div class='text-danger font-weight-bold'> Loan Years Is Required </div>";
    }
    if(($_POST['loanAmount']<=0)||($_POST['loanYears']<=0)|| ( is_numeric ($_POST['name']))){
        $errors['error-credentials']= "<div class='text-danger font-weight-bold my-1'>These Credentials are warning </div>";

    }
$lessthan3years = 0.1;
$morethan3years = 0.15;
$convertYearsToMonth = $_POST['loanYears']*12;
if($_POST['loanYears']<3){
    $bankBenefits= $_POST['loanAmount']*$lessthan3years;
  
}
else{
    $bankBenefits= $_POST['loanAmount']*$morethan3years;
}
$totalBenefits=$bankBenefits*$_POST['loanYears'];
$totalAmount=$_POST['loanAmount']+ $totalBenefits;
$amountMonthly=$totalAmount/$convertYearsToMonth;
$drawTable="
            <table class='table table-striped table-hover'>
            <thead> 
            <tr>
            <th>
            User Name
            </th>
            <th>
           Interest Rate
            </th>
            <th>
            Loan After Interest 
            </th>
            <th>
           Monthly
            </th>
            </tr>
            </thead>
            <tbody>
            <tr>
            <td>{$_POST['name'] }</td>
            <td>{$totalBenefits}</td>
            <td>{$totalAmount}</td>
            <td>{$amountMonthly}</td>
            </tr>
            </tbody>
            </table>";
          
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
          Bank System
        </div>
        <div class="col-4 offset-4">
            <form action="" method="post">
            <div class="form-group ">
                <label for="name">Your Name</label>
                <input type="text" name="name" id="name" class="form-control" value="<?php echo(isset($_POST['name'])?  $_POST['name'] : ''  )?>" placeholder=" " aria-describedby="helpId">
                <?php 
                if(isset($errors['name_required'])){
                    echo $errors['name_required'];
                }
                ?>
            </div>
            <div class="form-group ">
                <label for="loanAmount">Loan Amount</label>
                <input type="number" name="loanAmount" id="loanAmount" class="form-control" value="<?php echo(isset($_POST['loanAmount'])?  $_POST['loanAmount'] : ''  )?>">
                <?php 
                if(isset($errors['loanAmount_required'])){
                    echo $errors['loanAmount_required'];
                }
                
                ?>
            </div>
            <div class="form-group ">
                <label for="loanYears">Loan Years</label>
                <input type="number" name="loanYears" id="loanYears" class="form-control" value="<?php echo(isset($_POST['loanYears'])?  $_POST['loanYears'] : ''  )?>">
                <?php 
                if(isset($errors['loanYears_required'])){
                    echo $errors['loanYears_required'];
                }
                if(isset($errors['error-credentials'])){
                    echo $errors['error-credentials'];
                }

               
                ?>
            </div>
            <div class="form-group text-center ">
            <button class="btn btn-outline-dark rounded">Calculate </button>
            </div>
            </form>

        </div>
        <div class="col-8 offset-2">
            <?php
            
            if(isset($_POST['name']) && isset($_POST['loanAmount']) && isset($_POST['loanYears'])){
                echo $drawTable;

            }

            ?>

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