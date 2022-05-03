<?php 
$location = get_sub_field('pin_location');
$fullWidth = get_sub_field('fullscreen');
$zoomLevel = get_sub_field('zoom_level');
$rotateMap = get_sub_field('rotate'); ?>




<section class="mappin">
    <div class="<?php if($fullWidth == false): echo 'row'; endif;?>">
        <div id="map"></div>
    </div>
</section>




<script>
mapboxgl.accessToken = 'pk.eyJ1Ijoic2lsdmVybGVzcyIsImEiOiJjaXNibDlmM2gwMDB2Mm9tazV5YWRmZTVoIn0.ilTX0t72N3P3XbzGFhUKcg';

const map = new mapboxgl.Map({
    container: 'map',
    style: 'mapbox://styles/silverless/ckbi6z29n17591jl3w71fnjyx',
    minZoom: 10,
    maxZoom: 18,
    zoom: <?php echo esc_html( $zoomLevel ); ?>,
    center: [<?php echo esc_attr($location['lng']); ?>,
        <?php echo esc_attr($location['lat']); ?>
    ],
    scrollZoom: false
});
// Create a new marker.
// const marker = new mapboxgl.Marker()
//     .setLngLat([<?php echo esc_attr($location['lng']); ?>, <?php echo esc_attr($location['lat']); ?>])
//     .addTo(map);
<?php if ($rotateMap):?>

function rotate() {
    map.easeTo({
        bearing: 40,
        duration: 10000,
        pitch: 0,
        zoom: 18
    });
    window.setTimeout(() => {
        map.easeTo({
            bearing: 180,
            duration: 10000,
            pitch: 0,
            zoom: 14
        });
        window.setTimeout(() => {
            map.easeTo({
                bearing: 270,
                duration: 10000,
                pitch: 0,
                zoom: 16
            });
            window.setTimeout(() => {
                rotate();
            }, 10000);
        }, 10000);
    }, 10000);
}

map.on('load', () => {
    rotate();
});
<?php endif; ?>

const size = 200;

// This implements `StyleImageInterface`
// to draw a pulsing dot icon on the map.
const pulsingDot = {
    width: size,
    height: size,
    data: new Uint8Array(size * size * 4),

    // When the layer is added to the map,
    // get the rendering context for the map canvas.
    onAdd: function() {
        const canvas = document.createElement('canvas');
        canvas.width = this.width;
        canvas.height = this.height;
        this.context = canvas.getContext('2d');
    },

    // Call once before every frame where the icon will be used.
    render: function() {
        const duration = 1000;
        const t = (performance.now() % duration) / duration;

        const radius = (size / 2) * 0.3;
        const outerRadius = (size / 2) * 0.7 * t + radius;
        const context = this.context;

        // Draw the outer circle.
        context.clearRect(0, 0, this.width, this.height);
        context.beginPath();
        context.arc(
            this.width / 2,
            this.height / 2,
            outerRadius,
            0,
            Math.PI * 2
        );
        context.fillStyle = `rgba(64, 134, 186, ${1 - t})`;
        context.fill();

        // Draw the inner circle.
        context.beginPath();
        context.arc(
            this.width / 2,
            this.height / 2,
            radius,
            0,
            Math.PI * 2
        );
        context.fillStyle = 'rgba(64, 134, 186, 1)';
        context.strokeStyle = 'white';
        context.lineWidth = 2 + 4 * (1 - t);
        context.fill();
        context.stroke();

        // Update this image's data with data from the canvas.
        this.data = context.getImageData(
            0,
            0,
            this.width,
            this.height
        ).data;

        // Continuously repaint the map, resulting
        // in the smooth animation of the dot.
        map.triggerRepaint();

        // Return `true` to let the map know that the image was updated.
        return true;
    }
};

map.on('load', () => {
    map.addImage('pulsing-dot', pulsingDot, {
        pixelRatio: 2
    });

    map.addSource('dot-point', {
        'type': 'geojson',
        'data': {
            'type': 'FeatureCollection',
            'features': [{
                'type': 'Feature',
                'geometry': {
                    'type': 'Point',
                    'coordinates': [<?php echo esc_attr($location['lng']); ?>,
                        <?php echo esc_attr($location['lat']); ?>
                    ] // icon position [lng, lat]
                }
            }]
        }
    });
    map.addLayer({
        'id': 'layer-with-pulsing-dot',
        'type': 'symbol',
        'source': 'dot-point',
        'layout': {
            'icon-image': 'pulsing-dot'
        }
    });
});
</script>
<style>
#map {
    height: 30rem;
    width: 100%;
}
</style>