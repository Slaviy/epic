<?php

$db = connection($db_config);

$stmt = $db->prepare('SELECT `m`.*, `u`.`name` AS `user_name` FROM `messages` AS `m` JOIN `users` AS `u` ON `u`.`id`=`m`.`user_id`  ORDER BY `date` DESC LIMIT 40');
$stmt->execute();
$data = $stmt->fetchAll();
echo template('templates/home.php', [
    'posts' => $data
]);
