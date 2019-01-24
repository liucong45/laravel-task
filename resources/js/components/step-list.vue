<template>
    <div class="card">
        <slot></slot>
        
        <div class="card-body">
            <ul class="list-group">
                <li class="list-group-item" v-for='(step,i) in steps'>
                <span @dblclick='edit(step,i)' ref="stepName" >{{step.name}} </span>
                <input type="text" v-model="editedStep" ref="stepInput" @keyup.enter="update(step)" style="display:none">
                <i class="fa fa-check pull-right" @click='completaToggle(step)'></i>
                <i class="fa fa-close pull-right" @click='remove(step)'></i>
                </li>        
            </ul>
        </div>
    </div>
</template>

<script>
import { Hub } from '../event-bus'
export default {
    props:{
        steps:Array,
        route:String,
    },
    data(){
        return {
            editedStep:'',
        }
    },
    methods:{
        completaToggle(step){
            axios.put(`${this.route}/${step.id}/toggle`,{completion:!step.completion}).then((res)=>{
                window.location.reload()
            })                
        },
        remove(step){
            axios.delete(`${this.route}/${step.id}`).then((res)=>{
                if(res.status){
                    Hub.$emit('remove',step)
                }            
            })                
        },
        edit(step,i){
            this.$refs.stepName[i].style.display='none'
            this.$refs.stepInput[i].style.display='block'
            this.editedStep = step.name
        },
        update(step){
            axios.put(`${this.route}/${step.id}`,{name:this.editedStep}).then((res)=>{
                window.location.reload()
            })  
        }      
    }
}
</script>