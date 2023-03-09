<template>
  <q-page padding>
    <!-- content -->
    <div class="row q-col-gutter-md">
      <div class="col-md-3 col-sm-6 col-xs-12">
        <q-card class="my-card">
          <q-card-section class="bg-deep-orange-7 text-white">
            <div class="text-h6 morabba text-weight-bolder">مخاطبین من</div>
            <div class="text-subtitle2 text-weight-light">315 نفر</div>
          </q-card-section>

          <q-card-actions>
            <q-btn-group class="full-width" push>
              <q-btn push class="full-width" label="First" icon="timeline" />
              <q-btn push class="full-width" label="Second" icon="visibility" />
            </q-btn-group>
          </q-card-actions>
        </q-card>
      </div>
      <div class="col-md-3 col-sm-6 col-xs-12">
        <q-card class="my-card">
          <q-card-section class="bg-purple text-white">
            <div class="text-h6 morabba text-weight-bolder">پست‌های من</div>
            <div class="text-subtitle2 text-weight-light">
              <span>
                {{ dashInfo.postMeta.postCount }}
              </span>
              پست منتشر شده
            </div>
          </q-card-section>

          <q-card-actions>
            <q-btn-group class="full-width" push>
              <q-btn @click="$router.push('/dashboard/posts')" push class="full-width" label="مشاهده" icon="visibility" />
              <q-btn
                @click="$router.push('/dashboard/new-post')"
                push
                class="full-width"
                label="جدید"
                icon="add"
              />
            </q-btn-group>
          </q-card-actions>
        </q-card>
      </div>
      <div class="col-12">
        <div class="row q-col-gutter-sm">
      <div
        class="col-xs-12 col-sm-12 col-md-6 col-lg-3"
        v-for="(user, index) in dashInfo.usersList"
        :key="'post-' + index + 1"
      >
        <q-card>
          <q-card-section class="bg-orange">
            <q-avatar v-if="user.profile">
              <img :src="user.profile.avatar" />
            </q-avatar>
            <q-avatar v-else>
              <img
                src="https://www.eastendprep.org/wp-content/uploads/2016/06/noavatar.jpg"
              />
            </q-avatar>
            #{{ user.id }} {{ user.name }}<br />
            <span v-if="user.profile">
              {{ user.profile.fullName }}
            </span>
            <span v-else>پروفایل ندارد</span>
          </q-card-section>
          <q-card-actions align="between">
            <q-btn @click="follow(user.id)" label="follow" />

          </q-card-actions>
        </q-card>
      </div>
    </div>
      </div>
    </div>
  </q-page>
</template>

<script>
import { api } from "src/boot/axios";
export default {
  // name: 'PageName',
  data() {
    return {
      dashInfo: {
        postMeta: {
          postCount: 0,
        },
        usersList: []
      },
    };
  },
  methods: {
    follow (id) {
      api.get('api/follow/' + id)
        .then(r => {
        console.log(r.data);
      })
    }
  },
  created() {
    api
      .get("api/init")
      .then((r) => {
        console.log(r.data);
        this.dashInfo = r.data;
      })
      .catch((e) => {
        console.log(e.data);
      });
  },
};
</script>
