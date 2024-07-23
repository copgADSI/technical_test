<x-page-layout.template>
    @slot('title', 'Verificación de correo electrônico')
    <div class="container mt-4 mb-4">
        <div class="row">
            <div class="col-lg-4 col-md-6 col-sm-12 m-auto">
                <verify-email-address :user="{{ $user }}"></verify-email-address>
            </div>
        </div>
    </div>
</x-page-layout.template>
