<?php
define("DB_SERVER", "localhost");
define("DB_NAME", "administrador");
define("DB_USER", "root");
define("DB_PASS", "");
class conexao
{
        
public static function verifyCountry($id)
{
$dsn = "mysql:host=".DB_SERVER.";dbname=".DB_NAME.";charset=utf8mb4";
$opt = [
PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
PDO::ATTR_EMULATE_PREPARES => true,
];
try {
$pdo = new PDO($dsn, DB_USER, DB_PASS, $opt);
$stmt = $pdo->prepare("SELECT * FROM admin where id = :id");
$stmt->execute(array('id_user' => $id ));
$result = $stmt->fetch();
} catch (PDOException $exception) {
$pdo = null;
return 0;
}
if ($result['id_user'] == $id) {
return 1;
}
}

}
