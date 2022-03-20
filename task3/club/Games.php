<?php
session_start();
$numberOfMember=$_SESSION['memberNumber'];
$games=[
    'Football'=>300,
    'Swimming'=>250,
     'volley ball'=>150,
     'Other'=>100

];



if($_POST){
  $errors=[];

  $membersindex=[];
  
  $_SESSION['membersName']= [];
  $_SESSION['membersGame']= [];
 
     for($x=0;$x<$numberOfMember;$x++ ){

      // validation for name of member
     if(empty($_POST['memberName'.$x])){
      $errors['name_required']="<div class='text-danger font-weight-bold'>Please Enter Member Name </div>"; 
    }
    if( (is_numeric ($_POST['memberName'.$x]))){
      $errors['error-credentials']= "<div class='text-danger font-weight-bold my-1'>Please Enter Valid Name </div>";        
  }
    if(!(empty($_POST['memberName'.$x]))&&  !(is_numeric ($_POST['memberName'.$x]))){
      array_push($_SESSION['membersName'],$_POST['memberName'.$x] );   

    }
   //validation for member game 
    // if(empty($_POST['member'.$x])){
    //   $errors['game_required']="<div class='text-danger font-weight-bold'>Please Enter Member Game </div>";
     
    // }
    
      array_push( $_SESSION['membersGame'],$_POST['member'.$x] );   

    
    
  }
  

  if(empty($errors)){
    header('location:Result.php');
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
        <div class="col-4 offset-4">
            <form action="" method="post">
           <?php
            
            for($i=0;$i<$numberOfMember;$i++){
              $count=$i;

              ?>
            <div class="mt-2">
                <h2>Member<?=++$count ?> </h2>
                <input type="text" name="<?="memberName".$i?>" id="<?="memberName".$i ?>" class="w-100" placeholder="Enter Name">
                <?php
               
                foreach($games as $game =>$price){
                ?>
                <div class="form-check form-check-inline w-100 mt-2">
                <input class="form-check-input" type="checkbox" name="<?="member".$i."[]" ?>" id="<?="member".$i ?>" value="<?=$price ?>"  >
                <label class="form-check-label" for="member"><?=$game ." <strong>". $price ." "."LE </strong>" ?></label>
                </div>

                <?php
               
               }?>

            </div>


           <?php }  
           if(isset( $errors['name_required'])){
                  echo  $errors['name_required'];
                } 
            
                if(isset($errors['error-credentials'])){
                  echo  $errors['error-credentials'];
                } 
                ?>
            <div class="form-group text-center "> 
            <input type="submit" name="subscribe" value="Subscribe">
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