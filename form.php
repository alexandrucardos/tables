<html>
<body>
<?php include '.ignore/login.php'; ?>
Welcome <?php echo $_POST["name"];
$insert = 'INSERT INTO test2(id) VALUES ("'.$_POST["name"].'");';
$update = $con->query($insert);
?><br>
</body>
</html>
