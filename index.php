<head></head>
<body>
<h1>
    This is a list of things to buy
    <br>
</h1>
<p>
    Items from the list to buy
</p>
</body>
<?php
include '.ignore/login.php';
$test = "SELECT * FROM cadouri";
$result =$con->query($test);

if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
        echo "<td>";
        echo "<tr>Nume:---" . $row["nume"]."</tr>".
            "<tr>--------" . $row["cadou"]."</tr>"."<br>";
        echo "</td>";
    }
} else {
    echo "0 results";
}
?>

