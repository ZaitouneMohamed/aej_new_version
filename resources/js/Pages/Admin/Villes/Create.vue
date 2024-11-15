<script setup lang="ts">
import { ref } from "vue";
import BreadcrumbDefault from "@/Components/Breadcrumbs/BreadcrumbDefault.vue";
import DefaultLayout from "@/Layouts/DefaultLayout.vue";
import DefaultCard from "@/Components/Forms/DefaultCard.vue";
import SelectGroupTwo from "@/Components/Forms/SelectGroup/SelectGroupTwo.vue";
import InputGroup from "@/Components/Forms/InputGroup.vue";

import { useForm } from "@inertiajs/vue3";

const form = useForm({
    name: null,
    km_proposer: null,
});


const pageTitle = ref("Create new Ville");
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
                    <form @submit.prevent="form.post('/admin/villes')">
                        {{ form }}
                        <div class="p-6.5">
                            <div class="mb-4.5 flex flex-col gap-6 xl:flex-row">
                                <InputGroup
                                    label="Ville Name"
                                    type="text"
                                    placeholder="Enter ville Name"
                                    customClasses="w-full xl:w-1/2"
                                    required
                                    v-model="form.name"
                                />
                                <InputGroup
                                    label="km proposer"
                                    type="text"
                                    placeholder="Enter km proposer"
                                    customClasses="w-full xl:w-1/2"
                                    required
                                    v-model="form.km_proposer"
                                />
                            </div>

                            <div class="mb-6"></div>

                            <button
                                class="flex w-full justify-center rounded bg-primary p-3 font-medium text-gray hover:bg-opacity-90"
                            >
                                Create
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
