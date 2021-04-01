<template>
    <v-container>

        <form>
            <v-list three-line subheader>
                <!-- <v-list-item>
                    <v-list-item-content>
                        <v-list-item-title>Judul</v-list-item-title>
                        <v-list-item-subtitle>{{item.judul}}</v-list-item-subtitle>
                    </v-list-item-content>
                </v-list-item> -->
                <!-- <v-list-item>
                    <v-list-item-content>
                        <v-list-item-title>Kabupten/Kota</v-list-item-title>
                        <v-list-item-subtitle>{{item.judul}}</v-list-item-subtitle>
                    </v-list-item-content>
                </v-list-item> -->
                <v-list-item>
                    <v-list-item-content>
                        <v-list-item-title>Nama</v-list-item-title>
                        <v-list-item-subtitle>{{item.siapa}}</v-list-item-subtitle>
                    </v-list-item-content>
                </v-list-item>

                <v-list-item>
                    <v-list-item-content>
                        <v-list-item-title>Kabupaten/Kota</v-list-item-title>
                        <v-list-item-subtitle v-if="item.kabupaten_kota_id == 1 ">Banggai
                        </v-list-item-subtitle>

                        <v-list-item-subtitle v-if="item.kabupaten_kota_id == 2 ">Banggai Kepulauan
                        </v-list-item-subtitle>

                        <v-list-item-subtitle v-if="item.kabupaten_kota_id == 3 ">Banggai Laut
                        </v-list-item-subtitle>

                        <v-list-item-subtitle v-if="item.kabupaten_kota_id == 4 ">Buol
                        </v-list-item-subtitle>

                        <v-list-item-subtitle v-if="item.kabupaten_kota_id == 5 ">Donggala
                        </v-list-item-subtitle>

                        <v-list-item-subtitle v-if="item.kabupaten_kota_id == 6 ">Morowali
                        </v-list-item-subtitle>

                        <v-list-item-subtitle v-if="item.kabupaten_kota_id == 7 ">Morowali Utara
                        </v-list-item-subtitle>

                        <v-list-item-subtitle v-if="item.kabupaten_kota_id == 8 ">Parigi Moutong
                        </v-list-item-subtitle>

                        <v-list-item-subtitle v-if="item.kabupaten_kota_id == 9 ">Poso
                        </v-list-item-subtitle>

                        <v-list-item-subtitle v-if="item.kabupaten_kota_id == 10 ">Sigi
                        </v-list-item-subtitle>

                        <v-list-item-subtitle v-if="item.kabupaten_kota_id == 11 ">Tojo Una-una
                        </v-list-item-subtitle>

                        <v-list-item-subtitle v-if="item.kabupaten_kota_id == 12 ">Toli-toli
                        </v-list-item-subtitle>

                        <v-list-item-subtitle v-if="item.kabupaten_kota_id == 13 ">Palu
                        </v-list-item-subtitle>
                    </v-list-item-content>


                </v-list-item>

                

                 <v-list-item>
                    <v-list-item-content>
                        <v-list-item-title>Laporan</v-list-item-title>
                        <v-list-item-subtitle>{{item.laporan}}</v-list-item-subtitle>
                    </v-list-item-content>
                </v-list-item>


            </v-list>
            <v-textarea name="input-7-1" label="Jawaban" :error-messages="jawabanErrors" v-model="jawaban"
                required @input="$v.jawaban.$touch()" @blur="$v.jawaban.$touch()"
                hint="Silakan tulis jawaban Anda"></v-textarea>

            <v-btn class="mr-4" @click="submit">submit</v-btn>
            <v-btn @click="clear">clear</v-btn>
        </form>



    </v-container>

</template>

<script>

  import { validationMixin } from 'vuelidate'
  import { required, maxLength, email } from 'vuelidate/lib/validators'

  export default {
    props: ['item'],
    mixins: [validationMixin],

    validations: {
      name: { required, maxLength: maxLength(10) },
      email: { required, email },
      select: { required },
      // judul: {required},
      siapa: {required},
      jawaban: {required},
      kabupaten_kota: {required},
      checkbox: {
        checked (val) {
          return val
        },
      },
    },

    data: () => ({
      name: '',
      // judul: '',
      siapa: '',
      jawaban: '',
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
      checkbox: false,
    }),

    computed: {
      
      kabupaten_kotaErrors () {
        const errors = []
        if (!this.$v.kabupaten_kota.$dirty) return errors
        !this.$v.kabupaten_kota.required && errors.push('Tidak boleh kosong')
        return errors
      },
      // judulErrors () {
      //   const errors = []
      //   if (!this.$v.judul.$dirty) return errors
      //   !this.$v.judul.required && errors.push('Tidak boleh kosong')
      //   return errors
      // },
      siapaErrors () {
        const errors = []
        if (!this.$v.siapa.$dirty) return errors
        !this.$v.siapa.required && errors.push('Tidak boleh kosong')
        return errors
      },
      jawabanErrors () {
        const errors = []
        if (!this.$v.jawaban.$dirty) return errors
        !this.$v.jawaban.required && errors.push('Tidak boleh kosong')
        return errors
      },
      dialog_jawaban_x: {
                set(val) {
                    this.$store.state.dialog.dialog_jawaban = val
                },
                get() {
                    return this.$store.state.dialog.dialog_jawaban
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
    mounted(){
      this.jawaban = this.item.jawaban
      console.log(this.jawaban, 'jawaban')
      console.log(this.item)
    },

    methods: {
      async submit () {
        this.$v.$touch()

       
                if (
                   this.jawaban == null

                ) {
                    this.snackbar = true

                } else {
                    
                    

                    this.$store.state.loader = true;
                    await axios.post('/jawaban', {
                            id: this.item.id,
                          
                    jawaban: this.jawaban 
                        })
                        .then( (response) => {
                            console.log(response);
                             
                        })
                        
                   
                    
                    this.dialog_jawaban_x = false
                  this.clear()

                await axios.get('/laporans').then( (response) => {
                  console.log(response.data)
                  this.items_x = response.data
                  this.items_x = this.items_x.reverse()
                }).catch(error => {
                    alert(error);
                })
                  // this.item = this.item.reverse()
                  // console.log('item reverse setelah submit', this.item)
                }

      },
      clear () {
        this.$v.$reset()
        // this.judul = ''
        this.siapa = ''
        this.jawaban = ''
        this.kabupaten_kota = false
      },
    },
  }
</script>