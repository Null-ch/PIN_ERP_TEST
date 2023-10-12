<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Product extends Model
{
    use HasFactory, SoftDeletes, Notifiable;
    protected $table = 'products';
    protected $fillable = ['ARTICLE', 'NAME', 'STATUS', 'DATA'];
    public static $statuses = [ 'available' => 'Доступен', 'unavailable' => 'Недоступен'];

    public function localScope()
    {
       return self::all()->where('STATUS', '=', 'available');
    }
}
