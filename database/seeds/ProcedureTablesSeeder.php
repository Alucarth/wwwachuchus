<?php

use Illuminate\Database\Seeder;

class ProcedureTablesSeeder extends Seeder {

    /**
     * Run the database seeds.
     *
     * @return void 
     */
    public function run() {

        DB::table('procedure_types')->insert([
            ['module_id' => '3', 'name' => 'Pago Global de Aportes'],
            ['module_id' => '3', 'name' => 'Pago de Fondo de Retiro'],
            ['module_id' => '4', 'name' => 'Pago Cuota Mortuoria'],
            ['module_id' => '5', 'name' => 'Pago Auxilio Mortuorio'],            
        ]);

        DB::table('procedure_modalities')->insert([
            ['procedure_type_id' => '1', 'name' => 'Fallecimiento', 'shortened' => 'FRPS - FALL', 'is_valid' => true],
            ['procedure_type_id' => '1', 'name' => 'Retiro forzoso(Invalidez Permanente)', 'shortened' => 'FRPS - RFI', 'is_valid' => true],
            
            ['procedure_type_id' => '2', 'name' => 'Jubilación', 'shortened' => 'FRPS - JUB', 'is_valid' => true],
            ['procedure_type_id' => '2', 'name' => 'Fallecimiento', 'shortened' => 'FRPS - FALL', 'is_valid' => true],
            ['procedure_type_id' => '2', 'name' => 'Retiro forzoso', 'shortened' => 'FRPS - RF', 'is_valid' => true],
            ['procedure_type_id' => '2', 'name' => 'Retiro forzoso(Invalidez Permanente)', 'shortened' => 'FRPS - RFI', 'is_valid' => true],
            ['procedure_type_id' => '2', 'name' => 'Retiro Voluntario', 'shortened' => 'FRPS - RV', 'is_valid' => true],

            ['procedure_type_id' => '3', 'name' => 'Fallecimiento del titular en cumplimiento de funciones', 'shortened' => 'CM - TFCF', 'is_valid' => true],
            ['procedure_type_id' => '3', 'name' => 'Fallecimiento del titular por Riesgo Comun', 'shortened' => 'CM - TFRC', 'is_valid' => true],
            ['procedure_type_id' => '3', 'name' => 'Anticipo Fondo de Retiro Policial', 'shortened' => 'FRPS - ANT', 'is_valid'=> false],
            ['procedure_type_id' => '3', 'name' => 'Aporte Voluntario Item "0" ', 'shortened' => 'A.V. ITEM "0"', 'is_valid' => true],
            ['procedure_type_id' => '3', 'name' => 'Expediente Transitorio ', 'shortened' => 'ET', 'is_valid' => false],

            ['procedure_type_id' => '4', 'name' => 'Fallecimiento del titular', 'shortened' => 'AM - TF', 'is_valid' => true],
            ['procedure_type_id' => '4', 'name' => 'Fallecimiento del o de la conyugue', 'shortened' => 'AM - CF', 'is_valid' => true],
            ['procedure_type_id' => '4', 'name' => 'Fallecimiento de la o del viudo', 'shortened' => 'AM - VF', 'is_valid' => true],
        ]);
        
        DB::table('procedure_documents')->insert([
            ['name' => 'Comprobante de depósito bancario de Bs.- 25 por concepto de adquisición de folder y formularios en la cuenta fiscal de la MUSERPOL.'],
            ['name' => 'Formulario de verificación de requisitos con carácter de Declaración Jurada y solicitud a ser otorgado por la MUSERPOL a momento de inicio de trámite.'],
            ['name' => 'Fotocopia simple de cédula de identidad del titular, vigente a la fecha de solicitud.'],
            ['name' => 'Certificado de nacimiento del titular (original y actualizado).'],
            ['name' => 'Memorándum de agradecimiento de servicios emitido por el Comando general de la Policía Boliviana(original).'],
            ['name' => 'Memorándum de destino a disponibilidad a las letras "C" y "A" (reserva activa) según corresponda (original).'],
            ['name' => 'Certificado de haberes otorgado por el Comando general de la Policía Boliviana, de los últimos 60 meses efectivamente percibidos antes de su destino a disponibilidad de las letras (reserva activa), (original).'],
            ['name' => 'Certificado de años de servicio desglosado, otorgado por el Comando General de la Policía Boliviana (original).'],
            ['name' => 'Certificado de defunción (original y actualizado).'],
            ['name' => 'Certificado de nacimiento de los derechohabientes (original y actualizado).'],
            ['name' => 'Fotocopia simple de la cédula de identidad de los derechohabientes(vigente).'],
            ['name' => 'Certificado de Matrimonio(original y actualizado).'],                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                        
            ['name' => 'Certificado de unión libre o de hecho emitido por el "SERECI" (original y actualizado).'],
            ['name' => 'Resolución de reconocimiento de matrimonio de hecho ante autoridad competente (original o copia legalizada).'],                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                          
            ['name' => 'Certificado de descendencia del titular fallecido emitido por el SERECI (original y actualizado).'],
            ['name' => 'Declaratoria de herederos (original o copia legalizada),'],                                                                                                                                                                                      
            ['name' => 'Testamento que señale expresamente la otorgación del beneficio (original o copia legalizada).'],
            ['name' => 'Certificado de haberes otorgado por el Comando General de la Policía Boliviana, de los últimos 60 meses efectivamente percibidos, previo a suscitarse a fallecimiento del titular (original).'],
            ['name' => 'Resolución de baja definitiva emitida por el Comando General de la Policía Boliviana (original).'],
            ['name' => 'Memorándum de baja definitiva emitida por el Comando General de la Policía Boliviana (original).'],
            ['name' => 'Certificado de haberes otorgado por el comando general de la Policía Boliviana de los últimos 60 meses efectivamente percibidos, antes de su desvinculación laboral con la Institución Policial (original).'],
            ['name' => 'Dictamen con calificación de al menos 70% de pérdida de capacidad laboral, emitida por la Entidad Encargada de Calificar (copia legalizada).'],                                                                                                                                                                                                                                                                                                                                                                                                                                                                          
            ['name' => 'Certificado de trabajo emitido por el Comando General de la Policía Boliviana, que especifique la fecha de ingreso a la institución Policial, fecha de destino a disponibilidad, fecha de agradecimiento de servicio o fecha de baja.'],
            ['name' => 'Certificado de haberes otorgado por el Comando General de la Policia Boliviana, de los 12 meses, previo a suscitarse el fallecimiento'],                                                                                                                                                                                                                                                                                         
            ['name' => 'Aceptación de Herencia (original o copia legalizada)'],
            ['name' => 'Dictamen emitido por la Entidad Encargada de Calificar'],
            ['name' => 'Certificación emitida por la Dirección Nacional de Salud y Bienestar Social de la Policía Boliviana (original o copia legalizada)'],
            ['name' => 'Certificado de nacimiento del cónyuge original y actualizado'],
            ['name' => 'Certificado de defunción de la o el cónyuge original y actualizado'],
            ['name' => 'Fotocopia simple de la cédula de identidad del cónyuge'],
            ['name' => 'Certificado de nacimiento de la o del viudo original y actualizado'],
            ['name' => 'Certificado de defunción de la o del viudo original y actualizado'],
            ['name' => 'Fotocopia simple de la cédula de identidad de la o del viudo'],
            ['name' => 'Resolución de baja definitiva a solicitud voluntaria, emitida por el Comando General de la Policía Boliviana (original).'],
            ['name' => 'Memorándum de baja definitiva a solicitud voluntaria, emitida por el Comando General de la Policía Boliviana (original).'],
                                
        ]);

        DB::table('procedure_requirements')->insert([
            ['procedure_modality_id' => '3', 'procedure_document_id' => '1', 'number' => '1'],
            ['procedure_modality_id' => '3', 'procedure_document_id' => '2', 'number' => '2'],
            ['procedure_modality_id' => '3', 'procedure_document_id' => '3', 'number' => '3'],
            ['procedure_modality_id' => '3', 'procedure_document_id' => '4', 'number' => '4'],
            ['procedure_modality_id' => '3', 'procedure_document_id' => '5', 'number' => '5'],
            ['procedure_modality_id' => '3', 'procedure_document_id' => '6', 'number' => '6'],
            ['procedure_modality_id' => '3', 'procedure_document_id' => '7', 'number' => '7'],
            ['procedure_modality_id' => '3', 'procedure_document_id' => '8', 'number' => '8'],
            ['procedure_modality_id' => '4', 'procedure_document_id' => '1', 'number' => '1'],
            ['procedure_modality_id' => '4', 'procedure_document_id' => '2', 'number' => '2'],
            ['procedure_modality_id' => '4', 'procedure_document_id' => '3', 'number' => '3'],
            ['procedure_modality_id' => '4', 'procedure_document_id' => '4', 'number' => '4'],
            ['procedure_modality_id' => '4', 'procedure_document_id' => '9', 'number' => '5'],
            ['procedure_modality_id' => '4', 'procedure_document_id' => '6', 'number' => '6'],
            ['procedure_modality_id' => '4', 'procedure_document_id' => '10', 'number' => '7'],
            ['procedure_modality_id' => '4', 'procedure_document_id' => '11', 'number' => '8'],
            ['procedure_modality_id' => '4', 'procedure_document_id' => '12', 'number' => '9'],
            ['procedure_modality_id' => '4', 'procedure_document_id' => '13', 'number' => '9'],
            ['procedure_modality_id' => '4', 'procedure_document_id' => '14', 'number' => '9'],
            ['procedure_modality_id' => '4', 'procedure_document_id' => '15', 'number' => '10'],
            ['procedure_modality_id' => '4', 'procedure_document_id' => '16', 'number' => '11'],
            ['procedure_modality_id' => '4', 'procedure_document_id' => '17', 'number' => '11'],
            ['procedure_modality_id' => '4', 'procedure_document_id' => '7', 'number' => '12'],
            ['procedure_modality_id' => '4', 'procedure_document_id' => '18', 'number' => '12'],
            ['procedure_modality_id' => '4', 'procedure_document_id' => '8', 'number' => '13'],
            ['procedure_modality_id' => '5', 'procedure_document_id' => '1', 'number' => '1'],
            ['procedure_modality_id' => '5', 'procedure_document_id' => '2', 'number' => '2'],
            ['procedure_modality_id' => '5', 'procedure_document_id' => '3', 'number' => '3'],
            ['procedure_modality_id' => '5', 'procedure_document_id' => '4', 'number' => '4'],
            ['procedure_modality_id' => '5', 'procedure_document_id' => '19', 'number' => '5'], 
            ['procedure_modality_id' => '5', 'procedure_document_id' => '42', 'number' => '5'],//revisar
            ['procedure_modality_id' => '5', 'procedure_document_id' => '19', 'number' => '5'],
            ['procedure_modality_id' => '5', 'procedure_document_id' => '20', 'number' => '5'],
            ['procedure_modality_id' => '5', 'procedure_document_id' => '7', 'number' => '6'],
            ['procedure_modality_id' => '5', 'procedure_document_id' => '21', 'number' => '6'],
            ['procedure_modality_id' => '5', 'procedure_document_id' => '8', 'number' => '7'],
            ['procedure_modality_id' => '6', 'procedure_document_id' => '1', 'number' => '1'],
            ['procedure_modality_id' => '6', 'procedure_document_id' => '2', 'number' => '2'],
            ['procedure_modality_id' => '6', 'procedure_document_id' => '3', 'number' => '3'],
            ['procedure_modality_id' => '6', 'procedure_document_id' => '4', 'number' => '4'],
            ['procedure_modality_id' => '6', 'procedure_document_id' => '22', 'number' => '5'],
            ['procedure_modality_id' => '6', 'procedure_document_id' => '19', 'number' => '6'],
            ['procedure_modality_id' => '6', 'procedure_document_id' => '20', 'number' => '6'],
            ['procedure_modality_id' => '6', 'procedure_document_id' => '21', 'number' => '7'],
            ['procedure_modality_id' => '6', 'procedure_document_id' => '7', 'number' => '7'],
            ['procedure_modality_id' => '6', 'procedure_document_id' => '8', 'number' => '8'],
            ['procedure_modality_id' => '7', 'procedure_document_id' => '1', 'number' => '1'],
            ['procedure_modality_id' => '7', 'procedure_document_id' => '2', 'number' => '2'],
            ['procedure_modality_id' => '7', 'procedure_document_id' => '3', 'number' => '3'],
            ['procedure_modality_id' => '7', 'procedure_document_id' => '4', 'number' => '4'],
            ['procedure_modality_id' => '7', 'procedure_document_id' => '34', 'number' => '5'],//-- 19,20 por 34 y 35
            ['procedure_modality_id' => '7', 'procedure_document_id' => '35', 'number' => '5'],
            ['procedure_modality_id' => '7', 'procedure_document_id' => '21', 'number' => '6'],
            ['procedure_modality_id' => '7', 'procedure_document_id' => '7', 'number' => '6'],
            ['procedure_modality_id' => '7', 'procedure_document_id' => '8', 'number' => '7'],


            ['procedure_modality_id' => '8', 'procedure_document_id' => '1', 'number' => '1'],
            ['procedure_modality_id' => '8', 'procedure_document_id' => '2', 'number' => '2'],
            ['procedure_modality_id' => '8', 'procedure_document_id' => '3', 'number' => '3'],
            ['procedure_modality_id' => '8', 'procedure_document_id' => '4', 'number' => '4'],
            ['procedure_modality_id' => '8', 'procedure_document_id' => '9', 'number' => '5'],
            ['procedure_modality_id' => '8', 'procedure_document_id' => '10', 'number' => '6'],
            ['procedure_modality_id' => '8', 'procedure_document_id' => '11', 'number' => '7'],
            ['procedure_modality_id' => '8', 'procedure_document_id' => '12', 'number' => '8'],
            ['procedure_modality_id' => '8', 'procedure_document_id' => '13', 'number' => '8'],
            ['procedure_modality_id' => '8', 'procedure_document_id' => '14', 'number' => '8'],
            ['procedure_modality_id' => '8', 'procedure_document_id' => '15', 'number' => '9'],
            ['procedure_modality_id' => '8', 'procedure_document_id' => '16', 'number' => '10'],
            ['procedure_modality_id' => '8', 'procedure_document_id' => '25', 'number' => '10'],
            ['procedure_modality_id' => '8', 'procedure_document_id' => '17', 'number' => '10'],
            ['procedure_modality_id' => '8', 'procedure_document_id' => '24', 'number' => '11'],
            ['procedure_modality_id' => '8', 'procedure_document_id' => '27', 'number' => '12'],
            ['procedure_modality_id' => '8', 'procedure_document_id' => '28', 'number' => '12'],

            ['procedure_modality_id' => '9', 'procedure_document_id' => '1', 'number' => '1'],
            ['procedure_modality_id' => '9', 'procedure_document_id' => '2', 'number' => '2'],
            ['procedure_modality_id' => '9', 'procedure_document_id' => '3', 'number' => '3'],
            ['procedure_modality_id' => '9', 'procedure_document_id' => '4', 'number' => '4'],
            ['procedure_modality_id' => '9', 'procedure_document_id' => '9', 'number' => '5'],
            ['procedure_modality_id' => '9', 'procedure_document_id' => '10', 'number' => '6'],
            ['procedure_modality_id' => '9', 'procedure_document_id' => '11', 'number' => '7'],
            ['procedure_modality_id' => '9', 'procedure_document_id' => '12', 'number' => '8'],
            ['procedure_modality_id' => '9', 'procedure_document_id' => '13', 'number' => '8'],
            ['procedure_modality_id' => '9', 'procedure_document_id' => '14', 'number' => '8'],
            ['procedure_modality_id' => '9', 'procedure_document_id' => '15', 'number' => '9'],
            ['procedure_modality_id' => '9', 'procedure_document_id' => '16', 'number' => '10'],
            ['procedure_modality_id' => '9', 'procedure_document_id' => '25', 'number' => '10'],
            ['procedure_modality_id' => '9', 'procedure_document_id' => '17', 'number' => '10'],
            ['procedure_modality_id' => '9', 'procedure_document_id' => '24', 'number' => '11'],

            ['procedure_modality_id' => '10', 'procedure_document_id' => '1', 'number' => '1'],
            ['procedure_modality_id' => '10', 'procedure_document_id' => '2', 'number' => '2'],
            ['procedure_modality_id' => '10', 'procedure_document_id' => '3', 'number' => '3'],
            ['procedure_modality_id' => '10', 'procedure_document_id' => '4', 'number' => '4'],
            ['procedure_modality_id' => '10', 'procedure_document_id' => '9', 'number' => '5'],
            ['procedure_modality_id' => '10', 'procedure_document_id' => '10', 'number' => '6'],
            ['procedure_modality_id' => '10', 'procedure_document_id' => '11', 'number' => '7'],
            ['procedure_modality_id' => '10', 'procedure_document_id' => '12', 'number' => '8'],
            ['procedure_modality_id' => '10', 'procedure_document_id' => '13', 'number' => '8'],
            ['procedure_modality_id' => '10', 'procedure_document_id' => '14', 'number' => '8'],
            ['procedure_modality_id' => '10', 'procedure_document_id' => '15', 'number' => '9'],
            ['procedure_modality_id' => '10', 'procedure_document_id' => '16', 'number' => '10'],
            ['procedure_modality_id' => '10', 'procedure_document_id' => '25', 'number' => '10'],
            ['procedure_modality_id' => '10', 'procedure_document_id' => '17', 'number' => '10'],

            ['procedure_modality_id' => '11', 'procedure_document_id' => '1', 'number' => '1'],
            ['procedure_modality_id' => '11', 'procedure_document_id' => '2', 'number' => '2'],
            ['procedure_modality_id' => '11', 'procedure_document_id' => '3', 'number' => '3'],
            ['procedure_modality_id' => '11', 'procedure_document_id' => '4', 'number' => '4'],
            ['procedure_modality_id' => '11', 'procedure_document_id' => '28', 'number' => '5'],
            ['procedure_modality_id' => '11', 'procedure_document_id' => '29', 'number' => '6'],
            ['procedure_modality_id' => '11', 'procedure_document_id' => '30', 'number' => '7'],
            ['procedure_modality_id' => '11', 'procedure_document_id' => '12', 'number' => '8'],
            ['procedure_modality_id' => '11', 'procedure_document_id' => '13', 'number' => '8'],
            ['procedure_modality_id' => '11', 'procedure_document_id' => '14', 'number' => '8'],

            ['procedure_modality_id' => '12', 'procedure_document_id' => '1', 'number' => '1'],
            ['procedure_modality_id' => '12', 'procedure_document_id' => '2', 'number' => '2'],
            ['procedure_modality_id' => '12', 'procedure_document_id' => '33', 'number' => '3'],
            ['procedure_modality_id' => '12', 'procedure_document_id' => '31', 'number' => '4'],
            ['procedure_modality_id' => '12', 'procedure_document_id' => '32', 'number' => '5'],
            ['procedure_modality_id' => '12', 'procedure_document_id' => '10', 'number' => '6'],
            ['procedure_modality_id' => '12', 'procedure_document_id' => '11', 'number' => '7'],
            ['procedure_modality_id' => '12', 'procedure_document_id' => '15', 'number' => '8'],
            ['procedure_modality_id' => '12', 'procedure_document_id' => '16', 'number' => '9'],
            ['procedure_modality_id' => '12', 'procedure_document_id' => '25', 'number' => '9'],
            ['procedure_modality_id' => '12', 'procedure_document_id' => '17', 'number' => '9'],
        ]);

        DB::table('ret_fun_procedures')->insert([
            ['annual_yield' => '5.00', 'administrative_expenses' => '10.00', 'contributions_number' => '60'],
        ]);

    }

}
