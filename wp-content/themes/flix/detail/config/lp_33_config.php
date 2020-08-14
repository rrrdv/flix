<?php

use Wordpress\Multisite\Commons\Support\Facades\BillingParams;
use Wordpress\Multisite\Commons\Flows\BlockFlows;
use Wordpress\Multisite\Commons\Support\Facades\Session;

// Specify for which action you want to send aditional parameter
BillingParams::action('PrepareSubscription');

// enable debuging
BillingParams::debug();


BillingParams::forceAppend(['slick' => 'lp33']);


BlockFlows::instance()->setFlows(['redirect']);