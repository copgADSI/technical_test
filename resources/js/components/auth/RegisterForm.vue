<template>
    <section>
        <div class="card">
            <div class="card-body">
                <h1 class="card-title fw-light">Crear Cuenta</h1>
                <form class="needs-validation" novalidate @submit.prevent="register">
                    <div class="form-group my-3">
                        <label class="form-label fw-bold mb-0" for="name">Tu nombre</label>
                        <input type="text" id="name" class="form-control"
                            v-bind:class="{ 'border border-3': form.name }" v-model="form.name" required>
                        <div class="invalid-feedback">
                            <i class="fa-solid fa-exclamation fst-italic me-3 mx-1 "></i>
                            <span class="fw-bold">Introduce tu nombre</span>
                        </div>
                    </div>
                    <div class="form-group my-3">
                        <label class="form-label fw-bold mb-0" for="id">Correo Electrónico</label>
                        <input type="email" id="email" class="form-control"
                            v-bind:class="{ 'border border-3': form.email }" v-model="form.email" required>
                        <div class="invalid-feedback">
                            <i class="fa-solid fa-exclamation fst-italic me-3 mx-1 "></i>
                            <span class="fw-bold">Introduce tu correo electrónico</span>
                        </div>
                    </div>
                    <div class="form-group my-3">
                        <label class="form-label fw-bold mb-0" for="password">Contraseña</label>
                        <input type="password" id="password" class="form-control mb-1"
                            placeholder="Debe tener al menos 6 carácteres"
                            v-bind:class="{ 'border border-3': form.password }" v-model="form.password" required>
                        <span class="form-text"><i class="fa-solid fa-info text-info fst-italic me-2 mx-2"></i>
                            La contraseña debe contener al menos 6 carácteres.
                        </span>
                        <div class="invalid-feedback">
                            <i class="fa-solid fa-exclamation fst-italic me-3 mx-1 "></i>
                            <span class="fw-bold">Mínimo 6 carácteres requeridos</span>
                        </div>
                    </div>
                    <div class="form-group my-3">
                        <label class="form-label fw-bold mb-0" for="password_confirmation">Vuelve a escribir la
                            contraseña</label>
                        <input type="password" id="password_confirmation" class="form-control"
                            v-bind:class="{ 'border border-3': form.password_confirmation }"
                            v-model="form.password_confirmation" required>
                        <div class="invalid-feedback">
                            <i class="fa-solid fa-exclamation fst-italic me-3 mx-1 "></i>
                            <span class="fw-bold">Las contraseñas no coincide</span>
                        </div>
                    </div>

                    <div class="text-center ">
                        <button type="submit" class="amazon-button w-100 p-1" :disabled="isLoading">
                            Crea tu cuenta en Amazon
                        </button>
                    </div>
                </form>

                <p class="my-4">
                    Al crear una cuenta, aceptas las
                    <a href="#" class="text-decoration-none">Condiciones de Uso</a> y el
                    <a href="#" class="text-decoration-none">Aviso de Privacidad</a> de Amazon.
                </p>

                <hr>

                <p>
                    ¿Ya tienes una cuenta?
                    <a href="#" class="text-decoration-none">Inicia sesión
                        <small><i class="fa-solid fa-caret-right"></i></small>
                    </a>
                </p>

            </div>
        </div>
    </section>
</template>
<script>
import { defineComponent, ref } from 'vue';
import AuthService from '../../services/auth';

export default defineComponent({
    name: 'RegisterForm',
    setup() {

        const isLoading = ref(false);
        const form = ref({
            name: null,
            email: null,
            password: null,
            password_confirmation: null
        })

        const register = (event) => {
            if (!event.target.checkValidity()) {
                return event.target.classList.add('was-validated')
            }

            if (isLoading.value) return
            isLoading.value = true

            AuthService.register(form.value).then((data) => {

                if (data.registered) {
                    redirectToVerifyEmail(data.token)
                }

            }).finally(() => {
                clearForm()
                isLoading.value = false
            })
        }

        const redirectToVerifyEmail = (token) => {
            window.location.href = `/auth/verify/${token}`
        }

        const clearForm = () => {
            form.value = {
                name: null,
                email: null,
                password: null,
                password_confirmation: null
            }
        }

        return {
            form,
            register
        }
    }
})
</script>
