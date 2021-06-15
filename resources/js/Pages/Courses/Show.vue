<script>
import AppLayout from "../../Layouts/AppLayout";

export default{

    //composant utiliser
    components:{
        AppLayout
    },

    //recuperation des donnees venant de variable tableau de PHP
    props:['course'],

    //insertion des donnee dans le state du composant
    data(){
        return{
            courseShow:this.course,
            currentKey:0
        }
    },

    //methode asynchrone qui attend
    methods:{
        switchEpisode(index){
            this.currentKey = index;

            window.scrollTo({
                top:0,
                left:0,
                behavior:'smooth'
            });
        }
    },

    //fonction qui sésexcute dans le cycle de vie
    mounted(){
        //console.log(this.course);
    }
}
</script>

<template>
    <app-layout>
        <template #header> <!-- #header indique que template sinsera dans un slot appeller header -->
            {{ courseShow.title }}
        </template>
        <div class="py-3 mx-8">
            <div class="text-2xl mt-3">{{courseShow.episodes[currentKey].title}}</div>

            <iframe class="w-full h-screen" :src="courseShow.episodes[currentKey].video_url" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen>
            
            </iframe>
            <div class="text-sm text-gray-500 mt-3">{{courseShow.episodes[currentKey].description}}</div>

            <div class="mt-6">
                <ul v-for="(episode,index) in courseShow.episodes" v-bind:key="episode.id">
                    <li class="mt-3">
                        Episode n` {{index + 1}} - {{episode.title}}
                        <button class="text-gray-500 focus:text-indigo-500 focus:outline-none" @click="switchEpisode(index)">
                            voir l'épisode
                        </button>
                    </li>
                </ul>
            </div>
        </div> 
    </app-layout>
</template>
