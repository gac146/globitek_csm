<?php

  // is_blank('abcd')
  function is_blank($value="") {
    // TODO
    return (strlen($value) == 0);
  }

  // has_length -- changed function to just compare the lower bound
  function has_min($value, $min) {
    // TODO
    $len = strlen($value);
    return ( $len >= $min );
  }

  //function to compare the upper bound since all fields data fields are require to have 256 or less
  function has_max($value){
    $max = 255;
    $len = strlen($value);
    return $len <= $max;
  }

  // has_valid_email_format('test@test.com')
  function has_valid_email_format($value) {
    // TODO
    if (strpos($value, '@') !== FALSE) return TRUE;
    else return FALSE;

  }
?>
