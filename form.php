<?php
   echo("First name: " . $_POST['f_name'] . "<br />\\n");
   echo("Middle name: " . $_POST['m_name'] . "<br />\\n");
   echo("Last name: " . $_POST['l_name'] . "<br />\\n");
   echo("SSN: " . $_POST['ssn'] . "<br />\\n");


  if (empty($_POST['f_name'])) {
    echo "First name is empty!";
  }
  if (empty($_POST['m_name'])) {
    echo "Middle name is empty!";
  }
  if (empty($_POST['l_name'])) {
    echo "Last name is empty!";
  }
  if (empty($_POST['ssn'])) {
    echo "ssn is empty!";
  }
?>
