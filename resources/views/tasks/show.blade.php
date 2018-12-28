@extends('layouts.app')

@section('content')
<div class="container" id='app'>
    <h3>{{$task->name}}</h3>
    <ul class="list-group">
        <li class="list-group-item" v-for='step in steps'>@{{step.name}}</li>        
    </ul>
    <input type="text" v-model='newStep' @keyup.enter="addStep">
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
            }
        }
    })
</script>
@endsection