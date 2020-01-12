<?php
/**
 * Created by PhpStorm.
 * User: duanyude
 * Date: 2020/1/13 7:17
 */

$table = new swoole_table(1024);
$table->column("id",$table::TYPE_INT);
$table->column("name",$table::TYPE_STRING,32);
$table->column("age",$table::TYPE_INT);
$table->create();

echo "创建成功，开始赋值",PHP_EOL;

$table->set("duanyude",["id" => 1,"name" => "duanyude","age" => 27]);
$table->set("helilan",["id" => 2,"name" => "helilan","age" => 28]);

print_r($table->get("helilan"));