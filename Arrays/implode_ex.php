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
</head>
<body>
  <h2> Example using <code> implode </code> </h2>
  <p> This code opens a file called "quotes.txt" and converts the contents to uppercase and prints the contents to the HTML page </p>

<pre>
<?php

 # create an array of strings
 $names = array("Abdel", "Xiong", "Tyler", "Mahsa", "Lili", "Deaner", "Tony", "Saeed");

 # implode makes a single string by concatenating all the content with this delimiter "," inserted between each item.
 $allNames = implode(",", $names);

 print '$names is of type ' . gettype($names) . "\n";
 print '$allNames is of type ' . gettype($allNames) . "\n";
 print '$names = ';
 print_r($names);
 print '$allNames = ';
 print_r($allNames);

?></pre>
</body>
<html>
