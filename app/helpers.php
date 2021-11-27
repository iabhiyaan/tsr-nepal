<?php

function checkNonchangeAbleIdentifier($identifier){
  $noChangeIdentifier = ['podcast', 'video', 'openwriting', 'openreading'];

    if(in_array($identifier, $noChangeIdentifier)){
      return true;
    }else {
      return false;
    }

}




















 ?>
