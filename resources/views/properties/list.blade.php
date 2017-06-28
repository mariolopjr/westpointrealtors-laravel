<div class="columns">
    <div class="column is-two-thirds home-card">
        <a href="">
            <div class="card card-equal-height">
                <small class="has-text-right">{{ $property->status->name }}</small>
                <div class="card-content">
                    <div class="media">
                        <div class="media-left">
                            <figure class="image">
                                <img src="http://via.placeholder.com/230x150" alt="Image">
                            </figure>
                        </div>
                        <div class="media-content">
                            <p class="title is-6">{{ substr($property->title, 0, 45) . "..." }}</p>
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
</div>