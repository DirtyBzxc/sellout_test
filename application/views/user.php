<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Форма начислений</title>
    <link rel="stylesheet" type="text/css" href="/css/style.css" />
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
</head>
<body>
 <?php
 foreach ($data as $user) 
 {
 }
 ?>
<div id="page-content-wrapper">
    <div class="container-fluid shadow-lg p-3 mb-5 bg-white rounded">
        <h3 class="mt-4">Форма начислений для <?php echo $user['name']?></h3>
        <small id="emailHelp" class="form-text text-muted">Здесь вы можете добавить начисления для пользователя</small>
    <div class ='w-25'>

    <form method = 'post' action = "/main/store/<?php echo $user['id']?>">
       <div class="form-group">
         <label for="sum">Сумма начислений</label>
         <input type="number" class="form-control" name="sum" placeholder="Введите сумму..">    
        </div>
         <div class="form-group">
         <label for="comment">Комментарий</label>
         <input type="text" class="form-control" name="comment" placeholder="Добавьте комментарий....">
         </div>
        <div class="form-group">
        <label for="date">Дата</label>
        <input type="date" class="form-control" name ='date' value="<?php echo date('Y-m-d'); ?>" />
        </div>
        <button type="submit" class="btn btn-primary mt-3">Добавить</button> 
    </form>

    </div>
    </div>
</div>
</body>
</html>