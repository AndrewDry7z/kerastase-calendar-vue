<template>
  <main class="login">
    <section class="login-content">
      <div class="login-wrap">
        <h1 class="h1 login-heading">
          {{
            (mode === 'welcome') ? 'Магия начинается' : 'Добро пожаловать'
          }}
        </h1>

        <form class="login-form" v-if="mode === 'login'" @submit="sendMindboxRequest($event)">
          <input class="login-form__input"
                 type="email"
                 name="email"
                 v-model="email"
                 placeholder="Введите e-mail, чтобы увидеть подарки"
                 required>
          <button type="submit" class="button login-form__button">Открыть</button>
        </form>

        <p class="login-text" v-if="mode === 'welcome'">
          Успейте открыть все даты с 7 по 20 декабря в нашем адвент-календаре! Возвращайтесь каждый день, чтобы получать
          бонусы и подарки. Новый день и его подарки становятся доступны для использования до 12:00 по московскому времени.
        </p>
        <p class="login-text" v-else-if="mode === 'login'">
          Нажимая кнопку «Войти» вы принимаете политику обработки персональных данных и даете согласие на получение
          e-mail рассылок
        </p>

        <button class="button login-button" v-if="mode === 'welcome'" @click="mode = 'login'">Начать</button>
      </div>
    </section>
  </main>
</template>

<script>
export default {
  name: "Login",
  data() {
    return {
      mode: 'welcome', // or 'login',
      email: ''
    }
  },
  methods: {
    sendMindboxRequest(event) {
      event.preventDefault()
      let formData = new FormData();
      formData.append("type", 'login');
      formData.append("e-mail", this.email);

      const requestOptions = {
        method: 'POST',
        body: formData,
        redirect: 'follow'
      };

      const URL = "https://kerastase.creativesoldiers.ru/advent-calendar/api/request.php"

      fetch(URL, requestOptions)
        .then(response => response.json())
        .then(result => {
          if (result.status === 'Success') {
            if (result.customer.processingStatus === 'Found') {
              // e-mail has been found in segment, login successful
              sessionStorage.setItem('status', 'logon')
              this.$router.push('/calendar/')
            } else {
              // else add e-mail to segment and login
              formData.append("type", 'register');
              fetch(URL, requestOptions)
                .then(response => response.json())
                .then(result => {
                  if (result.status === 'Success') {
                    // successfully registered! can login now
                    sessionStorage.setItem('status', 'logon')
                    this.$router.push('/calendar/')
                  }
                })
            }
          } else {
            alert('Произошла ошибка')
          }
        })
        .catch(error => console.log('error', error))
    }
  }
}
</script>

<style scoped lang="scss">
.login {
  min-height: 75vh;
  display: flex;
  align-items: center;
  justify-content: center;
  background: url('/advent-calendar/img/title-pattern.jpg') center repeat-x;

  &-heading {
    margin-bottom: 45px;

    @media screen and (max-width: 600px) {
      margin-bottom: 20px;
      font-size: 32px;
    }
  }

  &-wrap {
    width: 100%;
    height: 100%;
    background: #ffffff;
    border: 10px solid goldenrod;
    border-image-source: url('/advent-calendar/img/gold-shine.jpg');
    border-image-slice: 10;
    padding: 49px;

    @media screen and (max-width: 600px) {
      padding: 10px;
    }
  }

  &-content {
    text-align: center;
    box-shadow: 0 220px 155px rgba(0, 0, 0, 0.06), 0 49.1399px 34.6213px rgba(0, 0, 0, 0.035), 0 27.5474px 19.4084px rgba(0, 0, 0, 0.03), 0 14px 10px rgba(0, 0, 0, 0.025), 0 6px 4px rgba(0, 0, 0, 0.017);
    box-sizing: border-box;
    padding: 30px;
    max-width: 750px;
    background: url(/advent-calendar/img/p.jpg) top left;
    background-size: 60px;

    @media screen and (max-width: 600px) {
      max-width: 100%;
      padding: 15px;
    }
  }

  &-text {
    margin: 40px auto 60px;
    color: #000;

    @media screen and (max-width: 600px) {
      margin: 30px auto;
    }
  }

  &-form {
    display: grid;
    grid-template-columns: 2fr 1fr;
    gap: 12px;

    @media screen and (max-width: 600px) {
      display: block;
    }

    &__input {
      border-bottom: 1px solid #000000;

      @media screen and (max-width: 600px) {
        width: 100%;
        margin-bottom: 20px;
        height: 50px;
      }
    }

    &__button {
      width: 100%;
    }
  }
}
</style>
