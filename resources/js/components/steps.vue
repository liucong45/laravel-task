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
                    <span @dblClick='edit(step)' >{{step.name}}</span> 
                    <i class="fa fa-check pull-right" @click='completaToggle(step)'></i>
                    <i class="fa fa-close pull-right" @click='remove(step)'></i>
                    </li>        
                </ul>
            </div>
        </div>
        <div class="card">
            <div class="card-header">
                <div class="from-group">
                    <label>当前任务增加步骤：</label>
                    <input type="text" v-model='newStep' ref='newStep' @keyup.enter="addStep" class=“form-control”>
                    <button v-if='newStep' type="button" class="btn btn-sm pull-right" @click='addStep'>提交</button>
                </div>
            </div>
            
        </div>
    </div>
    <div class="col-4 mb-4" v-if='process.length'>
        <div class="card">
            <div class="card-header">已完成的步骤：{{ process.length }}    
            <button class="btn btn-sm pull-right" @click='unCompletaAll()'>全部清除</button></div>
            <div class="card-body">
                <ul class="list-group">
                    <li class="list-group-item" v-for='(step,index) in process'>
                    @{{step.name}}
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
    export default {
        data(){
            return {
                steps:[
                    {name:'hollo word!',completion:false},
                    {name:'frist data!',completion:false},
                    {name:'end show!',completion:false},                
                    {name:'true task!',completion:true}
                ],
                newStep:''
            }
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
            addStep(){
                this.steps.push({name:this.newStep,completion:false})
                this.newStep=''
            },
            completaToggle(step){
                step.completion = !step.completion
            },
            remove(step){
                let i = this.steps.indexOf(step)
                this.steps.splice(i,1)
            },
            edit(step){
                this.remove(step)
                this.newStep = step.name
                this.$refs.newStep.focus()
            },
            completaAll(){
                this.inProcess.forEach(function(step){
                    step.completion = true
                })
            },
            unCompletaAll(){
                this.process.forEach(function(step){
                    step.completion = false
                })
            },            
        }
    }
</script>

<style>
</style>