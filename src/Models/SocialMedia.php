<?php

namespace Koraycicekciogullari\HydroSocial\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SocialMedia extends Model
{
    use HasFactory;

    protected $fillable = ['icon', 'address', 'order'];

    public $timestamps = false;

    /**
     * @param $value
     * @return string
     */
    public function getOrderAttribute($value): string
    {
        return (string) $value;
    }

}
