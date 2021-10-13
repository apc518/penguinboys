<!DOCTYPE html>
<html>
<head>
    <title>penguin boyz</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
<h2>List of all passengers</h2>
<p>
    <?php
        session_start();

        //prints success message
        if (isset($_SESSION['formSuccessMessage'])) {
          echo "<font color='#d0d'>" . $_SESSION['formSuccessMessage'] . "</font> <br /> <br />";
          unset($_SESSION['formSuccessMessage']);
        }

        //path to the SQLite database file
        $db_file = './myDB/airport.db';

        try {
            //open connection to the airport database file
            $db = new PDO('sqlite:' . $db_file);      // <------ Line 13

            //set errormode to use exceptions
            $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

            //return all passengers, and store the result set
            $stmt = $db->prepare("SELECT * FROM passengers WHERE ssn = ?");
            //$stmt->execute([$_GET['passenger_ssn']]);

            //loop through each tuple in result set and print out the data
            //ssn will be shown in blue (see below)
            // foreach($stmt as $tuple) {          // <------ Line 24
            //     echo "<font color='blue'>$tuple[ssn]</font> $tuple[f_name] $tuple[m_name] $tuple[l_name]<br/>\n";
            // }

            $query_str = "select * from passengers;";
            $result_set = $db->query($query_str);
            foreach($result_set as $tuple) {
              echo "<font color='#d0d'>$tuple[ssn]</font> $tuple[f_name] $tuple[m_name] $tuple[l_name] <a href='form_body.html?f_name=$tuple[f_name]&m_name=$tuple[m_name]&l_name=$tuple[l_name]&passenger_ssn=$tuple[ssn]'>update</a><br/>\n";
            }

            //disconnect from db
            $db = null;
        }
        catch(PDOException $e) {
            die('Exception : '.$e->getMessage());
        }
    ?>

</p>
</body>
</html>
