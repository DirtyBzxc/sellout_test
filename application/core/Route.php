<?php
class Route
{
	static function start()
	{
		// контроллер и действие по умолчанию
		$controller_name = 'main';
		$action_name = 'index';
		$model_name = 'User';
		
		$routes = explode('/', $_SERVER['REQUEST_URI']);
		// получаем имя контроллера
		if ( !empty($routes[1]) )
		{	
			$controller_name = $routes[1];
		}
		
		// получаем имя метода
		if ( !empty($routes[2]) )
		{
			$action_name = $routes[2];
		}
		// подцепляем файл с классом модели (файла модели может и не быть)

		$model_file = $model_name.'.php';
		$model_path = "application/models/".$model_file;
		if(file_exists($model_path))
		{
			include "application/models/".$model_file;
		}
		// подцепляем файл с классом контроллера
		$controller_file = ucfirst($controller_name).'Controller'. '.php';
		$controller_path = "application/controllers/".$controller_file;
		
		if(file_exists($controller_path))
		{
			include "application/controllers/".$controller_file;
		}
		else
		{
			Route::ErrorPage404();
		}
		
		// создаем контроллер
		$controller_file_name = str_replace('.php','',$controller_file);
		$controller = new $controller_file_name;
		$action = $action_name;

		if(method_exists($controller, $action))
		{
			if($action == 'chargeoff') // Здесь вызов API метода chargeOff. 
			{
		     $uri = explode('/', $_SERVER['REQUEST_URI']);
			 if(isset($uri[3]) && isset($uri[4]))
			 {
				$productId = $uri[3]; 
				$userId = $uri[4];
				$runCharge = new ApiController;
				$runCharge->chargeOff($productId,$userId);
			 }
			 else
			 {
              echo 'Небходимо ввести ID продукта и пользователя.';
			 }
			}
			elseif($action == 'acrrual')
			{
				$uri = explode('/', $_SERVER['REQUEST_URI']);
				if(isset($uri[3]))
				{
                 $userId = $uri[3];
				 $runAcrrual = new ApiController;
				 $runAcrrual->acrrual($userId);
				}
				else
				{
                 echo 'Введите ID необходимого пользователя!';
				}
			}
			else
			{
				$controller->$action();
			}
		}
		else
		{
			Route::ErrorPage404();
		}
	
	}
	
	public static function ErrorPage404()
	{
        $host = 'http://'.$_SERVER['HTTP_HOST'].'/';
        header('HTTP/1.1 404 Not Found');
		header("Status: 404 Not Found");
		header('Location:'.$host.'404');
    }
}