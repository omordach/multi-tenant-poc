<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Stancl\Tenancy\Contracts\TenantWithDatabase;
use Stancl\Tenancy\Database\Models\Tenant as BaseTenant;
use Stancl\Tenancy\Database\Concerns\HasDomains;
use Stancl\Tenancy\DatabaseConfig;

class Tenant extends BaseTenant implements TenantWithDatabase
{
    use HasDomains;

    public function database(): DatabaseConfig
    {
        return new DatabaseConfig($this); // Ось правильний виклик
    }

    // опціонально — щоб кастомізувати назву БД
    public function databaseName(): string
    {
        return 'tenant_' . $this->getTenantKey();
    }


    // Тепер у тебе є метод ->domains()

    protected $fillable = [
        'id',
        'name',
        'logo',
        'contact_email',
        'data',
    ];

    protected $casts = [
        'data' => 'array',
    ];

    // Опціонально: можна зробити accessor для логотипу
    protected function logoUrl(): Attribute
    {
        return Attribute::get(fn () => asset('storage/logos/' . $this->id . '.png'));
    }
}
