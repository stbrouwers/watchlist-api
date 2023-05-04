<script setup>
  import NewUser from "@/components/NewUser.vue";
  import RecoverUser from "@/components/RecoverUser.vue";
  import SubmitButton from "@/components/SubmitButton.vue";
</script>

<template>
  <main>
    <div class="mainForm">
      <div class="innerForm">
        <input class="mainInput" type="text" :placeholder="'your '+parameterName">
        <SubmitButton ></SubmitButton>
      </div>

      <header>
        <nav>
          <RouterLink class="navLink" to="/register">Register</RouterLink>
          <RouterLink class="navLink" to="/recover">Recover</RouterLink>
        </nav>
      </header>
    </div>

  </main>
</template>

<script>
export default {
  props: ['recover', 'parameterName'],
}
</script>

<style scoped>
  main {
      display: flex;
      flex-direction: column;
      align-items: center;
      justify-content: center;
      width: 100%;
  }

  .mainForm {
    display: flex;
    flex-direction: column;
    align-items: center;
    justify-content: center;
    width: 500px;
    height: 300px;
    border: 1px solid red;
  }

  .innerForm {
    display: inline-flex;
    align-items: center;
  }

  .mainInput {
    width: 300px;
    height: 50px;
    margin-right: -50px;
    border-radius: 25px;
    border: 1px rgba(235, 235, 235, 0.64) solid;

    -webkit-appearance: none;
    -moz-appearance: none;
    appearance: none;
    outline: none;
    padding: 0 1rem;
    background: none;
    color: var(--color-text);
    transition: opacity 200ms ease;
    transition: all 400ms ease-in;
  }

  .mainInputClose {
    width: 0px;
    opacity: 0;
    margin-right: -34px;
  }

  nav {
    width: 100%;
    font-size: 12px;
    text-align: center;
    margin-top: 2rem;
  }

  nav a.router-link-exact-active {
    color: var(--color-text);
  }

  nav a.router-link-exact-active:hover {
    background-color: transparent;
  }

  nav a {
    display: inline-block;
    padding: 0 1rem;
    border-left: 1px solid var(--color-border);
  }

  nav a:first-of-type {
    border: 0;
  }

  .navLink {
    transition: all 220ms ease-in;
  }

  .navLinkClose {
    opacity: 0;
    pointer-events: none;
    cursor: default;
  }
</style>