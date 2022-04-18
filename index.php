<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>MY QUERIES</title>
</head>
<body>
    

<h1>mySQL queries</h1>

<table style="width:75%">
  <tr>
    <td align="center" valign="top">
<form action="" method="POST">
  <h3>Select query</h3>
<td align="center" valign="top">
  <h3>Query result</h3>
</tr>

<td align="center" valign="top">
  <select name="query" id="query" size="55">
    <option value="query_1">1. List the name of all the products in the product table</option>
    <option value="query_2">2. List the names and prices of all the products in the product table</option>
    <option value="query_3">3. List all columns in the product table</option>
    <option value="query_4">4. List the name of the products, the price in euros and the price in US dollars (USD)</option>
    <option value="query_5">5. List the name of the products, the price in euros and the price in US dollars.</option>
    <option value="query_5">Use the following aliases for columns: product name, euros, US dollars</option>
    <option value="query_6">6.List the names and prices of all products in the product table, converting the names to uppercase</option>
    <option value="query_7">7. List the names and prices of all products in the product table, converting the names to lowercase</option>
    <option value="query_8">8. List the names of all the manufacturers in one column,</option>
    <option value="query_8">and in another column get the first two characters of the manufacturer's name in capital letters</option>
    <option value="query_9">9. List the names and prices of all the products in the product table, rounding off the value of the price</option>
    <option value="query_10">10. Lists the names and prices of all the products in the product table,</option>
    <option value="query_10">truncating the value of the price to show it without any decimal place</option>
    <option value="query_11">11. List the code of the manufacturers who have products in the product table</option>
    <option value="query_12">12.Lists the code of the manufacturers that have products in the product table, eliminating the codes that appear repeated</option>
    <option value="query_13">13.Lists the names of the manufacturers in ascending order</option>
    <option value="query_14">14.Lists the names of the manufacturers in descending order</option>
    <option value="query_15">15. Lists the names of the products ordered first by the name in ascending order and second by the price in descending order</option>
    <option value="query_16">16. Returns a list with the first 5 rows of the manufacturer table</option>
    <option value="query_17">17. Returns a list with 2 rows from the fourth row of the manufacturer table. The fourth row should also be included in the answer</option>
    <option value="query_18">18.List the name and price of the cheapest product. (Use only the ORDER BY and LIMIT clauses).</option>
    <option value="query_18">NOTE: I could not use MIN (price) here, I would need GROUP BY</option>
    <option value="query_19">19.List the name and price of the most expensive product. (Use only the ORDER BY and LIMIT clauses).</option>
    <option value="query_19">NOTE: I could not use MAX (price) here, I would need GROUP BY.</option>
    <option value="query_20">20.Lists the name of all products of the manufacturer whose manufacturer code is equal to 2</option>
    <option value="query_21">21.Returns a list with the product name, price, and manufacturer name of all products in the database</option>
    <option value="query_22">22. Returns a list with the product name, price, and manufacturer name of all products in the database.</option>
    <option value="query_22">Sort the result by manufacturer's name, in alphabetical order.</option>
    <option value="query_23">23.Returns a list with the product code, product name, manufacturer code, and manufacturer name of all products in the database.</option>
    <option value="query_24">24. Return the name of the product, its price and the name of its manufacturer, of the cheapest product</option>
    <option value="query_25">25. Return the name of the product, its price and the name of its manufacturer, of the most expensive product</option>
    <option value="query_26">26. Returns a list of all products from the manufacturer Lenovo</option>
    <option value="query_27">27.Returns a list of all Crucial manufacturer's products priced above € 200</option>
    <option value="query_28">28. Returns a list of all products from Asus, Hewlett-Packard and Seagate. Without using the IN operator</option>
    <option value="query_29">29.Returns a list of all products from Asus, Hewlett-Packardy Seagate manufacturers. Using the IN operator</option>
    <option value="query_30">30. Returns a list with the name and price of all the products of the manufacturers whose name ends with the vowel e</option>
    <option value="query_31">31.Returns a list with the name and price of all products whose manufacturer's name contains the character w in the name</option>
    <option value="query_32">32. Returns a list with the product name, price and manufacturer's name of all products with a price greater than or equal to € 180.</option>
    <option value="query_32">Sort the result first by price (in descending order) and second by name (in ascending order)</option>
    <option value="query_33">33. Returns a list with the manufacturer's code and name, only of those manufacturers who have associated products in the database</option>
    <option value="query_34">34. Returns a list of all manufacturers that exist in the database, along with the products that each has.</option>
    <option value="query_34">The list should also show those manufacturers who do not have associated products</option>
    <option value="query_35">35. Returns a list where only those manufacturers that do not have any associated products appear</option>
    <option value="query_36">36. Return all products from the manufacturer Lenovo. (Without using INNER JOIN)</option>
    <option value="query_37">37. It returns all the data of the products that have the same price as the most expensive product from the manufacturer Lenovo</option>
    <option value="query_37">(Without using INNER JOIN).</option>
    <option value="query_38">38. List the most expensive product name from the manufacturer Lenovo</option>
    <option value="query_39">39.Lists the cheapest product name from the manufacturer Hewlett-Packard</option>
    <option value="query_40">40.Returns all products in the database that are priced at or above the most expensive product from the manufacturer Lenovo</option>
    <option value="query_41">41.List all Asus products that are priced above the average price of all their products</option>


  </select>
  <br />
  <br />
  <input type="submit" value="Run query">
</td>
<td align="left" valign="top">

<?php require_once 'query.php'; ?>

</td>

 
</form>




<?php

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "tienda";



$conn = create_connection($servername, $dbname, $username, $password);

function create_connection($servername, $dbname, $username, $password) {
  // CREATE CONNECTION
      $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
      // set the PDO error mode to exception
      $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

      return $conn;
}




?>



</body>
</html>

