<head>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
</head>
<body>
<style>

</style>

<h1>
    This is a list of things to buy
    <br>
</h1>
<h2>
    Presents for important persons
</h2>

</body>
<?php
include '.ignore/login.php';
$test = "SELECT * FROM cadouri";
$result =$con->query($test);
echo'<table class = "table table-striped table-bordered table-responsive table-hover">';
if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
        echo '<tr';
        if($row["status"]==1){echo' class = "success"';}
            elseif($row["status"]==2){echo' class="info"';}
            else {echo' class = "danger"';}
        echo'>';
        echo "<td>" . $row["nume"]."</td>".
            "<td>" . $row["cadou"]."</td>".
        "</tr>";
    }
    echo"</table>";

} else {
    echo "0 results";
};

?>

