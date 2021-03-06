@extends('print_global.print')
{{--  @section('title2')

@endsection  --}}
@section('content')
<div>
    <div>
        @include('affiliates.print.info', ['affiliate' => $affiliate ])
    </div>
    <p>
        <strong>MOTIVO: </strong>{{strtoupper($retirement_fund->procedure_modality->procedure_type->name." al ".$retirement_fund->procedure_modality->name)}}
    </p>
    <table class="w-100 table-info">
        <thead class="bg-grey-darker">
            <tr class="font-medium text-white text-sm font-bold">
                <td class="w-10 text-center">N°</td>
                <td class="w-80 text-center">DOCUMENTACIÓN PRESENTADA</td>
                <td class="w-10 text-center">V°B°</td>
            </tr>
        </thead>
        <tbody>
            @foreach($submitted_documents as $i=>$item)
            <tr>
                <td class='text-center p-5'>{{$item->procedure_requirement->number}}</td>
                <td class='text-justify p-5'>{{$item->procedure_requirement->procedure_document->name}} </td>
                @if ($item->is_valid)
                <td class="text-center">
                    <i class="mdi mdi-checkbox-marked-outline mdi-24px"></i>
                </td>
                @else
                <td class="text-center">
                        <i class="mdi mdi-close-box-outline mdi-24px"></i>
                </td>
                @endif
            </tr>
            @endforeach
        </tbody>
        </table>
    <p class="text-justify rounded border p-10">
        El Área Legal de la Unidad de Otorgación del Fondo de Retiro Policial Solidario, Cuota y Auxilio Mortuorio, de acuerdo al
        numeral 2 del artículo 45 del Reglamento de Fondo de Retiro Policial Solidario, <strong>CERTIFICA</strong> que la documentación presentada
        es <strong>VALIDA</strong>.
    </p>
    <table class="m-t-35">
        <tr>            
            <th class="no-border text-center" style=" width:50%">
                <p class="font-bold">----------------------------------------------------<br> {!! strtoupper($user->fullName()) !!}<br/> {!! $user->position !!}
                </p>
            </th>
        </tr>
    </table>
</div>
@endsection
