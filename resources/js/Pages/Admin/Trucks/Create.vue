<script setup lang="ts">
import { ref } from "vue";
import BreadcrumbDefault from "@/Components/Breadcrumbs/BreadcrumbDefault.vue";
import DefaultLayout from "@/Layouts/DefaultLayout.vue";
import DefaultCard from "@/Components/Forms/DefaultCard.vue";
import InputGroup from "@/Components/Forms/InputGroup.vue";

import { useForm } from "@inertiajs/vue3";

const form = useForm({
    matricule: null,
    consommation: null,
    marque: null,
    genre: null,
    type_carburant: null,
    n_chasie: null,
    puissanse_fiscale: null,
    premier_mise: null,
});


const pageTitle = ref("Create new Truck");
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
                    <form @submit.prevent="form.post('/admin/trucks')">
                        {{ form }}
                        <div class="p-6.5">
                            <div class="mb-4.5 flex flex-col gap-6 xl:flex-row">
                                <InputGroup
                                    label="Matricule"
                                    type="text"
                                    placeholder="Enter Matricule"
                                    customClasses="w-full xl:w-1/2"
                                    required
                                    v-model="form.matricule"
                                    />
                                    <InputGroup
                                    label="Consomation"
                                    type="text"
                                    required
                                    v-model="form.consommation"
                                    placeholder="Enter consomation"
                                    customClasses="w-full xl:w-1/2"
                                    />
                                </div>
                                <div class="mb-4.5 flex flex-col gap-6 xl:flex-row">
                                    <InputGroup
                                    label="Marque"
                                    type="text"
                                    placeholder="Enter Marque"
                                    customClasses="w-full xl:w-1/2"
                                    v-model="form.marque"
                                />
                                <InputGroup
                                    label="genre"
                                    type="text"
                                    placeholder="Enter genre"
                                    customClasses="w-full xl:w-1/2"
                                    v-model="form.genre"
                                />
                            </div>
                            <div class="mb-4.5 flex flex-col gap-6 xl:flex-row">
                                <InputGroup
                                    label="type carburant"
                                    type="text"
                                    placeholder="Enter type de carburant"
                                    v-model="form.type_carburant"
                                    customClasses="w-full xl:w-1/2"
                                />
                                <InputGroup
                                    label="Driver N° chasie"
                                    type="text"
                                    v-model="form.n_chasie"
                                    placeholder="Enter n chasie"
                                    customClasses="w-full xl:w-1/2"
                                />
                            </div>
                            <div class="mb-4.5 flex flex-col gap-6 xl:flex-row">
                                <InputGroup
                                    label="puissanse fiscal"
                                    v-model="form.puissanse_fiscale"
                                    type="text"
                                    placeholder="Enter puissance fiscal"
                                    customClasses="w-full xl:w-1/2"
                                />
                                <InputGroup
                                    label="Driver premier mise"
                                    type="date"
                                    v-model="form.premier_mise"
                                    placeholder="Enter premier mise"
                                    customClasses="w-full xl:w-1/2"
                                />
                            </div>

                            <div class="mb-6"></div>

                            <button
                                class="flex w-full justify-center rounded bg-primary p-3 font-medium text-gray hover:bg-opacity-90"
                            >
                                Send Message
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
