<?php

if($_POST){
    // define('MaxResult',250);
    $MaxResult=250;
  $physics =$_POST['physics']  ;
  $chemi =$_POST['chemi']  ;
  $biology =$_POST['biology']  ;
  $math =$_POST['math'] ; 
  $computer =$_POST['computer']  ;

  if(($physics >50 || $physics <0)||($chemi >50 || $chemi <0)||
  ($biology >50 || $biology <0)||($math >50 || $math <0)||($computer >50 || $computer <0)){
    $result="<div class='alert alert-danger'>
    <p>
    Enter valid number
    </p>
    </div>
    ";
  }
  else{
      $totalResult=$physics+$chemi+$biology+$math+$computer;
      $presentResult=($totalResult/$MaxResult)*100;
      if($presentResult>=90){
          $grade="A";

      }
      elseif(($presentResult<90) && ($presentResult>=80) ){
        $grade="B";

      }
      elseif(($presentResult<80) && ($presentResult>=70) ){
        $grade="C";

      }
      elseif(($presentResult<70) && ($presentResult>=60) ){
        $grade="D";

      } 
       elseif(($presentResult<60) && ($presentResult>=40) ){
        $grade="E";

      }
      else{
        $grade="F";

      }


      $result="
      <div class='alert alert-success'>
        <p>
          Max Total Grade :$MaxResult
        </p>
        <p>
         Your Total Grade :$totalResult
        </p>
        <p>
         Percentage  :$presentResult %
        </p>
        <p>
        Grade  :$grade
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
                 Enter Your Grade
              </div>
              <div class="col-6 offset-3 mt-2">
                    <form action="" method="post">
                       <div class="row">
                       <div class="form-group col-6">
                        <label for="physics">Enter Physics grade</label>

                          <input type="number" name="physics" id="physics" class="form-control" placeholder="" aria-describedby="helpId">
                          <!-- Physics, Chemistry, Biology, Mathematics and Computer -->
                        </div>
                        <div class="form-group col-6">
                           <label for="chemi">Enter Chemistry grade</label>
                          <input type="number" name="chemi" id="chemi" class="form-control" placeholder=" " aria-describedby="helpId">
                         
                        </div>
                       </div>

                        <div class="row">
                        <div class="form-group col-6">
                           <label for="biology">Enter Biology grade</label>
                          <input type="number" name="biology" id="biology" class="form-control" placeholder=" " aria-describedby="helpId">
                         
                        </div>
                        <div class="form-group col-6">
                           <label for="math">Enter Mathematics grade</label>
                          <input type="number" name="math" id="math" class="form-control" placeholder=" " aria-describedby="helpId">
                         
                        </div>
                        </div>
                       <div class="row">
                       <div class="form-group col-6 offset-3">
                           <label for="computer">Enter Computer grade</label>
                          <input type="number" name="computer" id="computer" class="form-control" placeholder=" " aria-describedby="helpId">
                         
                        </div>
                       </div>

                        <div class="row">
                        <div class="form-group text-center col-6 offset-3">
                           <button class="btn btn-outline-primary mt-4 w-100"> Your Result </button>
                        </div>
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