<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Concerns\HasUuids;

class Article extends Model
{
    use HasUuids;

    protected $fillable = [
        'title',
        'slug',
        'thumbnail',
        'excerpt',
        'content',
    ];

    protected $keyType = 'string';

    public $incrementing = false;

    public function getRouteKeyName(): string
    {
        return 'slug';
    }

}