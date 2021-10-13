<?php

  // path to the SQLite database file
  $db_file = './myDB/airport.db';

  session_start();

   echo("First name: " . $_POST['f_name'] . "<br />\\n");
   echo("Middle name: " . $_POST['m_name'] . "<br />\\n");
   echo("Last name: " . $_POST['l_name'] . "<br />\\n");
   echo("SSN: " . $_POST['ssn'] . "<br />\\n");


  if (empty($_POST['f_name'])) {
    $_SESSION['error'] = 'Missing First Name';
    header('Location: http://129.114.19.115/~dbteam/form_body');
    exit;
  }
  if (empty($_POST['m_name'])) {
    $_SESSION['error'] = 'Missing Middle Name';
    header('Location: http://129.114.19.115/~dbteam/form_body');
    exit;
  }
  if (empty($_POST['l_name'])) {
    $_SESSION['error'] = 'Missing Last Name';
    header('Location: http://129.114.19.115/~dbteam/form_body');
    exit;
  }
  if (!ctype_alpha($_POST['f_name'])) {
    $_SESSION['error'] = 'First Name Must Be Alphabetic';
    header('Location: http://129.114.19.115/~dbteam/form_body');
    exit;
  }
  if (!ctype_alpha($_POST['m_name'])) {
    $_SESSION['error'] = 'Middle Name Must Be Alphabetic';
    header('Location: http://129.114.19.115/~dbteam/form_body');
    exit;
  }
  if (!ctype_alpha($_POST['l_name'])) {
    $_SESSION['error'] = 'Last Name Must Be Alphabetic';
    header('Location: http://129.114.19.115/~dbteam/form_body');
    exit;
  }
  if (empty($_POST['ssn'])) {
    $_SESSION['error'] = 'Missing SSN';
    header('Location: http://129.114.19.115/~dbteam/form_body');
    exit;
  }

  //open connection to the airport database file
  $db = new PDO('sqlite:' . $db_file);      // <------ Line 13

  //set errormode to use exceptions
  $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

  $personExistStmt = $db->prepare("SELECT ssn FROM passengers WHERE ssn = ?;");
  $personExistStmt->execute([$_POST['ssn']]);

  if($personExistStmt->rowCount() == 1){ // person already exists
    $stmt = $db->prepare("UPDATE passengers SET ? = ?, ? = ?, ? = ? WHERE ssn = ?;");
    $stmt->execute([$_POST['f_name'],$_POST['m_name'],$_POST['l_name'],$_POST['ssn']]);
  }
  else if($personExistStmt->rowCount() == 0){
    //return all passengers, and store the result set
    $stmt = $db->prepare("INSERT INTO passengers VALUES (?, ?, ?, ?);");
    $stmt->execute([$_POST['f_name'],$_POST['m_name'],$_POST['l_name'],$_POST['ssn']]);
  }
  else{
    // error condition
    $_SESSION['error'] = "This message should never be seen. Contact the admins, I guess :|";
    header('Location: form_body');
  }

  $_SESSION['formSuccessMessage'] = "We Will Take Care Of Your Information, For Sure Yes. ;)";
  header('Location: http://129.114.19.115/~dbteam/showPassengers.php');

  //disconnect from db
  $db = null;
?>
