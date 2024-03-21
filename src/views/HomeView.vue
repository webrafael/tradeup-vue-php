<template>
  <div class="flex items-stretch h-screen">
    <div class="flex basis-1/2 wrap-background items-center justify-center">
      <div class="max-w-sm rounded overflow-hidden shadow-lg bg-white">
        <h2 class="text-xl mt-2 font-bold px-6">Um sistema aleatório</h2>
        <div class="px-6 py-4">
          <p class="text-gray-700 text-base">
            Lorem ipsum dolor sit amet, consectetur adipisicing elit.
            Voluptatibus quia, nulla! Maiores et perferendis eaque,
            exercitationem praesentium nihil.
          </p>
        </div>
      </div>
    </div>
    <div class="flex basis-1/2 items-center justify-center">
      <div class="max-w-sm rounded overflow-hidden shadow-lg bg-blue-500">
        <h2 class="text-xl mt-2 font-bold px-6 py-4 text-white">
          Clique para entrar no sistema
        </h2>
        <div class="px-6 pb-4">
          <p class="text-base text-white mb-4">
            Faça um teste
            <router-link to="/dashboard" class="underline hover:underline"
              >aqui</router-link
            >!
          </p>
        </div>
      </div>
    </div>
  </div>
</template>

<script lang="ts">
import { Options, Vue } from "vue-class-component";

@Options({})
export default class HomeView extends Vue {}
</script>
