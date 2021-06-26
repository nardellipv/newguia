@if (count($errors) > 0)
<div class="thankmsg-sec">
    <div class="msg-wrapper text-center">
        <div class="wrapper-1 bg-black padding-20 mb-xl-20" style="background-color: #da1a1a;">
            <h2 class="text-yellow mb-2">Por favor revisar los siguientes errores</h2>
            <ul>
                @foreach ($errors->all() as $error)
                <li class="text-custom-white"> {{ $error }}</li>
                @endforeach
            </ul>
        </div>
    </div>
</div>
@endif