<!DOCTYPE html>
<html lang="ru">
<link rel="stylesheet" type="text/css" href="/css/style.css" />
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
<head>
	<meta charset="utf-8">
	<title>Интерфейсная часть</title>
</head>
<body>
<div id="page-content-wrapper">
    <div class="container-fluid">
        <div class ='d-flex justify-content-between w-25'>
        <h1 class="mt-4">Список пользователей</h1>
        <a href="acrrual" class="btn btn-primary p-0 h-25 mt-5">История начислений</a>
        </div>
			<ul class="list-group w-25">
            <?php foreach ($data as $player)
             {
                echo '<a href="'. MAIN_CONTROLLER . '/user' . '/' . $player['id'].'"><li class => ' . $player['id'] . '. '  . $player['name'].'</li></a>';
             } 
             ?>
            </ul> 
    </div>
</div>
</body>
</html>