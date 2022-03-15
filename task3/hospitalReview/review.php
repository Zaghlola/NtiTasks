

 <?php
session_start();

  $review=[
    [
        'Question'=>'Are you satisfied with the level of cleanliness?',
        'Bad'=>0,
        'Good'=>3,
        'Very Good'=>5,
        'Excellent'=>10,
        

    ],
    [
        'Question'=>'Are you satisfied with the service prices?',
        'Bad'=>0,
        'Good'=>3,
        'Very Good'=>5,
        'Excellent'=>10

    ],
    [
        'Question'=>'Are you satisfied with the nursing service?',
        'Bad'=>0,
        'Good'=>3,
        'Very Good'=>5,
        'Excellent'=>10

    ],
    [
        'Question'=>'Are you satisfied with the level of the doctor?',
        'Bad'=>0,
        'Good'=>3,
        'Very Good'=>5,
        'Excellent'=>10

    ],
    [
        'Question'=>'Are you satisfied with the calmness in the hospital?',
        'Bad'=>0,
        'Good'=>3,
        'Very Good'=>5,
        'Excellent'=>10

    ]

    ]; $questionReview=[];
    foreach($review as $keys =>$questions){
        foreach($questions as $key =>$question){
           
            if($key=='Question'){
                array_push($questionReview,$question );
               
            }

        }
       
    }
    $_SESSION['question']=$questionReview;
   

 if($_POST){
     $error='';
     
     
     if(isset($_POST['q1']) && isset($_POST['q2']) && isset($_POST['q3']) && isset($_POST['q4']) && isset($_POST['q5'])){
         $_SESSION['allUserReview']=[
            $_POST['q1'],
            $_POST['q2'],
            $_POST['q3'],
            $_POST['q4'],
            $_POST['q5']
         ];

       
        header('location:result.php'); die;

     }
     else{
        $error .="<div class='text-danger font-weight-bold'> Please Checked All Questions </div>"; 
     };

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
           Review
        </div>
        <div class="col-8 offset-2 mt-2">
            <form action="" method="post">
            <table class="table table-striped table-hover">
            <thead> 
            <tr>
                <?php  
                
                foreach($review[0] as $key => $question){

                    ?>
              <th><?= $key ?></th>
               <?php }?>
                </tr>
            </thead>
            <tbody>
                <?php
                 $count=1;
                foreach($review as $index => $value){
                ?>
                <tr>
                    <?php
                    
                foreach($value as $key => $question){ 
                   
                    if(is_string($question)){
                        ?>
                       <td>
                           <?= $question ?> 
                        </td>
                     <?php
                    }
                    if(is_int($question))
                    {
                    ?>
                    <td> <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="q<?=$count?>" id="inlineRadio1" value="<?= $question?>">
                    
                    </div> 
                    </td>
                    <?php } ?>
                

               <?php }
               
               
               ?>
               
                </tr>
                 <?php  $count++; } ?>
            </tbody>
            </table>
            <?php
             if(!empty($error)){
                 echo $error;
             }
            ?>
            <div class="form-group text-center ">
            <button class="btn btn-outline-dark rounded col-6">Submit </button>
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