<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Siass</title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>

    <style type="text/css">
        table {     width:  100%;     border: solid 1px #000; }
        th {     text-align: center;    border: solid 1px #000;  }
        td {    text-align: left;    border: solid 1px #000; }
    </style>

</head>
<body style="background-color: white;">

<table align='center' border='1' cellpadding='0' cellspacing='0'>
    <colgroup>
        <col styel='width:10%'>
        <col styel='width:10%'>
        <col styel='width:10%'>
        <col styel='width:10%'>
        <col styel='width:10%'>
        <col styel='width:10%'>
        <col styel='width:10%'>
        <col styel='width:10%'>
        <col styel='width:10%'>
        <col styel='width:10%'>
    </colgroup>
    <thead>
    <tr style=" color:#000000">
        <th style=' padding: 6;' colspan="2" style='text-align:center;'><img src="data:image/jpeg;base64,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
" style="with:30px"></th>
        <th style=' padding: 6;' colspan="5" style='text-align:center;'> <b>
                Secretariado Ejecutivo del Sistema Nacional de Seguridad Publica <br>
                INFORME DE CUMPLIMIENTO AL PRIMER TRIMESTRE <br>
                FORTASEG ({{$input['trimestre']}})</b></th>
        <th style=' padding: 6;' colspan="3" style='text-align:center;'><img src="data:image/jpeg;base64,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
" ></th>
    </tr>
    </thead>
    <tr style="background: #621132; color:#ffffff">
        <td style="padding:8;"  colspan="8">Entidad Federativa: {{ $input['estado'] }}</td>
        <td style="padding:8; ">Ministrado </td>
        <td style="padding:8; text-align:right;"> $ {{ $input['Monto_ministrado'] }} </td>
    </tr>
    <tr style="background: #621132; color:#ffffff">
        <td style="padding:8;" colspan="8">Municipio: {{ $input['municipio']}} </td>
        <td style="padding:8;">No Ministrado</td>
        <td style="padding:8; text-align:right;"> {{ $input['monto_no_ministrado'] }}</td>
    </tr>
    <tr style="background: #621132; color:#ffffff">
        <td style="padding:8;" colspan="10" align="justify">Subsidio para el fortalecimiento del desempeño en materia de seguridad publica a los municipios y demarcaciones territoriales de la Ciudad de México y, en su caso, a las entidades federativas que ejerzan de manera directa o coordinada la función para el ejercicio fiscal {{$input['anio_fiscal']}} </td>
    </tr>
    <tr  style="background: #9D2444; color:#ffffff">
        <td rowspan="2" style='text-align:left; padding: 6; '>FEDERAL</td>
        <td style='text-align:left; padding: 6; '>Convenido <br> (Anexo Técnico Autorizado)</td>
        <td style='text-align:left; padding: 6; '>Rendimientos <br> financieros</td>
        <td style='text-align:left; padding: 6; '>Reprogramaciones</td>
        <td style='text-align:left; padding: 6; '>Convenido <br> Modificado</td>
        <td style='text-align:left; padding: 6; '>Comprometido</td>
        <td style='text-align:left; padding: 6; '>Devengado</td>
        <td style='text-align:left; padding: 6; '>Pagado</td>
        <td style='text-align:left; padding: 6; '>Avance Total</td>
        <td style='text-align:left; padding: 6; '>Pendiente por Aplicar</td>

    </tr>
    <tr>
        <td style='text-align:center; padding: 6; '>Recurso</td>
        <td style='text-align:center; padding: 6; '>Aplicado</td>
        <td style='text-align:center; padding: 6; '>Recurso</td>
        <td style='text-align:center; padding: 6; '>Recurso</td>
        <td style='text-align:center; padding: 6; '>Recurso</td>
        <td style='text-align:center; padding: 6; '>Recurso</td>
        <td style='text-align:center; padding: 6; '>Recurso</td>
        <td style='text-align:center; padding: 6; '>Recurso</td>
        <td style='text-align:center; padding: 6; '>Recurso</td>
    </tr>

    <tr>
        <td colspan="10" align="center"><b>REPORTE DE AVANCE DE MONTOS CON RECURSO FEDERALES FORTASEG</b> </td>
    </tr>

    <!--INICIO DEL CICLO-->
    @foreach($datos as $dato)
    <tr style='background: #621132; color:#ffffff;'>
        <td style='padding:8;' colspan='10' align='justify'>
            {{$dato->programa}}
        </td>
    </tr>



        



{{--        {{dd($dato)}}--}}
@endforeach
@foreach($subtotal as $sub)

    <tr>
        <td style='text-align:left; padding: 6; width:120px;'></td>
        <td style='text-align:right; padding: 6; '>$ </td>
        <td style='text-align:right; padding: 6; '>$ 0.00</td>
        <td style='text-align:right; padding: 6; '>$ 0.00</td>
        <td style='text-align:right; padding: 6; '>$ {{$dato->SUM}}</td>
        <td style='text-align:right; padding: 6; '>$ 0.00</td>
        <td style='text-align:right; padding: 6; '>$ 0.00</td>
        <td style='text-align:right; padding: 6; '>$ 0.00</td>
        <td style='text-align:right; padding: 6; '>$ 0.00</td>
        <td style='text-align:right; padding: 6; '>$ {{$dato->SUM}}</td>
    </tr>


  
  
  

  

   
        
        <tr style='background: #9D2444; color:#ffffff'>
<td style='text-align:right; padding: 6; '>SUBTOTAL</td>
<td style='text-align:right; padding: 6; '> {{$sub->SUMA}}</td>
<td style='text-align:right; padding: 6; '></td>
<td style='text-align:right; padding: 6; '></td>
<td style='text-align:right; padding: 6; '> </td>
<td style='text-align:right; padding: 6; '></td>
<td style='text-align:right; padding: 6; '></td>
<td style='text-align:right; padding: 6; '></td>
<td style='text-align:right; padding: 6; '></td>
<td style='text-align:right; padding: 6; '></td>
</tr>
{{--        {{dd($sub)}}--}}

 
@endforeach






    <tr style='background: #621132; color:#ffffff'>
        <td style='text-align:right; padding: 6; '>TOTAL</td>
        <td style='text-align:right; padding: 6; '> $ {{$total}} </td>
        <td style='text-align:right; padding: 6; '>$ 0.00</td>
        <td style='text-align:right; padding: 6; '>$ 0.00</td>
        <td style='text-align:right; padding: 6; '>${{$total}} </td>
        <td style='text-align:right; padding: 6; '>$ 0.00</td>
        <td style='text-align:right; padding: 6; '>$ 0.00</td>
        <td style='text-align:right; padding: 6; '>$ 0.00</td>
        <td style='text-align:right; padding: 6; '>$ 0.00</td>
        <td style='text-align:right; padding: 6; '>$ {{$total}}</td>
    </tr>
<!--INICIO DE TABLA RENDIMIENTO-->
<tr>
        <td style="padding: 5; border:none" colspan="10" align="center"><b></b> </td>
    </tr>
   
    </tr>
    <tr style='background: #621132; color:#ffffff;'>
        <td style='text-align:center;padding:8;' colspan='10' align='center'>RENDIMIENTOS </td>
    </tr>
    <tr style='background: #9D2444; color:#ffffff'>
        <td style='text-align:center; padding: 6;' colspan='4'>CONCEPTO</td>
        <td style='text-align:center; padding: 6;' colspan='3'>FEDERAL</td>
        <td style='text-align:center; padding: 6;' colspan='3'>MUNICIPAL</td>
</tr>
    
<tr>
        <td style='text-align:left; padding: 6;'colspan='4'>Rendimientos Totales</td>
        <td style='text-align:right; padding: 6;'colspan='3'>$ 0.00</td>
        <td style='text-align:right; padding: 6;'colspan='3'>$ 0.00</td>
       
    </tr>
    <tr>
        <td style='text-align:left; padding: 6;'colspan='4'>Rendimientos Disponibles</td>
        <td style='text-align:right; padding: 6;'colspan='3'>$ 0.00</td>
        <td style='text-align:right; padding: 6;'colspan='3'>$ 0.00</td>
       
    </tr>
    <!--FIN DE TABLA RENDIMIENTO-->

    <tr>
    <td style="padding: 35; border:none" colspan="5" align="cen2020ter"><br><br><br>
            __________________________________________ <br><br>
            C. {{ $input['municipio']}} , {{ $input['estado'] }}</td>
        <td style="padding: 35; border:none" colspan="5" align="center"><br><br><br>
            __________________________________________ <br><br>
           <span style="margin-left: 20px;text-transform: uppercase;">  C. {{$input['nombre']}} {{$input['primer_apellido']}} {{$input['segundo_apellido']}}</span> <br>
           <span style="margin-left: 20px;text-transform: uppercase;"> {{$input['cargo']}}  </span>

    </tr>
    <!--Fin firmas-->
    <!--Coparticipacion-->
</table>


</body>

<table align='center' border='1' cellpadding='0' cellspacing='0'>
    <colgroup>
        <col styel='width:10%'>
        <col styel='width:10%'>
        <col styel='width:10%'>
        <col styel='width:10%'>
        <col styel='width:10%'>
        <col styel='width:10%'>
        <col styel='width:10%'>
        <col styel='width:10%'>
        <col styel='width:10%'>
        <col styel='width:10%'>
    </colgroup>
    <thead>
    <tr style=" color:#000000">
        <th style=' padding: 6;' colspan="2" style='text-align:center;'><img src="data:image/jpeg;base64,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
" style="with:30px"></th>
        <th style=' padding: 6;' colspan="5" style='text-align:center;'> <b>
                Secretariado Ejecutivo del Sistema Nacional de Seguridad Publica <br>
                INFORME DE CUMPLIMIENTO AL PRIMER TRIMESTRE <br>
                FORTASEG ({{$input['trimestre']}})</b></th>
        <th style=' padding: 6;' colspan="3" style='text-align:center;'><img src="data:image/jpeg;base64,/9j/4AAQSkZJRgABAQEAYABgAAD/2wBDAAcFBQYFBAcGBQYIBwcIChELCgkJChUPEAwRGBUaGRgVGBcbHichGx0lHRcYIi4iJSgpKywrGiAvMy8qMicqKyr/2wBDAQcICAoJChQLCxQqHBgcKioqKioqKioqKioqKioqKioqKioqKioqKioqKioqKioqKioqKioqKioqKioqKioqKir/wAARCABBAKIDASIAAhEBAxEB/8QAHwAAAQUBAQEBAQEAAAAAAAAAAAECAwQFBgcICQoL/8QAtRAAAgEDAwIEAwUFBAQAAAF9AQIDAAQRBRIhMUEGE1FhByJxFDKBkaEII0KxwRVS0fAkM2JyggkKFhcYGRolJicoKSo0NTY3ODk6Q0RFRkdISUpTVFVWV1hZWmNkZWZnaGlqc3R1dnd4eXqDhIWGh4iJipKTlJWWl5iZmqKjpKWmp6ipqrKztLW2t7i5usLDxMXGx8jJytLT1NXW19jZ2uHi4+Tl5ufo6erx8vP09fb3+Pn6/8QAHwEAAwEBAQEBAQEBAQAAAAAAAAECAwQFBgcICQoL/8QAtREAAgECBAQDBAcFBAQAAQJ3AAECAxEEBSExBhJBUQdhcRMiMoEIFEKRobHBCSMzUvAVYnLRChYkNOEl8RcYGRomJygpKjU2Nzg5OkNERUZHSElKU1RVVldYWVpjZGVmZ2hpanN0dXZ3eHl6goOEhYaHiImKkpOUlZaXmJmaoqOkpaanqKmqsrO0tba3uLm6wsPExcbHyMnK0tPU1dbX2Nna4uPk5ebn6Onq8vP09fb3+Pn6/9oADAMBAAIRAxEAPwD6Rork7W717WLea8j1Sz06zE8kaf6PvbCuVySxxzj0p4065nYCTxncMxxgRCFPbsKAOporlf7MmjG6PxndAju5iYfkRTJ38QWdnNc2mvWt+sMbPtmtQN+BnG5COfwoA62iqmk3h1HR7S8YBTPCshA6AkZrmbvxNqcuqalaaabRLmycLFZTgiS6GB8wYkADr69KAOxorlbzX7+DxdJpLXVjaxfZBcrLMp6ltu37wz0zTxrerPd2Oj+XbxarNbm4uXYFo4UBwMAHkkj1oA6eiuR1bXNe0bw3f3t1FbebaXASNthCzocfNjPHJ/Srena3ey+JH0qaS1u1+yicXFsCBGckbWGT6Z60AdHRXHafr2tajHMLefTmuYbxrf7MRhmRWwW5b0yfwqe51bX7fVLG1mFpD9uuJo4wULFEUEqxw3ORQB1VFcvq2ta3p+g22y1gbWJVkdoeq7UBZiMH6D6mptR8RSr4FOvad5ZYQLNtcEg+o4oA6KiuX0zxBfS61Y2U72t2l5bGdmtgQYCMcNyeDnH4Vc8O6nfalc6ol6YdlndG2Xy0ILYAOTk/7VAG5RXLaR4nur3xM1ndRRpZXUbyWMq5y+xypz+HP0Ip8mqaxP4wu9HtJbSOOG3W4V5ImYkE42nDD86AOmorlE8XXEthHEltGuqSX5sDGWJjVxyX9du3mrdvqupWXiS30nWPs8y3kTSW9xApTlcblKknsRzQB0FFFFAHkN14/wBH8O2NppmqrqRMglnP2aKNkcNK4Gd56grmrGmeNfBGobVGuT2Uv8IubVEI9PmCkD86in0/S73z9M161tTbgyqbhlHnoElYtsbGRhZEc+2eDmma18CdPubOyXw7em3kBPnzTkuJFI4IA759OxrllKrzPl1PewTyavTVOu5Qmt309ep1LWWn3Vr5lpfCeNjkSRpEQfxC0sNn9miKpcuUdCCmxQpypGeAK+e7XUda8G69NawSvFPBKYpYSco5BxyO/wBa9uh19LjRJbrhJbeB2kTPQhCR+BNXSrxm+V6MnNMnngLTjLmg9n/n/mdl4SOfB+lZ/wCfZP5Vla74Y1PW457a4lsXjeXfBdshE9uuRwuBz06571t+Hbc2nhrToHGGS2QEeh2iuZuNRu/+E21PTZtZvbeFIomt1hhV8M46HCHj61ueGX7jw7qLeKm1VPsFxH9kW1WO5DE4BzuPHWlfw/q631nq8d5bPqsMLQT71IimQsSBwMjGeuKZctqll4h8O2UuqzOJ45BchVQLK0YU56ZGcnNZ0N5qN7rOtacNevIJ4p/Ks8QKyDK5+YhOmfcUAaOr+H9b1nw9e2V3e2pmu5lYDDbIUGPlXjJ5Hf1qzY+H7nTPEDahYG1hguoFS7tlUhfMXOGTA98VXt7jUNb8Qahpw1GW0t9MSJGaBVDzSMCSxJBwOOgqC9Ot2Vx4ftrrV3MtzdNDcNCqYdQGYHleDgAGgB1h4e13T7e4W2l0yOee5ef7TsZnQM2SoyPqPxrU1jSb6+13Sry2e3WGxdnZZC25twwcYHpVO+/tSfxZd2FjqkkAbTPOhUqpWOQsVB6ZxxnFZ0Meu3PiPU9Kh1+4VrSCB43eOMgs33sjb044oA1brw3Jqnid77VhBPZpD5VvCGcMhzksccZP9KoReFNVj8H3+giazEc7t5BBc+UjHJXpzjtVizlv7vxprenNqdwtvbwxNCqqnyFwST93nGOM1n22q6rN4Se2OoS/22NQ+xGTanD7hzjbjbt+agDT0/wzcaZq1lf2TWsJ+zC3vokUhZQOjLx97r1pttoWt2llrUcFxZpNqUzTRyAv+6LKFPbsBke9Msm1HW9U1K0XVri1g011gVolTfK+3JdiV9xwMVo+FNTudT0iQ37K9xbXEls8irgSFDjdjtmgDIPgl7SPSJtHW1t7yxcNLIzuRIMYKj2PerraPrMXiu51i1exImt1gEchcYAOc8CulooA5T/hD5o9PieG8T+1I7033nsnyNIRgrjrtxxV620i+uddh1XWpbfzLWJo4IbbcVXdjcxJ5JOAMYrdooAKKKKAPKPiFZ3ml6tNe2AwwP2+3JXILBdkyEdwV2kj0BrV+EfitNY8Of2beXStf2bFVRj8zRYG0++OR+Arrtf0f+2dPEccghuoWEtvMRnY46ZHcHoR3BrwTxB4W1LTNSkv9ASW2uYGLT2kDES2x/vJjloz2I6dDXPNSjLnR5mJVSjVWIpq66r9Td8e+Cdc1P4tJdw2LTWdwEeOVOVGwAEN6c461ut4Vtk8QWthZ3jXcd0oimKsNpUNul6egVV+r+xrC8PeJvGV5ZJPqOrXUduQU80wLubtsjXHzyH15A7mvTPCHh46ZC19eReVdzoEWLOfIjHITPqScse5NTTpxc/aWPoHnNfF0IU7Wio29f6/ry6YDAwOlYJ8Nzrrl5qltqksM12ixuBEpAVemM1vVz08LF7vbqqx/NyPOfj5xx1+X049a6jiCz8O3EWr2E1zcrLbaZA0dsTkySMwAZnPTsMYpv8AwikyvqZh1ieIakxM22JcjjHyntxWnaFrVws9zG6T4MWWJbIVRgZ7cZ/Gs5IHbT44xqoJYuiuJW+ckqRznPGD+dADm8LmHUPt+l6jPZ3LwpFOwVXWYKMAkHv70svhWJ9ItrRby4We1n+0RXfBcSEkk46Y5PFMntwscrHVAjmKJf8AXuACGbcevfGPwNS7ZIrlJDqyBC42xMxIJCAYz1xk5/KgCzpujmzvZr67u3vLyaNYjK6hQqKSQoA6ckmo7TQjaeI7zV/tju92io8RQBQF+7g9eKbsePSJbafVR5olCm4DYZTkMR9ev4Uww3UJtml1dFDIyqf+ehbPzenGVx/9egCWz0L7J4ivNW+1u73iqrxFAFAX7uD14qJPC1tH4pk1pZpN0mGNvxs3hSu/64J/Oo2XZa7DqSx+Wm18zPh8sDnJOedrDI6c4qSKzuVuYZhqm6NNsZjLkqx+Y4z9GX6gc0AE3hx01a41DStRmsJbsAXCqiurkdGww4NaGlaZBpGnpaWu4opLFnOWdiclifUmqNl50a27NqUVwvnMCxYjfuA+UeuDnFbVABRRRQAUUUUAFFFFABWZrGg2WtIhuA8U8RzFcwtskjPsw/lWnRQBi6V4XtdOuje3Es1/fEYFxcnJQeijov4VtUUUAFZ8mi2kxkMnmNvOcFuFywY4HuQPyrQooAqyafDL9m37j9mIKYOOR/8AqqBNEtEijjXzAI2LLhsdcZHHUcCtGigDNfQbGUSiRZGEpGcuePvHA9OWY/jT5NGtJVCsH25JKhsBsgAg+3yir9FAGcNEtFd3jMyPIwdmWQ5LDPPPT7xqdtMtHW3V4gy23+rUnIH+PSrVFAGbJoNlKsgcORIwJy2cYzwM9vmb86lTSreM8GQruDBC2RkDGfyq7RQBntotq0MUTmZlhOY8yn5DxjH0xxWhRRQAUUUUAFFFFABRRRQAUUUUAFFFFABRRRQAUUUUAFFFFABRRRQAUUUUAFFFFABRRRQAUUUUAFFFFAH/2Q==
" ></th>
    </tr>
    </thead>
    <tr style="background: #621132; color:#ffffff">
        <td style="padding:8;"  colspan="8">Entidad Federativa: {{ $input['estado'] }}</td>
        <td style="padding:8; ">Aportado:</td>
        <td style="padding:8; text-align:right;"> $ {{ $input['monto_aportado']}} </td>
    </tr>
    <tr style="background: #621132; color:#ffffff">
        <td style="padding:8;" colspan="8">Municipio: {{ $input['municipio']}} </td>
        <td style="padding:8;">No Aportado</td>
        <td style="padding:8; text-align:right;">{{ $input['noaportado']}} </td>
    </tr>
    <tr style="background: #621132; color:#ffffff">
        <td style="padding:8;" colspan="10" align="justify">Subsidio para el fortalecimiento del desempeño en materia de seguridad publica a los municipios y demarcaciones territoriales de la Ciudad de México y, en su caso, a las entidades federativas que ejerzan de manera directa o coordinada la función para el ejercicio fiscal {{$input['anio_fiscal']}} </td>
    </tr>
    <tr  style="background: #9D2444; color:#ffffff">
        <td rowspan="2" style='text-align:left; padding: 6; '>COPARTICIPACION</td>
        <td style='text-align:left; padding: 6; '>Convenido <br> (Anexo Técnico Autorizado)</td>
        <td style='text-align:left; padding: 6; '>Rendimientos <br> financieros</td>
        <td style='text-align:left; padding: 6; '>Reprogramaciones</td>
        <td style='text-align:left; padding: 6; '>Convenido <br> Modificado</td>
        <td style='text-align:left; padding: 6; '>Comprometido</td>
        <td style='text-align:left; padding: 6; '>Devengado</td>
        <td style='text-align:left; padding: 6; '>Pagado</td>
        <td style='text-align:left; padding: 6; '>Avance Total</td>
        <td style='text-align:left; padding: 6; '>Pendiente por Aplicar</td>

    </tr>
    <tr>
        <td style='text-align:center; padding: 6; '>Recurso</td>
        <td style='text-align:center; padding: 6; '>Aplicado</td>
        <td style='text-align:center; padding: 6; '>Recurso</td>
        <td style='text-align:center; padding: 6; '>Recurso</td>
        <td style='text-align:center; padding: 6; '>Recurso</td>
        <td style='text-align:center; padding: 6; '>Recurso</td>
        <td style='text-align:center; padding: 6; '>Recurso</td>
        <td style='text-align:center; padding: 6; '>Recurso</td>
        <td style='text-align:center; padding: 6; '>Recurso</td>
    </tr>

    <tr>
        <td colspan="10" align="center"><b>REPORTE DE AVANCE DE MONTOS CON RECURSO FEDERALES FORTASEG</b> </td>
    </tr>

    <!--INICIO DEL CICLO-->
    @foreach($valores as $valor)
    <tr style='background: #621132; color:#ffffff;'>
        <td style='padding:8;' colspan='10' align='justify'>
            {{$valor->programa}}
        </td>
    </tr>
          {{--        {{dd($valor)}}--}}
    <tr>
        <td style='text-align:left; padding: 6; width:120px;'>{{$valor->subprograma}}</td>
        <td style='text-align:right; padding: 6; '>$ {{$valor->SUM}} </td>
        <td style='text-align:right; padding: 6; '>$ 0.00</td>
        <td style='text-align:right; padding: 6; '>$ 0.00</td>
        <td style='text-align:right; padding: 6; '>$  {{$valor->SUM}} </td>
        <td style='text-align:right; padding: 6; '>$ 0.00</td>
        <td style='text-align:right; padding: 6; '>$ 0.00</td>
        <td style='text-align:right; padding: 6; '>$ 0.00</td>
        <td style='text-align:right; padding: 6; '>$ 0.00</td>
        <td style='text-align:right; padding: 6; '>$  {{$valor->SUM}} </td>
    </tr>
   

  
  
        
  

    <tr style='background: #621132; color:#ffffff'>
        <td style='text-align:right; padding: 6; '>TOTAL</td>
        <td style='text-align:right; padding: 6; '> $ {{$valor->SUM}} </td>
        <td style='text-align:right; padding: 6; '>$ 0.00</td>
        <td style='text-align:right; padding: 6; '>$ 0.00</td>
        <td style='text-align:right; padding: 6; '>$ {{$valor->SUM}} </td>
        <td style='text-align:right; padding: 6; '>$ 0.00</td>
        <td style='text-align:right; padding: 6; '>$ 0.00</td>
        <td style='text-align:right; padding: 6; '>$ 0.00</td>
        <td style='text-align:right; padding: 6; '>$ 0.00</td>
        <td style='text-align:right; padding: 6; '>$ {{$valor->SUM}}</td>
    </tr>
    @endforeach
 <!--INICIO DE TABLA RENDIMIENTO-->
    <tr>
        <td style="padding: 5; border:none" colspan="10" align="center"><b></b> </td>
    </tr>
   
    </tr>
    <tr style='background: #621132; color:#ffffff;'>
        <td style='text-align:center;padding:8;' colspan='10' align='center'>RENDIMIENTOS </td>
    </tr>
    <tr style='background: #9D2444; color:#ffffff'>
        <td style='text-align:center; padding: 6;' colspan='4'>CONCEPTO</td>
        <td style='text-align:center; padding: 6;' colspan='3'>FEDERAL</td>
        <td style='text-align:center; padding: 6;' colspan='3'>MUNICIPAL</td>
</tr>
    
<tr>
        <td style='text-align:left; padding: 6;'colspan='4'>Rendimientos Totales</td>
        <td style='text-align:right; padding: 6;'colspan='3'>$ 0.00</td>
        <td style='text-align:right; padding: 6;'colspan='3'>$ 0.00</td>
       
    </tr>
    <tr>
        <td style='text-align:left; padding: 6;'colspan='4'>Rendimientos Disponibles</td>
        <td style='text-align:right; padding: 6;'colspan='3'>$ 0.00</td>
        <td style='text-align:right; padding: 6;'colspan='3'>$ 0.00</td>
       
    </tr>
    <!--FIN DE TABLA RENDIMIENTO-->

    <tr>
    <td style="padding: 35; border:none" colspan="5" align="cen2020ter"><br><br><br>
            __________________________________________ <br><br>
            C. {{ $input['municipio']}} , {{ $input['estado'] }}</td>
        <td style="padding: 35; border:none" colspan="5" align="center"><br><br><br>
            __________________________________________ <br><br>
           <span style="margin-left: 20px;text-transform: uppercase;">  C. {{$input['nombre']}} {{$input['primer_apellido']}} {{$input['segundo_apellido']}}</span> <br>
           <span style="margin-left: 20px;text-transform: uppercase;"> {{$input['cargo']}}  </span>

        </td>
    
    </tr>
    <!--Fin firmas-->
</table>



<!--NUEVA PAGINA-->

