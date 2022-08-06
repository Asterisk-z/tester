<template>

    <Head>
        <title>User List</title>
    </Head>
    <div class="row">
        <div class="col-xl-12 col-lg-12">
            <div class="row">
                <div class="col-xl-12">
                    <div class="card p-0">
                        <div class="card-body p-4">
                            <div class="row">
                                <div class="col-xl-5 col-lg-6 col-md-5 col-sm-6">
                                    <h3 class="mt-2">User List</h3>
                                </div>
                                <div class="col-xl-7 col-lg-6 col-md-7 col-sm-6">
                                    <div class="float-sm-end float-none my-1">
                                        <Link class="btn btn-primary me-2" data-bs-effect="effect-super-scaled"
                                            data-bs-toggle="modal" href="#createUser">Create User</Link>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>


            <div class="row">
                <div class="col-md-12 col-lg-12">
                    <div class="card">
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table border text-nowrap text-md-nowrap mb-0">
                                    <thead class="table-primary">
                                        <tr>
                                            <th>ID</th>
                                            <th>Name</th>
                                            <th>Email</th>
                                            <th>Activites</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr v-for="(user, key) in users.data" v-bind:key="user">
                                            <td>{{ key + 1 }}</td>
                                            <td>{{ user.name }}</td>
                                            <td>{{ user.email }}</td>
                                            <td>{{ user.activities }}</td>
                                            <td>
                                                <Link :href="'admin/users/'+ user.id"
                                                    class="btn btn-primary btn-sm ms-3">
                                                <i class="fa fa-eye fa-1.5x "></i>
                                                </Link>
                                                <Link :href="'#deleteModel'+user.id"
                                                    data-bs-effect="effect-super-scaled" data-bs-toggle="modal"
                                                    class="btn btn-danger btn-sm ms-3">
                                                <i class="fa fa-trash fa-1.5x "></i>
                                                </Link>
                                                <div class="modal fade" :id="'deleteModel'+user.id">
                                                    <div class="modal-dialog modal-dialog-centered text-center"
                                                        role="document">
                                                        <div class="modal-content modal-content-demo">
                                                            <div class="modal-header">
                                                                <h6 class="modal-title">Delete {{ user.name }} ??</h6>
                                                                <button aria-label="Close" class="btn-close"
                                                                    data-bs-dismiss="modal">X</button>
                                                            </div>
                                                            <div class="modal-body">

                                                                <form class="form-horizontal"
                                                                    @submit.prevent="deleteUser(user.id)">

                                                                    <button type="submit"
                                                                        class="btn btn-danger btn-block">Delete</button>
                                                                </form>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </td>
                                        </tr>

                                    </tbody>
                                </table>
                            </div>

                            <ul class="pagination mt-5 justify-content-center">

                                <li class="page-item " v-for="(link, key) in users.links"
                                    :class="{ 'active': link.active, 'page-prev': (key == users.links[0]), 'page-next': (key == users.links[users.links.length - 1]) }"
                                    v-bind:key="link">
                                    <a class="page-link" :key="`link-${key}`" :href="link.url" tabindex="-1"
                                        v-html="link.label"></a>
                                </li>

                            </ul>
                        </div>
                    </div>
                </div>
            </div>

            <div class="modal fade" id="createUser">
                <div class="modal-dialog modal-dialog-centered text-center" role="document">
                    <div class="modal-content modal-content-demo">
                        <div class="modal-header">
                            <h6 class="modal-title">Create User</h6><button aria-label="Close" class="btn-close"
                                data-bs-dismiss="modal"><span aria-hidden="true">&times;</span></button>
                        </div>
                        <div class="modal-body">

                            <form class="form-horizontal" @submit.prevent="createUser">
                                <div class=" row mb-4">
                                    <label class="col-md-3 form-label">Name</label>
                                    <div class="col-md-9">
                                        <input type="text" class="form-control theme-outline-active" v-model="form.name"
                                            :class="{ 'is-invalid': errors.name }">
                                        <span class="text-danger" v-if="errors.name">{{ errors.name }}</span>
                                    </div>
                                </div>
                                <div class=" row mb-4">
                                    <label class="col-md-3 form-label">Email</label>
                                    <div class="col-md-9">
                                        <input type="email" class="form-control theme-outline-active"
                                            v-model="form.email" :class="{ 'is-invalid': errors.email }">
                                        <span class="text-danger" v-if="errors.email">{{ errors.email }}</span>
                                    </div>
                                </div>
                                <button type="submit" class="btn btn-primary btn-block">Create</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>




        </div>
    </div>
</template>

<script>
import { Link, Head } from "@inertiajs/inertia-vue3";
import { Inertia } from '@inertiajs/inertia'
import Layout from '~/Shared/Layout.vue';

export default {
    components: {
        Link,
        Head,
    },
    layout: Layout,
    props: {
        users: Object,
        errors: Object,
    },
    data() {
        return {
            form: this.$inertia.form({
                name: null,
                email: null,
            })
        }
    },
    methods: {
        createUser() {

            this.form.post('/admin/users/store');

            window.location.reload();

        },
        deleteUser(id) {

            this.$inertia.delete(`/admin/users/delete/${id}`);

            window.location.reload();

        }
    }
}
</script>
