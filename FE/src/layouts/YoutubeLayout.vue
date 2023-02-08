<template>
  <q-layout view="hHh lpR fFf" class="bg-grey-1">
    <q-header elevated class="bg-white text-grey-8 q-py-xs" height-hint="58">
      <q-toolbar>
        <q-btn
          flat
          dense
          round
          @click="toggleMenu"
          aria-label="Menu"
          icon="menu"
        />

        <q-btn flat no-caps no-wrap class="q-ml-xs" v-if="$q.screen.gt.xs">
          <q-icon  :name="fabYoutube" color="red" size="28px" />
          <q-toolbar-title shrink class="text-weight-bold">
            YouTube
          </q-toolbar-title>
        </q-btn>

        <q-space />

        <div class="YL__toolbar-input-container row no-wrap">
          <q-input dense outlined square v-model="search" placeholder="Search" class="bg-white col" />
          <q-btn class="YL__toolbar-input-btn" color="grey-3" text-color="grey-8" icon="search" unelevated />
        </div>

        <q-space />

        <div class="q-gutter-sm row items-center no-wrap">
          <q-btn round dense flat color="grey-8" icon="video_call" v-if="$q.screen.gt.sm">
            <q-tooltip>Create a video or post</q-tooltip>
          </q-btn>
          <q-btn round dense flat color="grey-8" icon="apps" v-if="$q.screen.gt.sm">
            <q-tooltip>Apps</q-tooltip>
          </q-btn>
          <q-btn round dense flat color="grey-8" icon="message" v-if="$q.screen.gt.sm">
            <q-tooltip>Messages</q-tooltip>
          </q-btn>
          <q-btn round dense flat color="grey-8" icon="notifications">
            <q-badge color="red" text-color="white" floating>
              2
            </q-badge>
            <q-tooltip>Notifications</q-tooltip>
          </q-btn>
          <q-btn round flat>
            <q-avatar size="26px">
              <img src="https://cdn.quasar.dev/img/boy-avatar.png">
            </q-avatar>
            <q-tooltip>Account</q-tooltip>
          </q-btn>
        </div>
      </q-toolbar>
    </q-header>

   <q-drawer
        v-model="leftDrawerOpen"
        show-if-above

        :mini="!leftDrawerOpen || miniState"
        @click.capture="drawerClick"

        :width="200"
        :breakpoint="500"
        class="bg-white"
      >
        <q-scroll-area class="fit">
          <q-list padding>
            <q-item class="q-mx-md r15 myMenuItems q-py-none" clickable v-ripple>
              <q-item-section class="q-pa-none" avatar>
                <q-icon  size="12px" name="inbox" />
              </q-item-section>

              <q-item-section class="q-pa-none">
                Inbox
              </q-item-section>
            </q-item>

            <q-item class="q-mx-md r15 myMenuItems q-py-none" active clickable v-ripple>
              <q-item-section class="q-pa-none" avatar>
                <q-icon  size="12px" name="star" />
              </q-item-section>

              <q-item-section class="q-pa-none">
                Star
              </q-item-section>
            </q-item>

            <q-item class="q-mx-md r15 myMenuItems q-py-none" clickable v-ripple>
              <q-item-section class="q-pa-none" avatar>
                <q-icon  size="12px" name="send" />
              </q-item-section>

              <q-item-section class="q-pa-none">
                Send
              </q-item-section>
            </q-item>

            <q-item class="q-mx-md r15 myMenuItems q-py-none" clickable v-ripple>
              <q-item-section class="q-pa-none" avatar>
                <q-icon  size="12px" name="drafts" />
              </q-item-section>

              <q-item-section class="q-pa-none">
                Drafts
              </q-item-section>
            </q-item>
          </q-list>
        </q-scroll-area>
      </q-drawer>

    <q-page-container>
      <router-view />
    </q-page-container>
  </q-layout>
</template>

<script>
import { ref } from 'vue'
import { fabYoutube } from '@quasar/extras/fontawesome-v6'
export default {
  name: 'MyLayout',
  setup () {
    const miniState = ref(false)
    const leftDrawerOpen = ref(false)
    const search = ref('')
    function toggleLeftDrawer () {
      leftDrawerOpen.value = !leftDrawerOpen.value
    }
    return {
      miniState,
      fabYoutube,
      leftDrawerOpen,
      search,
      toggleLeftDrawer,
      toggleMenu () {
        if (miniState.value) {
          miniState.value = false
        } else {
          miniState.value = true
        }
      },
      drawerClick (e) {
        // if in "mini" state and user
        // click on drawer, we switch it to "normal" mode
        if (miniState.value) {
          miniState.value = false

          // notice we have registered an event with capture flag;
          // we need to stop further propagation as this click is
          // intended for switching drawer to "normal" mode only
          e.stopPropagation()
        }
      },
      links1: [
        { icon: 'home', text: 'Home' },
        { icon: 'whatshot', text: 'Trending' },
        { icon: 'subscriptions', text: 'Subscriptions' }
      ],
      links2: [
        { icon: 'folder', text: 'Library' },
        { icon: 'restore', text: 'History' },
        { icon: 'watch_later', text: 'Watch later' },
        { icon: 'thumb_up_alt', text: 'Liked videos' }
      ],
      links3: [
        { icon: fabYoutube, text: 'YouTube Premium' },
        { icon: 'local_movies', text: 'Movies & Shows' },
        { icon: 'videogame_asset', text: 'Gaming' },
        { icon: 'live_tv', text: 'Live' }
      ],
      links4: [
        { icon: 'settings', text: 'Settings' },
        { icon: 'flag', text: 'Report history' },
        { icon: 'help', text: 'Help' },
        { icon: 'feedback', text: 'Send feedback' }
      ],
      buttons1: [
        { text: 'About' },
        { text: 'Press' },
        { text: 'Copyright' },
        { text: 'Contact us' },
        { text: 'Creators' },
        { text: 'Advertise' },
        { text: 'Developers' }
      ],
      buttons2: [
        { text: 'Terms' },
        { text: 'Privacy' },
        { text: 'Policy & Safety' },
        { text: 'Test new features' }
      ]
    }
  }
}
</script>

<style lang="sass">
.YL
  &__toolbar-input-container
    min-width: 100px
    width: 55%
  &__toolbar-input-btn
    border-radius: 0
    border-style: solid
    border-width: 1px 1px 1px 0
    border-color: rgba(0,0,0,.24)
    max-width: 60px
    width: 100%
  &__drawer-footer-link
    color: inherit
    text-decoration: none
    font-weight: 500
    font-size: .75rem
    &:hover
      color: #000
</style>
