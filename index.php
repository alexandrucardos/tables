<head>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
</head>
<body>
<style>
    .div_main{
        max-width: 600px;
        margin-left: auto;
        margin-right: auto;
    }
</style>
<div class="div_main">
<h1>
    This is a list of things to buy and do
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
echo'<table class = "table table-striped table-bordered table-responsive table-hover col-md-3 ">';
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
<?
$proiecte_saptamanale = "SELECT  pnotlog.idProiect, pnotlog.numeProiect,  COALESCE(plog.Timp_minute,0) AS 'Timp logat' , pnotlog.Timp_necesar_minute - COALESCE(plog.Timp_minute, 0) AS 'Timp ramas' , (case when pnotlog.Timp_necesar_minute - COALESCE(plog.Timp_minute, 0)<=0 then 'Done' else NULL end) as 'Finalizate'
FROM proiecte pnotlog
LEFT JOIN
		(
			SELECT p.idProiect, l.`Data`,SUM(l.Timp_minute) AS Timp_minute
			FROM proiecte p
			LEFT JOIN log_timp l ON l.Id_proiect =p.idProiect
			WHERE p.StatusCompletare IN (2)
			AND (week(l.`Data`-interval 1 day)= week(CURRENT_DATE()-interval 1 day))
			GROUP BY p.idProiect
		) plog ON plog.idProiect = pnotlog.idProiect
WHERE pnotlog.StatusCompletare IN (2);";
$proiecte_qry = $con->query($proiecte_saptamanale);
echo'<table class = "table table-striped table-bordered table-responsive table-hover col-md-3 ">';
while($proiecte_fetch=$proiecte_qry->fetch_assoc()) {
    echo "<tr>";
    echo "<td>".$proiecte_fetch['idProiect']."</td>";
    echo "<td>".$proiecte_fetch['numeProiect']."</td>";
    echo "<td><strong>".$proiecte_fetch['Timp ramas']."</strong></td>";
};

?>
</div>
