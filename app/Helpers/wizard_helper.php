<?php

if (!function_exists('wizardnav')) {
    function wizardnav($tabName, $doif, $doelse = "")
    {
        // Assuming uri_string() is available via the URL helper
        $url = uri_string();
        $urlArray = explode('/', $url);
        $currentTab = in_array($tabName, $urlArray);

        if ($currentTab) {
            return $doif;
        } else {
            return $doelse;
        }
    }
}