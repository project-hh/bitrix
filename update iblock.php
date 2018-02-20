<?php
require_once($_SERVER['DOCUMENT_ROOT'].'/bitrix/header.php');

$arSelect = array('ID'); // id element
$arFilter = array('IBLOCK_ID' => 48,
    'PROPERTY_204' => '0', // %
); 
$res = CIBlockElement::GetList(array(), $arFilter, false, array('nPageSize' => 1000), $arSelect);

while($obElement = $res->GetNextElement())
{
    $event = $obElement->GetFields();
    $id_list[] = $event['ID'];

}


$arLoadProductArray = array(
    204 => '', //Скидка (процент)
);


foreach ($id_list as $id) {
    CIBlockElement::SetPropertyValuesEx($id, 48, $arLoadProductArray);
    echo $id.'<br>';
}