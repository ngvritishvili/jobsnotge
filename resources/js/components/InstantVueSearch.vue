<template>
    <ais-index
        app-id="latency"
        api-key="3d9875e51fbd20c7754e65422f7ce5e1"
        index-name="bestbuy"
    >

        <ais-search-box v-model="input"></ais-search-box>
        <ais-results>
            <template slot-scope="{ result }">
                <h2>
                    <ais-highlight :result="result" attribute-name="name"></ais-highlight>
                </h2>

                <ul>

                    <li>{{ result.name }}</li>

                </ul>
            </template>
        </ais-results>
    </ais-index>
</template>

<script>

    export default {
        data(){
            return {
                input:'',
            }
        },

    }


</script>
