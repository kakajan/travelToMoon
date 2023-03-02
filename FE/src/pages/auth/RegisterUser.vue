<template>
  <q-page padding>
    <!-- content -->
    {{ counter }}
    <div class="row justify-center">
      <div class="col-8">
        <h2 class="text-weight-bolder text-h5">فرم ثبت نام</h2>
        <div class="row justify-center">
          <div class="col-10">
            <div class="row q-col-gutter-md justify-center text-center">
              <div class="col">
                <q-input v-model="fullName" outlined rounded label="نام و نام خانوادگی" />
              </div>
              <div class="col">
                <q-input v-model="email" outlined rounded label="ایمیل" />
              </div>
              <div class="col-12">
                <q-btn @click="register" color="primary" rounded label="ثبت نام" class="full-width" size="lg" />
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <q-dialog v-model="alert">
      <q-card>
        <q-card-section>
          <div class="text-h6">Successfully Registered</div>
        </q-card-section>

        <q-card-section class="q-pt-none">
          Lorem ipsum dolor sit amet consectetur adipisicing elit. Rerum repellendus sit voluptate voluptas eveniet porro. Rerum blanditiis perferendis totam, ea at omnis vel numquam exercitationem aut, natus minima, porro labore.
        </q-card-section>

        <q-card-actions align="right">
          <q-btn flat label="OK" color="primary" v-close-popup />
        </q-card-actions>
      </q-card>
    </q-dialog>
  </q-page>
</template>

<script>
import { computed } from 'vue'
import {useCounterStore} from 'stores/userData'
import { storeToRefs } from 'pinia';
export default {
  // name: 'PageName',
  setup () {
    const store = useCounterStore();
    const doubleCountValue = computed(() => store.doubleCount);
    const decrementCount = () => { if (store.counter > 0) { store.counter-- } };
    function doubleIt () {
      store.doubleCount
      console.log(doubleCountValue.value);
    }
    const { counter, doubleCount } = storeToRefs(store);
    const { increment } = store;
    return {
      store,
      doubleCountValue,
      doubleIt,
      decrementCount,
      counter,
      doubleCount,
      increment
    }
  },
  data() {
    return {
      fullName: null,
      email: null,
      alert: false
    }
  },
  methods: {
    register () {
      this.$axios.post('http://localhost:8000/api/register', {
        Kertop: this.fullName,
        email: this.email
      }).then(r => {
        if (r.data.id) {
          this.alert = true
          this.$router.push('/login')
        }
      })
    }
  }
};
</script>
