<template lang="html">
  <div class="">
    <router-link to="/create">crate</router-link>
    <table class="table">
    <thead>
      <tr>
        <th scope="col">#</th>
        <th scope="col">Title</th>
        <th scope="col">Image</th>
        <th scope="col">Slug</th>
        <th scope="col">Action</th>
      </tr>
    </thead>
    <tbody>
      <tr v-for="(post, key) in posts">
        <td>{{key+1}}</td>
        <td>{{post.title}}</td>
        <td>{{post.path_image}}</td>
        <td>{{post.slug}}</td>
        <td> <router-link :to="{path: '/edit/'+post.id}">edit</router-link> || <a href="" @click.prevent="deletePost(post.id, key)">Delete</a></td>
      </tr>
    </tbody>
  </table>
</div>
</template>

<script>
export default {
  name: 'post',
  data() {
    return {
      posts: [],
      showForm: false
    }
  },
  mounted(){
    axios.get('/post').then(response => {
      this.posts = response.data;
    })
  },

  methods: {
    edit: function(id){
      this.showForm = true;
    },
    deletePost: function(ids, key){

      if(confirm('Are You Sure To delete?')){
        axios.delete(`/post/${ids}`).then(response => {
          this.posts.splice(key, 1);
        })
      }
    }
  }
}
</script>

<style lang="css">
</style>
