<?php
// dynamic table
// dynamic rows
// dynamic columns
// check if gender of user == m ==> male
// check if gender of user == f ==> female

$users = [
    (object)[
        'id' => 1,
        'name' => 'ahmed',
        "gender" => (object)[
            'gender' => 'm'
        ],
        'hobbies' => [
            'football', 'swimming', 'running'
        ],
        'activities' => [
            "school" => 'drawing',
            'home' => 'painting',
            

        ],
        'phone'=>'098766'
        
    ],
    (object)[
        'id' => 2,
        'name' => 'mohamed',
        "gender" => (object)[
            'gender' => 'm'
        ],
        'hobbies' => [
            'swimming', 'running',
        ],
        'activities' => [
            "school" => 'painting',
            'home' => 'drawing'
        ],
        'phone'=>''
    ],
    (object)[
        'id' => 3,
        'name' => 'menna',
        "gender" => (object)[
            'gender' => 'f'
        ],
        'hobbies' => [
            'running',
            
        ],
        'activities' => [
            "school" => 'painting',
            'home' => 'drawing'
        ],
        'phone'=>''
    ],  
];

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
                Students Table
              </div>
              <div class="col-12 mt-5 text-center text-primary h5">
                  <?php if(!(empty($users))){?>
              <table class="table table-hover">
  <thead>
    <tr>
        <?php 
         foreach($users[0] as $key => $value){
            ?> 
             <th>
             <?php 
               echo ucwords($key);
             
             ?>


             </th>
            <?php 
             } ?>
    
    </tr>
  </thead>
  <tbody>
  <?php 
         foreach($users as $index => $user){
            ?> 
    <tr>
     <?php    
           foreach($users[$index] as $key => $userInfo){
     ?>
     <td>
     <?php 
      if(is_object($userInfo))
      {
          foreach($userInfo as $key => $gend){
              if($gend=='m'){
                  echo 'male';
              }
              else{
                echo 'female';
              }

          }
          
      }
      elseif(is_array($userInfo)){
        echo implode(',' ,$userInfo)   ;       

    }
    elseif(empty($userInfo)){
        echo '-';
    }
      else{
        echo $userInfo;
    }
     ?>
     </td>
     <?php } ?>

    </tr>
    <?php } ?>
   
  </tbody>
</table>
<?php } ?>
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