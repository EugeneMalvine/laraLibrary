<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Card extends Model
{
    use HasFactory;

    protected $table = 'cards';

    protected $fillable = [
        'title',
        'author',
        'dateStart',
        'dateFinish',
        'rating',
        'note',
        'book',
        'isPrivate'
    ];

    protected $casts = [
        'isPrivate' => 'boolean',
    ];

    protected $dates = [
        'dateStart',
        'dateFinish',
    ];

    public $timestamps = false;

    public static function getTableName(): string
    {
        return with(new static)->getTable();
    }

    public function author(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}
