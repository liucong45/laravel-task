<template>
    <div class="card">
        <div class="card-header">
            <div class="from-group">
                <label>当前任务增加步骤：</label>
                <input type="text" v-model='newStep' ref='newStep' @keyup.enter="addStep" class=“form-control”>
                <button v-if='newStep' type="button" class="btn btn-sm pull-right" @click='addStep'>提交</button>
            </div>
        </div>
        
    </div>
</template>

<script>
import { Hub } from '../event-bus'
export default {
    props:[
        'route'
    ],
    data(){
        return {
            'newStep':''
        }
    },
    created(){
        Hub.$on('edit',this.editStep)
    },
    methods:{
        addStep(){
            axios.post(this.route,{name:this.newStep}).then((res)=>{
                window.location.reload()
            })           
        },
        editStep(step){
            this.newStep = step.name
            this.$refs.newStep.focus()
        }
    }
}
</script>
