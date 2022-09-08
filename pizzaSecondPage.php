<?php 
session_start(); 
?>

<html lang="en">
    <head>
        <title>CSS Template</title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link href="pizzaCSS.css" rel="stylesheet" type="text/css">
    </head>
    <body>
        <header class="header-class"> <!-- Creating the header for the page --> 
            <h1>Pizza Order</h1>  
        </header>
        <div class="confirmationPage">
        <p style="text-align: center; font-size: 25px;">
        Thank you, 
		<?php echo $_SESSION["customerName"] ?> <br>
        Your order will be delivered to
		<?php echo $_SESSION["customerAddress"] ?><br>
        Your total cost for this order will be $
		<?php echo $_SESSION["totalCost"] ?><br>
        <ul style="text-align: center; list-style-type:none; font-size: 25px;">
        <?php 
            $str = $_SESSION["customerCart"]; // get the customers cart
            $words = preg_replace('/[0-9]+/', '', $str); // remove the numbers from the string
            preg_match_all('!\d+!', $str, $matches); // get all the numbers from the string
            
            $forLength = substr_count($str, '$') - 1; // set the length for the loop to run

            for ($x = 0; $x <= $forLength; $x++) {
                $newItem = substr($words, 0, strpos($words, '$')+1) . $matches[0][$x]; // Create a new item stopping at the $
                if (str_contains($newItem, "Cheese")) { // check for the correct picture
                    $itemPicture = '<img src="CheesePizza.jpeg" alt="Cheese Pizza" width="100" height="100"><br>';
                }
                if (str_contains($newItem, "Pepperoni")) { // check for the correct picture
                    $itemPicture = '<img src="PepperoniPizza.jpg" alt="Pepperoni Pizza" width="100" height="100"><br>';
                }
                if (str_contains($newItem, "Hawaiian")) { // check for the correct picture
                    $itemPicture = '<img src="HawaiianPizza.jpg" alt="Hawaiian Pizza" width="100" height="100"><br>';
                }
                if (str_contains($newItem, "Meat")) { // check for the correct picture
                    $itemPicture = '<img src="MeatLoversPizza.jpg" alt="Meat Pizza" width="100" height="100"><br>';
                }
                if (str_contains($newItem, "Vegetarian")) { // check for the correct picture
                    $itemPicture = '<img src="VegetarianPizza.jpg" alt="Vegetarian Pizza" width="100" height="100"><br>';
                }
                $removeItem = substr($words, 0, strpos($words, '$')+1); // get the item to remove from the string
                echo '<li>' . $newItem . "   " .  $itemPicture . "</li>"; // print the item as a li
                echo "<br>";
                $words = str_replace($removeItem, "", $words); // remove the item from the string
            }
        ?>
        </ul>
	    </p>
        </div>
    </form>
    </body>
</html>