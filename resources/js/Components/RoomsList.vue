<template>
    <section class="py-12 max-w-7xl mx-auto px-3">
        <div class="grid grid-cols-1 md:grid-cols-3 xl:grid-cols-3 gap-10">
            <div v-for="room in rooms" :key="room.id" class="bg-white overflow-hidden shadow-xl sm:rounded-lg hover:scale-105 transition duration-500 ease">
                <img :src="room.image" alt="">
                <div class="py-5 px-3">
                    <h2 class="text-3xl">{{room.name}}</h2>
                    <p class="py-3">{{ room.description }}</p>
                    <div class="flex items-center justify-between">
                        <PrimaryButton v-if="admin">
                            <Link :href="route('edit-room', room.id)">Edit</Link>
                        </PrimaryButton>
                        <DangerButton @click.prevent="removeRoom(room.id)">
                            Delete
                        </DangerButton>
                    </div>
                </div>
            </div>
        </div>
    </section>
</template>

<script>
import PrimaryButton from '../Components/PrimaryButton.vue';
import DangerButton from '../Components/DangerButton.vue';
import { Link } from '@inertiajs/inertia-vue3';

export default {
    props: ['rooms', 'admin'],
    components: {
        PrimaryButton,
        Link,
        DangerButton
    },

    methods: {
        removeRoom(id){
            if(confirm("Are you sure you want to delete this room") == true){
                this.$inertia.post(route('delete-room', id));
            }
        }
    }
}
</script>
