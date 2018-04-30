<template lang="html">
  <div class="">
    <form v-on:submit.prevent="save()">
      <div class="form-group">
        <label for="title">Title</label>
        <input type="text" class="form-control" id="title" v-model="title" @keyup="sluger(title)">
      </div>
      <div class="form-group">
        <label for="slug">Slug</label>
        <input type="text" class="form-control" id="slug" v-model="slug">
      </div>
      <div class="form-group">
        <label for="image">Image</label>
        <uploader></uploader>
      </div>
      <button type="submit" class="btn btn-primary">Submit</button>
    </form>
    <router-link to="/">Back</router-link>
  </div>
</template>

<script>
export default {

  data(){
    return{
        id: '',
        title: '',
        slug: '',
        pathImage: '',
        edited: false
    }
  },

  methods: {
    save: function()
    {

      // insert new data
      if (!this.edited) {
        axios.post('/post', {
          title: this.title,
          pathImage: this.pathImage,
          slug: this.slug
        }).then(response => {
            this.title = ''
            this.pathImage = ''
            this.slug = ''
            this.$router.push('/')
        }).catch(err => {
          console.log(err);
        });
      }else{
        // update data
        axios.post('/post/'+this.id, {
          title: this.title,
          pathImage: this.pathImage,
          slug: this.slug
        }).then(response => {
          this.$router.push('/')
        })

      }
    },
    sluger: function(string){
      this.slug = this.title.replace(/ /g, '-');
    },
    handleFile: function(){
      console.log(this.$refs.file);
    }
  },
  mounted: function() {

    // check if id is exists
    const id = this.$route.params.postId
    if (id != null) {
      this.edited= true

      //to get data to edit

      axios.get('/post/'+id).then(response => {
        this.title = response.data.title;
        this.pathImage = response.data.path_image;
        this.slug = response.data.slug;
        this.id = response.data.id;
      })
    }
  }
}
</script>

<style lang="css">
</style>
