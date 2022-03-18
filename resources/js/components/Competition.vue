<template>
    <div className="container">

        <equipes-competition :competition="competition"></equipes-competition>



        <div class="container-fluid mt--6">
            <div class="row">
<!--                <div class="col-4">-->
<!--                    <div class="card">-->


<!--                        <b-form-group id="input-group-3" label="Catégories:" label-for="input-3">-->
<!--                            <b-form-select-->
<!--                                id="input-categ"-->
<!--                                v-model="form.categorie"-->
<!--                                :options="categories"-->
<!--                                required-->
<!--                            ></b-form-select>-->
<!--                        </b-form-group>-->



<!--                    </div>-->



<!--                </div>-->
<!--                <div class="col-4">-->
<!--                    <div class="card">-->

<!--                            <b-form-group id="input-group-3" label="Niveaux:" label-for="input-3">-->
<!--                                <b-form-select-->
<!--                                    id="input-niveau"-->
<!--                                    v-model="form.niveau"-->
<!--                                    :options="niveaux"-->
<!--                                    required-->
<!--                                ></b-form-select>-->
<!--                            </b-form-group>-->
<!--                        </div>-->
<!--                    </div>-->

            </div>






        </div>




    </div>
</template>

<script>
export default {
    props:{
        competition: {},
        niveaux: [],
        categories: []
    },
    data: function () {
        return {
            form: {}
        }
    },
    mounted() {
        console.log('Component mounted.')
    }
}
</script>
