<?php

function get_all_projects(): array
{
    $args = array(
        'post_type' => 'projects',
        'orderby' => 'relevance',
        'posts_per_page' => -1,
        'post_status' => 'publish',
        'update_post_term_cache' => false,

    );

    $q = new WP_Query($args);

    $items = array();

    foreach ($q->posts as $post) {

        if ($q->found_posts > 0) {
            $post_data = array(
                'id' => $post->ID,
                'excerpt' => $post->post_excerpt,
                'title' => sanitize_text_field($post->post_title),
            );

            $items[] = $post_data + rs_get_additional_project_meta($post->ID);
        }
    }


    return $items;
}


function rs_get_additional_project_meta($post_id): array
{
    $p_tech =  get_post_meta($post_id, 'tech', true);
    $tech_buffer = array();
    foreach ($p_tech as $tech) {
        $tech_buffer[] = $tech['title'];
    }

    $p_urls =  get_post_meta($post_id, 'project_urls', true);

    return array(
        'tech' =>$tech_buffer,
        'urls' => $p_urls
    );
}