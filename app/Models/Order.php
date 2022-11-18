<?php

namespace App\Models;

use \DateTimeInterface;
use App\Traits\MultiTenantModelTrait;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Order extends Model
{
    use SoftDeletes;
    use MultiTenantModelTrait;
    use HasFactory;

    public const ORDER_SIZE_RADIO = [
        '1' => 'Full tank',
        '0' => 'Liters',
    ];

    public const PAYMENT_STATUS_SELECT = [
        '1' => 'Pending',
        '2' => 'Paid',
    ];

    public const STATUS_SELECT = [
        '0' => 'Not Delivered',
        '1' => 'Delivered',
        '2' => 'Approved',
        '3' => 'Denied',
    ];

    public $table = 'orders';

    protected $dates = [
        'preferred_date',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected $fillable = [
        'name',
        'company',
        'plate_number',
        'fuel_id',
        'quantity',
        'order_size',
        'preferred_date',
        'status',
        'payment_id',
        'payment_status',
        'updated_by_id',
        'created_at',
        'updated_at',
        'deleted_at',
        'created_by_id',
    ];

    public function fuel()
    {
        return $this->belongsTo(Fuel::class, 'fuel_id');
    }

    public function getPreferredDateAttribute($value)
    {
        return $value ? Carbon::createFromFormat('Y-m-d H:i:s', $value)->format(config('panel.date_format') . ' ' . config('panel.time_format')) : null;
    }

    public function setPreferredDateAttribute($value)
    {
        $this->attributes['preferred_date'] = $value ? Carbon::createFromFormat(config('panel.date_format') . ' ' . config('panel.time_format'), $value)->format('Y-m-d H:i:s') : null;
    }

    public function payment()
    {
        return $this->belongsTo(PaymentMethod::class, 'payment_id');
    }

    public function updated_by()
    {
        return $this->belongsTo(User::class, 'updated_by_id');
    }

    public function created_by()
    {
        return $this->belongsTo(User::class, 'created_by_id');
    }

    protected function serializeDate(DateTimeInterface $date)
    {
        return $date->format('Y-m-d H:i:s');
    }
}
