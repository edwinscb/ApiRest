<?php

namespace App\Filters;

use App\Filters\ApiFilter;
use Illuminate\Http\Request;

class TaskFilter extends ApiFilter
{

    protected $safeParams = [
        'name' => ['eq'],
        'stateId' => ['eq', 'lt', 'lte', 'gt', 'gte', 'ne'],
        'userHistoryId' => ['eq', 'lt', 'lte', 'gt', 'gte', 'ne'],
        'createdById' => ['eq', 'lt', 'lte', 'gt', 'gte', 'ne'],
    ];
    protected $columnMap = [
        'userHistoryId' => 'user_history_id',
        'stateId' => 'state_id',
        'createdById' => 'created_by_id'

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
