<?php

    use Faker\Factory;
    use MyFirstPackage\Models\Connect;
    use MyFirstPackage\Models\Jake;
    use MyFirstPackage\Models\RandomImage;

    include_once "vendor/autoload.php";

    //echo "hello, word";

    //echo Jake::getContent();
    // $conn = new Connect;
    // $faker = Factory::create();
    // $sql = "SELECT * FROM category";
    // $res = $conn->select($sql, []);

    // foreach($res as $item) {
    //     echo $item->machine_name."<br>";
    // }

    $conn = new Connect;
    $faker = Factory::create();
    $randomImage = new RandomImage("600", "600", "girl");
    $randomImage->store("src/upload/demo2.jpg");

    // $sql = "INSERT INTO category (machine_name, title, is_active, is_delete) VALUES (:machine_name, :title, :is_active, :is_delete)";
    
    // $queryArr = [
    //     ":machine_name" => $faker->slug(2),
    //     ":title" => $faker->text(),
    //     ":is_active" => 1,
    //     ":is_delete" => 0
    // ];
    // $conn->insert($sql, $queryArr);
    

