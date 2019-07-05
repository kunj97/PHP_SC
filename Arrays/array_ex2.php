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

    # array function creates an associative array
    # data is accessed using the "key"
    #           key1           value1    key2   value2   key3         value3    key4       value4
     $a = array("name" => "Deaner", "age" => 30 , "occupation" => "rocker", "email" => "deaner@gmail.com");

    # you can access individual values using the index
    print '$a["name"] = ';
    # to access values with a string key name, we need to place the variable in {}
    print "{$a["name"]} \n";

    # you can access individual values using the index
    # Using single quotes so it won't interpret the variable
    print '$a["occupation"] = ';
    print $a["occupation"];
    print "\n";

    # you can also use variables to access the arrays
    $i = "email";
    print '$a[' . $i . '] = ' . $a[$i] . "\n";
    $i = "age";
    print '$a[' . $i . '] = ' . $a[$i] . "\n";

    # function count returns the number of elements in an array
    $size = count($a);
    print 'Size of array $a is = ' . $size . "\n";

    # arrays are often processed using for-loops
    # func array_keys returns an array of only the keys
    # this array is an indexed array
    $keys = array_keys($a);
    $size = count($keys);  # getting the size of the key array
    for($i=0; $i < $size; $i++)
    {
      $key = $keys[$i];  # get value of the ith key
      print "item $key in array is = $a[$key] \n";
    }

    # you can also use the print_r function that is quite nice to print
    # out the contents of an array
    print_r($a);

    print "\n";  # just a newline to make the output more readable

    # function array_rand returns and index inside the range of an arrays
    $index = array_rand($a);

    # note, this is not an array value, it is only an index
    # to access the value, us the correct syntax
    print "random index is \"$index\", content in array at that index is \"$a[$index]\" \n";


    # finally, remember you can always change the values of the arrays
    $a["name"] = "Abdel";
    $a["age"] = "22";
    print_r($a);

   ?></pre>

  </body>

</head>
