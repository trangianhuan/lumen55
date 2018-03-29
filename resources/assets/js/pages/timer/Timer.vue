<template>
    <div>
        <h2 class="title">{{title}}</h2>
        <div id="timer">
            <span id="minute">{{ minutes }}</span>
            <span id="colon">:</span>
            <span id="seconds">{{ seconds }}</span>
        </div>

        <!--  THE BUTTONS  -->
        <div id="buttons">
            <!--  START BUTTON    -->
            <button id="start" class="button is-dark is-large" @click="startTimer">
                <i class="far fa-play-circle"></i>
            </button>

            <!--   PAUSE BUTTON   -->
            <button id="stop" class="button is-dark is-large" @click="stopTimer">
                <i class="far fa-pause-circle"></i>
            </button>

            <!--  RESET BUTTON   -->
            <button id="reset" class="button is-dark is-large">
                <i class="fas fa-undo"></i>
            </button>
        </div>
    </div>
</template>
<script>
    export default{
        data(){
            return {
                timer: null,
                totalTime: (11 * 60),
                resetButton: false,
                title: "Let the countdown begin!!"
            }
        },
        methods:{
            startTimer: function() {
                this.timer = setInterval(()=>this.countdown(), 1000);
            },
            stopTimer: function() {
                clearInterval(this.timer);
            },
            resetTimer: function() {

            },
            padTime: function(time) {
                return (time < 10 ? '0' : '') + time;
            },
            countdown: function() {
                this.totalTime--;
            }
        },
        computed:{
            minutes: function() {
                return this.padTime(Math.floor(this.totalTime / 60));
            },
            seconds: function() {
                return this.padTime(this.totalTime - (this.minutes * 60));
            }
        }
    }
</script>
<style>
</style>