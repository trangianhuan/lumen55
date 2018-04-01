<template>
    <div>
        <div id="timer" class="text-center">
            <span id="minute">{{ minutes }}</span>
            <span id="colon">:</span>
            <span id="seconds">{{ seconds }}</span>
        </div>

        <div id="buttons" class="justify-content-center">
            <!--  START BUTTON    -->
            <button id="start" class="btn btn-lg btn-primary" v-if="!timer" @click="startTimer">
                <i class="far fa-play-circle" aria-hidden="true"></i>
            </button>

            <!--   PAUSE BUTTON   -->
            <button id="stop" class="btn btn-lg btn-warning" v-if="timer" @click="stopTimer">
                <i class="far fa-pause-circle"></i>
            </button>

            <!--  RESET BUTTON   -->
            <button id="reset" class="btn btn-lg btn-default" v-if="resetButton"  @click="resetTimer">
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
                totalTime: (20 * 60),
                resetButton: false,
            }
        },
        methods:{
            startTimer: function() {
                this.timer = setInterval(()=>this.countdown(), 1000);
                this.resetButton = true;
            },
            stopTimer: function() {
                clearInterval(this.timer);
                this.timer = null;
                this.resetButton = true;
            },
            resetTimer: function() {
                clearInterval(this.timer);
                this.totalTime = (20 * 60);
                this.resetButton = false;
                this.timer = null;
            },
            padTime: function(time) {
                return (time < 10 ? '0' : '') + time;
            },
            countdown: function() {
                this.totalTime--;
            }
        },
        destroyed(){
            clearInterval(this.timer);
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
    .title{
        text-align: center;
        margin: 30px;
    }
    #timer{
        font-size: 200px;
        color:gray;
    }
    #buttons{
        display: flex;
    }
    button{
        margin: 2px;
    }
</style>