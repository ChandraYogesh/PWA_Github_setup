<?php
echo "before setting Timezone:";
echo date('d-m-Y H:i:s')."<br/>";
date_default_timezone_set("America/Chicago");   //India time (GMT+5:30)

echo "After setting Timezone:";
echo date('d-m-Y H:i:s');
