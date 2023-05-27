<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Laravel & MYSQL DB connection</title>
</head>
<body>
    <div>
    <?php 
    if(DB::connection()->getpdo()){
        echo "Successfully connected to the database and the database name is " . DB::connection()->getDatabaseName();
    }
?>
    </div>
</body>
</html>