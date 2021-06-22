<?php

namespace App\Traits;

use Illuminate\Support\Str;

trait Filterable
{
    public function scopeFilter($query, $request)
    {
        $param = $request->all();
        foreach ($param as $field => $value) {
            $method = 'filter' . Str::studly($field);

            if ($value != '') {
                if (method_exists($this, $method)) {
                    $this->{$method}($query, $value);
                } else {
                    if (!empty($this->filterable) && is_array($this->filterable)) {
                        if (in_array($field, $this->filterable)) {
                            $query->where($this->table . '.' . $field, $value);
                        } elseif (key_exists($field, $this->filterable)) {
                            $query->where($this->table . '.'
                                . $this->filterable[$field], $value);
                        }
                    }
                }
            }
        }

        return $query;
    }

    public function filterPhone($query, $value)
    {
        return $query->where('phone', 'LIKE', '%' . $value . '%');
    }

    public function filterStatus($query, $value)
    {
        return $query->where('status', $value);
    }

    public function filterAddress($query, $value)
    {
        return $query->where('address', 'LIKE', '%' . $value . '%');
    }

    public function filterContactName($query, $value)
    {
        return $query->where('contact_name', 'LIKE', '%' . $value . '%');
    }

    public function filterUserId($query, $value)
    {
        $query->where('user_id', $value);
    }

    public function filterStartDate($query, $value)
    {
        if (preg_match("/\d{4}\-\d{2}-\d{2}/", $value)) {
            $query->whereDate('created_at', '>=', $value . ' 00:00:00');
        } else {
            throw new \Exception('Invalidate Date Start');
        }
    }

    public function filterEndDate($query, $value)
    {
        if (preg_match("/\d{4}\-\d{2}-\d{2}/", $value)) {
            $query->whereDate('created_at', '<=', $value . ' 23:59:59');
        } else {
            throw new \Exception('Invalidate Date End');
        }
    }
}
