<?php

if($_POST){
    //fNumber 
    //sNumber
    //tNumber
    if(($_POST['fNumber']== $_POST['sNumber'] )&& ($_POST['fNumber']==$_POST['tNumber'])){
        $maxNumber=$_POST['fNumber'];
        $result="<div class='alert alert-success'>
        <p>
        The three numbers are equal : $maxNumber </p>
        </div>
      
        ";
    }
    else{
    if(($_POST['fNumber']>= $_POST['sNumber'] )&& ($_POST['fNumber']>=$_POST['tNumber']))
    {
        
        $maxNumber=$_POST['fNumber'];
        $result="<div class='alert alert-success'>
        <p>Max Number is First Number: $maxNumber </p>
      
        ";
        if($_POST['sNumber']>=$_POST['tNumber']){
            $minNumber=$_POST['tNumber'];
            $result .="
            <p>Min Number is Third Number: $minNumber </p>
            </div>
            ";

        }
        else{
            $minNumber=$_POST['sNumber'];
            $result .="
            <p>Min Number is Second Number: $minNumber </p>
            </div>
            ";
        }
     

    }
    elseif(($_POST['sNumber']>= $_POST['fNumber'] )&& ($_POST['sNumber']>=$_POST['tNumber'])){
        $maxNumber=$_POST['sNumber'];
     $result="<div class='alert alert-success'>
     <p>Max Number is Second Number: $maxNumber </p>
    
     ";
     if($_POST['fNumber']>= $_POST['tNumber']){
        $minNumber=$_POST['tNumber'];
        $result .="
        <p>Min Number is Third Number: $minNumber </p>
        </div>
        ";

     }
     else{
        $minNumber=$_POST['fNumber'];
        $result .="
        <p>Min Number is First Number: $minNumber </p>
        </div>
        "; 
     }
   
    }
    else{
        $maxNumber=$_POST['tNumber'];
     $result="<div class='alert alert-success'>
     <p>Max Number is Third Number: $maxNumber </p>
    
     ";
     if($_POST['fNumber']>= $_POST['sNumber']){
        $minNumber=$_POST['sNumber'];
        $result .="
        <p>min Number is Second Number: $minNumber </p>
        </div>
        ";

     }
     else{
        $minNumber=$_POST['fNumber'];
        $result .="
        <p>min Number is First Number: $minNumber </p>
        </div>
        "; 
     }

   
    }

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
                 Max & Min Number 
              </div>
              <div class="col-4 offset-4 mt-5">
                    <form action="" method="post">
                        <div class="form-group">
                          <input type="number" name="fNumber" id="fNumber" class="form-control" placeholder="Enter First Number" aria-describedby="helpId">
                         
                        </div>
                        <div class="form-group">
                          <input type="number" name="sNumber" id="sNumber" class="form-control" placeholder="Enter Second Number" aria-describedby="helpId">
                         
                        </div>
                        <div class="form-group">
                          <input type="number" name="tNumber" id="tNumber" class="form-control" placeholder="Enter Third Number" aria-describedby="helpId">
                         
                        </div>
                       
                        <div class="form-group text-center">
                           <button class="btn btn-outline-primary"> Calc </button>
                        </div>
                        <?php  if(isset($result)){
                            echo $result;
                        } ?>
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