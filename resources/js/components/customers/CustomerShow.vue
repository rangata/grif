<template>
    <b-container fluid>
        <b-card>
            <h3>
                Customer Show
            </h3>
            {{ tabIndex }}
            <b-tabs v-model="tabIndex">
                <b-tab title="Закупена стока" :title-link-class="linkClass(0)">
                    <goods :customerid="customer_id"></goods>
                </b-tab>
                <b-tab title="Документи" :title-link-class="linkClass(1)">
                    <docs :customerid="customer_id"></docs>
                </b-tab>
                <b-tab title="Фирми / търговска информация" :title-link-class="linkClass(2)">
                    <company-partial :customerid="customer_id"></company-partial>
                </b-tab>
            </b-tabs>

            <br>

            <br>


        </b-card>
    </b-container>
</template>

<script>
    export default {
        name: "CustomerShow",
        props: ['customerid'],
        data() {
            return {
                customer_id: this.$props.customerid,
                tabIndex: 0
            }
        },
        methods: {
            linkClass(idx) {
                if (this.tabIndex === idx) {
                    return ['bg-primary', 'text-light']
                } else {
                    return ['bg-light', 'text-info']
                }
            }
        }
    }
</script>

<style scoped>

</style>
