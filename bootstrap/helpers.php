<?php


if (!function_exists('back_with_success')){
    function back_with_success($context) {
        return back()->withSuccess(trans('default.created_response', ['name' => $context]));
    }
}
if (!function_exists('updated_response')){
    function updated_response($context) {
        return back()->withSuccess(trans('default.updated_response', ['name' => $context]));
    }
}
if (!function_exists('get_status')){
    function get_status($status) {
        $class = '';
        switch ($status){
            case 'active': {
                $class = 'success';
                break;
            }
            case 'inactive': {
                $class = 'danger';
                break;
            }
        }
        $name = ucfirst($status);
        return new \Illuminate\Support\HtmlString("<span class='badge badge-{$class}'>{$name}</span>");
    }
}


