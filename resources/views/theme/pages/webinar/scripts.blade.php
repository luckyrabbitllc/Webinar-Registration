<script>
    $( document ).ready(function() {
        $(".navbar-collapse").remove();
    });

    Vue.use(VeeValidate);

    new Vue({
        el: '#emailForm',
        methods: {
            validateForm()  {
                this.$validator.validateAll().then(result => {
                    if (!result) {
                        // validation failed.
                        console.log(result);
                    }
                    // success stuff.
                }).catch(() => {
                    // something went wrong (non-validation related).
                    console.log(result);
                });
            },
            submitForm() {
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
        }
    });
</script>