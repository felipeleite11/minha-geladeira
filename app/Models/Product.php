<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Kyslik\ColumnSortable\Sortable;

class Product extends Model
{
    use HasFactory, Sortable, Notifiable;

    protected $table = 'product';

    protected $fillable = [
        'description',
        'shelf_life',
        'quantity',
    ];

    protected $casts = [
        'shelf_life' => 'datetime:d/m/Y'
    ];

    public $sortable = [
        'id',
        'description',
        'shelf_life',
        'quantity'
    ];
}
