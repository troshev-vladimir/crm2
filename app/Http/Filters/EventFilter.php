<?php

namespace App\Http\Filters;

use Illuminate\Database\Eloquent\Builder;
use App\Services\DepartmentService;

class EventFilter extends QueryFilter
{
    public function type(string $id)
    {
        $this->builder->where('type_id', $id);
    }

    public function client(string $id)
    {
        $this->builder->where('client_id', $id);
    }

    public function department_id(string $id)
    {
        $this->builder->whereRelation('client', function (Builder $query) use ($id) {
            $query->whereRelation('division', function (Builder $query) use ($id) {
                $query->whereRelation('department', function (Builder $query) use ($id) {
                    $query->where('id', $id);
                });
            });
        })->get();
    }

    public function title(string $name)
    {
        $words = array_filter(explode(' ', $name));

        $this->builder->where(function (Builder $query) use ($words) {
            foreach ($words as $word) {
                $query->where('title', 'like', "%$word%");
            }
        });
    }
}