
   
          <table>
            
              <tr >
                 <th  style="width: 20%">
                    <img src="img/umss.png" alt="logo de la universidad" width="80"  height="80">
                    <p>&nbsp;&nbsp;</p>
                </th>
                <th style="width: 60%">
                        <h5 display-4 ><strong >UNIVERSIDAD MAYOR DE SAN SIMÓN <br/>
                            FACULTAD DE CIENCIAS Y TECNOLOGÍA</strong></h5>
                        <h3 class="row justify-content-center">FORMULARIO APROBACIÓN TEMA DE PROYECTO FINAL</h3>
                </th>
                <th>
                    <img src="img/logoFcyt.jpg" alt="logo de la universidad" width="68"  height="68">
                     <h3>SELLO</h3>
                </th> 
                 
           </tr> 
         </table>
         <table border="1px"  CELLPADDING="10" CELLSPACING="0" style="width: 100%">
                <tr>
                      <td >Nombre Estudiante:</td>
                      <td colspan="3">
                        <div align="right">N&deg;.....</div>
                        {{$perfil->estudiantes->pluck('nombres')->implode(' - ')}}
                        </td>
                  </tr>
                <tr>
                 
                  <td  ></td>
                  <td >Ap. Paterno </td>
                  <td >Ap. Materno</td>
                  <td >Nombres</td>
            
                </tr>
                <tr>
                    <td colspan="2">
                        Telefono:{{$perfil->estudiantes->pluck('telefono')->implode(' - ')}} 
                    </td>
                    <td colspan="2" >
                        Email:{{$perfil->estudiantes->pluck('email')->implode(' - ')}}
                    </td>
                </tr>
                <tr>
                    <td colspan="4">
                        Tutor:  {{$perfil->tutor[0]->ap_pa_prof}} {{$perfil->tutor[0]->ap_ma_prof}}{{$perfil->tutor[0]->nombre_prof}}
                    </td>
                </tr>
                <tr>
                    <td colspan="2">Carrera:Ing. Sistemas</td>
                    <td colspan="2">Trabajo Conjunto</td>
                </tr>
                <tr>
                    <td colspan="3">Gestion de Aprobacion:</td>
                    <td colspan="1">Cambio de Tema:</td>
                </tr>

         </table>
         <br>
         <table border="1px"  CELLPADDING="10" CELLSPACING="0" style="width: 100%">
             <tr>
                 <td colspan="4">Titulo:{{$perfil->titulo}}</td>
             </tr>
             <tr>
                 <td colspan="2">Area:{{$perfil->area->nombre}}</td>
                 <td colspan="2">SubArea:{{$perfil->subarea->nombre}}</td>
             </tr>
             <tr>
                 <td colspan="4">Modalidad:{{$perfil->modalidad->nombre_mod}}</td>
             </tr>
             <tr>
                 <td colspan="4">Objetivo General:{{$perfil->objetivo_gen}}</td>
             </tr>
             <tr>
                <td colspan="4">Objetivo Especificos:<br>{{$perfil->objetivo_esp}}</td>
            </tr>
            <tr>
                <td  colspan="4">Descripcion:<br> {{$perfil->descripcion}}</td>
            </tr>
            <tr >
                <td></td>
                <td></td>
                <td></td>
                <td></td>
            </tr>
            <tr >
                <td >
                    <br><strong>Director de la Carrera</strong> 
                </td>
                <td>
                    <br><strong>Docente de la Materia</strong>
                </td>
                <td >{{$perfil->tutor[0]->nombre_prof}} {{$perfil->tutor[0]->ap_pa_prof}}{{$perfil->tutor[0]->ap_ma_prof}}
                    <br><strong>Tutor</strong>
                </td>
                <td>{{$perfil->estudiantes->pluck('nombres')->implode(' - ')}}
                    <br><strong>Estudiante</strong>
                </td>
            </tr>
          </table>
          <br>
          <table border="1px"  CELLPADDING="10" CELLSPACING="0" style="width: 100%">
              <tr>
                  <td>Registrado por: </td>
                  <td>Firma:</td>
                  <td>Fecha:</td>
              </tr>
          </table>
          
            
