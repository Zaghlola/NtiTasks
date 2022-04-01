<?php
namespace app\requests;

use app\models\User;

class RegisterRequest{
   private $password,$password_confirmation,$email ,$phone ,$errors=[];

   /**
    * Get the value of password
    */ 
   public function getPassword()
   {
      return $this->password;
   }

   /**
    * Set the value of password
    *
    * @return  self
    */ 
   public function setPassword($password)
   {
      $this->password = $password;

      return $this;
   }

   /**
    * Get the value of password_confirmation
    */ 
   public function getPassword_confirmation()
   {
      return $this->password_confirmation;
   }

   /**
    * Set the value of password_confirmation
    *
    * @return  self
    */ 
   public function setPassword_confirmation($password_confirmation)
   {
      $this->password_confirmation = $password_confirmation;

      return $this;
   }

   /**
    * Get the value of email
    */ 
   public function getEmail()
   {
      return $this->email;
   }

   /**
    * Set the value of email
    *
    * @return  self
    */ 
   public function setEmail($email)
   {
      $this->email = $email;

      return $this;
   }

   /**
    * Get the value of phone
    */ 
   public function getPhone()
   {
      return $this->phone;
   }

   /**
    * Set the value of phone
    *
    * @return  self
    */ 
   public function setPhone($phone)
   {
      $this->phone = $phone;

      return $this;
   }
   public function passwordValidation($regExpMessage="Minimum 8 and maximum 32 characters, at least one uppercase letter, one lowercase letter, one number and one special character"){
     
       if(empty($this->password)){
           $this->errors['password']['required']= 'Password Is Required';
       }else{
          if(!preg_match('/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[@$!%*?&])[A-Za-z\d@$!%*?&]{8,32}$/',
          $this->password)) {
            $this->errors['password']['regex']= $regExpMessage;
            // 'Minimum 8 and maximum 32 characters, at least one uppercase letter, one lowercase letter, one number and one special character';
          }
       }
      
   }
   public function passwordConirmationValidation(){
    
    if(empty($this->password_confirmation)){
      $this->errors['password_confirmation']['required']= 'Password Confirmation Is Required';
      
    }else
    {
       if($this->password  !==  $this->password_confirmation) {
         $this->errors['password_confirmation']['confirmed']= 'Password Not Confirmed';
       }
    }
    
   }


   public function emailValidation($uniqueRole=true){
   
    if(empty($this->email)){
      $this->errors['email']['required']= 'Email Is Required';
    }else{
       if(!preg_match('/^([a-zA-Z0-9_\-\.]+)@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.)|(([a-zA-Z0-9\-]+\.)+))([a-zA-Z]{2,4}|[0-9]{1,3})(\]?)$/',
       $this->email)) {
         $this->errors['email']['regex']= 'Email Is Invalid';
       }
       else{
           if($uniqueRole){
               $user=new User;
               $user->setEmail($this->email);
               $result=$user->getUserByEmail();
               if($result->num_rows>=1){
                  $this->errors['email']['unique']= 'Email Already Exists';

               }
           }
       }
    }
   

}
public function phoneValidation($uniqueRole=true){
   
   if(empty($this->phone)){
      $this->errors['phone']['required']= 'phone Is Required';
   }else{
      if(!preg_match('//',
      $this->phone)) {
         $this->errors['phone']['regex']= 'phone Is Invalid';
      }
      else{
          if($uniqueRole){
              $user=new User;
              $user->setPhone($this->phone);
              $result=$user->getUserByPhone();
              if($result->num_rows>=1){
               $this->errors['phone']['unique']= 'Phone Already Exists';

              }
          }
      }
   }
 

}
   public function errors(){
      return $this->errors; 
   }
   public function getError($key=''){
      return $this->errors[$key] ?? [];
   }
   public function getErrorMessage($key =''){
      if(!empty($this->getError($key))){
         foreach($this->getError($key) AS $error){
             return "<p class='text-danger font-weight-bold'>*{$error}</p>";
         }
     }
   }

}
