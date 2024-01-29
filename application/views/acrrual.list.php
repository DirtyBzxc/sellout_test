<!DOCTYPE html>
<html lang="ru">
<link rel="stylesheet" type="text/css" href="/css/style.css" />
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
<head>
	<meta charset="utf-8">
	<title>История начислений</title>
</head>
<body>
<div id="page-content-wrapper">
    <div class="container-fluid">
        <h1 class="mt-4 mb-5">История начислений</h1>
        <?php
        foreach ($data as $acrrual) 
        {
            echo "<ul class = 'list-group w-25 mb-5'>";
            echo  "<li class = 'list-group-item'>" . 'ID начисления: ' . $acrrual['id'] .'</li>';
            echo "<li class = 'list-group-item'>" . 'Cумма начисления: ' . $acrrual['sum'] .'</li>';
            echo "<li class = 'list-group-item'>" . 'Комментарий: ' . $acrrual['comment'] .'</li>';
            echo "<li class = 'list-group-item'>" . 'Дата начисления: ' . $acrrual['date'] .'</li>';
            echo "<li class = 'list-group-item'>" . 'ID пользователя: ' . $acrrual['user_id'] .'</li>';  
            echo '</ul>';
          }
        ?>
        </ul>
    </div>
</div>
</body>
</html>