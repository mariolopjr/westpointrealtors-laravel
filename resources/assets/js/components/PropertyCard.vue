<template lang="pug">
.column.home-card.is-one-quarter: a
        .card.card-equal-height
            .card-image
                figure.image.is-3by2
                    img(
                        src='http://via.placeholder.com/230x150'
                        alt='Image'
                    )
            small.has-text-right {{ options.status.name}}
            .card-content
                .media
                    .media-content
                        p.title.is-6 {{ options.title}}
                        p.subtitle.is-8 {{ options.address }}
                .content.has-text-centered
                    span.card-price {{ options.price }}
                    br
            footer.card-footer
                .card-footer-item
                    i(
                        class='fa fa-bed'
                        aria-hidden='true'
                    )
                        span.house-footer {{ options.bedrooms }}
                .card-footer-item
                    i(
                        class='fa fa-shower'
                        aria-hidden='true'
                    )
                        span.house-footer {{ options.bathrooms }}
                .card-footer-item
                    i(
                        class='fa fa-car'
                        aria-hidden='true'
                    )
                        span.house-footer {{ options.garages }}
                .card-footer-item.favorite-icon
                    i(
                        class='fa fa-heart-o'
                        aria-hidden='true'
                    )
</template>
<script>
export default {
    data() {
        return {
            options: []
        }
    },

    mounted() {
        axios
            .get('/properties')
            .then(response => this.options = response.data);
    }
}
</script>
