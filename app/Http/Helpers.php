<?php
if (!function_exists('areActiveRoutes')) {
    function areActiveRoutes($routes)
    {
        foreach ($routes as $route) {
            if (Route::currentRouteName() == $route) {
                return 'active';
            }
        }
        return '';
    }
}
if (!function_exists('areActiveRoutesMenu')) {
    function areActiveRoutesMenu($routes)
    {
        foreach ($routes as $route) {
            if (Route::currentRouteName() == $route) {
                return 'menu-is-opening menu-open';
            }
        }
        return '';
    }
}
if (!function_exists('getLocalizedColumn')) {
    function getLocalizedColumn($model, $columnName)
    {
        // Get the current locale
        $locale = app()->getLocale();
        if($locale!='en'){
            $localizedColumnName = $columnName . '_' . $locale;
        }else{
            $localizedColumnName = $columnName;
        }
        // Form the dynamic column name with the current locale
       

        // Check if the model has the dynamic column
        if (isset($model->$localizedColumnName)) {
            return $model->$localizedColumnName;
        }

        // If the dynamic column doesn't exist, return null or handle it as needed
        return null;
    }
}
?>