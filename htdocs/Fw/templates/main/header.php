<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php $this->getPager()->showHead();?>
    <title><?php $this->getPager()->showProperty('title');?></title>
</head>
<body>
    <h1><?php $this->getPager()->showProperty('h1');?></h1>
    <p id='content'>Content</p>

