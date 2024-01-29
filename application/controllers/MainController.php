<?php
class MainController extends Controller
{
    public function index() // интерфейсная часть с списком пользователей
    {   
        $users = new User;
        $data = $users->getUserList();
        $this->view->generate('main.php',$data);
    }
    public function user() // форма для добавления начислений определенному пользователю
    {
     $users = new User;
     $data = $users->getUser($this->getCurrentUserId());
     $this->view->generate('user.php',$data);
    }
   public function store() // Метод обработчика формы. Создаем начисления, обновляем баланс у пользователя. Проверки баланса пользователя в этом методе нет.
                           // Баланс пользователя может быть отрицательным.
   {
    $acrruals = new Acrrual;
    $user = new User;
    $acrruals->addAcrrual($_POST['sum'],$_POST['comment'],$_POST['date'],$this->getCurrentUserId());
    $certainUserData = $user->getUser($this->getCurrentUserId());
    foreach ($certainUserData as $certainUser)
    $newUserBalance = $certainUser['balance'] - $_POST['sum'];
    $user->updateBalance($this->getCurrentUserId(),$newUserBalance);
    header("Location: /");
   }
   public function getCurrentUserId() // вспомогательная функция для получения id пользователя
   {
    $url = explode('/',$_SERVER['REQUEST_URI']);
    $userId = $url[3];
    return $userId;
   }
} 