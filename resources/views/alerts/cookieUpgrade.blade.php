@if (Request()->cookie('owner'))
    <div class="welcome-note yellow-bg brd-rd5">
        <h4 itemprop="headline">Visibiliza más tu comercio</h4>
        Aumentá la exposición de tu negocio
    dentro de Guía Celíaca. <a href="{{ route('faq.packets') }}" target="_blank">Click aquí</a> para precios y ayuda
        <img src="{{ asset('styleWeb/assets/images/resource/welcome-note-img.png') }}" alt="welcome-note-img.png"
            itemprop="image">
        <a class="remove-noti" href="#" title="" itemprop="url"><img
                src="{{ asset('styleWeb/assets/images/close-icon.png') }}" alt="close-icon.png" itemprop="image"></a>
    </div>
@endif
