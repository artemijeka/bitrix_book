<?php
/**
 * User: kuznecov_fmf
 * Date: 11/25/18
 * Time: 7:21 PM
 * Email: kuznecov@fmf.ru
 * Source: https://toster.ru/q/405203
 */
/**
 * Скорее всего проблема в том, что у Вас в обработчике нет поля EMAIL_TO, а в почтовом шаблоне, скорее всего есть.
 * Я тоже недавно столкнулся с похожей проблемой. Я не использовал никаких стандартных компонент битрикс.
 * Обычная html форма. Вот мой код, может Вам поможет.
 */
CModule::IncludeModule('iblock');
$arSelect = Array("NAME", "ID", "PROPERTY_IMAGE");
$arFilter = Array("IBLOCK_ID" => 15, "ACTIVE" => "Y");
$res = CIBlockElement::GetList(Array(), $arFilter, false, Array(), $arSelect);
while ($ob = $res->GetNextElement()) {
    $arFields = $ob->GetFields();
    if (!empty($arFields['PROPERTY_IMAGE_VALUE'])) {
        $arEventField = array(
            "EMAIL_TO" => $_POST['email'], // - здесь email - это <input type="email" name="email" placeholder="E-mail" value="" required>
            "TEXT" => $_POST['textarea'], // - здесь textarea - это <input type="text" name="textarea" placeholder="Текст сообщения" value="">
        );
        $image = CFile::GetPath($arFields['PROPERTY_IMAGE_VALUE']);
        CEvent::Send("IMAGE_FEEDBACK", 's1', $arEventField, 'Y', 8, array($image));
        /**
         * Поля EMAIL_TO и TEXT - есть в моем почтовом шаблоне под номером 8 и с названием IMAGE_FEEDBACK
         */
    }
}