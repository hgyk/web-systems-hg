<?php
ini_set("display_errors", 1);
error_reporting(E_ALL);
?>
<?php
$dsn = 'mysql:host=rds-web-system-hg.crqmemsomjjy.ap-northeast-1.rds.amazonaws.com;dbname=hg_database';
$username = 'hagiwyk';
$password = 'yukaka61!';

// try-catch
try{
        $pdo = new PDO($dsn,$username,$password);

        $sql = "select created_at, info from site_view_history order by created_at desc limit 1";

        $stmt = $pdo->prepare($sql);

        $stmt -> execute();

        $rec = $stmt->fetch(PDO::FETCH_ASSOC);

        $sqlins = "insert into site_view_history (info) values ('insert test from " . exec('hostname') . "')";

        $stmtins = $pdo->prepare($sqlins);

        $stmtins -> execute();

}catch (PDOException $e) {
}

function escape1($str)
{
    return htmlspecialchars($str,ENT_QUOTES,'UTF-8');
}

?>
<!DOCTYPE html>
<html lang="ja">
<head>
<meta charset="utf-8">
<title>test page for database access</title>
</head>
<body> 
Last Access Time<br><br>
<?php foreach ($rec as $a):?>
        <?=escape1($a)?><br>
<?php endforeach; ?>
Add comment by Mamoru Ito Add comment by Mamoru Ito at 2.hagiwara
</body>
</html>

