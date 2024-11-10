<script setup lang="ts">
import { ref } from "vue";

const packages = ref([
    {
        name: "Free Package",
        price: "$0.00",
        invoiceDate: "Jan 13, 2025",
        status: "Paid",
    },
    {
        name: "Standard Package",
        price: "$59.00",
        invoiceDate: "Jan 13, 2025",
        status: "Paid",
    },
    {
        name: "Business Package",
        price: "$99.00",
        invoiceDate: "Jan 13, 2025",
        status: "Unpaid",
    },
    {
        name: "Standard Package",
        price: "$59.00",
        invoiceDate: "Jan 13, 2025",
        status: "Pending",
    },
]);

const props = defineProps({
    data: Object,
    columns: Array,
    columnsName: Array,
});

const data = props.data.data ? props.data.data : props.data;
</script>

<template>
    <div
        class="rounded-sm border border-stroke bg-white px-5 pt-6 pb-2.5 shadow-default dark:border-strokedark dark:bg-boxdark sm:px-7.5 xl:pb-1"
    >
        <div class="max-w-full overflow-x-auto">
            <table class="w-full table-auto">
                <thead>
                    <tr class="bg-gray-2 text-left dark:bg-meta-4">
                        <th
                            class="min-w-[220px] py-4 px-4 font-medium text-black dark:text-white xl:pl-11"
                            v-for="(item, index) in columnsName"
                            :key="index"
                        >
                            {{ item }}
                        </th>
                        <th
                            class="py-4 px-4 font-medium text-black dark:text-white"
                        >
                            Actions
                        </th>
                    </tr>
                </thead>
                <tbody>
                    <tr v-for="(item, index) in data" :key="index">
                        <!-- <td class="py-5 px-4 pl-9 xl:pl-11">
              <h5 class="font-medium text-black dark:text-white">{{ item.full_name }}</h5>
              <p class="text-sm">{{ item.code }}</p>
            </td> -->
                        <td class="py-5 px-4" v-for="col in columns">
                            <p class="text-black dark:text-white">
                                {{ item[col] }}
                            </p>
                        </td>
                        <td
                            class="p-4 space-x-2 whitespace-nowrap"
                        >
                            <slot name="actions" :item="item"></slot>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</template>
