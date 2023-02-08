<template>
  <q-page padding>
    <!-- content -->
    <h1 class="text-h5">Posts</h1>
    <q-inner-loading
      :showing="visibility"
      label="Please wait..."
      label-class="text-teal"
      label-style="font-size: 1.1em"
    />
    <div class="row q-col-gutter-sm">
      <div
        class="col-xs-12 col-sm-12 col-md-6 col-lg-3"
        v-for="(post, index) in posts"
        :key="'post-' + index + 1"
      >
        <q-card>
          <q-card-section class="bg-orange">
            <q-avatar v-if="post.user.profile">
              <img :src="post.user.profile.avatar" />
            </q-avatar>
            <q-avatar v-else>
              <img
                src="https://www.eastendprep.org/wp-content/uploads/2016/06/noavatar.jpg"
              />
            </q-avatar>
            #{{ post.id }} {{ post.title }}<br />
            <span v-if="post.user.profile">
              {{ post.user.profile.fullName }}
            </span>
            <span v-else>پروفایل ندارد</span>
          </q-card-section>
          <q-card-section>
            {{ post.content }}
          </q-card-section>
          <q-card-actions align="between">
            <q-btn label="مشاهده" />
            <q-btn
              @click="toggleLike(index)"
              v-if="post.liked"
              flat
              round
            >
              <q-icon name="favorite" color="red" />
            </q-btn>
            <q-btn
              @click="toggleLike(index)"
              v-else
              flat
              round
              icon="favorite_outline"
            />

            <q-btn label="...">
              <q-menu>
                <q-list style="min-width: 100px">
                  <q-item clickable v-close-popup>
                    <q-item-section avatar>
                      <q-avatar
                        size="25px"
                        color="pink-8"
                        text-color="white"
                        icon="delete"
                      />
                    </q-item-section>
                    <q-item-section>حذف</q-item-section>
                  </q-item>
                  <q-item clickable v-close-popup>
                    <q-item-section>New tab</q-item-section>
                  </q-item>
                </q-list>
              </q-menu>
            </q-btn>
          </q-card-actions>
        </q-card>
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
      posts: [],
      visibility: true,
    };
  },
  created() {
    this.fetchPosts();
  },
  methods: {
    toggleLike(index) {
      if (this.posts[index].likes.length > 0) {
        api.delete("api/likes/" + this.posts[index].likes[0].id).then((r) => {
          if (r.data === 1) {
            this.posts[index].liked = false;
          }
        });
      } else {
        api
          .post(
            "api/likes",
            {
              post_id: this.posts[index].id,
            }
          )
          .then((r) => {
              this.posts[index].liked = r.data;
          });
      }
    },
    fetchPosts() {
      api
        .get("api/posts")
        .then((r) => {
          console.table(r.data);
          this.posts = r.data;
          this.visibility = false;
        })
        .catch((e) => {
          console.log(e);
        });
    },
  },
};
</script>
