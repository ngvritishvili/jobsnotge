<template>
    <ais-index
        :app-id="angoliaAppId"
        :api-key="angoliaAppKey"
        index-name="job_offers"
    >


        <div class="row">

            <div class="col">

                <div class="jobs-end mt-5">
                    <div class="row">
                        <div class="col-md-6">
                            <ais-input class="search-keywords" placeholder="Search Keywords"></ais-input>
                            <ais-stats></ais-stats>
                        </div>
                        <div class="col-md-3">
                            <button class="category"><i class="fal fa-sliders-h mr-3"></i>Any Category</button>
                        </div>

                        <div class="col-md-3">
                            <button class="search-jobs">Search Jobs</button>
                        </div>

                    </div>
                </div>


                <ais-refinement-list
                    attribute-name="type"
                    :classNames="{
              'ais-refinement-list__item': 'checkbox'
            }"
                >
                    <h3 slot="header">Job Type</h3>
                </ais-refinement-list>


                <ais-price-range
                    attribute-name="salary"
                    :classNames="{

            }"

                ></ais-price-range>
                <div class="latest-jobs">
                    <template>
                        <h2>Jobs</h2>
                        <div class="row mt-5 jobs-list">
                            <div class="col-md-4">
                                <p>Job title</p>
                            </div>
                            <div class="col-md-2">
                                <p>by</p>
                            </div>
                            <div class="col-md-2">
                                <p>Type</p>
                            </div>
                            <div class="col-md-2">
                                <p>Salary</p>
                            </div>
                        </div>
                    </template>


                    <ais-results>

                        <template slot-scope="{result}">


                            <div class="row jobs">
                                <div class="col-md-4">
                                    <a :result="result" :href="('job/show/' + (result.id) )">

                                        <ais-highlight :result="result" attribute-name="job_title"></ais-highlight>

                                    </a>


                                </div>

                                <div class="col-md-2">
                                    <p class="blue">
                                        <ais-highlight :result="result" attribute-name="company_name"></ais-highlight>
                                    </p>
                                </div>
                                <div class="col-md-2">
                                    <p class="blue">
                                        <ais-highlight :result="result" attribute-name="type"></ais-highlight>
                                    </p>
                                </div>
                                <div class="col-md-2">
                                    <p>
                                        <ais-highlight :result="result" attribute-name="salary"></ais-highlight>
                                        <ais-highlight :result="result" attribute-name="currency"></ais-highlight>
                                    </p>
                                </div>


                                <div class="col-md-2 mt-2" v-if="jsVariable.CV === 'no' || !jsVariable.user === 'guest'">
                                    <button class="apply" @click="uploadCV" style="background-color:lightgray;">
                                        Apply
                                    </button>
                                </div>

                                <div class="col-md-2 mt-2" v-else>
                                    <button  class="apply" @click="axios.post('apply', {result})">Apply</button>
                                </div>
                            </div>


                        </template>


                    </ais-results>
                    <ais-pagination :padding="2"></ais-pagination>
                </div>

            </div>
        </div>

        <div class="touch mt-5">
            <div class="row mt-5">
                <div class="col-md-6">
                    <p>Enter Your Email</p>
                </div>
                <div class="col-md-6 text-center">
                    <button>Get In Touch</button>
                </div>
            </div>
        </div>

    </ais-index>
</template>

<script>


    export default {


        props: ['id'],
        mounted() {
            console.log('Component mounted.')
        },
        data() {

            return {

                company_id: '',
                jsVariable,
                page: 2,
                angoliaAppId: process.env.MIX_ALGOLIA_APP_ID,
                angoliaAppKey: process.env.MIX_ALGOLIA_SECRET,
            }


        },

        methods: {

            uploadCV: function () {
                alert('First Upload Your CV Please.');
            },


            apply() {
                this.errors = {};
                axios.post('apply', {id: this.id})
                    .then(response => {
                        alert('Message sent!');
                    }).catch(error => {
                        if (error.response.status === 422) {
                            this.errors = error.response.data.errors || {};
                        }
                    })
                    },



            // apply(){
            //     axios.post('apply' + this.id);
            //
            // },
        }


    }
</script>
