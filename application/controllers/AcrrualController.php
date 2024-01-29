<?php 
class AcrrualController extends Controller
{
 public function index() // вывод списка истории начислений
 {
    $acrruals = new Acrrual;
    $data = $acrruals->getAcrrualtList();
    $this->view->generate('acrrual.list.php',$data);
 }
}