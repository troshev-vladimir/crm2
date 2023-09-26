<?php

namespace App\Filters;

class UsersFilter extends QueryFilter{
    public function user_id($id = null){
        return $this->builder->when($id, function($query) use($id){
            $query->where('user_id', $id);
        });
    }

    public function login($login = ''){
        return $this->builder
            ->where('login', 'LIKE', '%'.$login.'%');
            // ->orWhere('description', 'LIKE', '%'.$login.'%');
    }
}