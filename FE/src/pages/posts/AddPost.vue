<template>
  <q-page padding>
    <!-- content -->
    <h1 class="text-h6 text-weight-bolder">پست جدید</h1>
    <div class="row q-col-gutter-y-md">
      <div class="col-12">
        <q-input v-model="title" rounded outlined label="عنوان پست" />
      </div>
      <div class="col-12">
        <q-input
          v-model="content"
          style="height: 165px"
          rounded
          outlined
          label="متن پست"
          type="textarea"
        />
      </div>
      <div class="col-12 text-right">
        <q-btn
          @click="submit"
          icon="save"
          rounded
          color="green-7"
          label="ایجاد"
        />
      </div>
    </div>
  </q-page>
</template>

<script>
export default {
  // name: 'PageName',
  data() {
    return {
      title: null,
      content: null,
    };
  },
  methods: {
    submit() {
      this.$axios
        .post("http://localhost:8000/api/posts", {
          title: this.title,
          content: this.content,
        })
        .then((r) => {
          if (r.data.id) {
            this.$router.push('/dashboard/posts')
          }
        })
        .catch((error) => {
          console.log(error);
        });
    },
  },
};
</script>
<style></style>
