<!-- Practice Lab Test #2, Task 1 (PHP)-->
<!-- EECS1012 - York University -->
<!DOCTYPE html>
<html>
<head>
<style>
  #appointments {
    width: 70%;
    margin: auto;
    border: dashed 2px black;
    background-color: silver;
    padding: 10px;
  }
  #confirmation {
    width: 70%;
    margin: auto;
    border: solid 2px black;
    padding: 10px;
    margin-bottom: 10px;
  }
  #container {
    width: 80%;
    padding: 10px;
    background-color: LightSkyBlue;
    margins: auto;
    border: solid 5px black;
    font-size: 1.25em;
  }
  #container .info {
    background-color: silver;
  }
</style>
</head>
<body>

  <?php
  /* turn on error message for debugging */
  ini_set('display_errors', 1); # only need to call these functions
  error_reporting(E_ALL);       # one time

  /*     print_r($_GET); */
                                        # I'm getting the variables in the order
                                        # they appear in the HTML form, but you
                                        # can do this however you like.
    $lastname = $_GET["surname"];       # Get the variables
    $firstname = $_GET["firstname"];    # using _$GET associative array
    $date = $_GET["date"];              #

    if (isset($_GET["first"])) {        # Since "first" was a checkbox
                                        # if it wasn't clicked, it won't be set.
      $first = "Yes";                   # in this case, we use "isset()" to check.
    }                                   # if it is set, we set $first = "yes"
    else {
        $first = "No";                  # otherwise, set it to "No"
    }

    $payment = $_GET["payment"];        # Get the other form data
    $symptoms = $_GET["symptoms"];
    $additional = $_GET["additional"];

  ?>

   <div id="container">
   <div id="confirmation">
   <?php
    $bS= '<span class="info"> ';      # define some strings for less typing
    $eS = '</span> ';                 # when printing out the spans.

    # printing out the variables as required by the task.
    # The $bS and $bE stand for span begin and span end
    # This just makes the code more compact
    print "<h1> Booking Confirmation </h1> \n";
    print "<p> Name: $bS $firstname $lastname $eS </p> \n";
    print "<p> Date: $bS $date $eS </p> \n";
    print "<p> First time? $bS $first $eS </p> \n";
    print "<p> Payment/Insurance: $bS $payment $eS </p> \n";
    print "<p> Symptoms: $bS $symptoms $eS </p> \n";
    print "<p> Others?  </p> \n";
    print "<p> $bS $additional $eS </p> \n";

    # Create a string to write to the file
    $fileString = "$firstname $lastname, $date, $symptoms\n";
    # write to file
    file_put_contents("appointments.txt", $fileString, FILE_APPEND);
    ?>
   </div>

    <div id="appointments">
    <h2> All previous bookings </h2>
    <?php
      # this part is provided for you.
      $appointments = file("appointments.txt");
      foreach ($appointments as $info)
      {
        print "<p> $info </p>";
      }
    ?>
  </div>
  </div>
</body>
</html>
