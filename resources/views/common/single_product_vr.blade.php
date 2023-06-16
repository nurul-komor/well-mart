<!DOCTYPE html>
<html>
<script src="{{ asset('common/vr/aframe.min.js') }}"></script>
<!-- we import arjs version without NFT but with marker + location based support -->
<script src="{{ asset('common/vr/aframe-ar.js') }}"></script>

<body style="margin : 0px; overflow: hidden;">
    <a-scene embedded arjs>
        <a-marker preset="hiro">
            <!-- we use cors proxy to avoid cross-origin problems -->
            <!--
          ⚠️⚠️⚠️
          https://arjs-cors-proxy.herokuapp.com/ is now offline, Heroku has dismissed all his free plans from November 2022.
          You need to host your own proxy and use it instead. The proxy is based on CORS Anywhere (see https://github.com/Rob--W/cors-anywhere).
          ⚠️⚠️⚠️
        -->
            <a-entity scale="0.5 0.5 0.5" rotation="0 0 0" gltf-model="{{ asset($product->vr_image) }}">
            </a-entity>
        </a-marker>
        <a-entity camera></a-entity>
    </a-scene>
    {{-- <div class="sketchfab-embed-wrapper"> <iframe title="Shiba" frameborder="0" allowfullscreen mozallowfullscreen="true"
            webkitallowfullscreen="true" allow="autoplay; fullscreen; xr-spatial-tracking" xr-spatial-tracking
            execution-while-out-of-viewport execution-while-not-rendered web-share
            src="https://sketchfab.com/models/faef9fe5ace445e7b2989d1c1ece361c/embed"> </iframe>

    </div> --}}
</body>
