<template lang="">
    <div>
        <!-- CRUD TABLE -->
        <div>
            <!-- HEADER -->
            <div>
                <div class="flex justify-end">
                    <button class="bg-blue-500 hover:bg-blue-400 text-white mx-4 mt-4 px-4 py-2 rounded" @click="createTask()">New task</button>            
                </div>
            </div>
    
            <!-- BODY -->
            <div>            
                <div class="bg-white shadow-md rounded-lg overflow-hidden mx-4 mb-4 mt-2">
                <table class="min-w-full">
                    <!-- Table header -->
                    <thead>
                        <tr class="bg-gray-200">
                            <th class="py-2 px-4 text-gray-600 font-semibold uppercase">Task name</th>
                            <th class="py-2 px-4 text-gray-600 font-semibold uppercase">Detail</th>
                            <th class="py-2 px-4 text-gray-600 font-semibold uppercase">Deadline</th>
                            <th class="py-2 px-4 text-gray-600 font-semibold uppercase">Options</th>
                        </tr>
                    </thead>
                    <!-- Table content -->
                    <tbody class="text-center">
                        <tr v-for="task in tasks" :key="task.id" class="border-b border-gray-200 justify-center" >
                            <td class="py-2 px-4"> {{ task.Name }}</td>
                            <td class="py-2 px-4"> {{ task.Detail }} </td>
                            <td class="2 px-py-4"> {{ task.Deadline }} </td>
                            <td class="flex w-full content-center justify-center">
                                <!-- options column -->
                                <a href="#" @click.prevent="destroyTask(task.id)">
                                    <img class="m-2" src="https://www.shareicon.net/data/16x16/2015/10/03/650592_bucket_512x512.png" alt="Delete">
                                </a>
                                <a href="#" @click.prevent="editTask(task)">
                                    <img class="m-2" src="https://www.shareicon.net/data/16x16/2017/03/02/880216_settings_512x512.png" alt="See">
                                </a>
                                
                            </td>
                        </tr>                                        
                    </tbody>
                </table>
                </div>


            </div>

        </div>
        <!-- END CRUD TABLE -->

        <!-- MODAL -->
        <div>
            <div>                
            <modal :show="showModal" @close="{showModal=false;}">                

                <!-- Modal form content -->
                <template v-slot:content>
                    <div class="flex justify-center m-8">
                        <form @submit.prevent="submitTask()" class="flex-column w-full justify-center max-w-sm">
                            <div class="mb-4">

                                <!-- Input for the name, maximum 100 characters -->
                                <label class="block text-gray-700 text-sm font-bold mb-2" for="taskName">
                                Task Name
                                </label>
                                <input  class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" 
                                        v-model="form.Name" id="taskName" type="text" placeholder="Task Name"  maxlength="100">
                            </div>
                            <div class="mb-6">

                                <!-- Input for Details, maximum 500 characters -->
                                <label class="block text-gray-700 text-sm font-bold mb-2" for="details">
                                Details
                                </label>
                                <input  class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" 
                                        v-model="form.Detail" id="details" type="text" placeholder="Details"  maxlength="500">
                            </div>
                            <div class="mb-4">

                                <!-- Input for the deadline -->
                                <label class="block text-gray-700 text-sm font-bold mb-2" for="deadline">
                                Deadline
                                </label>
                                <input  class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" 
                                        v-model="form.Deadline" id="deadline" type="date">
                            </div>
            
                            <div class="flex justify-end">
                                <input class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline" 
                                        :value=" createForm ? 'Create' : 'Update' " type="submit">
                                
                            </div>
                        </form>

                    </div>
                </template>

                
                </modal>
            </div>
        </div>
        <!-- END MODAL -->
    </div>
</template>

<script>

import Modal from '@/Components/Modal.vue'

export default {

    components: {
        Modal,
    },

    props:{
        tasks: Array,
        user_id: Number,
    },

    data() {
        return {
            showModal: false, 
            createForm: true,
            form: {
                Name: null,
                Detail: null,
                Deadline:null,
                User_id: null,
            }      
        }
    },

    methods: {
        
        createTask(){

            // Local form will null in order to recive new data
            this.createForm = true
            this.form = {
                Name: null,
                Detail: null,
                Deadline:null,
                User_id: this.user_id,      // Send the current user_id
            }

            // it will show empty modal
            this.showModal = true;    
            
        },

        editTask(task){

            // Get the data to local variable
            this.createForm = false
            this.form = task
            
            
            // it will show modal with data
            this.showModal = true;            
            
        },

        destroyTask(id){
            if(confirm('Are you sure?')){
                this.$inertia.delete(this.route('tasks.destroy',id))
            }
        },

        submitTask() {        
            
            // This fuction could update or create a Task
            if(this.createForm == true){
                // Create a new task   
                this.$inertia.post(this.route('tasks.store'), this.form )
            } else {                           
                // Update the task
                this.$inertia.put(this.route('tasks.update',this.form.id),this.form)
            }

            // Close modal
            this.showModal = false;  
        },


    },
    
}
</script>