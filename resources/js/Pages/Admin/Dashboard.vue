<template>

    <Head>
        <title>Admin Dashboard</title>
    </Head>

    <div class="row">
        <div class="col-lg-12 col-md-12 col-sm-12 col-xl-12">
            <div class="row">
                <div class="col-lg-6 col-md-6 col-sm-12 col-xl-6">
                    <div class="card overflow-hidden bg-gray text-white">
                        <div class="card-body">
                            <div class="d-flex">
                                <div class="mt-2">
                                    <h6 class="">Total Articles</h6>
                                    <h2 class="mb-0 number-font">{{ activities }}</h2>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 col-md-6 col-sm-12 col-xl-6" v-if="this.auth.role == 'admin'">
                    <div class="card overflow-hidden bg-warning-gradient text-white">
                        <div class="card-body">
                            <div class="d-flex">
                                <div class="mt-2">
                                    <h6 class="">Total Users</h6>
                                    <h2 class="mb-0 number-font">{{ users }}</h2>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 col-md-6 col-sm-12 col-xl-6" v-else>
                    <div class="card overflow-hidden bg-warning-gradient text-white">
                        <div class="card-body">
                            <div class="d-flex">
                                <div class="mt-2">
                                    <h6 class="">Total Personal Activities</h6>
                                    <h2 class="mb-0 number-font">{{ users }}</h2>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xl-12">
                    <div class="card">
                        <div class="card-body">
                            <FullCalendar :options="calendarOptions" />
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>

import { Head, Link } from '@inertiajs/inertia-vue3';
import Layout from '~/Shared/Layout.vue';
import '@fullcalendar/core/vdom' // solves problem with Vite
import FullCalendar, { CalendarOptions, EventApi, DateSelectArg, EventClickArg } from '@fullcalendar/vue3'
import dayGridPlugin from '@fullcalendar/daygrid'
import interactionPlugin from '@fullcalendar/interaction'

export default {

    components: {
        Head,
        Link,
        FullCalendar,
    },

    props: {
        activities: Number,
        users: Number,
        errors: Object,
        auth: Object,
    },

    layout: Layout,

    data() {
        return {
            calendarOptions: {
                plugins: [dayGridPlugin, interactionPlugin],
                initialView: 'dayGridMonth',
            }
        };
    },

    mounted() {

    },

    methods: {

    },

};
</script>
