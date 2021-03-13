<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>JSON File Reader</title>
</head>
<body>
<h1>JSON File Reader</h1>
<ul>
        <?php session_start();
        foreach($_SESSION['datas'] as $key => $value)
        {?>
        <li>
            <?php 
                    
                            echo " $key :  $value ";
                            echo "<br>";
                     }
            ?>
        </li> 
        
    
</ul>    
</body>
</html>



