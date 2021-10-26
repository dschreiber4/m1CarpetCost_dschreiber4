<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <title>Billy Bob's Carpet Warehouse</title>
		
		<link href="css/styles.css" rel="stylesheet">
    </head>
    <body><?php

    // phpinfo();

    //$num = 3;
    //print "I know $num programming languages or is it " . ($num + 1) . '<br>';
    //echo "I know $num programming languages or is it ", ($num + 1), '<br';

    //echo "i see your first name is: $_POST[fName]";
    //echo "<br>Your fist choice of carpeting is " , $_POST['carpetChoices'][0];

    //print_r($_POST['carpetChoices']);

    //echo "<h3>Score = $_GET[score] and grade = $_GET[grade]</h3>";

    // NOTE: regarding HTML source code readability!
    //
    // Place each opening delimiter immediately following 
    // the HTML tag it should go after. Add a single space
    // immediately after the ending delimiter and place
    // the next HTML tag below on its own line indented to the 
    // proper level.

    //Define some helper functions
    function sanitizeString($field) {
        return filter_input(INPUT_POST, $field, FILTER_SANITIZE_STRING);
    }

    function sanitizeFloat($field) {
        return filter_input(INPUT_POST,$field, FILTER_SANITIZE_NUMBER_FLOAT, FILTER_FLAG_ALLOW_FRACTION);
    }

    function sqaureArea($roomLength, $roomWidth) {
        return $roomLength * $roomWidth;
    }
    function calculateCost($squareFootage, $selectedCarpects, $prices) {




    }

    //Sanitize the form data
    $submitPressed = sanitizeString('submit');
    //echo "<h3>submitPressed contains: $submitPressed</h3>";

    //Determine if the form has been submitted
    if (isset($submitPressed)) {
        //Set up associative array containing carpet types 
        //as its keys(indexes) and price per square foot as its values
        $carpetPrices = array("Berber" => 5.99, "Shag" => 3.25, "Astroturf" => 9.25, "Plush" => 1.50, "Commercial" => 2.00, "Loop Pile" => 2.50, "Rug" => 4.00);

        //Greet the user
        echo "\n\t\t\t<h3>Welcome to Billy Bob's Carpet Warehouse ", sanitizeString('fName'), " ", sanitizeString('lName'), "!</h3>\n";
    }
        
    ?> 
        
        <h2>Welcome to Billy Bob's Carpet Warehouse</h2>
        
        <form action="<?php echo $_SERVER['PHP_SELF'] ?>" method="post">

            <label for="fName">First Name:</label>
            <input type="text" name="fName" id="fName" value="">
             <br><br>

            <label for="lName">Last Name:</label>
            <input type="text" name="lName" id="lName">
             <br><br>

            <label for="length">Enter length of room (in feet):</label>
            <input type="text" name="length" id="length">
             <br><br>

            <label for="width">Enter width of room (in feet):</label>
            <input type="text" name="width" id="width">
             <br><br>

            <label for="carpetChoices">Carpet choices:</label>
	    <br>
            <select name="carpetChoices[]" id="carpetChoices" multiple size="5">

                <option value="Berber" selected="yes">Berber</option>
                <option value="Shag">Shag</option>
                <option value="Astroturf">Astroturf</option>
                <option value="Plush">Plush</option>
                <option value="Commercial">Commercial</option>
                <option value="Loop Pile">Loop Pile</option>
                <option value="Rug">Rug</option>

           </select>
           <br><br>

           <input type="submit" name="submit" value="Calculate Area">
          
        </form>
    </body>
</html>