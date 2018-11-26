<template>

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
               <div class="card">
  <div class="card-body">
    <h5 class="card-title">{{task.id}}</h5>
    <input v-if='editmode' type="text" class="form-control" name='description' v-model='task.description'>
    <p v-else class="card-text">{{task.description}}</p>
    <a v-if='editmode' class="btn btn-success" @click='clickUpdate()'>Guardar Cambios</a>
    <a v-else  class="btn btn-info" @click='clickEdit()'>Editar</a>
    <a class="btn btn-danger" @click='clickDelete()'>Eliminar</a>
  </div>
</div>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
         props: ['task'],
        data(){
            return {
              
                editmode:false
               
            }
        },
        mounted() {
        },
        methods:{
            clickDelete(){
                axios.delete('/tasks/'+this.task.id).then(()=>{
                    this.$emit('delete')
                })
                
            },

            clickEdit(){
                this.editmode=true
            },

            clickUpdate(){
                 const params = {
              description: this.task.description,
              priority: this.task.priority
            }
                axios.put('/tasks/'+this.task.id, params).then((response)=>{
                    this.editmode=false
                const task = response.data
                this.$emit('update', task)
                })
                
            }
        }
    }
</script>
