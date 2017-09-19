<div class="column home-card is-one-quarter">
    <a href="{{ url('/properties/' . $property->slug) }}">
        <div class="card card-equal-height">
            <div class="card-image">
                <figure class="image is-3by2">
                    <img src="{{ url($property->getFirstMediaUrl('images', 'thumb')) }}" alt="House image">
                </figure>
            </div>
            <small class="has-text-right is-uppercase">{{ $property->status->name }}</small>
            <div class="card-content">
                <div class="media">
                    <div class="media-content">
                        <p class="title is-6">{{ $property->title }}</p>
                        <p class="subtitle is-8">{{ $property->address }}</p>
                    </div>
                </div>

                <div class="content has-text-centered">
                    <span class="card-price">
                        ${{ number_format($property->price, 2) }}
                    </span>
                    <br>
                </div>
            </div>
            <footer class="card-footer">
                <div class="card-footer-item">
                    <i class="fa fa-bed" aria-hidden="true"></i> <span class="house-footer">{{ $property->bedrooms }}</span>
                </div>
                <div class="card-footer-item">
                    <i class="fa fa-shower"></i> <span class="house-footer">{{ $property->bathrooms }}</span>
                </div>
                <div class="card-footer-item">
                    <i class="fa fa-car"></i> <span class="house-footer">{{ $property->garages }}</span>
                </div>
                <div class="card-footer-item favorite-icon">
                    <i class="fa fa-heart-o"></i>
                </div>
            </footer>
        </div>
    </a>
</div>
