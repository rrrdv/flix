<?php
use Wordpress\Multisite\Commons\Decorator\GetPost;
use Wordpress\Multisite\Commons\Support\Facades\Session;
use Wordpress\Multisite\Commons\MarketingCustomization\Flow;

global $post;

Session::append('single');
$status = Session::get('status');

$id = $post->post_type == 'page'
    ? 0
    : $post->ID
;
$postImage = urldecode(Flow::instance()->getPostImage(655, 369));
?>
<style>
.vlog-cover-bg {
    max-height: 550px !important;
}
#postImage {
    background-image: url('<?php echo $postImage; ?>');
    background-size: contain;
    background-repeat: no-repeat;
    background-position: top center;
    overflow: hidden;
    height: 100%;
    width: 60%;
    margin: 0 auto;
    filter: blur(6px);
    -webkit-filter: blur(6px);
}
#postImage::before, #postImage::after {
    content: "";
    top: 0;
    position: absolute;
    height: 100%;
    width: 20%;
    z-index: 2;
}
#postImage::before {
    left: -5px;
    background: -moz-linear-gradient(left, #000000 0%, rgba(0, 0, 0, 0) 100%);
    background: -webkit-linear-gradient(left, #000000 0%, rgba(0, 0, 0, 0) 100%);
    background: -webkit-gradient(linear, left top, right top, from(#000000), to(rgba(0, 0, 0, 0)));
    background: linear-gradient(to right, #000000 0%, rgba(0, 0, 0, 0) 100%);
    filter: progid:DXImageTransform.Microsoft.gradient(startColorstr='#a6000000', endColorstr='#00000000', GradientType=1);
}
#postImage::after {
    right: -5px;
    background: -moz-linear-gradient(left, rgba(0, 0, 0, 0) 0%, #000000 100%);
    background: -webkit-linear-gradient(left, rgba(0, 0, 0, 0) 0%, #000000 100%);
    background: -webkit-gradient(linear, left top, right top, from(rgba(0, 0, 0, 0)), to(#000000));
    background: linear-gradient(to right, rgba(0, 0, 0, 0) 0%, #000000 100%);
    filter: progid:DXImageTransform.Microsoft.gradient(startColorstr='#00000000', endColorstr='#a6000000', GradientType=1);
}
#access-page {
    position: absolute;
    top: 0;
    left: 50%;
    background-color: rgba(0,0,0, 0.4);
    transform: translate(-50%, 0);
    width: 80%;
    height: 100%;
    padding: 20px;
    text-align: center;

}
#no-access-page {
    font-size: 16px;
    padding: 10px;
}
#no-access-page img {
    width: 60%;
    padding: 5% 0;
    margin: 0 auto;
}
#no-access-page h6 {
    font-size: 1.4rem;
    color: white;
    font-weight: bold;
    line-height: 1.5em;
    width: 40%;
    margin: 0 auto;
}
#no-access-page h5 {
    font-size: 1.2rem;
    display: block;
    color: #a2a2a2;
    margin-top: 15px;
}
@media (max-width: 500px) {
    .vlog-cover-bg {
        max-height: 235px !important;
    }
    #postImage {
        width: 100%;
    }
    #access-page {
        width: 100%;
        padding: 0;
    }
    #no-access-page img {
        width: 80%;
    }
    #no-access-page h6 {
        width: 95%;
        font-size: 1.1rem;
    }
    #no-access-page h5 {
        margin-top: 5px;
    }

}
</style>
<div id="postImage"></div>
<div id="access-page">
	<div id="no-access-page">
        <img src="<?php echo get_template_directory_uri(); ?>/assets/img/wifi_3G.png" alt="">
		<?php if (isset($status) && $status != '') {
    ?>
			<h3><?php _e('Login failed. Please try again later.', 'membership'); ?></h3>
		<?php
} else {
        ?>
			<h6><?php echo __vlog('noaccesspage_disclaimer'); ?></h6>
            <h5><?php echo get_bloginfo('name'); ?> Team</h5>
		<?php
    } ?>
	</div>
</div>
