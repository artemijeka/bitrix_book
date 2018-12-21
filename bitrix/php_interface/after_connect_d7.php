<?
$connection = \Bitrix\Main\Application::getConnection();
$connection->queryExecute("SET NAMES 'utf8'");
$connection->queryExecute('SET collation_connection = "utf8_unicode_ci"');

// Для правки ошибки при проверке системы после установки.
$connection->queryExecute("SET sql_mode=''");
// Для правки часвого пояса в БД.
$connection->queryExecute("SET LOCAL time_zone='".date('P')."'");
?>