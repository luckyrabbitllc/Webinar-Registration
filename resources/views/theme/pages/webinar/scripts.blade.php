<script>
    $( document ).ready(function() {
        $(".navbar-collapse").remove();
    });

    Vue.use(VeeValidate);

    new Vue({
        el: '#emailForm',
        methods: {
            validateForm() {
                this.$validator.validateAll();
            }
        }
    });
</script>