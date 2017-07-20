<div class="column home-card is-one-quarter">
    <a href="">
        <div class="card card-equal-height">
            <div class="card-image">
                <figure class="image is-3by2">
                    <img src="http://via.placeholder.com/230x150" alt="Image">
                </figure>
            </div>
            <small class="has-text-right">{{ $property->status->name }}</small>
            <div class="card-content">
                <div class="media">
                    <div class="media-content">
                        <p class="title is-6">{{ $property->title }}</p>
                        <p class="subtitle is-8">{{ $property->address }}</p>
                    </div>
                </div>

                <div class="content">
                    <span class="card-price">
                        ${{ number_format($property->price, 2) }}
                    </span>
                    <br>
                </div>
            </div>
            <footer class="card-footer">
                <div class="card-footer-item">
                    <i class="material-icons">weekend</i> <span class="house-footer">{{ $property->bedrooms }}</span>
                </div>
                <div class="card-footer-item">
                    <i class="material-icons">hotel</i> <span class="house-footer">{{ $property->bathrooms }}</span>
                </div>
                <div class="card-footer-item">
                    <i class="material-icons">directions_car</i> <span class="house-footer">{{ $property->garages }}</span>
                </div>
                <div class="card-footer-item">
                    <i class="material-icons">favorite_border</i>
                </div>
            </footer>
        </div>
    </a>
</div>
