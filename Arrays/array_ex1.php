<!DOCTYPE html>
<!-- Example for EECS1012: MSB -->
<html>
<head>
  <title> File Example </title>
  <meta charset="utf-8">
  <style>
    pre {
    font-family: monospace;
    font-size: 1em;
    border: 1px solid black;
    background-color: silver;
  }
  </style>
  <body>

  <h1> PHP Index Array Example  <h1>

 <p> Output is placed in a pre formatted text area </p>

 <pre><?php

    # array function creates an array
    # this is assigned to variable $a
    # The data can be accessed using an index (or offset)
    # indexing starts a 0
    #           0      1     2     3           4    5       6      7         8       9    10
    $a = array("This", "is", "an", "example", "to", "show", "how", "arrays", "work", "in", "php");

    # you can access individual values using the index
    print '$a[0] = ';
    print $a[0];
    print "\n";

    # you can access individual values using the index
    # Using single quotes so it won't interpret the variable
    print '$a[10] = ';
    print $a[10];
    print "\n";

    # you can also use variables to access the arrays
    $i = 4;
    print '$a[' . $i . '] = ' . $a[$i] . "\n";
    $i++;
    print '$a[' . $i . '] = ' . $a[$i] . "\n";

    # function count returns the number of elements in an array
    $size = count($a);
    print 'Size of array $a is = ' . $size . "\n";

    # arrays are often processed using for-loops
    for($i=0; $i < $size; $i++)
    {
      print "item $i in array is = $a[$i] \n";
    }

    # you can also use the print_r function that is quite nice to print
    # out the contents of an array
    print_r($a);

    print "\n";  # just a newline to make the output more readable

    # function array_rand returns and index inside the range of an arrays
    $index = array_rand($a);

    # note, this is not an array value, it is only an index
    # to access the value, us the correct syntax
    print "random index is $index, content in array at that index is \"$a[$index]\" \n";


    # finally, remember you can always change the values of the arrays
    $a[0] = "The Deaner";
    $a[1] = "was";
    $a[2] = "here";
    print_r($a);

   ?></pre>

  </body>

</head>
