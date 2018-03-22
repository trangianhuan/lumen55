<template>
    <div>
        <div v-for="review in reviews">
            <div class="review-map">{{review.comment}}</div>
        </div>

        <div class="rv" v-for="review in reviews">
          <div class="rv-map">
            {{review.map}}
          </div>
          <div class="rv-comment">
            <p class="rv-comment-child" v-for="comment in review.comments">
              {{comment.comment}}
            </p>
          </div>
          <div class="rv-btn-add">
            <button class="btn btn-primary ">+</button>
            <div class="rv-form">
                <textarea rows="5" class="form-control" name="comment"></textarea>
            </div>
          </div>
        </div>

    </div>
</template>
<script>
    import axios from 'axios';
    import Review from './review/Review.vue';
    export default {
      components: { Review},
      data () {
        return {
            reviews: []
        }
      },
      mounted() {
        axios.get('/review').then(response => {
        console.log(response.data);
            this.reviews = response.data;
        });
      }
    }
</script>
<style lang="scss">
    .rv{
      position: relative;
      display: flex;
      flex-wrap: wrap;
      border:1px solid #ddd;
      margin:15px;
      border-radius:5px;
      box-shadow: 5px 5px 10px gray;
    }
    .rv-map{
      height: 200px;
      width: 250px;
      background-color: #ddd;
      margin: 5px 0px 5px 10px;
    }
    .rv-comment{

    }
    .rv-comment-child{
      margin:5px 10px;
      border:1px solid #ddd;
      border-radius:5px;
      padding:10px;
    }
    .rv-btn-add{
      position: absolute;
      right: 10px;
      top: 5px;
      &:hover .rv-form{
        visibility: visible;
      }
    }
    .rv-form{
        border:1px solid #ddd;
        border-radius: 5px;
        padding:5px;
        visibility: hidden;
        position: absolute;
        right: 45px;
        top: 0;
        width: 300px;
    }
    .rv-form:after {
        content: ' ';
        padding: 10px;
        height: 40px;
        top: 0;
        right: -13px;
        position: absolute;
    }
</style>