<?php
declare(strict_types=1);

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    /**
     * @var string[]
     */
    protected $fillable = [
        'full_name',
        'amount',
        'address'
    ];

    /**
     * Boot function from Laravel.
     */
    protected static function boot()
    {
        parent::boot();

        static::creating(static function (Order $obModel): void {
            if (empty($obModel->number)) {
                $obModel->number = \Str::uuid()->toString();
            }
        });
    }
}
