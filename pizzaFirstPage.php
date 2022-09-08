<?php
session_start();
?>

<html lang="en">
    <head>
        <style> 
            .error {color: #FF0000;
            font-size: small;}
        </style>
        <title>CSS Template</title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link href="pizzaCSS.css" rel="stylesheet" type="text/css">
    </head>
    <body>
    <?php
        // Creating all varibles used for 
        $customerCart="";
        $totalCost="";
        $customerName="";
        $customerAddress="";
        $customerCartErr="";
        $totalCostErr="";
        $customerNameErr="";
        $customerAddressErr="";
                
        // Checking the request method
        if($_SERVER['REQUEST_METHOD']=="POST") {

            $customerCart=$_POST["customerOrder"]; // Updating the user cart

            if(empty($_POST['customerName'])){ // Check customerName
                $customerNameErr="Missing info";
            } else {
                $customerName=$_POST['customerName'];
            }
            
            if(empty($_POST['totalCost'])){ // Check totalCost
                $totalCostErr="Missing info";
            } else {
                $totalCost=test_input($_POST["totalCost"]);
            }
            
            if(empty($_POST['customerAddress'])){ // Check customerAddress
                $customerAddressErr="Missing info";
            } else {
                $customerAddress=test_input($_POST["customerAddress"]);
            }
            
            if($customerNameErr=="" & $totalCostErr=="" & $customerAddressErr==""){ // Check for errors
                $_SESSION['customerName'] = $customerName;
                $_SESSION['totalCost'] = $totalCost;
                $_SESSION['customerAddress'] = $customerAddress;
                $_SESSION['customerCart'] = $customerCart;

                $_SESSION["posted_data"]=$_POST; 
                header('location: http://localhost/PizzaOSPByReese&Aisha/pizzaSecondPage.php'); // Go to confirmation page
            }	
        }
    
    // Used for testing the user input
    function test_input($data) {
        $data=trim($data);
        $data=stripcslashes($data);
        $data=htmlspecialchars($data);
        return $data;
    }
    
    if(isset($_POST['btnCheese'])){ // if the user clicks the add a Pizza
        $totalCost=$_POST["totalCost"];
        if ($_POST['cheesePizza'] != "NULL"){
            $selectedItem = $_POST['cheesePizza'];
            $itemCost = preg_replace("/[^0-9]/","",$selectedItem);
            $totalCost = intval($totalCost) + intval($itemCost);
            $customerCart = $customerCart . $selectedItem;
        }
    }
    
    if(isset($_POST['btnPepperoni'])){  // if the user clicks the add a cheesePizza
        $totalCost=$_POST["totalCost"];
        if ($_POST['pepperoniPizza'] != "NULL"){
            $selectedItem = $_POST['pepperoniPizza'];
            $itemCost = preg_replace("/[^0-9]/","",$selectedItem);
            $totalCost = intval($totalCost) + intval($itemCost);
            $customerCart = $customerCart . $selectedItem;
        }
    }
    
    if(isset($_POST['btnHawaiian'])){ // if the user clicks the add a cheesePizza
        $totalCost=$_POST["totalCost"];
        if ($_POST['hawaiianPizza'] != "NULL"){
            $selectedItem = $_POST['hawaiianPizza'];
            $itemCost = preg_replace("/[^0-9]/","",$selectedItem);
            $totalCost = intval($totalCost) + intval($itemCost);
            $customerCart = $customerCart . $selectedItem;
        }
    }
    
    if(isset($_POST['btnMeatLovers'])){ // if the user clicks the add a cheesePizza
        $totalCost=$_POST["totalCost"];
        if ($_POST['meatLoversPizza'] != "NULL"){
            $selectedItem = $_POST['meatLoversPizza'];
            $itemCost = preg_replace("/[^0-9]/","",$selectedItem);
            $totalCost = intval($totalCost) + intval($itemCost);
            $customerCart = $customerCart . $selectedItem;
        }
    }
    
    if(isset($_POST['btnVegetarian'])){ // if the user clicks the add a cheesePizza
        $totalCost=$_POST["totalCost"];
        if ($_POST['vegetarianPizza'] != "NULL"){
            $selectedItem = $_POST['vegetarianPizza'];
            $itemCost = preg_replace("/[^0-9]/","",$selectedItem);
            $totalCost = intval($totalCost) + intval($itemCost);
            $customerCart = $customerCart . $selectedItem;
        }
    }

    if(isset($_POST['Clear'])){ // if the user clicks the clear button
        $customerCart="";
        $totalCost="";
        $customerName="";
        $customerAddress="";
    }
    ?>

    <header class="header-class"> <!-- Creating the header for the page -->   
    <h1>Pizza Order</h1>  
    </header>
    <form style="line-height:25px" method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
    <section> 
    <div class="OrderLayout"> <!-- The side bar of orderning page --> 
    <h1 style="text-align: center;">ORDER</h1>
    <br><textarea readonly style="display: block; margin-left: auto; margin-right: auto;" id="customerOrder" name="customerOrder" rows="20" cols="20" value=""><?php echo $customerCart; ?>
    </textarea><br>
    Total Cost: <input readonly style="width: 65px;" type="number" name="totalCost" value="<?php echo $totalCost; ?>"/>
    <span class="error">* <?php echo $totalCostErr; ?> </span>
    <br>
    
    
    Name: <input type="text" name="customerName" maxlength="15" size="8" value="<?php echo $customerName; ?>"/>
    <span class="error">* <?php echo $customerNameErr; ?> </span>
    <br>
    
    Address: <input type="text" name="customerAddress" maxlength="15" size="8"/>
    <span class="error">* <?php echo $customerAddressErr; ?> </span>
    <br>
    
    <br><input type="submit" name="submit" value="Submit"/><br>
    <br><input type="submit" name="Clear" value="Clear"/>

    </div>
    <article>
    <div class="container">  <!-- The container of all the items --> 
    <div class="Cheese"> <!-- the class of a item --> 
    <p>Cheese</p>
    <img src="CheesePizza.jpeg" alt="Cheese Pizza" width="100" height="100"><br>
    <br><select name="cheesePizza" id="cheesePizza">
    <option value="NULL">Select Size</option>
    <option value="Small Cheese $7">Small $7</option>
    <option value="Medium Cheese $10">Medium $10</option>
    <option value="Large Cheese $15">Large $15</option>
    </select><br>
    <br><input type="submit" name="btnCheese" value="Add"/>
    </div>
    <div class="Pepperoni"> <!-- the class of a item --> 
    <p>Pepperoni</p>
    <img src="PepperoniPizza.jpg" alt="Pepperoni Pizza" width="100" height="100"><br>
    <br><select name="pepperoniPizza" id="pepperoniPizza">
    <option value="NULLPepperoni">Select Size</option>
    <option value="Small Pepperoni $10">Small $10</option>
    <option value="Medium Pepperoni $18">Medium $18</option>
    <option value="Large Pepperoni $25">Large $25</option>
    </select><br>
    <br><input type="submit" name="btnPepperoni" value="Add"/>
    </div>
    <div class="Hawaiian"> <!-- the class of a item --> 
    <p>Hawaiian</p>
    <img src="HawaiianPizza.jpg" alt="Hawaiian Pizza" width="100" height="100"><br>
    <br><select name="hawaiianPizza" id="hawaiianPizza">
    <option value="NULLHawaiian">Select Size</option>
    <option value="Small Hawaiian $10">Small $10</option>
    <option value="Medium Hawaiian $15">Medium $15</option>
    <option value="Large Hawaiian $22">Large $22</option>
    </select><br>
    <br><input type="submit" name="btnHawaiian" value="Add"/>
    
    </div>
    <div class="MeatLovers"> <!-- the class of a item --> 
    <p>Meat Lovers</p>
    <img src="MeatLoversPizza.jpg" alt="MeatLovers Pizza" width="100" height="100"><br>
    <br><select name="meatLoversPizza" id="meatLoversPizza">
    <option value="NULLMeatLovers">Select Size</option>
    <option value="Small MeatLovers $20">Small $20</option>
    <option value="Medium MeatLovers $25">Medium $25</option>
    <option value="Large MeatLovers $30">Large $30</option>
    </select><br>
    <br><input type="submit" name="btnMeatLovers" value="Add"/>
    
    </div>
    <div class="Vegetarian"> <!-- the class of a item --> 
    <p>Vegetarian</p>
    <img src="VegetarianPizza.jpg" alt="Vegetarian Pizza" width="100" height="100"><br>
    <br><select name="vegetarianPizza" id="vegetarianPizza">
    <option value="NULLVegetarian">Select Size</option>
    <option value="Small Vegetarian $8">Small $8</option>
    <option value="Medium Vegetarian $14">Medium $14</option>
    <option value="Large Vegetarian $18">Large $18</option>
    </select><br>
    <br><input type="submit" name="btnVegetarian" value="Add"/>
    </div>
    </div>
    </article>
    </section>
    </form>
    </body>
    </html>
    
    