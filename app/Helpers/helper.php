<?php

    /** set Sidebar Active */
    function setSidebarActive(array $routes){
        foreach($routes as $route){
            if(request()->routeIs($route)){
                return 'active';
            }
        }
        return '';
    }

    /** Create Unique Slug */
    function generateUniqueSlug($model, $name){
        $modelClass = "App\\Models\\$model";

        if (!class_exists($modelClass)) {
            throw new \InvalidArgumentException("Model $model not found.");
        }

        $slug = \Str::slug($name);
        $count = 2;

        while ($modelClass::where('slug', $slug)->exists()) {
            $slug = \Str::slug($name) . '-' . $count;
            $count++;
        }

        return $slug;
    }

    /** Currency Position */
    function currencyPosition($price){
        if (config('settings.site_currency_icon_position') === 'left') {
            return config('settings.site_currency_icon') . $price;
        } else if(config('settings.site_currency_icon_position') === 'right'){
            return $price . config('settings.site_currency_icon');
        }
    }

