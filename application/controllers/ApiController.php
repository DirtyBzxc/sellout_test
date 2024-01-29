<?php 
header('Content-type: application/json;charset=utf-8');
class ApiController extends Controller
{
 public function acrrual($userId) //  Api метод возвращающий JSON с списком начислений одного пользователя
 {
   $acrrual = new Acrrual;
   $userAcrruals = $acrrual->getUserAccrual($userId); // в качестве параметра указывается id необходимого пользователя
   print_r($userAcrruals);
   return $userAcrruals;
 }
 public function chargeOff($productId,$userId)
 {
  $user = new User;
  $acrrual = new Acrrual;
  $certainUserData = $user->getUser($userId); // получаем всю информацию о необходимом пользователе через метод getUser модели User
  foreach ($certainUserData as $certainUser) // для удобности работы разбил массив циклом foreach

  $productList = 
   [
    [
      'product_name' => 'IPhone 12',
      'product_price' => 50, 
    ],
    [
      'product_name' => 'MacBook Pro',
      'product_price' => 30,
    ],
    [
      'product_name' => 'Airpods 3',
      'product_price' => 100,
    ]
   ]; // "Стоимость товаров рассчитывается в методе и зависит от товара было в задание, поэтому было принято решение создать ассоциативный массив с продуктами прямо в методе,
    // где первые ключи служат как id продукта

  if(isset($productList[$productId]) && isset($certainUser)) // проверяем есть ли товар и пользователь
   {
        $product = $productList[$productId];  // получаем конкретный товар из многомерного массива в массив $product 
        if($certainUser['balance'] >= $product['product_price']) /// Проверка на то что у пользователя хватает баланса на покупку товара
        {
         $newUserBalance = $certainUser['balance'] - $product['product_price']; // Получаем новый баланс пользователя после списания
         $user->updateBalance($userId,$newUserBalance); // Обновляем баланс пользователя в БД через метод модели User
         $acrrual->addAcrrual($product['product_price'],$product['product_name'],date('Y-m-d'),$userId); // Добавляем в историю начислений покупку пользователя
         echo 'Пользователь ' . $certainUser['name'] . ' приобрел товар ' . $product['product_name'] . '. Новый баланс пользователя: ' . $newUserBalance;
        }
        else
        {
         echo 'Недостаточно баллов у пользователя.';
        }
   }
  else
   {
        echo 'Товар или пользователь не найден.';
   }
 }
}
