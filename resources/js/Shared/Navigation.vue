<template>
    <div class="main-sidemenu">
        <div class="slide-left disabled" id="slide-left"><svg xmlns="http://www.w3.org/2000/svg" fill="#7b8191"
                width="24" height="24" viewBox="0 0 24 24">
                <path d="M13.293 6.293 7.586 12l5.707 5.707 1.414-1.414L10.414 12l4.293-4.293z" />
            </svg></div>
        <ul class="side-menu">
            <li class="sub-category">
                <h3>Navigation</h3>
            </li>

            <li class="slide">
                <Link class="side-menu__item" data-bs-toggle="slide" href="/admin/dashboard">
                <i class="side-menu__icon fe fe-grid"></i><span class="side-menu__label">Dashboard</span>
                </Link>
            </li>
            <li class="slide" v-if="this.auth.user.role == 'admin'">
                <Link class="side-menu__item" data-bs-toggle="slide" href="/admin/users">
                <i class="side-menu__icon fe fe-users"></i><span class="side-menu__label">Users</span>
                </Link>
            </li>
            <li class="slide">
                <Link class="side-menu__item" data-bs-toggle="slide" href="/admin/activities">
                <i class="side-menu__icon fe fe-home"></i><span class="side-menu__label">Activities</span>
                </Link>
            </li>
        </ul>
        <div class="slide-right" id="slide-right"><svg xmlns="http://www.w3.org/2000/svg" fill="#7b8191" width="24"
                height="24" viewBox="0 0 24 24">
                <path d="M10.707 17.707 16.414 12l-5.707-5.707-1.414 1.414L13.586 12l-4.293 4.293z" />
            </svg></div>
    </div>
</template>

<script>
import { Link } from "@inertiajs/inertia-vue3";
export default {

    components: {
        Link,

    },

    props: {
        auth: Object
    },

    data() {
        return {

        };
    },

    mounted() {

    },

    methods: {

    },
};
</script>

<style scoped>

</style>
