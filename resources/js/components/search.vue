<<template>
    <div class="instant-search">
        <form class="form-inline">
            <div class="input-group">
                <input type="text" @focus="fetch" @blur="displayGroup" class="form-control" placeholder="--项目检索--" aria-label="search" aria-describedby="basic-addon1">
                <div class="input-group-prepend">
                    <span class="input-group-text" id="basic-addon1"><i class="fa fa-btn fa-search"></i></span>
                </div> 
            </div>
        </form>
        <ul class="list-group" v-if="show" >
            <li class="list-group-item" v-for="task in tasks" >{{task.name}}</li>
        </ul>
    </div>
</template>
<script>
export default {
    data(){
        return {
            tasks:[],
            show:false,
        }
    },
    props:{
        routeAll:String,
        // routeFrom:String,
    },
    methods:{
        fetch(){
            axios.get(`${this.routeAll}`).then((res)=>{
                this.tasks = res.data.tasks
                this.show = true; 
            })
        },
        displayGroup(){
            this.show = false; 
        }
    },  
}
</script>
<style lang="scss">
    .instant-search{
        height:3rem;
        z-index:1000;

        .search-list{
            max-height:10em;
            overflow:auto;
        }
    }
</style>
