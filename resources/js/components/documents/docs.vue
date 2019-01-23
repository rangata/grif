<template>
    <b-card bg-variant="primary" header-text-variant="white" text-variant="black" body-bg-variant="white">
        <div class="so" slot="header">
            <h2>
                Документи
            </h2>
        </div>
    <b-container fluid>

        <div v-if="!loaded" class="spinner-grow text-secondary text-lg-center" role="status">
        </div>
        <h1 style="color: #000;" class="text-lg-center" v-show="!loaded">Зарежда</h1>
        <b-table :items="documents.data" :fields="columns" :show-empty="true">
            <template slot="documentPath" slot-scope="row">
                <a :href="row.item.documentPath.replace('public/','/storage/')">
                    Отвори
                </a>
            </template>
            <template slot="created_at" slot-scope="row">
                {{ row.item | moment("D.MM.Y")}}
            </template>
            <template slot="documentType" slot-scope="row">

                {{ correctDocumentTypeWithWords(row.item) }}
                <!--{{ row.item.correctDocumentTypeWithWordsor() }}-->
            </template>
            <template slot="actions" slot-scope="row">
                <b-btn variant="danger" @click="deleteFile(row.item.id)">
                    {{ row.item.id }}
                    <i class="fa fa-trash fa-2x" aria-hidden="true"></i>
                </b-btn>
            </template>
        </b-table>
    </b-container>
       <b-container>
           <upload-file :customerid="customer_id" @da="loadData" v-show="showUploadFile"></upload-file>
           <b-btn @click="showUploadFile = !showUploadFile">Качи</b-btn>
       </b-container>
    </b-card>
</template>

<script>
    import uploadFile from './UploadFile';

    export default {
        name: "docs",
        props: ['customerid'],
        components: {
            upd: uploadFile,
        },
        data() {
            return {
                customer_id: this.$props.customerid,
                documents: [],
                loaded: false,
                showUploadFile: false,
                columns: [
                    {
                      key:'documentType',
                      label:'Тип'
                    },
                    {
                      key:'documentPath',
                      label:'Връзка към файла'
                    },
                    {
                      key:'documentDate',
                      label:'Дата на документа'
                    },
                    {
                        key: 'created_at',
                        label: 'Качено на'
                    },
                    {
                        key: 'actions',
                        label: 'Действия'
                    }
                ]
            }
        },
        mounted () {
            this.loadData();
            // console.log("refs", this.$refs)
        },
        methods: {
            correctDocumentTypeWithWords(item) {
                switch (item.documentType) {
                    case "ppp":
                        return 'Приемо-предавателен протокол'
                        break;
                    case "contract":
                        return 'Договор';
                        break;

                    default:
                        return 'unknown'
                    break;
                }
            },

            clinkTo(link) {
                this.$swal("OK", {
                    timer: 1000,
                })
            },
            loadData() {
                axios.get('/api/contracts/' + this.customer_id + '/getContracts')
                    .then(
                        (data) => {

                            this.documents = data

                            this.loaded = true
                        }
                    )
            },
            deleteFile(file) {

                axios.delete('/api/contracts/' + file, {
                    data: {
                        id: file
                    }
                })
                    .then(
                        (data) => console.log(data)
                    )
                    .catch((er) => console.log(er))
            }
        },
        computed: {
            correctDocumentTypeWithWordsor(ite) {
                // console.log(ite)
            }
        }
    }
</script>

<style scoped>

</style>
