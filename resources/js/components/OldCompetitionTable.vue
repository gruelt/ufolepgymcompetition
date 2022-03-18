<template>
    <div className="container">





        <div class="container-fluid mt--6">
            <div class="row">
                <div class="col">
                    <div class="card">
                        <!-- Card header -->
                        <div class="card-header border-0">
                            <h3 class="mb-0">Compétitions</h3>
                        </div>
                        <!-- Light table -->
                        <div class="table-responsive">
                            <table class="table align-items-center table-flush">
                                <thead class="thead-light">
                                <tr>
                                    <th scope="col" class="sort" data-sort="name">#</th>
                                    <th scope="col" class="sort" data-sort="budget">Lieu</th>
                                    <th scope="col" class="sort" data-sort="status">Type</th>
                                    <th scope="col">Département</th>
                                    <th scope="col" class="sort" data-sort="completion">Date</th>
                                    <th scope="col">Equipes</th>
                                    <th scope="col">Actions</th>
                                </tr>
                                </thead>
                                <tbody class="list">



                                <tr v-for="line in data">

                                    <td>{{line.numCompet}}</td>
                                    <td>{{line.lieuCompet}}</td>
                                    <td>{{line.typeCompet}}</td>
                                    <td>{{line.depCompet}}</td>
                                    <td>{{line.dateCompet}}</td>

                                    <td></td>

                                    <td>
                                        <a class="btn btn-sm btn-success" :href="'old-competitions/'+ line.numCompet + '/import'" role="button" >
                                            <i class="fas fa-ellipsis-v">Importer</i>
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

    </div>
</template>

<script>
export default {
    props:{
      data: []
    },

    mounted() {
        console.log('Component mounted.')
    }
}
</script>
