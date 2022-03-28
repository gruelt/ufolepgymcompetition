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


                <tr v-for="(gymnaste,index) in equipe.gymnastes">

                    <td>{{gymnaste.nom}} </td>
                    <td> {{gymnaste.prenom}}</td>
                    <td>{{gymnaste.annee}}</td>
                    <td>{{gymnaste.licence}}</td>
                    <td>
                        <span v-if="gymnaste.agres_competition[0]" ><input size="3"  @keypress="navbykey($event,0,index)" :ref="'note_0_'+index" :value="gymnaste.agres_competition[0].note_depart"/></span>

                        <span v-else>
                            <input size="3" @keypress="navbykey($event,0,index)" :ref="'note_0_'+index" value=""/>
                        </span>
                    </td>
                    <td v-for="juge in juges.nb_juges">
                        <span v-if="gymnaste.agres_competition[0] && gymnaste.agres_competition[0].notes && gymnaste.agres_competition[0].notes[juge]">
<!--                            {{gymnaste.agres_competition[0].notes[juge].penalite}}-->
                            <input size="3"  @keypress="navbykey($event,juge,index)" :ref="'note_'+ juge + '_'+ index" :value="gymnaste.agres_competition[0].notes[juge].penalite"/>
                        </span>
                        <span v-else>
                            <input size="3"  @keypress="navbykey($event,juge,index)" :ref="'note_'+ juge + '_'+ index" value=""/>
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

        navbykey: function (event, x , y)
        {
            // event.preventDefault();
            console.log(event);
            if(event.key=='Enter')
            {
                console.log(y );
                console.log(this.$refs.note_1_1[0]);
                // this.$refs.note_1_1[0].focus();

                let coordX = x+1;
                let coordY =  y;

                if(coordX > this.juges.nb_juges)
                {
                    coordX = 0;
                    coordY++;
                    if(coordY > this.equipe.gymnastes.length-1)
                    {
                        coordY=0;
                    }
                }


                this.$refs["note_" + coordX + "_" + coordY ][0].focus();

            }
        }

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
