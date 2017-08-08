<template>
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <transition name="fade" 
                    enter-class="animated fadeIn" 
                    leave-active-class="animated fadeOutUp"
                >
                    <div class="alert alert-warning" role="alert" v-show="show" v-cloak>
                          <strong>Warning!</strong> {{ body }}
                    </div>
                </transition>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        props: ['message'],

        data() {
            return {
                body: '',
                show: false
            }
        },

        created() {
            if (this.message) {
                this.flash(this.message);
            }

            window.events.$on('flash', (message) => {
                this.flash(message);
            })
        },

        methods: {
            flash(message) {
                this.body = message;
                this.show = true;

                this.hide()
            },

            hide() {
               setTimeout(() => {
                    this.show = false;
                }, 3000); 
            }
        }
    }
</script>
