<?php 
require_once($_SERVER['DOCUMENT_ROOT'] . '/bitrix/header.php');
\Bitrix\Main\Loader::IncludeModule('crm');


$arSelect = [
    'ID',
    'STAGE_ID',
    'OPPORTUNITY',
    'TITLE',
    'UF_CRM_1487572761', // город
    'UF_CRM_1478762147', // компания
    'UF_CRM_1478762128', // телефон
    'UF_CRM_1478762139', // email
    'UF_CRM_1478763750', // email
    'COMPANY_ID', // email
    'CONTACT_ID', // email

];


$arOrder = Array('ID' => 'DESC');
$arFilter = Array('STAGE_ID' => 'WON', 'CHECK_PERMISSIONS' => 'N', 'TITLE' => '%2018%');
$clients = [];


$arSelectev = Array('ID', 'NAME', 'DATE_ACTIVE_FROM', 'PROPERTY_548');
$arSortev = array('PROPERTY_207_VALUE' => 'ASC');


$deals = CCrmDeal::GetList($arOrder, $arFilter, $arSelect);

while ($deal = $deals->Fetch()) {
    //var_dump($deal);
    $products = \CCrmDeal::LoadProductRows($deal['ID']);
//print_r($products);
//////////
///
    foreach ($products as $product) {

        $arFilterev = array(
            'IBLOCK_ID' => 48,
            'ACTIVE_DATE' => 'Y',
            'ACTIVE' => 'Y',
            'ID' => $product['PRODUCT_ID'] + 0,
            '>=PROPERTY_207' => '2018-01-01 00:00:00',

        );

        $res = CIBlockElement::GetList($arSortev, $arFilterev, false, Array('nPageSize' => 200), $arSelectev);
        while ($ob = $res->GetNextElement()) {
            $arFields = $ob->GetFields();
            if (empty($deal['UF_CRM_1478762139'])) {
                $mail = \Russaldi\Company::getEmails($deal['COMPANY_ID']);
                $deal['UF_CRM_1478762139'] = $mail[0];
            }

            if (empty($deal['UF_CRM_1478762139'])) {
                $mail = \Russaldi\Contact::getEmails($deal['CONTACT_ID']);
                $deal['UF_CRM_1478762139'] = $mail[0];
            }

            $clients [] = array(
                'ID' => $deal['ID'],
                'UF_CRM_1478762066' => $deal['UF_CRM_1478762066'],
                'UF_CRM_1478762128' => $deal['UF_CRM_1478762128'],
                'UF_CRM_1478762139' => $deal['UF_CRM_1478762139'],
                'UF_CRM_1478763750' => $deal['UF_CRM_1478763750'],
                'city' => $arFields['PROPERTY_200_VALUE'],
                'start' => $arFields['PROPERTY_207_VALUE'],
                'end' => $arFields['PROPERTY_208_VALUE'],
                'status' => $arFields['PROPERTY_548_VALUE'],
            );
            //print_r($events);
        }

    }


////////////////

