<?php
namespace GymCore;

class GymResource
{
    private function _init_admin_ui()
    {
        foreach ($this->get_admin_ui_containers() as $admin_ui_container) {
            $this->get_post_type()->add_admin_field_container($admin_ui_container);
        }
    }

    protected function get_post_type()
    {
        return null;
    }

    public function render_front_page()
    {
        echo 'Base class render_front_page. You should override this func!';
    }

    public function render_page()
    {
        echo 'Base class render_page. You should override this func!';
    }

    protected function get_slug()
    {
        echo 'Base class get_slug. You should override this func!';
    }

    protected function get_admin_ui_containers()
    {
        echo 'Base class get_admin_ui_containers. You should override this func!';
    }

    protected function get_posts()
    {
        return $this->get_post_type()->get_posts();
    }

    public function __construct()
    {
        $this->_init_admin_ui();
    }
};
