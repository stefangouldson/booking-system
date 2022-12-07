<script setup>
import { Head, Link, useForm } from "@inertiajs/inertia-vue3";
import AppLayout from "@/Layouts/AppLayout.vue";
import PrimaryButton from "@/Components/PrimaryButton.vue";
import RoomsList from "@/Components/RoomsList.vue";

defineProps({
  rooms: { type: Array },
});
</script>

<template>
    <AppLayout title="Rooms">
        <Head title="Rooms" />
        <RoomsList :rooms="rooms" />
    </AppLayout>
</template>
