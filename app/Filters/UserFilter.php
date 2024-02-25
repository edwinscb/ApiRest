<?php

namespace App\Filters;

use App\Filters\ApiFilter;

class UserFilter extends ApiFilter
{

    protected $safeParams = [
        'name' => ['eq'],
        'email' => ['eq'],
        'roleId' => ['eq']
    ];
    protected $columnMap = [
        'roleId' => 'role_id',
    ];
    protected $operatorMap = [
        'eq' => '=',
        'lt' => '<',
        'lte' => '<=',
        'gt' => '>',
        'gte' => '>='
    ];
}
