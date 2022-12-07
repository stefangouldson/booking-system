<script setup>
import { Head, Link, useForm } from "@inertiajs/inertia-vue3";
import AppLayout from "@/Layouts/AppLayout.vue";
import PrimaryButton from "@/Components/PrimaryButton.vue";
import InputError from "@/Components/InputError.vue";
import InputLabel from "@/Components/InputLabel.vue";
import TextInput from "@/Components/TextInput.vue";
import RoomsList from "@/Components/RoomsList.vue";

defineProps({
  rooms: { type: Array },
});

const form = useForm({
  name: "",
  image: "",
  description: "",
});
const submit = () => {
  form.post(route("add-room"), {
    onFinish: () => form.reset(),
  });
};
</script>

<template>
    <AppLayout title="Dashboard">
        <Head title="Admin" />

        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                Admin
            </h2>
        </template>

        <section class="py-12 max-w-7xl mx-auto mt-5">
          <form @submit.prevent="submit" class="bg-white overflow-hidden shadow-xl sm:rounded-lg px-6 py-5">
            <h2 class="text-3xl mb-5">Add Room</h2>
            <div>
              <InputLabel for="name" value="Name" />
              <TextInput
                id="name"
                v-model="form.name"
                type="text"
                class="mt-1 block w-full"
                required
                autocomplete="name"
              />
              <InputError class="mt-2" :message="form.errors.name" />
            </div>

            <div class="mt-4">
              <InputLabel for="image" value="Image URL" />
              <TextInput
                id="image"
                v-model="form.image"
                type="text"
                class="mt-1 block w-full"
                required
                autocomplete="image"
              />
              <InputError class="mt-2" :message="form.errors.image" />
            </div>
            <div class="mt-4">
              <InputLabel for="desc" value="Description" />
              <TextInput
                id="desc"
                v-model="form.description"
                type="text"
                class="mt-1 block w-full"
                required
                autocomplete="description"
              />
              <InputError class="mt-2" :message="form.errors.description" />
            </div>
            <PrimaryButton class="mt-4 mb-5" :class="{ 'opacity-25': form.processing }" :disabled="form.processing">
              Add
            </PrimaryButton>
          </form>
        </section>

        <RoomsList :rooms="rooms" :admin="true" />
    </AppLayout>
</template>
