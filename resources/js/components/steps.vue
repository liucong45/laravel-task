<template>
<div class="row">
    <div class="col-4 mb-4">
        <div class="card">
            <div class="card-header">
                待完成的步骤：({{ inProcess.length }})
            <button class="btn btn-sm pull-right" type="button" @click='completaAll()'>全部完成</button>
            </div>
            <div class="card-body">
                <ul class="list-group">
                    <li class="list-group-item" v-for='(step,index) in inProcess'>
                    <span @dblclick='edit(step)' >{{step.name}}</span> 
                    <i class="fa fa-check pull-right" @click='completaToggle(step)'></i>
                    <i class="fa fa-close pull-right" @click='remove(step)'></i>
                    </li>        
                </ul>
            </div>
        </div>
        <step-input :route='route' @add='sync'></step-input>
    </div>
    <div class="col-4 mb-4" v-if='process.length'>
        <div class="card">
            <div class="card-header">已完成的步骤：{{ process.length }}    
            <button class="btn btn-sm pull-right" @click='unCompletaAll()'>全部清除</button></div>
            <div class="card-body">
                <ul class="list-group">
                    <li class="list-group-item" v-for='(step,index) in process'>
                    {{step.name}}
                    <i class="fa fa-exclamation-triangle pull-right" @click='completaToggle(step)'></i>
                    <i class="fa fa-close pull-right" @click='remove(step)'></i>
                    </li>
                </ul>
            </div>
        </div>
    </div> 
</div> 
</template>

<script>
import StepInfo from './step-input'
import { Hub } from '../event-hus'
    export default {
        props:[
            'route'
        ],
        components:{
            'step-input':StepInfo
        },
        data(){
            return {
                steps:[
                    // {name:'hollo word!',completion:false},
                ],                
            }
        },
        created(){
            this.fetchSteps()
        },
        computed:{
            inProcess(){
                return this.steps.filter((step)=>{
                    return !step.completion
                })
            },
            process(){
                return this.steps.filter(function(step){
                    return step.completion
                })
            }

        },
        methods:{
            fetchSteps(){
               axios.get(this.route).then((res)=>{
                    this.steps = res.data
                }) 
            },
            sync(step){
                this.steps.push(step)
            },
            
            completaToggle(step){
                axios.put(`${this.route}/${step.id}`,{completion:!step.completion}).then((res)=>{
                    step.completion = !step.completion
                })                
            },
            remove(step){
                axios.delete(`${this.route}/${step.id}`).then((res)=>{
                    if(res.status){
                        let i = this.steps.indexOf(step)
                        this.steps.splice(i,1)
                    }            
                })                
            },
            edit(step){
                this.remove(step)
                // Hub.$emit('edit',step)                
            },
            completaAll(){
                axios.post(`${this.route}/complete`,{completion:true}).then((res)=>{
                    this.fetchSteps()
                })                
            },
            unCompletaAll(){
                axios.post(`${this.route}/complete`,{completion:false}).then((res)=>{
                    this.fetchSteps()
                })       
            },            
        }
    }
</script>

<style>
</style>