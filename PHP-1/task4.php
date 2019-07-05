<html>
<title> Task 4 </title>
<style>
  table, td, th { border: 1px black solid; border-collapse: collapse; }
  p { padding: 0px; margin:0px; font-family: monospace;}
</style>
<body>
<h1> Task 4: PHP Program #2 </h1>
<?php  /* Write your code here */

  /* use file to read in the file - this returns an array since we have multiple
     lines in our file */
  $fileLines = file("names.txt");  /* remember filename needs "filename" around it */

  /* set count to the size of the array */
  $count = count($fileLines);

  /* print out the table HTML code and header info */
  print "<table><tr><th> Full Name </th> <th> Surname Only </th></tr> \n";
  for($i=0; $i < $count; $i++)  /* loop from 0 to # of items in the array */
  {
    $line = trim($fileLines[$i]);  /* trim the line */
    $name = explode(" ", $line);  /* breaks into two -- first is first name, second is surname */
    /* convert surname to upper case.  after explode $name[0] is first name, $name[1] is second name */
    $surname = strtoupper($name[1]); /* in this case, we know the 2nd element in the array will be the surname */
    print "<tr><td> $fileLines[$i] </td> <td> $surname </td> <tr>\n"; /* print out the line from the file (fullname) and the sur name in uppercase */
  }
  print "</table>";  /* finish printing the table */


  /* 2nd task example */
  $bigString = "This is a big string.";  /* we want to print this backwards */

  $bigString = strtoupper($bigString);   /* convert it to upper case */
  $size = strlen($bigString);            /* strlen returns the size of the array */
  print "<h1> Big string backwards </h1> \n"; /* printout header */

  /* pay attention here:
     strings are like arrays, each character can be accessed using the [index] syntax
    the string index starts at 0.  so if the string length is 10, it goes from 0..9.
    I'm starting my forloop at string lenght - 1.
    loop while $i > or equal to 0.  each loop subtract one from $i to make it count down */
  for($i=$size-1; $i >= 0; $i--)
  {
    /* print out the value of $i and the string .  I place the \" \"  so I can see
       when we print out spaces . . otherwise hard to see them */
    print "<p> $i = \" $bigString[$i] \" </p> \n";
  }

?>
</body>
</html>
