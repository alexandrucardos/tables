<head>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
</head>
<body>
<style>

    .div_main {
        max-width: 600px;
        margin-left: auto;
        margin-right: auto;
        margin-top: 10px;
    }

    .proiecte_saptamanale {
        margin-top: 60px;
    }

</style>
<div class="div_main">

<?php
include '.ignore/login.php';

?>
<?php
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
echo '<table class = "table table-striped table-bordered table-responsive table-hover col-md-3 proiecte_saptamanale">';
?>
    <td><strong>
        Weekly projects
    </td>
    <?php
while ($proiecte_fetch = $proiecte_qry->fetch_assoc()) {
    echo "<tr";
    if ($proiecte_fetch['Timp ramas'] <= 0) {
        echo ' class = "success"';
    }
    echo ">";
    echo "<td>" . $proiecte_fetch['idProiect'] . "</td>";
    echo "<td>" . $proiecte_fetch['numeProiect'] . "</td>";
    echo "<td><strong>" . $proiecte_fetch['Timp ramas'] . "</strong></td>";
};
?>
</div>

<div class="div_car">


<?php
$cheltuieliMasina = "SELECT m.*, TIMESTAMPDIFF(DAY,CURDATE(),m.data_realizare_serviciu) AS days FROM masina m WHERE m.`status`=0 ORDER BY m.data_realizare_serviciu ASC ;";
$masinaQry = $con->query($cheltuieliMasina);

echo '<table class = "table table-striped table-bordered table-responsive table-hover col-md-3 proiecte_saptamanale">';
?>
    <td><strong>
        Car expenses
    </td>
    <?php
while ($masina_qry = $masinaQry->fetch_assoc()) {
    echo "<tr";
    if ($masina_qry['days'] <= -1) {
        echo ' class = "danger"';
    }
    echo ">";
    echo "<td>" . $masina_qry['nume_serviciu'] . "</td>";
    echo "<td>" . $masina_qry['data_realizare_serviciu'] . "</td>";
    echo "<td>" . $masina_qry['days'] . "</td>";
};
?>
</div>
</body>