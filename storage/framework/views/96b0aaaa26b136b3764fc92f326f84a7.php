<!DOCTYPE html>
<html>
<script src="<?php echo e(asset('common/vr/aframe.min.js')); ?>"></script>
<!-- we import arjs version without NFT but with marker + location based support -->
<script src="<?php echo e(asset('common/vr/aframe-ar.js')); ?>"></script>

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
            <a-entity scale="0.5 0.5 0.5" rotation="0 0 0" gltf-model="<?php echo e(asset($product->vr_image)); ?>">
            </a-entity>
        </a-marker>
        <a-entity camera></a-entity>
    </a-scene>
    
</body>
<?php /**PATH /home/ljyvglni/multiple-vendor.nurulkomor.xyz/resources/views/common/single_product_vr.blade.php ENDPATH**/ ?>