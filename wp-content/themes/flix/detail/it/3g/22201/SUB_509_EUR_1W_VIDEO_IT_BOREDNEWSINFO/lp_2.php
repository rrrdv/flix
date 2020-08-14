<?php

use Wordpress\Multisite\Commons\DetailFlow;

# skip detail flow
if (!DetailFlow::instance()->isBillingFlow()) {
    DetailFlow::instance()->restrictRedirect();
    header('Location: ' . DetailFlow::instance()->getDetailLink());
    die();
}
