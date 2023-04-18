<?php 

namespace App\Http\Filters;

use Illuminate\Database\Eloquent\Builder;

class PostFilter extends QueryFilter
{
 
    public function status(string $status)
    {
        $this->builder->where('post_status', strtolower($status));
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