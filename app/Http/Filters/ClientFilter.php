<?php 

namespace App\Http\Filters;

use Illuminate\Database\Eloquent\Builder;
use App\Services\DepartmentService;

class ClientFilter extends QueryFilter
{
 
    public function division_id(string $id)
    {
        $this->builder->where('division_id', $id);
    }

    public function name(string $name)
    {
        $words = array_filter(explode(' ', $name));

        $this->builder->where(function (Builder $query) use ($words) {
            foreach ($words as $word) {
                $query->where('name', 'like', "%$word%");
            }
        });
    }
}