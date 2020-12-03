<template>
  <footer class="footer">
    <div class="container">
      <div class="footer-flex">
        <router-link to="/terms" class="footer-terms">
          Правила участия
        </router-link>
        <div class="footer-social">
          <a v-for="(item, index) of social" :key="index"
             :href="item.link" target="_blank" rel="noreferrer noopener"
             class="footer-social-item">
            <img :src="`${require('@/assets/images/social/' + item.name +'.svg')}`"
                 :alt="item.name">
          </a>
        </div>
      </div>
    </div>
  </footer>
</template>

<script>
export default {
  name: "Footer",
  data() {
    return {
      social: [
        {
          name: "facebook",
          link: "//www.facebook.com/KerastaseRussia/"
        },
        {
          name: "vk",
          link: "//vk.com/kerastaserussia"
        },
        {
          name: "instagram",
          link: "//instagram.com/kerastase_official"
        },
        {
          name: "youtube",
          link: "//www.youtube.com/user/KerastaseRussia"
        }
      ]
    }
  }
}
</script>

<style scoped lang="scss">
@import "~@/styles/variables";

.footer {
  padding: 50px 0;

  @media screen and (max-width: 600px) {
    text-align: center;
  }

  &-flex {
    display: flex;
    align-items: center;
    justify-content: space-between;

    @media screen and (max-width: 600px) {
      display: block;
    }
  }

  &-terms {
    color: #000000;

    @media screen and (max-width: 600px) {
      display: block;
      margin-bottom: 20px;
    }
  }

  &-social {
    display: flex;
    align-items: center;

    @media screen and (max-width: 600px) {
      justify-content: space-around;
      width: 50%;
      margin: 0 auto 30px;
    }

    &-item {
      display: flex;
      align-items: center;
      justify-content: center;
      margin-right: 25px;

      @media screen and (max-width: 600px) {
        margin-right: 0;
      }
    }
  }
}
</style>
