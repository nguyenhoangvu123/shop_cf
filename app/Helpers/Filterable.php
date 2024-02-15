<?php

namespace App\Helpers;

use Illuminate\Support\Str;

trait Filterable
{
    public function scopeFilter($query, $request)
    {
        $params = $request->all();
        foreach ($params as $field => $value) {
            if ($field !== '_token') {
                $method = 'filter' . Str::studly($field);
                if (!empty($value) || $value === 0 || is_string($value)) {
                    if (method_exists($this, $method)) {
                        $this->{$method}($query, $value);
                    }
                }
            }
        }
        return $query;
    }
}
