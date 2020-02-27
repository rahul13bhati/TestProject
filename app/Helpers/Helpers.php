<?php


  function checkPermission($permissions){
    $userAccess = Auth::User()->getRoles()->first();
    foreach ($permissions as $key => $value) {
      if($value == $userAccess){
        return true;
      }
    }
    return false;
  }

?>