<template>
<b-card bg-variant="primary" text-variant="white" body-bg-variant="white" header-text-variant="white">
    <div class="slo" slot="header">
        <h3>
            Фирмена информация
        </h3>
    </div>
    <b-card-body style="color: #000;">
        <b-table :items="companyInfo" :fields="fields">
            <template slot="updated_at" slot-scope="row">
                {{ row.item.updated_at | moment("DD.MM.YYYY")}}
            </template>
        </b-table>
    </b-card-body>
</b-card>
</template>

<script>
    export default {
        name: "company-partial",
        props: ['customerid'],
        data() {
            return {
                customer_id: this.$props.customerid,
                companyInfo: [],
                // company_name
                // company_address
                // company_phone
                // company_bulstat
                // company_mol
                fields: [
                    {
                        key: 'company_name',
                        label: 'Фирма'
                    },

                    {
                        key: 'company_address',
                        label: 'Адрес'
                    },
                    {
                        key: 'company_bulstat',
                        label: 'Булстат'
                    },

                    {
                        key: 'company_mol',
                        label: 'МОЛ'
                    },
                    {
                        key: 'updated_at',
                        label: 'Последна промяна'
                    }

                ]
            }
        },
        mounted() {
            this.loadCompanyInfo()
        },
        methods: {
            loadCompanyInfo(){
                axios.get('/api/companies/' + this.customer_id + '/getDetails')
                    .then(
                        (data) => {
                            this.companyInfo = data.data
                        }
                    )
                    .catch(
                        (er) => console.log(er)

                    )
            }
        }
    }
</script>

<style scoped>

</style>
