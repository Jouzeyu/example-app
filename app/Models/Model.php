<?php

namespace App\Models;

use DateTimeInterface;
use Illuminate\Database\Eloquent\Model as BaseModel;

class Model extends BaseModel
{
    //重写时间格式
    protected function serializeDate(DateTimeInterface $date): string
    {
        return $date->format($this->dateFormat ?: 'Y-m-d H:i:s');
    }

    /**
     * @var string[]
     */
    protected $hidden = [
        'id',
    ];

    /**
     * @return string
     */
    public function getRouteKeyName(): string
    {
        return 'snowflake_id';
    }


}
