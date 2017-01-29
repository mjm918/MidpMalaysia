<?php
require_once ('./vendor/autoload.php');
$key = [
    'public'=>'pk_test_eVo4UQbhozE6MmP8G1rJ1fqx',
    'private'=>'sk_test_wBbLhzbcwCwAIosp8vcDaCoQ'
];

\Stripe\Stripe::setApiKey($key['private']);

?>