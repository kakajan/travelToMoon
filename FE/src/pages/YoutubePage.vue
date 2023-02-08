<template>
  <q-page padding>
    <!-- content -->
    <div class="row justify-start q-col-gutter-md">
      <div class="col-3">
        <q-card flat class="my-card">
          <q-img class="r15" src="https://cdn.quasar.dev/img/parallax2.jpg">
            <div class="vidTitle absolute-bottom text-h6 bg-transparent">
              عنوان ویدئو
            </div>
          </q-img>

          <q-card-section>
            <q-item>
              <q-item-section avatar>
                <q-avatar>
                  <img src="https://cdn.quasar.dev/img/avatar2.jpg" />
                </q-avatar>
              </q-item-section>
              <q-item-section>
                <q-item-label>Title</q-item-label>
                <q-item-label caption>Subhead</q-item-label>
              </q-item-section>
            </q-item>
          </q-card-section>
        </q-card>
      </div>
    </div>
  </q-page>
</template>

<script>
export default {
  // name: 'PageName',
};
</script>
<style>
.vidTitle {
  padding: 3px 8px !important;
}
</style>
