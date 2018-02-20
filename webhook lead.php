<?php
$queryUrl = 'https://......crm.lead.add.json';
$queryData = http_build_query(array(
    'fields' => array(
        'NAME' => $Name,
        'LAST_NAME' => '',
        'STATUS_ID' => 'NEW',
        'OPENED' => 'Y',
        'ASSIGNED_BY_ID' => 547,
        'SOURCE_DESCRIPTION' => 'Создан через форму',
        'COMMENTS' => 'Курс за: '.$tovar.' p.',
        'PHONE' => array(array('VALUE' => $_POST['Phone'], 'VALUE_TYPE' => 'WORK' )),
        'EMAIL' => array(array('VALUE' => $_POST['Email'], 'VALUE_TYPE' => 'WORK' )),
    ),
    'params' => array('REGISTER_SONET_EVENT' => 'Y')
));

$curl = curl_init();
curl_setopt_array($curl, array(
    CURLOPT_SSL_VERIFYPEER => 0, 
    CURLOPT_POST => 1,
    CURLOPT_HEADER => 0,
    CURLOPT_RETURNTRANSFER => 1,
    CURLOPT_URL => $queryUrl,
    CURLOPT_POSTFIELDS => $queryData,
));

$result = curl_exec($curl);
curl_close($curl);