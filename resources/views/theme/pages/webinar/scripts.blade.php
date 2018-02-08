<script>
    $( document ).ready(function() {
        $(".navbar-collapse").remove();
        $(".navbar-toggler").remove();
    });

    Vue.use(VeeValidate);

    new Vue({
        el: '#emailForm',
        methods: {
            submitForm(res){
                this.$validator.validateAll().then(res=>{
                    if(res) {
                        //alert('Form successfully submitted!')
                        //$('#successModal').modal();
                        $('#emailForm').hide();
                        $('#emailSuccess').fadeIn();
                    } else {

                    }
                })
            }
        },
        computed: {
            isFormDirty() {
                return Object.keys(this.fields).some(key => this.fields[key].dirty);
            }
        }
    });
</script>