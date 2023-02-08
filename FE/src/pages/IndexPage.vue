<template>
  <q-page>
    <q-input v-model="name" label="full name" autogrow outlined rounded />
    <q-btn @click="moveRight(45)" color="purple-3" class="q-px-xl flip-horizontal q-py-md desktop-only text-h6 text-purple text-weight-bolder" label="Register" />
    <p class="text-center text-purple text-h1 cursor-pointer text-weight-medium">{{ name }}</p>
    {{ x*y }}
  </q-page>
</template>

<script>
import { defineComponent } from 'vue'

export default defineComponent({
  name: 'IndexPage',
  data() {
    return {
      name: 'Salam',
      x: 2,
      y: 5
    }
  },
  methods: {
    moveRight (x) {
      alert(x)
    }
  }
})
</script>
