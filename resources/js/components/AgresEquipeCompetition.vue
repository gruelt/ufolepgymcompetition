<template>
    <div className="container">
        <div class="card">

            <div class="card-header border-0">
                <h3 class="mb-0">{{equipe.slug}} - {{equipe.name}}</h3>
                 <h4> {{agres.name}} - {{juges.nb_juges}} Juges</h4>

            </div>
            <table>

                <tr>
                    <th scope="col" class="sort" data-sort="id">Nom</th>
                    <th scope="col" class="sort" data-sort="nom">Prénom</th>
                    <th scope="col" class="sort" data-sort="niveau">Année</th>
                    <th scope="col" class="sort" data-sort="niveau">Licence</th>
                    <th scope="col">Note Départ</th>
                    <th scope="col" v-for="juge in juges.nb_juges">Juge {{juge}}</th>





                    <th scope="col">Note</th>
                </tr>


                <tr v-for="gymnaste in equipe.gymnastes">

                    <td>{{gymnaste.nom}}</td>
                    <td> {{gymnaste.prenom}}</td>
                    <td>{{gymnaste.annee}}</td>
                    <td>{{gymnaste.licence}}</td>
                    <td>
                        <span v-if="gymnaste.agres_competition[0]" >{{gymnaste.agres_competition[0].note_depart}}</span>
                        <span v-else>
                            0
                        </span>
                    </td>
                    <td v-for="juge in juges.nb_juges">
                        <span v-if="gymnaste.agres_competition[0] && gymnaste.agres_competition[0].notes && gymnaste.agres_competition[0].notes[juge]">
                            {{gymnaste.agres_competition[0].notes[juge].penalite}}
                        </span>
                        <span v-else>
                            0
                        </span>
                    </td>
                </tr>
            </table>
        </div>
    </div>
</template>

<script>
export default {
    props: {
        competition: Object,
        agres: Object,
        equipe:Object,
        juges: Object
    },
    methods:{

    },

    data: function () {
        return {
            filters:{}
        }
    },

    computed: {

    },


    mounted() {
        console.log('Component mounted.')

    }
}
</script>
