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
                      <th scope="col">Substance</th>
                      <th scope="col">Dose</th>
                      <th scope="col">Dosed at</th>
                      <th scope="col">Actions</th>
                    </tr>


                  </thead>

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