<template>
    <app-layout>
        <template #header> <!-- #header indique que template sinsera dans un slot appeller header -->
            Liste des formations
        </template>
        <div class="py-3" v-for="course in this.courseList" v-bind:key="course.id">
            <div class="mx-8 bg-white rounded shadow p-4">
                <div class="text-sm text-gray-500">Mis en ligne par {{ course.user.name }}</div>
                <div class="flex  justify-between items-center">
                    <div class="text-4xl">{{course.title}}</div> 
                    <div>{{course.episodes_count}} episode</div>
                </div>
                <div class="text-sm text-gray-500 mt-3">{{course.description}}</div>
                <jet-nav-link  :href="route('courses.show', course.id)" > 
                    <div class="bg-indigo-500 text-white px-2 py-1 text-sm mt-3 rounded hover:bg-indigo-700">voir la formation</div> 
                </jet-nav-link>
            </div>
        </div> 
    </app-layout>
</template>

<script>
import AppLayout from "../../Layouts/AppLayout";
import JetNavLink from "@/Jetstream/NavLink";

export default{

    //composant utiliser
    components:{
        JetNavLink,
        AppLayout
    },

    //recuperation des donnees venant de variable tableau de PHP
    props:['courses'],

    //insertion des donnee dans le state du composant
    data(){
        return{
            courseList:this.courses
        }
    },

    //fonction qui sésexcute dans le cycle de vie
    mounted(){
        console.log(this.courseList);
    }
}
</script>
