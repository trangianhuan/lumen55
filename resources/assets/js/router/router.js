import About from '../pages/About.vue';
import Home from '../pages/Home.vue';
import Timer from '../pages/timer/Timer.vue';

const routes = [
  { path: '/', component: Home },
  { path: '/about', component: About },
  { path: '/timer', component: Timer }
]
export default routes