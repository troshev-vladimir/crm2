<?php

namespace App\Http\Filters;

use Illuminate\Database\Eloquent\Builder;

class SaleFilter extends QueryFilter
{

    public function per_page(string $per_page)
    {
        $per_page;
    }

    public function type(string $id)
    {
        $this->builder->where('type_id', $id);
    }

    public function client(string $id)
    {
        $this->builder->where('client_id', $id);
    }

    public function title(string $name)
    {
        $words = array_filter(explode(' ', $name));

        $this->builder->where(function (Builder $query) use ($words) {
            foreach ($words as $word) {
                $query->where('name', 'like', "%$word%");
            }
        });
    }
}