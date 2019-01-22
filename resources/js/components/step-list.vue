<template>
    <div class="card">
        <slot></slot>
        
        <div class="card-body">
            <ul class="list-group">
                <li class="list-group-item" v-for='(step,index) in steps'>
                <span @dblclick='edit(step)' >{{step.name}}</span> 
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
    methods:{
        completaToggle(step){
            axios.put(`${this.route}/${step.id}`,{completion:!step.completion}).then((res)=>{
                step.completion = !step.completion
            })                
        },
        remove(step){
            axios.delete(`${this.route}/${step.id}`).then((res)=>{
                if(res.status){
                    Hub.$emit('remove',step)
                }            
            })                
        },
        edit(step){
            this.remove(step)
            Hub.$emit('edit',step)         
        },        
    }
}
</script>