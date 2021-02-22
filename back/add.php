<?php

$pdo = new \PDO("pgsql:dbname=testdb;user=testuser;password=testpassword;host=db");

$input = file_get_contents('php://input');
$input = json_decode($input);

$sql = 'INSERT INTO public.conversions (from_currency, to_currency, amount) VALUES (:from, :to, :amount)';

$data = [
    'from_currency' => $input['from_currency'] ?? 1,
    'to_currency'   => $input['to_currency'] ?? 1,
    'amount'        => $input['amount'] ?? 1,
];

$stmt = $pdo->prepare($sql);
$stmt->bindValue('from', $data['from_currency']);
$stmt->bindValue('to', $data['to_currency']);
$stmt->bindValue('amount', $data['amount']);

$stmt->execute();
