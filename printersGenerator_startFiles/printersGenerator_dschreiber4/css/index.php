<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Printers Generator</title>
  <link rel="stylesheet" href="css/printersGen.css">
</head>
<body><?php

  //initialize array vars
  $ipAddresses = [];
  $printerTypes = array();
  $buildings = [];
  $roomNumbers = [];
  $numberOfPrintersInBuilding = [];

  //Open the file for reading
  $fp = fopen("printer.txt", "r");

    //Read the file line by line
    while (!feof($fp)) {

  //Read the next line
  $printerLine = rTrim(fgets($fp));

  if ($printerLine != "") {

    //Break up the line into individual fields
    list($ip, $hostName, $brand, $buildingName, $roomNum) = explode(",", $printerLine);

    //Let's use the arrays to store the data from each input line
    //so we can access it later
    //
    //Build these arrays one element at a time using the data we just read
    // these are associative arrays that will use the unique
    //host name (domain name of the printer as their keys
    // (indexes)
    $ipAddresses[$hostName] = $ip;
    $printerTypes[$hostName] = $brand;
    $buildings[$hostName] = $buildingName;
    $roomNumbers[$hostName] = $roomNum;

    //Also, store the building names as keys
    //in the $numberOfBuildings array where the
    //value of each element will represent the number of
    //printers in the building (key)
    if (!isset($numberOfPrintersInBuilding[$buildingName])) {
        $numberOfPrintersInBuilding[$buildingName] = 0;
    }

    $numberOfPrintersInBuilding[$buildingName]+= 1;

  }//end if line valid


}// end while !EOF

    //print_r($ipAddresses);
    //echo "<br><br>";
    //print_r($numberOfPrintersInBuilding);

// We've finished reading our data and stored
// it in assoc. arrays. Start the output
//
//For each building, produce a separate table showing the user
//the num of printers in the building

foreach ($numberOfPrintersInBuilding as $buildingName => $numPrinters) {

        ?>
   <table>
       <tr class="firstRow">
           <th>
               <span class="headerTxt"><?php echo $buildingName?></span>
           </th>
       </tr>
   </table>



        <?php

}

?>
</body>
</html>