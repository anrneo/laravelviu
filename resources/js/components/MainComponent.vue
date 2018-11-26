<template>
<div class="container">

   <form-component
   @new='addTask'>
   </form-component>
   
    <table-component 
      v-for='(task, index) in tasks'
      :key='task.id'
      :task='task'
      @update='updateTask(index, ...arguments)'
      @delete='deleteTask(index)'>
      </table-component>
</div>
</template>

<script>
    export default {
      data(){
        return {
           
          tasks:[]
        }
      },
        mounted() {
          axios.get('/tasks').then((response)=>{
            this.tasks = response.data
          })
        },
        methods:{
          addTask(task) {
            this.tasks.push(task)
          },
          updateTask(index, task){
           
            this.tasks[index]=task
          },

          deleteTask(index){
            this.tasks.splice(index,1)
          }
        
        
        }
    }
</script>
