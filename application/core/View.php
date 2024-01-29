<?php
class View
{
	public $view_file;
	
	function generate($view_file,$data = null) // функция для генерации view
	{
	
		include 'application/views/'.$view_file;
	}
}