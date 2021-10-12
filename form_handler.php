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

    echo "First name is empty!";
  }
  if (empty($_POST['m_name'])) {
    $_SESSION['error'] = 'Missing Middle Name';
    header('Location: http://129.114.19.115/~dbteam/form_body');
    exit;

    echo "Middle name is empty!";
  }
  if (empty($_POST['l_name'])) {
    $_SESSION['error'] = 'Missing Last Name';
    header('Location: http://129.114.19.115/~dbteam/form_body');
    exit;

    echo "Last name is empty!";
  }
  if (empty($_POST['ssn'])) {
    $_SESSION['error'] = 'Missing SSN';
    header('Location: http://129.114.19.115/~dbteam/form_body');
    exit;

    echo "ssn is empty!";
  }

  //open connection to the airport database file
  $db = new PDO('sqlite:' . $db_file);      // <------ Line 13

  //set errormode to use exceptions
  $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

  //return all passengers, and store the result set
  $stmt = $db->prepare("INSERT INTO passengers VALUES (?, ?, ?, ?);");
  $stmt->execute([$_POST['f_name'],$_POST['m_name'],$_POST['l_name'],$_POST['ssn']]);

  $_SESSION['formSuccessMessage'] = "We Will Take Care Of Your Information, For Sure Yes. ;)";
  header('Location: http://129.114.19.115/~dbteam/showPassengers.php');

  //disconnect from db
  $db = null;
?>
