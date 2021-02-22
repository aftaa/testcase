<?php

$pdo = new \PDO("pgsql:dbname=testdb;user=testuser;password=testpassword;host=db");

$sql = 'SELECT id, from_currency, to_currency, amount, course, converted, date_added '
    . 'FROM public.conversions WHERE date_deleted IS NULL ORDER BY date_added DESC';

$result = $pdo->query($sql)->fetchAll(\PDO::FETCH_ASSOC);

$data = [];
foreach ($result as $row) {
    $data[] = (object)$row;
}

$data = json_encode($data);
echo $data;
