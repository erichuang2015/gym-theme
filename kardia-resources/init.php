<?php

require_once dirname(__FILE__) . '/trainers.php';
require_once dirname(__FILE__) . '/courses.php';
require_once dirname(__FILE__) . '/memberships.php';

function init_admin_ui()
{
    Trainers\init_admin_ui();
    Courses\init_admin_ui();
    Memberships\init_admin_ui();
}
