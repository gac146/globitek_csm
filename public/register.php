

<?php
  require_once('../private/initialize.php');
  
  //setting default time zone
  date_default_timezone_set('America/Los_Angeles');

  // Set default values for all variables the page needs.
  $first_name = "";
  $last_name = "";
  $email = "";
  $user_name = "";

  //min range values
  $range_min_name = 2;
  $range_min_user = 8;

  //strings to be displayed in case of error
  $first_name_str = "First Name";
  $last_name_str = "Last Name";
  $email_str = "Email";
  $user_name_str = "User Name";
  $blank_str = " cannot be blank";
  $out_of_range = " must be between 2 and 255 characters";
  $user_name_range = "User Name must be at least 8 characters";
  $email_not_valid = "Email must be valid format";  
  $user_name_taken = "The usser name entered is already in use";
  $email_taken = "The email entered is already in use";

  //extra control vairables
  $error = FALSE;
  $blank = FALSE;
  $errors_arr = array();
  $date = date("Y-m-d H:i:s");


  // if this is a POST request, process the form
  // Hint: private/functions.php can help
  if( is_post_request() ){  

    // Confirm that POST values are present before accessing them
    if(isset($_POST['btn_submit'])) {
      
      if( is_blank($_POST['first_name']) ){
        array_push($errors_arr, $first_name_str . $blank_str);
        $error = TRUE;
      }else{          
        $first_name = $_POST['first_name'];
      } 

      if( is_blank($_POST['last_name']) ){
        array_push($errors_arr, $last_name_str . $blank_str);
        $error = TRUE;
      }else{          
        $last_name = $_POST['last_name'];
      } 

      if( is_blank($_POST['email']) ){
        array_push($errors_arr, $email_str . $blank_str);
        $error = TRUE;
      }else{          
        $email = $_POST['email'];
      } 

      if( is_blank($_POST['user_name']) ){
        array_push($errors_arr, $user_name_str . $blank_str);
        $error = TRUE;
      }else{          
        $user_name = $_POST['user_name'];
      } 
    }

    
      // Perform Validations
      // Hint: Write these in private/validation_functions.php
      if( !has_max($first_name) || !has_min($first_name, $range_min_name) ){
        if( strlen($first_name) > 0){
          array_push($errors_arr, $first_name_str . $out_of_range);
          $error = TRUE;
        }
      }

      if( !has_max($last_name) || !has_min($last_name, $range_min_name) ){
        if( strlen($last_name) > 0 ){
          array_push($errors_arr, $last_name_str . $out_of_range);
          $error = TRUE;
        }
      }

      if( !has_max($email) || !has_min($email, $range_min_name) ){
        if( strlen($email) > 0){
          array_push($errors_arr, $email_str . $out_of_range);
          $error = TRUE;
        }
      }

      if ( !has_valid_email_format($email) ) {
        array_push($errors_arr, $email_not_valid);
        $error = TRUE;
      }

      if( !has_min($user_name, $range_min_user)){
        if(strlen($user_name) > 0 && strlen($user_name) < 8 ){
          array_push($errors_arr, $user_name_range);
          $error = TRUE;
        }
      }

      //checking if user name or email already exist
      if(!$error){
        $query1 = $db->query("SELECT user_name FROM users WHERE user_name='".$user_name."'");
        $query2 = $db->query("SELECT email FROM users WHERE email='".$email."'");

        if ( $query1->num_rows != 0)
        {
          array_push($errors_arr, $user_name_taken);
          $error = TRUE;
        }

        if ( $query2->num_rows != 0)
        {
          array_push($errors_arr, $email_taken);
          $error = TRUE;
        }
      }
     
    
    // if there were no errors, submit data to database
    if( !$error ){

      // Write SQL INSERT statement
       $sql = "INSERT INTO users (first_name, last_name, email, user_name, created_at) VALUES ('$first_name','$last_name','$email','$user_name', '$date' )";

      // For INSERT statments, $result is just true/false
       $result = db_query($db, $sql);
       if($result) {
        db_close($db);

      //TODO redirect user to success page
        redirect_to('../public/registration_success.php');

       } else {
      //   // The SQL INSERT statement failed.
      //   // Just show the error, not the form
         echo db_error($db);
         db_close($db);
         exit;
      }
    }
  }
?>

<?php $page_title = 'Register'; ?>
<?php include(SHARED_PATH . '/header.php'); ?>

<div id="main-content">
  <h1>Register</h1>
  <p>Register to become a Globitek Partner.</p>

  <?php
    // TODO: display any form errors here
    // Hint: private/functions.php can help
  if(isset($_POST['btn_submit'])){
    if($error){
      $arr = display_errors($errors_arr);
      print_r($arr);
    }
  }
  ?>

  <!-- TODO: HTML form goes here -->
  <form action="register.php" method="post">  
  
    First name:<br>
    <input type="text" name="first_name" value=<?php echo h($first_name); ?> ><br>
  
    Last Name:<br>
    <input type="text" name="last_name" value=<?php echo h($last_name); ?>><br>
  
    Email:<br>
    <input type="text" name="email" value=<?php echo h($email); ?>><br>
  
    Username:<br>
    <input type="text" name="user_name" value=<?php echo h($user_name); ?>><br>
  
    <br>
  
    <input type="submit" value="Submit" name="btn_submit">
  </form>


</div>

<?php include(SHARED_PATH . '/footer.php'); ?>
