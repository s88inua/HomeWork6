
<html>
<body>
<head>
</head>
</body>
<>Если первый раз на этой странице:
<ul>Создать базу</ul>
<ul>Внести данные подключения в  файле Config.php</ul>
<ul>Нажать кнопку - <a href="./imigration.php">Создать таблицы</a> </ul>
    <?php

    if (!empty($_SERVER['HTTP_REFERER'])){
        echo "<b>Таблица создана - можете вносить инфомарцияю</b>";
    }


?>

</p>
<form action="" method=POST enctype="multipart/form-data">
    <p>Введите название категорий:</p>
    <p>Телевизоры<input  name="CategoryName" value = "1" type="radio">
    </p>
    <p>Телефоны <input  name="CategoryName"  value = "2" type="radio">
    </p>
    <p>Ноутбуки<input  name="CategoryName" value = "3" type="radio">
    <div></div></p>
    <p>Колбаса<input  name="CategoryName"  value = "4" type="radio">
    <div></div></p>
    <p>Описание категорий: <input name="CategoryText"  type="text"></p>
    <p>Товар из этой категорий: <input name="ProductName"  type="text"></p>
    <p>Цена товара: <input name="Price"  type="text"></p>
    <p>Photo товара: <input type="file" name="photo"></p>
    <p>Текст товара: <input name="Text"  type="text"></p>
    <input  name="" type="submit" value="Отправить">
</form>
</html>


<?php
require 'config.php';

$CategoryName = $_POST['CategoryName'];
switch($CategoryName){
    case 1:
    $CategorySwitch = 'Телевизоры';
    break;
    case 2:
        $CategorySwitch = 'Телефоны';
        break;
    case 3:
        $CategorySwitch = 'Ноутбуки';
        break;
    case 4:
        $CategorySwitch = 'Колбаса';
        break;
}
$CategoryText = $_POST['CategoryText'];
$ProductName = $_POST['ProductName'];
$Price = $_POST['Price'];
$Text = $_POST['Text'];

if (!file_exists('uploads')) {
    mkdir('uploads', 0777, true);
}

if (!empty($CategoryName)){

    $category = new Category();
    $category->CategoryName = $CategorySwitch;
    $category->CategoryText = $_POST['CategoryText'];
    $category->save();
    $Product = new Products();
    $Product->categories = $CategorySwitch;
    $Product->ProductName = $_POST['ProductName'];
    $Product->Price = $_POST['Price'];
    $path = 'uploads/';
    $photo = $_FILES['photo']['name'];
    $path = "uploads/".''.$photo;
    move_uploaded_file($_FILES['photo']['tmp_name'] , "uploads/" . $_FILES['photo']['name']);
    $Product->photo = $path;
    $Product->Text = $_POST['Text'];
    $Product->save();
}


