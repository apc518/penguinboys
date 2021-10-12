<?php
   echo("First name: " . $_POST['f_name'] . "<br />\\n");
   echo("Middle name: " . $_POST['m_name'] . "<br />\\n");
   echo("Last name: " . $_POST['l_name'] . "<br />\\n");
   echo("SSN: " . $_POST['ssn'] . "<br />\\n");


  if (empty($_POST['f_name'])) {
    header('Location: http://129.114.19.115/~dbteam/form.html?error=missingFirstName');

    echo "First name is empty!";
  }
  if (empty($_POST['m_name'])) {
    header('Location: http://129.114.19.115/~dbteam/form.html?error=missingMiddleName');

    echo "Middle name is empty!";
  }
  if (empty($_POST['l_name'])) {
    header('Location: http://129.114.19.115/~dbteam/form.html?error=missingLastName');

    echo "Last name is empty!";
  }
  if (empty($_POST['ssn'])) {
    header('Location: http://129.114.19.115/~dbteam/form.html?error=missingSSN');

    echo "ssn is empty!";
  }
?>
