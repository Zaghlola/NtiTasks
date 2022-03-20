<?php
session_start();

$numberOfMember=$_SESSION['memberNumber'];
$membersName=$_SESSION['membersName'];
$games=['Football','Swimming','Volly Ball','Other']
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
        <div class="col-8 offset-2 ">
       
        
        <table class="table table-striped table-hover">
            <thead> 
            <tr>
              <th colspan=5>
                Subscriber
              </th>
              <th>
                <?= $_SESSION['name']?>
              </th>
            </tr>
           </thead>
           <tbody>
               <?php
                $total=0;
                $footballGame=0;
                $swimmingGame=0;
                $volleyGame=0;
                $otherGame=0;
               for($i=0;$i<$numberOfMember;$i++){ ?>               
                
                <tr>
                    <td>
                      <?= $membersName[$i]?>
                     </td>
                        <?php  
                        for($x=0;$x<4;$x++){?>
                         <td>
                         <?php if(!(empty ($_SESSION['membersGame'][$i][$x]))){
                           if($_SESSION['membersGame'][$i][$x]==300){
                             echo 'Football';
                             $footballGame++;

                           }
                           elseif($_SESSION['membersGame'][$i][$x]==250){
                            echo 'Swimming';
                            $swimmingGame++;
                          }
                          elseif($_SESSION['membersGame'][$i][$x]==150){
                            echo 'Volley ball';
                            $volleyGame++;
                          }elseif($_SESSION['membersGame'][$i][$x]==100){
                            echo 'Other';
                            $otherGame++;
                          }
                          
                         } ;?>
                         </td>
                        

                      <?php  }
                        ?>
                         <td>
                           <?php
                           if(empty($_SESSION['membersGame'][$i])){
                             echo 0  .' <strong>EGP</strong>';
                             $total +=0;
                           }
                           else{
                            echo array_sum($_SESSION['membersGame'][$i])  .' <strong>EGP</strong>'; 
                            $total +=array_sum($_SESSION['membersGame'][$i]);
                           }   ?>
                        </td>
                        </tr>
                        <?php }   ?>
                      <tr>
                        <td colspan=5>
                          Total Games                          
                      </td>
                      <td >
                          <?= $total  .' <strong>EGP</strong>';?>                       
                        </td>
                      </tr>
               </tbody>
             </table>
            </div>

            <!--table2-->
       <div class="col-6 offset-3 "> 
         <p class="h2 text-center"> Simple Invoice</p>
       <table class="table table-striped table-hover">         
          <tbody>
           <?php 
           foreach($games as $index =>$game){?>
           <tr>
             <td >
               <?= $game .' Club'; ?>
           </td>
           <td>
             <?php 
             if($game=='Football'){
               echo $footballGame*300 .' <strong>EGP</strong>';
             }
             elseif($game=='Swimming'){
              echo $swimmingGame*250  .' <strong>EGP</strong>';
            }
            elseif($game=='Volly Ball'){
              echo $volleyGame*150  .' <strong>EGP</strong>';
            }
            else{
              echo $otherGame*100  .' <strong>EGP</strong>';
            }
             ?>
           </td>
           </tr>
           <?php }?>
           <tr>
             <td>
               <?= 'Club Subscription'; ?>
             </td>
             <td>
               <?php
               $ClubSub= (10000+($numberOfMember*2500));
               echo $ClubSub;
               ?>
             </td>
           </tr>
           <tr>
             <td>
             <?= 'Total Price'; ?>
             </td>
             <td>
               <?= $ClubSub+ $total?>
             </td>
           </tr>
          </tbody>
        </table>
      </div>


 <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  </body>
</html>
