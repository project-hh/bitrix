<?php
$task = CTasks::GetByID($id_tast)->Fetch();
echo $task['NAME'];