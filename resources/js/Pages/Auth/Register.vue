<template>

    <Head>
        <title>Login</title>
    </Head>
    <div class="login-img">
        <div class="page">
            <div class="">

                <div class="container-login100">

                    <div class="wrap-login100 p-6">

                        <form class="login100-form " @submit.prevent="register">
                            <span class="login100-form-title pb-5">
                                User Registration
                            </span>
                            <div class="panel panel-primary">
                                <div class="panel-body tabs-menu-body p-0 pt-3">
                                    <div class="tab-content">
                                        <div class="tab-pane active" id="tab5">
                                            <div class="wrap-input100 validate-input input-group">
                                                <a href="javascript:void(0)"
                                                    class="input-group-text bg-theme text-yellow">
                                                    <i class="zmdi zmdi-home text-yellow" aria-hidden="true"></i>
                                                </a>
                                                <input class="input100 border-start-0 form-control ms-0"
                                                    :class="{'is-invalid': errors.name}" type="name" placeholder="Name"
                                                    v-model="form.name">
                                                <span class="w-100 text-red text-capitalize ps-7 font-1 mt-1"
                                                    v-if="errors.name">{{ errors.name }}</span>
                                            </div>
                                            <div class="wrap-input100 validate-input input-group">
                                                <a href="javascript:void(0)"
                                                    class="input-group-text bg-theme text-yellow">
                                                    <i class="zmdi zmdi-email text-yellow" aria-hidden="true"></i>
                                                </a>
                                                <input class="input100 border-start-0 form-control ms-0"
                                                    :class="{'is-invalid': errors.email}" type="email"
                                                    placeholder="Email" v-model="form.email">
                                                <span class="w-100 text-red text-capitalize ps-7 font-1 mt-1"
                                                    v-if="errors.email">{{ errors.email }}</span>
                                            </div>
                                            <div class="wrap-input100 validate-input input-group" id="Password-toggle">
                                                <a href="javascript:void(0)"
                                                    class="input-group-text bg-theme text-yellow">
                                                    <i class="zmdi zmdi-eye text-yellow" aria-hidden="true"></i>
                                                </a>
                                                <input class="input100 border-start-0 form-control ms-0" type="password"
                                                    placeholder="Password" v-model="form.password"
                                                    :class="{'is-invalid': errors.password}">
                                                <span class="w-100 text-red text-capitalize ps-7 font-1 mt-1"
                                                    v-if="errors.password">{{ errors.password }}</span>
                                            </div>
                                            <div class="wrap-input100 validate-input input-group" id="Password-toggle">
                                                <a href="javascript:void(0)"
                                                    class="input-group-text bg-theme text-yellow">
                                                    <i class="zmdi zmdi-eye text-yellow" aria-hidden="true"></i>
                                                </a>
                                                <input class="input100 border-start-0 form-control ms-0" type="password"
                                                    placeholder="Confirm Password" v-model="form.password_confirmation"
                                                    :class="{'is-invalid': errors.password_confirmation}">
                                                <span class="w-100 text-red text-capitalize ps-7 font-1 mt-1"
                                                    v-if="errors.password_confirmation">{{ errors.password_confirmation }}</span>
                                            </div>
                                            <div class="container-login100-form-btn">
                                                <button type="submit"
                                                    class="login100-form-btn btn-primary">Register</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>


<script>
import { Head, Link } from '@inertiajs/inertia-vue3';

export default {

  components: {
    Head,
    Link,
  },

  props: {
      errors: String
  },

  data() {
      return {
        //   error: String,
          form: this.$inertia.form({
              name: null,
              email: null,
              password: null,
              password_confirmation: null,
              remember: true,
          }),
      }
  },

  methods: {
      register() {
          this.form.post('/register');
      }
  }
}
</script>


<style scoped>

</style>
