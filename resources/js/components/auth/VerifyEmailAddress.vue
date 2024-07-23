<template>
    <section>
        <div class="card">
            <div class="card-body">
                <h3 class="card-title fw-bold">
                    Verifica la dirección de correo electrónico
                </h3>
                <p>
                    Para verificar tu correo electrónico, hemos enviado un código a
                    <b> {{ user.email }} </b>
                </p>
                <form class="needs-validation" @submit.prevent="verify">
                    <div class="form-group my-3">
                        <label class="form-label fw-bold mb-0" for="code">Introducir código</label>
                        <input type="text" id="code" class="form-control"
                            v-bind:class="{ 'border border-3': form.code, 'is-invalid': errors.code }"
                            v-model="form.code">
                        <div v-if="errors.code" class="invalid-feedback">
                            {{ errors.code }}
                        </div>
                    </div>
                    <button class="amazon-button w-100 p-1">
                        Verificar
                    </button>
                </form>

                <p class="my-4">
                    Al crear una cuenta, aceptas las
                    <a href="#" class="text-decoration-none">Condiciones de Uso</a> y el
                    <a href="#" class="text-decoration-none">Aviso de Privacidad</a> de Amazon.
                </p>

                <div class="text-center">
                    <a href="#" class="text-decoration-none">
                        Reenviar código
                    </a>
                </div>

            </div>
        </div>
    </section>
</template>
<script>
import { defineComponent, ref } from 'vue';
import AuthService from '../../services/auth';

export default defineComponent({
    name: 'VerifyEmailAddress',
    props: {
        user: {
            type: Object,
            required: true
        }
    },
    setup() {
        const form = ref({
            code: null
        });

        const errors = ref({
            code: null
        });

        const verify = () => {
            // Reset errors
            errors.value.code = null;

            if (!form.value.code) {
                errors.value.code = 'Completa este campo';
                return;
            }

            AuthService.verifyEmail(form.value.code).then(() => {
                window.location.href = '/'
            }).catch((error) => {
                if (error.response && error.response.data) {
                    // Handle validation errors from the server
                    errors.value.code = error.response.data.message || 'Código de verificación incorrecto';
                } else {
                    errors.value.code = 'Ocurrió un error. Por favor, inténtalo nuevamente.';
                }
            });
        };

        return { form, errors, verify };
    }
})
</script>
