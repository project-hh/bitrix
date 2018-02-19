<?php

$PROP = array();
$PROP[793] = 1009;  // свойству с кодом 12 присваиваем значение 'Белый'


foreach ($arrayk as $item){
    $el = new CIBlockElement;
	

    $arLoadProductArray = Array(
        'MODIFIED_BY'    => '1009', // элемент изменен текущим пользователем
        'IBLOCK_SECTION_ID' => false,          // элемент лежит в корне раздела
        'IBLOCK_ID'      => 107,
        'NAME'           => $item[0],
        'ACTIVE_TO' => $item[2],
        'PROPERTY_VALUES'=> $PROP,
        'ACTIVE'         => 'Y',            // активен
    );

    if($PRODUCT_ID = $el->Add($arLoadProductArray))
        echo '<br>New ID: '.$PRODUCT_ID;
    else
        echo '<br>Error: '.$el->LAST_ERROR;
}