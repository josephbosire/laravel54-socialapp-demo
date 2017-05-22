<template>
    <div >
        <hr>
        <p class="text-center" v-for="like in post.likes">
            <img :src="like.user.avatar"  width="40px" height="40px" alt="" class="avatar-like">
        </p>
        <hr>
        <button class="btn btn-primary" v-if="!auth_user_likes_post" @click="like()">Like this post</button>
        <button class="btn btn-danger" v-else @click="unlike()">Unlike this post</button>
    </div>
</template>

<script>
    export default {
        mounted(){

        },
        props: ['id'],
        computed: {
            post() {
                return this.$store.state.posts.find((post)=>{
                    return post.id == this.id;
                });
            },
            likes(){
                let likers = [];
                this.post.likes.forEach((like) => {
                    likers.push(like.user.id);
                });
                return likers;
            },
            auth_user_likes_post(){
                let check_index = this.likes.indexOf(this.$store.state.auth_user.id);
                return check_index != -1;
            }
        },
        methods: {
            like(){
                axios.get('/like/'+this.id).then((resp) => {
                    this.$store.commit('update_post_likes',  {
                        id: this.id,
                        like: resp.data
                    });
                    noty({
                        type: 'success',
                        layout: 'bottomLeft',
                        text: 'Successfully liked post'
                    });
                });
            },
            unlike(){
               axios.get('/unlike/'+this.id).then((resp) => {
                    this.$store.commit('unlike_post', {
                        post_id: this.id,
                        like_id: resp.data
                        });
                    noty({
                        type: 'success',
                        layout: 'bottomLeft',
                        text: 'Successfully unliked post'
                    });
                });
            }
        }
    }
</script>

<style>
    .avatar-like {
        border-radius: 50%
    }
</style>