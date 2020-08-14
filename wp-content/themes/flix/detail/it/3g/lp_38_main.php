<?php

use Wordpress\Multisite\Commons\Decorator\GetPost;
use Wordpress\Multisite\Commons\Support\Facades\Log;
use Wordpress\Multisite\Commons\Support\Facades\Session;
use Wordpress\Multisite\Commons\MarketingCustomization\Flow;
use Wordpress\Multisite\Commons\Support\Facades\PrepareResponse;


$completeUrl = PrepareResponse::getIframeUrl();

parse_str(parse_url($completeUrl, PHP_URL_QUERY), $output);

$transactionId = $output['TransactionID'];

if (Session::get('artificial_click')) {
    $location = 'http://hub1.mpayment.it/gold-end.htm?TransactionID='.$transactionId.'&fgds=true';

    // remove artificial from the session
    Session::remove('artificial_click');

    Log::info(sprintf(
        'Artificial click has occurred for msisdn %s. '
        . 'The user will be redirected to %s',
        Session::getMsisdn(),
        $location
    ));
    
    wp_redirect($location);
    exit;
}

# get background image
$backgroundImage = Flow::instance()->getPostCustomImage(654, 368, Flow::instance()->getPostImage(654, 368));

?>

<!DOCTYPE html>
<html>
	<head>
		<meta charset="ISO-8859-1">
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
			    margin:30% auto;
			    width:90%;
			    text-align: center;
			    background: rgba(0,0,0,0.5);
			}
			.loadingSpin img {
			    width:50px;
			}
			#loading {
			    font-size: 14px;
			    padding:10px;
			    color:#e3e3e3;
			    text-shadow:0 0 1px #000;
			}
			#postImg img{
			    width:100%;
			}
		</style>
		<?php wp_head(); ?>
	</head>
	<body>
		<img src="<?php echo $completeUrl; ?>" id="img" style="display: none;"/>
		<div id="container">
		    <div class="loadingSpin">
		        <img class="spin" src="<?php echo get_stylesheet_directory_uri(); ?>/assets/img/loading.gif" />
		        <div id="loading">Caricamento del contenuto</div>
		    </div>
		</div>
		<div id="postImg">
		    <img src="<?php echo $backgroundImage; ?>" />
		</div>

			<form action='http://hub1.mpayment.it/gold-end.htm' method='post' id="form1" style="display:none;">
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
								sendRequest('#form1');
							}, 200
						);
					}
			);
			
			function sendRequest(formId){
				$(formId).submit();
			}
		</script>
	</body>
	</html>