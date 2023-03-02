<template>
  <q-page>
    <h1>{{ me.name }}</h1>
    <h1>{{ car.name }}</h1>
    <h1>{{ counter }}</h1>
    <h1>{{ doubleCount }}</h1>
    <q-btn @click="increment" label="+1" />
    <q-btn @click="doubleIt" label="DoubleIt" />
    <q-btn @click="decrementCount" label="-1" />
    <SearchInput :pm="name"></SearchInput>
    <q-input v-model="name" label="full name" autogrow outlined rounded />
    <q-btn
      @click="moveRight(45)"
      color="purple-3"
      class="q-px-xl flip-horizontal q-py-md desktop-only text-h6 text-purple text-weight-bolder"
      label="Register"
    />
    <p
      class="text-center text-purple text-h1 cursor-pointer text-weight-medium"
    >
      {{ name }}
    </p>
    {{ x * y }}
  </q-page>
</template>

<script>
import SearchInput from "src/components/SearchInput.vue";
import { defineComponent, computed, ref, reactive, toRefs } from "vue";
import { useCounterStore } from "stores/userData";
import { storeToRefs } from "pinia";
export default defineComponent({
  name: "IndexPage",
  setup() {
    const person = reactive({
      me: {
        name: "usher",
        age: 34,
        weight: 95,
        height: 178,
      },
      car: {
        name: "Prido",
      },
    });
    person.name = "U.Q";
    const myName = ref("Usher");
    console.log(myName.value);
    myName.value = "U.Q";
    console.log(myName.value);
    const store = useCounterStore();
    const doubleCountValue = computed(() => store.doubleCount);
    const decrementCount = () => {
      if (store.counter > 0) {
        store.counter--;
      }
    };
    function doubleIt() {
      store.doubleCount;
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
      increment,
      myName,
      ...toRefs(person),
    };
  },
  components: {
    SearchInput,
  },
  data() {
    return {
      name: "Salam",
      x: 2,
      y: 5,
    };
  },
  methods: {
    moveRight(x) {
      alert(x);
    },
  },
});
</script>
