<template lang="pug">
.search-advanced.has-text-left
    .columns
        b-field(class='column is-half is-offset-one-quarter main-search')
            b-input(
                placeholder='Enter an address, city, zip code, or feature'
                type='search'
                icon-pack='fa'
                icon='search'
            )
            p.control: button.button(
                type='button'
                @click='advancedSearchShown = !advancedSearchShown'
            )
                b-icon(
                    icon-pack='fa'
                    icon='sliders'
                )
    .columns(v-if='advancedSearchShown')
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
                template(slot='tag', scope='props')
                    span.tag.is-success
                        span {{ props.option.name  }}
                        button.delete.is-small(
                            type='button'
                            @click='props.remove(props.option)'
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
                template(slot='tag', scope='props')
                    span.tag.is-success
                        span {{ props.option.name  }}
                        button.delete.is-small(
                            type='button'
                            @click='props.remove(props.option)'
                        )
    .columns(v-if='advancedSearchShown')
        b-field(
            label='Price Range'
            class='column is-one-quarter is-offset-one-quarter'
        )
            vue-slider(
                v-model='priceSlider.value'
                v-bind='priceSlider'
            )
        b-field(
            label='Property Size (in sq. ft.)'
            class='column is-one-quarter'
        )
            vue-slider(
                v-model='areaSlider.value'
                v-bind='areaSlider'
            )
    .columns.range-slider(v-if='advancedSearchShown')
        b-field.column.is-one-quarter.is-offset-one-quarter
            span ${{ priceSlider.value[0] }}
            span ${{ priceSlider.value[1] }}
        b-field.column.is-one-quarter
            span {{ areaSlider.value[0] }}sf
            span {{ areaSlider.value[1] }}sf
</template>
<script>
import Multiselect from 'vue-multiselect'
import vueSlider from 'vue-slider-component'
import 'vue-multiselect/dist/vue-multiselect.min.css'

export default {
    components: {
        Multiselect,
        vueSlider
    },

    data() {
        return {
            advancedSearchShown: false,
            status: null,
            statuses: [],
            type: null,
            types: [],
            priceSlider: {
                value: [
                    50000,
                    200000,
                ],
                tooltip: 'never',
                min: 1000,
                max: 500000,
                processStyle: {
                    backgroundColor: '#999',
                },
            },
            areaSlider: {
                value: [
                    500,
                    2000,
                ],
                tooltip: 'never',
                min: 100,
                max: 10000,
                processStyle: {
                    backgroundColor: '#999',
                },
            },
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
