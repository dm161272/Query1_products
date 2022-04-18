<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Document</title>
</head>
<body>
    

<?php
$pdo = new PDO("mysql:host=localhost; dbname=dmitrii_db", "root", "");

if (isset($_POST['query'])) {

  $query = $_POST['query'];
  
  $data = $query($pdo);
  
}




//1.List the name of all the products in the product table.
function query_1($pdo) {
$query = "SELECT DISTINCT name FROM product";
$d = $pdo->query($query);

echo "<table border='1' width=100%>
  <tr>
  <th width=50%>Product name</th>
  </tr>";

  foreach ($d as $data) {
    echo "<tr>";
    echo "<td>" . $data['name'] . "</td>";
    echo "</tr>";
  }
  echo "</table>";

}


//2.List the names and prices of all the products in the product table.
function query_2($pdo) {
$query = "SELECT  name, price FROM product";
$d = $pdo->query($query);

echo "<table border='1' width=100%>
  <tr>
  <th width=50%>Product name</th>
  <th>Price</th>
  </tr>";

  foreach ($d as $data) {
    echo "<tr>";
    echo "<td>" . $data['name'] . "</td>";
    echo "<td>" . $data['price'] . "</td>";
    echo "</tr>";
  }
  echo "</table>";

}

//3.List all columns in the product table.
function query_3($pdo) {
  $query = "SELECT * FROM product";
  $d = $pdo->query($query);
  

  echo "<table border='1' width=100%>
  <tr>
  <th>Code</th>
  <th width=50%>Product</th>
  <th>Price</th>
  <th>Manufacturer code</th>
  </tr>";

  foreach ($d as $data) {
    echo "<tr>";
    echo "<td>" . $data['code'] . "</td>";
    echo "<td>" . $data['name'] . "</td>";
    echo "<td>" . $data['price'] . "</td>";
    echo "<td>" . $data['manufacturer_code'] . "</td>";
    echo "</tr>";
  }
  echo "</table>";
  
  }


//4. List the name of the products, the price in euros and the price in US dollars (USD).
function query_4($pdo) {
$query = "SELECT name, price, (SELECT exchange_rate FROM currency_rates 
  WHERE currency_code = 'USD') AS rate,    
  ROUND (price * ( SELECT exchange_rate FROM currency_rates                      								
  WHERE currency_code = 'USD'), 2)  AS price_USD   FROM product";
$d = $pdo->query($query);

echo "<table border='1' width=100%>
  <tr>
  <th width=50%>Name</th>
  <th>Price</th>
  <th>Price USD</th>
  </tr>";

foreach ($d as $data) {
  echo "<tr>";
  echo "<td>" . $data['name'] . "</td>";
  echo "<td>" . $data['price'] . "</td>";
  echo "<td>" . $data['price_USD'] . "</td>";
  echo "</tr>";
}
echo "</table>";
}


//5. List the name of the products, the price in euros and the price in US dollars.
 //Use the following aliases for columns: product name, euros, US dollars.
 function query_5($pdo) {
 $query = "SELECT name AS 'product name', price AS euros,
 ROUND (price * ( SELECT exchange_rate FROM currency_rates                      								
 WHERE currency_code = 'USD'), 2)  AS 'US dollars'   FROM product";
$d = $pdo->query($query);

echo "<table border='1' width=100%>
  <tr>
  <th width=50%>Product name</th>
  <th>Euros</th>
  <th>US dollars</th>
  </tr>";

  foreach ($d as $data) {
    echo "<tr>";
    echo "<td>" . $data['product name'] . "</td>";
    echo "<td>" . $data['euros'] . "</td>";
    echo "<td>" . $data['US dollars'] . "</td>";
    echo "</tr>";
  }
  echo "</table>";

 }


//6.List the names and prices of all products in the product table, converting the names to uppercase.
function query_6($pdo) {
$query = "SELECT UPPER (name) AS 'product name', price FROM product";
$d = $pdo->query($query);

echo "<table border='1' width=100%>
  <tr>
  <th width=50%>Product name</th>
  <th>Price</th>
  </tr>";

  foreach ($d as $data) {
    echo "<tr>";
    echo "<td>" . $data['product name'] . "</td>";
    echo "<td>" . $data['price'] . "</td>";
    echo "</tr>";
  }
  echo "</table>";

}

//7.List the names and prices of all products in the product table, converting the names to lowercase.
function query_7($pdo) {
$query = "SELECT LOWER (name) AS 'product name', price FROM product";
$d = $pdo->query($query);

echo "<table border='1' width=100%>
  <tr>
  <th width=50%>Product name</th>
  <th>Price</th>
  </tr>";

  foreach ($d as $data) {
    echo "<tr>";
    echo "<td>" . $data['product name'] . "</td>";
    echo "<td>" . $data['price'] . "</td>";
    echo "</tr>";
  }
  echo "</table>";
}

//8.List the names of all the manufacturers in one column, and in another column get the first two characters of 
//the manufacturer's name in capital letters.
function query_8($pdo) {
$query = "SELECT name, UPPER (LEFT (name, 2)) AS '2letter' FROM manufacturer";
$d = $pdo->query($query);

echo "<table border='1' width=100%>
  <tr>
  <th width=50%>Company name</th>
  <th>Code</th>
  </tr>";

  foreach ($d as $data) {
    echo "<tr>";
    echo "<td>" . $data['name'] . "</td>";
    echo "<td>" . $data['2letter'] . "</td>";
    echo "</tr>";
  }
  echo "</table>";

}
//9. List the names and prices of all the products in the product table, rounding off the value of the price.
function query_9($pdo) {
  $query = "SELECT name , ROUND (price, 2) AS 'price' FROM product";
  $d = $pdo->query($query);
  
  echo "<table border='1' width=100%>
    <tr>
    <th width=50%>Product name</th>
    <th>Price (rounded to 2 decimals)</th>
    </tr>";
  
    foreach ($d as $data) {
      echo "<tr>";
      echo "<td>" . $data['name'] . "</td>";
      echo "<td>" . $data['price'] . "</td>";
      echo "</tr>";
    }
    echo "</table>";
  }

  //10.Lists the names and prices of all the products in the product table, 
  //truncating the value of the price to show it without any decimal place.
  function query_10($pdo) {
    $query = "SELECT name , ROUND (price, 0) AS 'price' FROM product";
    $d = $pdo->query($query);
    
    echo "<table border='1' width=100%>
      <tr>
      <th width=50%>Product name</th>
      <th>Price (rounded to integer value)</th>
      </tr>";
    
      foreach ($d as $data) {
        echo "<tr>";
        echo "<td>" . $data['name'] . "</td>";
        echo "<td>" . $data['price'] . "</td>";
        echo "</tr>";
      }
      echo "</table>";
    }

//11. List the code of the manufacturers who have products in the product table.
function query_11($pdo) {
  $query = "SELECT DISTINCT manufacturer_code FROM product";

  $d = $pdo->query($query);
  
  echo "<table border='1' width=100%>
    <tr>
    <th width=100%>Manufacturers codes with products</th>
    </tr>";
  
    foreach ($d as $data) {
      echo "<tr>";
      echo "<td>" . $data['manufacturer_code'] . "</td>";
      echo "</tr>";
    }
    echo "</table>";
  }


//12.Lists the code of the manufacturers that have products in the product table, eliminating the codes that appear repeated.
function query_12($pdo) {
  $query = "SELECT DISTINCT manufacturer_code FROM product";

  $d = $pdo->query($query);
  
  echo "<table border='1' width=100%>
    <tr>
    <th width=100%>Manufacturers codes with products</th>
    </tr>";
  
    foreach ($d as $data) {
      echo "<tr>";
      echo "<td>" . $data['manufacturer_code'] . "</td>";
      echo "</tr>";
    }
    echo "</table>";
  }

//13.Lists the names of the manufacturers in ascending order
function query_13($pdo) {
  $query = "SELECT name FROM manufacturer ORDER BY name ASC";
  $d = $pdo->query($query);
  
  echo "<table border='1' width=100%>
    <tr>
    <th>Company name</th>
    </tr>";
  
    foreach ($d as $data) {
      echo "<tr>";
      echo "<td>" . $data['name'] . "</td>";
      echo "</tr>";
    }
    echo "</table>";
  
  }


//14.Lists the names of the manufacturers in descending order
function query_14($pdo) {
  $query = "SELECT name FROM manufacturer ORDER BY name DESC";
  $d = $pdo->query($query);
  
  echo "<table border='1' width=100%>
    <tr>
    <th>Company name</th>
    </tr>";
  
    foreach ($d as $data) {
      echo "<tr>";
      echo "<td>" . $data['name'] . "</td>";
      echo "</tr>";
    }
    echo "</table>";
  
  }

//15.Lists the names of the products ordered first by the name in ascending order and second by the price in descending order
function query_15($pdo) {
  $query = "SELECT name, price FROM product ORDER BY name ASC, price DESC";
  $d = $pdo->query($query);
  
  echo "<table border='1' width=100%>
    <tr>
    <th>Product name</th>
    <th>Price</th>
    </tr>";
  
    foreach ($d as $data) {
      echo "<tr>";
      echo "<td>" . $data['name'] . "</td>";
      echo "<td>" . $data['price'] . "</td>";
      echo "</tr>";
    }
    echo "</table>";
  
  }


//16. Returns a list with the first 5 rows of the manufacturer table.
function query_16($pdo) {
  $query = "SELECT name FROM manufacturer LIMIT 5";
  $d = $pdo->query($query);
  
  echo "<table border='1' width=100%>
    <tr>
    <th>Company name (first 5)</th>
    </tr>";
  
    foreach ($d as $data) {
      echo "<tr>";
      echo "<td>" . $data['name'] . "</td>";
      echo "</tr>";
    }
    echo "</table>";
  
  }

//17. Returns a list with 2 rows from the fourth row of the manufacturer table. The fourth row should also be included in the answer
function query_17($pdo) {
  $query = "SELECT * from manufacturer LIMIT 3, 2";
  $d = $pdo->query($query);
  
  echo "<table border='1' width=100%>
    <tr>
    <th>Code</th>
    <th>Company name</th>
    </tr>";
  
    foreach ($d as $data) {
      echo "<tr>";
      echo "<td>" . $data['code'] . "</td>";
      echo "<td>" . $data['name'] . "</td>";
      echo "</tr>";
    }
    echo "</table>";
  
  }

//18.List the name and price of the cheapest product. (Use only the ORDER BY and LIMIT clauses). 
//NOTE: I could not use MIN (price) here, I would need GROUP BY
function query_18($pdo) {
  $query = "SELECT name, price FROM product GROUP BY price ASC LIMIT 0, 1";
  $d = $pdo->query($query);
  
  echo "<table border='1' width=100%>
    <tr>
    <th>Product name</th>
    <th>Price</th>
    </tr>";
  
    foreach ($d as $data) {
      echo "<tr>";
      echo "<td>" . $data['name'] . "</td>";
      echo "<td>" . $data['price'] . "</td>";
      echo "</tr>";
    }
    echo "</table>";
  
  }

  
//18.List the name and price of the most expensive product. (Use only the ORDER BY and LIMIT clauses). 
//NOTE: I could not use MIN (price) here, I would need GROUP BY
function query_19($pdo) {
  $query = "SELECT name, price FROM product GROUP BY price DESC LIMIT 0, 1";
  $d = $pdo->query($query);
  
  echo "<table border='1' width=100%>
    <tr>
    <th>Product name</th>
    <th>Price</th>
    </tr>";
  
    foreach ($d as $data) {
      echo "<tr>";
      echo "<td>" . $data['name'] . "</td>";
      echo "<td>" . $data['price'] . "</td>";
      echo "</tr>";
    }
    echo "</table>";
  
  }

  //20.Lists the name of all products of the manufacturer whose manufacturer code is equal to 2.
  function query_20($pdo) {
  $query = "SELECT name, manufacturer_code as m_code FROM product WHERE manufacturer_code = 2";
  $d = $pdo->query($query);
  
  echo "<table border='1' width=100%>
    <tr>
    <th>Product name</th>
    <th>Code</th>
    </tr>";
  
    foreach ($d as $data) {
      echo "<tr>";
      echo "<td>" . $data['name'] . "</td>";
      echo "<td>" . $data['m_code'] . "</td>";
      echo "</tr>";
    }
    echo "</table>";
  
  }

//21.Returns a list with the product name, price, and manufacturer name of all products in the database.
function query_21($pdo) {
  $query = "SELECT product.name as pn, price, manufacturer.name as mn FROM product LEFT JOIN manufacturer ON product.manufacturer_code = manufacturer.code";
  $d = $pdo->query($query);
  

  echo "<table border='1' width=100%>
  <tr>
  <th width=50%>Product</th>
  <th>Price</th>
  <th>Manufacturer</th>
  </tr>";

  foreach ($d as $data) {
    echo "<tr>";
    echo "<td>" . $data['pn'] . "</td>";
    echo "<td>" . $data['price'] . "</td>";
    echo "<td>" . $data['mn'] . "</td>";
    echo "</tr>";
  }
  echo "</table>";
  
  }

//22. Returns a list with the product name, price, and manufacturer name of all products in the database. Sort the result by manufacturer's
//name, in alphabetical order.
function query_22($pdo) {
  $query = "SELECT product.name as pn, price, manufacturer.name as mn FROM product 
  LEFT JOIN manufacturer ON product.manufacturer_code = manufacturer.code  ORDER by mn ASC";
  $d = $pdo->query($query);
  

  echo "<table border='1' width=100%>
  <tr>
  <th width=50%>Product</th>
  <th>Price</th>
  <th>Manufacturer</th>
  </tr>";

  foreach ($d as $data) {
    echo "<tr>";
    echo "<td>" . $data['pn'] . "</td>";
    echo "<td>" . $data['price'] . "</td>";
    echo "<td>" . $data['mn'] . "</td>";
    echo "</tr>";
  }
  echo "</table>";
  
  }

//23.Returns a list with the product code, product name, manufacturer code, and manufacturer name of 
//all products in the database.
function query_23($pdo) {
  $query = "SELECT product.code as pc, product.name as pn, manufacturer.code as mc,  manufacturer.name as mn FROM product 
  LEFT JOIN manufacturer ON product.manufacturer_code = manufacturer.code";
  $d = $pdo->query($query);
  

  echo "<table border='1' width=100%>
  <tr>
  <th>Product code</th>
  <th width=30%>Product</th>
  <th>Manufacturer code</th>
  <th>Manufacturer</th>
  </tr>";

  foreach ($d as $data) {
    echo "<tr>";
    echo "<td>" . $data['pc'] . "</td>";
    echo "<td>" . $data['pn'] . "</td>";
    echo "<td>" . $data['mc'] . "</td>";
    echo "<td>" . $data['mn'] . "</td>";
    echo "</tr>";
  }
  echo "</table>";
  
  }


  //24. Return the name of the product, its price and the name of its manufacturer, of the cheapest product.
  function query_24($pdo) {
    $query = "SELECT product.name as pn, price, manufacturer.name as mn FROM product
    LEFT JOIN manufacturer ON product.manufacturer_code = manufacturer.code
    WHERE price IN (SELECT MIN(price) FROM product)";

    $d = $pdo->query($query);
    
  
    echo "<table border='1' width=100%>
    <tr>
    <th>Product</th>
    <th>Price</th>
    <th>Manufacturer</th>
    </tr>";
  
    foreach ($d as $data) {
      echo "<tr>";
      echo "<td>" . $data['pn'] . "</td>";
      echo "<td>" . $data['price'] . "</td>";
      echo "<td>" . $data['mn'] . "</td>";
      echo "</tr>";
    }
    echo "</table>";
    
    }


  //25. Return the name of the product, its price and the name of its manufacturer, the most expensive product.
  function query_25($pdo) {
    $query = "SELECT product.name as pn, price, manufacturer.name as mn FROM product
    LEFT JOIN manufacturer ON product.manufacturer_code = manufacturer.code
    WHERE price IN (SELECT MAX(price) FROM product)";

    $d = $pdo->query($query);
    
  
    echo "<table border='1' width=100%>
    <tr>
    <th>Product</th>
    <th>Price</th>
    <th>Manufacturer</th>
    </tr>";
  
    foreach ($d as $data) {
      echo "<tr>";
      echo "<td>" . $data['pn'] . "</td>";
      echo "<td>" . $data['price'] . "</td>";
      echo "<td>" . $data['mn'] . "</td>";
      echo "</tr>";
    }
    echo "</table>";
    
    }


//26. Returns a list of all products from the manufacturer Lenovo.
function query_26($pdo) {
  $query = "SELECT product.name as pn, manufacturer.name as mn FROM product

  LEFT JOIN manufacturer ON product.manufacturer_code = manufacturer.code
  
  WHERE manufacturer.name = 'Lenovo'";

  $d = $pdo->query($query);
  

  echo "<table border='1' width=100%>
  <tr>
  <th>Product</th>
  <th>Manufacturer</th>
  </tr>";

  foreach ($d as $data) {
    echo "<tr>";
    echo "<td>" . $data['pn'] . "</td>";
    echo "<td>" . $data['mn'] . "</td>";
    echo "</tr>";
  }
  echo "</table>";
  
  }

//27.Returns a list of all Crucial manufacturer's products priced above € 200.
function query_27($pdo) {
  $query = "SELECT product.name as pn, price, manufacturer.name as mn FROM product

  LEFT JOIN manufacturer ON product.manufacturer_code = manufacturer.code
  
  WHERE manufacturer.name = 'Crucial' AND price > 200";

  $d = $pdo->query($query);
  

  echo "<table border='1' width=100%>
  <tr>
  <th>Product</th>
  <th>Price</th>
  <th>Manufacturer</th>
  </tr>";

  foreach ($d as $data) {
    echo "<tr>";
    echo "<td>" . $data['pn'] . "</td>";
    echo "<td>" . $data['price'] . "</td>";
    echo "<td>" . $data['mn'] . "</td>";
    echo "</tr>";
  }
  echo "</table>";
  
  }

//28. Returns a list of all products from Asus, Hewlett-Packard and Seagate. Without using the IN operator.
function query_28($pdo) {
  $query = "SELECT product.name as pn, price, manufacturer.name as mn FROM product

  LEFT JOIN manufacturer ON product.manufacturer_code = manufacturer.code
  
  WHERE manufacturer.name = 'ASUS' OR manufacturer.name = 'Hewlett-Packard' OR manufacturer.name = 'Seagate'";

  $d = $pdo->query($query);
  

  echo "<table border='1' width=100%>
  <tr>
  <th>Product</th>
  <th>Price</th>
  <th>Manufacturer</th>
  </tr>";

  foreach ($d as $data) {
    echo "<tr>";
    echo "<td>" . $data['pn'] . "</td>";
    echo "<td>" . $data['price'] . "</td>";
    echo "<td>" . $data['mn'] . "</td>";
    echo "</tr>";
  }
  echo "</table>";
  
  }


//29.Returns a list of all products from Asus, Hewlett-Packardy Seagate manufacturers. Using the IN operator.
function query_29($pdo) {
  $query = "SELECT product.name as pn, price, manufacturer.name as mn FROM product

  LEFT JOIN manufacturer ON product.manufacturer_code = manufacturer.code
  
  WHERE manufacturer.name IN ('ASUS', 'Hewlett-Packard', 'Seagate')";

  $d = $pdo->query($query);
  

  echo "<table border='1' width=100%>
  <tr>
  <th>Product</th>
  <th>Price</th>
  <th>Manufacturer</th>
  </tr>";

  foreach ($d as $data) {
    echo "<tr>";
    echo "<td>" . $data['pn'] . "</td>";
    echo "<td>" . $data['price'] . "</td>";
    echo "<td>" . $data['mn'] . "</td>";
    echo "</tr>";
  }
  echo "</table>";
  
  }

//30. Returns a list with the name and price of all the products of the manufacturers whose name ends with the vowel e.
function query_30($pdo) {
  $query = "SELECT product.name as pn, price, manufacturer.name as mn FROM product

  LEFT JOIN manufacturer ON product.manufacturer_code = manufacturer.code
  
  WHERE manufacturer.name LIKE '%e'";

  $d = $pdo->query($query);
  

  echo "<table border='1' width=100%>
  <tr>
  <th>Product</th>
  <th>Price</th>
  <th>Manufacturer</th>
  </tr>";

  foreach ($d as $data) {
    echo "<tr>";
    echo "<td>" . $data['pn'] . "</td>";
    echo "<td>" . $data['price'] . "</td>";
    echo "<td>" . $data['mn'] . "</td>";
    echo "</tr>";
  }
  echo "</table>";
  
  }

//31.Returns a list with the name and price of all products whose manufacturer's name contains the character w in the name
function query_31($pdo) {
  $query = "SELECT product.name as pn, price, manufacturer.name as mn FROM product

  LEFT JOIN manufacturer ON product.manufacturer_code = manufacturer.code
  
  WHERE manufacturer.name LIKE '%w%'";

  $d = $pdo->query($query);
  

  echo "<table border='1' width=100%>
  <tr>
  <th>Product</th>
  <th>Price</th>
  <th>Manufacturer</th>
  </tr>";

  foreach ($d as $data) {
    echo "<tr>";
    echo "<td>" . $data['pn'] . "</td>";
    echo "<td>" . $data['price'] . "</td>";
    echo "<td>" . $data['mn'] . "</td>";
    echo "</tr>";
  }
  echo "</table>";
  
  }


//32. Returns a list with the product name, price and manufacturer's name of all products with a price greater than or equal to € 180.
//Sort the result first by price (in descending order) and second by name (in ascending order)
function query_32($pdo) {
  $query = "SELECT product.name as pn, price, manufacturer.name as mn FROM product
  LEFT JOIN manufacturer ON product.manufacturer_code = manufacturer.code
  WHERE price >= 180
  ORDER BY price DESC, pn ASC";

  $d = $pdo->query($query);
  

  echo "<table border='1' width=100%>
  <tr>
  <th>Product</th>
  <th>Price</th>
  <th>Manufacturer</th>
  </tr>";

  foreach ($d as $data) {
    echo "<tr>";
    echo "<td>" . $data['pn'] . "</td>";
    echo "<td>" . $data['price'] . "</td>";
    echo "<td>" . $data['mn'] . "</td>";
    echo "</tr>";
  }
  echo "</table>";
  
  }

//33. Returns a list with the manufacturer's code and name, only of those manufacturers who have associated products in the database.
function query_33($pdo) {
  $query = "SELECT DISTINCT manufacturer.code as mc, manufacturer.name as mn FROM manufacturer 
  LEFT JOIN product 
  ON manufacturer.code = product.manufacturer_code 
  WHERE manufacturer.code = product.manufacturer_code";

  $d = $pdo->query($query);
  

  echo "<table border='1' width=100%>
  <tr>
  <th>Code</th>
  <th>Manufacturer</th>
  </tr>";

  foreach ($d as $data) {
    echo "<tr>";
    echo "<td>" . $data['mc'] . "</td>";
    echo "<td>" . $data['mn'] . "</td>";
    echo "</tr>";
  }
  echo "</table>";

}

//34. Returns a list of all manufacturers that exist in the database, 
//along with the products that each has. The list should also
//show those manufacturers who do not have associated products.
function query_34($pdo) {
  $query = "SELECT manufacturer.name as mn, product.name as pn FROM manufacturer
  LEFT JOIN product
  ON manufacturer.code = product.manufacturer_code";

  $d = $pdo->query($query);
  

  echo "<table border='1' width=100%>
  <tr>
  <th>Manufacturer</th>
  <th>Product</th>
  </tr>";

  foreach ($d as $data) {
    echo "<tr>";
    echo "<td>" . $data['mn'] . "</td>";
    echo "<td>" . $data['pn'] . "</td>";
    echo "</tr>";
  }
  echo "</table>";

}


//35. Returns a list where only those manufacturers that do not have any associated products appear.
function query_35($pdo) {
  $query = "SELECT manufacturer.name as mn FROM product
  RIGHT JOIN manufacturer
  ON product.manufacturer_code = manufacturer.code
  WHERE product.manufacturer_code IS null";

  $d = $pdo->query($query);
  

  echo "<table border='1' width=100%>
  <tr>
  <th>Manufacturer</th>
  </tr>";

  foreach ($d as $data) {
    echo "<tr>";
    echo "<td>" . $data['mn'] . "</td>";
    echo "</tr>";
  }
  echo "</table>";

}

//36. Return all products from the manufacturer Lenovo. (Without using INNER JOIN).
function query_36($pdo) {
  $query = "SELECT product.name as pn, manufacturer.name as mn FROM product

  LEFT JOIN manufacturer ON product.manufacturer_code = manufacturer.code
    
  WHERE manufacturer.name  = 'Lenovo'";

  $d = $pdo->query($query);
  

  echo "<table border='1' width=100%>
  <tr>
  <th>Product</th>
  <th>Manufacturer</th>
  </tr>";

  foreach ($d as $data) {
    echo "<tr>";
    echo "<td>" . $data['pn'] . "</td>";
    echo "<td>" . $data['mn'] . "</td>";
    echo "</tr>";
  }
  echo "</table>";
  
  }

//37. It returns all the data of the products that have the same price as the most expensive product from the manufacturer Lenovo.
//(Without using INNER JOIN).
function query_37($pdo) {
  $query = "SELECT product.name as pn, price, manufacturer.name as mn FROM product 
  LEFT JOIN manufacturer ON product.manufacturer_code = manufacturer.code
  WHERE price IN (SELECT MAX(price) FROM product 
                  LEFT JOIN manufacturer ON product.manufacturer_code = manufacturer.code
                  WHERE manufacturer.name = 'Lenovo')";

  $d = $pdo->query($query);
  

  echo "<table border='1' width=100%>
  <tr>
  <th>Product</th>
  <th>Price</th>
  <th>Manufacturer</th>
  </tr>";

  foreach ($d as $data) {
    echo "<tr>";
    echo "<td>" . $data['pn'] . "</td>";
    echo "<td>" . $data['price'] . "</td>";
    echo "<td>" . $data['mn'] . "</td>";
    echo "</tr>";
  }
  echo "</table>";
  
  }

//38. List the most expensive product name from the manufacturer Lenovo
function query_38($pdo) {
  $query = "SELECT product.name as pn, price as mx, manufacturer.name as mn FROM product 
  LEFT JOIN manufacturer ON product.manufacturer_code = manufacturer.code
  WHERE price IN (SELECT MAX(price)
                  FROM product 
                  LEFT JOIN manufacturer ON product.manufacturer_code = manufacturer.code
                  WHERE manufacturer.name = 'Lenovo') LIMIT 0, 1";

  $d = $pdo->query($query);
  

  echo "<table border='1' width=100%>
  <tr>
  <th>Product</th>
  <th>Price</th>
  <th>Manufacturer</th>
  </tr>";

  foreach ($d as $data) {
    echo "<tr>";
    echo "<td>" . $data['pn'] . "</td>";
    echo "<td>" . $data['mx'] . "</td>";
    echo "<td>" . $data['mn'] . "</td>";
    echo "</tr>";
  }
  echo "</table>";
  
  }

//39.Lists the cheapest product name from the manufacturer Hewlett-Packard.
function query_39($pdo) {
  $query = "SELECT product.name as pn, price as mx, manufacturer.name as mn FROM product 
  LEFT JOIN manufacturer ON product.manufacturer_code = manufacturer.code
  WHERE price IN (SELECT MIN(price)
                  FROM product 
                  LEFT JOIN manufacturer ON product.manufacturer_code = manufacturer.code
                  WHERE manufacturer.name = 'Hewlett-Packard') LIMIT 0, 1";

  $d = $pdo->query($query);
  

  echo "<table border='1' width=100%>
  <tr>
  <th>Product</th>
  <th>Price</th>
  <th>Manufacturer</th>
  </tr>";

  foreach ($d as $data) {
    echo "<tr>";
    echo "<td>" . $data['pn'] . "</td>";
    echo "<td>" . $data['mx'] . "</td>";
    echo "<td>" . $data['mn'] . "</td>";
    echo "</tr>";
  }
  echo "</table>";
  
  }


//40.Returns all products in the database that are priced at or above the most expensive product from the manufacturer Lenovo.
function query_40($pdo) {
  $query = "SELECT product.name as pn, price, manufacturer.name as mn FROM product 
  LEFT JOIN manufacturer ON product.manufacturer_code = manufacturer.code
  WHERE price >= (SELECT MAX(price) FROM product 
                  LEFT JOIN manufacturer ON product.manufacturer_code = manufacturer.code
                  WHERE manufacturer.name = 'Lenovo')";

  $d = $pdo->query($query);
  

  echo "<table border='1' width=100%>
  <tr>
  <th>Product</th>
  <th>Price</th>
  <th>Manufacturer</th>
  </tr>";

  foreach ($d as $data) {
    echo "<tr>";
    echo "<td>" . $data['pn'] . "</td>";
    echo "<td>" . $data['price'] . "</td>";
    echo "<td>" . $data['mn'] . "</td>";
    echo "</tr>";
  }
  echo "</table>";
  
  }

//41.List all Asus products that are priced above the average price of all their products.
function query_41($pdo) {
  $query = "SELECT product.name as pn, price, manufacturer.name as mn FROM product 
  LEFT JOIN manufacturer ON product.manufacturer_code = manufacturer.code
  WHERE manufacturer.name = 'ASUS' AND price > (SELECT AVG(price) FROM product 
                  WHERE manufacturer.name = 'ASUS')";

  $d = $pdo->query($query);
  

  echo "<table border='1' width=100%>
  <tr>
  <th>Product</th>
  <th>Price</th>
  <th>Manufacturer</th>
  </tr>";

  foreach ($d as $data) {
    echo "<tr>";
    echo "<td>" . $data['pn'] . "</td>";
    echo "<td>" . $data['price'] . "</td>";
    echo "<td>" . $data['mn'] . "</td>";
    echo "</tr>";
  }
  echo "</table>";
  
  }




  ?>


</body>
</html>
