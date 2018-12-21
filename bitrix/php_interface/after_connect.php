<?
$DB->Query("SET NAMES 'utf8'");
$DB->Query('SET collation_connection = "utf8_unicode_ci"');

// Для правки ошибки при проверке системы после установки.
$DB->Query("SET sql_mode=''");
// Для правки часвого пояса в БД.
$DB->Query("SET LOCAL time_zone='".date('P')."'");
?>