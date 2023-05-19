<script setup>
import AppLayout from '@/Layouts/AppLayout.vue';
import TaskManager from '@/Components/TaskManager.vue';
</script>

<template>
    <AppLayout title="Dashboard">
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                Task Manager
            </h2>
        </template>

        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">                
                    <TaskManager v-bind:tasks="tasks" v-bind:user_id="user_id"/>
                </div>
            </div>
        </div>
    </AppLayout>
</template>

<script>

export default {

    props:{
        tasks: Array,
        user_id: Number,
    }

}
</script>

