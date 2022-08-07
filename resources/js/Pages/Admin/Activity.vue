<template>

    <Head>
        <title>Activity List</title>
    </Head>
    <div class="row">
        <div class="col-xl-12 col-lg-12">
            <div class="row">
                <div class="col-xl-12">
                    <div class="card p-0">
                        <div class="card-body p-4">
                            <div class="row">
                                <div class="col-xl-5 col-lg-6 col-md-5 col-sm-6">
                                    <h3 class="mt-2">Activity List</h3>
                                </div>
                                <div class="col-xl-7 col-lg-6 col-md-7 col-sm-6">
                                    <div class="float-sm-end float-none my-1">
                                        <Link class="btn btn-primary me-2" data-bs-effect="effect-super-scaled"
                                            data-bs-toggle="modal" href="#createActivity">Create Activity</Link>
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
                                            <th>Title</th>
                                            <th>Description</th>
                                            <th>Date</th>
                                            <th>Type</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr v-for="(activity, key) in activities.data" v-bind:key="activity">
                                            <td>{{ key + 1 }}</td>
                                            <td>{{ activity.title.substr(0, 15) }}</td>
                                            <td>{{ activity.description.substr(0, 30) }}...</td>
                                            <td>{{ activity.date }} <span class="badge  bg-info">{{
                                                    activity.fromNow }}</span></td>
                                            <td>{{ activity.type }}</td>
                                            <td>
                                                <Link :href="'#editActivity' + activity.id"
                                                    data-bs-effect="effect-super-scaled" data-bs-toggle="modal"
                                                    class="btn btn-primary btn-sm ms-3">
                                                <i class="fa fa-pencil fa-1.5x "></i>
                                                </Link>
                                                <Link :href="'#deleteModel' + activity.id"
                                                    data-bs-effect="effect-super-scaled" data-bs-toggle="modal"
                                                    class="btn btn-danger btn-sm ms-3">
                                                <i class="fa fa-trash fa-1.5x "></i>
                                                </Link>
                                                <div class="modal fade" :id="'deleteModel' + activity.id">
                                                    <div class="modal-dialog modal-dialog-centered text-center"
                                                        role="document">
                                                        <div class="modal-content modal-content-demo">
                                                            <div class="modal-header">
                                                                <h6 class="modal-title">Delete {{ activity.title }} ??
                                                                </h6>
                                                                <button aria-label="Close" class="btn-close"
                                                                    data-bs-dismiss="modal">X</button>
                                                            </div>
                                                            <div class="modal-body">

                                                                <form class="form-horizontal"
                                                                    @submit.prevent="deleteActivity(activity.id)">

                                                                    <button type="submit"
                                                                        class="btn btn-danger btn-block">Delete</button>
                                                                </form>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="modal fade" :id="'editActivity' + activity.id">
                                                    <div class=" modal-dialog modal-dialog-centered text-center"
                                                        role="document">
                                                        <div class="modal-content modal-content-demo">
                                                            <div class="modal-header">
                                                                <h6 class="modal-title">Edit {{ activity.title }}</h6>
                                                                <button aria-label="Close" class="btn-close"
                                                                    data-bs-dismiss="modal"><span
                                                                        aria-hidden="true">&times;</span></button>
                                                            </div>
                                                            <div class="modal-body">

                                                                <form class="form-horizontal"
                                                                    @submit.prevent="editActivity(activity.id)">
                                                                    <div class=" row mb-4">
                                                                        <label class="col-md-3 form-label">Title</label>
                                                                        <div class="col-md-9">
                                                                            <input type="text"
                                                                                class="form-control theme-outline-active"
                                                                                v-model="form.title"
                                                                                :class="{ 'is-invalid': errors.title }">
                                                                            <span class="text-danger"
                                                                                v-if="errors.title">{{
                                                                                errors.title
                                                                                }}</span>
                                                                        </div>
                                                                    </div>
                                                                    <div class=" row mb-4">
                                                                        <label
                                                                            class="col-md-3 form-label">Description</label>
                                                                        <div class="col-md-9">
                                                                            <input type="text"
                                                                                class="form-control theme-outline-active"
                                                                                v-model="form.description"
                                                                                :class="{ 'is-invalid': errors.description }">
                                                                            <span class="text-danger"
                                                                                v-if="errors.description">{{
                                                                                errors.description
                                                                                }}</span>
                                                                        </div>
                                                                    </div>
                                                                    <div class=" row mb-4"
                                                                        v-show="this.auth.user.role == 'admin'">
                                                                        <label class="col-md-3 form-label">Type</label>
                                                                        <div class="col-md-9">
                                                                            <select id=""
                                                                                class="form-control theme-outline-active"
                                                                                v-model="form.type"
                                                                                :class="{ 'is-invalid': errors.type }">
                                                                                <option value="personal">Personal
                                                                                </option>
                                                                                <option value="global">Global</option>
                                                                            </select>
                                                                            <span class="text-danger"
                                                                                v-if="errors.type">{{
                                                                                errors.type
                                                                                }}</span>
                                                                        </div>
                                                                    </div>
                                                                    <div class=" row mb-4">
                                                                        <label class="col-md-3 form-label">Date</label>
                                                                        <div class="col-md-9">
                                                                            <input type="date"
                                                                                class="form-control theme-outline-active"
                                                                                v-model="form.date"
                                                                                :class="{ 'is-invalid': errors.date }">
                                                                            <span class="text-danger"
                                                                                v-if="errors.date">{{
                                                                                errors.date
                                                                                }}</span>
                                                                        </div>
                                                                    </div>
                                                                    <div class=" row mb-4">
                                                                        <label class="col-md-3 form-label">Image</label>
                                                                        <div class="col-md-9">
                                                                            <input type="file"
                                                                                class="form-control theme-outline-active"
                                                                                :class="{ 'is-invalid': errors.image }"
                                                                                @change="getImage">
                                                                            <span class="text-danger"
                                                                                v-if="errors.image">{{
                                                                                errors.image
                                                                                }}</span>
                                                                            <img v-bind:src="imagePreview" width="200"
                                                                                height="150" v-show="imagePreview" />
                                                                        </div>
                                                                    </div>
                                                                    <button type="submit"
                                                                        class="btn btn-primary btn-block">Update</button>
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

                                <li class="page-item " v-for="(link, key) in activities.links"
                                    :class="{ 'active': link.active, 'page-prev': (key == activities.links[0]), 'page-next': (key == activities.links[activities.links.length - 1]) }"
                                    v-bind:key="link">
                                    <a class="page-link" :key="`link-${key}`" :href="link.url" tabindex="-1"
                                        v-html="link.label"></a>
                                </li>

                            </ul>
                        </div>
                    </div>
                </div>
            </div>

            <div class="modal fade" id="createActivity">
                <div class="modal-dialog modal-dialog-centered text-center" role="document">
                    <div class="modal-content modal-content-demo">
                        <div class="modal-header">
                            <h6 class="modal-title">Create Activity</h6><button aria-label="Close" class="btn-close"
                                data-bs-dismiss="modal"><span aria-hidden="true">&times;</span></button>
                        </div>
                        <div class="modal-body">

                            <form class="form-horizontal" @submit.prevent="createActivity">
                                <div class=" row mb-4">
                                    <label class="col-md-3 form-label">Title</label>
                                    <div class="col-md-9">
                                        <input type="text" class="form-control theme-outline-active"
                                            v-model="form.title" :class="{ 'is-invalid': errors.title }">
                                        <span class="text-danger" v-if="errors.title">{{ errors.title }}</span>
                                    </div>
                                </div>
                                <div class=" row mb-4">
                                    <label class="col-md-3 form-label">Description</label>
                                    <div class="col-md-9">
                                        <input type="text" class="form-control theme-outline-active"
                                            v-model="form.description" :class="{ 'is-invalid': errors.description }">
                                        <span class="text-danger" v-if="errors.description">{{ errors.description
                                            }}</span>
                                    </div>
                                </div>
                                <div class=" row mb-4" v-if="this.auth.role == 'admin'">
                                    <label class="col-md-3 form-label">Type</label>
                                    <div class="col-md-9">
                                        <select id="" class="form-control theme-outline-active" v-model="form.type"
                                            :class="{ 'is-invalid': errors.type }">
                                            <option value="personal">Personal</option>
                                            <option value="global">Global</option>
                                        </select>
                                        <span class="text-danger" v-if="errors.type">{{ errors.type }}</span>
                                    </div>
                                </div>
                                <div class=" row mb-4">
                                    <label class="col-md-3 form-label">Date</label>
                                    <div class="col-md-9">
                                        <input type="date" class="form-control theme-outline-active" v-model="form.date"
                                            :class="{ 'is-invalid': errors.date }">
                                        <span class="text-danger" v-if="errors.date">{{ errors.date }}</span>
                                    </div>
                                </div>
                                <div class=" row mb-4">
                                    <label class="col-md-3 form-label">Image</label>
                                    <div class="col-md-9">
                                        <input type="file" class="form-control theme-outline-active"
                                            :class="{ 'is-invalid': errors.image }" @change="getImage">
                                        <span class="text-danger" v-if="errors.image">{{ errors.image }}</span>
                                        <img v-bind:src="imagePreview" width="200" height="150" v-show="imagePreview" />
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
import Layout from '~/Shared/Layout.vue';

export default {
    components: {
        Link,
        Head,
    },
    layout: Layout,
    props: {
        activities: Object,
        errors: Object,
        auth: Object,
    },
    data() {
        return {
            form: this.$inertia.form({
                title: null,
                description: null,
                image: null,
                date: null,
                type: 'personal',
            }),
            imagePreview: null,
        }
    },
    methods: {
        createActivity() {

            this.form.post('/admin/activities/store');

            window.location.reload();

        },
        editActivity(id) {

            this.form.put(`/admin/activities/update/${id}`);

            window.location.reload();

        },
        deleteActivity(id) {

            this.$inertia.delete(`/admin/activities/delete/${id}`);

            window.location.reload();

        },
        getImage(e) {
            this.form.image = e.target.files[0];
            let reader = new FileReader();
            reader.addEventListener("load", function () {
                this.imagePreview = reader.result;
            }.bind(this), false);
            if (this.form.image) {
                if (/\.(jpe?g|png|gif)$/i.test(this.form.image.name)) {
                    reader.readAsDataURL(this.form.image);
                }
            }

        },
    }
}
</script>
