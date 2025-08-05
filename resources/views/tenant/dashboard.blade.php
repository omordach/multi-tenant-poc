@php
    $tenant = tenant();
@endphp

@if($tenant)
    <h1>{{ $tenant->name }}</h1>
    <p>📧 {{ $tenant->contact_email }}</p>

    @if($tenant->logo)
        <img src="{{ asset('storage/logos/' . $tenant->logo) }}" alt="{{ $tenant->name }} logo" style="max-height: 100px;">
    @else
        <p>🖼️ No logo uploaded.</p>
    @endif
@else
    <p>❌ Tenant not found. Make sure:</p>
    <ul>
        <li>You're using the correct <strong>subdomain</strong> (e.g., <code>client1.localhost</code>)</li>
        <li>The <strong>tenants table</strong> contains this tenant</li>
        <li>The <strong>domains table</strong> links domain to tenant ID</li>
        <li>You’ve <code>php artisan tenants:migrate</code> if needed</li>
    </ul>
@endif
