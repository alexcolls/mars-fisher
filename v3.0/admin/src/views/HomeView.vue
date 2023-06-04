<template>
  <div class="home">
    <img alt="Vue logo" src="" />
    <NavBar />
    <Login />
  </div>
</template>

<script lang="ts">
import { defineComponent } from "vue";
import NavBar from "./NavBar.vue"; // @ is an alias to /src
import Login from "./LoginView.vue";

export default defineComponent({
  name: "HomeView",
  components: {
    NavBar,
    Login,
  },
});
</script>
