<?php

namespace Memberships {
    use Carbon_Fields\Container;
    use Carbon_Fields\Field;
    use PostTypes\PostType;

    function init_admin_ui()
    {
        $post_type_slug = 'membership';
        $post_type_memberships = new PostType($post_type_slug, [
            'supports' => ['title'],
        ]);
        $post_type_memberships->register();

        Container::make('post_meta', 'Membership Info')
            ->where('post_type', '=', $post_type_slug)
            ->add_fields(array(
                Field::make('text', 'name', 'Membership Name'),
                Field::make('text', 'price', 'Membership Price'),
                Field::make('text', 'price_reduced', 'Membership Price (Reduced)'),
            ));
    }

    function get_membership_info_by_id($membership_id)
    {
        return array(
            'name' => carbon_get_post_meta($membership_id, 'name'),
            'price' => carbon_get_post_meta($membership_id, 'price'),
            'price_reduced' => carbon_get_post_meta($membership_id, 'price_reduced'),
        );
    }

    function get_memberships()
    {
        $memberships_query = new \WP_Query(array('post_type' => 'membership'));
        return array_map(function ($membership_post) {
            return get_membership_info_by_id($membership_post->ID);
        }, $memberships_query->posts);
    }

    function render_membership($membership)
    {
        echo '<div class="membership-container">';
        echo "<span class=\"membership-container__title\">{$membership['name']}</span>";
        echo "<span class=\"membership-container__subtitle\">{$membership['price']}</span>";
        if ($membership['price_reduced']) {
            echo "<span class=\"membership-container__subtitle\">({$membership['price_reduced']} ermäßigt)</span>";
        }
        echo '</div>';
    }

    function render_memberships_overview()
    {
        echo '<div class="memberships-overview">';
        $memberships = get_memberships();
        foreach ($memberships as $membership) {
            render_membership($membership);
        }
        echo '</div>';
    }
}
