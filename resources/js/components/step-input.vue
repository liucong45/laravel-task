<template>
    <div class="card">
        <div class="card-header">
            <div class="from-group">
                <label>当前任务增加步骤：</label>
                <form method='POST' :action="route" >
                <csrf-token></csrf-token>
                <input type="text" name="name" class=“form-control”>
                <button type="submit" class="btn btn-sm pull-right" >提交</button>
                </form>
            </div>
        </div>        
    </div>
</template>

<script>
import csrfToken from './csrf-token'

export default {
    props:[
        'route'
    ],
    components:{
        'csrf-token':csrfToken,
    },
}
</script>
