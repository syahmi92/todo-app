<script setup>
import AppLayout from "@/Layouts/AppLayout.vue";
import { router } from "@inertiajs/vue3";

defineProps({
    tasks: Array
});

function terminate(task) {
    router.delete(route("tasks.delete", task));
}

</script>

<template>
    <AppLayout title="Dashboard">
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                To Do List
            </h2>
        </template>


        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                    <div class="max-w-6xl mx-auto sm:px-6 lg:px-8">
                        <br>
                        <a class="rounded-md bg-indigo-600 px-3 py-2 text-sm font-semibold text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600"
                            :href="route('tasks.create')">Create New To Do List</a>
                        <ul role="list" class="divide-y divide-gray-100">
                            <br>
                            <li v-for="(task, index) in tasks" :key="index" class="flex justify-between gap-x-6 py-5">
                                <div class="flex gap-x-4">
                                    <p class="text-md font-semibold leading-6 text-gray-900">{{ task.title }}
                                    </p>
                                    <p class="mt-1 text-s leading-5 text-gray-500">{{ task.description }}
                                    </p>
                                    <button @click="terminate(task)"
                                        class="rounded-md bg-red-600 px-3 py-2 text-sm font-semibold text-white shadow-sm hover:bg-red-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-red-600">Delete</button>
                                    <a :href="route('tasks.edit', task)"
                                        class="rounded-md bg-indigo-600 px-3 py-2 text-sm font-semibold text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">Edit</a>
                                </div>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </AppLayout>
</template>
