<head>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
</head>
<body>
<?php include '.ignore/login.php';?>
<style>
.div_main{
    margin-left: auto;
    margin-right: auto;
    max-width: 300px;
}
</style>
<div class="div_main">
<h1>
    Formular cadouri
    <br>
</h1>

<form action ="form.php"  method="post" >
    <div class="form-group">
        <label for="exampleInputEmail1">Nume persoana</label>
        <input type="text" class="form-control" id="name" name="name" placeholder="Name">
    </div>
    <div class="form-group">
        <label for="exampleInputEmail1">Cadou</label>
        <input type="text" class="form-control" id="cadou" name="cadou" placeholder="Cadou">
    </div>
    <div class="form-group">
        <label for="exampleInputEmail1">status</label>
        <input type="number" class="form-control" id="cadou" name="cadou" placeholder="status">
    </div>
    <button class="btn btn-default"><input type="submit">Submit </button>
</form>
</div>

</body>

