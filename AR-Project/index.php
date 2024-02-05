<!doctype html>
<html>
    <head>
        <script src="https://aframe.io/releases/1.0.4/aframe.min.js"></script>
        <script src="https://raw.githack.com/AR-js-org/AR.js/master/aframe/build/aframe-ar.js"></script>
        <script src="https://raw.githack.com/donmccurdy/aframe-extras/master/dist/aframe-extras.loaders.min.js"></script>
        <script src="https://raw.githack.com/AR-js-org/studio-backend/master/src/modules/marker/tools/gesture-detector.js"></script>
        <script src="https://raw.githack.com/AR-js-org/studio-backend/master/src/modules/marker/tools/gesture-handler.js"></script>
    </head>

    <body style="margin: 0; overflow: hidden;">
        <a-scene
            vr-mode-ui="enabled: false;"
            loading-screen="enabled: false;"
            renderer="logarithmicDepthBuffer: true;"
            arjs="trackingMethod: best; sourceType: webcam; debugUIEnabled: false;"
            id="scene"
            embedded
            gesture-detector
        >
            <?php
                for ($i = 1; $i <= 2; $i++) { ?>
            <a-assets>
                <a-asset-item
                    id="animated-asset<?php echo $i ?>"
                    src="assets/asset<?php echo $i ?>.glb"
                ></a-asset-item>
            </a-assets>

            <a-marker
                id="animated-marker"
                type="pattern"
                preset="custom"
                url="assets/marker<?php echo $i ?>.patt"
                raycaster="objects: .clickable"
                emitevents="true"
                cursor="fuse: false; rayOrigin: mouse;"
                id="markerA"
            >
                <a-entity
                    id="bowser-model"
                    scale="0.002078034258399037 0.002078034258399037 0.002078034258399037"
                    animation-mixer="loop: repeat"
                    gltf-model="#animated-asset<?php echo $i ?>"
                    class="clickable"
                    gesture-handler
                ></a-entity>
            </a-marker>
            <?php } ?>

            <a-entity camera></a-entity>
        </a-scene>
    </body>
</html>
