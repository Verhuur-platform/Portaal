<div class="list-group list-group-transparent">
    <a href="{{ route('tenants.show', $tenant) }}" class="list-group-item list-group-item-action {{ active('tenants.show') }}">
        <i class="fe fe-info text-sgv-brown mr-3"></i> Informatie
    </a>

    @if ($currentUser->hasRole('webmaster'))
        <a href="{{ route('tenant.billing', $tenant) }}" class="list-group-item  {{ active('tenant.billing') }} list-group-item-action">
            <i class="fe fe-file-text text-sgv-brown mr-3"></i> Facturatie gegevens
        </a>
    @endif

    <a href="{{ route('tenant.notes', ['tenant' => $tenant]) }}" class="list-group-item list-group-item-action {{ active('tenant.notes*') }}">
        <i class="fe fe-edit-2 text-sgv-brown mr-3"></i> Notities
    </a>

    <a href="{{ route('tenants.delete', $tenant) }}" class="list-group-item list-group-item-action {{ active('tenants.delete') }}">
        <i class="fe fe-trash-2 text-sgv-brown mr-3"></i> Verwijder huurder
    </a>
</div>