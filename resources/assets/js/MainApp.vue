<template lang="html">
    <div id="main">
        <Header />
        <router-view></router-view>
    </div>
</template>

<script>
    import Header from './components/Header';
    import Home from './pages/Home';
    import About from './pages/About';
    import Timer from './pages/timer/Timer';
    export default {
      name: 'app',
      components: { Header, Home, About },
      data () {
        return {
        }
      }
    }
</script>