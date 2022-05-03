<?php $bgColor = get_sub_field('bg_colour');
$noMobile = get_sub_field('hide_on_mobile');
$advertImage = get_sub_field('background_image'); ?>
<section
    class="itin-route-map <?php if($bgColor == true): echo 'alt-bg'; endif; ?> <?php the_sub_field('margin_size'); ?> <?php if($noMobile == true): echo 'no-mob'; endif; ?>"
    <?php if( get_sub_field('section_id') ): ?>id="<?php the_sub_field('section_id'); ?>" <?php endif; ?>>
    <div class="row <?php the_sub_field('column_size'); ?>">
        <div class="itin-map">
            <div id="map"></div>
            <div class="overlay">
                <button id="replay">Replay</button>
            </div>
        </div>
    </div>
</section>
<script>
// TO MAKE THE MAP APPEAR YOU MUST
// ADD YOUR ACCESS TOKEN FROM
// https://account.mapbox.com
mapboxgl.accessToken = 'pk.eyJ1IjoiYW5keXBhZGRvY2siLCJhIjoiY2tjb3JnYXo3MGg3aTJ1bGQ3Z3hsY3RkaCJ9.Nuw5WXsnHTCDJhtjXzryUw';
var map = new mapboxgl.Map({
    container: 'map',
    style: 'mapbox://styles/mapbox/streets-v11',
    center: [<?php 
$centreLocation = get_field('centre_map_point');
if( $centreLocation ): ?>
        <?php echo esc_attr($centreLocation['lng']); ?>, <?php echo esc_attr($centreLocation['lat']); ?>
        <?php endif; ?>
    ],
    zoom: 7
});

//HERE
var size = 100;

// implementation of CustomLayerInterface to draw a pulsing dot icon on the map
// see https://docs.mapbox.com/mapbox-gl-js/api/#customlayerinterface for more info
var pulsingDot = {
    width: size,
    height: size,
    data: new Uint8Array(size * size * 4),

    // get rendering context for the map canvas when layer is added to the map
    onAdd: function() {
        var canvas = document.createElement('canvas');
        canvas.width = this.width;
        canvas.height = this.height;
        this.context = canvas.getContext('2d');
    },

    // called once before every frame where the icon will be used
    render: function() {
        var duration = 1000;
        var t = (performance.now() % duration) / duration;

        var radius = (size / 2) * 0.3;
        var outerRadius = (size / 2) * 0.7 * t + radius;
        var context = this.context;

        // draw outer circle
        context.clearRect(0, 0, this.width, this.height);
        context.beginPath();
        context.arc(
            this.width / 2,
            this.height / 2,
            outerRadius,
            0,
            Math.PI * 2
        );
        context.fillStyle = 'rgba(1, 55, 32,' + (1 - t) + ')';
        context.fill();

        // draw inner circle
        context.beginPath();
        context.arc(
            this.width / 2,
            this.height / 2,
            radius,
            0,
            Math.PI * 2
        );
        context.fillStyle = 'rgba(1, 50, 32, 1)';
        context.strokeStyle = 'white';
        context.lineWidth = 2 + 4 * (1 - t);
        context.fill();
        context.stroke();

        // update this image's data with data from the canvas
        this.data = context.getImageData(
            0,
            0,
            this.width,
            this.height
        ).data;

        // continuously repaint the map, resulting in the smooth animation of the dot
        map.triggerRepaint();

        // return `true` to let the map know that the image was updated
        return true;
    }
};


//HERE



<?php if( have_rows('days_plan') ): ?>
<?php while( have_rows('days_plan') ): the_row();
$location = get_sub_field('location');
if( $location ): ?>
var origin<?php echo get_row_index(); ?> = [<?php echo esc_attr($location['lng']); ?>,
    <?php echo esc_attr($location['lat']); ?>
];

<?php endif; ?>
<?php endwhile; ?>
<?php endif; ?>


// // San Francisco
// var origin = [-122.414, 37.176];
// // San Francisco
// var origin2 = [-99.414, 37.776];
// // San Francisco
// var origin3 = [-89.414, 37.776];
// // San Francisco
// var origin4 = [-82.414, 32.776];
// // San Francisco
// var origin5 = [-80.414, 42.776];


// // Washington DC
// var destination = [-77.032, 38.913];

// A simple line from origin to destination.
var route = {
    'type': 'FeatureCollection',
    'features': [{
        'type': 'Feature',
        'geometry': {
            'type': 'LineString',
            'coordinates': [<?php if( have_rows('days_plan') ): ?>
                <?php while( have_rows('days_plan') ): the_row();
$location = get_sub_field('location');
if( $location ): ?>origin<?php echo get_row_index(); ?>,


                <?php endif; ?>
                <?php endwhile; ?>
                <?php endif; ?>
            ]
        }
    }]
};




// A single point that animates along the route.
// Coordinates are initially set to origin.
var point = {
    'type': 'FeatureCollection',
    'features': [{
        'type': 'Feature',
        'properties': {},
        'geometry': {
            'type': 'Point',
            'coordinates': origin
        }
    }]
};

// Calculate the distance in kilometers between route start/end point.
var lineDistance = turf.lineDistance(route.features[0], 'kilometers');

var arc = [];

// Number of steps to use in the arc and animation, more steps means
// a smoother arc and animation, but too many steps will result in a
// low frame rate
var steps = 500;

// Draw an arc between the `origin` & `destination` of the two points
for (var i = 0; i < lineDistance; i += lineDistance / steps) {
    var segment = turf.along(route.features[0], i, 'kilometers');
    arc.push(segment.geometry.coordinates);
}

// Update the route with calculated arc coordinates
route.features[0].geometry.coordinates = arc;

// Used to increment the value of the point measurement against the route.
var counter = 0;

map.on('load', function() {

    //HERE
    map.addImage('pulsing-dot', pulsingDot, {
        pixelRatio: 2
    });

    map.addSource('points', {
        'type': 'geojson',
        'data': {
            'type': 'FeatureCollection',
            'features': [

                <?php if( have_rows('days_plan') ): ?>
                <?php while( have_rows('days_plan') ): the_row();
$location = get_sub_field('location');
if( $location ): ?> {
                    'type': 'Feature',
                    'geometry': {
                        'type': 'Point',
                        'coordinates': [<?php echo esc_attr($location['lng']); ?>,
                            <?php echo esc_attr($location['lat']); ?>
                        ]
                    },
                    'properties': {
                        'title': '<?php the_sub_field('days');?>'
                    }
                },

                <?php endif; ?>
                <?php endwhile; ?>
                <?php endif; ?>

            ]
        }
    });



    //HERE





    // Add a source and layer displaying a point which will be animated in a circle.
    map.addSource('route', {
        'type': 'geojson',
        'data': route
    });


    map.addSource('point', {
        'type': 'geojson',
        'data': point
    });

    map.addLayer({
        'id': 'route',
        'source': 'route',
        'type': 'line',
        'paint': {
            'line-width': 2,
            'line-color': '#007cbf'
        }
    });
    map.addLayer({
        'id': 'points',
        'type': 'symbol',
        'source': 'points',
        'layout': {
            'icon-image': 'pulsing-dot',
            'text-field': ['get', 'title'],
            'text-font': [
                'Open Sans Regular',
                'Arial Unicode MS Regular'
            ],
            'text-offset': [1, 0],
            'text-anchor': 'left'
        }
    });

    map.addLayer({
        'id': 'point',
        'source': 'point',
        'type': 'symbol',
        'layout': {
            'icon-image': 'pulsing-dot',
            'icon-rotate': ['get', 'bearing'],
            'icon-rotation-alignment': 'map',
            'icon-allow-overlap': true,
            'icon-ignore-placement': true

        }
    });

    function animate() {
        // Update point geometry to a new position based on counter denoting
        // the index to access the arc.
        point.features[0].geometry.coordinates =
            route.features[0].geometry.coordinates[counter];

        // Calculate the bearing to ensure the icon is rotated to match the route arc
        // The bearing is calculate between the current point and the next point, except
        // at the end of the arc use the previous point and the current point
        point.features[0].properties.bearing = turf.bearing(
            turf.point(
                route.features[0].geometry.coordinates[
                    counter >= steps ? counter - 1 : counter
                ]
            ),
            turf.point(
                route.features[0].geometry.coordinates[
                    counter >= steps ? counter : counter + 1
                ]
            )
        );

        // Update the source with this new data.
        map.getSource('point').setData(point);

        // Request the next frame of animation so long the end has not been reached.
        if (counter < steps) {
            requestAnimationFrame(animate);
        } else {
            map.removeLayer('point');
        }


        counter = counter + 1;

    }




    document
        .getElementById('replay')
        .addEventListener('click', function() {

            map.addLayer({
                'id': 'point',
                'source': 'point',
                'type': 'symbol',
                'layout': {
                    'icon-image': 'airport-15',
                    'icon-rotate': ['get', 'bearing'],
                    'icon-rotation-alignment': 'map',
                    'icon-allow-overlap': true,
                    'icon-ignore-placement': true
                }
            });
            // Set the coordinates of the original point back to origin
            point.features[0].geometry.coordinates = origin;

            // Update the source layer
            map.getSource('point').setData(point);

            // Reset the counter
            counter = 0;

            // Restart the animation.
            animate(counter);
        });

    // Start the animation.
    animate(counter);
});
</script>