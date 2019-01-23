<template>
    <b-card bg-variant="primary" text-variant="white" body-bg-variant="white">
            <div class="so" slot="header">
                <h2>
                    Апаратура закупена от нас
                </h2>
            </div>
      <b-container fluid>
          <div v-if="!isDataLoaded" class="spinner-grow text-secondary text-lg-center" role="status">
              <span class="sr-only">Loading...</span>
          </div>
          <h1 style="color: #000;" class="text-lg-center" v-show="!isDataLoaded">Зарежда</h1>

          <b-table :items="goods" :show-empty="true"></b-table>
      </b-container>
    </b-card>
</template>

<script>
    export default {
        name: "goods",
        props: ['customerid'],
        data() {
            return {
                goods: [],
                isDataLoaded: false
            }
        },
        mounted() {
            this.loadGoodsData();
        },
        methods: {
            loadGoodsData() {
                axios.get('/api/goods/' + this.$props.customerid)
                    .then(
                        (data) => {
                            this.goods = data.data
                            this.isDataLoaded = true
                        }
                    )
            },

        }
    }
</script>

<style scoped>

</style>
