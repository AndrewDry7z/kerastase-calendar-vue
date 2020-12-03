<template>
  <aside class="calendar-popup overlay">
    <div class="calendar-popup-content">
      <div class="calendar-popup-wrap">
        <button class="calendar-popup__close" @click="$emit('close-popup')"></button>
        <p class="calendar-popup__day">
          {{ `${(item.day < 10 ? '0' : '') + item.day}.12` }}
        </p>
        <p class="calendar-popup__description">
          {{ item.description }}
        </p>
        <div class="calendar-popup__picture">
          <img :src="require(`@/assets/images/daypic/pic-${item.day}.png`)" alt="">
        </div>
        <div class="calendar-popup-code">
          <p class="calendar-popup-code__heading">
            Ваш промокод:
          </p>
          <p class="calendar-popup-code__value">
            {{ item.code }}
          </p>
        </div>
        <a class="button calendar-popup__button"
           role="button"
           :href="item.link"
           target="_blank"
           rel="noreferrer noopener">
          Воспользоваться
        </a>
        <p class="calendar-popup__terms">
          Введите промокод к товарам в корзине при оформлении заказа и получите подарок. <br>
          Не суммируется с другими промокодами.
        </p>
      </div>
    </div>
  </aside>
</template>

<script>
export default {
  name: "CalendarPopup",
  props: {
    item: Object
  }
}
</script>

<style scoped lang="scss">
@import "src/styles/variables";

@keyframes popupFadeIn {
  from {
    opacity: 0;
  }
  to {
    opacity: 1;
  }
}

.overlay {
  position: fixed;
  left: 0;
  top: 0;
  width: 100%;
  height: 100%;
  background: rgba(255, 255, 255, 0.5);
  z-index: 10;
  display: flex;
  align-items: center;
  justify-content: center;
  animation: popupFadeIn .4s ease-in;

  @media screen and (max-width: 350px) {
    overflow-y: auto;
    align-items: flex-start;
  }
}

.calendar-popup {
  &-content {
    width: 100%;
    max-width: 510px;
    text-align: center;
    background: url('/img/p.jpg') top right;
    background-size: 60px;
    box-shadow: 0 0 155px rgba(0, 0, 0, 0.06), 0 0 34px rgba(0, 0, 0, 0.035), 0 0 19px rgba(0, 0, 0, 0.03), 0 14px 10px rgba(0, 0, 0, 0.025), 0 6px 4px rgba(0, 0, 0, 0.01);
    border: 30px solid transparent;

    @media screen and (max-width: 600px) {
      display: flex;
      align-items: center;
      justify-content: center;
      border: none;
    }
  }

  &__close {
    position: absolute;
    top: 10px;
    right: 10px;

    &:before {
      content: '\2715';
      font-size: 25px;
      line-height: normal;
    }
  }

  &-wrap {
    position: relative;
    border: 10px solid goldenrod;
    border-image-source: url('/img/gold-shine.jpg');
    border-image-slice: 8;
    background: #ffffff;
  }

  &__day {
    font-size: 50px;
    font-style: italic;
    font-family: Playfair Display, sans-serif;
    margin-bottom: 15px;
  }

  &__description {
    width: 80%;
    margin: auto;
  }

  &__picture {
    margin-top: 25px;
    margin-bottom: 10px;
    display: flex;
    justify-content: center;
  }

  &-code {
    margin-bottom: 20px;

    &__heading {
      font-size: 12px;
      color: $main-grey;
      margin-bottom: 15px;
    }

    &__value {
      font-family: Arial, sans-serif;
      font-weight: 600;
      font-size: 20px;
      padding-bottom: 15px;
      width: 215px;
      margin: auto;
      border-bottom: 1px solid #000;
      line-height: 1;
    }
  }

  &__button {
    margin-bottom: 30px;
  }

  &__terms {
    margin: 30px auto 40px;
    max-width: 300px;
    font-size: 14px;
    color: $main-grey;
  }
}

</style>
