<?php session_start(); ?>

<html>
  <head>
        <title>penguin boyz</title>
        <link rel="stylesheet" href="style.css">
    </head>
    <body>

      <?php

      if (isset($_SESSION['error'])) {
        echo "ERROR: " . $_SESSION['error'];
        unset($_SESSION['error']);
      }

      ?>

      <?php
        if (isset($_GET['passenger_ssn'])){
          echo "<h1>Update Passenger Form</h1>";
        } else  {
          echo "<h1>New Passenger Form</h1>";
        }
      ?>

      <form action="form_handler.php" method="post">
        <label for="f_name">First name:</label><br>
        <?php
          if (isset($_GET['f_name'])){
            echo "<input type='text' id='f_name' name='f_name' value='" . $_GET['f_name'] ."'>";
          } else {
            echo "<input type='text' id='f_name' name='f_name'>";
          }
        ?>

        <br>

        <label for="m_name">Middle name:</label><br>
        <?php
          if (isset($_GET['m_name'])){
            echo "<input type='text' id='m_name' name='m_name' value='" . $_GET['m_name'] ."'>";
          } else {
            echo "<input type='text' id='m_name' name='m_name'>";
          }
        ?>

        <br>

        <label for="l_name">Last name:</label><br>
        <?php
          if (isset($_GET['l_name'])){
            echo "<input type='text' id='l_name' name='l_name' value='" . $_GET['l_name'] ."'>";
          } else {
            echo "<input type='text' id='l_name' name='l_name'>";
          }
        ?>

        <br>

        <label for="ssn">SSN:</label><br>
        <?php
          if (isset($_GET['passenger_ssn'])){
            echo "<input disabled type='text' id='ssn' name='ssn' placeholder='123-45-6789'
      pattern='[0-9]{3}-[0-9]{2}-[0-9]{4}' value='" . $_GET['passenger_ssn'] ."'>";

            echo "<input style='visibility:hidden' type='text' id='ssn' name='ssn' placeholder='123-45-6789'
      pattern='[0-9]{3}-[0-9]{2}-[0-9]{4}' value='" . $_GET['passenger_ssn'] ."'>";
          } else {
            echo "<input type='text' id='ssn' name='ssn' placeholder='123-45-6789'
      pattern='[0-9]{3}-[0-9]{2}-[0-9]{4}'>";
          }
        ?>

        <br><br>

        <?php
          if (isset($_GET['passenger_ssn'])){
            echo "<input type='submit' value='Update'>";
          } else  {
            echo "<input type='submit' value='Submit'>";
          }
        ?>
      </form>

</body></html>
