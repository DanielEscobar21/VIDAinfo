<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <style>
    body {
    font-family: 'Arial', sans-serif;
    font-size: 15px;
    /*border:1px solid red;*/
    margin-top: 2.1cm;
    margin-bottom: 1.3cm;
    }    
    .header {
    grid-column: 1 / 13;
    grid-row: 1;
    }
    .article {
    grid-column: 4 / 13;
    grid-row: 2;
    }
    </style>
</head>
<body>
    <div class="header">
        <table style="width: 100%">
            <tr>
                <td><b>Nombre: </b>{{$patient->name_patient. ' ' .$patient->lastname_patient}}</td>
                <td><b>Fecha: </b>{{date("d-M-Y")}}</td>
                <td><b>Edad: </b><?php
                    $born = new DateTime($patient->age_patient);
                    $now = new DateTime(date("Y-m-d"));
                    $age = $now->diff($born);;
                    echo $age->format('%y años');                         
                    
                    ?></td>
                <td><b>Sexo: </b>
                    @if ($patient->gender_patient=="M")
                        Masculino
                    @elseif($patient->gender_patient=="F")
                        Femenino
                    @else
                        Otro
                    @endif</td>
                
            </tr>
        </table>
    </div>
    <div class="article">
        <?php echo $treatment->notes_treatment?>
    </div>

    <div class="article">
        <b>Tratamiento</b>
        <table style="width:100%">
            <tr>
              <th>1.</th>
              <td>{{$treatment->medicament1_treatment}}</td>
              <td>{{$treatment->dose1_treatment}}</td>
            </tr>
                @if ($treatment->medicament2_treatment=="null")                
                @else
                <tr>
                <th>2.</th>
                <td>{{$treatment->medicament2_treatment}}</td>
                <td>{{$treatment->dose2_treatment}}</td>
                </tr>
                @endif
                @if ($treatment->medicament3_treatment=="null")                
                @else
                <tr>
                <th>3.</th>
                <td>{{$treatment->medicament3_treatment}}</td>
                <td>{{$treatment->dose3_treatment}}</td>
                </tr>
                @endif
                @if ($treatment->medicament4_treatment=="null")                
                @else
                <tr>
                <th>4.</th>
                <td>{{$treatment->medicament4_treatment}}</td>
                <td>{{$treatment->dose4_treatment}}</td>
                </tr>
                @endif
                @if ($treatment->medicament5_treatment=="null")                
                @else
                <tr>
                <th>5.</th>
                <td>{{$treatment->medicament5_treatment}}</td>
                <td>{{$treatment->dose5_treatment}}</td>
                </tr>
                @endif
          </table>
    </div>
</body>
</html>