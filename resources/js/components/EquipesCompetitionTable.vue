<template>
    <div className="container">





        <div class="container-fluid mt--6">
            <div class="row">
                <div class="col">
                    <div class="card">
                        <!-- Card header -->
                        <div class="card-header border-0">
                            <h3 class="mb-0">Equipes</h3>
                            <b-button @click="getEquipes">Refresh equipes</b-button>
                        </div>
                        <!-- Light table -->
                        <div class="table-responsive">
                            <table class="table align-items-center table-flush">
                                <thead class="thead-light">
                                <tr>
                                    <th scope="col" class="sort" data-sort="id">#</th>
                                    <th scope="col" class="sort" data-sort="nom">nom</th>
                                    <th scope="col" class="sort" data-sort="niveau">Niveau <br><input type="text"  v-model="filters.niveau" size="5"></th>
                                    <th scope="col">Genre</th>
                                    <th scope="col">Categorie</th>
                                    <th scope="col">Individuel</th>

                                    <th scope="col">Code<br><input type="text"  v-model="filters.code_categorie" size="5"></th>


                                    <th scope="col">Actions</th>
                                </tr>
                                </thead>
                                <tbody class="list">



                                <tr v-for="line in filteredequipes">

                                    <td>{{line.id}}</td>
                                    <td>{{line.name}}</td>
                                    <td>{{line.niveau}}</td>
                                    <td>{{line.genre}}</td>
                                    <td>{{line.categorie}}</td>
                                    <td>{{line.individuel}}</td>

                                    <td>{{line.code_categorie}}</td>



                                    <td>
                                        <a class="btn btn-sm btn-success" :href="'equipes/'+ line.id " role="button" >
                                            What ?
                                        </a>
                                    </td>
                                </tr>





                                </tbody>
                            </table>
                        </div>
                        <!-- Card footer -->
                        <div class="card-footer py-4">
                            <nav aria-label="...">
                                <ul class="pagination justify-content-end mb-0">
                                    <li class="page-item disabled">
                                        <a class="page-link" href="#" tabindex="-1">
                                            <i class="fas fa-angle-left"></i>
                                            <span class="sr-only">Previous</span>
                                        </a>
                                    </li>
                                    <li class="page-item active">
                                        <a class="page-link" href="#">1</a>
                                    </li>
                                    <li class="page-item">
                                        <a class="page-link" href="#">2 <span class="sr-only">(current)</span></a>
                                    </li>
                                    <li class="page-item"><a class="page-link" href="#">3</a></li>
                                    <li class="page-item">
                                        <a class="page-link" href="#">
                                            <i class="fas fa-angle-right"></i>
                                            <span class="sr-only">Next</span>
                                        </a>
                                    </li>
                                </ul>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>







    </div>
        {filters}
    </div>
</template>

<script>
export default {
    props:{
      competition: []
    },
    methods:{
      test(){
          console.log('hi');
      },
      getEquipes(){
          axios.get('/api/competitions/'+ this.competition.id +'/equipes')
              .then((response)=>{
                  this.equipes = response.data.data
              })
      }
    },

    data: function () {
        return {
            equipes: [],
            filters:{},
        }
    },

    computed: {
        filteredequipes() {
            const filtered = this.equipes.filter(item => {
                return Object.keys(this.filters).every(key =>
                    String(item[key]).toLowerCase().includes(this.filters[key].toLowerCase()))
            })
            return filtered.length > 0 ? filtered : [{
                id: '',
                issuedBy: '',
                issuedTo: ''
            }]
        },
    },


    mounted() {
        console.log('Component mounted.')
        this.getEquipes();
    }
}
</script>
