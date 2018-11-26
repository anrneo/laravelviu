<template>
<div class="container">
 <div class="row justify-content-center">
            <div class="col-md-8">
    <form @submit.prevent='newTask()' action="">
  <div class="form-group">
    <label for="exampleInputEmail1">Nueva Tarea</label>
    <input type="text" class="form-control" name='description' v-model='description'  id="exampleInputEmail1" aria-describedby="emailHelp" required>
  </div>
  <div class="form-group">
    <label for="exampleInputPassword1">Prioridad</label>  
    <select class="form-control" id="exampleFormControlSelect1" name='priority' v-model='priority' required>
      <option selected value='1'>1</option>
      <option value='2'>2</option>
      <option value='3'>3</option>
      <option value='4'>4</option>
      <option value='5'>5</option>
    </select>
  </div>
  
  <button type="submit" class="btn btn-primary">Crear</button>
</form>
</div>
</div>
</div>
</template>

<script>
    export default {
      data(){
        return {
          description:'',
          priority:''
        }
      },
        mounted() {
        },
        methods:{
          newTask(){
            const params = {
              description: this.description,
              priority: this.priority
            }
            axios.post('/tasks', params).then((response)=>{
                let task = response.data
                this.$emit('new', task)
              this.description=''
              
            })
              
              
          }
    }
    }
</script>
