<template>
    <div>
        <button class="btn btn-primary" @click="showAdd">Add review place</button>
        <div id="form-add-rv">
            <br/>
            <div class="" id="rv-new-input">
                <input type="text" name="search" class="form-control col-6" id="searchTextField"/>
                <input type="text" name="comment" class="form-control col-6" id="comment"/>
            </div>
            <Map name="mapadd" search="searchTextField"/>
        </div>

        <div class="rv" v-for="review in reviews">
          <div class="rv-map">
            {{review.map}}
          </div>
          <div class="rv-comment">
            <p class="rv-name">{{review.name}}</p>
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
    import Map from './review/Map.vue';
    export default {
      components: { Review, Map},
      data () {
        return {
            reviews: [],
            isShow: false,
        }
      },
      mounted() {
        axios.get('/api/reviews').then(response => {
            this.reviews = response.data;
        });
      },
      methods: {
        showAdd: function(){
            this.isShow = !this.isShow;
            if(this.isShow)
                $('#form-add-rv').hide();
            else
                $('#form-add-rv').show();
        },
        createRiview(){
          axios.post('/user', {
            map: 'Fred',
            comment: 'Flintstone'
          })
          .then(function (response) {
            console.log(response);
          })
          .catch(function (error) {
            console.log(error);
          });
        }
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
      padding:5px 10px;
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
    .rv-name{
        font-weight: 600;
        padding: 5px 10px 0 0;
        margin: 0 0 15px 10px;
        text-transform: uppercase;
    }
    .map-area{
        position: relative;
    }
</style>