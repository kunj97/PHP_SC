<html>
<title> Task 3 </title>
<style>
  p { width: 75%; margin: auto; color:blue; background-color: silver;
      padding:20px;  }
</style>
<body>
<h1> Task 3: PHP Program #1 </h1>
<?php  /* Write your code here */

  /* create a variable,the task says random number between 1 and 100 */
  $volume = rand(1,100);

  /* print this out as shown in the task */
  print "<p style=\"text-align:center\> Volume is $volume </p> \n";

  if ($volume < 30) /* if less than 30 print below */
  {
    print "<p style=\"font-size: 0.5em; text-align:center\">  quiet </p>";
  } elseif ($volume < 70)  /* if less than 70 print below */
  {
    print "<p style=\"font-size: 1.25em; text-align:center\"> normal </p>";
  } else   /* otherwise print below */
  {
    print "<p style=\"font-size: 3em; text-align:center\"> loud </p>";
  }

?>
</body>
</html>
