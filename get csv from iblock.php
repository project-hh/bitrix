<?php

header('Content-type: text/csv');
header('Content-Disposition: attachment; filename=today.csv');
header('Pragma: no-cache');

define('NO_KEEP_STATISTIC', true); // отключаем статистику
define('NOT_CHECK_PERMISSIONS', true);
require_once($_SERVER['DOCUMENT_ROOT'] . '/bitrix/modules/main/include/prolog_before.php');
CModule::IncludeModule('iblock');
CModule::IncludeModule('crm');