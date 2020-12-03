<template>
  <div id="app" ref="bg">
    <Header />
    <router-view />
    <Footer />
  </div>
</template>

<style lang="scss">
@import "styles/main";
</style>
<script>
import Header from "@/components/Header";
import Footer from "@/components/Footer";

export default {
  components: {Footer, Header},
  methods: {
    initParallax() {
      const bg = this.$refs.bg
      if (screen.width > 600) {
        document.addEventListener('scroll', () => {
          let scrollTop = document.documentElement.scrollTop
          bg.style.backgroundPosition = `center ${scrollTop / 2}px`
        })
      }
    }
  },
  mounted() {
    this.initParallax()
  }
}
</script>
