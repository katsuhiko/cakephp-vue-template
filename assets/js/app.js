require('./bootstrap');

import Vue from 'vue'

import router from './router'
import App from './App.vue'

const app = new Vue({
    el: '#app',
    router, // ルーティングの定義を読み込む
    components: { App }, // ルートコンポーネントの使用を宣言する
    template: '<App />' // ルートコンポーネントを描画する
});
