<?php
/**
 * Created by PhpStorm.
 * User: artem
 * Date: 16.11.18
 * Time: 17:20
 */

/**
 * include Module
 * https://dev.1c-bitrix.ru/api_help/main/reference/cmodule/includemodule.php
 */
require_once($_SERVER["DOCUMENT_ROOT"]."/bitrix/modules/main/include.php"); // подключение главного модуля
require_once($_SERVER["DOCUMENT_ROOT"]."/bitrix/modules/iblock/include.php"); // подключение модуля информационных блоков (нужен когда работаешь с  классами CIBlockElement, CIBlockSection)