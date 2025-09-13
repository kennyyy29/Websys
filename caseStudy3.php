<!DOCTYPE html>
<html>
<head>
  <title>Case Study 3</title>
</head>
<body>

<h2>Multiplication Table</h2>


<form method="get" action="">
  Rows: <input type="number" name="rows" min="1" required>
  Columns: <input type="number" name="cols" min="1" required>
  <input type="submit" value="Generate">
</form>

<?php

if (isset($_GET['rows']) && isset($_GET['cols'])) {
    $rows = (int)$_GET['rows'];
    $cols = (int)$_GET['cols'];

    echo "<table border='1' cellpadding='5' cellspacing='0'>";

    
    echo "<tr><th>X</th>";
    for ($j = 1; $j <= $cols; $j++) {
        echo "<th>$j</th>";
    }
    echo "</tr>";

    
    for ($i = 1; $i <= $rows; $i++) {
        echo "<tr>";
        echo "<th>$i</th>"; 
        for ($j = 1; $j <= $cols; $j++) {
            $product = $i * $j;
            if ($product % 2 !== 0) {
                echo "<td><b style='background:yellow;'>$product</b></td>";
            } else {
                echo "<td>$product</td>";
            }
        }
        echo "</tr>";
    }

    echo "</table>";
}
?>

</body>
</html>
