<?php

use Botble\Widget\AbstractWidget;

class SiteInfoWidget extends AbstractWidget
{
    public function __construct()
    {
        parent::__construct([
            'name' => __('Site information'),
            'icon' => null,
            'description' => __('Widget display site information'),
            'about' => null,
            'address' => null,
            'address2' => null,
            'phone' => null,
            'phone2' => null,
            'phone3' => null,
            'email' => null,
            'working_time' => null,
        ]);
    }
}
