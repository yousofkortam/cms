<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * @method static findOrFail(string $id)
 */
class Post extends Model
{
    use HasFactory;
    protected $fillable = [
        'title',
        'body'
    ];

    public function user() {
        return $this->belongsTo('App\Models\User');
    }
}
