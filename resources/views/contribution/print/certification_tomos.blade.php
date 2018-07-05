@extends('print_global.print')
@section('content')

<div>
        El suscrito Encargado de  Cuentas Individuales en base a una revisión fisica de las planillas de haberes proporcionadas por el Comando General de la Policía Boliviana, del señor:
</div><br>
@include('print_global.police_info', ['affiliate' => $affiliate, 'degree' => $degree, 'exp' => $exp ])
<strong>CERTIFICA:</strong>
<table class="table-info w-100">        
    <thead class="bg-grey-darker">
        <tr class="font-medium text-white text-sm">
            <td class="px-15 py text-center ">
                MES
            </td>
            <td class="px-15 py text-center ">
                AÑO
            </td>        
            <td class="px-15 py text-center">
                COTIZABLE
            </td>
            <td class="px-15 py text-center">
                SUELDO
            </td>
            <td class="px-15 py text-center">
                ANTIGUEDAD
            </td>
            
            <td class="px-15 py text-center">
                APORTE
            </td>
                       
        </tr>
    </thead><br>

    <tbody> 
        @foreach($contributions as $contribution)     
            @if($contribution->contribution_type_id == $tomos->id)
                <tr class="text-sm">
                    <td class="text-center uppercase font-bold px-5 py-3">{{ date('m', strtotime($contribution->month_year)) }}</td>
                    <td class="text-center uppercase font-bold px-5 py-3">{{ date('Y', strtotime($contribution->month_year)) }}</td>
                    <td class="text-center uppercase font-bold px-5 py-3">{{ $contribution->quotable }}</td>
                 
                    <td class="text-center uppercase font-bold px-5 py-3">{{ $contribution->base_wage }}</td>                        
                    <td class="text-center uppercase font-bold px-5 py-3">{{ $contribution->seniority_bonus }}</td>
                    <td class="text-center uppercase font-bold px-5 py-3">{{ $contribution->total }}</td>
                    {{-- con la bd devretfun
                        <td class="text-center uppercase font-bold px-5 py-3">{{ $contribution->interest }}</td>--}}
                    
                </tr> 
                @foreach($reimbursements as $reimbursement)    
                    @if($contribution->month_year == $reimbursement->month_year)
                        <tr class="text-sm">
                            <td class="text-center uppercase font-bold px-5 py-3">{{ date('m', strtotime($contribution->month_year)) }}</td>
                            <td class="text-center uppercase font-bold px-5 py-3">{{ date('Y', strtotime($reimbursement->month_year)) }}</td>
                            <td class="text-center uppercase font-bold px-5 py-3">{{ $reimbursement->quotable }}</td>
                           
                            <td class="text-center uppercase font-bold px-5 py-3">{{ $reimbursement->base_wage }}</td>
                            <td class="text-center uppercase font-bold px-5 py-3">{{ $reimbursement->seniority_bonus }}</td>
                            <td class="text-center uppercase font-bold px-5 py-3">{{ $reimbursement->total }}</td>
                            
                        </tr>
                    @endif        
                @endforeach
            @endif
            @if($contribution->contribution_type_id == $tomos_sin_aporte->id)
                <tr class="text-sm">
                        <td class="text-center uppercase font-bold px-5 py-3">{{ date('m', strtotime($contribution->month_year)) }}</td>
                        <td class="text-center uppercase font-bold px-5 py-3">{{ date('Y', strtotime($contribution->month_year)) }}</td>
                        <td class="text-center uppercase font-bold px-5 py-3">{{ $contribution->quotable }}</td>
                     
                        <td class="text-center uppercase font-bold px-5 py-3">{{ $contribution->base_wage }}</td>                        
                        <td class="text-center uppercase font-bold px-5 py-3">{{ $contribution->seniority_bonus }}</td>
                        <td class="text-center uppercase font-bold px-5 py-3">{{ $contribution->total }}</td>
                </tr> 
                
            @endif
        @endforeach               
    </tbody>
</table>
<br>

<div align="right">
    {{ "Lugar y fecha: ". $place->name.", ".$dateac }}
</div>
Cc: Arch
@endsection