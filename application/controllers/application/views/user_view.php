<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=, initial-scale=1.0">
    <title>User View</title>
</head>
<body>
    

<h1> this is the right webpage skywalker....</h1>
<h3>
<?php

echo $welcome; // <- this variable is the result of $data['welcome'] in the Users controller

?>
</h3>
<h2>
<?php 

//echo $result; // <-this variable is the result of $data['result'] in the Users controller. 

foreach($result as $object)
{
   echo $object->name . "<br>"; 
}


?>
</h2> 


<p> multiple line comments and uncomment = ctrl + / </p>

</body>
</html>