<?php
$server = isset($_SERVER['HTTP_REFERER']) ? $_SERVER['HTTP_REFERER'] : "";

//untuk local host
yii::setAlias('@uploadimage', $_SERVER['DOCUMENT_ROOT'].'/TA2_1');
yii::setAlias('@showimage', $server.'/TA2_1');

//untuk hosting domain
/*yii::setAlias('@uploadimage', $server);
yii::setAlias('@showimage', '');*/

return [
    'adminEmail' => 'admin@example.com',
    'senderEmail' => 'noreply@example.com',
    'senderName' => 'Example.com mailer',
];
