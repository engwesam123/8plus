  {{-- For success To add user --}}
@if (session()->has('addMassage'))
    <div class="alert alert-dismissible fade show" style="background-color:#3ec77c;color:white" role="alert">
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
        <strong> {{ t("Notfication") }} : </strong> {{ session()->get('addMassage') }}.
    </div>
@endif






@if (session()->has('editMassage'))
    <div class="alert alert-dismissible fade show" style="background-color:#3ec77c;color:white" role="alert">
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
        <strong> {{ t("Notfication") }}  : </strong> {{ session()->get('editMassage') }}.
    </div>
@endif


@if (session()->has('deleteMassage'))
    <div class="alert alert-dismissible fade show" style="background-color:#3ec77c;color:white" role="alert">
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
        <strong> {{ t("Notfication") }}  : </strong> {{ session()->get('deleteMassage') }}.
    </div>
@endif


@if ($errors->count() > 0)
@foreach ($errors->all() as $error)



    <div class="alert alert-dismissible fade show" style="background-color:#e43b62;color:white" role="alert">
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
        </button>
        <strong>{{ t("Notfication") }}  : </strong> {{ $error }}.
    </div>
@endforeach

@endif




<div class="flash-message alert alert-dismissible fade show" style="background-color:#3ec77c;color:white;display:none" role="alert">
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
    </button>
    <strong>تنبيه :  تم تغير الحالة بنجاح

    </strong>
 </div>
