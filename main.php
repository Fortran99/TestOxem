<?php
require_once 'Farm.php';
require_once './Animals/Cow.php';
require_once './Animals/Chicken.php';
$farm = new Farm();

// for ($i = 0; $i < 10; $i++) 
// {
//     $farm->addAnimal(new Cow());
//     $farm->addAnimal(new Chicken());
//     $farm->addAnimal(new Chicken());
// }


//Создаем 10 коровок и 20 курочек
$farm->addAnimalAtCount(Cow::class, 10);
$farm->addAnimalAtCount(Chicken::class, 20);

echo "На ферме ";
foreach($farm->getCountAndTypeAnimals() as $key => $value) {
    echo "$key = $value, ";
}
echo "\n";
echo "Спустя 7 дней...\n";

foreach($farm->getAtWeek() as $key => $value) {
    echo "На ферме $key = $value \n";
}
echo "Купили на рынке одного 1 корову и 5 кур<br>";
$farm->addAnimalAtCount(Cow::class, 1);
$farm->addAnimalAtCount(Chicken::class, 5);

echo "На ферме ";
foreach($farm->getCountAndTypeAnimals() as $key => $value) {
    echo "$key = $value, ";
}

echo "\n";
echo "Спустя 7 дней...\n";

foreach($farm->getAtWeek() as $key => $value) {
    echo "На ферме $key = $value \n";
}

echo "Собрано за все время: ";
foreach($farm->getGeneralResources() as $key => $value) {
    echo "$key = $value ";
}