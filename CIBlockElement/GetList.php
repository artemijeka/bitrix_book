<?php
/**
 * Created by PhpStorm.
 * User: kuznecov_fmf
 * Date: 11/23/18
 * Time: 7:26 AM
 * Email: kuznecov@fmf.ru
 */
////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
/**
 * GetList
 */
$arSort = array(
//    "NAME" => "ASC, NULLS",
    "PROPERTY_19_2001" => "ASC" // YEAR
);

$arFilter = array(
    "IBLOCK_ID" => 6, // "IBLOCK_ID" => 6 - книги (id инфоблока)
    "ACTIVE" => "Y",
    "INCLUDE_SUBSECTIONS" => "Y"
);

$arGroup = array(
    "PROPERTY_19_2001" // YEAR
);
/**
 * Параметры для постраничной навигации и ограничения количества выводимых элементов.
 */
$arNav = array(
    "nPageSize" => 10
);

$arSelect = array(
    "IBLOCK_ID", // IBLOCK_ID - ОБЯЗАТЕЛЬНО!!! - инфоблок id
    "ID", // ID - ОБЯЗАТЕЛЬНО!!! - id элемента
    "NAME",
    "PROPERTY_19_2001",
    "PREVIEW_TEXT"
);

$res = CIBlockElement::GetList(
    $arSort,
    $arFilter,
    $arGroup,
    $arNav,
    $arSelect
);
//var_dump($res);
//print_r($res);
while ($ob = $res->GetNextElement()) {
    $arFields = $ob->GetFields();
    echo '<pre>';
    echo '<br>';
    echo $arFields['PROPERTY_19_2001_VALUE'];
    echo '<br>';
    echo $arFields['CNT'];
    echo '</pre>';
    var_dump($arFields);
}
////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////