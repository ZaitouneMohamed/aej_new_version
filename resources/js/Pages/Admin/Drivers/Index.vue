<script setup lang="ts">
import { ref } from "vue";
import BreadcrumbDefault from "@/Components/Breadcrumbs/BreadcrumbDefault.vue";
import Pagination from "@/Components/Pagination.vue";
import DefaultLayout from "@/Layouts/DefaultLayout.vue";
import { FontAwesomeIcon } from "@fortawesome/vue-fontawesome";
import { Link, router, Head } from "@inertiajs/vue3";
import { library } from "@fortawesome/fontawesome-svg-core";
import {
    faPlus,
    faEdit,
    faPhoneAlt,
    faPhone,
    faEnvelope,
    faIdCard,
    faIdCardAlt,
    faCheckCircle,
    faChartLine,
    faTrashAlt,
} from "@fortawesome/free-solid-svg-icons";

library.add(
    faPlus,
    faEdit,
    faPhoneAlt,
    faPhone,
    faEnvelope,
    faIdCard,
    faIdCardAlt,
    faCheckCircle,
    faChartLine,
    faTrashAlt
);

defineProps({
    data: {
        type: Object,
        required: true,
    },
});

const pageTitle = ref("Driver List");

const deleteRecord = (id) => {
    if (confirm("Are you sure you want to delete this record?")) {
        const fullLink = "drivers/" + id;
        router.delete(fullLink, {
            preserveState: false,
        });
    }
};
</script>

<template>
    <DefaultLayout>
        <Head title="Drivers List" />
        <!-- Breadcrumb Start -->
        <BreadcrumbDefault :pageTitle="pageTitle" />
        <!-- Breadcrumb End -->

        <div class="container mx-auto px-4 py-5">
            <!-- Create New Driver Button -->
            <Link
                :href="route('admin.drivers.create')"
                class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-6 rounded-full mb-6 inline-flex items-center"
            >
                <FontAwesomeIcon icon="plus" class="mr-2" /> Create New Driver
            </Link>

            <!-- Drivers Grid -->
            <div
                class="mx-auto grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-3 gap-8"
            >
                <div
                    class="rounded-lg overflow-hidden shadow-lg transform transition-transform hover:scale-105 duration-300"
                    v-for="item in data.data"
                    :key="item.id"
                >
                    <!-- Card Content -->
                    <div class="bg-white p-6 space-y-4 dark:bg-gray-800">
                        <div class="text-center">
                            <h3
                                class="text-2xl font-semibold text-gray-900 dark:text-white"
                            >
                                {{ item.full_name }}
                            </h3>
                            <p class="text-xl text-gray-600 dark:text-white">
                                {{ item.code }}
                            </p>
                        </div>

                        <!-- Contact Info -->
                        <div class="space-y-2">
                            <div class="flex items-center justify-center">
                                <FontAwesomeIcon
                                    icon="phone-alt"
                                    class="text-gray-600 mr-2 dark:text-white"
                                />
                                <span
                                    class="text-sm text-gray-700 dark:text-white"
                                    >{{ item.phone }}</span
                                >
                            </div>
                            <div
                                v-if="item.numero_2"
                                class="flex items-center justify-center dark:text-white"
                            >
                                <FontAwesomeIcon
                                    icon="phone"
                                    class="text-gray-600 dark:text-white mr-2"
                                />
                                <span
                                    class="text-sm text-gray-700 dark:text-white"
                                    >{{ item.numero_2 }}</span
                                >
                            </div>
                            <div
                                v-if="item.email"
                                class="flex items-center justify-center"
                            >
                                <FontAwesomeIcon
                                    icon="envelope"
                                    class="text-gray-600 dark:text-white mr-2"
                                />
                                <span
                                    class="text-sm text-gray-700 dark:text-white"
                                    >{{ item.email }}</span
                                >
                            </div>
                            <div
                                v-if="item.cnss"
                                class="flex items-center justify-center"
                            >
                                <FontAwesomeIcon
                                    icon="id-card"
                                    class="text-gray-600 dark:text-white mr-2"
                                />
                                <span
                                    class="text-sm text-gray-700 dark:text-white"
                                    >{{ item.cnss }}</span
                                >
                            </div>
                            <div
                                v-if="item.cni"
                                class="flex items-center justify-center"
                            >
                                <FontAwesomeIcon
                                    icon="id-card-alt"
                                    class="text-gray-600 mr-2 dark:text-white"
                                />
                                <span
                                    class="text-sm text-gray-700 dark:text-white"
                                    >{{ item.cni }}</span
                                >
                            </div>
                        </div>
                    </div>

                    <!-- Card Footer (Actions) -->
                    <div
                        class="bg-gray-100 p-4 flex justify-center items-center dark:bg-gray-700"
                    >
                        <div class="flex space-x-2">
                            <Link
                                :href="route('admin.drivers.edit', item.id)"
                                class="inline-block bg-orange-500 rounded-full px-4 py-2 text-sm font-semibold text-white flex items-center space-x-2 hover:bg-orange-600"
                            >
                                <FontAwesomeIcon icon="edit" />
                            </Link>
                            <span
                                class="inline-block bg-green-500 rounded-full px-4 py-2 text-sm font-semibold text-white flex items-center space-x-2"
                            >
                                <FontAwesomeIcon icon="check-circle" />
                            </span>
                            <span
                                class="inline-block bg-blue-500 rounded-full px-4 py-2 text-sm font-semibold text-white flex items-center space-x-2"
                            >
                                <FontAwesomeIcon icon="chart-line" />
                            </span>
                            <button
                                type="button"
                                @click="deleteRecord(item.id)"
                                class="inline-block bg-red-600 rounded-full px-4 py-2 text-sm font-semibold text-white flex items-center space-x-2 cursor-pointer hover:bg-red-700"
                            >
                                <FontAwesomeIcon icon="trash-alt" />
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <Pagination :items="data" />
    </DefaultLayout>
</template>
