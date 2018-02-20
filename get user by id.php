<?php
$User = CUser::GetByID($id_user)->Fetch();
echo $User['NAME'];