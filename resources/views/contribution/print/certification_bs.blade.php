@extends('print_global.print')
@section('content')

<div>
        El suscrito Encargado de  Cuentas Individuales en base a una revisión manual de planillas de pago de haberes del Batallón de Seguridad Física Privada La Paz, del señor:
</div><br>
@include('print_global.police_info', ['affiliate' => $affiliate, 'degree' => $degree, 'exp' => $exp ])
<strong>CERTIFICA:</strong>
<table class="table-info w-100">        
    <thead class="bg-grey-darker">
        <tr class="font-medium text-white text-sm">
            <td class="px-15 py text-center ">
                Nº
            </td>
            <td class="px-15 py text-center ">
                MES
            </td>        
            <td class="px-15 py text-center">
                AÑO
            </td>
            <td class="px-15 py text-center">
                TOTAL GANADO
            </td>
            <td class="px-15 py text-center">
                BONO SEGURIDAD CIUDADANA
            </td>
            <td class="px-15 py text-center">
                TOTAL APORTE
            </td>              
        </tr>
    </thead><br>
    <?php $num = 0;
          $total=0;
    ?>
    <tbody> 
        @foreach($contributions as $contribution)     
            @if($contribution->contribution_type_id == $bs->id)
                <tr class="text-sm">
                    <td class="text-center uppercase font-bold px-5 py-3">{{ $num=$num+1}}</td>
                    <td class="text-center uppercase font-bold px-5 py-3">{{ date('m', strtotime($contribution->month_year)) }}</td>
                    <td class="text-center uppercase font-bold px-5 py-3">{{ date('Y', strtotime($contribution->month_year)) }}</td>
                    <td class="text-center uppercase font-bold px-5 py-3">{{ $contribution->gain }}</td>
                    <td class="text-center uppercase font-bold px-5 py-3">{{ $contribution->public_security_bonus }}</td>
                    <td class="text-center uppercase font-bold px-5 py-3">{{ $contribution->total }}</td>  
                </tr> 
                <?php $total += $contribution->total;?>
                @foreach($reimbursements as $reimbursement)    
                    @if($contribution->month_year == $reimbursement->month_year)
                        <tr class="text-sm">
                            <td class="text-center uppercase font-bold px-5 py-3">{{ $num=$num+1}}</td>
                            <td class="text-center uppercase font-bold px-5 py-3">{{ date('m', strtotime($contribution->month_year)) }}</td>
                            <td class="text-center uppercase font-bold px-5 py-3">{{ date('Y', strtotime($contribution->month_year)) }}</td>
                            <td class="text-center uppercase font-bold px-5 py-3">{{ $contribution->gain }}</td>
                            <td class="text-center uppercase font-bold px-5 py-3">{{ $contribution->public_security_bonus }}</td>
                            <td class="text-center uppercase font-bold px-5 py-3">{{ $contribution->total }}</td>  
                        </tr>
                    @endif        
                @endforeach
            @endif
            @if($contribution->contribution_type_id == $bs_sin_aporte->id)
                <tr class="text-sm">
                    <td class="text-center uppercase font-bold px-5 py-3">{{ $num=$num+1}}</td>
                    <td class="text-center uppercase font-bold px-5 py-3">{{ date('m', strtotime($contribution->month_year)) }}</td>
                    <td class="text-center uppercase font-bold px-5 py-3">{{ date('Y', strtotime($contribution->month_year)) }}</td>
                    <td class="text-center uppercase font-bold px-5 py-3" colspan="3"> {{$bs_sin_aporte->name}} </td> 
                </tr> 
                
            @endif
            
        @endforeach  
        <tr>
            <td class="text-center uppercase font-bold px-5 py-3 bg-grey-darker  text-white" colspan="5"> TOTAL </td>
            <td class="text-center uppercase font-bold px-5 py-3" colspan="1"> {{$total}} </td>            
        </tr>
    </tbody>
</table>
<br>

<div align="right">
    {{ "Lugar y fecha: ". $place->name.", ".$dateac }}
</div>
Cc: Arch
@endsection