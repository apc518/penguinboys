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

      <h1>New Passenger Form</h1>

      <form action="form_handler.php" method="post">
        <label for="f_name">First name:</label><br>
        <input type="text" id="f_name" name="f_name">

        <br>

        <label for="m_name">Middle name:</label><br>
        <input type="text" id="m_name" name="m_name">

        <br>

        <label for="l_name">Last name:</label><br>
        <input type="text" id="l_name" name="l_name">

        <br>

        <label for="ssn">SSN:</label><br>
        <input type="text" id="ssn" name="ssn" placeholder="123-45-6789"
  pattern="[0-9]{3}-[0-9]{2}-[0-9]{4}">

        <br><br>

        <input type="submit" value="Submit">
      </form>

</body></html>