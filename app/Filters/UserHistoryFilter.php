<?php

namespace App\Filters;

use App\Filters\ApiFilter;
use Illuminate\Http\Request;

class UserHistoryFilter extends ApiFilter
{

    protected $safeParams = [
        'name' => ['eq'],
        'projectId' => ['eq', 'lt', 'lte', 'gt', 'gte', 'ne'],
        'stateId' => ['eq', 'lt', 'lte', 'gt', 'gte', 'ne'],
        'createdById' => ['eq', 'lt', 'lte', 'gt', 'gte', 'ne'],
    ];
    protected $columnMap = [
        'projectId' => 'project_id',
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
