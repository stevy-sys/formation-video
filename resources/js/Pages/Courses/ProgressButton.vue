<template>
    <div>
        <button v-bind:class="this.isWatched ? 'bg-green-500 px-2 py-2 text-white rounded' : 'bg-red-500 px-2 py-2 text-white rounded'" @click="toggleProgress()">
            {{isWatched ? 'achever' : 'non achever'}}
        </button>
    </div>
</template>

<script>
export default {
    props:['episodeId',"watchedEpisodes"],

    data(){
        return{
            watchEp:this.watchedEpisodes,
            isWatched:null
        }
    },

    methods:{
        toggleProgress(){
            axios.post('/toggleProgress',{
                episodeId:this.episodeId,
            }).then(response => {
                if (response.status === 200) {
                    this.isWatched = !this.isWatched
                }
            }).catch(error => {
                console.log(error);
            })
        },
        isWatchedEpisode(){
            return this.watchEp.find(element => element.id === this.episodeId) === true ? true : false;
        }
    },

    mounted(){
        this.isWatched = this.isWatchedEpisode();
    }
}
</script>