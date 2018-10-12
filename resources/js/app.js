
/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

window.Vue = require('vue');

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

Vue.component('example-component', require('./components/ExampleComponent.vue'));

const app = new Vue({
    el: '#app'
});

// Function to hide next exercise if this exercise is the first one
function ToggleNextExercise() {
    // Get the checkbox
    var checkBox = document.getElementById("is_first");
    // Get the output text
    var text = document.getElementById("next-exercise");

    // If the checkbox is checked, display the output text
    if (checkBox.checked != true){
        text.style.display = "";
    } else {
        text.style.display = "none";
    }
}
