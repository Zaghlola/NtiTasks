<?php
session_start();


 define('Max_Rev',50);
$reviewDgr=array_sum($_SESSION['allUserReview']);
 
foreach($_SESSION['allUserReview'] as $key => $value){
  $patientReview; 
}
$Totalreview='';
if($reviewDgr <=50 && $reviewDgr >=45){
  $Totalreview ='Exceellent';

}
elseif($reviewDgr <45 && $reviewDgr >=35){
  $Totalreview ='Very Good';

}
elseif($reviewDgr <35 && $reviewDgr >=25){
  $Totalreview ='Good';

}
else{
  $Totalreview ='Bad';
}
$Message='';
if($reviewDgr>=(Max_Rev/2)){
  $Message="<div class='alert alert-success m-0'> Thanks</div>" ;
  
}else{
    $Message="<div class='alert alert-danger m-0'> Please contact the patient to find out the reason for the bad evaluation " . $_SESSION['phone'] . "</div>" ;
    
    
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
           Result
        </div>
        <div class="col-8 offset-2 mt-2">
        <table class="table table-striped table-hover">
            <thead> 
            <tr>
              <?php
               
                if(isset ($_SESSION ['question'])){
                 ?>
                 <th> Questions</th>

              <?php }
              if(isset ($_SESSION ['allUserReview'])){
                ?>
                <th> Reviews</th>
              <?php

              }
                ?>
              </tr>
              </thead>
              <tbody>
              <?php
             for($i=0; $i<5; $i++){
                 ?>
                 
                 <tr> 
                   <?php
                 ?> 

                   <td>
                     <?= $_SESSION['question'][$i]?>

                   </td>
                   <td>
                     <?php 
                     if($_SESSION['allUserReview'][$i]==0){
                      echo 'Bad';
                     } elseif($_SESSION['allUserReview'][$i]==3){
                      echo 'Good';
                     }
                     elseif($_SESSION['allUserReview'][$i]==5){
                      echo 'Very Good';
                     }
                     elseif($_SESSION['allUserReview'][$i]==10){
                      echo 'Excellent';
                     }
                     
                      ?>
                   </td>

                   <?php 
                    }
                   ?>


                <!--      -->
                 </tr>
                 <tr class ="alert alert-info">
                   <td>Total Review</td>
                   <td><?=  $Totalreview?></td>
                  </tr>
                  <tr class="p-0">
                   
                   <td  colspan="2" class="text-center m-0"><?= $Message?></td>
                  </tr>

             

              </tbody>

              </table>
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