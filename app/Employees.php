<?php

namespace App;

class Employees extends Model
{
    //
    public function metas() {
        return $this->hasMany(EmployeeMeta::class);
    }

    public function meta($meta_key = '') {
        if ($meta_key == '') {
            $res = $this->hasMany(ExpensesMeta::class, 'employee_id')->get();
            $formatted_arr = [];
            foreach ($res as $key => $value) {
                $formatted_arr[$value->meta_key] = json_decode($value->meta_value); 
            }
            return $formatted_arr;
        } else {
            $res = $this->hasMany(ExpensesMeta::class, 'employee_id')->where('meta_key', '=', $meta_key)->first();
            if ($res)
                return json_decode($res->meta_value);
            else
                return false;
        }
    }
}
