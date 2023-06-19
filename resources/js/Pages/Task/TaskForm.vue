<script setup>
import AppLayout from "@/Layouts/AppLayout.vue";
import { useForm } from "@inertiajs/vue3";

const props = defineProps({
    task: {
        type: Object,
        default: null, //set the object as the props
    }
});

const form = useForm({
    title: props.task ? props.task.title : null, //Choose if the object set available, if available get for update, else for create new
    description: props.task ? props.task.description : null,

});

function submit() {
    props.task ? form.put('/tasks/' + props.task.id) : form.post('/tasks');
}

</script>

<template>
    <AppLayout title="Dashboard">
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                Create Task in To Do List
            </h2>
        </template>

        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                    <div class="max-w-6xl mx-auto sm:px-6 lg:px-8">
                        <form>
                            <div class="space-y-12">
                                <div class="border-b border-gray-900/10 pb-12">
                                    <div class="mt-10 grid grid-cols-1 gap-x-6 gap-y-8 sm:grid-cols-6">
                                        <div class="sm:col-span-4">
                                            <label for="title"
                                                class="block text-sm font-medium leading-6 text-gray-900">Title</label>
                                            <div class="mt-2">
                                                <div
                                                    class="flex rounded-md shadow-sm ring-1 ring-inset ring-gray-300 focus-within:ring-2 focus-within:ring-inset focus-within:ring-indigo-600 sm:max-w-md">
                                                    <input v-model="form.title"
                                                        class="block flex-1 border-0 bg-transparent py-1.5 pl-1 text-gray-900 placeholder:text-gray-400 focus:ring-0 sm:text-sm sm:leading-6" />
                                                </div>
                                                <div v-if="form.errors.title">
                                                    {{ form.errors.title }}
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-span-full">
                                            <label for="description"
                                                class="block text-sm font-medium leading-6 text-gray-900">Description</label>
                                            <div class="mt-2">
                                                <textarea v-model="form.description"
                                                    class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6"></textarea>
                                                <div v-if="form.errors.description">
                                                    {{ form.errors.description }}
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="mt-6 flex items-center justify-end gap-x-6">
                                <a :href="route('tasks.index')"
                                    class="text-sm font-semibold leading-6 text-gray-900">Cancel</a>
                                <button @click="submit()" type="submit" :disabled="form.processing"
                                    class="rounded-md bg-indigo-600 px-3 py-2 text-sm font-semibold text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">
                                    {{ task ? "Update" : "Create" }}</button>
                            </div>
                            <br>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </AppLayout>
</template>
