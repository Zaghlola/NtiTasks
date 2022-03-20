<?php

$cities=[
    'Cairo'=>0,
    'Giza'=>30,
    'Alex'=>50,
    'Other'=>100
];


if($_POST){
    //first inputs in form
    $errors1=[];
    if(empty($_POST['name']) ){
        $errors1['name_required']="<div class='text-danger font-weight-bold'> Name Is Required </div>";
    }
    if(empty($_POST['numberVarieties']) ){
        $errors1['numberVarieties_required']="<div class='text-danger font-weight-bold'> Number of Varieties Is Required </div>";
    }
    if(($_POST['numberVarieties']<=0)|| ( is_numeric ($_POST['name']))){
        $errors1['error-credentials']= "<div class='text-danger font-weight-bold my-1'>These Credentials are warning </div>";

    }
    if(empty($errors1)){      

    }
     //sec inputs in form 
     $errors2=[];
    //  if(empty($_POST['name']) ){
    //     $errors1['name_required']="<div class='text-danger font-weight-bold'> Name Is Required </div>";
    // }



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
    <div class="row mt-5 align-center">
        <div class="col-12 text-center h1 mt-5">
            Login 
        </div>
        <div class="col-8 offset-2 ">
            <form action="" method="post">
            <div class="form-group col-6 offset-3 ">

                <label for="name">Enter Your name</label>    
                <input type="text" name="name" id="name" class="form-control" value="<?php echo(isset($_POST['name'])?  $_POST['name'] : ''  )?>" >
               <?php
                if(isset($errors1['name_required'])){
                    echo $errors1['name_required'];
                }
                ?>
            </div>

            <div class="form-group col-6 offset-3 ">
            <label for="numberVarieties"> City</label>
            <select class="form-select form-select-lg mb-3 w-100 p-2" name="city" aria-label="Default select example">
            <?php
            
            foreach($cities as $key => $value){
                ?>
                <option value="<?= $value?>" name="city" <?php if(isset($_POST['city'])){ if($_POST['city']==$value)echo 'selected'; }  ?>><?= $key ?></option>

            <?php }?>


            </select>
            </div>   

            <div class="form-group col-6 offset-3 ">
            <label for="numberVarieties"> Enter Number of Varieties</label>    
            <input type="number" name="numberVarieties" id="numberVarieties" class="form-control"  value="<?php echo(isset($_POST['numberVarieties'])?  $_POST['numberVarieties'] : ''  )?>" >
            <?php
            if(isset($errors1['numberVarieties_required'])){
                echo $errors1['numberVarieties_required'];
            }
            if(isset($errors1['error-credentials'])){
                echo $errors1['error-credentials'];
            }
            ?>
            </div>
          
            <div class="form-group text-center  ">
            <button class="btn btn-outline-dark rounded mb-2"> Enter Proudects </button>
            </div>
            <?php 
//  if( isset($_POST['name']) && isset($_POST['numberVarieties' ] ) && empty($errors1)   )
            if( isset($_POST['numberVarieties' ]) && empty($errors1)   ){
               
                $numberOfRows=$_POST['numberVarieties'];
                //(isset($_POST['submitForm2'])? 'hidden' :'')
                ?>
                <div class="<?=(isset($_POST['submitForm2'])? 'd-none' :'');?> ">
                <table class="table table-striped table-hover  " >
                    <thead>
                        <tr>
                            <th>
                            Prouduct Name
                            </th>
                            <th>
                            Prouduct Price
                            </th>
                            <th>
                            Product Question
                            </th>
                        </tr>
                    </thead>
                <tbody> 
                 <?php  
                 for($i=0;$i< $numberOfRows;$i++){
                     $prouductName="p{$i}";
                     $prouductPrice="pPrice{$i}";
                     $productQuestion="pQuestion{$i}";
                     ?>

                 <tr>
                   <td>                     
                   <input type="text" name="<?= $prouductName ?>" id="<?= $prouductName?>" class="form-control" value="<?php echo(isset($_POST[$prouductName])?  $_POST[$prouductName] : ''  )?>"   <?php echo(isset($_POST[$prouductName])? 'disabled' : ''  )?>>
                   </td>
                   <td>                     
                   <input type="number" name="<?= $prouductPrice ?>" id="<?= $prouductPrice?>" class="form-control"  value="<?php echo(isset($_POST[$prouductPrice])?  $_POST[$prouductPrice] : ''  )?>"    <?php echo(isset($_POST[$prouductName])? 'disabled' : ''  )?>>
                   </td>
                   <td>                     
                   <input type="number" name="<?= $productQuestion ?>" id="<?= $productQuestion ?>" class="form-control"    value="<?php echo(isset($_POST[$productQuestion])?  $_POST[$productQuestion] : ''  )?>"  <?php echo(isset($_POST[$prouductName])? 'disabled' : ''  )?> >
                   </td>
                 </tr>

                <?php  } ?>
                </tbody>
                </table>
                <div class="form-group text-center  ">
            <button class="btn btn-outline-dark rounded mb-2" name="submitForm2"> Receipt</button>
            </div>


           <?php  }?>
                 </div>
                 <?php
                 if(isset($_POST['submitForm2'])){?>
                        <p class="h2 text-center">Simple Invoice</p>
                    <table class="table table-striped table-hover  " >
                    <thead>
                        <tr>
                            <th>
                            Prouduct Name
                            </th>
                            <th>
                            Prouduct Price
                            </th>
                            <th>
                            Product Question
                            </th>
                            <th>
                                Sub Total
                          </th>
                        </tr>
                    </thead>
                <tbody> 
                    <?php 
                   $Total=0;
                    for($p=0 ; $p< $numberOfRows;$p++){  ?>
                    <tr>
                        <td><?= $_POST["p{$p}"]?></td>
                        <td><?= $_POST["pPrice{$p}"]?></td>
                        <td><?= $_POST["pQuestion{$p}"]?></td>
                        <td><?php
                        echo $subTotal=$_POST["pPrice{$p}"]*$_POST["pQuestion{$p}"];
                        $Total+=$subTotal?></td>
                    </tr>
                    <?php }
                    ?>
                    <tr>
                        <td colspan=4><hr></td></tr>
                    <tr>
                        <th colspan=3>
                            Clint Name
                        </th>
                        <td >
                        <?= $_POST['name'];?>
                        </td>
                    </tr>
                    <tr>
                        <th colspan=3>
                           Total
                        </th>
                        <td >
                        <?= $Total;?>
                        </td>
                    </tr>
                    <tr>
                        <th colspan=3>
                         Discount
                        </th>
                        <td >
                       <?php
                       if($Total<=1000){
                           $discount=0;
                       }
                       elseif($Total<=3000 && $Total>1000){
                        $discount=0.1;
                    }
                    elseif($Total<=4500 && $Total>3000){
                        $discount=0.15;
                    }
                    else{
                        $discount=0.2;
                    }
                    $discountPrice=$Total*$discount;
                    echo $discountPrice;
                       ?>
                        </td>
                    </tr>
                    <tr>
                        <th colspan=3>
                           Price After Discount
                        </th>
                        <td >
                        <?php 
                        $PriceAfterDiscount=$Total-$discountPrice;
                        echo $PriceAfterDiscount;?>
                        </td>
                    </tr>
                    <tr>
                        <th colspan=3>
                            Delivery
                        </th>
                        <td >
                        <?php
                        $deliv=0;
                        foreach($cities as $city=> $value){
                            if($_POST['city']==$value){
                                echo $deliv+=$value;
                            }
                        }
                        
                        ?>
                        </td>
                    </tr>
                    <tr>
                        <th colspan=3>
                            Net Total
                        </th>
                        <td >
                        <?= $PriceAfterDiscount + $deliv?>
                        </td>
                    </tr>
                 </tbody> 
                 </table>


                <?php }
                 

                
                 ?>
           
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