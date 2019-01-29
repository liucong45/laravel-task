<<template>
    <div class="instant-search">
        <form class="form-inline">
            <div class="input-group">
                <input type="text" v-model='searchStr' @focus="fetch" @blur="displayGroup" class="form-control" placeholder="--项目检索--" aria-label="search" aria-describedby="basic-addon1">
                <div class="input-group-prepend">
                    <span class="input-group-text" id="basic-addon1"><i class="fa fa-btn fa-search"></i></span>
                </div> 
            </div>
        </form>
        <ul class="list-group" v-if="show" >
            <li class="list-group-item" v-for="task in filtered" >
                <a :href="url(task)">{{task.name}}</a>
            </li>
        </ul>
    </div>
</template>
<script>
export default {
    data(){
        return {
            tasks:[],
            show:false,
            load:false,
            searchStr:'',
        }
    },
    props:{
        routeAll:String,
        // routeFrom:String,
    },
    computed:{
        filtered(){
            let search = this.searchStr.trim().toLowerCase()
            return this.tasks.filter((task)=>{
                if(task.name.trim().indexOf(search) != -1){
                    return true
                }
            })
        }
    },
    methods:{
        fetch(){
            if(this.load){
                this.show = true; 
            }else{
                axios.get(`${this.routeAll}`).then((res)=>{
                    this.tasks = res.data.tasks
                    this.show = true; 
                    this.load = true;
                })
            }
            
        },
        displayGroup(){
            setTimeout(()=>{
                this.show = false;
            },1000)             
        },
        url(task){
            return `/tasks/${task.id}/steps`
        },
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
