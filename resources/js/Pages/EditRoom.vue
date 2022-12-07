<script setup>
import { Head, Link, useForm } from "@inertiajs/inertia-vue3";
import AppLayout from "@/Layouts/AppLayout.vue";
import PrimaryButton from "@/Components/PrimaryButton.vue";
import RoomsList from "@/Components/RoomsList.vue";
import InputError from "@/Components/InputError.vue";
import InputLabel from "@/Components/InputLabel.vue";
import TextInput from "@/Components/TextInput.vue";

const props = defineProps({
  room: { type: Object },
});

const form = useForm({
  ...props.room
});
const submit = () => {
  form.post(route("update-room", props.room.id));
};
</script>

<template>
    <AppLayout title="Rooms">
        <Head title="Rooms" />
        <section class="py-12 max-w-7xl mx-auto mt-5 px-3">
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
              Update
            </PrimaryButton>
          </form>
        </section>
    </AppLayout>
</template>
