<?php

if($_POST){
   
  $fNumber=$_POST['fNumber'];
  $sNumber=$_POST['sNumber'];
  $operator=$_POST['operator'];
//   if($operator='+'){
//     $result=$fNumber +  $sNumber;
//     $mesg="<div class='alert alert-success'>
//     <p>
//     Result =  $result  
//     </p>
//     </div>    
//     ";    
      
//   }
  switch ($operator) {
    case "+":
      $result=$fNumber +  $sNumber;
      $mesg="<div class='alert alert-success'>
      <p>
      Result =  $result  
      </p>
      </div>    
      ";    
      break;
    case "-":
        $result=$fNumber -  $sNumber;
        $mesg="<div class='alert alert-success'>
        <p>
        Result =  $result  
        </p>
        </div>    
        ";    
        break;
    case "*":
        $result=$fNumber *  $sNumber;
        $mesg="<div class='alert alert-success'>
        <p>
        Result =  $result  
        </p>
        </div>    
        ";    
        break;
      case "/":
        $result=$fNumber /  $sNumber;
        $mesg="<div class='alert alert-success'>
        <p>
        Result =  $result  
        </p>
        </div>    
        ";    
        break;
        case "%":
            $result=$fNumber %  $sNumber;
            $mesg="<div class='alert alert-success'>
            <p>
            Result =  $result  
            </p>
            </div>    
            ";    
            break;
    default:
    $mesg="<div class='alert alert-danger'>
    <p>
    Enter valid Operator

    </p>
    </div>
  
    ";
  }
  
 



    
}

?>
<!doctype html>
<html lang="en">
  <head>
    <title>Title</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  </head>
  <body>
      <div class="container">
          <div class="row ">
              <div class="col-12 mt-5 text-center text-primary font-weight-bold h3">
              Simple Calculator
              </div>
              <div class="col-8 offset-2 mt-4">
                    <form action="" method="post">
                       <div class="row">
                       <div class="form-group col-4">
                       

                          <input type="number" name="fNumber" id="fNumber" class="form-control" placeholder=" Enter First Number" aria-describedby="helpId">
                        </div>
                        <div class="form-group col-4 h6">
                           
                           <input type="text" name="operator" id="operator" class="form-control " placeholder=" Enter Operator  " aria-describedby="helpId">
                          
                         </div>
                        <div class="form-group col-4">
                           
                          <input type="number" name="sNumber" id="sNumber" class="form-control" placeholder=" Enter Second Number" aria-describedby="helpId">
                         
                        </div>
                       </div>
                       <?php  if(isset($mesg)){
                            echo $mesg;
                        } ?>

                      
                        <div class="row">
                        <div class="form-group text-center col-6 offset-3">
                           <button class="btn btn-outline-primary mt-4 w-50 py-0 h2" style="font-size: 30px;"> <strong>=</strong></button>
                        </div>
                       </div>
                       <div class="col-12 mt-5 text-center text-primary font-weight-bold h5">
                        Our Operators
                        </div>
                       <div class="row">
                        <div class="form-group text-center col-3 ">
                           <button class="btn btn-outline-primary mt-4 w-50 py-0 h2" style="font-size: 30px;"> <strong>+</strong></button>
                        </div>
                        <div class="form-group text-center col-3 ">
                           <button class="btn btn-outline-primary mt-4 w-50 py-0 h2" style="font-size: 30px;"> <strong>-</strong></button>
                        </div>
                        <div class="form-group text-center col-3 ">
                           <button class="btn btn-outline-primary mt-4 w-50 py-0 h2" style="font-size: 30px;"> <strong>*</strong></button>
                        </div>
                        <div class="form-group text-center col-3 ">
                           <button class="btn btn-outline-primary mt-4 w-50 py-0 h2" style="font-size: 30px;"> <strong>/</strong></button>
                        </div>
                        <div class="form-group text-center offset-4 col-4 ">
                           <button class="btn btn-outline-primary mt-4 w-50 py-0 h2" style="font-size: 30px;"> <strong>%</strong></button>
                        </div>
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