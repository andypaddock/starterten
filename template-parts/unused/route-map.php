<div class="itin-map">
    <div id="map"></div>
    <div class="overlay">
        <button class="grey-out" id="enlarge">[click to expand map]</button>
    </div>
</div>
<script>
// TO MAKE THE MAP APPEAR YOU MUST
// ADD YOUR ACCESS TOKEN FROM
// https://account.mapbox.com
mapboxgl.accessToken = 'pk.eyJ1IjoiYW5keXBhZGRvY2siLCJhIjoiY2tjb3JnYXo3MGg3aTJ1bGQ3Z3hsY3RkaCJ9.Nuw5WXsnHTCDJhtjXzryUw';
var map = new mapboxgl.Map({
    container: 'map',
    style: 'mapbox://styles/mapbox/streets-v11',
    center: [<?php 
$centreLocation = get_field('centre_map_point');?>
        <?php echo esc_attr($centreLocation['lng']); ?>, <?php echo esc_attr($centreLocation['lat']); ?>
    ],
    zoom: <?php the_field('map_zoom');?>
});





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



const camps = {
    "type": "FeatureCollection",
    "features": [
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
                'title': '<?php the_sub_field('title');?>',
                'days': '<?php the_sub_field('days');?>',
            }
        },

        <?php endif; ?>
        <?php endwhile; ?>
        <?php endif; ?>




    ]
};


/**
 * Assign a unique id to each store. You'll use this `id`
 * later to associate each point on the map with a listing
 * in the sidebar.
 */
camps.features.forEach((camp, i) => {
    camp.properties.id = i;
});

/**
 * Wait until the map loads to make changes to the map.
 */






map.on('load', function() {


    map.addSource('places', {
        type: 'geojson',
        data: camps
    });
    addMarkers();

    /**
     * Add a marker to the map for every store listing.
     **/
    function addMarkers() {
        /* For each feature in the GeoJSON object above: */
        for (const marker of camps.features) {
            /* Create a div element for the marker. */
            const el = document.createElement('div');
            /* Assign a unique `id` to the marker. */
            el.id = `marker-${marker.properties.id}`;
            /* Assign the `marker` class to each marker for styling. */
            el.className = 'marker';
            el.setAttribute('data-slide', `${marker.properties.id}`);

            /**
             * Create a marker using the div element
             * defined above and add it to the map.
             **/
            new mapboxgl.Marker(el, {
                    offset: [0, -23]
                })
                .setLngLat(marker.geometry.coordinates)
                .addTo(map);

            /**
             * Listen to the element and when it is clicked, do three things:
             * 1. Fly to the point
             * 2. Close all other popups and display popup for clicked store
             * 3. Highlight listing in sidebar (and remove highlight for all other listings)
             **/
            el.addEventListener('click', (e) => {
                /* Fly to the point */
                flyToStore(marker);
                /* Close all other popups and display popup for clicked store */
                createPopUp(marker);
                /* Highlight listing in sidebar */
                const activeItem = document.getElementsByClassName('active');
                e.stopPropagation();
                if (activeItem[0]) {
                    activeItem[0].classList.remove('active');
                }
                const listing = document.getElementById(
                    `listing-${marker.properties.id}`
                );
                listing.classList.add('active');
            });
        }
    }

    function buildLocationList(camps) {
        for (const camp of camps.features) {
            /* Add a new listing section to the sidebar. */
            const listings = document.getElementById('listings');
            const listing = listings.appendChild(document.createElement('div'));
            /* Assign a unique `id` to the listing. */
            listing.id = `listing-${camp.properties.id}`;
            /* Assign the `item` class to each listing for styling. */
            listing.className = 'item';

            /* Add the link to the individual listing created above. */
            const link = listing.appendChild(document.createElement('a'));
            link.href = '#';
            link.className = 'title';
            link.id = `link-${camp.properties.id}`;
            link.innerHTML = `${camp.properties.address}`;

            /* Add details to the individual listing. */
            const details = listing.appendChild(document.createElement('div'));
            details.innerHTML = `${camp.properties.city}`;
            if (store.properties.phone) {
                details.innerHTML += ` &middot; ${camp.properties.phoneFormatted}`;
            }

            /**
             * Listen to the element and when it is clicked, do four things:
             * 1. Update the `currentFeature` to the store associated with the clicked link
             * 2. Fly to the point
             * 3. Close all other popups and display popup for clicked store
             * 4. Highlight listing in sidebar (and remove highlight for all other listings)
             **/
            link.addEventListener('click', function() {
                for (const feature of camps.features) {
                    if (this.id === `link-${feature.properties.id}`) {
                        flyToStore(feature);
                        createPopUp(feature);
                    }
                }
                const activeItem = document.getElementsByClassName('active');
                if (activeItem[0]) {
                    activeItem[0].classList.remove('active');
                }
                this.parentNode.classList.add('active');
            });
        }
    }

    /**
     * Use Mapbox GL JS's `flyTo` to move the camera smoothly
     * a given center point.
     **/
    function flyToStore(currentFeature) {
        map.flyTo({
            center: currentFeature.geometry.coordinates,
            zoom: 6
        });
    }
    /**
     * Create a Mapbox GL JS `Popup`.
     **/
    function createPopUp(currentFeature) {
        const popUps = document.getElementsByClassName('mapboxgl-popup');
        if (popUps[0]) popUps[0].remove();
        const popup = new mapboxgl.Popup({
                closeOnClick: false
            })
            .setLngLat(currentFeature.geometry.coordinates)
            .setHTML(
                `<h3>${currentFeature.properties.title}</h3><h4>${currentFeature.properties.days}</h4>`
            )
            .addTo(map);
    }


    // Add a source and layer displaying a point which will be animated in a circle.
    map.addSource('route', {
        'type': 'geojson',
        'data': route
    });

    map.addLayer({
        'id': 'route',
        'source': 'route',
        'type': 'line',
        'paint': {
            'line-width': 2,
            'line-color': '#931116',
            'line-dasharray': [2, 1],
        }
    });
    map.on('load', () => {
        /**
         * This is where your '.addLayer()' used to be, instead
         * add only the source without styling a layer
         */
        map.addSource('places', {
            'type': 'geojson',
            'data': camps
        });

        /**
         * Add all the things to the page:
         * - The location listings on the side of the page
         * - The markers onto the map
         */
        addMarkers();
    });


    map.on('idle', function() {
        map.resize();
    })



});
</script>