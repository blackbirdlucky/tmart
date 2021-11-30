<?php

try {
	$pdo = new PDO('mysql:dbname=tmart; host=localhost', 'root', '');
} catch (PDOException $e) {
	die($e->getMessage());
}