<?php

namespace Abencherif\L5Api\Tests\Fixtures\Models;

use Abencherif\L5Api\Models\RestfulModel;

class ModelWithIdPK extends RestfulModel
{
    /**
     * @var string UUID key
     */
    public $primaryKey = 'id';

    /**
     * @var array The attributes that are mass assignable.
     */
    protected $fillable = ['example_attribute'];
}
