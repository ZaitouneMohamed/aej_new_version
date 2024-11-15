<script setup lang="ts">
import { ref } from "vue";
import BreadcrumbDefault from "@/Components/Breadcrumbs/BreadcrumbDefault.vue";
import DefaultLayout from "@/Layouts/DefaultLayout.vue";
import DefaultCard from "@/Components/Forms/DefaultCard.vue";
import InputGroup from "@/Components/Forms/InputGroup.vue";
import SelectGroupTwo from "@/Components/Forms/SelectGroup/SelectGroupTwo.vue";

import { useForm } from "@inertiajs/vue3";

const props = defineProps({
    ville: {
        type: Object,
        required: true,
    },
});


const form = useForm({
    name: props.ville.name || null,
    km_proposer: props.ville.km_proposer || null,
});

const pageTitle = ref("Edit Ville");
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
                <DefaultCard cardTitle="Edit Form">
                    <form @submit.prevent="form.put('/admin/villes/' + props.ville.id)">
                        {{ form }}
                        <div class="p-6.5">
                            <div class="mb-4.5 flex flex-col gap-6 xl:flex-row">
                                <InputGroup
                                    label="Name"
                                    type="text"
                                    placeholder="Enter Ville Name"
                                    customClasses="w-full xl:w-1/2"
                                    required
                                    v-model="form.name"
                                />
                                <InputGroup
                                    label="KM Proposer"
                                    type="number"
                                    placeholder="Enter Km proposer"
                                    customClasses="w-full xl:w-1/2"
                                    required
                                    v-model="form.km_proposer"
                                />

                            </div>
                            <div class="mb-6"></div>

                            <button
                                class="flex w-full justify-center rounded bg-primary p-3 font-medium text-gray hover:bg-opacity-90"
                            >
                                Edit Form
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
