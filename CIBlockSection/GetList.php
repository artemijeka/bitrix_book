<?php
/**
 * Created by PhpStorm.
 * User: kuznecov_fmf
 * Date: 11/24/18
 * Time: 12:39 PM
 * Email: kuznecov@fmf.ru
 */
echo 'CIBlockSection::GetList:';

/************** Найти раздел с символьным кодом 'ladan' и вывести значения всех пользовательских свойств **************/
/**
 * Сортировка.
 * 'ID' => 'ASC',
 */
$arSort = array();
/**
 * Фильтр по пользовательскому свойству.
 * 'IBLOCK_ID' => 53 - по коду родительского информационного блока - ОБЯЗАТЕЛЕН, если нужно получить пользовательское свойство;
 * "ACTIVE" => "Y" - активные разделы;
 * "ID"=>7 - раздел с id=7;
 * 'CODE' => 'ladan' - символьный код раздела 'ladan';
 * 'IBLOCK_CODE'=>'catalog_1c-bitrix' - код инфоблока;
 * "ELEMENT_SUBSECTIONS"=>"Y" - подсчитывать элементы вложенных подразделов или нет (Y|N). По умолчанию Y;
 * 'CNT_ACTIVE' => 'Y' - при подсчете учитывать активность элементов (Y|N). По умолчанию N. Учитывается флаг активности элемента ACTIVE и даты начала и окончания активности.
 *
 */
$arFilter = array('IBLOCK_ID' => '53', 'CODE' => 'ladan');
/**
 * Отдать кол-во элементов в разделе.
 * Если true то в $arFilter можно указать "ELEMENT_SUBSECTIONS"=>"Y"
 */
$bElementCnt = false;
/**
 * 'UF_'ИМЯ_СВОЙСТВА' - конкретные пользовательские свойства;
 * 'UF_*' - все пользовательские свойства;
 * 'ID', 'NAME', 'CODE', 'IBLOCK_ID', 'IBLOCK_SECTION_ID'
 */
$arSelect = array('ID', 'UF_*');
/**
 * Массив для постраничной навигации. Может содержать следующие ключи:
 *      bShowAll - разрешить вывести все элементы при постраничной навигации;
 *      iNumPage - номер страницы при постраничной навигации;
 *      nPageSize - количество элементов на странице при постраничной навигации;
 *      nTopCount - ограничить количество возвращаемых методом записей сверху значением этого ключа (ключ доступен с версии 15.5.5 ).
 */
$arNav = fasle;

$obRes = CIBlockSection::GetList(
    $arSort,
    $arFilter,
    $bElementCnt,
    $arSelect,
    $arNav
);

//var_dump($obRes);
while ($arRes = $obRes->GetNext()) {
//    var_dump($arRes);
    foreach ($arRes as $key => $value) {
        preg_match('~^UF_\X*~', $key, $match); // \X - Matches any valid Unicode sequence, including line breaks.
        if (!empty($match)) {
            print_r('<br>' . $key . ' - ' . $value . '<br>');
        }
    }
}
/**********************************************************************************************************************/