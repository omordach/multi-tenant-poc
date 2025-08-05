<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Tenant;

class TenantSeeder extends Seeder
{
    public function run(): void
    {
        $tenants = [
            [
                'id' => 'client1',
                'name' => 'Pipeliners Local Union 798',
                'contact_email' => 'info@ua798.test',
                'logo' => 'logos/ua798.png',
                'domain' => 'client1.localhost',
            ],
            [
                'id' => 'client2',
                'name' => 'International Alliance of Theatrical Stage Employees, Local 500',
                'contact_email' => 'hello@local500.test',
                'logo' => 'logos/local500.png',
                'domain' => 'client2.localhost',
            ],
            [
                'id' => 'client3',
                'name' => 'OPEIU 29 – Office Workers',
                'contact_email' => 'support@opeiu29.test',
                'logo' => 'logos/opeiu29.png',
                'domain' => 'client3.localhost',
            ],
        ];

        foreach ($tenants as $data) {
            $tenant = Tenant::create([
                'id' => $data['id'],
                'name' => $data['name'],
                'contact_email' => $data['contact_email'],
                'logo' => $data['logo'],
            ]);

            $tenant->forceFill([
                'name' => $data['name'],
                'contact_email' => $data['contact_email'],
                'logo' => $data['logo'],
            ])->save();

            $tenant->domains()->create([
                'domain' => $data['domain'],
            ]);
        }
    }
}
