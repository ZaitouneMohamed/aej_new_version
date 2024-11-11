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
    ville: null,
    solde: null,
    gerant_name: null,
    gerant_rep_name: null,
    gerant_phone: null,
    gerant_rep_phone: null,
});

const villeList = [
    "Agadir",
    "Al Hoceima",
    "Azilal",
    "Beni Mellal",
    "Ben Slimane",
    "Boulemane",
    "Casablanca",
    "Chaouen",
    "El Jadida",
    "El Kelaa des Sraghna",
    "Er Rachidia",
    "Essaouira",
    "Fes",
    "Figuig",
    "Guelmim",
    "Ifrane",
    "Kenitra",
    "Khemisset",
    "Khenifra",
    "Khouribga",
    "Laayoune",
    "Larache",
    "Marrakech",
    "Meknes",
    "Nador",
    "Ouarzazate",
    "Oujda",
    "Rabat-Sale",
    "Safi",
    "Settat",
    "Sidi Kacem",
    "Tangier",
    "Tan-Tan",
    "Taounate",
    "Taroudannt",
    "Tata",
    "Taza",
    "Tetouan",
    "Tiznit",
];

const pageTitle = ref("Create new Station");
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
                    <form @submit.prevent="form.post('/admin/stations')">
                        {{ form }}
                        <div class="p-6.5">
                            <div class="mb-4.5 flex flex-col gap-6 xl:flex-row">
                                <InputGroup
                                    label="Name"
                                    type="text"
                                    placeholder="Enter Station Name"
                                    customClasses="w-full xl:w-1/2"
                                    required
                                    v-model="form.name"
                                />

                                <SelectGroupTwo
                                    label="ville"
                                    v-model="form.ville"
                                    customClasses="w-full xl:w-1/2"
                                    :options="villeList"
                                />
                            </div>
                            <div class="mb-4.5 flex flex-col gap-6 xl:flex-row">
                                <InputGroup
                                    label="Solde"
                                    type="text"
                                    placeholder="Enter solde"
                                    customClasses="w-full xl:w-1/2"
                                    v-model="form.solde"
                                />
                                <InputGroup
                                    label="gerant name"
                                    type="text"
                                    placeholder="Enter gerant name"
                                    customClasses="w-full xl:w-1/2"
                                    v-model="form.gerant_name"
                                />
                            </div>
                            <div class="mb-4.5 flex flex-col gap-6 xl:flex-row">
                                <InputGroup
                                    label="gerant phone"
                                    type="text"
                                    placeholder="Enter gerant phone"
                                    v-model="form.gerant_phone"
                                    customClasses="w-full xl:w-1/2"
                                />
                                <InputGroup
                                    label="gerant rep name"
                                    type="text"
                                    v-model="form.gerant_rep_name"
                                    placeholder="Enter gerant rep name"
                                    customClasses="w-full xl:w-1/2"
                                />
                            </div>
                            <div class="mb-4.5 flex flex-col gap-6 xl:flex-row">
                                <InputGroup
                                    label="gerant rep phone"
                                    v-model="form.gerant_rep_phone"
                                    type="text"
                                    placeholder="Enter gerant rep phone"
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
