<template>
  <q-page padding class="row q-col-gutter-md">
    <!-- content -->
    <div class="col">
      <q-input v-model="username" rounded outlined label="email" type="email" />
    </div>
    <div class="col">
      <q-input
        v-model="password"
        rounded
        outlined
        label="password"
        type="password"
      />
    </div>
    <div class="col-12">
      <q-btn
        @click="login"
        class="full-width"
        color="primary"
        icon-right="done_all"
        label="Login"
      />
    </div>
  </q-page>
</template>

<script>
export default {
  // name: 'PageName',
  data() {
    return {
      username: null,
      password: null,
    };
  },
  methods: {
    login() {
      this.$axios.post("http://localhost:8000/oauth/token", {
        grant_type: "password",
        client_id: 2,
        client_secret: "cCyP4W9FkUnwUjgDlc9OrL1NDa1xBlEuhUXGKnYy",
        username: this.username,
        password: this.password,
        scope: "",
      }).then(r => {
        if (r.data.access_token) {
          this.$q.notify({ message: 'خوش آمدید', type: 'positive' })
          localStorage.setItem('access_token', r.data.access_token)
          localStorage.setItem('refresh_token', r.data.refresh_token)
          localStorage.setItem('expires_in', r.data.expires_in)
          this.$router.push('/dashboard')
        } else {
          this.$q.notify('مشکلی پیش آمده است. لطفا چند دقیقه دیگر مجدد تست نمایید.')
        }
      }).catch(e => {
        console.log(e)
        this.$q.notify({message:'اطلاعات ورود صحیح نمی باشد',type: 'negative'})
      })
    },
  },
};
</script>
