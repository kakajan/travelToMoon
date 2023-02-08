
const routes = [
  {
    path: '/',
    component: () => import('layouts/MainLayout.vue'),
    children: [
      { path: '', component: () => import('pages/IndexPage.vue') }
    ]
  },
  {
    path: '/youtube',
    component: () => import('layouts/YoutubeLayout.vue'),
    children: [
      { path: '', component: () => import('pages/YoutubePage.vue') }
    ]
  },
  {
    path: '/register',
    component: () => import('layouts/EmptyLayout.vue'),
    children: [
      { path: '', component: () => import('src/pages/auth/RegisterUser.vue') }
    ]
  },
  {
    path: '/login',
    component: () => import('layouts/EmptyLayout.vue'),
    children: [
      { path: '', component: () => import('src/pages/auth/LoginPage.vue') }
    ],
    meta: {
      login: true
    }
  },
  {
    path: '/dashboard',
    component: () => import('layouts/MainLayout.vue'),
    children: [
      { path: '', component: () => import('src/pages/DashboardPage.vue') },
      { path: 'new-post', component: () => import('src/pages/posts/AddPost.vue') },
      { path: 'posts', component: () => import('src/pages/posts/PostsPage.vue') }
    ],
    meta: {
      requireAuth: true
    }
  },

  // Always leave this as last one,
  // but you can also remove it
  {
    path: '/:catchAll(.*)*',
    component: () => import('pages/ErrorNotFound.vue')
  }
]

export default routes
