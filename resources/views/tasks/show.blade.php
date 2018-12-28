@extends('layouts.app')

@section('content')
<div class="container" id='app'>
    <h3>{{$task->name}}</h3>
    <ul class="list-group">
        <li class="list-group-item" v-for='step in steps'>
        @{{step.name}}
        <i class="fa fa-check pull-right" @click='completa(step)'></i>
        </li>        
    </ul>
    <form class='form-inline' @submit.prevent='addStep'>
    <input type="text" v-model='newStep' @keyup.enter="addStep" class=“form-control”>
    <button type="button" class="btn btn-primary">添加步骤</button>
    </form>
    
</div>
    
@endsection

@section('javascript')
<script src="https://cdn.bootcss.com/vue/2.5.21/vue.js"></script>
<script>
    new Vue({
        el:'#app',
        data:{
            steps:[
                {name:'hollo word!',completion:false},
                {name:'frist data!',completion:false},
                {name:'end show!',completion:false}
            ],
            newStep:''
        },
        methods:{
            addStep(){
                this.steps.push({name:this.newStep,completion:false})
                this.newStep=''
            },
            completa(step){
                step.completion = true
                alert(step.name)
                alert(step.completion)
            }
        }
    })
</script>
@endsection