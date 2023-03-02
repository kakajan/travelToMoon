<template>
  <div>
    <input
      @input="$emit('update:pm', $event.target.value)"
      :value="pm"
      >
  </div>
</template>

<script>
export default {
  name: 'SearchInput',
  props: ['pm'],
  emits: ["update:pm"],
  setup () {
    return {
    }
  }
}
</script>
