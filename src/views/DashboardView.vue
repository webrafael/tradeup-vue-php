<template>
  <div class="flex justify-center items-center min-h-screen w-screen">
    <div class="w-full max-w-xs">
      <form class="bg-white shadow-md rounded px-8 pt-6 pb-8 mb-4">
        <div class="mb-4">
          <label
            class="block text-gray-700 text-sm font-bold mb-2"
            for="username"
          >
            CEP
          </label>
          <div class="flex content-between gap-4">
            <input
              class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
              id="username"
              type="text"
              placeholder="Digite seu cep"
              v-model="cep"
              @input="validarCep"
              maxlength="8"
            />
            <button
              class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline"
              type="button"
              @click="getAddress"
              :disabled="loading"
            >
              Pesquisar
            </button>
          </div>
        </div>
        <div class="mb-6">
          <div v-if="loading">Carregando...</div>
          <div v-else-if="error">{{ error }}</div>
          <div v-else-if="address">
            <p>CEP: {{ address.cep }}</p>
            <p>Endereço: {{ address.uf }}</p>
            <p>Bairro: {{ address.bairro }}</p>
            <p>Localidade: {{ address.localidade }}</p>
            <p>Logradouro: {{ address.logradouro }}</p>
            <p>Complemento: {{ address.complemento }}</p>
            <p>DDD: {{ address.ddd }}</p>
            <p>GIA: {{ address.gia }}</p>
            <p>IBGE: {{ address.ibge }}</p>
            <p>SIAFI: {{ address.siafi }}</p>
          </div>
        </div>
        <div class="flex items-center justify-between">
          <a
            class="inline-block align-baseline font-bold text-sm text-blue-500 hover:text-blue-800"
            href="#"
            @click="limparCep"
          >
            Voltar
          </a>
        </div>
      </form>
      <p class="text-center text-gray-500 text-xs">
        &copy;2020 Acme Corp. All rights reserved.
      </p>
    </div>
  </div>
</template>
<script>
export default {
  data() {
    return {
      cep: "",
      loading: false,
      error: "",
    };
  },
  computed: {
    address() {
      return this.$store.state.address;
    },
  },
  methods: {
    validarCep() {
      this.cep = this.cep.replace(/\D/g, ""); // Remove caracteres não numéricos
    },
    limparCep() {
      this.$store.state.address = null;
      this.cep = ""; // Limpa o campo de CEP
    },
    async getAddress() {
      this.loading = true;

      try {
        await this.$store.dispatch("getAddress", this.cep);
      } catch (error) {
        this.error = error;
      } finally {
        this.loading = false;
      }
    },
  },
};
</script>
