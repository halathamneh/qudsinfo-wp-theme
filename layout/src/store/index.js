import Vue from "vue";
import Vuex from "vuex";
import fetchInfoOfToday from "../api/fetchInfoOfToday";

Vue.use(Vuex);

const store = new Vuex.Store({
  state: {
    searchActive: false,
    todayInfo: null,
  },
  mutations: {
    setSearch(state, val) {
      state.searchActive = val;
    },
    setTodayInfo(state, val) {
      state.todayInfo = val;
    },
  },
  getters: {
    isSearchActive: (state) => state.searchActive,
    getTodayInfo: (state) => state.todayInfo,
  },
  actions: {
    toggleSearch({ commit, state }, val) {
      if (typeof val !== "boolean") {
        val = !state.searchActive;
      }
      commit("setSearch", val);
    },
    loadTodayInfo({ commit, state }) {
      if (state.todayInfo) return;
      fetchInfoOfToday().then((info) => {
        commit("setTodayInfo", info);
      });
    },
  },
});

export default store;
