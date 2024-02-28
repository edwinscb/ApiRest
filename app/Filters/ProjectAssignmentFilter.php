<?php

namespace App\Filters;

use App\Filters\ApiFilter;
use Illuminate\Http\Request;

class ProjectAssignmentFilter extends ApiFilter
{

    protected $safeParams = [
        'projectId' => ['eq', 'lt', 'lte', 'gt', 'gte', 'ne'],
        'userId' => ['eq', 'lt', 'lte', 'gt', 'gte', 'ne'],
    ];
    protected $columnMap = [
        'projectId' => 'project_id',
        'userId' => 'user_id'

    ];
    protected $operatorMap = [
        'eq' => '=',
        'lt' => '<',
        'lte' => '<=',
        'gt' => '>',
        'gte' => '>=',
        'ne' => '!=',
    ];
}
