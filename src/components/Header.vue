<template>
  <header class="header">
    <div class="container">
      <a href="//kerastase.ru" target="_blank" rel="noreferrer noopener">
        <img src="@/assets/images/logo-kerastase.svg" class="header__logo" alt="">
      </a>
    </div>
  </header>
</template>

<script>
export default {
  name: "Header"
}
</script>

<style scoped lang="scss">
.header {
  &__logo {
    margin: 30px auto;
  }
}

</style>
