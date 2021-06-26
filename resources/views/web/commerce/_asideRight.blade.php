<div class="col-xl-3 col-lg-3">
    <div class="sidebar">
        <div class="video-box mb-xl-20">
            <div class="video_wrapper video_wrapper_full js-videoWrapper">
                <iframe id="locmap"
                                src="https://www.google.com/maps/embed/v1/place?key=AIzaSyD7eUalpQrZ5TA9BrE5XgsudugZC7TIPYo
                                &q={{ $commerce->address .','. $commerce->location . $commerce->province->name}}">
                            </iframe>
            </div>

        </div>
        <div class="cart-detail-box">
            <div class="card">
                {{--  publicidad  --}}
            </div>
        </div>
    </div>
</div>