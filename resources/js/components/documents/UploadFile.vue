<template>
    <b-container fluid>
        <h1>
            Качване на файл

        </h1>
        <div class="mb-2">
            <label for="docType">Тип на документа</label>
            <select name="docType" id="docType" v-model="docType" class="form-control form-control-lg">
                <option value="ppp">
                    Приемо-предавателен
                </option>
                <option value="contract">
                    Договор
                </option>
                <option value="pft">
                    Протокол за обучение
                </option>
            </select>
            <label for="docDate">Дата на документа</label>
            <!--<input id="docDate" type="date" v-model="docDate" class="form-control form-control-lg">-->
            <date-picker v-model="date" :config="options"></date-picker>
            <div id="doe" v-show="docType">
                <vue-dropzone ref="myVueDropzone" id="dropzone"
                              @vdropzone-success="fileUploaded"
                              :useCustomSlot=true
                              v-on:vdropzone-sending="sendingEvent"
                              :options="dropzoneOptions">

                    <div class="dropzone-custom-content">
                        <h3 class="dropzone-custom-title">Провлачи файла и го пусни тук, за да се запамети!</h3>
                        <div class="subtitle">...или просто кликни върху този текст, за да го избереш директно от компютъра.</div>
                    </div>
                </vue-dropzone>
            </div>
            <br>
        </div>

    </b-container>
</template>

<script>
    import vue2Dropzone from 'vue2-dropzone'
    import docs from './docs';

    import 'vue2-dropzone/dist/vue2Dropzone.min.css'

    // Import this component
    import datePicker from 'vue-bootstrap-datetimepicker';

    // Import date picker css
    import 'pc-bootstrap4-datetimepicker/build/css/bootstrap-datetimepicker.css';

    export default {
        name: "UploadFile",
        props: ['customerid'],
        components: {
            vueDropzone: vue2Dropzone,
            datePicker,
            docscom: docs
        },
        data() {
            return {
                customer_id: this.$props.customerid,
                docType: '',
                docDate: '',
                date: new Date(),
                options: {
                    format: 'DD/MM/YYYY',
                    useCurrent: false,
                },
                showUploadArea: false,
                fileSuccessUpload: false,
                dropzoneOptions: {
                    url: '/api/contracts',
                    thumbnailWidth: 200,
                    addRemoveLinks: true,
                    dictDefaultMessage: "<i class='fa fa-cloud-upload'></i>UPLOAD ME"
                }
            }
        },
        mounted() {
        },
        methods: {
            dp() {
                this.$swal('ok').show();
            },
            refreshDocsData() {
                this.$emit('da','av')
                this.docType =''
                this.docDate =''
                this.$refs.myVueDropzone.removeAllFiles()
            },
          sendingEvent(file,xhttp,formData) {
                formData.append('documentPath', file)
                formData.append('documentType', this.docType)
                formData.append('documentDate', this.docDate)
                formData.append('customer_id', this.customer_id)
                this.refreshDocsData()
            },
            fileUploaded(file, response) {
              console.log("file",file)
              console.log("response",response)

                this.refreshDocsData()
            }
        }
    }
</script>

<style scoped>
    .dz-image {
        max-height: 250px;
    }
</style>
