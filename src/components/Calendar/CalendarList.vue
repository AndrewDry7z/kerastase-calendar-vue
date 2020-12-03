<template>
  <main class="calendar">
    <div class="container">
      <h1 class="h1 calendar__heading">Магия начинается</h1>
      <p class="calendar__description">
        Ожидание Нового года не будет скучным!<br />
        Открывайте подарки и бонусы каждый день, с 7 по 20 декабря, в нашем календаре.
      </p>
      <div class="calendar-list">
        <CalendarItem v-for="(item, index) of calendar"
                      :key="index"
                      :item="item"
                      @open-popup="activeItem = item" />
      </div>
    </div>
    <CalendarPopup
      v-if="activeItem"
      :item="activeItem"
      @close-popup="activeItem = null" />
  </main>
</template>

<script>
import CalendarItem from "@/components/Calendar/CalendarItem";
import CalendarPopup from "@/components/Calendar/CalendarPopup";

export default {
  name: 'CalendarList',
  components: {CalendarPopup, CalendarItem},
  data() {
    return {
      activeItem: null,
      calendar: [
        {
          day: 7,
          description: 'Тревел-формат Reflection Bain Chroma Riche в подарок при покупке от 3 000 рублей',
          preview: 'Тревел-формат Reflection Bain Chroma Riche',
          textColor: 'gold',
          code: 'NYTRAVEL1',
          link: '//kerastase.ru/'
        },
        {
          day: 8,
          description: 'Гребень в подарок к каждому заказу',
          preview: 'Гребень в подарок',
          textColor: 'white',
          code: 'NYCOMB',
          link: '//kerastase.ru/'

        },
        {
          day: 9,
          description: '5 дополнительных саше к заказу и бесплатная доставка',
          preview: '5 дополнительных саше к заказу и бесплатная доставка',
          textColor: 'black',
          code: 'NY6TEST',
          link: '//kerastase.ru/'
        },
        {
          day: 10,
          description: 'Косметичка в подарок при заказе от 3 000 рублей',
          preview: 'Косметичка в подарок',
          textColor: 'white',
          code: 'NYPOUCH',
          link: '//kerastase.ru/'
        },
        {
          day: 11,
          description: 'Тревел-формат Elixir Ultimw L’Huile Rose в подарок при заказе от 3 000 рублей',
          preview: 'Тревел-формат Elixir Ultimw L’Huile Rose',
          textColor: 'black',
          code: 'NYTRAVEL2',
          link: '//kerastase.ru/'
        },
        {
          day: 12,
          description: 'Скидка 15% на товары в корзине при заказе от 4 000 рублей',
          preview: 'Скидка 15% на товары в корзине',
          textColor: 'gold',
          code: 'NY15',
          link: '//kerastase.ru/'
        },
        {
          day: 13,
          description: '200 баллов в подарок',
          preview: '200 баллов в подарок',
          textColor: 'black',
          code: 'NY200',
          link: '//kerastase.ru/'
        },
        {
          day: 14,
          description: 'Тревел-формат Resistance Masque в подарок при заказе от 3 000 рублей',
          preview: 'Тревел-формат Resistance Masque',
          textColor: 'gold',
          code: 'NYTRAVEL3',
          link: '//kerastase.ru/'
        },
        {
          day: 15,
          description: 'Продукт для укладки L’Incroyable Blowdry в подарок при заказе от 7 000 рублей',
          preview: 'Продукт для укладки L’Incroyable Blowdry',
          textColor: 'white',
          code: 'NYFREE',
          link: '//kerastase.ru/'
        },
        {
          day: 16,
          description: 'Сумка в подарок к заказу от 4 000',
          preview: 'Сумка в подарок',
          textColor: 'gold',
          code: 'NYBAG',
          link: '//kerastase.ru/'
        },
        {
          day: 17,
          description: 'Тревел-формат Fondant Extention в подарок к заказу от 3 000 рублей',
          preview: 'Тревел-формат Fondant Extention',
          textColor: 'white',
          code: 'NYTRAVEL4',
          link: '//kerastase.ru/'
        },
        {
          day: 18,
          description: 'Бесплатная доставка и скидка 10% на все',
          preview: 'Бесплатная доставка и скидка 10% на все',
          textColor: 'black',
          code: 'NY10',
          link: '//kerastase.ru/'
        },
        {
          day: 19,
          description: 'Скраб Apaisant года в подарок при покупке 3х продуктов',
          preview: 'Скраб Apaisant',
          textColor: 'white',
          code: 'NYBEST',
          link: '//kerastase.ru/'
        },
        {
          day: 20,
          description: 'Тревел-формат Blond Absolu в подарок к заказу от 3 000',
          preview: 'Тревел-формат Blond Absolu',
          textColor: 'black',
          code: 'NYTRAVEL5',
          link: '//kerastase.ru/'
        }
      ]
    }
  },
  mounted() {
    if (sessionStorage.status !== 'logon') {
      //this.$router.push('/')
    }
  }
}
</script>

<style lang="scss" scoped>
@import "~@/styles/variables";

.calendar {
  margin-top: 60px;
  margin-bottom: 140px;

  &__heading {
    width: fit-content;
    margin: 0 auto 35px;
    position: relative;

    &:before {
        content: '';
        height: 25px;
        width: 1000%;
        position: absolute;
        background: url('/img/title-pattern.jpg');
        background-size: contain;
        top: calc(50% - 5px);
        left: calc(-1000% - 50px)
    }

    &:after {
        content: '';
        height: 25px;
        width: 1000%;
        position: absolute;
        background: url('/img/title-pattern.jpg');
        background-size: contain;
        top: calc(50% - 5px);
        right: calc(-1000% - 50px)
    }
  }

  &__description {
    text-align: center;
    font-size: 22px;

    @media screen and (max-width: 600px) {
      font-size: 18px;
    }
  }

  &-list {
    display: grid;
    grid-template-columns: repeat(auto-fill, 350px);
    gap: 20px;
    align-items: stretch;
    justify-content: center;
    margin-top: 60px;

    @media screen and (max-width: 350px) {
      grid-template-columns: 1fr;
    }
  }
}
</style>
