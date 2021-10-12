<?php

  session_start();

   echo("First name: " . $_POST['f_name'] . "<br />\\n");
   echo("Middle name: " . $_POST['m_name'] . "<br />\\n");
   echo("Last name: " . $_POST['l_name'] . "<br />\\n");
   echo("SSN: " . $_POST['ssn'] . "<br />\\n");


  if (empty($_POST['f_name'])) {
    $_SESSION['error'] = 'Missing First Name';
    header('Location: http://129.114.19.115/~dbteam/form.php');
    exit;

    echo "First name is empty!";
  }
  if (empty($_POST['m_name'])) {
    $_SESSION['error'] = 'Missing Middle Name';
    header('Location: http://129.114.19.115/~dbteam/form.php');
    exit;

    echo "Middle name is empty!";
  }
  if (empty($_POST['l_name'])) {
    $_SESSION['error'] = 'Missing Last Name';
    header('Location: http://129.114.19.115/~dbteam/form.php');
    exit;

    echo "Last name is empty!";
  }
  if (empty($_POST['ssn'])) {
    $_SESSION['error'] = 'Missing SSN';
    header('Location: http://129.114.19.115/~dbteam/form.php');
    exit;

    echo "ssn is empty!";
  }
?>
