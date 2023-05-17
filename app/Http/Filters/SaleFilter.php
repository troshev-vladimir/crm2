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

    public function client(string $id)
    {
        $this->builder->where('client_id', $id);
    }

    public function title(string $title)
    {
        $words = array_filter(explode(' ', $title));

        $this->builder->where(function (Builder $query) use ($words) {
            foreach ($words as $word) {
                $query->where('title', 'like', "%$word%");
            }
        });
    }

    public function dateFrom(string $date_from)
    {
        $this->builder->whereDate('placement_date', '>=', $date_from);
    }

    public function dateTo(string $date_to)
    {
        $this->builder->whereDate('placement_date', '<=', $date_to);
    }
}