<template>
    <div class="container">
        <div class="row">
            <div class="col-lg-6 col-lg-offset-3">
                <input type="text" class="form-control" placeholder="search for other users" v-model="query" @keyup.enter="search()">
                <br>
                <div class="row" v-if="results.length">
                    <div class="text-center" v-for="user in results">
                        <img :src="user.avatar" alt="" width="50px" height="50px" class="searched-user">
                        <a :href="profile_url(user.slug)">
                            <h4 class="text-center">{{ user.name }}</h4>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    var algoliasearch = require('algoliasearch')

    var client = algoliasearch('78HQR4QG74', 'd620a4553e27075698aed7614a5cdea7')

    var index = client.initIndex('users')

    export default {
        mounted() {

        },
        data() {
            return {
                query: '',
                results: []
            }
        },
        methods: {
            search() {
                index.search(this.query, (err, content) => {
                    this.results = content.hits
                })
            },
            profile_url(slug) {

                const url = "http://social.dev/profile/"

                return url + slug

            }
        },
        computed: {

        }
    }
</script>

<style>
    .searched-user{
        border-radius: 50%;
    }
</style>
