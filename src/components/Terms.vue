<template>
  <main class="terms">
    <div class="container">
      <h1 class="terms__title">
        УСЛОВИЯ АКЦИИ «АДВЕНТ-КАЛЕНДАРЬ»
      </h1>
      <p class="terms__question">Сроки проведения акции</p>
      <p class="terms__answer">Акция действует c 7 по 20 декабря 2020 года включительно.</p>
      <p class="terms__question">Как принять участие в акции?</p>
      <p class="terms__answer">Для участия в акции необходимо быть подписчиком или подписаться на рассылку на странице
        авторизации адвент-календаря, или на сайте kerastase.ru.
        Ежедневно в сроки проведения акции для участников программы лояльности Kerastase будет доступен новый
        подарок.</p>
      <p class="terms__question">Как применить получить подарок или применить скидку, бонус при заказе на сайте?</p>
      <p class="terms__answer">Чтобы получить подарок или применить скидку, бонус на сайте, необходимо при оформлении
        заказа вручную ввести специальный промокод. Данный промокод Вы можете найти в карточке подарка.
      </p>
      <router-link to="/calendar/" class="terms__back">Вернуться назад</router-link>
    </div>
  </main>
</template>

<script>
export default {
  name: "Terms"
}
</script>

<style scoped lang="scss">
.terms {
  font-size: 22px;

  .container {
    max-width: 1000px;
    background: rgb(255, 255, 255);
    padding: 40px;
    border-radius: 20px;
    box-shadow: -1px 1px 7px 5px rgba(128, 128, 128, 0.1);

    @media screen and (max-width: 600px) {
      padding: 20px;
    }
  }

  .terms {
    &__title {
      margin: 40px 0 60px;
      text-align: center;
      @media screen and (max-width: 600px) {
        font-size: 24px;
      }
    }

    &__question {
      font-weight: bold;
      margin-bottom: 20px;
    }

    &__answer {
      margin-bottom: 40px;
    }

    &__back {
      text-decoration: none;

      &:before {
        content: '\2190';
        margin-right: 20px;
      }
    }
  }
}
</style>
