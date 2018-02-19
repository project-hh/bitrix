<?php
require_once($_SERVER['DOCUMENT_ROOT'] . '/bitrix/header.php');

$APPLICATION->SetTitle('Название');

$list = array();

$arSelect = array('ID', 'NAME', 'PROPERTY_282');
$arSort = array('NAME' => 'ASC');
$arFilter = array(
    'IBLOCK_ID' => 107,
    'ACTIVE_DATE' => 'Y',
    'ACTIVE' => 'Y',
    '!=PROPERTY_279' => '412',
);

$res = CIBlockElement::GetList($arSort, $arFilter, false, Array('nPageSize' => 200), $arSelect);
while ($ob = $res->GetNextElement()) {
    $arFields = $ob->GetFields();
}