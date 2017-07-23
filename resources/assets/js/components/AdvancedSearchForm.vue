<template lang="pug">
    div(class='search-advanced columns')
        b-field(label='Property Status' class='column')
            multiselect(
                v-model='value'
                :options='options'
                :multiple='true'
                :close-on-select='false'
                :clear-on-select='false'
                :hide-selected='true'
                :preserve-search='true'
                placeholder='Status'
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
        Multiselect
    },

    data() {
        return {
            value: null,
            options: []
        }
    },

    mounted() {
        axios
            .get('/properties/status')
            .then(response => this.options = response.data['statuses']);
    }
}
</script>
