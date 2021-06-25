<?php

namespace App\Http\Filters;

use App\Http\Filters\BaseFilters;

class ProjectFilter extends BaseFilters
{
    /**
     * Registered filters to operate upon.
     *
     * @var array
     */
    protected $filters = [
        'title',
        'content',
        'github'
    ];

    /**
     * Filter the query by a given title.
     *
     * @param string|int $value
     * @return \Illuminate\Database\Eloquent\Builder
     */
    protected function title($value)
    {
        if ($value) {
            return $this->builder->where('title', 'like', "%$value%");
        }

        return $this->builder;
    }

    /**
     * Filter the query to include users by content.
     *
     * @param string|int $value
     * @return \Illuminate\Database\Eloquent\Builder
     */
    protected function content($value)
    {
        if ($value) {
            return $this->builder->where('content', $value);
        }

        return $this->builder;
    }

    /**
     * Filter the query to include users by github.
     *
     * @param string|int $value
     * @return \Illuminate\Database\Eloquent\Builder
     */
    protected function github($value)
    {
        if ($value) {
            return $this->builder->where('github', 'like', "%$value%");
        }

        return $this->builder;
    }
}
