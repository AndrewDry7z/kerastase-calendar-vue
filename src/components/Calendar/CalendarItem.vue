<template>
  <div class="calendar-item"
       :class="`color--${item.textColor} ${item.dayType}`"
       @click="(item.dayType === 'upcoming' ? false : $emit('open-popup', item))"
  >
    <img class="calendar-item__image"
         loading="lazy"
         :src="`${require('@/assets/images/bg/back-' + item.day +'.jpg')}`"
         :alt="item.description">
    <p class="calendar-item__day">
      {{ `${(item.day < 10 ? '0' : '') + item.day}.12` }}
    </p>
    <p class="calendar-item__description">
      {{ (item.dayType === 'upcoming') ? 'Скоро можно будет узнать, что внутри' : item.preview }}
    </p>
    <button class="button" v-if="item.dayType === 'current'">
      Открыть
    </button>
    <button class="icon" v-else-if="item.dayType === 'past'">
      <img src="@/assets/images/icons/checkmark-black.svg" alt="Открыто">
    </button>
    <span class="icon" v-else>
      <img src="@/assets/images/icons/lock-black.svg"
           :title="`Будет открыто ${item.day} декабря`"
           :alt="`Будет открыто ${item.day} декабря`">
    </span>
  </div>
</template>

<script>
export default {
  name: "CalendarItem",
  data() {
    return {

    }
  },
  props: {
    item: Object
  },
  methods: {

  }
}
</script>

<style scoped lang="scss">
@import "~@/styles/variables";

.calendar {
  &-item {
    text-align: center;
    box-shadow: 0 0 155px rgba(0, 0, 0, 0.06), 0 0 34px rgba(0, 0, 0, 0.036), 0 0 19px rgba(0, 0, 0, 0.03), 0 14px 10px rgba(0, 0, 0, 0.024), 0 6px 4px rgba(0, 0, 0, 0.017);
    position: relative;
    height: 430px;
    display: flex;
    flex-direction: column;
    justify-content: center;
    transition-duration: .4s;
    will-change: transform;
    cursor: pointer;

    &:hover {
      transform: scale(1.03);

      .button {
        background: #333333;
      }
    }

    &__image {
      position: absolute;
      z-index: 0;
      top: 0;
      left: 0;
      width: 100%;
      height: 100%;
    }

    &__day {
      font-family: Playfair Display, sans-serif;
      font-style: italic;
      font-weight: normal;
      font-size: 80px;
      margin-bottom: 10px;
      line-height: normal;
      z-index: 1;
    }

    .button, .icon {
      z-index: 1;
      margin: 30px auto 0;
      transition-duration: .4s;
    }

    &__description {
      font-size: 16px;
      width: 75%;
      margin: 0 auto;
      z-index: 1;
      min-height: 50px;
    }

    &.color {
      &--white {
        color: #ffffff;

        .button {
          background: #E7CA7C;
          color: #000000;
        }

        .icon {
          filter: invert(1);
        }
      }

      &--gold {
        .calendar-item__day {
          background: url("/advent-calendar/img/gold-shine.jpg") center;
          background-size: 80%;
          background-clip: text;
          color: transparent;

        }
      }
    }

    &.current {
      background: url("/advent-calendar/img/pattern-active.jpg") center;
      background-size: cover;

      .calendar-item__image {
        padding: 25px;
      }

      .calendar-item__description {
        width: 69%;
      }

    }

    &.upcoming {
      cursor: progress;
    }
  }
}

</style>
