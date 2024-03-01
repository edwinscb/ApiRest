<?php

namespace App\Filters;

use App\Filters\ApiFilter;
use Illuminate\Http\Request;

class UserHistoryAssignmentFilter extends ApiFilter
{

    protected $safeParams = [
        'userHistoryId' => ['eq', 'lt', 'lte', 'gt', 'gte', 'ne'],
        'userId' => ['eq', 'lt', 'lte', 'gt', 'gte', 'ne'],
    ];
    protected $columnMap = [
        'userHistoryId' => 'user_history_Id',
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
