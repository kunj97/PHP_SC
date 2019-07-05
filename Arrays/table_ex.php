<!DOCTYPE html>
<!-- EECS1012 Examples: MSB -->
<html>
<head>
<style>
 table {border-collapse: collapse;}
  table, th, td {  border: 1px solid black; }
</style>
</head>
<body>
<?php

# This string is similar to something you'd read from a file.
# each line ends with a \n
$bigString = "Abdel | abdel@gmail.com | 1238203 \n" .
             "Lili  | lili@yahoo.com | 123888 \n" .
             "George| xi@yorku.ca | 304304 \n" .
             "Xiong | batman@136.com | 111000 ";

$eachLine = explode("\n", $bigString);  # this is an array

print "<table> \n";
print "<tr> <th> Name </th> <th> Email </th> <th> Student ID </th> </tr> \n";
for ($i = 0; $i < count($eachLine); $i++)
{
	$info = explode( "|", $eachLine[$i]);
    print "<tr> <td> $info[0] </td> <td> $info[1] </td> <td> $info[2] </td> \n";
}
print "</table> \n";

?>
</body>
</html>
