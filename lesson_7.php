<?php


use App\Database\DB;

require __DIR__.'/vendor/autoload.php';
require __DIR__.'/app/configure.php';

$databaseName = DB_NAME;

/*
 * Создать БД
*/

$pdo = new PDO('mysql:host='.DB_HOST.';charset='.DB_CHAR,DB_USER,DB_PASS);

if(! $pdo->query("SHOW DATABASES LIKE '$databaseName'")->fetch()) {
    $pdo->exec("CREATE DATABASE $databaseName");
}

unset($pdo);

/*
 * Создать таблицы в БД
 */

$pdo = DB::instance();

if (! $pdo->query("SHOW TABLES LIKE 'partners'")->fetch()) {
    $pdo->exec("CREATE TABLE `partners` (
                        `id` INT NOT NULL AUTO_INCREMENT,
                        `country` VARCHAR(50) NOT NULL,
                        `name` VARCHAR(50) NOT NULL,
                        `city` VARCHAR(50) NOT NULL,
                        `address` VARCHAR(50) NOT NULL,
                        PRIMARY KEY (`id`))"
    );
}
if (! $pdo->query("SHOW TABLES LIKE 'products'")->fetch()) {
    $pdo->exec("CREATE TABLE `products` (
                        `id` INT NOT NULL AUTO_INCREMENT,
                        `partner_id` INT NOT NULL,
                        `name` VARCHAR(50) NOT NULL,
                        `model` VARCHAR(50) NOT NULL,
                        `year` VARCHAR(50) NOT NULL,
                        PRIMARY KEY (`id`))"
    );
    $pdo->exec("ALTER TABLE `products`
                            ADD FOREIGN KEY (`partner_id`)
                            REFERENCES `partners`(`id`)
                            ON DELETE RESTRICT
                            ON UPDATE RESTRICT;"
    );
}
if (! $pdo->query("SHOW TABLES LIKE 'orders'")->fetch()) {
    $pdo->exec("CREATE TABLE `orders` (
                        `id` INT NOT NULL AUTO_INCREMENT,
                        `uid` VARCHAR(50) NOT NULL,
                        `product_id` INT NOT NULL,
                        `sum` INT NOT NULL,
                        PRIMARY KEY (`id`))"
    );
    $pdo->exec("ALTER TABLE `orders`
                            ADD FOREIGN KEY (`product_id`)
                            REFERENCES `products`(`id`)
                            ON DELETE RESTRICT
                            ON UPDATE RESTRICT;"
    );
}
if (! $pdo->query("SHOW TABLES LIKE 'invoices'")->fetch()) {
    $pdo->exec("CREATE TABLE `invoices` (
                        `id` INT NOT NULL AUTO_INCREMENT,
                        `order_id` INT NOT NULL,
                        `paid` BOOL NOT NULL DEFAULT FALSE,
                        PRIMARY KEY (`id`))"
    );
    $pdo->exec("ALTER TABLE `invoices`
                            ADD FOREIGN KEY (`order_id`)
                            REFERENCES `orders`(`id`)
                            ON DELETE RESTRICT
                            ON UPDATE RESTRICT;"
    );
}

/*
 * Реализовать выборку всех заказов по одному из контрагентов
 */

$stm = DB::run("SELECT * 
                    FROM `orders`
                    INNER JOIN products on products.id=orders.product_id
                    WHERE products.partner_id=?", [84]);
var_dump($stm->fetchAll());

/*
 * Реализовать выборку по сумме всех заказов на контрагентов
 */

$stm = $pdo->query("SELECT partners.*,sum(orders.sum) as total
                                FROM `orders`
                                INNER JOIN products on products.id=orders.product_id
                                INNER JOIN partners on products.partner_id=partners.id
                                GROUP BY partners.id
")->fetchAll();
var_dump($stm);

/*
 * Реализовать выборку задвоенных контрагентов 1 способ
 */

$stm = $pdo->query("SELECT name, country, COUNT(*) as dublicated
                                FROM `partners`
                                GROUP BY name,country
                                HAVING dublicated > 1
                                ORDER BY dublicated DESC
")->fetchAll();
var_dump($stm);

/*
 * Реализовать выборку задвоенных контрагентов 2 способ
 */

$stm = $pdo->query("SELECT *
                                FROM partners AS outer_table
                                WHERE (SELECT COUNT(*)
                                        FROM partners AS inner_table
                                        WHERE inner_table.country = outer_table.country
                                         && inner_table.name = outer_table.name) > 1        
                                ORDER BY outer_table.country, outer_table.name
")->fetchAll();
var_dump($stm);

/*
 * Реализовать выборку всех оплаченных заказов
 */

$stm = $pdo->query("SELECT orders.*, products.*
                                FROM `invoices`
                                INNER JOIN `orders` ON orders.id=invoices.order_id
                                INNER JOIN `products` ON products.id=orders.product_id
                                WHERE invoices.paid = true
")->fetchAll();
var_dump($stm);