<template>
    <ais-index
        :app-id="angoliaAppId"
        :api-key="angoliaAppKey"
        index-name="job_offers"



    >
        <div class="row">

            <div class="col">
                <pre>{{ $data }}</pre>

                <div class="col-md-12">
                    <ais-input class="form-control col-md-2"></ais-input>

                </div>

                <ais-results >
                    <template slot-scope="{ result}">
                        <div class="card" >
                            <div class="card-header">
                                <a :href="result.path">
                                    <ais-highlight  :result="result" attribute-name="company_name"></ais-highlight>
                                </a>
                            </div>
                            <div class="card-body">
                                <ais-highlight :result="result" attribute-name="salary"></ais-highlight>
                            </div>
                        </div>
                        <p>
                        </p>
                    </template>
                </ais-results>
            </div>

        </div>
    </ais-index>

</template>

<script>



    export default {

        props: ['open'],
        mounted() {
            console.log('Component mounted.')
        },
        data() {

            return {

                page: 1,
                angoliaAppId: process.env.MIX_ALGOLIA_APP_ID,
                angoliaAppKey: process.env.MIX_ALGOLIA_SECRET,
            }


        },
        methods: {
            closeSearch() {
                EventBus.$emit('closeSearch');
            },

            loadMore(isVisible) {
                if (isVisible) {
                    this.page++;
                }
            },
        }


    }
</script>
