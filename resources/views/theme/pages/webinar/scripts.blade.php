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
                        var email = $('#s').val();
                        signupEvent(email, {webinar:'example'});
                        console.log('signup successful')
                    } else {
                        console.log('validation failed');
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

    function signupEvent(email, data){
        $.get('/api/analytics/event', { event_type:'webcast signup',  <?php if(\Auth::user()) { $user = \Auth::user(); echo "user_id:$user->id, user_name:'$user->name',"; } ?> user_email:email, data:data }, function(data) { });
        return false; // prevent default
    }
</script>