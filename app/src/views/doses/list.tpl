<!DOCTYPE html>
<html lang="en">

<head>
  {{include file="../include/head.tpl"}}
</head>

<body>

  <div class="wrapper">

    {{include file="../include/sidebar.tpl"}}

    <!-- page content -->

    <div id="content">

      {{include file="../include/topbar.tpl"}}

      <div class="row">

        <div class="col col-md-2"></div>

        <div class="col col-md-8">
          <div class="card text-center">
            <div class="card-header mb-3">
              <h2>your dose overview</h2>
              <hr>
            </div>
            <div class="card-body">
              <div class="table-container">
                <table class="table table-dark">

                  <thead>
                    <tr>
                      <th scope="col">#</th>
                      <th scope="col">substance</th>
                      <th scope="col">dose</th>
                      <th scope="col">dosed at</th>
                      <th scope="col">actions</th>
                    </tr>
                  </thead>

                  <tbody>
                    {{foreach from=$data item=$i}}
                    <tr>
                      <th scope="row">{{$i.id}}</th>
                      <td>{{$i.substance}}</td>
                      <td>{{$i.dose}} {{$i.unit}}</td>
                      <td>{{$i.dosed_at|date_format:"%d.%m.%Y, %H:%M"}}</td>
                      <td> 
                        <a href="/edit/{{$i.id}}">
                         <button type="button" class="btn btn-success"><i class="fas fa-pen-to-square"></i></button>
                        </a> 
                        <a href="/delete/{{$i.id}}">
                         <button type="button" class="btn btn-danger"><i class="fas fa-trash"></i></button>
                        </a>
                       </td>
                    </tr>
                    
                 
                  
                    {{/foreach}}
                  </tbody>

                </table>
              </div>
            </div>
          </div>
        </div>


        <div class="col col-md-2"></div>

      </div>


    </div>

  </div>
  {{include file="../include/js.tpl"}}
</body>

</html>