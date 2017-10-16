<?php

namespace common\logic\entities\queries;

use paulzi\nestedsets\NestedSetsQueryTrait;
use yii\db\ActiveQuery;

class CategoryQuery extends ActiveQuery
{
    use NestedSetsQueryTrait;
}