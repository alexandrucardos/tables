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
$test = "select * from taskuri";
$result =$con->query($test);

if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
        echo "id: " . $row["idTask"]. " - Name: " . $row["numeTask"]. "<br>";
    }
} else {
    echo "0 results";
}
?>

