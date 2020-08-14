<?php

use Wordpress\Multisite\Commons\Support\Facades\BillingParams;
use Wordpress\Multisite\Commons\Flows\BlockFlows;

// Specify for which action you want to send aditional parameter
BillingParams::action('PrepareSubscription');

// enable debuging
BillingParams::debug();


// append additional parameter
BillingParams::forceAppend(['slick' => 'javascript']);

BlockFlows::instance()->setFlows(['redirect']);