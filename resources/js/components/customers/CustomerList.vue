<template>
    <b-row>
        <Sidebar></Sidebar>
        <br><br>
        <div class="spinner-border" role="status" v-if="!isDataLoaded">
            <span class="sr-only">Loading...</span>
        </div>
        <h1 style="color: #000;" class="text-lg-center" v-show="!isDataLoaded">Зарежда</h1>

        <b-col md="6" class="my-1">
            <b-form-group horizontal label="Filter" class="mb-0">
                <b-input-group>
                    <b-form-input v-model="filterTerm" placeholder="Type to Search" />
                    <b-input-group-append>
                        <b-btn :disabled="!filterTerm" @click="filterTerm = ''">Clear</b-btn>
                    </b-input-group-append>
                </b-input-group>
            </b-form-group>
        </b-col>
        <b-pagination
            :per-page="customers.per_page"
            v-model="customers.current_page"
            :current-page="customers.current_page"
            @input="loadNext"
            :total-rows="customers.total"
        >
        </b-pagination>
        <b-table :items="customers.data"
                 :fields="columns"
                 :show-empty="true"
                 :sortable="true"
                 :filter="filterTerm" @filtered="onFiltered" striped>
            <template slot="actions" slot-scope="row">
                <b-btn-group>
                    <b-btn :href="'/customers/' + row.item.id">
                        <i class="fa fa-eye fa-2x" aria-hidden="true"></i>
                    </b-btn>
                    <b-btn :href="'/customers/' + row.item.id + '/edit'" variant="success">
                        <i class="fa fa-pen fa-2x" aria-hidden="true"></i>
                    </b-btn>
                    <b-btn :href="'/customers/' + row.item.id + '/edit'" variant="danger">
                        <i class="fa fa-trash fa-2x" aria-hidden="true"></i>
                    </b-btn>
                </b-btn-group>
            </template>
        </b-table>

    </b-row>

</template>

<script>
    export default {
        name: "CustomerList",
        data() {
            return {
                customers: [],
                isDataLoaded: false,
                columns: [
                    {
                        key: 'firstname',
                        label: 'Име'
                    },
                    {
                        key: 'lastname',
                        label: 'Фамилия'
                    },
                    {
                        key: 'city',
                        label: 'Град'
                    },
                    {
                        key: 'mobile',
                        label: 'Мобилен'
                    },
                    {
                        key: 'phone',
                        label: 'Телефон 2'
                    },
                    {
                        key: 'actions',
                        label: ''
                    }
                ],
                filterTerm: null
            }
        },
        mounted() {
            this.loadcustomersData();
        },
        methods: {
            loadNext () {
                this.isDataLoaded = !this.isDataLoaded;
                axios.get('/api/customers?page=' + this.customers.current_page)
                    .then(
                        (data) => {
                            this.customers = data.data
                            this.isDataLoaded = true;
                        }
                    )
            },
            onFiltered() {
                return 'ok'
            },
            loadcustomersData() {
                axios.get('/api/customers')
                    .then((d) => {
                        if(d.current_page !== 0){
                            this.customers = d.data;
                        }
                        this.isDataLoaded = true;
                    })
                    .catch((e) => console.log(e))
            },

        },
        computed: {
            pageLink () {
                // this.customers = this.linkGen(this.currentPage);
                return this.linkGen(this.currentPage)
            }
        }
    }
</script>

<style scoped>

</style>
