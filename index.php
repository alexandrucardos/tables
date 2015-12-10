<head></head>
<body>
<style>
    table,tr,td{
        font-size: 20px;
        width: 100%;
        border: 1px solid black;
        border-collapse: collapse;
    }
    .thick_line_column{
        width: 30%;
        border: 2px solid ;
    }
    .red_cell{
        border: 2px solid red;
    }
    .green_cell{
        border: 2px solid green;
    }
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
echo"<table>";
if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
        echo '<tr>';
        echo "<td class='thick_line_column'>" . $row["nume"]."</td>".
            "<td>..." . $row["cadou"]."</td>".
            "<td";
            if($row["status"]==1){
                echo' class = "green_cell"';
            }else {echo' class = "red_cell"';}
            echo">".$row["status"]."</td>".
            "</tr>";
    }
    echo"</table>";

} else {
    echo "0 results";
};

?>

