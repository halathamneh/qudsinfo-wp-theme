import Vue from "vue";
import Vuex from "vuex";

Vue.use(Vuex);

const store = new Vuex.Store({
  state: {
    searchActive: false,
  },
  mutations: {
    setSearch(state, val) {
      state.searchActive = val;
    },
  },
  getters: {
    isSearchActive: (state) => {
      return state.searchActive;
    },
  },
  actions: {
    toggleSearch({ commit, state }, val) {
      if (typeof val !== "boolean") {
        val = !state.searchActive;
      }
      commit("setSearch", val);
    },
  },
});

export default store;
