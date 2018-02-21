<?php 
$arSelect = array('ID', 'NAME', 'PROPERTY_DATE_OF_BIRTHDAY', 'PROPERTY_CONTACT_CRM');
    $arSort = array('ID' => 'DESC');
    $arFilter = array(
        "IBLOCK_ID" => IntVal(74),
        "ACTIVE_DATE" => "Y",
        "ACTIVE" => "Y",
        // '!=PROPERTY_279' => '412',
        'PROPERTY_DATE_OF_BIRTHDAY' => '%' . $date . '%'
    );

    $res = CIBlockElement::GetList($arSort, $arFilter, false, Array("nPageSize" => 200), $arSelect);
    while ($ob = $res->GetNextElement()) {
        $arFields = $ob->GetFields();

        $userinfo = CCrmContact::GetByID($arFields['PROPERTY_CONTACT_CRM_VALUE']);


        $arFilter = [
            'ENTITY_ID' => 'CONTACT',
            'ELEMENT_ID' => $arFields['PROPERTY_CONTACT_CRM_VALUE'],
            'TYPE_ID' => 'EMAIL',
            'VALUE_TYPE' => 'WORK',
        ];
        $arSelectFields = array('*', 'VALUE');
        //$user = \CCrmFieldMulti::GetListEx([],$arFilter,false, ['VALUE'])->fetch();
        $user = \CCrmFieldMulti::GetListEx(array(), $arFilter, false, ['nTopCount' => 1], $arSelectFields)->fetch();

        if (!empty($user)) {
            $list[$user['VALUE']] = trim($userinfo['NAME']) . ' ' . trim($userinfo['SECOND_NAME']);
        }


    } 