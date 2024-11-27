<script setup lang="ts">
import { ref } from "vue";
import BreadcrumbDefault from "@/Components/Breadcrumbs/BreadcrumbDefault.vue";
import DefaultLayout from "@/Layouts/DefaultLayout.vue";
import DefaultCard from "@/Components/Forms/DefaultCard.vue";
import InputGroup from "@/Components/Forms/InputGroup.vue";

import { useForm } from "@inertiajs/vue3";

const props = defineProps({
    paper: {
        type: Object,
        required: true,
    },
    trucks: {
        type: Object,
        required: true,
    },
});

const trucksList = props.trucks;

const form = useForm({
    title: props.paper.title || null,
    date_debut: props.paper.date_debut || null,
    date_fin: props.paper.date_fin || null,
    description: props.paper.description || null,
    camion_id: props.paper.camion_id || null,
});

const pageTitle = ref("Edit Paper");
</script>

<template>
    <DefaultLayout>
        <!-- Breadcrumb Start -->
        <BreadcrumbDefault :pageTitle="pageTitle" />
        <!-- Breadcrumb End -->
        <!-- ====== Form Layout Section Start -->
        <div class="grid grid-cols-1 gap-9 sm:grid-cols-1">
            <div class="flex flex-col gap-9">
                <!-- Contact Form Start -->
                <DefaultCard cardTitle="Create Form">
                    <form
                        @submit.prevent="
                            form.put('/admin/papers/' + props.paper.id)
                        "
                    >
                        {{ form }}
                        <div class="p-6.5">
                            <div class="mb-4.5 flex flex-col gap-6 xl:flex-row">
                                <InputGroup
                                    label="title"
                                    type="text"
                                    placeholder="Enter paper title"
                                    customClasses="w-full xl:w-1/2"
                                    required
                                    v-model="form.title"
                                />

                                <div class="w-full xl:w-1/2 mb-4.5">
                                    <label
                                        class="mb-2.5 block text-black dark:text-white"
                                    >
                                        Shoose truck
                                        <span class="text-meta-1">*</span>
                                    </label>

                                    <div
                                        class="relative z-20 bg-transparent dark:bg-form-input"
                                    >
                                        <select
                                            v-model="form.camion_id"
                                            required
                                            class="relative z-20 w-full appearance-none rounded border border-stroke bg-transparent py-3 px-5 outline-none transition focus:border-primary active:border-primary dark:border-form-strokedark dark:bg-form-input dark:focus:border-primary"
                                        >
                                            <option value="" disabled selected>
                                                Select your truck
                                            </option>
                                            <!-- Dynamically render the options -->
                                            <option
                                                v-for="(
                                                    truck, index
                                                ) in trucksList"
                                                :key="index"
                                                :value="index"
                                            >
                                                {{ truck.matricule }}
                                            </option>
                                        </select>

                                        <span
                                            class="absolute top-1/2 right-4 z-30 -translate-y-1/2"
                                        >
                                            <svg
                                                class="fill-current"
                                                width="24"
                                                height="24"
                                                viewBox="0 0 24 24"
                                                fill="none"
                                                xmlns="http://www.w3.org/2000/svg"
                                            >
                                                <g opacity="0.8">
                                                    <path
                                                        fill-rule="evenodd"
                                                        clip-rule="evenodd"
                                                        d="M5.29289 8.29289C5.68342 7.90237 6.31658 7.90237 6.70711 8.29289L12 13.5858L17.2929 8.29289C17.6834 7.90237 18.3166 7.90237 18.7071 8.29289C19.0976 8.68342 19.0976 9.31658 18.7071 9.70711L12.7071 15.7071C12.3166 16.0976 11.6834 16.0976 11.2929 15.7071L5.29289 9.70711C4.90237 9.31658 4.90237 8.68342 5.29289 8.29289Z"
                                                        fill=""
                                                    ></path>
                                                </g>
                                            </svg>
                                        </span>
                                    </div>
                                </div>
                            </div>
                            <div class="mb-4.5 flex flex-col gap-6 xl:flex-row">
                                <InputGroup
                                    label="date debut"
                                    type="date"
                                    required
                                    customClasses="w-full xl:w-1/2"
                                    v-model="form.date_debut"
                                />
                                <InputGroup
                                    label="date fin"
                                    type="date"
                                    required
                                    customClasses="w-full xl:w-1/2"
                                    v-model="form.date_fin"
                                />
                            </div>
                            <div class="mb-4.5 flex flex-col gap-6 xl:flex-row">
                                <InputGroup
                                    label="description"
                                    type="text"
                                    placeholder="Enter descriotion"
                                    v-model="form.description"
                                    customClasses="w-full xl:w-1/2"
                                />
                            </div>

                            <div class="mb-6"></div>

                            <button
                                class="flex w-full justify-center rounded bg-primary p-3 font-medium text-gray hover:bg-opacity-90"
                            >
                                Edit Data
                            </button>
                        </div>
                    </form>
                </DefaultCard>
                <!-- Contact Form End -->
            </div>
        </div>
        <!-- ====== Form Layout Section End -->
    </DefaultLayout>
</template>
