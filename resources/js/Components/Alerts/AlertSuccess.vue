<template>
    <div
        class="flex w-full border-l-6 border-[#34D399] bg-[#34D399] bg-opacity-[15%] px-4 py-4 shadow-md dark:bg-[#1B1B24] dark:bg-opacity-30 md:p-9"
    >
        <div class="w-full">
            <h5 class="mb-3 text-lg font-bold text-black dark:text-[#34D399]">
                {{ message }}
            </h5>
        </div>
    </div>
</template>

<script setup>
defineProps({
    message: {
        type: String,
        required: true,
    },
});
</script>
