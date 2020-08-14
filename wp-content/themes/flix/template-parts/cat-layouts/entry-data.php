<?php
$cat_id = $cat->term_id;
$cat_name = $cat->name;
$cat_count = $cat->count;

if (!$cat_id) { //categorised by tags
	$cat_id = $tag->term_id;
	$cat_name = '#'.mb_strtoupper($tag->name);
	$cat_count = $tag->count;
}

$entry_image = '';
if ($module['display_icon']) {
    $entry_image .= '
    <span class="vlog-format-action small"><i class="fa fa-play"></i></span>';
}

$entry_data = '
<div class="entry-header">
    <h2 class="entry-title h6">
        <a href="'.esc_url(get_term_link($cat_id)).'">
            '.esc_html($cat_name).'
        </a>
    </h2>
</div>';

if ($module['display_count']) {
    $entry_data .= '
    <div class="entry-meta">
       <span class="meta-item">
           <span class="vlog-count">'.esc_html($cat_count).'</span>
           '.esc_html($module['count_label']).'
       </span>
    </div>';
}
