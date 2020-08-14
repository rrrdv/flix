<div class="vlog-module module-cats col-lg-12 col-md-12 col-sm-12 <?php echo esc_attr($module['css_class']); ?>" id="vlog-module-<?php echo esc_attr($s_ind . '-' . $m_ind); ?>" data-col="12">

    <?php
    echo vlog_get_module_heading($module);

    //get posts from last month
    $postsArgs = array(
        'date_query' => array('after' => date('Y-m-d', strtotime(date('Y-m')." -1 month")))
    );

    //put data tags into a set of data without needing to build an array in memory
    function dataTags($postsArgs) {
        foreach (get_posts($postsArgs) as $post) {
            yield get_the_tags($post->ID);
        }
    }

    //get tags from selected posts
    $tags = [];
    foreach (dataTags($postsArgs) as $dataTag) {
        foreach ($dataTag as $dataTag2) {
            $tags[] = $dataTag2->term_id;
        }
    }
    $tags = implode(', ', $tags);

    //get tags from last month posts
    $args = array(
        'orderby' => $module['tags_orderby'],
        'order' => $module['tags_order'],
        'include' => $tags,
    );
    $mod_tags = get_tags($args);
    $limit = (isset($module['limit']) && $module['limit'] > 0 ? absint($module['limit']) : 3);
    ?>

    <div class="row vlog-cats row-eq-height <?php echo esc_attr(vlog_module_is_slider($module) && count($new_mod_tags) > 1 ? 'vlog-slider' : ''); ?>">

        <?php
        $i = 0;
        if (!empty($mod_tags)) {
            $tag_array = [];
            foreach ($mod_tags as $tag) {
                if ($i < $limit) {
                    //get post for tag image
                    $tag_post = new WP_Query(array(
                        'post_type' => 'post',
                        'tag__in' => array($tag->term_id),
                        'posts_per_page' => 1,
                        'ignore_sticky_posts' => 1,
                    ));

                    //get another post from same tag if used before
                    if (in_array($tag_post->posts[0]->ID, $tag_array)) {
                        if ($tag->count == 1) {
                            continue;
                        }
                        if ($tag->count > 1) {
                            $tag_post = new WP_Query(array(
                                'post__not_in' => $tag_array,
                                'post_type' => 'post',
                                'tag__in' => array($tag->term_id),
                                'posts_per_page' => 1,
                                'ignore_sticky_posts' => 1,
                            ));
                        }
                    }
                    $tag_array[] = $tag_post->posts[0]->ID;

                    //show tag data
                    if ($tag_post->have_posts()) {
                        $i++;
                        while ($tag_post->have_posts()) {
                            $tag_post->the_post();
                            $layout = vlog_get_module_layout($module, 0);
                            $layout_path = locate_template('template-parts/cat-layouts/content-' . $layout . '.php');
                            if (file_exists($layout_path)) {
                                include($layout_path);
                            }
                        }
                    }
                    wp_reset_postdata();
                }
            }
        }
        ?>
    </div>
</div>
