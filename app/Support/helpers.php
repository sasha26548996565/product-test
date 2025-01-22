<?php

declare(strict_types=1);

if (function_exists('formatJsonData') == false) {
    function formatJsonData(array $data)
    {
        $formattedData = [];

        foreach ($data as $key => $value) {
            if (is_array($value) && isset($value['key'], $value['value'])) {
                $formattedData[$value['key']] = $value['value'];
            } elseif (is_array($value) && count($value) === 1) {
                $formattedData[$key] = $value[0];
            }
        }

        return json_encode($formattedData);
    }
}

if (function_exists('checkAdminRole') == false) {
    function checkAdminRole()
    {
        return config('products.role') == 'admin';
    }
}
