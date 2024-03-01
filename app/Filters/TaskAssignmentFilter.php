<?php

namespace App\Filters;

use App\Filters\ApiFilter;
use Illuminate\Http\Request;

class TaskAssignmentFilter extends ApiFilter
{

    protected $safeParams = [
        'taskId' => ['eq', 'lt', 'lte', 'gt', 'gte', 'ne'],
        'userId' => ['eq', 'lt', 'lte', 'gt', 'gte', 'ne'],
    ];
    protected $columnMap = [
        'taskId' => 'task_Id',
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
