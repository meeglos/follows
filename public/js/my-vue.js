new Vue({
    el: '#app-root',
    data: {
        skills: []
    },

    mounted() {
        axios.get('/skills').then(response => this.skills = response.data);
    }
});