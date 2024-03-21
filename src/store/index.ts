import axios from "axios";
import { createStore } from "vuex";

export default createStore({
  state: {
    address: null,
  },
  getters: {},
  mutations: {
    setAddress(state, address) {
      state.address = address;
    },
  },
  actions: {
    async getAddress({ commit }, cep) {
      try {
        const response = await axios.get(
          `http://localhost:8081/cep?cep=${cep}`
        );
        commit("setAddress", response.data.data);
      } catch (error) {
        if (axios.isAxiosError(error)) {
          throw new Error(error.response?.data?.message);
        }
      }
    },
  },
  modules: {},
});
