<template>
    <div>
        <button class="btn btn-primary"  @click="showAdd">Add review place</button>
        <div id="form-add-rv" v-if="isShow">
            <br/>
            <Map name="mapadd" search="searchTextField" @setLocation="loca = $event"/>
            <div class="p-t-15" id="rv-new-input">
              <label for="name">Seach location</label>
                <input type="text" name="search" class="form-control col-6" id="searchTextField"/>
              <label for="name">Name</label>
                <input type="text" name="name" class="form-control col-6" v-model="name" id="name"/>
              <label for="comment">Comment</label>
                <input type="text" name="comment" class="form-control col-6" v-model="comment" id="comment"/>
              
              <button class="btn btn-primary" @click="createReview">Save</button>
            </div>
        </div>

      <div class="listStore justify-content-center">
        <div class="rv col-sm-5" v-for="store in stores">
          <div class="rv-map">
            <Map :key="store.id" :name="'storeMap' + store.id" :mapLoca="store.map"/>
          </div>

          <div class="rv-comment">
            <p class="rv-name">{{store.name}}</p>
            <p class="rv-comment-child" v-for="comment in store.comments">
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
    </div>
</template>
<script>
    import axios from 'axios';
    import Map from './review/Map.vue';
    export default {
      components: { Map},
      data () {
        return {
            stores: [],
            isShow: false,
            loca:null,
            name: null,
            comment: null
        }
      },
      mounted() {
        this.getList();
      },
      methods: {
        showAdd: function(){
            this.isShow = !this.isShow;
        },
        getList(){
          axios.get('/api/stores').then(response => {
              this.stores = response.data;
            });
        },
        createReview(){
          var that = this;
          axios.post('/api/stores', {
            name: this.name,
            comment: this.comment,
            map: this.loca
          })
          .then(function (response) {
            that.getList();
          })
          .catch(function (error) {
            console.log(error);
          });
        }
      }
    }
</script>
<style lang="scss">
    .listStore{
      display:flex;
      flex-wrap:wrap;
    }
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
      height: 320px;
      width: 330px;
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