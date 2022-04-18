<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta nombre="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="style.css">

    <title>Document</title>
</head>
<body>
    

<?php
$pdo = new PDO("mysql:host=localhost; dbname=tienda", "root", "");

if (isset($_POST['query'])) {

  $query = $_POST['query'];
  
  $data = $query($pdo);
  
}




//1.List the nombre of all the productos in the producto table.
function query_1($pdo) {
$query = "SELECT DISTINCT nombre FROM producto";
$d = $pdo->query($query);

echo "<table border='1' width=100%>
  <tr>
  <th width=50%>producto nombre</th>
  </tr>";

  foreach ($d as $data) {
    echo "<tr>";
    echo "<td>" . $data['nombre'] . "</td>";
    echo "</tr>";
  }
  echo "</table>";

}


//2.List the nombres and precios of all the productos in the producto table.
function query_2($pdo) {
$query = "SELECT  nombre, precio FROM producto";
$d = $pdo->query($query);

echo "<table border='1' width=100%>
  <tr>
  <th width=50%>producto nombre</th>
  <th>precio</th>
  </tr>";

  foreach ($d as $data) {
    echo "<tr>";
    echo "<td>" . $data['nombre'] . "</td>";
    echo "<td>" . $data['precio'] . "</td>";
    echo "</tr>";
  }
  echo "</table>";

}

//3.List all columns in the producto table.
function query_3($pdo) {
  $query = "SELECT * FROM producto";
  $d = $pdo->query($query);
  

  echo "<table border='1' width=100%>
  <tr>
  <th>codigo</th>
  <th width=50%>producto</th>
  <th>precio</th>
  <th>fabricante codigo</th>
  </tr>";

  foreach ($d as $data) {
    echo "<tr>";
    echo "<td>" . $data['codigo'] . "</td>";
    echo "<td>" . $data['nombre'] . "</td>";
    echo "<td>" . $data['precio'] . "</td>";
    echo "<td>" . $data['codigo_fabricante'] . "</td>";
    echo "</tr>";
  }
  echo "</table>";
  
  }


//4. List the nombre of the productos, the precio in euros and the precio in US dollars (USD).
function query_4($pdo) {
$query = "SELECT nombre, precio as 'precio EUR', ROUND(precio * 1.089, 2) as 'precio USD' FROM producto";
$d = $pdo->query($query);

echo "<table border='1' width=100%>
  <tr>
  <th width=50%>nombre</th>
  <th>precio EUR</th>
  <th>precio USD</th>
  </tr>";

foreach ($d as $data) {
  echo "<tr>";
  echo "<td>" . $data['nombre'] . "</td>";
  echo "<td>" . $data['precio EUR'] . "</td>";
  echo "<td>" . $data['precio USD'] . "</td>";
  echo "</tr>";
}
echo "</table>";
}


//5. List the nombre of the productos, the precio in euros and the precio in US dollars.
 //Use the following aliases for columns: producto nombre, euros, US dollars.
 function query_5($pdo) {
 $query = "SELECT nombre as 'Producto nombre', precio as 'Euros', ROUND(precio * 1.089, 2) as 'US dollars' FROM producto";
$d = $pdo->query($query);

echo "<table border='1' width=100%>
  <tr>
  <th width=50%>Producto nombre</th>
  <th>Euros</th>
  <th>US dollars</th>
  </tr>";

  foreach ($d as $data) {
    echo "<tr>";
    echo "<td>" . $data['Producto nombre'] . "</td>";
    echo "<td>" . $data['Euros'] . "</td>";
    echo "<td>" . $data['US dollars'] . "</td>";
    echo "</tr>";
  }
  echo "</table>";

 }


//6.List the nombres and precios of all productos in the producto table, converting the nombres to uppercase.
function query_6($pdo) {
$query = "SELECT UPPER (nombre) AS 'producto nombre', precio FROM producto";
$d = $pdo->query($query);

echo "<table border='1' width=100%>
  <tr>
  <th width=50%>producto nombre</th>
  <th>precio</th>
  </tr>";

  foreach ($d as $data) {
    echo "<tr>";
    echo "<td>" . $data['producto nombre'] . "</td>";
    echo "<td>" . $data['precio'] . "</td>";
    echo "</tr>";
  }
  echo "</table>";

}

//7.List the nombres and precios of all productos in the producto table, converting the nombres to lowercase.
function query_7($pdo) {
$query = "SELECT LOWER (nombre) AS 'producto nombre', precio FROM producto";
$d = $pdo->query($query);

echo "<table border='1' width=100%>
  <tr>
  <th width=50%>producto nombre</th>
  <th>precio</th>
  </tr>";

  foreach ($d as $data) {
    echo "<tr>";
    echo "<td>" . $data['producto nombre'] . "</td>";
    echo "<td>" . $data['precio'] . "</td>";
    echo "</tr>";
  }
  echo "</table>";
}

//8.List the nombres of all the fabricantes in one column, and in another column get the first two characters of 
//the fabricante's nombre in capital letters.
function query_8($pdo) {
$query = "SELECT nombre, UPPER (LEFT (nombre, 2)) AS '2letter' FROM fabricante";
$d = $pdo->query($query);

echo "<table border='1' width=100%>
  <tr>
  <th width=50%>Company nombre</th>
  <th>codigo</th>
  </tr>";

  foreach ($d as $data) {
    echo "<tr>";
    echo "<td>" . $data['nombre'] . "</td>";
    echo "<td>" . $data['2letter'] . "</td>";
    echo "</tr>";
  }
  echo "</table>";

}
//9. List the nombres and precios of all the productos in the producto table, rounding off the value of the precio.
function query_9($pdo) {
  $query = "SELECT nombre , ROUND (precio, 2) AS 'precio' FROM producto";
  $d = $pdo->query($query);
  
  echo "<table border='1' width=100%>
    <tr>
    <th width=50%>producto nombre</th>
    <th>precio (rounded to 2 decimals)</th>
    </tr>";
  
    foreach ($d as $data) {
      echo "<tr>";
      echo "<td>" . $data['nombre'] . "</td>";
      echo "<td>" . $data['precio'] . "</td>";
      echo "</tr>";
    }
    echo "</table>";
  }

  //10.Lists the nombres and precios of all the productos in the producto table, 
  //truncating the value of the precio to show it without any decimal place.
  function query_10($pdo) {
    $query = "SELECT nombre , ROUND (precio, 0) AS 'precio' FROM producto";
    $d = $pdo->query($query);
    
    echo "<table border='1' width=100%>
      <tr>
      <th width=50%>producto nombre</th>
      <th>precio (rounded to integer value)</th>
      </tr>";
    
      foreach ($d as $data) {
        echo "<tr>";
        echo "<td>" . $data['nombre'] . "</td>";
        echo "<td>" . $data['precio'] . "</td>";
        echo "</tr>";
      }
      echo "</table>";
    }

//11. List the codigo of the fabricantes who have productos in the producto table.
function query_11($pdo) {
  $query = "SELECT DISTINCT codigo_fabricante FROM producto";

  $d = $pdo->query($query);
  
  echo "<table border='1' width=100%>
    <tr>
    <th width=100%>fabricantes codigos with productos</th>
    </tr>";
  
    foreach ($d as $data) {
      echo "<tr>";
      echo "<td>" . $data['codigo_fabricante'] . "</td>";
      echo "</tr>";
    }
    echo "</table>";
  }


//12.Lists the codigo of the fabricantes that have productos in the producto table, eliminating the codigos that appear repeated.
function query_12($pdo) {
  $query = "SELECT DISTINCT codigo_fabricante FROM producto";

  $d = $pdo->query($query);
  
  echo "<table border='1' width=100%>
    <tr>
    <th width=100%>fabricantes codigos with productos</th>
    </tr>";
  
    foreach ($d as $data) {
      echo "<tr>";
      echo "<td>" . $data['codigo_fabricante'] . "</td>";
      echo "</tr>";
    }
    echo "</table>";
  }

//13.Lists the nombres of the fabricantes in ascending order
function query_13($pdo) {
  $query = "SELECT nombre FROM fabricante ORDER BY nombre ASC";
  $d = $pdo->query($query);
  
  echo "<table border='1' width=100%>
    <tr>
    <th>Company nombre</th>
    </tr>";
  
    foreach ($d as $data) {
      echo "<tr>";
      echo "<td>" . $data['nombre'] . "</td>";
      echo "</tr>";
    }
    echo "</table>";
  
  }


//14.Lists the nombres of the fabricantes in descending order
function query_14($pdo) {
  $query = "SELECT nombre FROM fabricante ORDER BY nombre DESC";
  $d = $pdo->query($query);
  
  echo "<table border='1' width=100%>
    <tr>
    <th>Company nombre</th>
    </tr>";
  
    foreach ($d as $data) {
      echo "<tr>";
      echo "<td>" . $data['nombre'] . "</td>";
      echo "</tr>";
    }
    echo "</table>";
  
  }

//15.Lists the nombres of the productos ordered first by the nombre in ascending order and second by the precio in descending order
function query_15($pdo) {
  $query = "SELECT nombre, precio FROM producto ORDER BY nombre ASC, precio DESC";
  $d = $pdo->query($query);
  
  echo "<table border='1' width=100%>
    <tr>
    <th>producto nombre</th>
    <th>precio</th>
    </tr>";
  
    foreach ($d as $data) {
      echo "<tr>";
      echo "<td>" . $data['nombre'] . "</td>";
      echo "<td>" . $data['precio'] . "</td>";
      echo "</tr>";
    }
    echo "</table>";
  
  }


//16. Returns a list with the first 5 rows of the fabricante table.
function query_16($pdo) {
  $query = "SELECT nombre FROM fabricante LIMIT 5";
  $d = $pdo->query($query);
  
  echo "<table border='1' width=100%>
    <tr>
    <th>Company nombre (first 5)</th>
    </tr>";
  
    foreach ($d as $data) {
      echo "<tr>";
      echo "<td>" . $data['nombre'] . "</td>";
      echo "</tr>";
    }
    echo "</table>";
  
  }

//17. Returns a list with 2 rows from the fourth row of the fabricante table. The fourth row should also be included in the answer
function query_17($pdo) {
  $query = "SELECT * from fabricante LIMIT 3, 2";
  $d = $pdo->query($query);
  
  echo "<table border='1' width=100%>
    <tr>
    <th>codigo</th>
    <th>Company nombre</th>
    </tr>";
  
    foreach ($d as $data) {
      echo "<tr>";
      echo "<td>" . $data['codigo'] . "</td>";
      echo "<td>" . $data['nombre'] . "</td>";
      echo "</tr>";
    }
    echo "</table>";
  
  }

//18.List the nombre and precio of the cheapest producto. (Use only the ORDER BY and LIMIT clauses). 
//NOTE: I could not use MIN (precio) here, I would need GROUP BY
function query_18($pdo) {
  $query = "SELECT nombre, precio FROM producto GROUP BY precio ASC LIMIT 0, 1";
  $d = $pdo->query($query);
  
  echo "<table border='1' width=100%>
    <tr>
    <th>producto nombre</th>
    <th>precio</th>
    </tr>";
  
    foreach ($d as $data) {
      echo "<tr>";
      echo "<td>" . $data['nombre'] . "</td>";
      echo "<td>" . $data['precio'] . "</td>";
      echo "</tr>";
    }
    echo "</table>";
  
  }

  
//18.List the nombre and precio of the most expensive producto. (Use only the ORDER BY and LIMIT clauses). 
//NOTE: I could not use MIN (precio) here, I would need GROUP BY
function query_19($pdo) {
  $query = "SELECT nombre, precio FROM producto GROUP BY precio DESC LIMIT 0, 1";
  $d = $pdo->query($query);
  
  echo "<table border='1' width=100%>
    <tr>
    <th>producto nombre</th>
    <th>precio</th>
    </tr>";
  
    foreach ($d as $data) {
      echo "<tr>";
      echo "<td>" . $data['nombre'] . "</td>";
      echo "<td>" . $data['precio'] . "</td>";
      echo "</tr>";
    }
    echo "</table>";
  
  }

  //20.Lists the nombre of all productos of the fabricante whose fabricante codigo is equal to 2.
  function query_20($pdo) {
  $query = "SELECT nombre, codigo_fabricante as m_codigo FROM producto WHERE codigo_fabricante = 2";
  $d = $pdo->query($query);
  
  echo "<table border='1' width=100%>
    <tr>
    <th>producto nombre</th>
    <th>codigo</th>
    </tr>";
  
    foreach ($d as $data) {
      echo "<tr>";
      echo "<td>" . $data['nombre'] . "</td>";
      echo "<td>" . $data['m_codigo'] . "</td>";
      echo "</tr>";
    }
    echo "</table>";
  
  }

//21.Returns a list with the producto nombre, precio, and fabricante nombre of all productos in the database.
function query_21($pdo) {
  $query = "SELECT producto.nombre as pn, precio, fabricante.nombre as mn FROM producto LEFT JOIN fabricante ON producto.codigo_fabricante = fabricante.codigo";
  $d = $pdo->query($query);
  

  echo "<table border='1' width=100%>
  <tr>
  <th width=50%>producto</th>
  <th>precio</th>
  <th>fabricante</th>
  </tr>";

  foreach ($d as $data) {
    echo "<tr>";
    echo "<td>" . $data['pn'] . "</td>";
    echo "<td>" . $data['precio'] . "</td>";
    echo "<td>" . $data['mn'] . "</td>";
    echo "</tr>";
  }
  echo "</table>";
  
  }

//22. Returns a list with the producto nombre, precio, and fabricante nombre of all productos in the database. Sort the result by fabricante's
//nombre, in alphabetical order.
function query_22($pdo) {
  $query = "SELECT producto.nombre as pn, precio, fabricante.nombre as mn FROM producto 
  LEFT JOIN fabricante ON producto.codigo_fabricante = fabricante.codigo  ORDER by mn ASC";
  $d = $pdo->query($query);
  

  echo "<table border='1' width=100%>
  <tr>
  <th width=50%>producto</th>
  <th>precio</th>
  <th>fabricante</th>
  </tr>";

  foreach ($d as $data) {
    echo "<tr>";
    echo "<td>" . $data['pn'] . "</td>";
    echo "<td>" . $data['precio'] . "</td>";
    echo "<td>" . $data['mn'] . "</td>";
    echo "</tr>";
  }
  echo "</table>";
  
  }

//23.Returns a list with the producto codigo, producto nombre, fabricante codigo, and fabricante nombre of 
//all productos in the database.
function query_23($pdo) {
  $query = "SELECT producto.codigo as pc, producto.nombre as pn, fabricante.codigo as mc,  fabricante.nombre as mn FROM producto 
  LEFT JOIN fabricante ON producto.codigo_fabricante = fabricante.codigo";
  $d = $pdo->query($query);
  

  echo "<table border='1' width=100%>
  <tr>
  <th>producto codigo</th>
  <th width=30%>producto</th>
  <th>fabricante codigo</th>
  <th>fabricante</th>
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


  //24. Return the nombre of the producto, its precio and the nombre of its fabricante, of the cheapest producto.
  function query_24($pdo) {
    $query = "SELECT producto.nombre as pn, precio, fabricante.nombre as mn FROM producto
    LEFT JOIN fabricante ON producto.codigo_fabricante = fabricante.codigo
    WHERE precio IN (SELECT MIN(precio) FROM producto)";

    $d = $pdo->query($query);
    
  
    echo "<table border='1' width=100%>
    <tr>
    <th>producto</th>
    <th>precio</th>
    <th>fabricante</th>
    </tr>";
  
    foreach ($d as $data) {
      echo "<tr>";
      echo "<td>" . $data['pn'] . "</td>";
      echo "<td>" . $data['precio'] . "</td>";
      echo "<td>" . $data['mn'] . "</td>";
      echo "</tr>";
    }
    echo "</table>";
    
    }


  //25. Return the nombre of the producto, its precio and the nombre of its fabricante, the most expensive producto.
  function query_25($pdo) {
    $query = "SELECT producto.nombre as pn, precio, fabricante.nombre as mn FROM producto
    LEFT JOIN fabricante ON producto.codigo_fabricante = fabricante.codigo
    WHERE precio IN (SELECT MAX(precio) FROM producto)";

    $d = $pdo->query($query);
    
  
    echo "<table border='1' width=100%>
    <tr>
    <th>producto</th>
    <th>precio</th>
    <th>fabricante</th>
    </tr>";
  
    foreach ($d as $data) {
      echo "<tr>";
      echo "<td>" . $data['pn'] . "</td>";
      echo "<td>" . $data['precio'] . "</td>";
      echo "<td>" . $data['mn'] . "</td>";
      echo "</tr>";
    }
    echo "</table>";
    
    }


//26. Returns a list of all productos from the fabricante Lenovo.
function query_26($pdo) {
  $query = "SELECT producto.nombre as pn, fabricante.nombre as mn FROM producto

  LEFT JOIN fabricante ON producto.codigo_fabricante = fabricante.codigo
  
  WHERE fabricante.nombre = 'Lenovo'";

  $d = $pdo->query($query);
  

  echo "<table border='1' width=100%>
  <tr>
  <th>producto</th>
  <th>fabricante</th>
  </tr>";

  foreach ($d as $data) {
    echo "<tr>";
    echo "<td>" . $data['pn'] . "</td>";
    echo "<td>" . $data['mn'] . "</td>";
    echo "</tr>";
  }
  echo "</table>";
  
  }

//27.Returns a list of all Crucial fabricante's productos preciod above € 200.
function query_27($pdo) {
  $query = "SELECT producto.nombre as pn, precio, fabricante.nombre as mn FROM producto

  LEFT JOIN fabricante ON producto.codigo_fabricante = fabricante.codigo
  
  WHERE fabricante.nombre = 'Crucial' AND precio > 200";

  $d = $pdo->query($query);
  

  echo "<table border='1' width=100%>
  <tr>
  <th>producto</th>
  <th>precio</th>
  <th>fabricante</th>
  </tr>";

  foreach ($d as $data) {
    echo "<tr>";
    echo "<td>" . $data['pn'] . "</td>";
    echo "<td>" . $data['precio'] . "</td>";
    echo "<td>" . $data['mn'] . "</td>";
    echo "</tr>";
  }
  echo "</table>";
  
  }

//28. Returns a list of all productos from Asus, Hewlett-Packard and Seagate. Without using the IN operator.
function query_28($pdo) {
  $query = "SELECT producto.nombre as pn, precio, fabricante.nombre as mn FROM producto

  LEFT JOIN fabricante ON producto.codigo_fabricante = fabricante.codigo
  
  WHERE fabricante.nombre = 'Asus' OR fabricante.nombre = 'Hewlett-Packard' OR fabricante.nombre = 'Seagate'";

  $d = $pdo->query($query);
  

  echo "<table border='1' width=100%>
  <tr>
  <th>producto</th>
  <th>precio</th>
  <th>fabricante</th>
  </tr>";

  foreach ($d as $data) {
    echo "<tr>";
    echo "<td>" . $data['pn'] . "</td>";
    echo "<td>" . $data['precio'] . "</td>";
    echo "<td>" . $data['mn'] . "</td>";
    echo "</tr>";
  }
  echo "</table>";
  
  }


//29.Returns a list of all productos from Asus, Hewlett-Packardy Seagate fabricantes. Using the IN operator.
function query_29($pdo) {
  $query = "SELECT producto.nombre as pn, precio, fabricante.nombre as mn FROM producto

  LEFT JOIN fabricante ON producto.codigo_fabricante = fabricante.codigo
  
  WHERE fabricante.nombre IN ('Asus', 'Hewlett-Packard', 'Seagate')";

  $d = $pdo->query($query);
  

  echo "<table border='1' width=100%>
  <tr>
  <th>producto</th>
  <th>precio</th>
  <th>fabricante</th>
  </tr>";

  foreach ($d as $data) {
    echo "<tr>";
    echo "<td>" . $data['pn'] . "</td>";
    echo "<td>" . $data['precio'] . "</td>";
    echo "<td>" . $data['mn'] . "</td>";
    echo "</tr>";
  }
  echo "</table>";
  
  }

//30. Returns a list with the nombre and precio of all the productos of the fabricantes whose nombre ends with the vowel e.
function query_30($pdo) {
  $query = "SELECT producto.nombre as pn, precio, fabricante.nombre as mn FROM producto

  LEFT JOIN fabricante ON producto.codigo_fabricante = fabricante.codigo
  
  WHERE fabricante.nombre LIKE '%e'";

  $d = $pdo->query($query);
  

  echo "<table border='1' width=100%>
  <tr>
  <th>producto</th>
  <th>precio</th>
  <th>fabricante</th>
  </tr>";

  foreach ($d as $data) {
    echo "<tr>";
    echo "<td>" . $data['pn'] . "</td>";
    echo "<td>" . $data['precio'] . "</td>";
    echo "<td>" . $data['mn'] . "</td>";
    echo "</tr>";
  }
  echo "</table>";
  
  }

//31.Returns a list with the nombre and precio of all productos whose fabricante's nombre contains the character w in the nombre
function query_31($pdo) {
  $query = "SELECT producto.nombre as pn, precio, fabricante.nombre as mn FROM producto

  LEFT JOIN fabricante ON producto.codigo_fabricante = fabricante.codigo
  
  WHERE fabricante.nombre LIKE '%w%'";

  $d = $pdo->query($query);
  

  echo "<table border='1' width=100%>
  <tr>
  <th>producto</th>
  <th>precio</th>
  <th>fabricante</th>
  </tr>";

  foreach ($d as $data) {
    echo "<tr>";
    echo "<td>" . $data['pn'] . "</td>";
    echo "<td>" . $data['precio'] . "</td>";
    echo "<td>" . $data['mn'] . "</td>";
    echo "</tr>";
  }
  echo "</table>";
  
  }


//32. Returns a list with the producto nombre, precio and fabricante's nombre of all productos with a precio greater than or equal to € 180.
//Sort the result first by precio (in descending order) and second by nombre (in ascending order)
function query_32($pdo) {
  $query = "SELECT producto.nombre as pn, precio, fabricante.nombre as mn FROM producto
  LEFT JOIN fabricante ON producto.codigo_fabricante = fabricante.codigo
  WHERE precio >= 180
  ORDER BY precio DESC, pn ASC";

  $d = $pdo->query($query);
  

  echo "<table border='1' width=100%>
  <tr>
  <th>producto</th>
  <th>precio</th>
  <th>fabricante</th>
  </tr>";

  foreach ($d as $data) {
    echo "<tr>";
    echo "<td>" . $data['pn'] . "</td>";
    echo "<td>" . $data['precio'] . "</td>";
    echo "<td>" . $data['mn'] . "</td>";
    echo "</tr>";
  }
  echo "</table>";
  
  }

//33. Returns a list with the fabricante's codigo and nombre, only of those fabricantes who have associated productos in the database.
function query_33($pdo) {
  $query = "SELECT DISTINCT fabricante.codigo as mc, fabricante.nombre as mn FROM fabricante 
  LEFT JOIN producto 
  ON fabricante.codigo = producto.codigo_fabricante 
  WHERE fabricante.codigo = producto.codigo_fabricante";

  $d = $pdo->query($query);
  

  echo "<table border='1' width=100%>
  <tr>
  <th>codigo</th>
  <th>fabricante</th>
  </tr>";

  foreach ($d as $data) {
    echo "<tr>";
    echo "<td>" . $data['mc'] . "</td>";
    echo "<td>" . $data['mn'] . "</td>";
    echo "</tr>";
  }
  echo "</table>";

}

//34. Returns a list of all fabricantes that exist in the database, 
//along with the productos that each has. The list should also
//show those fabricantes who do not have associated productos.
function query_34($pdo) {
  $query = "SELECT fabricante.nombre as mn, producto.nombre as pn FROM fabricante
  LEFT JOIN producto
  ON fabricante.codigo = producto.codigo_fabricante";

  $d = $pdo->query($query);
  

  echo "<table border='1' width=100%>
  <tr>
  <th>fabricante</th>
  <th>producto</th>
  </tr>";

  foreach ($d as $data) {
    echo "<tr>";
    echo "<td>" . $data['mn'] . "</td>";
    echo "<td>" . $data['pn'] . "</td>";
    echo "</tr>";
  }
  echo "</table>";

}


//35. Returns a list where only those fabricantes that do not have any associated productos appear.
function query_35($pdo) {
  $query = "SELECT fabricante.nombre as mn FROM producto
  RIGHT JOIN fabricante
  ON producto.codigo_fabricante = fabricante.codigo
  WHERE producto.codigo_fabricante IS null";

  $d = $pdo->query($query);
  

  echo "<table border='1' width=100%>
  <tr>
  <th>fabricante</th>
  </tr>";

  foreach ($d as $data) {
    echo "<tr>";
    echo "<td>" . $data['mn'] . "</td>";
    echo "</tr>";
  }
  echo "</table>";

}

//36. Return all productos from the fabricante Lenovo. (Without using INNER JOIN).
function query_36($pdo) {
  $query = "SELECT producto.nombre as pn, fabricante.nombre as mn FROM producto

  LEFT JOIN fabricante ON producto.codigo_fabricante = fabricante.codigo
    
  WHERE fabricante.nombre  = 'Lenovo'";

  $d = $pdo->query($query);
  

  echo "<table border='1' width=100%>
  <tr>
  <th>producto</th>
  <th>fabricante</th>
  </tr>";

  foreach ($d as $data) {
    echo "<tr>";
    echo "<td>" . $data['pn'] . "</td>";
    echo "<td>" . $data['mn'] . "</td>";
    echo "</tr>";
  }
  echo "</table>";
  
  }

//37. It returns all the data of the productos that have the same precio as the most expensive producto from the fabricante Lenovo.
//(Without using INNER JOIN).
function query_37($pdo) {
  $query = "SELECT producto.nombre as pn, precio, fabricante.nombre as mn FROM producto 
  LEFT JOIN fabricante ON producto.codigo_fabricante = fabricante.codigo
  WHERE precio IN (SELECT MAX(precio) FROM producto 
                  LEFT JOIN fabricante ON producto.codigo_fabricante = fabricante.codigo
                  WHERE fabricante.nombre = 'Lenovo')";

  $d = $pdo->query($query);
  

  echo "<table border='1' width=100%>
  <tr>
  <th>producto</th>
  <th>precio</th>
  <th>fabricante</th>
  </tr>";

  foreach ($d as $data) {
    echo "<tr>";
    echo "<td>" . $data['pn'] . "</td>";
    echo "<td>" . $data['precio'] . "</td>";
    echo "<td>" . $data['mn'] . "</td>";
    echo "</tr>";
  }
  echo "</table>";
  
  }

//38. List the most expensive producto nombre from the fabricante Lenovo
function query_38($pdo) {
  $query = "SELECT producto.nombre as pn, precio as mx, fabricante.nombre as mn FROM producto 
  LEFT JOIN fabricante ON producto.codigo_fabricante = fabricante.codigo
  WHERE precio IN (SELECT MAX(precio)
                  FROM producto 
                  LEFT JOIN fabricante ON producto.codigo_fabricante = fabricante.codigo
                  WHERE fabricante.nombre = 'Lenovo') LIMIT 0, 1";

  $d = $pdo->query($query);
  

  echo "<table border='1' width=100%>
  <tr>
  <th>producto</th>
  <th>precio</th>
  <th>fabricante</th>
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

//39.Lists the cheapest producto nombre from the fabricante Hewlett-Packard.
function query_39($pdo) {
  $query = "SELECT producto.nombre as pn, precio as mx, fabricante.nombre as mn FROM producto 
  LEFT JOIN fabricante ON producto.codigo_fabricante = fabricante.codigo
  WHERE precio IN (SELECT MIN(precio)
                  FROM producto 
                  LEFT JOIN fabricante ON producto.codigo_fabricante = fabricante.codigo
                  WHERE fabricante.nombre = 'Hewlett-Packard') LIMIT 0, 1";

  $d = $pdo->query($query);
  

  echo "<table border='1' width=100%>
  <tr>
  <th>producto</th>
  <th>precio</th>
  <th>fabricante</th>
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


//40.Returns all productos in the database that are preciod at or above the most expensive producto from the fabricante Lenovo.
function query_40($pdo) {
  $query = "SELECT producto.nombre as pn, precio, fabricante.nombre as mn FROM producto 
  LEFT JOIN fabricante ON producto.codigo_fabricante = fabricante.codigo
  WHERE precio >= (SELECT MAX(precio) FROM producto 
                  LEFT JOIN fabricante ON producto.codigo_fabricante = fabricante.codigo
                  WHERE fabricante.nombre = 'Lenovo')";

  $d = $pdo->query($query);
  

  echo "<table border='1' width=100%>
  <tr>
  <th>producto</th>
  <th>precio</th>
  <th>fabricante</th>
  </tr>";

  foreach ($d as $data) {
    echo "<tr>";
    echo "<td>" . $data['pn'] . "</td>";
    echo "<td>" . $data['precio'] . "</td>";
    echo "<td>" . $data['mn'] . "</td>";
    echo "</tr>";
  }
  echo "</table>";
  
  }

//41.List all Asus productos that are preciod above the average precio of all their productos.
function query_41($pdo) {
  $query = "SELECT producto.nombre as pn, precio, fabricante.nombre as mn FROM producto 
  LEFT JOIN fabricante ON producto.codigo_fabricante = fabricante.codigo
  WHERE fabricante.nombre = 'Asus' AND precio > (SELECT AVG(precio) FROM producto 
  LEFT JOIN fabricante ON producto.codigo_fabricante = fabricante.codigo
                  WHERE fabricante.nombre = 'Asus')";

  $d = $pdo->query($query);
  

  echo "<table border='1' width=100%>
  <tr>
  <th>producto</th>
  <th>precio</th>
  <th>fabricante</th>
  </tr>";

  foreach ($d as $data) {
    echo "<tr>";
    echo "<td>" . $data['pn'] . "</td>";
    echo "<td>" . $data['precio'] . "</td>";
    echo "<td>" . $data['mn'] . "</td>";
    echo "</tr>";
  }
  echo "</table>";
  
  }




  ?>


</body>
</html>