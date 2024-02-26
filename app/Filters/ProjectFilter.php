<?php

namespace App\Filters;

use App\Filters\ApiFilter;
use Illuminate\Http\Request;

class ProjectFilter extends ApiFilter
{

    protected $safeParams = [
        'name' => ['eq'],
        'startedProject' => ['eq', 'lt', 'lte', 'gt', 'gte', 'ne'],
        'stateId' => ['eq', 'lt', 'lte', 'gt', 'gte', 'ne'],
        'createdById' => ['eq', 'lt', 'lte', 'gt', 'gte', 'ne'],
    ];
    protected $columnMap = [
        'startedProject' => 'started_project',
        'stateId' => 'state_id',
        'createdById' => 'created_by_id',

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
