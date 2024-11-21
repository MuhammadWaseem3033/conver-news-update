<?php

// final class CustomHelper{}
if (!function_exists('generateBreadcrumbs')) {
    function generateBreadcrumbs()
    {
        $segments = request()->segments();
        $breadcrumbs = [
            ['label' => 'Home', 'url' => route('index')],
        ];

        $url = '';
        foreach ($segments as $segment) {
            $url .= '/' . $segment;
            $breadcrumbs[] = [
                'label' => ucfirst($segment),
                'url' => url($url),
            ];
        }
        
        return $breadcrumbs;
    }
}
