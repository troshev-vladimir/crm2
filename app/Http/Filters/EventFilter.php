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

    public function user(string $id)
    {
        $this->builder->whereRelation('client', function (Builder $query) use ($id) {
            $query->whereRelation('user', function (Builder $query) use ($id) {
                $query->where('id', $id);
            });
        })->get();
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

    public function division_id(string $id)
    {
        $this->builder->whereRelation('client', function (Builder $query) use ($id) {
            $query->whereRelation('division', function (Builder $query) use ($id) {
                $query->where('id', $id);
            });
        })->get();
    }

    public function fulfilled(string $param)
    {
        switch ($param) {
            case '1':
                $this->builder->where([
                    ['fulfilled_date', '<>', ''], //not null  ..., 'and'
                    ['result', '=', '0'],
                ]);
                break;
            case '2':
                $this->builder->where([
                    ['fulfilled_date', '<>', ''], //not null  ..., 'and'
                    ['result', '=', '1'],
                ]);
                break;
            case '3':
                $this->builder->where('fulfilled_date', null);
                break;
        }
    }

    public function dateFrom(string $date_from)
    {
        $this->builder->whereDate('appointment_date', '>=', $date_from);
    }

    public function dateTo(string $date_to)
    {
        $this->builder->whereDate('appointment_date', '<=', $date_to);
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