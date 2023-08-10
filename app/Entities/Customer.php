<?php

declare(strict_types=1);

namespace App\Entities;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Prettus\Repository\Contracts\Transformable;
use Prettus\Repository\Traits\TransformableTrait;

/**
 * Class Customer.
 */
class Customer extends Model implements Transformable
{
    use TransformableTrait, HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'cpf_cnpj',
        'email',
        'mobile_phone',
        'zip_code',
        'address_number',
        'customer_gateway_id'
    ];

    protected $dates = [
        'created_at',
        'updated_at',
    ];
}
