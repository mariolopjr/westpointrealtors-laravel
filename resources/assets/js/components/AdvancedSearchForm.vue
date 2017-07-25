<template lang="pug">
div(class='search-advanced has-text-left')
    div(class='columns')
        b-field(class='column is-half is-offset-one-quarter main-search')
            b-input(
                placeholder='Enter an address, city, zip code, or feature'
                type='search'
                icon-pack='fa'
                icon='search'
            )
            p.control: button.button: b-icon(
                icon-pack='fa'
                icon='sliders'
            )
    div(class='columns')
        b-field(
            label='Property Status'
            class='column is-one-quarter is-offset-one-quarter'
        )
            multiselect(
                v-model='status'
                :options='statuses'
                :multiple='true'
                :close-on-select='false'
                :clear-on-select='false'
                :hide-selected='true'
                :preserve-search='true'
                placeholder='Property Status'
                label='name'
                track-by='id'
            )
                template(slot="tag", scope="props")
                    span.tag.is-success
                        span {{ props.option.name  }}
                        button.delete.is-small(
                            @click="props.remove(props.option)"
                        )
        b-field(
            label='Property Type'
            class='column is-one-quarter'
        )
            multiselect(
                v-model='type'
                :options='types'
                :multiple='true'
                :close-on-select='false'
                :clear-on-select='false'
                :hide-selected='true'
                :preserve-search='true'
                placeholder='Property Type'
                label='name'
                track-by='id'
            )
                template(slot="tag", scope="props")
                    span.tag.is-success
                        span {{ props.option.name  }}
                        button.delete.is-small(
                            @click="props.remove(props.option)"
                        )
</template>
<script>
import Multiselect from 'vue-multiselect'
import 'vue-multiselect/dist/vue-multiselect.min.css'

export default {
    components: {
        Multiselect,
    },

    data() {
        return {
            status: null,
            statuses: [],
            type: null,
            types: [],
        }
    },

    mounted() {
        axios
            .get('/properties/status')
            .then(response => this.statuses = response.data['statuses']);

        axios
            .get('/properties/type')
            .then(response => this.types = response.data['types'])
    }
}
</script>
