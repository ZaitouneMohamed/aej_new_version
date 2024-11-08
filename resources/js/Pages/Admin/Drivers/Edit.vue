<script setup lang="ts">
import { ref } from "vue";
import BreadcrumbDefault from "@/Components/Breadcrumbs/BreadcrumbDefault.vue";
import DefaultLayout from "@/Layouts/DefaultLayout.vue";
import DefaultCard from "@/Components/Forms/DefaultCard.vue";
import InputGroup from "@/Components/Forms/InputGroup.vue";
import { useForm } from "@inertiajs/vue3";

const props  = defineProps({
    driver: {
        type: Object,
        required: true,
    },
});

const form = useForm({
    full_name: props.driver.full_name || '',
    code: props.driver.code || null,
    phone: props.driver.phone || null,
    email: props.driver.email || null,
    numero_2: props.driver.numero_2 || null,
    adresse: props.driver.adresse || null,
    cnss: props.driver.cnss || null,
    cni: props.driver.cni || null,
});

const pageTitle = ref("Edit driver");
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
                    <form @submit.prevent="form.put('/admin/drivers/' + props.driver.id)">
                        <div class="p-6.5">
                            <div class="mb-4.5 flex flex-col gap-6 xl:flex-row">
                                <InputGroup
                                    label="Driver Name"
                                    type="text"
                                    placeholder="Enter Driver Name"
                                    customClasses="w-full xl:w-1/2"
                                    required
                                    v-model="form.full_name"
                                    />
                                    <InputGroup
                                    label="Driver Code"
                                    type="text"
                                    required
                                    v-model="form.code"
                                    placeholder="Enter Driver Code"
                                    customClasses="w-full xl:w-1/2"
                                    />
                                </div>
                                <div class="mb-4.5 flex flex-col gap-6 xl:flex-row">
                                    <InputGroup
                                    label="Driver Phone"
                                    type="text"
                                    placeholder="Enter Driver Phone"
                                    required
                                    customClasses="w-full xl:w-1/2"
                                    v-model="form.phone"
                                />
                                <InputGroup
                                    label="Email"
                                    type="email"
                                    placeholder="Enter your email address"
                                    customClasses="w-full xl:w-1/2"
                                    v-model="form.email"
                                />
                            </div>
                            <div class="mb-4.5 flex flex-col gap-6 xl:flex-row">
                                <InputGroup
                                    label="Driver Phone 2"
                                    type="text"
                                    placeholder="Enter Driver Phone 2"
                                    v-model="form.numero_2"
                                    customClasses="w-full xl:w-1/2"
                                />
                                <InputGroup
                                    label="Driver Adresse"
                                    type="text"
                                    v-model="form.adresse"
                                    placeholder="Enter Driver Adresse"
                                    customClasses="w-full xl:w-1/2"
                                />
                            </div>
                            <div class="mb-4.5 flex flex-col gap-6 xl:flex-row">
                                <InputGroup
                                    label="Driver CNSS"
                                    v-model="form.cnss"
                                    type="text"
                                    placeholder="Enter Driver CNSS"
                                    customClasses="w-full xl:w-1/2"
                                />
                                <InputGroup
                                    label="Driver CNI"
                                    type="text"
                                    v-model="form.cni"
                                    placeholder="Enter Driver CNI"
                                    customClasses="w-full xl:w-1/2"
                                />
                            </div>

                            <div class="mb-6"></div>

                            <button
                                class="flex w-full justify-center rounded bg-primary p-3 font-medium text-gray hover:bg-opacity-90"
                            >
                                Submit
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
