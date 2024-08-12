<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="/Fw/assets/css/bootstrap.min.css" rel="stylesheet">
     <?php $this->getPager()->showJs();?>
    <?php $this->getPager()->showCss();?>
    <?php $this->getPager()->showString();?>
    <title><?php $this->getPager()->showProperty('title');?></title>
</head>
<body>
    <div class="wrapper">
        <header class='header'>
                <ul class="nav bg-info">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="/index.php">Главная</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/Fw/test/index.php">Форма</a>
                    </li>
                </ul>
        </header>

        
   



