<template>
<div class="row">
    <div class="col-4 mb-4">
        <step-list :route='route' :steps='inProcess' >
            <div class="card-header">待完成的步骤：({{inProcess.length}})
                <button class="btn btn-sm pull-right" type="button" @click='completaAll()'>全部完成</button>
            </div>
        </step-list>
        <step-input :route='route' ></step-input>
    </div>
    <div class="col-4 mb-4" v-if='process.length'>
        <step-list :route='route' :steps='process' >
            <div class="card-header">已完成的步骤：({{process.length}})    
            <button class="btn btn-sm pull-right" @click='unCompletaAll()'>全部清除</button></div>
        </step-list>
    </div>
</div>
</template>

<script>
import StepInfo from './step-input'
import { Hub } from '../event-bus'
import StepList from './step-list'
    export default {
        props:{
            route:String,
            initSteps:Array,
            inProcess:Array,
            process:Array,
        },
        components:{
            'step-input':StepInfo,
            'step-list':StepList,
        },
        data(){
            return {
                steps:this.initSteps,                
            }
        },
        created(){
            // this.fetchSteps()
            Hub.$on('remove',this.remove)
            Hub.$on('fetchSteps',this.fetchSteps)
        },
        methods:{
            fetchSteps(){
                
            },
            remove(step){
                let i = this.steps.indexOf(step)
                this.steps.splice(i,1)
            },            
            completaAll(){
                axios.post(`${this.route}/complete`,{completion:true}).then((res)=>{
                    window.location.reload()
                })                
            },
            unCompletaAll(){
                axios.post(`${this.route}/complete`,{completion:false}).then((res)=>{
                    window.location.reload()
                })       
            },
        }
    }
</script>

<style>
</style>