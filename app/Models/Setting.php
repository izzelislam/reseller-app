<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Setting
 *
 * @property $id
 * @property $show_landing_page
 * @property $can_register
 * @property $monitor_stock
 * @property $company_logo
 * @property $company_name
 * @property $company_email
 * @property $company_phone
 * @property $company_address
 * @property $created_at
 * @property $updated_at
 *
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class Setting extends Model
{
    use HasUuids;
    
    protected $perPage = 20;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = ['show_landing_page', 'can_register', 'monitor_stock', 'company_logo', 'company_name', 'company_email', 'company_phone', 'company_address'];


}
