<template>
    <v-container>
        <v-toolbar flat color="primary" dark>
            <v-toolbar-title>Laporan / Aspirasi</v-toolbar-title>
        </v-toolbar>
       
            


         
                <!-- Pengaduan -->
                <form @submit="submit" enctype="multipart/form-data">
                    <v-text-field v-model="siapa" :error-messages="siapaErrors" label="Nama" required
                        @input="$v.siapa.$touch()" @blur="$v.siapa.$touch()"></v-text-field>
                    <v-select v-model="kabupaten_kota" :items="items" :error-messages="kabupaten_kotaErrors"
                        label="Kabupaten/Kota" required @change="$v.kabupaten_kota.$touch()"
                        @blur="$v.kabupaten_kota.$touch()"></v-select>


                    <v-textarea name="input-7-1" label="Laporan Pengaduan" :error-messages="laporanErrors"
                        v-model="laporan" required @input="$v.laporan.$touch()" @blur="$v.laporan.$touch()"
                        hint="Silakan tulis Laporan Anda"></v-textarea>

                    <!-- <form @submit="formSubmit" enctype="multipart/form-data"> -->
                    <strong>Bukti:</strong>

                    <input type="file" class="form-control" @change="onFileChange">

                    <v-checkbox v-model="checkboxAnonim" class="shrink mr-0 mt-0" label="Anonim"></v-checkbox>

                    <v-checkbox v-model="checkboxRahasia" class="shrink mr-0 mt-0" label="Rahasia"></v-checkbox>
                    <br><br>
                    <v-btn class="mr-4" @click="clear">clear</v-btn>
                    <v-btn  @click="submit">submit</v-btn>
                    
                </form>

                 <v-dialog
      v-model="dialog"
      persistent
      max-width="290"
    >
      
      <v-card>
        <v-card-title class="headline">
          Halo {{this.siapa}}
        </v-card-title>
        <v-card-text>Terimakasih atas laporan dan aspirasi nya :)</v-card-text>
        <v-card-actions>
          <v-spacer></v-spacer>
          
           
          
          <v-btn
            color="green darken-1"
            text
            @click="dialog = false"
          >
            Ok
          </v-btn>
        </v-card-actions>
      </v-card>
    </v-dialog>
            

        
    </v-container>


</template>


<script>
    import {
        validationMixin
    } from 'vuelidate'
    import {
        required,
        maxLength,
        email
    } from 'vuelidate/lib/validators'

    export default {
        mixins: [validationMixin],

        validations: {
            name: {
                required,
                maxLength: maxLength(10)
            },
            email: {
                required,
                email
            },
            select: {
                required
            },
            // judul: {required},
            siapa: {
                required
            },
            laporan: {
                required
            },
            kabupaten_kota: {
                required
            },
            checkbox: {
                checked(val) {
                    return val
                },
            },
        },

        data: () => ({
            file: null,
            // tabs,
            tabs: null,
            itemsKategori: [
                'Pengaduan', 'Aspirasi', 'Permintaan Informasi'
            ],
            text: 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.',
            name: '',
            // judul: '',
            siapa: '',
            laporan: '',
            kabupaten_kota: null,
            items: [
                'Banggai',
                'Banggai Kepulauan',
                'Banggai Laut',
                'Morowali',
                'Morowali Utara',
                'Poso',
                'Donggala',
                'Toli-toli',
                'Buol',
                'Parigi Moutong',
                'Tojo Una-una',
                'Sigi',
                'Palu'

            ],
            checkboxAnonim: false,
            checkboxRahasia: false,
            dialog: false
        }),

        computed: {
            kabupaten_kotaErrors () {
        const errors = []
        if (!this.$v.kabupaten_kota.$dirty) return errors
        !this.$v.kabupaten_kota.required && errors.push('Tidak boleh kosong')
        return errors
      },
      siapaErrors () {
        const errors = []
        if (!this.$v.siapa.$dirty) return errors
        !this.$v.siapa.required && errors.push('Tidak boleh kosong')
        return errors
      },
      laporanErrors () {
        const errors = []
        if (!this.$v.laporan.$dirty) return errors
        !this.$v.laporan.required && errors.push('Tidak boleh kosong')
        return errors
      },

      dialog_pertanyaan_x: {
                set(val) {
                    this.$store.state.dialog.dialog_pertanyaan = val
                },
                get() {
                    return this.$store.state.dialog.dialog_pertanyaan
                }
            },
             items_x: {
                set(val) {
                    this.$store.state.items.items = val
                },
                get() {
                    return this.$store.state.items.items
                }
            }
        },

        methods: {
            onFileChange(e) {

                console.log(e.target.files[0]);

                this.file = e.target.files[0];
                console.log('onfilechange this.file', this.file)

            },
           
            async submit(e) {
                e.preventDefault();
                let currentObj = this;
                const configx = {
                    headers: {
                        'content-type': 'multipart/form-data',
                        // 'x-csrf-token': document.querySelectorAll('meta[name=csrf-token]')[0].getAttributeNode('content').value,
                        //  Authorization: 'Bearer ' + localStorage.getItem('token')
                    }

                }
                let formData = new FormData();

                formData.append('file', this.file);
                     
                this.$v.$touch()


                if (
                    // this.judul === null ||
                    this.siapa === null ||
                    this.kabupaten_kota === null ||
                    this.laporan === null

                ) {
                    this.snackbar = true

                } else {



                    this.$store.state.loader = true;
                    formData.append('siapa', this.siapa)
                    formData.append('kabupaten_kota', this.kabupaten_kota)
                    formData.append('laporan', this.laporan)
                    formData.append('anonim', this.checkboxAnonim)
                    formData.append('rahasia', this.checkboxRahasia)

                    console.log('formdata sebelum submit', formData)
                    axios.defaults.headers.post['Content-Type'] = 'multipart/form-data';
                    await axios.post('/laporan', formData,
                        configx
                    )
                    
                    .then( response => {
                     console.log(response)
                    })
                    
                     await axios.get('/laporanslapor').then( response => {
                  console.log(response.data)
                  this.items_x = response.data
                  this.items_x = this.items_x.reverse()

                  console.log('items reversed', this.items_x)
                }).catch(error => {
                    alert(error);
                })
                    .then(
                        
                        this.items_x = this.items_x,
                        this.dialog_pertanyaan_x = false,
                        this.dialog = true
                    )

                    // this.clear()
                }
               

            },
            clear() {
                this.$v.$reset()
                // this.judul = ''
                this.siapa = ''
                this.laporan = ''
                this.kabupaten_kota = false
            },
        },
    }

</script>
