<?php

$group = \Bitrix\Socialnetwork\Item\Workgroup::getById($idgroup)->getFields();
echo $group['NAME'];