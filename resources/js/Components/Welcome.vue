<script setup>
import ApplicationLogo from '@/Components/ApplicationLogo.vue';
</script>

<template>
    <div>
        <div class="p-6 sm:px-20 bg-gray-800 border-b border-gray-200 text-gray-100">
            <div>
                <ApplicationLogo class="block h-12 w-auto" />
            </div>
            <div class="mt-8 text-2xl">
                Welcome to your Barerooms Account
            </div>
            <div class="mt-6">
                Lorem ipsum dolor sit amet consectetur adipisicing elit. Deleniti blanditiis iste dolor laudantium rerum, quia id voluptatibus repellendus libero omnis quas modi voluptatem veritatis optio ipsum neque obcaecati qui! Facere!
                Aut accusantium corporis natus. Dignissimos, tenetur quibusdam. Itaque, porro nobis! Esse in quisquam soluta expedita perspiciatis possimus optio? Autem odio necessitatibus libero dicta veniam adipisci vel quasi laborum alias ex.
            </div>
        </div>
        <div class="grid grid-cols-1 md:grid-cols-2">
            <div class="bg-yellow-500 text-dark md:border-r md:border-black">
                <h2 class="text-center text-2xl font-semibold py-10">Hours Used: 0</h2>
            </div>
            <div class="bg-yellow-500 text-dark md:border-l md:border-black">
                <h2 class="text-center text-2xl font-semibold py-10">Hours Remaining: 3</h2>
            </div>
        </div>
    </div>
</template>
