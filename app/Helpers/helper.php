<?php

use Illuminate\Support\Facades\Session;

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

    /** Calculate cart total price */
    function cartTotal(){
        $total = 0;

        foreach (Cart::content() as $item) {
            $productPrice = $item->price;
            $sizePrice = $item->options?->product_size['price'] ?? 0;
            $optionsPrice = 0;
            foreach ($item->options->product_options as $option) {
                $optionsPrice += $option['price'];
            }

            $total += ($productPrice + $sizePrice + $optionsPrice) * $item->qty;
        }

        return $total;
    }

    /** Calculate product total price */
    function productTotal($rowId){
        $total = 0;

        $product = Cart::get($rowId);

        $productPrice = $product->price;
        $sizePrice = $product->options?->product_size['price'] ?? 0;
        $optionsPrice = 0;

        foreach ($product->options->product_options as $option) {
            $optionsPrice += $option['price'];
        }

        $total += ($productPrice + $sizePrice + $optionsPrice) * $product->qty;

        return $total;
    }

    /** grand cart total */
    function grandCartTotal($deliveryFee = 0){
        $total = 0;
        $cartTotal = cartTotal();

        if (Session::has('coupon')) {
            $discount = Session::get('coupon')['discount'];
            $total = ($cartTotal + $deliveryFee) - $discount;

            return $total;
        } else {
            $total = $cartTotal + $deliveryFee;
            return $total;
        }
    }

    /** Generate Invoice Id */
    function generateInvoiceId()
    {
        $randomNumber = rand(1, 9999);
        $currentDateTime = now();

        $invoiceId = $randomNumber . $currentDateTime->format('yd') . $currentDateTime->format('s');

        return $invoiceId;
    }


