<?php

use Wordpress\Multisite\Commons\Support\Facades\BillingParams;
use Wordpress\Multisite\Commons\Flows\BlockFlows;
use Wordpress\Multisite\Commons\Support\Facades\Session;

// Specify for which action you want to send aditional parameter
BillingParams::action('PrepareSubscription');

// enable debuging
BillingParams::debug();

// if (Session::get('artificial_click')) {
//     BillingParams::forceAppend(['vulnerable' => true]);
// } else {
    // append additional parameter
    BillingParams::forceAppend(['slick' => 'javascriptv3']);
// }

BlockFlows::instance()->setFlows(['redirect']);
